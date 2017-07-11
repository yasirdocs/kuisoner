<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Mcrud extends MY_Model {
    var $table              = 'tbl_peserta',
        $nama               = 'nama',
        $tempat_lahir       = 'tempat_lahir',
        $tanggal_lahir      = 'tanggal_lahir',
        $no_telp            = 'no_telp',
        $email              = 'email',
        $alamat             = 'alamat'
    ;
    public function __construct()
    {
        parent::__construct();  
    }

}