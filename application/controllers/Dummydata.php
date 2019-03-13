<?php
defined("BASEPATH") OR exit("No direct script");

class Dummydata extends CI_Controller{
    function __construct(){
        parent::__construct();
        
    }
    public function insertUser(){
        $this->load->model("Mduser");
        $data = array(
            "nama_depan" => $this->input->post("namadepan"),
            "nama_belakang" =>  $this->input->post("namabelakang"),
            "tanggal_lahir" =>  $this->input->post("tgllahir"),
            "nomor_telpon" =>  $this->input->post("nohp"),
            "email" =>  $this->input->post("email"),
            "alamat" =>  $this->input->post("alamat"),
            "password" =>  $this->input->post("password"),
            "tgl_submit" =>  $this->input->post("tglsubmit"),
            "id_admin" =>  $this->session->username,
            "status" =>  0,
            "id_role"=> $this->input->post("role"),
        );
        $this->Mduser->insert($data);
    }
    public function insertUser2(){
        for($a = 2; $a<=5; $a++){ 
        $this->load->model("Mduser");
            $data = array(
                "nama_depan" => 'joshua',
                "nama_belakang" =>  'natan',
                "tanggal_lahir" => date('y-m-d'),
                "nomor_telpon" =>  '089616961915',
                "email" =>  'joshuanatan.jn@gmail.com',
                "alamat" =>  'abc',
                "password" =>  md5('123456'),
                "tgl_submit" =>  date('y-m-d'),
                "id_admin" =>  $this->session->username,
                "status" =>  0,
                "id_role"=> $a,
            );
            $this->Mduser->insert($data);
        }
    }
    public function insertHakAkses(){
        $this->load->model("Mdhakakses");
        $data = array(
            "id_role" =>  $this->input->post("idrole"),
            "id_menu" =>  $this->input->post("idmenu"),
            "status_hak_akses" => 0,
            "tgl_submit_hak_akses" => date("Y-m-d")
        );
        $this->Mdhakakses->insert($data);
    }
    public function insertJawabanQuiz(){
        $this->load->model("Mdjawabanquiz");
        $data = array(
            "id_soal" =>  $this->input->post("idsoal"),
            "id_user" =>  $this->input->post("iduser"),
            "jawaban_quiz" =>  $this->input->post("jawaban"),
            "status_jawaban" => 0,
            "tgl_submit_jawaban" => date('y-m-d')
        );
        $this->Mdjawabanquiz->insert($data);
    }
    public function insertJenisDokumen(){
        $this->load->model("Mdjenisdokumen");
        $data = array(
            "nama_jenis_dokumen" =>$this->input->post("namajenis"),
            "status_jenis_dokumen" => 0,
            "tgl_submit_jenis_dokumen" => date('Y-m-d'),
            "peruntukan"
        );
        $this->Mdjenisdokumen->insert($data);
    }
    public function insertMataPelajaran(){
        $this->load->model("Mdmatapelajaran");
        $data = array(
            "nama_matpel" =>  $this->input->post("namamatpel"),
            "status_matpel" => 0,
            "tgl_submit_matpel" => date("Y-m-d")
        );
        $this->Mdmatapelajaran->insert($data);
    }
    public function insertOrangTua(){
        $this->load->model("Mdorangtua");
        $data = array(
            "id_user" =>  $this->input->post("iduser"),
            "pekerjaan" =>  $this->input->post("pekerjaan"),
            "status_orangtua" => 0,
            "tgl_submit_orangtua" => date('Y-m-d')
        );
        $this->Mdorangtua->insert($data);
    }
    public function insertPengumuman(){
        $this->load->model("Mdpengumuman");
        $data = array(
            "id_jenis_dokumen" =>  $this->input->post("idjenis"),
            "id_user" =>  $this->input->post("iduser"),
            "konten" =>  $this->input->post("konten"),
            "status_pengumuman" => 0,
            "tgl_submit_pengumuman" => date('Y-m-d')
        );
        $this->Mdpengumuman->insert($data);
    }
    public function insertSiswaAngkatan(){
        $this->load->model("Mdsiswaangkatan");
        $data = array(
            "id_tahun_ajaran" =>  $this->input->post("idtahunajaran"),
            "id_siswa" =>  $this->input->post("idsiswa"),
            "kelas" =>  $this->input->post("kelas"),
            "status_siswa_angkatan" => 0,
            "tgl_submit_siswa_angkatan" => date('Y-m-d')
        );
        $this->Mdpengumuman->insert($data);
    }
    public function insertTahunAjaran(){
        $this->load->model("Mdtahunajaran");
        $data = array(
            "tahun_awal" =>  $this->input->post("tahunawal"),
            "tahun_akhir" =>  $this->input->post("tahunakhir"),
            "status_tahun_ajaran" => 0,
            "tgl_submit_tahunajaran" => date('Y-m-d')
        );
        $this->Mdtahunajaran->insert($data);
    }   
    public function insertWakasek(){
        $this->load->model("Mdwakasek");
        $data = array(
            "id_guru" =>  $this->input->post("idguru"),
            "jenis_wakasek" =>  $this->input->post("jeniswakasek"),
            "status_wakasek" => 0,
            "tgl_submit_wakasek" => date('Y-m-d')
        );
        $this->Mdwakasek->insert($data);
    }
}