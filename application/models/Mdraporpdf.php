<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdraporpdf extends CI_Model{
    public function nama($where){
        $this->db->select('user.nama_depan,user.nama_belakang');
        $this->db->from('user');
        $this->db->join('siswa', 'user.id_user = siswa.id_user','inner');
        $this->db->join('siswa_angkatan', 'siswa.id_siswa = siswa_angkatan.id_siswa','inner');
        $this->db->where($where);
        
        $query=$this->db->get();
        return $query;
    }
    
    public function kelas($where){
        $this->db->select('kelas.kelas,kelas.jurusan,kelas.urutan');
        $this->db->from('kelas');
        $this->db->join('kelas_siswa', 'kelas.id_kelas = kelas_siswa.id_kelas','inner');
        $this->db->join('siswa_angkatan', 'kelas_siswa.id_siswa_angkatan = siswa_angkatan.id_siswa_angkatan','inner');
        $this->db->where($where);
        
        $query=$this->db->get();
        return $query;
    }
    
    public function thajaran($where){
        $this->db->select('tahun_ajaran.tahun_awal,tahun_ajaran.tahun_akhir');
        $this->db->from('tahun_ajaran');
        $this->db->join('siswa_angkatan', 'tahun_ajaran.id_tahun_ajaran = siswa_angkatan.id_tahun_ajaran','inner');
        $this->db->where($where);
        
        $query=$this->db->get();
        return $query;
    }
    
    public function matpel($wherematpel){
        $this->db->select('*');
        $this->db->from('matapelajaran');
        $this->db->where($wherematpel);
        $this->db->or_where('jenis_matpel = "UMUM"');
        
        $query=$this->db->get();
        return $query;
    }
    
    
    
    public function nilai($wheremp){
        $this->db->select('penilaian.nilai_tugas,penilaian.nilai_lab,penilaian.nilai_uh,penilaian.nilai_uts,penilaian.nilai_uas');
        $this->db->from('penilaian');
        $this->db->join('penugasan_guru', 'penugasan_guru.id_penugasan = penilaian.id_penugasan','inner');
        $this->db->join('guru_tahunan', 'penugasan_guru.id_gurutahunan = guru_tahunan.id_gurutahunan','inner');
        $this->db->join('guru', 'guru_tahunan.id_guru = guru.id_guru','inner');
        $this->db->where($wheremp);
        
        $query=$this->db->get();
        return $query;
    }
    
    
    public function quiz($id_matpel){
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