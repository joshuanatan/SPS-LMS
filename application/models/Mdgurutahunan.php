<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdgurutahunan extends CI_Model{
    public function select($where){
        $this->db->join("guru","guru.id_guru = guru_tahunan.id_guru","inner");
        $this->db->join("user","user.id_user = guru.id_user","inner");
        $this->db->join("penugasan_guru","penugasan_guru.id_gurutahunan = guru_tahunan.id_gurutahunan","inner");
        $this->db->group_by("guru_tahunan.id_gurutahunan");
        $this->db->join("matapelajaran","matapelajaran.id_matpel = guru.id_matpel","inner");
        return $this->db->get_where("guru_tahunan",$where);
    }
    public function select2($where){

        $this->db->join("guru","guru.id_guru = guru_tahunan.id_guru","inner");
        $this->db->join("user","user.id_user = guru.id_user","inner");
        //$this->db->join("penugasan_guru","penugasan_guru.id_gurutahunan = guru_tahunan.id_gurutahunan","inner");
        $this->db->group_by("guru_tahunan.id_gurutahunan");
        $this->db->join("matapelajaran","matapelajaran.id_matpel = guru.id_matpel","inner");
        return $this->db->get_where("guru_tahunan",$where);
    }
    public function insert($data){
        $this->db->insert("guru_tahunan",$data);
    }
    public function update($data,$where){
        $this->db->update("guru_tahunan",$data,$where);
    }
    public function nonwalikelas(){
        return $this->db->query("select * from gurutahunan where id_guru not in select id_gurutahunan from kelas where id_tahun_ajaran = ".$this->session->tahunajaran);
    }
    public function remove($where){
        $this->db->delete("guru_tahunan",$where);
    }
}