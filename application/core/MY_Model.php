<?php

class MY_Model extends CI_Model {
    var $table        = '',
        $id           = 'id',
        $nama         = 'nama',
        $statusAktif  = 'status',
        $keterangan   = 'keterangan',
        $waktuBuat    = 'waktu_buat',
        $waktuUbah    = 'waktu_ubah'
    ;

    function __construct(){
        parent::__construct();
    }

    function insert($data){
        return $this->db->insert($this->table,$data);
    }

    function update($data,$id){
        return $this->db->update($this->table,$data,array($this->id => $id));
    }

    function updateBy($data,$field=array()){
        $this->db->update($this->table,$data,$field);
    }

    function delete($id){
        return $this->db->delete($this->table,array($this->id => $id));
    }

    function getById($id){
        return $this->db->where($this->id,$id)->get($this->table)->row();
    }

    function getAll(){
        return $this->db->get($this->table)->result();
    }

    function getAll_array(){
        return $this->db->get($this->table)->result_array();
    }

    function getIdTeratas(){
        return $this->db->order_by($this->id,"desc")->get($this->table)->row();
    }

    function cekNamaSama($nama){
        return $this->db->where($this->nama,$nama)->get($this->table)->result();
    }

    function getByStatusAktif(){
        return $this->db->where($this->statusAktif,'1')->get($this->table)->result();
    }

    function getDataBy($field=array(),$value=array(),$type=null,$select='*'){
        $query=$this->db->select($select)
            ->from($this->table);
        foreach ($field as $key=>$field) {
            $query->where($field,$value[$key]);
        }

        if($type){
            if($type=='count'){
                return $query->get()->num_rows();
            }
            return $query->get()->row();
        }else{
            return $query->get()->result();
        }
    }

    function getDataBys($field=array(),$value=array(),$type=null,$select='*'){
        $query=$this->db->select($select)
            ->from($this->table)
            ->where($field,$value);

        if($type){
            if($type=='count'){
                return $query->get()->num_rows();
            }
            return $query->get()->row();
        }else{
            return $query->get()->result();
        }
    }

    function getDataBySubQuery($field=array(),$value=array(),$type=null,$select='*',$subquery=null){
        $query=$this->db->select($select)
            ->from($this->table);
        foreach ($field as $key=>$field) {
            $query->where($field,$value[$key]);
        }
        if($subquery){
            $query->where($subquery);
        }
        if($type){
            if($type=='count'){
                return $query->get()->num_rows();
            }
            return $query->get()->row();
        }else{
            return $query->get()->result();
        }
    }

    function getDataByQuery($field=array(),$value=array(),$type=null,$select='*',$order=array()){
        $query=$this->getQuery($select);
        if($field){
            foreach ($field as $key=>$field) {
                if(isset($value[$key])){
                    $query->where($field,$value[$key]);
                }
                $query->order_by($field);
            }
        }

        if($order){
            foreach ($order as $orderField => $ascdesc) {
                $query->order_by($orderField,$ascdesc);
            }
        }
        if($type){
            if($type=='count'){
                return $query->get()->num_rows();
            }
            return $query->get()->row();
        }else{
            return $query->get()->result();
        }
    }

    function getDataInQuery($data="",$type=null){
        $query=$this->db->where($data)->get($this->table);
        if($type){
            if($type=='count'){
                return $query->num_rows();
            }
            return $query->row();
        }else{
            return $query->result();
        }
    }

    function deleteDataBy($data=array()){
        return $this->db->delete($this->table,$data);
    }

    function getIncrement($kode,$field=array()){

        $nilai=0;
        if($field){
            $query =$this->db->from($this->table);
            foreach ($field as $key=>$value) {
                $query->where($key,$value);
            }
            $query=$query->get()->num_rows();

            $max=$this->db->select("Max(".$kode.") as max")->from($this->table);
            foreach ($field as $key=>$value) {
                $max->where($key,$value);
            }
            $max=$max->get()->row();

        }else{
            $query =$this->db->get($this->table)->num_rows();
            $max=$this->db->select("Max(".$kode.") as max")->from($this->table)->get()->row();

        }

        if($max->max>$query){
            $nilai=$max->max;
        }else{
            $nilai=$query;
        }

        return $nilai+1;
    }

    function getDataTableLimit($start=null,$limit=null,$field=array(),$value=array()){
        $query=$this->getQuery();
        if($field){
            foreach ($field as $key=>$field) {
                if(isset($value[$key])){
                    $query->where($field,$value[$key]);
                }
                $query->order_by($field);
            }
        }
        if($limit){
            $query->where('limit > '.$start.' ')
                ->where('limit <= '.($limit + $start ));
        }

        return $query->get()->result();
    }

    // fungsi untuk membuat log, SET DI CONFIG "log_threshold"
    function this_ip(){
        $ip='unknown';
            if (!empty($_SERVER['HTTP_CLIENT_IP'])){
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }elseif (!empty($_SERVER['HTTP_X_FORWARD_FOR'])){
                $ip = $SERVER['HTTP_X_FORWARD_FOR'];
            }else{
                $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
            }
        return $ip;
    }
 
    // fungsi untuk membuat log, SET DI CONFIG "log_threshold"
    function log_add($data, $type='INFO'){
        $msg=$this->this_ip()."| ";
        $msg.=is_string($data) ? $data : json_encode($data);
        // tulis di log
        log_message($type, $msg);
        return true;
    }

    // fungsi untuk DEBUGGING KE CONSOLE LOG
    function console_add($data) {
        if(is_array($data) || is_object($data))
        {
            echo("<script>console.log('PHP: ".json_encode($data)."');</script>");
        } else {
            echo("<script>console.log('PHP: ".$data."');</script>");
        }
    }

}