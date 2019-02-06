<?php
defined("BASEPATH") OR exit("No Direct Script");

class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("Mduser");
    }
    public function index(){
        $this->session->status = 1;
        $this->load->view("auth/index");
    }
    public function signin(){
        $this->load->view("auth/index");
    }
    public function signup(){
        $this->load->view("auth/signup");
    }
    public function logout(){
        $this->session->sess_destroy();
        $this->session->status = 1;
        redirect("Auth/index");
    }
    /*------------------------------------*/
    public function login(){
        $data = array(
            "username" => $this->input->post("username"),
            "password" => $this->input->post("password");
        );
        $res = $this->Mduser->login($data)->result();
        foreach($res as $a){
            $this->session->status = 0;    
        }
        if($this->session->status == 2){
            redirect("Auth/logout");
        }
        
        
    }
    public function insertmenu(){
        $data = array(
            "nama" => strtoupper("lagu"),
            "icon" => "lagu",
            "id_admin" => "joshuanatan.jn@gmail.com",
            "link" => "pembicara",
            "tgl_submit" => date('y-m-d'),
            "id_parent" => 2,
            "status" => 0
        );
        $this->Mdmenu->insert($data);
    }
}
?>