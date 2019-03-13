<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdmatapelajarankelas extends CI_Model{
    public function select($where){
        return $this->db->get_where("matapelajarankelas",$where);
    }
    public function insert($data){
        $this->db->insert("matapelajarankelas",$data);
    }
    public function update($data,$where){
        $this->db->update("matapelajarankelas",$data,$where);
    }
}