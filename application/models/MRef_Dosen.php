<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MRef_Dosen extends MY_Model {

    var $table             = 'ref_dosen',
        $Kd_Dosen          = 'Kd_Dosen',
        $Nm_Dosen          = 'Nm_Dosen'
    ;

    public function __construct()
    {
        parent::__construct();
        
    }



}

/* End of file MRef_Dosen.php */
/* Location: ./application/models/MRef_Dosen.php */