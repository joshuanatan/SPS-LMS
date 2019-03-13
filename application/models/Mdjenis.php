<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdjenis extends CI_Model{
    public function select($where){
        return $this->db->get_where("jenis",$where);
    }
    public function insert($data){
        $this->db->insert("jenis",$data);
    }
    public function update($data,$where){
        $this->db->update("jenis",$data,$where);
    }
}