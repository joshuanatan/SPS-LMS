<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdmatapelajaran extends CI_Model{
    public function select($where){
        return $this->db->get_where("matapelajaran",$where);
    }
    public function insert($data){
        $this->db->insert("matapelajaran",$data);
    }
    public function update($data,$where){
        $this->db->update("matapelajaran",$data,$where);
    }
}