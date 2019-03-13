<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdaktivitasmingguan extends CI_Model{
    public function select($where){
        return $this->db->get_where("aktivitas_mingguan",$where);
    }
    public function insert($data){
        $this->db->insert("aktivitas_mingguan",$data);
    }
    public function update($data,$where){
        $this->db->update("aktivitas_mingguan",$data,$where);
    }
}