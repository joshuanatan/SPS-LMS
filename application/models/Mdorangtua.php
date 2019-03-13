<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdorangtua extends CI_Model{
    public function select($where){
        return $this->db->get_where("orang_tua",$where);
    }
    public function insert($data){
        $this->db->insert("orang_tua",$data);
    }
    public function update($data,$where){
        $this->db->update("orang_tua",$data,$where);
    }
}