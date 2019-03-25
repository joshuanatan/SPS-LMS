<?php
//load tugas yang belum selesai
//pilih mata pelajaran
defined("BASEPATH") OR exit("No Direct Script");

class Assignment extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->req();
    }
    public function req(){
        $this->load->view("req/html-open");
        $this->load->view("req/head");
        $this->load->view("user/siswa/menu");
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
    
    /*akses menu*/
    public function index(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        $this->load->model("Mdmatapelajaran");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $data['matpel'] = $this->Mdmatapelajaran->matpel()->result();
        $this->load->view("user/siswa/index2",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    /*end akses menu*/
    
}?>