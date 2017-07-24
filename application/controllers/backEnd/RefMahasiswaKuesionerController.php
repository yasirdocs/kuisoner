<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RefMahasiswaKuesionerController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'MRef_Kuesioner',
            'MRef_Matkul',
            'MRef_Dosen',
            'MRef_Jawaban'
            ));
    }

    public function index()
    {
        $pageTitle      = "Sistem Kuesioner Online";
        $dataAll        = $this->MRef_Matkul->getAll_array();

        $paramater['pageTitle']  = $pageTitle;
        $paramater['rows']       = $dataAll;
        $this->load->view('backEnd/refmahasiswakuesioner/indexRefMahasiswaKuesioner', $paramater);
    }

    public function view($id)
    {
        $pageTitle = "Sistem Kuesioner Online";
        $dataDosen = $this->MRef_Dosen->getAll_array();
        $dataKuesioner = $this->MRef_Kuesioner->getAll_array();
        $dataJawaban = $this->MRef_Jawaban->getAll_array();


        $thisData = $this->MRef_Kuesioner->getDataBy(array('Kd_Kuesioner'),array($id),'row');
        if(!empty($_POST)) {

            $kodeId                     = $thisData->Kd_Kuesioner;
            $Judul_Kuesioner            = $this->input->post('Judul_Kuesioner');

            $field = array(
                'Kd_Kuesioner' => $kodeId
            );

            $this->db->trans_begin();

            $data = array(
                $this->MRef_Kuesioner->Kd_Kuesioner                 => $kodeId,
                $this->MRef_Kuesioner->Judul_Kuesioner              => $Judul_Kuesioner,
                );

            $this->MRef_Kuesioner->updateBy($data, $field);

            transStatus('Data Kuesioner ',0,null,'kuesionerUpdate'.$kodeId);
            transStatus('Data Kuesioner ',1,null,'kuesioner');
            
        }


        $paramater['pageTitle']     = $pageTitle;
        $paramater['thisData']      = $thisData;
        $paramater['dosen']         = $dataDosen;
        $paramater['kuesioner']     = $dataKuesioner;
        $paramater['jawaban']     = $dataJawaban;

        $this->load->view('backEnd/refmahasiswakuesioner/viewRefMahasiswaKuesioner',$paramater);
    }

    public function add()
    {
        $pageTitle = 'Tambah';

        if (!empty($_POST)) {

            $Judul_Kuesioner                = $this->input->post("Judul_Kuesioner");
            $this->db->trans_begin();

            $data = array(
                $this->MRef_Kuesioner->Judul_Kuesioner              => $Judul_Kuesioner,
                );
            
            $this->MRef_Kuesioner->insert($data);

            transStatus('Data Kuesioner',0,null,'kuesionerAdd');

            transStatus('Data Kuesioner',1,null,'kuesioner');

        }


        $paramater['pageTitle']         = $pageTitle;
        $this->load->view('backEnd/refmahasiswakuesioner/formRefMahasiswaKuesioner',$paramater);
    }

    public function update($id)
    {
        $pageTitle = "Update";

        $thisData = $this->MRef_Kuesioner->getDataBy(array('Kd_Kuesioner'),array($id),'row');
        if(!empty($_POST)) {

            $kodeId                     = $thisData->Kd_Kuesioner;
            $Judul_Kuesioner            = $this->input->post('Judul_Kuesioner');

            $field = array(
                'Kd_Kuesioner' => $kodeId
            );

            $this->db->trans_begin();

            $data = array(
                $this->MRef_Kuesioner->Kd_Kuesioner                 => $kodeId,
                $this->MRef_Kuesioner->Judul_Kuesioner              => $Judul_Kuesioner,
                );

            $this->MRef_Kuesioner->updateBy($data, $field);

            transStatus('Data Kuesioner ',0,null,'kuesionerUpdate'.$kodeId);
            transStatus('Data Kuesioner ',1,null,'kuesioner');
            
        }


        $paramater['pageTitle']  = $pageTitle;
        $paramater['thisData']   = $thisData;

        $this->load->view('backEnd/refmahasiswakuesioner/formRefMahasiswaKuesioner',$paramater);
    }

    function delete($id){
        $this->db->trans_begin();
        $this->MRef_Kuesioner->deleteDataBy(array('Kd_Kuesioner' => $id ));
        transStatusDelete("Kuesioner",'kuesioner');
    }

}

/* End of file RefMahasiswaKuesionerController.php */
/* by: yasirarif, site: yasirdocs.github.io */
/* Location: ./application/controllers/RefMahasiswaKuesionerController.php */ 