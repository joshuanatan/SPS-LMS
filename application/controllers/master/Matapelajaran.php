<?php
//manage matpel<?php
defined("BASEPATH") OR exit("No Direct Script");

class Matapelajaran extends CI_Controller{
    public function session_check(){
        if($this->session->id_user == ""){
            redirect("login");

        }
        if($this->session->tahunajaran == ""){
            redirect("user/".$this->session->role."/index");
        }
        /*
        $this->session_check();
        */
    }
    public function __construct(){
        parent::__construct();
        $this->req();
        $this->load->model(array("Mduser","Mdmatapelajaran"));
    }
    public function req(){
        $this->session_check();

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
        $this->session_check();
        
        $this->load->view("req/footer");
        $this->load->view("req/content-container-close");
        $this->load->view("req/html-close");
        $this->load->view("script/js-main");
    }
    public function index(){
        $this->session_check();

        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where = array();
        $data = array(
            "matpel" => $this->Mdmatapelajaran->select($where)->result()
        );
        $this->load->view("user/akademik/matapelajaran",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function insertMatpel(){
        $this->session_check();

        $data = array(
            "nama_matpel" => $this->input->post("nama"),
            "jenis_matpel" => $this->input->post("jenis"),
            "kkm" => $this->input->post("kkm"),
            "tugas" => $this->input->post("tugas"),
            "lab" => $this->input->post("lab"),
            "quiz" => $this->input->post("quiz"),
            "uh" => $this->input->post("uh"),
            "uts" => $this->input->post("uts"),
            "uas" => $this->input->post("uas"),
            "status_matpel" => 0,
            "tgl_submit_matpel" => date('Y-m-d')
        );
        $this->Mdmatapelajaran->insert($data);
        redirect("master/matapelajaran");
    }
    public function editMatpel($i){
        $this->session_check();

        $where =array(
            "id_matpel" => $i
        );
        $data = array(
            "nama_matpel" => $this->input->post("nama"),
            "jenis_matpel" => $this->input->post("jenis"),
            "kkm" => $this->input->post("kkm"),
            "tugas" => $this->input->post("tugas"),
            "lab" => $this->input->post("lab"),
            "quiz" => $this->input->post("quiz"),
            "uh" => $this->input->post("uh"),
            "uts" => $this->input->post("uts"),
            "uas" => $this->input->post("uas"),
            "status_matpel" => 0,
            "tgl_submit_matpel" => date('Y-m-d')
        );
        $this->Mdmatapelajaran->update($data,$where);
        redirect("master/matapelajaran");
    }
    public function deleteMatpel($i){
        $this->session_check();

        $data = array(
            "status_matpel" => 1
        );
        $where = array(
            "id_matpel" => $i
        );
        $this->Mdmatapelajaran->update($data,$where);
        redirect("master/matapelajaran");
    }
    public function activeMatpel($i){
        $data = array(
            "status_matpel" => 0
        );
        $where = array(
            "id_matpel" => $i
        );
        $this->Mdmatapelajaran->update($data,$where);
        redirect("master/matapelajaran");
    }
}
?>