<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RefBarangController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
				'MRef_Barang'
			));
	}

	public function index()
	{
		$pageTitle 		= "RefBarang";
		$dataAll		= $this->MRef_Barang->getAll();


		$paramater['pageTitle'] = $pageTitle;
		// $paramater['rows']		= $dataAll;
		$this->load->view('backEnd/refBarang/indexRefBarang',$paramater);
	}

	public function test()
	{
			
			$foo = convertDateTime(new dateTime(),'d/m/Y H:i:s');
			var_dump($foo);die;
	}

	public function add()
	{
		$pageTitle = 'Tambah';

		if (!empty($_POST)) {

			$kd_barang 			= $this->input->post("kd_barang");
			$nm_barang 			= $this->input->post("nm_barang");
			$total_barang 		= $this->input->post("total_barang");
			$tgl_masuk 			= $this->input->post("tgl_masuk");

			$this->db->trans_begin();

			$data = array(
					$this->MRef_Barang->kd_barang 				=> $kd_barang,
					$this->MRef_Barang->nm_barang 				=> $nm_barang,
					$this->MRef_Barang->total_barang 			=> $total_barang,
					$this->MRef_Barang->tgl_masuk 				=> $tgl_masuk
				);
			
            $this->MRef_Barang->insert($data);

            transStatus('Data Barang',0,null,'barangAdd');

            transStatus('Data Barang',1,null,'barang');

		}


		$paramater['pageTitle']			= $pageTitle;
		$this->load->view('backEnd/refBarang/formRefBarang',$paramater);
	}


}

/* End of file RefBarangController.php */
/* Location: ./application/controllers/RefBarangController.php */ 