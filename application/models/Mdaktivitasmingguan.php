<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdaktivitasmingguan extends CI_Model{
    public function select($where){
        return $this->db->get_where("aktivitas_mingguan",$where);
    }
    public function insert($data){
        $this->db->insert("aktivitas_mingguan",$data);
    }
    public function update($data,$where){
        $this->db->update("aktivitas_mingguan",$data,$where);
    }
    public function selectaktivitasmingguanguru(){
        /*$this->db->where($where); // ini buat nyatet gurunya siapa
        $this->db->join("jadwal", "jadwal.id_jadwal = aktivitas_mingguan.id_jadwal","inner");
        $this->db->join("guru_tahunan", "guru_tahunan.id_gurutahunan = jadwal.id_gurutahunan","inner");
        $this->db->join("guru", "guru.id_guru = guru_tahunan.id_guru","inner");
        $this->db->join("user", "user.id_user =guru.id_user","inner");
        $this->db->order_by("id_kelas");
        $this->db->group_by(array("jadwal.id_kelas","jadwal.hari"));
        return $this->db->get("aktivitas_mingguan");*/
        //echo $this->session->id_user;
        
        return $this->db->query("select * from aktivitas_mingguan inner join jadwal on jadwal.id_jadwal = aktivitas_mingguan.id_jadwal inner join kelas on kelas.id_kelas = jadwal.id_kelas inner join guru_tahunan on guru_tahunan.id_gurutahunan = jadwal.id_gurutahunan inner join guru on guru.id_guru = guru_tahunan.id_guru inner join user on user.id_user =guru.id_user where user.id_user = ".$this->session->id_user." order by jadwal.id_kelas");
    }
    public function selectaktivitasmingguanguru2(){
        /*$this->db->where($where); // ini buat nyatet gurunya siapa
        $this->db->join("jadwal", "jadwal.id_jadwal = aktivitas_mingguan.id_jadwal","inner");
        $this->db->join("guru_tahunan", "guru_tahunan.id_gurutahunan = jadwal.id_gurutahunan","inner");
        $this->db->join("guru", "guru.id_guru = guru_tahunan.id_guru","inner");
        $this->db->join("user", "user.id_user =guru.id_user","inner");
        $this->db->order_by("id_kelas");
        $this->db->group_by(array("jadwal.id_kelas","jadwal.hari"));
        return $this->db->get("aktivitas_mingguan");*/
        //echo $this->session->id_user;
        return $this->db->query("select * from aktivitas_mingguan inner join jadwal on jadwal.id_jadwal = aktivitas_mingguan.id_jadwal inner join kelas on kelas.id_kelas = jadwal.id_kelas inner join guru_tahunan on guru_tahunan.id_gurutahunan = jadwal.id_gurutahunan inner join guru on guru.id_guru = guru_tahunan.id_guru inner join user on user.id_user =guru.id_user where user.id_user = ".$this->session->id_user." and kelas.id_kelas = ".$this->session->idkelas." order by jadwal.id_kelas");
    }
    public function delete($where){
        $this->db->delete("aktivitas_mingguan",$where);
    }
    public function selectaktivitas($where){
        $this->db->where($where);
        $this->db->join("jadwal","jadwal.id_jadwal = aktivitas_mingguan.id_jadwal","inner");
        $this->db->join("guru_tahunan","guru_tahunan.id_gurutahunan = jadwal.id_gurutahunan","inner");
        $this->db->join("guru","guru.id_guru = guru_tahunan.id_guru","inner");
        $this->db->join("user", "user.id_user = guru.id_user","inner");
        $result = $this->db->get("aktivitas_mingguan")->result();
        $i = "";
        foreach($result as $a){
            $i .= "<option value = '".$a->id_mingguan."'>".$a->materi_mingguan."</option>";
        }
        return $i;
    }
    //public function 
}