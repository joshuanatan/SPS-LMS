<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdsiswa extends CI_Model{
    public function select($where){
        $this->db->join("user","siswa.id_user = user.id_user","inner");
        return $this->db->get_where("siswa",$where);
    }
    public function insert($data){
        $this->db->insert("siswa",$data);
    }
    public function update($data,$where){
        $this->db->update("siswa",$data,$where);
    }
}