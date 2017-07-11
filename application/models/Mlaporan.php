<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Mlaporan extends MY_Model {
    var $table                      = 'tbl_laporan',
        $nama_laporan               = 'nama_laporan',
        $id_peserta               	= 'id_peserta',
        $id_sub_nilai				= 'id_sub_nilai'
    ;
    public function __construct()
    {
        parent::__construct();  
    }

}