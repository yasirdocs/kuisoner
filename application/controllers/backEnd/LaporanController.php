<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanController extends CI_Controller {

    function __construct() {
        parent::__construct();
        // mengambil data dari database melalui model
        $this->load->model(
            array(
                'Mcrud',
                'Mnilai',
                'Mlaporan'
            ));
    }

    public function index(){
        $pageTitle              = "Daftar Laporan";


        $data['dataPeserta']    = $this->Mcrud->getAll();
        $data['dataNilai']      = $this->Mnilai->getAll();
        $data['pageTitle']      = $pageTitle;
        $this->load->view('laporan', $data);
    }

    public function laporan($id)
    {

        $peserta            = $this->Mcrud->getAll();
        $nilai              = $this->Mnilai->getAll();
        $laporan            = 

        // var_dump($peserta->nama);die;

        $data['values']         = $this->Mcrud->getAll();
        $data['row']           = $this->Mlaporan->getAll();
        

        // set nama file laporan
        $pdfFilePath = strtoupper("laporan").".pdf";

        $data['dataNilai']      = $nilai;
        $data['dataPeserta']    = $peserta;
        $data['pdf']            = $pdfFilePath;

        // mengambil fungsi dari mPDF itu sendiri
        $this->load->library('m_pdf');

        // mengeset ukuran mPDF
        $mpdf = new mPDF('utf-8','F4');
        $html = $this->load->view('laporanPdf',$data,true);


        // membuat halaman pdf dengan kententuan variabel $html
        $mpdf->WriteHTML($html);
        $mpdf->Output($pdfFilePath, "I");

    }

}
