<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdkelas extends CI_Model{
    public function select($where){
        $this->db->join("guru","guru.id_guru = kelas.id_gurutahunan","inner");
        $this->db->join("user","guru.id_user = user.id_user","inner");
        return $this->db->get_where("kelas",$where);
    }
    public function insert($data){
        $this->db->insert("kelas",$data);
    }
    public function update($data,$where){
        $this->db->update("kelas",$data,$where);
    }
    public function remove($where){
        $this->db->where($where);
        $this->db->delete("kelas");
    }
}