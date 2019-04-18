<?php
//manage guru
//mengassign guru
defined("BASEPATH") OR exit("No Direct Script");

class Kelas extends CI_Controller{
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
        $this->load->model("Mdsistemprofile");
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
        $this->load->model("Mdkelas");
        $this->load->model("Mdgurutahunan");
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where = array();
        $where2 = array(
            "id_tahun_ajaran" => $this->session->tahunajaran
        );
        $data = array(
            "kelas" => $this->Mdkelas->select($where2)->result(),
            "walikelas" => $this->Mdgurutahunan->select2($where2)->result(),
            //"stockwalikelas" => $this->Mdgurutahunan->nonwalikelas()->result()
        );
        $this->load->view("user/akademik/kelas",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function tambahKelas(){
        $this->session_check();

        $this->load->model(array("Mduser","Mdkelas"));
        $where2 = array(
            "kelas" => $this->input->post("kelas"),
            "jurusan" => $this->input->post("jurusan"),
            "id_tahun_ajaran" => $this->session->tahunajaran
        );
        $jumlah = $this->Mdkelas->select($where2)->num_rows();
        $data = array(
            "kelas" => $this->input->post("kelas"),
            "jurusan" => $this->input->post("jurusan"),
            "urutan" => $jumlah+1,
            "id_gurutahunan" => $this->input->post("walikelas"),
            "id_tahun_ajaran" => $this->session->tahunajaran,
            "tgl_submit_kelas" =>  date('Y-m-d'),
            "status_kelas" =>  0,
        );
        $this->Mdkelas->insert($data);
        $where = array(
            "guru.id_guru" => $this->input->post("walikelas")
        );
        $this->load->model("Mdgurutahunan");
        $data_guru = $this->Mdgurutahunan->select($where)->result();
        $email_guru = "";
        foreach($data_guru as $a){
            $email_guru = $a->email;
        }
        $where = array(
            "kelas" => $this->input->post("kelas"),
            "jurusan" => $this->input->post("jurusan"),
            "urutan" => $jumlah+1,
        );
        $result = $this->Mdkelas->select($where)->result();
        foreach($result as $a){
            $idkelas = $a->id_kelas;

            $this->load->library('email');

            $config['protocol']    = 'smtp';

            $config['smtp_host']    = 'ssl://smtp.gmail.com';

            $config['smtp_port']    = '465';

            $config['smtp_timeout'] = '7';

            $config['smtp_user']    = 'eeducation.is.1@gmail.com';

            $config['smtp_pass']    = 'iSupport123';

            $config['charset']    = 'utf-8';

            $config['newline']    = "\r\n";

            $config['mailtype'] = 'text'; // or html

            $config['validation'] = TRUE; // bool whether to validate email or not      

            $this->email->initialize($config);


            $this->email->from('eeducation.is.1@gmail.com', 'iSupport Team');
            $this->email->to($email_guru); 


            $this->email->subject('Penugasan Walikelas');

            $this->email->message("Anda ditugaskan untuk menjadi walikelas di kelas ". $a->kelas." ".$a->jurusan." ".$a->urutan);  
            $this->email->send();
        }
        $this->load->model("Mdjadwal");
        $hari = ["SENIN","SELASA","RABU","KAMIS","JUMAT"];
        for($d = 0; $d<5;$d++){
            for($b=0; $b<9; $b++){
                $data = array(
                    "id_gurutahunan" => "0",
                    "id_kelas" => $idkelas,
                    "hari" => $hari[$d],
                    "jam_pelajaran" => ($b+1),
                    "status_jadwal" => 0,
                    "tgl_submit_jadwal" => date('Y-m-d')
                );
                $this->Mdjadwal->insert($data);
            }
        }
        redirect("master/kelas");
    }
    public function remove($i){
        $this->session_check();

        $this->load->model(array("Mdkelas","Mdjadwal"));
        $where = array(
            "id_kelas" => $i
        );
        $this->Mdkelas->remove($where);
        $this->load->model("Mdjadwal");
        $where = array(
            "id_kelas" => $i
        );  
        $this->Mdjadwal->remove($where);
        redirect("master/kelas");
    }
    
    public function active($i){
        $this->session_check();

        $data = array(
            "status_kelas" => 0
        );
        $where = array(
            "id_kelas" => $i
        );
        $this->Mdkelas->update($data,$where);
        redirect("master/kelas");
    }
    
    public function editKelas($i){
        $this->session_check();

        $this->load->model(array("Mduser","Mdkelas"));
        $where = array(
            "id_kelas" => $i
        );
        $data = array(
            "kelas" => $this->input->post("kelas"),
            "jurusan" => $this->input->post("jurusan"),
            "urutan" => $this->input->post("urutan"),
            "id_gurutahunan" => $this->input->post("id_guru"),
            "tgl_submit_kelas" =>  date('Y-m-d'),
            "id_admin" =>  $this->session->id_user,
            "status_kelas" =>  0,
        );
        $this->Mdkelas->update($data,$where);
        
        redirect("master/kelas");
    }
    public function updateWalikelas($i){
        $where = array(
            "id_kelas" => $i
        );
        $data = array(
            "id_gurutahunan" => $this->input->post("id_guru")
        );
        $this->load->model("Mdkelas");
        $this->Mdkelas->update($data,$where);
        redirect("master/kelas");
    }
}
?> 