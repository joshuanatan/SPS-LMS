<?php
defined("BASEPATH") OR exit("No Direct Script");

class Kelassiswa extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->req();
        $this->load->model(array("Mduser","Mdmatapelajaran"));
    }
    public function req(){
        $this->load->view("req/html-open");
        $this->load->view("req/head");
        $this->load->view("user/kesiswaan/menu");
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
        if($this->session->pilihjurusan != "" && $this->session->tahunajaran != "" && $this->session->idkelas != ""){redirect("master/kelassiswa/siswajurusan");}
        $this->load->model("Mdkelas");
        $this->load->model("Mdsiswa");
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where = array(
            "status_kelas" =>0,
            //"id_tahun_ajaran" => $this->session->tahunajaran
        );  
        $where2 = array(
            //"jurusan" => $this->session->pilihanjurusan
        );
        $data = array(
            "kelas" => $this->Mdkelas->select($where)->result() ,
            "siswa" => $this->Mdsiswa->select($where2)->result(),
            "assigned" => $this->Mdsiswa->assigned2()->result(),
            "status" => $this->Mdsiswa->status2()->result()
        );
        $this->load->view("user/kesiswaan/kelas-siswa",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function ubahkelas(){
        $kelas = $this->input->post("kelas");
        $this->session->pilihjurusan = substr($kelas,2,3);
        $data = array(
            "nama_kelas" => substr($kelas,0,2)." ".substr($kelas,2,3)." ".substr($kelas,5)
        );
        $this->load->model("Mdkelas");
        $result = $this->Mdkelas->select($where)->result();
        foreach($result as $a){
            $this->session->idkelas = $a->id_kelas;
        }
        $this->session->pilihkelas = substr($kelas,0,2);
        redirect("master/kelassiswa/siswajurusan/");
    }
    public function siswajurusan(){
        $this->load->model("Mdkelas");
        $this->load->model("Mdsiswa");
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where = array(
            "status_kelas" =>0,
            "id_tahun_ajaran" => $this->session->tahunajaran
        );  
        $where2 = array(
            "jurusan" => $this->session->pilihjurusan
        );
        $data = array(
            "kelas" => $this->Mdkelas->select($where)->result() ,
            "siswa" => $this->Mdsiswa->select($where2)->result(),
            "assigned" => $this->Mdsiswa->assigned($where2)->result(),
            "status" => $this->Mdsiswa->status($where2)->result()
        );
        $this->load->view("user/kesiswaan/kelas-siswa",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function remove($i){
        $this->load->model("Mdkelassiswa");
        $where = array(
            "id_kelas_siswa" => $i
        );
        $this->Mdkelassiswa->remove($where);
        redirect("master/kelassiswa");
    }
    public function submit(){
        $this->load->model("Mdkelassiswa");
        $kelas = $this->input->post("assign");
        foreach($kelas as $a){
            $data = array(
                "id_siswa_angkatan" => $a,
                "id_kelas" => $this->session->idkelas,
                "status_kelas_siswa" => 0,
                "tgl_submit_kelas_siswa" => date("Y-m-d")
            );
            $this->Mdkelassiswa->insert($data);
        }
        redirect("master/kelassiswa");
    }
    
}
?>