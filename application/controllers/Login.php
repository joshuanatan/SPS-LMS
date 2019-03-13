<?php
defined("BASEPATH") OR exit("No Direct Script");

class Login extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model(array("Mduser"));
        $this->req();
    }
    private function req(){
        $this->load->view("login/req/head");
        $this->load->view("login/req/content-open");
    }
    public function index(){
        $this->load->view("login/main/logo");
        $this->load->view("login/main/form");
    }
    private function close(){
        $this->load->view("login/req/content-close");
        $this->load->view("login/req/html-close");
        $this->load->view("login/req/script");
    }
    public function signin(){
        $username = $this->input->post("id");
        $password = md5($this->input->post("pass"));
        $where = array(
            "id_user" => $username,
            "password" => $password
        );
        $result = $this->Mduser->select($where)->result();
        foreach($result as $a){
            $this->session->username = ucwords($a->nama_depan)." ".ucwords($a->nama_belakang);
            $this->session->role = $a->id_role;
            $this->session->email = $a->email;
            $this->session->id_user = $a->id_user;
            switch($a->id_role){
                case "1" :
                    $this->session->role = "siswa";
                    redirect("user/siswa/index");
                    break;
                case "2":
                    $this->session->role = "guru";
                    redirect("user/guru/index");
                    break;
                case "3":
                    $this->session->role = "orangtua";
                    redirect("user/orangtua/index");
                    break;
                case "4":
                    $this->session->role = "kesiswaan";
                    redirect("user/kesiswaan/index");
                    break;
                case "5":
                    $this->session->role = "akademik";
                    redirect("user/akademik/index");
                    break;
            }
        }
        
    }
    public function signout(){
        $this->session->sess_destroy();
        redirect("login");
    }
}