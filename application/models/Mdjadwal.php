<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdjadwal extends CI_Model{
    public function select($where){
        return $this->db->get_where("jadwal",$where);
    }
    public function insert($data){
        $this->db->insert("jadwal",$data);
    }
    public function update($data,$where){
        $this->db->update("jadwal",$data,$where);
    }
}