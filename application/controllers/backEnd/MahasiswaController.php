<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MahasiswaController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('mahasiswa');
	}

}

/* End of file MahasiswaController.php */
/* Location: ./application/controllers/MahasiswaController.php */