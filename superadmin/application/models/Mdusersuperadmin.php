<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdusersuperadmin extends CI_Model{
    public function select($where){
        return $this->db->get_where("user",$where);
    }
    public function insert($data){
        $this->db->insert("user",$data);
    }
    public function update($data,$where){
        $this->db->update("user",$data,$where);
    }
}