<?php
defined("BASEPATH") OR exit("No Direct Script");

class SystemProfile extends CI_Controller{
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
        $this->load->view("user/kesiswaan/menu");
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
        $this->load->model("Mdtahunajaran");
        $this->load->model("Mdsiswa");
        $where = array(
        );
        $this->load->model("Mdsistemprofile");
        $data = array(
            "profile" => $this->Mdsistemprofile->select($where)
        );
        $this->load->view("user/kesiswaan/system-profile",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function submit(){
        $config['upload_path']          = './document/detailsekolah/';
		$config['allowed_types']        = 'img|png|gif';
		$config['max_size']             = 20000;
 
		$this->load->library('upload', $config);
 
		if ( !$this->upload->do_upload('logo_sekolah')){
			$error = array('error' => $this->upload->display_errors());
            foreach($error as $a){
                echo $a;
            }
			//$this->load->view('view', $error);
        }
        else{
            $upload_data = $this->upload->data();
            
            $file_name = $upload_data['file_name'];
            $data = array(
                "nama_sekolah" => $this->input->post("nama_sekolah"),
                "logo_sekolah" => $file_name,
                "nama_sistem_sekolah" => $this->input->post("nama_sistem_sekolah"),
                "status_profile" => 1
            );

            $this->load->model("Mdsistemprofile");
            $this->Mdsistemprofile->insert($data);
            redirect("user/kesiswaan/systemprofile");
        }
        
    }
    public function active($a){
        $this->load->model("Mdsistemprofile");
        $where = array();
        $data = array(
            "status_profile" => 1
        );
        $this->Mdsistemprofile->update($data,$where);
        $where = array(
            "id_profile" => $a
        );
        $data = array(
            "status_profile" => 0
        );
        $this->Mdsistemprofile->update($data,$where);
        redirect("user/kesiswaan/systemprofile");
    }
    public function nonactive($a){
        $where = array(
            "id_profile" => $a
        );
        $this->load->model("Mdsistemprofile");
        $data = array(
            "status_profile" => 1
        );
        redirect("user/kesiswaan/systemprofile");
        $this->Mdsistemprofile->update($data,$where);
    }
}