<?php
class Mdulanganharian extends CI_Model{
    public function select($where){
        return $this->db->get_where("ulangan_harian",$where);
    }
    public function insert($data){
        $this->db->insert("ulangan_harian",$data);
    }
}