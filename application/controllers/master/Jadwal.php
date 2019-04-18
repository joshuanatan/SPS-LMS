<?php
defined("BASEPATH") OR exit("No Direct Script");

class Jadwal extends CI_Controller{
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
        $this->load->model("Mdsistemprofile");
        $this->session_check();
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
        $this->session_check();
        
        $this->load->view("req/footer");
        $this->load->view("req/content-container-close");
        $this->load->view("req/html-close");
        $this->load->view("script/js-main");
    }
    
    public function index(){
        $this->session_check();

        $this->load->model("Mdjadwal");
        $this->load->model("Mdkelas");
        $this->load->model("Mdgurutahunan");
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where = array(
            
            "user.status" => 0,
            "guru.status_guru" => 0,
        );
        $where2 = array(
            "status_kelas" => 0,
            "id_tahun_ajaran" => $this->session->tahunajaran
        );  
        
        $where3 = array(
            "id_kelas"=>$this->session->pilihkelas
        );
        $data = array(
            "kelas" => $this->Mdkelas->select($where2)->result(),
            "guru" => $this->Mdgurutahunan->select($where)->result(),
            "senin" => $this->Mdjadwal->selectsenin($where3)->result(),
            "selasa" => $this->Mdjadwal->selectselasa($where3)->result(),
            "rabu" => $this->Mdjadwal->selectrabu($where3)->result(),
            "kamis" => $this->Mdjadwal->selectkamis($where3)->result(),
            "jumat" => $this->Mdjadwal->selectjumat($where3)->result(),
        );
        $this->load->view("user/akademik/jadwal",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function kelas(){
        $this->session_check();

        $this->load->model("Mdkelas");
        $this->load->model("Mdgurutahunan");
        $this->load->model("Mdjadwal");
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->session->pilihkelas = $this->input->post("kelas"); //masuk
        //echo $this->input->post("kelas");
        $where = array(
            
            "user.status" => 0,
            "guru.status_guru" => 0,
            "id_kelas" => $this->session->pilihkelas
        );
        $where2 = array(
            "status_kelas" => 0,
            "id_tahun_ajaran" => $this->session->tahunajaran
        ); 
        $where3 = array(
            "id_kelas"=>$this->session->pilihkelas
        );
        $data = array(
            "kelas" => $this->Mdkelas->select($where2)->result(),
            "guru" => $this->Mdgurutahunan->select($where)->result(),
            "senin" => $this->Mdjadwal->selectsenin($where3)->result(),
            "selasa" => $this->Mdjadwal->selectselasa($where3)->result(),
            "rabu" => $this->Mdjadwal->selectrabu($where3)->result(),
            "kamis" => $this->Mdjadwal->selectkamis($where3)->result(),
            "jumat" => $this->Mdjadwal->selectjumat($where3)->result(),
            
        );
        $this->load->view("user/akademik/jadwal",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
        $this->load->view("user/akademik/script/js-ajax-guru");
    }
    public function assignjadwal(){
        $this->session_check();

        $this->load->model("Mdjadwal");
        $hari = ["SENIN","SELASA","RABU","KAMIS","JUMAT"];
        $senin = $this->input->post("senin");
        $selasa = $this->input->post("selasa");
        $rabu = $this->input->post("rabu");
        $kamis = $this->input->post("kamis");
        $jumat = $this->input->post("jumat");
        $jadwal[] = array();
        
        $i = 0;
        foreach($senin as $a){
            $jadwal[0][$i] = $a;
            $i++;
        }
        $i = 0;
        foreach($selasa as $a){
            $jadwal[1][$i] = $a;
            $i++;
        }
        $i = 0;
        foreach($rabu as $a){
            $jadwal[2][$i] = $a;
            $i++;
        }
        $i = 0;
        foreach($kamis as $a){
            $jadwal[3][$i] = $a;
            $i++;
        }
        $i = 0;
        foreach($jumat as $a){
            $jadwal[4][$i] = $a;
            $i++;
        }
        for($d = 0; $d<5;$d++){
            for($b=0; $b<9; $b++){
                $where = array(
                    "id_kelas" => $this->session->pilihkelas,
                    "hari" => $hari[$d],
                    "jam_pelajaran" => ($b+1),
                );
                $data = array(
                    "id_gurutahunan" => $jadwal[$d][$b],
                    "tgl_submit_jadwal" => date('Y-m-d')
                );
                $this->Mdjadwal->update($data,$where);
            }
        }
        redirect("master/jadwal");
    }
}
?>