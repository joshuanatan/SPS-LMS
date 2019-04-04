<?php
//ngeload pengumuman (taro di index)
//ngeload semua anak masing-ortu (taro dimenu samping)
//memilih anak
//ngeload mata pelajaran 
//ngeload grafik nilai & absensi setiap mata pelajaran
//melihat detail nilai tiap anak
//cetak pdf nilai
//cetak pdf absen

defined("BASEPATH") OR exit("No Direct Script");

class Siswa extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->req();
        $this->load->model(array("Mduser","Mdmatapelajaran"));
    }
    public function req(){
        $this->load->model("Mdsiswaangkatan");
        $where = array(
            "siswa.id_orangtua" => $this->session->id_user,
            "siswa_angkatan.status_siswa_angkatan" => 0
        );
        $data = array(
            "siswa" => $this->Mdsiswaangkatan->select($where)->result()
        );
        $this->load->view("req/html-open");
        $this->load->view("req/head");
        $this->load->view("user/orangtua/menu",$data);
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
        $this->load->view("user/orangtua/script/js-ajax-siswa");
    }
    public function absen($i){
        $this->session->id_siswa = $i;
        $this->load->model("Mdmatapelajaran");
        
        $data = array(
            "matpel" => $this->Mdmatapelajaran->matapelajaransiswa()
        );
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
       
        $this->load->view("user/orangtua/absen",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
        $this->load->view("user/siswa/script/js-piechart-attendance");
        $this->load->view("user/orangtua/script/js-ajax-absen");
    }
    public function nilai($i){
        
        $this->session->id_siswa = $i;
        $this->load->model("Mdmatapelajaran");
        $data = array(
            "matpel" => $this->Mdmatapelajaran->matapelajaransiswa()
        );
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
       
        $this->load->view("user/orangtua/index",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
        $this->load->view("script/js-linechart");

        $this->load->view("user/orangtua/script/js-ajax-nilai");
        $this->load->view("script/js-piechart");
    }
}
?>