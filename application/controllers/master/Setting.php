<?php
//manage guru
//mengassign guru
defined("BASEPATH") OR exit("No Direct Script");

class Setting extends CI_Controller{
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
        $this->load->model(array("Mdsetting"));
    }
    public function req(){
        $this->session_check();

        $this->load->view("req/html-open");
        $this->load->view("req/head");
        $this->load->view("user/kesiswaan/menu");
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
        $this->load->model("Mdsetting");
        $this->load->model("Mdtahunajaran");
        $where = array();
        $data = array(
            "setting" => $this->Mdsetting->select($where),
            "tahunajaran" => $this->Mdtahunajaran->select($where),
        );
        $this->load->view("user/kesiswaan/setting",$data);
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function tambahSetting(){
        $this->load->model("Mdsetting");
        $data = array(
            "id_tahun_ajaran" => $this->input->post("id_tahun_ajaran"),
            "id_next_tahun_ajaran" => $this->input->post("id_tahun_berikut"),
            "status" => 1
        );
        $this->Mdsetting->insert($data);
        redirect("master/setting/index");
    }
    public function active($i){
        $where = array(

        );
        $data = array(
            "status" => 1
        );
        $this->load->model("Mdsetting");
        $this->Mdsetting->update($data,$where);

        $where = array(
            "id_setting" => $i
        );
        $data = array(
            "status" => 0
        );
        $this->Mdsetting->update($data,$where);
        redirect("master/setting/index");
    }
    public function nonactive($i){
        $where = array(
            "id_setting" => $i
        );
        $data = array(
            "status" => 1
        );
        $this->Mdsetting->update($data,$where);
        redirect("master/setting/index");
    }
    public function hapus($i){
        $where = array(
            "id_setting" => $i
        );
        $this->Mdsetting->delete($where);
        redirect("master/setting/index");
        
    }
    public function edit($i){
        $where = array(
            "id_setting" => $i
        );
        $data = array(
            "id_tahun_ajaran" => $this->input->post("id_tahun_ajaran"),
            "id_next_tahun_ajaran" => $this->input->post("id_next_tahun_ajaran")
        );
        $this->Mdsetting->update($data,$where);
        redirect("master/setting/index");
    }
}
?> 