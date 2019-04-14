<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdsekolah extends CI_Model{
    public function select($where){
        return $this->db->get_where("sekolah",$where);
    }
    public function insert($data){
        $this->db->insert("sekolah",$data);
    }
    public function update($data,$where){
        $this->db->update("sekolah",$data,$where);
    }
}