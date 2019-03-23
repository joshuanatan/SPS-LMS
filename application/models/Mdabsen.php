<?php
class Mdabsen extends CI_Model{
    public function insert($data){
        $this->db->insert("absen",$data);
    }
    public function remove($where){
        $this->db->delete("absen",$where);
    }
    public function select($where){
        $this->db->where($where);
        return $this->db->get("absen");
        
    }
}