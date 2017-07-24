<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MRef_Matkul extends MY_Model {

    var $table              = 'ref_matkul',
        $Kd_Matkul          = 'Kd_Matkul',
        $Kode_MK            = 'Kode_MK',
        $Nm_Matkul          = 'Nm_Matkul',
        $Sks_Matkul         = 'Sks_Matkul'
    ;

    public function __construct()
    {
        parent::__construct();
        
    }



}

/* End of file MRef_Matkul.php */
/* Location: ./application/models/MRef_Matkul.php */