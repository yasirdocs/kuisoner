<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackEndController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(
            array(
                'Map_user',
                'Map_user_akses'
            ));
    }

    public function index()
    {   
        if(!$this->Map_user->isLogin()){
            redirect('login');
        }

        $this->load->view('dashboard');
    }

    public function dashboard()
    {   
        $this->load->view('dashboard');
    }


    public function login()
    {   
        $pageTitle = "Login";
        $namelevel = $this->Map_user_akses->getAll();
        if(!empty($_POST)){

            $user               = $this->input->post('username');
            $pass               = $this->input->post('password');
            $level_akses        = $this->input->post('level_akses');

            $data = $this->Map_user->cekLogin($user,$pass,$level_akses);
            
            if (!$data){
                $CI =& get_instance();
                $pesan = "invalid username, Password";
                $CI->session->set_flashdata('error',$pesan);
            } else {
                    $newdata = array(
                        'username'          => $data['username'],
                        'password'          => $data['password'],
                        'level_akses'       => $data['level_akses'],
                        'waktu'             =>(string)convertDateTime(new dateTime(),'Y-m-d H:i:s'),
                        'userId'            => TRUE
                    );
                $this->session->set_userdata($newdata);
            }

            $akses = $this->session->userdata('level_akses');
            switch ($akses) {
                case '1':
                    redirect(base_url());
                    break;
                case '4':
                    redirect(base_url('dosen'));
                    break;
                case '5':
                    redirect(base_url('mahasiswa'));
                    break;
                default:
                    $CI =& get_instance();
                    $pesan = "invalid username, Password";
                    $CI->session->flashdata('error',$pesan);
                    break;
            }
        }

        $data['namelevel']                        = $namelevel;
        $data['pageTitle']                        = $pageTitle;
        $this->load->view('index', $data);
    }

    public function logout()
    {
        $CI =& get_instance();
        $data = array(
            'username',
            'password',
            'level_akses',
            'userId'
            );

        $this->session->unset_userdata($data);
        $CI->session->sess_destroy();
        redirect('login');
    }   

    public function laporan($id)
    {

        $peserta            = $this->Mcrud->getAll();
        $nilai              = $this->Mnilai->getAll();
        $laporan            = 


        $data['values']         = $this->Mcrud->getAll();
        

        $pdfFilePath = strtoupper("laporan").".pdf";

        $data['dataNilai']      = $nilai;
        $data['dataPeserta']    = $peserta;
        $data['pdf']            = $pdfFilePath;

        $this->load->library('m_pdf');

        $mpdf = new mPDF('utf-8','F4');
        $html = $this->load->view('laporanPdf',$data,true);


        $mpdf->WriteHTML($html);
        $mpdf->Output($pdfFilePath, "I");

    }

    public function crud()
    {
        $pageTitle              = "Peserta";
        $data['pageTitle']      = $pageTitle;
        $data['rows']           = $this->Mcrud->getAll();
        $this->load->view('crud', $data);
    }

    public function add(){
        $pageTitle = "Tambah";

        if(!empty($_POST)){

            $nama               = $this->input->post('nama');
            $tempat_lahir       = $this->input->post('tempat_lahir');
            $tanggal_lahir      = $this->input->post('tanggal_lahir');
            $no_telp            = $this->input->post('no_telp');
            $email              = $this->input->post('email');
            $alamat             = $this->input->post('alamat');


            $this->db->trans_begin();

            $data = array(
                $this->Mcrud->nama              => $nama,
                $this->Mcrud->tempat_lahir      => $tempat_lahir,
                $this->Mcrud->tanggal_lahir     => $tanggal_lahir,
                $this->Mcrud->no_telp           => $no_telp,
                $this->Mcrud->email             => $email,
                $this->Mcrud->alamat            => $alamat
            );


            $this->Mcrud->insert($data);

            transStatus('data ',0,null,'add');

            transStatus('data ',1,null,'crud');
            
        }


        $data['pageTitle'] = $pageTitle;
        $this->load->view('formProses',$data);
    }

    public function update($id)
    {
        $pageTitle = "Update";

        $thisData = $this->Mcrud->getDataBy(array('id'),array($id),'row');
        if(!empty($_POST)) {

            $kodeId             = $thisData->id;
            $nama               = $this->input->post('nama');
            $tempat_lahir       = $this->input->post('tempat_lahir');
            $tanggal_lahir      = $this->input->post('tanggal_lahir');
            $no_telp            = $this->input->post('no_telp');
            $email              = $this->input->post('email');
            $alamat             = $this->input->post('alamat');

            $field = $kodeId;

            $this->db->trans_begin();

            $data = array(
                $this->Mcrud->nama              => $nama,
                $this->Mcrud->tempat_lahir      => $tempat_lahir,
                $this->Mcrud->tanggal_lahir     => $tanggal_lahir,
                $this->Mcrud->no_telp           => $no_telp,
                $this->Mcrud->email             => $email,
                $this->Mcrud->alamat            => $alamat
            );

            $this->Mcrud->update($data,$field);


            transStatus('data ',0,null,'update');

            transStatus('data ',1,null,'crud');
            
        }


        $data['pageTitle']  = $pageTitle;
        $data['thisData']   = $thisData;

        $this->load->view('formProses',$data);
    }


    function delete($id){

        $delete = $this->Mcrud->deleteDataBy(array('id' => $id ));

        if($delete == true){
            redirect(base_url('crud'));
        }
    }

}
