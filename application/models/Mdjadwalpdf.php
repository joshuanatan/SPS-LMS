<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdjadwalpdf extends CI_Model{
    
     public function selectjadwalguru($where){
        $this->db->where($where);
        $this->db->join("guru_tahunan","guru_tahunan.id_gurutahunan = jadwal.id_gurutahunan","inner");
        $this->db->join("guru","guru_tahunan.id_guru = guru.id_guru","inner");
        $this->db->join("user","guru.id_user = user.id_user","inner");
        $this->db->join("kelas","kelas.id_kelas = jadwal.id_kelas","inner");
        return $this->db->get("jadwal");
    }
    public function matpelpdf($where3){
        $this->db->select('*')
            ->from('matapelajaran')
            ->join('guru','guru.id_matpel = matapelajaran.id_matpel','inner')
            ->join('user','user.id_user = guru.id_user','inner')
            ->where("user.id_user",$where3);
        return $this->db->get(); 
    
}
    public function thajaran($where){
        $this->db->select('*')
            ->from('tahun_ajaran')
            ->join('guru_tahunan','guru_tahunan.id_tahun_ajaran = tahun_ajaran.id_tahun_ajaran','inner')
            ->join('guru','guru.id_guru = guru_tahunan.id_guru','inner')
            ->join('user','user.id_user = guru.id_user','inner')
            ->where("user.id_user",$where);
        return $this->db->get(); 
    
}
}