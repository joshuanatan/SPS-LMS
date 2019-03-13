<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdsoal extends CI_Model{
    public function select($where){
        return $this->db->get_where("soal",$where);
    }
    public function insert($data){
        $this->db->insert("soal",$data);
    }
    public function update($data,$where){
        $this->db->update("soal",$data,$where);
    }
}