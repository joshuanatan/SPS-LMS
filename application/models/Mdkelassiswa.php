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
    public function remove($where){
        $this->db->delete("kelas_siswa",$where);
    }
    public function carikelas($where){
        $this->db->join("siswa_angkatan","siswa_angkatan.id_siswa_angkatan = kelas_siswa.id_siswa_angkatan","inner");
        $this->db->join("siswa","siswa.id_siswa = siswa_angkatan.id_siswa","inner");
        $this->db->join("user","user.id_user = siswa.id_user","inner");
        $this->db->join("kelas","kelas.id_kelas = kelas_siswa.id_kelas","inner");
        return $this->db->get_where("kelas_siswa",$where);
    }
}