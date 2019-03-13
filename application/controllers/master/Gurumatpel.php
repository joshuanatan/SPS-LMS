
<?php
//manage matpel<?php
defined("BASEPATH") OR exit("No Direct Script");

class Gurumatpel extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->req();
        $this->load->model(array("Mduser","Mdmatapelajaran"));
    }
    public function req(){
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
        
        $this->load->view("req/footer");
        $this->load->view("req/content-container-close");
        $this->load->view("req/html-close");
        $this->load->view("script/js-main");
    }
    public function index(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->model("Mdgurutahunan");
        $this->load->model("Mdkelas");
        $this->load->model("Mdgurumatapelajaran");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where = array(
            "id_tahun_ajaran" => $this->session->tahunajaran
        );
        $where2 = array(
            "id_guru" => 1
        );
        $data = array(
            "guru" => $this->Mdgurutahunan->select($where)->result(),
            "kelasangkatan" => $this->Mdkelas->select($where)->result(),
            "status" => $this->Mdgurumatapelajaran->select($where2)->result()
        );  
        $this->load->view("user/akademik/gurumatpel",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function ubahguru(){
        $this->load->model("Mdguru");
        $this->load->model("Mdkelas");
        $this->session->idgurupilihkelas = $this->input->post("guru");
        $where = array(
            "id_guru" => $this->input->post("guru")
        );
        $data = $this->Mdguru->select($where)->result();
        foreach($data as $a){
            $jenisjurusan = $a->jenis_matpel;
        }
        redirect("master/gurumatpel/jurusanterpilih/".$jenisjurusan);
    }
    public function jurusanterpilih($jenisjurusan){
        
        switch($jenisjurusan){
            case "IPA":
                $where = array(
                    "jurusan" => "IPA",
                    "id_tahun_ajaran" => $this->session->tahunajaran
                );  
                break;
            case "IPS":
                $where = array(
                    "jurusan" => "IPS",
                    "id_tahun_ajaran" => $this->session->tahunajaran
                );  
                break;
            case "UMUM":
                $where = array(
                    "id_tahun_ajaran" => $this->session->tahunajaran
                );  
                break;
        }
        $where2 = array(
            "id_guru" => $this->session->idgurupilihkelas
        );
        $where3 = array(
            "id_tahun_ajaran" => $this->session->tahunajaran
        );
        
        $this->load->model("Mdgurutahunan");
        $this->load->model("Mdkelas");
        $this->load->model("Mdgurumatapelajaran");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        
        
        $data = array(
            "guru" => $this->Mdgurutahunan->select($where3)->result(),
            "kelasangkatan" => $this->Mdkelas->select($where)->result(),
            "status" => $this->Mdgurumatapelajaran->select($where2)->result()
        );
        $this->load->view("user/akademik/gurumatpel",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
}
?>