<?php
defined("BASEPATH") OR exit("No Direct Script");

class Jadwal extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->req();
        $this->load->model(array("Mduser","Mdmatapelajaran"));
    }
    public function req(){
        $this->load->view("req/html-open");
        $this->load->view("req/head");
        $this->load->view("user/akademik/menu");
        $this->load->view("req/content-container-open");
        $this->load->view("req/header-open");
        $this->load->view("req/logo");
        $this->load->view("req/header-widget-open");
        $this->load->view("req/search");
        $this->load->view("req/message");
        $this->load->view("req/notifikasi");
        $this->load->view("req/header-widget-close");
        $this->load->view("req/profile");
        $this->load->view("req/header-close");
    }
    public function close(){
        
        $this->load->view("req/footer");
        $this->load->view("req/content-container-close");
        $this->load->view("req/html-close");
        $this->load->view("script/js-main");
    }
    
    public function index(){
        $this->load->model("Mdkelas");
        $this->load->model("Mdgurumatapelajaran");
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where = array(
            
            "user.status" => 0,
            "guru.status_guru" => 0,
            "penugasan_guru.status_penugasan" =>0,
        );
        $where2 = array(
            "status_kelas" => 0,
            "id_tahun_ajaran" => $this->session->tahunajaran
        );  
        
        $data = array(
            "kelas" => $this->Mdkelas->select($where2)->result(),
            "guru" => $this->Mdgurumatapelajaran->select($where)->result()
        );
        $this->load->view("user/akademik/jadwal",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function kelas(){
        $this->load->model("Mdkelas");
        $this->load->model("Mdgurumatapelajaran");
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->session->pilihkelas = $this->input->post("kelas");
        $where = array(
            "id_kelas" => $this->session->pilihkelas
        );
        $result = $this->Mdkelas->select($where)->result();
        foreach($result as $a){
            $jenismatpel = $a->jurusan;
        }
        $where = array(
            
            "user.status" => 0,
            "guru.status_guru" => 0,
            "penugasan_guru.status_penugasan" =>0,
            "jenis_matpel" => $jenismatpel
        );
        $where3 = array(
            
            "user.status" => 0,
            "guru.status_guru" => 0,
            "penugasan_guru.status_penugasan" =>0,
            "jenis_matpel" => "UMUM"
        );
        $where2 = array(
            "status_kelas" => 0,
            "id_tahun_ajaran" => $this->session->tahunajaran
        );  
        $data = array(
            "kelas" => $this->Mdkelas->select($where2)->result(),
            "guru" => $this->Mdgurumatapelajaran->select($where)->result(),
            "guruumum" => $this->Mdgurumatapelajaran->select($where3)->result()
        );
        $this->load->view("user/akademik/jadwal",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
}
?>