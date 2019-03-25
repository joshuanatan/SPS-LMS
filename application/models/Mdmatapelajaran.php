<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdmatapelajaran extends CI_Model{
    public function select($where){
        return $this->db->get_where("matapelajaran",$where);
    }
    public function insert($data){
        $this->db->insert("matapelajaran",$data);
    }
    public function update($data,$where){
        $this->db->update("matapelajaran",$data,$where);
    }
    
    public function matpel(){
        $this->db->select('*')
            ->from('jadwal')
            ->join('guru_tahunan','guru_tahunan.id_gurutahunan = jadwal.id_gurutahunan','inner')
            ->join('guru','guru.id_guru = guru_tahunan.id_guru','inner')
            ->join('matapelajaran','matapelajaran.id_matpel = guru.id_matpel','inner')
            ->join('user','user.id_user = guru.id_user','inner')
            ->where("jadwal.id_kelas",$this->session->id_kelas)->group_by("matapelajaran.id_matpel,guru.id_guru");
        return $this->db->get();
        /*
        query = select * from jadwal inner join guru_tahunan on guru_tahunan.id_gurutahunan = jadwal.id_gurutahunan inner join guru on guru.id_guru = guru_tahunan.id_guru inner join matapelajaran on matapelajaran.id_matpel = guru.id_matpel inner join user on user.id_user = guru.id_user where jadwal.id_kelas = 13 group by matapelajaran.id_matpel,guru.id_guru
        */
    }
    public function aktivitas($where){
        $this->db->join("jadwal","jadwal.id_jadwal = aktivitas_mingguan.id_jadwal");
        $this->db->where("jadwal.id_kelas ",$this->session->id_kelas);
        $this->db->where($where);
        return $this->db->get("aktivitas_mingguan");
        /*
        query = select * from aktivitas_mingguan inner join jadwal on jadwal.id_jadwal = aktivitas_mingguan.id_jadwal where jadwal.id_kelas = 13 and jadwal.id_gurutahunan = 2
        */
    }
}