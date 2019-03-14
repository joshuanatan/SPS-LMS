<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdsiswa extends CI_Model{
    public function select($where){
        $this->db->join("user","siswa.id_user = user.id_user","inner");
        //$this->db->join("siswa_angkatan","siswa_angkatan.id_siswa = siswa.id_siswa","inner");
        return $this->db->get_where("siswa",$where);
    }
    public function insert($data){
        $this->db->insert("siswa",$data);
    }
    public function update($data,$where){
        $this->db->update("siswa",$data,$where);
    }
    public function assigned($where){
        $this->db->where($where); // id kelas yang dipilih
        $this->db->select("user.nama_depan, user.nama_belakang, siswa_angkatan.id_siswa_angkatan");
        $this->db->from("siswa_angkatan");
        $this->db->join("siswa","siswa_angkatan.id_siswa = siswa.id_siswa","inner");
        $this->db->join("user","user.id_user = siswa.id_user","inner");
        $this->db->join("kelas_siswa","kelas_siswa.id_siswa_angkatan = siswa_angkatan.id_siswa_angkatan","inner");
        $this->db->where("siswa_angkatan.id_siswa_angkatan not in (select kelas_siswa.id_siswa_angkatan from kelas_siswa)",NULL,FALSE);
        
        return $this->db->get();
        //select user.nama_depan, user.nama_belakang, siswa_angkatan.id_siswa_angkatan from siswa_angkatan inner join siswa on siswa_angkatan.id_siswa = siswa.id_siswa inner join user on user.id_user = siswa.id_user inner join kelas_siswa on kelas_siswa.id_siswa_angkatan = siswa_angkatan.id_siswa_angkatan and kelas_siswa.id_kelas = 4
    }
    public function status($where){
        $this->db->where($where); // jurusan
        $this->db->select("user.nama_depan, user.nama_belakang, siswa_angkatan.id_siswa_angkatan");
        $this->db->from("siswa_angkatan");
        $this->db->join("siswa","siswa_angkatan.id_siswa = siswa.id_siswa","inner");
        $this->db->join("user","user.id_user = siswa.id_user","inner");
        $this->db->where("siswa_angkatan.id_siswa_angkatan not in (select kelas_siswa.id_siswa_angkatan from kelas_siswa where kelas_siswa.id_kelas = ".$this->session->idkelas.")",NULL,FALSE);
        return $this->db->get();
        
    }
    public function assigned2(){
        //$this->db->where($where); // id kelas yang dipilih
        $this->db->select("user.nama_depan, user.nama_belakang, siswa_angkatan.id_siswa_angkatan");
        $this->db->from("siswa_angkatan");
        $this->db->join("siswa","siswa_angkatan.id_siswa = siswa.id_siswa","inner");
        $this->db->join("user","user.id_user = siswa.id_user","inner");
        $this->db->join("kelas_siswa","kelas_siswa.id_siswa_angkatan = siswa_angkatan.id_siswa_angkatan","inner");
        $this->db->where("siswa_angkatan.id_siswa_angkatan not in (select kelas_siswa.id_siswa_angkatan from kelas_siswa)",NULL,FALSE);
        
        return $this->db->get();
    }
    public function status2(){
        //$this->db->where($where); // jurusan
        $this->db->select("user.nama_depan, user.nama_belakang, siswa_angkatan.id_siswa_angkatan");
        $this->db->from("siswa_angkatan");
        $this->db->join("siswa","siswa_angkatan.id_siswa = siswa.id_siswa","inner");
        $this->db->join("user","user.id_user = siswa.id_user","inner");
        $this->db->where("siswa_angkatan.id_siswa_angkatan not in (select kelas_siswa.id_siswa_angkatan from kelas_siswa)",NULL,FALSE);
        return $this->db->get();
        /*
        query = select kelas.kelas,kelas.jurusan,kelas.jurusan, kelas.urutan from kelas where kelas.id_kelas not in (select penugasan_guru.id_kelas from penugasan_guru) and guru.id_guru not in (select id_gurutahunan from penugasan_guru) and kelas.jurusan = IPA and id_tahun_ajaran = 2
        */
    }
}