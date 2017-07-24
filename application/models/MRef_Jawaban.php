<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MRef_Jawaban extends MY_Model {

    var $table               = 'ref_jawaban',
        $Kd_Jawaban          = 'Kd_Jawaban',
        $Nm_Jawaban          = 'Nm_Jawaban'
    ;

    public function __construct()
    {
        parent::__construct();
        
    }



}

/* End of file MRef_Jawaban.php */
/* Location: ./application/models/MRef_Jawaban.php */