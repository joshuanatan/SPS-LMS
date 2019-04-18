<?php
//untuk manage quiz dan soal

defined("BASEPATH") OR exit("No Direct Script");

class Quiz extends CI_Controller{
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
        $this->load->view("user/guru/tambahquiz");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
        $this->load->view("user/guru/script/js-ajax-jumlahsoal");
    }
    public function minggu($i){
        $this->session->minggu = $i;
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where = array(
            "id_mingguan" => $i
        );
        $this->load->model("Mdquiz");
        $result = $this->Mdquiz->select($where);
        if($result->num_rows() > 0 ){
            $this->load->model("Mdsoal");
            //udah ada
            foreach($result->result() as $a){
                $quiz = $a->id_quiz;
            }
            $where = array(
                "soal.status_soal" => 0,
                "soal.id_quiz" => $quiz
            );
            $data = array(
                "soal" => $this->Mdsoal->select($where)->result()
            );
            $this->load->view("user/guru/lihatquiz",$data);
        }
        else {
            //kosong
            $this->load->view("user/guru/tambahquiz");
        }
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
        $this->load->view("user/guru/script/js-ajax-jumlahsoal");
    }
    public function tambah(){
        $data = array(
            "id_mingguan" => $this->session->minggu,
            "status_quiz" => 0,
            "tgl_submit_quiz" => date("Y-m-d")
        );
        $this->load->model("Mdquiz");
        $this->session->idquiz = $this->Mdquiz->insert($data);    
        $this->tambahsoal();
        redirect("user/guru/assignment");
    }
    private function tambahsoal(){
        $pertanyaan = array();
        $opsi1 = array();
        $opsi2 = array();
        $opsi3 = array();
        $opsi4 = array();
        $jawaban = array();
        $arraypertanyaan = $this->input->post("pertanyaan");
        $arrayopsi1 = $this->input->post("pilihan1");
        $arrayopsi2 = $this->input->post("pilihan2");
        $arrayopsi3 = $this->input->post("pilihan3");
        $arrayopsi4 = $this->input->post("pilihan4");
        $jawaban = $this->input->post("jawaban");
        
        $i = 0;
        foreach($arraypertanyaan as $a){
            $pertanyaan[$i] = $a;
            $i++;
        }
        $i = 0;
        foreach($arrayopsi1 as $a){
            $opsi1[$i] = $a;
            $i++;
        }
        $i = 0;
        foreach($arrayopsi2 as $a){
            $opsi2[$i] = $a;
            $i++;
        }
        $i = 0;
        foreach($arrayopsi3 as $a){
            $opsi3[$i] = $a;
            $i++;
        }
        $i = 0;
        foreach($arrayopsi4 as $a){
            $opsi4[$i] = $a;
            $i++;
        }
        $i = 0;
        foreach($jawaban as $a){
            $jawaban[$i] = $a;
            $i++;
        }
        for($i = 0; $i<count($jawaban);$i++){
            $data = array(
                "pertanyaan" => $pertanyaan[$i],
                "opsi1" => $opsi1[$i],
                "opsi2" => $opsi2[$i],
                "opsi3" => $opsi3[$i],
                "opsi4" => $opsi4[$i],
                "jawaban" => $jawaban[$i],
                "id_quiz" => $this->session->idquiz,
                "status_soal" => 0,
                "tgl_submit_soal" => date("Y-m-d")
            );
            $this->Mdquiz->masuksoal($data);
        }
    }
    public function remove($i){
        $where = array(
            "id_soal" => $i
        );
        $data = array(
            "status_soal" => 1
        );
        $this->load->model("Mdsoal");
        $this->Mdsoal->update($data,$where);
        redirect("user/guru/mingguan/quiz/minggu/".$this->session->minggu);
    }
    public function update(){
        $where = array(
            "quiz.id_mingguan" => $this->session->minggu
        );
        $this->load->model("Mdquiz");
        $result = $this->Mdquiz->select($where)->result();
        foreach($result as $a){
            $this->session->idquiz = $a->id_quiz;
        }
        $where = array(
            "soal.id_quiz" => $this->session->idquiz
        );
        $this->load->model("Mdsoal");
        $this->Mdsoal->remove($where);
        $this->tambahsoal();
        redirect("user/guru/mingguan/quiz/minggu/".$this->session->minggu);
    }
}
?>