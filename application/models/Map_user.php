<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
class Map_user extends MY_Model {

    var $table                  = 'ap_user',
        $username               = 'username',
        $password               = 'password',
        $level_akses            = 'level_akses'
    ;

     function getQuery($select='*'){
        return $this->db->select($select)
            ->from($this->table);
            // ->get()
            // ->result();
    }

    function isLogin(){
        $CI =& get_instance();
        if($CI->session->userdata('userId')) {
            // if($CI->session->userdata('TM')<time()){
            //     $CI->session->set_flashdata('error','Waktu Akses Anda Telah Habis Silakan Login Kembali');
            //     $this->doLogout();
            // }
            return true;
        }else{
            return false;
        }
    }
    
    function cekLogin($username,$password,$level_akses){
        $query=$this->getQuery()
            ->where('username',$username)
            ->where('password',$password)
            ->where('level_akses',$level_akses)
            ->get();

        if($query->num_rows() > 0){
            return $query->row_array();
        }else{
            return false;
        }
    }

}