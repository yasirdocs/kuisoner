<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NilaiController extends CI_Controller {

    function __construct() {
        parent::__construct();
        // mengambil data dari database melalui model
        $this->load->model(
            array(
                'Mnilai',
                'Mcrud'
            ));
    }

    public function nilai()
    {
        $pageTitle              = "Nilai";
        $data['pageTitle']      = $pageTitle;
        $data['rows']           = $this->Mnilai->getAll();
        $this->load->view('nilai', $data);
    }

    public function add(){

        $pageTitle                  = "Tambah";


        $get                        = $this->Mcrud->getAll();
        $thisDatam                  = $this->Mnilai->getAll();

        foreach ($thisDatam as $key => $value) {
            $thisDatas = $value->id;
        }

        if(!empty($_POST)){

            $id_peserta                 = $this->input->post('id_peserta');
            $total_nilai                = $this->input->post('total_nilai');

            foreach($get as &$value){
                $value = get_object_vars($value); 
                $idPeserta = $value['id'];
            }

            $this->db->trans_begin();

            $data = array(
                $this->Mnilai->id_peserta               => $id_peserta,
                $this->Mnilai->total_nilai              => $total_nilai
            );


            $this->Mnilai->insert($data);

            transStatus('data ',0,null,'add');

            transStatus('data ',1,null,'nilai');
            
        }

        $data['thisDatam']      = $thisDatas;
        $data['get']            = $get;
        $data['pageTitle']      = $pageTitle;


        $this->load->view('formProsesNilai',$data);
    }

    public function update($id)
    {
        $pageTitle = "Update";

        $get                        = $this->Mcrud->getAll();
        $thisDatam                  = $this->Mnilai->getAll();

        foreach ($thisDatam as $key => $value) {
            $thisDatas = $value->id_peserta;
            $values = $value;
        }

        $thisData = $this->Mnilai->getDataBy(array('id'),array($id),'row');
        if(!empty($_POST)) {

            $kodeId                     = $thisData->id;
            $id_peserta                 = $this->input->post('id_peserta');
            $total_nilai                = $this->input->post('total_nilai');

            $field = $kodeId;

            $this->db->trans_begin();

            $data = array(
                $this->Mnilai->id_peserta               => $id_peserta,
                $this->Mnilai->total_nilai              => $total_nilai
            );

            $this->Mnilai->update($data,$field);


            transStatus('data ',0,null,'update');

            transStatus('data ',1,null,'nilai');
            
        }


        $data['thisDatam']   = $thisDatas;
        $data['values']     = $values;
        $data['get']        = $get;
        $data['pageTitle']  = $pageTitle;
        $data['thisData']   = $thisData;

        $this->load->view('formProsesNilai',$data);
    }


    function delete($id){

        // menghapus data dengan id
        $delete = $this->Mnilai->deleteDataBy(array('id' => $id ));

        // mengecek apabila data dengan id sudah benar maka terhapus dan menuju ke halaman yang di tentukan
        if($delete == true){
            redirect(base_url('nilai'));
        }
    }

}
