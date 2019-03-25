<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdsiswaangkatan extends CI_Model{
    public function select($where){
        $this->db->join("siswa","siswa.id_siswa = siswa_angkatan.id_siswa","inner");
        $this->db->join("user","user.id_user = siswa.id_user","inner");
        return $this->db->get_where("siswa_angkatan",$where);
    }
    public function insert($data){
        $this->db->insert("siswa_angkatan",$data);
    }
    public function update($data,$where){
        $this->db->update("siswa_angkatan",$data,$where);
    }
}