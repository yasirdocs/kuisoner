<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Map_user_akses extends MY_Model {

    var $table                  		= 'ap_user_akses',
        $level_akses                  	= 'level_akses'
    ;

    public function __construct()
    {
        parent::__construct();
    }

}