<?php
//buka tahun ajaran
//assign guru tahun ajaran
//assign matpel tahun ini
//kalau murid didapat dari naik kelas atau tidak dan data siswa yang masuk
class Tahunajaran extends CI_Controller{
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
    function __construct(){
        parent::__construct();
        $this->load->model("Mdtahunajaran");
    }
    public function insertTahunAjaran(){
        //$this->session_check();

        $data = array(
            "tahun_awal" => $this->input->post("awal"),
            "tahun_akhir" => $this->input->post("akhir"),
            "status_tahun_ajaran" => 0,
            "tgl_submit_tahunajaran" => date('Y-m-d')
        );
        $this->Mdtahunajaran->insert($data);
        redirect("user/akademik/index");
    }
    public function editTahunAjaran($i){
        $this->session_check();

        $where = array(
            "id_tahun_ajaran" => $i
        );
        $data = array(
            "tahun_awal" => $this->input->post("awal"),
            "tahun_akhir" => $this->input->post("akhir"),
            "status_tahun_ajaran" => 0,
            "tgl_submit_tahunajaran" => date('Y-m-d')
        );
        $this->Mdtahunajaran->update($data,$where);
        redirect("user/akademik/index");
    }
    public function setTahunAjaran(){

        $this->session->tahunajaran = $this->input->post("id_tahun_ajaran");
        redirect("user/".$this->session->role."/index");
    }
}
?>