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
        $this->db->select('guru.id_guru,guru.id_user,guru.status_guru,guru.tgl_submit_guru,guru.id_matpel,matapelajaran.id_matpel,matapelajaran.nama_matpel,user.id_user,user.nama_depan,guru_tahunan.id_gurutahunan,guru_tahunan.id_guru,penugasan_guru.id_penugasan,penugasan_guru.id_gurutahunan')
            ->from('penugasan_guru')
            ->join('guru_tahunan','guru_tahunan.id_gurutahunan = penugasan_guru.id_gurutahunan','inner')
            ->join('guru','guru.id_guru = guru_tahunan.id_guru','inner')
            ->join('matapelajaran','matapelajaran.id_matpel = guru.id_matpel','inner')
            ->join('user','user.id_user = guru.id_user','inner')
            ->where("penugasan_guru.id_kelas",$this->session->idkelas);
        return $this->db->get();
    }
    
}