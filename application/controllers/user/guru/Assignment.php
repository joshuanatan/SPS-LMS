<?php
//bisa milih tahun ajaran berapa
//load materi mingguan
//manage data materi mingguan

defined("BASEPATH") OR exit("No Direct Script");

class Assignment extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->req();
        $this->load->model(array("Mduser","Mdmatapelajaran"));
    }
    public function req(){
        $this->load->model("Mdsistemprofile");
        $where = array(
            "status_profile" => 0
        );
        $data = array(
            "profile" => $this->Mdsistemprofile->select($where)
        );
        $this->load->view("req/html-open");
        $this->load->view("req/head",$data);
        $this->load->view("user/guru/menu");
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
        
        $this->load->view("req/footer");
        $this->load->view("req/content-container-close");
        $this->load->view("req/html-close");
        $this->load->view("script/js-main");
    }
    public function index(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->model("Mdjadwal");
        $this->load->model("Mdaktivitasmingguan");
        $where = array(
            "user.id_user" => $this->session->id_user
        );
        $data = array(
            "jadwale" => $this->Mdjadwal->selectjadwalgurudistinct($where)->result(),
            "assignments" => $this->Mdaktivitasmingguan->selectaktivitasmingguanguru()->result()
        );
        $this->load->view("user/guru/assignmentguru",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
        $this->load->view("user/guru/script/js-ajax-dokumen");
    }
    public function mingguan(){
        $data = array(
            "id_jadwal" => $this->input->post("kelas"),
            "tgl_kelas" => $this->input->post("tglkelas"),
            "materi_mingguan" => $this->input->post("materi"),
            "deskripsi_materi" => "-",
            "status_aktivitas" => 0,
            "status_ujian" => 0,
        );
        $this->load->model("Mdaktivitasmingguan");
        $this->Mdaktivitasmingguan->insert($data);
        redirect("user/guru/assignment");
    }
    public function remove($i){
        $this->load->model("Mdaktivitasmingguan");
        $where = array(
            "id_mingguan" => $i
        );
        $this->Mdaktivitasmingguan->delete($where);
        redirect("user/guru/assignment");
    }   
    
    public function dokumen($i){
        $this->load->model("Mddokumen");
        $config['upload_path']          = './document/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 20000;
 
		$this->load->library('upload', $config);
 
		if ( !$this->upload->do_upload('file_assignment')){
			$error = array('error' => $this->upload->display_errors());
            foreach($error as $a){
                echo $a;
            }
			//$this->load->view('view', $error);
		}else{
			$upload_data = $this->upload->data();
            
            $file_name = $upload_data['file_name'];
        
        $tangkapid_mingguan = $i;
        $tangkapstatus_dokumen = 0;
        $tangkaptgl_submit_dokumen = date("Y-m-d");
        $tangkapfile_assignment = $file_name;
        $tangkapid_jenis_dokumen = $this->input->post('id_jenis_dokumen');
         
        $data = array(
            'id_mingguan'=>$tangkapid_mingguan,
            'status_dokumen'=>$tangkapstatus_dokumen,
            'tgl_submit_dokumen' => date('Y-m-d'),
            'file_assignment'=>$tangkapfile_assignment,
            'jenis'=>$tangkapid_jenis_dokumen,
            'judul_dokumen'=>$this->input->post("judul"),
            "id_user_upload"=> $this->session->id_user
            
        );
        $this->Mddokumen->insert($data,'dokumen');
        redirect('user/guru/assignment');
        }

    }
    public function removedokumen($i){
        $where = array(
            "id_dokumen" => $i
        );
        $data = array(
            "status_dokumen" => 1
        );
        $this->load->model("Mddokumen");
        $this->Mddokumen->update($data,$where);
        redirect('user/guru/assignment');
    }
    public function agenda(){
        $where = array(
            "id_mingguan" => $this->session->idmingguan
        );
        $data = array(
            "deskripsi_materi" => $this->input->post("agenda")
        );
        $this->load->model("Mdaktivitasmingguan");
        $this->Mdaktivitasmingguan->update($data,$where);
        redirect("user/guru/attendance/");
    }

}
?>