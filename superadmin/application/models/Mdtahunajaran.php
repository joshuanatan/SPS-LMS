<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdtahunajaran extends CI_Model{
    public function select($where){
        return $this->db->get_where("tahun_ajaran",$where);
    }
    public function insert($data){
        $this->db->insert("tahun_ajaran",$data);
    }
    public function update($data,$where){
        $this->db->update("tahun_ajaran",$data,$where);
    }
}