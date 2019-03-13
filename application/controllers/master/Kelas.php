<?php
//manage guru
//mengassign guru
defined("BASEPATH") OR exit("No Direct Script");

class Kelas extends CI_Controller{
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
        $this->load->model("Mdgurutahunan");
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where = array();
        $where2 = array(
            "id_tahun_ajaran" => $this->session->tahunajaran
        );
        $data = array(
            "kelas" => $this->Mdkelas->select($where2)->result(),
            "walikelas" => $this->Mdgurutahunan->select($where2)->result(),
            //"stockwalikelas" => $this->Mdgurutahunan->nonwalikelas()->result()
        );
        $this->load->view("user/akademik/kelas",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function tambahKelas(){
        $this->load->model(array("Mduser","Mdkelas"));
        $where2 = array(
            "kelas" => $this->input->post("kelas"),
            "jurusan" => $this->input->post("jurusan")
        );
        $jumlah = $this->Mdkelas->select($where2)->num_rows();
        $data = array(
            "kelas" => $this->input->post("kelas"),
            "jurusan" => $this->input->post("jurusan"),
            "urutan" => $jumlah+1,
            "id_gurutahunan" => $this->input->post("walikelas"),
            "id_tahun_ajaran" => $this->session->tahunajaran,
            "tgl_submit_kelas" =>  date('Y-m-d'),
            "status_kelas" =>  0,
        );
        $this->Mdkelas->insert($data);
        
        redirect("master/kelas");
    }
    public function remove($i){
        $data = array(
            "status_kelas" => 1
        );
        $where = array(
            "id_kelas" => $i
        );
        $this->Mdkelas->update($data,$where);
        redirect("master/kelas");
    }
    
    public function active($i){
        $data = array(
            "status_kelas" => 0
        );
        $where = array(
            "id_kelas" => $i
        );
        $this->Mdkelas->update($data,$where);
        redirect("master/kelas");
    }
    
    public function editKelas($i){
        $this->load->model(array("Mduser","Mdkelas"));
        $where = array(
            "id_kelas" => $i
        );
        $data = array(
            "kelas" => $this->input->post("kelas"),
            "jurusan" => $this->input->post("jurusan"),
            "urutan" => $this->input->post("urutan"),
            "id_gurutahunan" => $this->input->post("id_guru"),
            "tgl_submit_kelas" =>  date('Y-m-d'),
            "id_admin" =>  $this->session->id_user,
            "status_kelas" =>  0,
        );
        $this->Mdkelas->update($data,$where);
        
        redirect("master/kelas");
    }
}
?> 