<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH.'../vendor/mpdf/mpdf/mpdf.php';

class M_pdf {

    public $param;
    public $pdf;

    public function __construct($param = '"en-GB-x","A4","","",10,10,10,10,6,3')
    {
        if (is_array($param)){
            $param=$param[0];
        }

        $this->param =$param;
        $this->pdf = new mPDF($this->param);
    }
}

//See more at: https://arjunphp.com/generating-a-pdf-in-codeigniter-using-mpdf/#sthash.yS5Kjp8j.dpuf