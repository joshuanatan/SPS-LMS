<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdquiz extends CI_Model{
    public function select($where){
        return $this->db->get_where("quiz",$where);
    }
    public function insert($data){
        $this->db->insert("quiz",$data);
    }
    public function update($data,$where){
        $this->db->update("quiz",$data,$where);
    }
}