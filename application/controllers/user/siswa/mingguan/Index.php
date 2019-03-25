<?php
//load detail mata pelajaran
//load persentasi kehadiran
//load data mingguan
//download materi

//kalau tombol assignment dipencet, keluar popup ada soal ada dokumen yg bisa didonlod dan ada tempat upload
//upload dokumen
defined("BASEPATH") OR exit("No Direct Script");

class Index extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->req();
    }
    public function req(){
        $this->load->view("req/html-open");
        $this->load->view("req/head");
        $this->load->view("user/siswa/menu");
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
    
    /*akses menu*/
    public function index($i){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->view("user/siswa/matapelajaran");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function minggu($i){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->model("Mdmatapelajaran");
        $where = array(
            "jadwal.id_gurutahunan" => $i
        );
        $aktivitase = $this->Mdmatapelajaran->matpel($where)->result();
        foreach($aktivitase as $a){
            $namamatpel = $a->nama_matpel;
            $namaguru = $a->nama_depan." ".$a->nama_belakang;
            break;
        }
        $data = array(
            "aktivitas" => $this->Mdmatapelajaran->aktivitas($where)->result(),
            "nama_matpel" => $namamatpel,
            "nama_guru" => $namaguru,
        );
        $this->load->view("user/siswa/matapelajaran",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
    
    public function quiz($i){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->model("Mdquiz");
        $where = array(
            "id_mingguan" => $i
        );
        $data = array(
            "quiz" => $this->Mdquiz->select($where)->result()
        );
        $this->load->view("user/siswa/quiz",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
}
?>