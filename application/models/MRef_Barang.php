<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MRef_Barang extends MY_Model {

	var $table 				= 'Ref_Barang',
		$kd_barang			= 'kd_barang',
		$nm_barang			= 'nm_barang',
		$total_barang		= 'total_barang',
		$tgl_masuk			= 'tgl_masuk'
	;

	public function __construct()
	{
		parent::__construct();
		
	}



}

/* End of file Mref_Barang.php */
/* Location: ./application/models/Mref_Barang.php */