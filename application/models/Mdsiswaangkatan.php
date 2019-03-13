<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdsiswaangkatan extends CI_Model{
    public function select($where){
        return $this->db->get_where("siswa_angkatan",$where);
    }
    public function insert($data){
        $this->db->insert("siswa_angkatan",$data);
    }
    public function update($data,$where){
        $this->db->update("siswa_angkatan",$data,$where);
    }
}