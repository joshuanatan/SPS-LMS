<?php
//manage guru
//mengassign guru
defined("BASEPATH") OR exit("No Direct Script");

class Guru extends CI_Controller{
    public function session_check(){
        if($this->session->id_user == ""){
            redirect("login");

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
        $this->load->model("Mdsistemprofile");
        $where = array(
            "status_profile" => 0
        );
        $data = array(
            "profile" => $this->Mdsistemprofile->select($where)
        );
        $this->load->view("req/html-open");
        $this->load->view("req/head",$data);
        $this->load->view("user/akademik/menu");
        $this->load->view("req/content-container-open");
        $this->load->view("req/header-open");
        $this->load->view("req/logo",$data);
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
        $this->session_check();

        $this->load->model("Mdguru");
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where = array();
        $where2 = array(
            "status_matpel" => 0
        );
        $data = array(
            "guru" => $this->Mdguru->select($where)->result(),
            "matpel" => $this->Mdmatapelajaran->select($where2)->result(),
        );
        $this->load->view("user/akademik/guru",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function tambah(){
        $this->session_check();

        $this->load->model(array("Mduser","Mdguru"));
        $data = array(
            "nama_depan" => $this->input->post("namadepan"),
            "nama_belakang" =>  $this->input->post("namabelakang"),
            "tanggal_lahir" =>  $this->input->post("tgllahir"),
            "nomor_telpon" =>  $this->input->post("nohp"),
            "email" =>  $this->input->post("email"),
            "alamat" =>  $this->input->post("alamat"),
            "password" =>  md5($this->input->post("password")),
            "tgl_submit" =>  date('Y-m-d'),
            "id_admin" =>  $this->session->id_user,
            "status" =>  0,
            "id_role"=> 2,
        );
        $this->Mduser->insert($data);
        $where = array(
            "email" =>  $this->input->post("email"),
        );
        $last = $this->Mduser->select($where)->result();
        $flag = 0;
        foreach($last as $a){
            $flag = 1;
            $datas = array(
                "id_user" => $a->id_user,
                "id_matpel" => $this->input->post("jurusan"),
                "status_guru" => 0,
                "tgl_submit_guru" => date('Y-m-d'),
            );
        $this->Mdguru->insert($datas);
        }
        redirect("master/guru");
    }
    public function remove($i){
        $this->session_check();

        $data = array(
            "user.status" => 1
        );
        $where = array(
            "id_user" => $i
        );
        $this->Mduser->update($data,$where);
        redirect("master/guru");
    }
    
    public function active($i){
        $this->session_check();

        $data = array(
            "user.status" => 0
        );
        $where = array(
            "id_user" => $i
        );
        $this->Mduser->update($data,$where);
        redirect("master/guru");
    }
    
    public function editGuru($i){
        $this->session_check();

        $this->load->model(array("Mduser","Mdguru"));
        $where = array(
            "id_user" => $i
        );
        $data = array(
            "nama_depan" => $this->input->post("namadepan"),
            "nama_belakang" =>  $this->input->post("namabelakang"),
            "tanggal_lahir" =>  $this->input->post("tgllahir"),
            "nomor_telpon" =>  $this->input->post("nohp"),
            "email" =>  $this->input->post("email"),
            "alamat" =>  $this->input->post("alamat"),
            "tgl_submit" =>  date('Y-m-d'),
            "id_admin" =>  $this->session->id_user,
        );
        $this->Mduser->update($data,$where);

        redirect("master/guru");
    }
    public function updateMatpel($i){
        $this->session_check();

        $this->load->model(array("Mdguru"));
        $where = array(
            "id_guru" => $i
        );
        $data = array(
            "id_matpel" => $this->input->post("id_matpel")
        );
        $this->Mdguru->update($data,$where);
        redirect("master/guru");
    }
}
?> 