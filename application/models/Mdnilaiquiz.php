<?php
class Mdnilaiquiz extends CI_Model{
    public function insert($data){
        $this->db->insert("nilai_quiz",$data);
    }
    public function laporannilai($id_matpel){
        $this->db->join("quiz","quiz.id_quiz = nilai_quiz.id_quiz","inner");
        $this->db->join("aktivitas_mingguan","aktivitas_mingguan.id_mingguan = quiz.id_mingguan","inner");
        $this->db->join("jadwal","jadwal.id_jadwal = aktivitas_mingguan.id_jadwal","inner");
        $this->db->join("guru_tahunan","guru_tahunan.id_gurutahunan = jadwal.id_gurutahunan","inner");
        $this->db->join("guru","guru.id_guru = guru_tahunan.id_guru","inner");
        $this->db->join("matapelajaran","matapelajaran.id_matpel = guru.id_matpel","inner");
        $this->db->where("nilai_quiz.id_siswa",$this->session->id_siswa);
        $this->db->where("guru.id_matpel",$id_matpel);
        return $this->db->get("nilai_quiz");
        /*
        query = SELECT * FROM `nilai_quiz` inner join quiz on quiz.id_quiz = nilai_quiz.id_quiz inner join aktivitas_mingguan on aktivitas_mingguan.id_mingguan = quiz.id_mingguan inner join jadwal on jadwal.id_jadwal = aktivitas_mingguan.id_jadwal inner join guru_tahunan on guru_tahunan.id_gurutahunan = jadwal.id_gurutahunan inner join guru on guru.id_guru = guru_tahunan.id_guru inner join matapelajaran on matapelajaran.id_matpel = guru.id_matpel where nilai_quiz.id_siswa = 5 and guru.id_matpel = 1
        */
    }
}