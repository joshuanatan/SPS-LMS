<?php
defined("BASEPATH") OR exit("No Direct Script");

class Siswa extends CI_Controller{
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
        $this->session_check();

        $this->load->model("Mdsiswa");
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where = array(
            "user.status" => 0
        );
        $data = array(
            "siswa" => $this->Mdsiswa->select($where)->result()
        );
        $this->load->view("user/kesiswaan/siswa",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function tambahSiswa(){
        $this->session_check();

        $this->load->model(array("Mduser","Mdsiswa"));
        //insert ke user
        $data = array(
            "nama_depan" => $this->input->post("namadepan"),
            "nama_belakang" =>  $this->input->post("namabelakang"),
            "tanggal_lahir" =>  $this->input->post("tgllahir"),
            "nomor_telpon" =>  $this->input->post("nohp"),
            "email" =>  $this->input->post("email"),
            "alamat" =>  $this->input->post("alamat"),
            "password" =>  md5($this->input->post("password")),
            "tgl_submit" =>  date('Y-m-d'),
            "id_admin" =>  $this->session->id_user,
            "status" =>  0,
            "id_role"=> 1,
        );
        $this->Mduser->insert($data);
        //end insert ke user
        //cari id user terakhir
        $where = array(
            "nama_depan" => $this->input->post("namadepan"),
            "nama_belakang" =>  $this->input->post("namabelakang"),
            "tanggal_lahir" =>  $this->input->post("tgllahir"),
            "nomor_telpon" =>  $this->input->post("nohp"),
            "email" =>  $this->input->post("email"),
            "alamat" =>  $this->input->post("alamat"),
            "id_admin" =>  $this->session->id_user,
            "status" =>  0,
            "id_role"=> 1,
        );
        $last = $this->Mduser->select($where)->result();
        $flag = 0;
        //end cari user terakhir
        //ngeload user terakhir & input ke siswa
        foreach($last as $a){
            $flag = 1;
            $datas = array(
                "id_user" => $a->id_user,
                "jurusan" => $this->input->post("jurusan"),
                "id_orangtua" => "papasaya",
                "status_siswa" => 0,
                "tgl_submit_siswa" => date('Y-m-d'),
            );
            $this->Mdsiswa->insert($datas);
            $iduser = $a->id_user;
        }
        //end insert ke siswa
        //cari siswa yang terakhir
        $where = array(
            "siswa.id_user" => $iduser
        );
        $last = $this->Mdsiswa->select($where)->result();
        $flag = 0;
        //end cari siswa
        //insert ke siswa tahunan
        $this->load->model("Mdsiswaangkatan");
        foreach($last as $a){
            $flag = 1;
            $datas = array(
                "id_tahun_ajaran" => $this->session->tahunajaran,
                "id_siswa" =>  $a->id_siswa,
                "kelas" => 10,
                "status_siswa_angkatan" => 0,
                "tgl_submit_siswa_angkatan" => date('Y-m-d')
            );
            $this->Mdsiswaangkatan->insert($datas);
        }
        //sekarang mau nambahin orangtuanya
        //dicek dulu apakah udah pernah daftar atau belum
        
        $this->load->model("Mdorangtua");
        $where = array(
            "email_orangtua" => $this->input->post("email"),
            "status_orangtua" => 0
        );
        $result = $this->Mdorangtua->select($where);
        if($result->num_rows() == 0 ){
            $data = array(
                "nama_orangtua" => $this->input->post("namaortu"),
                "nomor_telpon" => $this->input->post("nohportu"),
                "email_orangtua" => $this->input->post("emailortu"),
                "status_orangtua" => 0,
                "password" => md5($this->input->post("passwordortu")),
                "tgl_submit_orangtua" => date("Y-m-d")
            );
            $this->Mdorangtua->insert($data);
        }
        
        redirect("master/siswa");
    }
    public function remove($i){
        $this->session_check();

        $data = array(
            "user.status" => 1
        );
        $where = array(
            "id_user" => $i
        );
        $this->Mduser->update($data,$where);
        redirect("master/siswa");
    }
    
    public function active($i){
        $this->session_check();

        $data = array(
            "user.status" => 0
        );
        $where = array(
            "id_user" => $i
        );
        $this->Mduser->update($data,$where);
        redirect("master/siswa");
    }
    
    public function editSiswa($i){
        $this->session_check();

        $this->load->model(array("Mduser","Mdsiswa"));
        $where = array(
            "id_user" => $i
        );
        $data = array(
            "nama_depan" => $this->input->post("namadepan"),
            "nama_belakang" =>  $this->input->post("namabelakang"),
            "tanggal_lahir" =>  $this->input->post("tgllahir"),
            "nomor_telpon" =>  $this->input->post("nohp"),
            "email" =>  $this->input->post("email"),
            "alamat" =>  $this->input->post("alamat"),
            "tgl_submit" =>  date('Y-m-d'),
            "id_admin" =>  $this->session->id_user,
        );
        $this->Mduser->update($data,$where);

        $datas = array(
            "jurusan" => $this->input->post("jurusan"),
            "id_orangtua" => "papasaya",
            "tgl_submit_siswa" => date('Y-m-d'),
        );
        $this->Mdsiswa->update($datas,$where);
        redirect("master/siswa");
    }
    
}
?>