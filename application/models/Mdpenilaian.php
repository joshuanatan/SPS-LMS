<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdpenilaian extends CI_Model{
    public function select($where){
        return $this->db->get_where("penilaian",$where);
    }
    public function insert($data){
        $this->db->insert("penilaian",$data);
    }
    public function update($data,$where){
        $this->db->update("penilaian",$data,$where);
    }
}