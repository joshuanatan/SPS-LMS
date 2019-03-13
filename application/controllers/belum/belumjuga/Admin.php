<?php
defined("BASEPATH") OR exit("No Direct Script");

class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->req();
        $this->load->model(array("Mduser","Mdmatapelajaran"));
    }
    public function req(){
        $this->load->view("req/html-open");
        $this->load->view("req/head");
        $this->load->view("mockup-admin/menu");
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
    public function active($i){
        $where = array(
            "id_user" => $i
        );
        $data = array(
            "status" => 0
        );
        $this->Mduser->update($data,$where);
        redirect("admin");
    }
    public function remove($i){
        $where = array(
            "id_user" => $i
        );
        $data = array(
            "status" => 1
        );
        $this->Mduser->update($data,$where);
        redirect("admin");
    }
    public function index(){
        $where = array(
        );
        $data = array(
            "ae" => $this->Mduser->select($where)->result()
        );
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
       
        $this->load->view("mockup-admin/index",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function buka(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
       
        $this->load->view("mockup-admin/buka");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function project($i){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
       
        $this->load->view("mockup-superadmin/project");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
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
            "password" =>  md5($this->input->post("password")),
            "tgl_submit" =>  date('Y-m-d'),
            "id_admin" =>  $this->session->username,
            "status" =>  0,
            "id_role"=> $this->input->post("role"),
        );
        $this->Mduser->insert($data);
        redirect("admin/index");
    }
}