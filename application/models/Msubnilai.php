<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Msubnilai extends MY_Model {
    var $table                  = 'tbl_sub_nilai',
        $id               		= 'id',
        $nilai_peserta			= 'nilai_peserta'
    ;
    public function __construct()
    {
        parent::__construct();  
    }

}