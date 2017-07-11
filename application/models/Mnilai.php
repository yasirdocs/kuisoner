<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Mnilai extends MY_Model {
    var $table                  = 'tbl_nilai',
        $id_peserta             = 'id_peserta',
        $total_nilai            = 'total_nilai'
    ;
    public function __construct()
    {
        parent::__construct();  
    }

}