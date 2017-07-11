<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DosenController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('dosen');
	}

}

/* End of file DosenController.php */
/* Location: ./application/controllers/DosenController.php */