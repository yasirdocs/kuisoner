<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MRef_Kuesioner extends MY_Model {

	var $table 					= 'Ref_Kuesioner',
		$Kd_Kuesioner			= 'Kd_Kuesioner',
		$Judul_Kuesioner		= 'Judul_Kuesioner'
	;

	public function __construct()
	{
		parent::__construct();
		
	}



}

/* End of file Mref_kuesioner.php */
/* Location: ./application/models/Mref_kuesioner.php */