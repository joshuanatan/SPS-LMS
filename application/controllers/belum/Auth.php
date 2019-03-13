<?php
defined("BASEPATH") OR exit("No Direct Script");

class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->req();
        $this->load->model(array("Mduser"));
    }
    public function req(){
        $this->load->view("req/html-open");
        $this->load->view("req/head");
        $this->session->status = 0;
    }
    public function close(){
        
        //$this->load->view("req/footer");
        //$this->load->view("req/content-container-close");
        $this->load->view("req/html-close");
    }
    public function index(){
        //$this->load->view("namapage/breadcrumb");
        //$this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->view("login/index");
        /* endnya disini */
        //$this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
    }
    public function validate(){
        $data = array(
            "id_user" => $this->input->post("id"),
            "password_user" => md5($this->input->post("password"))
        );
        $result = $this->Mduser->select($data);
        //echo $result->num_rows();
        foreach($result->result() as $a){
            $this->session->id_user = $a->id_user;
            $this->session->nama_user = $a->nama_user;
            $this->session->id_role = $a->id_role;
            $this->session->email_user = $a->email_user;
            switch($a->id_role){
                case 1: redirect("admin");
                case 2: redirect("akademik");
                case 3: redirect("kesiswaan");
                case 4: redirect("siswa");
                case 5: redirect("guru");
            }
        }
        $this->session->status = 1;
        //redirect("auth/index");
    }
    public function setsession(){
        $this->session->username = "1";
    }
}