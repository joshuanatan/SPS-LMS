<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdorangtua extends CI_Model{
    public function select($where){
        return $this->db->get_where("orangtua",$where);
    }
    public function insert($data){
        $this->db->insert("orangtua",$data);
    }
    public function update($data,$where){
        $this->db->update("orangtua",$data,$where);
    }
}