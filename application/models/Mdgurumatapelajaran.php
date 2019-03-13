<?php
class Mdgurumatapelajaran extends CI_Model{
    public function select($where){
        $this->db->join("kelas","kelas.id_kelas = penugasan_guru.id_kelas","right outer");
        return $this->db->get_where("penugasan_guru");
    }
}