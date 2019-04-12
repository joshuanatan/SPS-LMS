<?php
defined("BASEPATH") OR exit("No Direct Script");

class Login extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model(array("Mdusersuperadmin"));
        $this->req();
    }
    private function req(){
        $this->load->view("login/req/head");
        $this->load->view("login/req/content-open");
    }
    public function index(){
        $abc = array(
            "def" => 0
        );
        $this->load->view("login/main/logo");
        $this->load->view("login/main/form");
    }
    private function close(){
        $this->load->view("login/req/content-close");
        $this->load->view("login/req/html-close");
        $this->load->view("login/req/script");
    }
    public function signin(){
        
        $email = $this->input->post("email");
        $password = md5($this->input->post("pass"));
        $where = array(
            "email" => $email,
            "password" => $password
        );
        $result = $this->Mdusersuperadmin->select($where)->result();
        foreach($result as $a){
            $this->session->username = ucwords($a->nama_depan)." ".ucwords($a->nama_belakang);
            $this->session->id = $a->id_user;
            $this->session->role = $a->role;
            $this->session->email = $a->email;
            switch($a->role){
                case "0" :
                    $this->session->role = "0";
                    redirect("user/sekolah");
                    break;
                case "1":
                    $this->session->role = "1";
                    redirect("user/sekolah");
                    break;
                
            }
        }
        
    }
    public function signout(){
        $this->session->sess_destroy();
        redirect("login");
    }
}