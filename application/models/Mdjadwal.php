<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdjadwal extends CI_Model{
    public function select($where){
        return $this->db->get_where("jadwal",$where);
    }
    public function insert($data){
        $this->db->insert("jadwal",$data);
    }
    public function update($data,$where){
        $this->db->update("jadwal",$data,$where);
    }
    /*query cek 
    SELECT * FROM `penugasan_guru` inner join guru on guru.id_guru = penugasan_guru.id_gurutahunan inner join user on user.id_user = guru.id_user where id_kelas = 4 and penugasan_guru.id_penugasan not in (select jadwal.id_penugasan from jadwal where jadwal.hari ="senin" and jadwal.jam_pelajaran = 1)
    //senin & jam pelajaran dinamis
    */
}