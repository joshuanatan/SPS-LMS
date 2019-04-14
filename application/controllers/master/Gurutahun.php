<?php
//manage matpel<?php
defined("BASEPATH") OR exit("No Direct Script");

class Gurutahun extends CI_Controller{
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

        $this->load->model("Mdgurutahunan");
        $this->load->model("Mdguru");
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where = array(
            "id_tahun_ajaran" => $this->session->tahunajaran,
            "status_gurutahunan" =>0
        );
        $where2 = array(
            "status_guru" => 0
        );
        $data = array(
            "gurutahun" => $this->Mdgurutahunan->select2($where)->result(),
            "guru" => $this->Mdguru->selectuntukgurutahunan($where2)->result()
        );
        $this->load->view("user/akademik/gurutahun",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function tambah(){
        $this->session_check();

        $this->load->model("Mdgurutahunan");
        $data = array(
            "id_tahun_ajaran" => $this->session->tahunajaran,
            "id_guru" => $this->input->post("id_guru"),
            "status_gurutahunan" => 0,
            "tgl_submit_gurutahunan" => date('Y-m-d')
        );
        $this->Mdgurutahunan->insert($data);
        redirect("master/gurutahun");
    }
    public function remove($i){
        $this->session_check();

        $this->load->model("Mdgurutahunan");
        $where = array(
            "id_gurutahunan" => $i
        );
        $this->Mdgurutahunan->remove($where);
        redirect("master/gurutahun");
    }
}
?>