<?php
defined("BASEPATH") OR exit("No Direct Script");

class Welcome extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model(array("Mdmenu"));
        $this->req();
    }
    public function req(){
        $this->session->page = 0;
        $where = array(
            "status" => 0
        );
        $data = array(
            "menu" => $this->Mdmenu->select($where)->result()
        );
        $this->load->view("req/html-open");
        $this->load->view("req/head");
        $this->load->view("req/menu",$data);
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
        $this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
    }
    /*public function index(){
        if($this->session->role == "admin"){
            $this->load->view("");
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("message successfully sent")';
            echo '</script>';
            redirect("user/signin");
        }
    }
    public function insert(){
        
        if($this->session->role == "admin"){
            $this->load->view("");
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("message successfully sent")';
            echo '</script>';
            redirect("user/signin");
        }
    }
    public function submit(){
        
        if($this->session->role == "admin"){
            redirect("");        
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("message successfully sent")';
            echo '</script>';
            redirect("user/signin");
        }
    }
    public function edit($i){
        if($this->session->role == "admin"){
            $where = array(
                "id" => $i
            );
            $data = array(
            
            );
            $this->load->view("",$data);
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("message successfully sent")';
            echo '</script>';
            redirect("user/signin");
        }
    }
    public function update(){
        
        if($this->session->role == "admin"){
            redirect("");        
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("message successfully sent")';
            echo '</script>';
            redirect("user/signin");
        }
    }
    public function delete($i){
        if($this->session->role == "admin"){
            $data = array(
                "status" => 1
            );
            redirect("");
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("message successfully sent")';
            echo '</script>';
            redirect("user/signin");
        }
    }*/
}