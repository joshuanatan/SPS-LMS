<?php
defined("BASEPATH") OR exit("No Direct Script");

class Orangtua extends CI_Controller{
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
        $this->load->view("user/kesiswaan/menu");
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
        $this->load->model("Mdkelas");
        $where2 = array(
            "status_kelas" => 0,
            "id_tahun_ajaran" => $this->session->tahunajaran
        );
        $where = array(
            "user.status" => 0
        );
        $this->load->model("Mdorangtua");
        $data = array(
            "orangtua" => $this->Mdorangtua->select2($where),
            
            "kelas" => $this->Mdkelas->select($where2)->result(),
        );
        $this->load->view("user/kesiswaan/orangtua",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function kelas(){
        $this->session_check();
        $this->session->pilihkelas = $this->input->post("kelas");
        $this->load->model("Mdkelas");
        $where2 = array(
            "status_kelas" => 0,
            "id_tahun_ajaran" => $this->session->tahunajaran
        );
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where = array();
        $this->load->model("Mdorangtua");
        $data = array(
            "orangtua" => $this->Mdorangtua->select($where),
            "kelas" => $this->Mdkelas->select($where2)->result(),
        );
        $this->load->view("user/kesiswaan/orangtua",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
}
?>