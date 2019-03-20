<?php
//bisa milih tahun ajaran berapa
//load materi mingguan
//manage data materi mingguan

defined("BASEPATH") OR exit("No Direct Script");

class Assignment extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->req();
        $this->load->model(array("Mduser","Mdmatapelajaran"));
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
        $this->load->model("Mdjadwal");
        $this->load->model("Mdaktivitasmingguan");
        $where = array(
            "user.id_user" => $this->session->id_user
        );
        $data = array(
            "jadwal" => $this->Mdjadwal->selectjadwalgurudistinct($where)->result(),
            "assignments" => $this->Mdaktivitasmingguan->selectaktivitasmingguanguru()->result()
        );
        $this->load->view("user/guru/assignmentguru",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function mingguan(){
        $data = array(
            "id_jadwal" => $this->input->post("kelas"),
            "tgl_kelas" => $this->input->post("tglkelas"),
            "materi_mingguan" => $this->input->post("materi"),
            "deskripsi_materi" => "-",
            "status_aktivitas" => 0
        );
        $this->load->model("Mdaktivitasmingguan");
        $this->Mdaktivitasmingguan->insert($data);
        redirect("user/guru/assignment");
    }
    public function remove($i){
        $this->load->model("Mdaktivitasmingguan");
        $where = array(
            "id_mingguan" => $i
        );
        $this->Mdaktivitasmingguan->delete($where);
        redirect("user/guru/assignment");
    }
}
?>