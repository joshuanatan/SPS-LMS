<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdmenu extends CI_Model{
    public function select($where){
        return $this->db->get_where("menu",$where);
    }
    public function insert($data){
        $this->db->insert("menu",$data);
    }
    public function update($data,$where){
        $this->db->update("menu",$data,$where);
    }
}