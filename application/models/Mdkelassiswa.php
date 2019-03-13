<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdkelassiswa extends CI_Model{
    public function select($where){
        return $this->db->get_where("kelas_siswa",$where);
    }
    public function insert($data){
        $this->db->insert("kelas_siswa",$data);
    }
    public function update($data,$where){
        $this->db->update("kelas_siswa",$data,$where);
    }
}