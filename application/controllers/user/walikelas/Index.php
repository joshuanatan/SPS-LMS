<?php
//ngeload semua anak
//ngeload mata pelajaran
//ngeload grafik nilai & absensi setiap mata pelajaran

//melihat detail nilai tiap anak
//cetak pdf absen
//cetak rapot absen
//lulus ga lulus otomatis dari sistem melalui tombol evaluate

defined("BASEPATH") OR exit("No Direct Script");

class Index extends CI_Controller{
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
        $this->load->model("Mdkelassiswa");
        $where = array(
            "guru.id_user" => $this->session->id_user
        );
        $data = array(
            "siswakelas" => $this->Mdkelassiswa->selectsiswawalikelas($where)
        );
        foreach($data["siswakelas"]->result() as $a){
            $this->session->id_kelas = $a->id_kelas;
        }
        $this->load->view("user/guru/walikelas",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function detailnilaisiswa($i){
         //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        $this->load->model("Mdmatapelajaran");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where = array(
            "id_siswa_angkatan" => $i
        );
        $data = array(
            "matpel" => $this->Mdmatapelajaran->matpel()
        );
        $this->load->view("user/guru/detailnilaisiswa",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-linechart");
        $this->load->view("script/js-datatable");
    }
    public function detailabsensiswa($i){
         //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->model("Mdmatapelajaran");
        $where = array(
            "id_siswa_angkatan" => $i
        );
        $data = array(
            "matpel" => $this->Mdmatapelajaran->matpel()
        );
        $this->load->view("user/guru/detailabsensiswa",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-piechart");
        $this->load->view("script/js-datatable");
    }
    
}