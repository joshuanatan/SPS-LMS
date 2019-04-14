<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdguru extends CI_Model{
    public function select($where){
        $this->db->join("user","user.id_user = guru.id_user","inner");
        $this->db->join("matapelajaran","matapelajaran.id_matpel = guru.id_matpel","inner");
        return $this->db->get_where("guru",$where);
    }
    public function insert($data){
        $this->db->insert("guru",$data);
    }
    public function update($data,$where){
        $this->db->update("guru",$data,$where);
    }
    public function selectuntukgurutahunan($where){
        
        $this->db->join("user","user.id_user = guru.id_user","inner");
        $this->db->join("matapelajaran","matapelajaran.id_matpel = guru.id_matpel","inner");
        $this->db->where("guru.id_guru not in (select guru_tahunan.id_guru from guru_tahunan where guru_tahunan.id_tahun_ajaran = '".$this->session->tahunajaran."')");
        return $this->db->get_where("guru",$where);
    }
}