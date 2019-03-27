<?php
//ngeload announcement yang pernah ada
//ngeload jenis pengumuman
//submit pengumuman
//edit & delete pengumuman
defined("BASEPATH") OR exit("No Direct Script");

class Announcement extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->req();
        $this->load->model(array("Mduser","Mdmatapelajaran"));
    }
    
    public function tambahpengumuman(){
        $data = array(
            "id_user" => $this->session->id_user,
            "topik" => $this->input->post("topik"),
            "konten" => $this->input->post("konten"),
            "dateline" => $this->input->post("dateline"),
            "status_pengumuman" => 0,
            "tgl_submit_pengumuman" => date("Y-m-d")
        );
        $this->load->model("Mdpengumuman");
        $this->Mdpengumuman->insert($data);
        redirect("user/guru/announcement/");
    }
    public function delete($i){
        $where = array(
            "id_pengumuman" => $i
        );
        $data = array(
            "status_pengumuman" => 1
        );
        $this->load->model("Mdpengumuman");
        $this->Mdpengumuman->update($data,$where);
        redirect("user/guru/announcement"); 
    }
    public function req(){
        $this->load->view("req/html-open");
        $this->load->view("req/head");
        $this->load->view("user/guru/menu");
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
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->model("Mdpengumuman");
        $where = array(
            "pengumuman.id_user" => $this->session->user_name
        );
        $data =array(
            "announcement" => $this->Mdpengumuman->select($where)->result()
        );
        $this->load->view("user/guru/announcementguru",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
}
?>