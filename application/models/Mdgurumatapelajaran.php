<?php
class Mdgurumatapelajaran extends CI_Model{
    public function select($where){
        $this->db->join("kelas","kelas.id_kelas = penugasan_guru.id_kelas","right outer");
        return $this->db->get_where("penugasan_guru");
    }
    public function assigned($where){
        $this->db->where($where); // id guru yang dipilih
        $this->db->select("penugasan_guru.id_penugasan,kelas.kelas,kelas.jurusan,kelas.jurusan,kelas.urutan");
        $this->db->from("penugasan_guru");
        $this->db->join("kelas","kelas.id_kelas = penugasan_guru.id_kelas","inner");
        return $this->db->get();
    }
    public function status($where){
        $this->db->where("kelas.id_kelas not in (select penugasan_guru.id_kelas from penugasan_guru where penugasan_guru.id_gurutahunan = ".$this->session->idgurupilihkelas.")",NULL,FALSE);
        $this->db->where($where); // jurusan ipa
        $this->db->select("kelas.id_kelas,kelas.kelas,kelas.jurusan,kelas.jurusan, kelas.urutan");
        $this->db->group_by("kelas.id_kelas");
        $this->db->from("kelas,guru");
        return $this->db->get();
        /*
        query = select kelas.kelas,kelas.jurusan,kelas.jurusan, kelas.urutan from kelas where kelas.id_kelas not in (select penugasan_guru.id_kelas from penugasan_guru) and guru.id_guru not in (select id_gurutahunan from penugasan_guru) and kelas.jurusan = IPA and id_tahun_ajaran = 2
        */
    }
    public function insert($data){
        $this->db->insert("penugasan_guru",$data);
    }
    public function remove($where){
        $this->db->delete("penugasan_guru",$where);
    }
}