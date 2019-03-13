<?php
defined("BASEPATH") OR exit("No Direct Script");

class Akademik extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->req();
        $this->load->model(array("Mduser","Mdmatapelajaran"));
    }
    public function req(){
        $this->load->view("req/html-open");
        $this->load->view("req/head");
        $this->load->view("mockup-akademik/menu");
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
       
        $this->load->view("mockup-akademik/index");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("mockup-akademik/script/js-datatable");
    }
    public function matapelajaran(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
       
        $this->load->view("mockup-akademik/matapelajaran");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function kelas(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
       
        $this->load->view("mockup-akademik/kelas");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("mockup-akademik/script/js-datatable");
    }
    public function gurutahun(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
       
        $this->load->view("mockup-akademik/gurutahun");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("mockup-akademik/script/js-datatable");
    }
    public function gurumatpel(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
       
        $this->load->view("mockup-akademik/gurumatpel");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("mockup-akademik/script/js-datatable");
    }
    public function jadwal(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
       
        $this->load->view("mockup-akademik/jadwal");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("mockup-akademik/script/js-datatable");
    }
    function tambahkelas(){
        $where = NULL;
        $data['gurutahunan'] = $this->Mdgurutahunan->select($where)->result();
        
        $this->load->view('view',$data);
    }
    
    
    function simpankelas(){
        $tangkapIdkelas = $this->input->post('id_kelas');
        $tangkapJurusan = $this->input->post('jurusan');
        $tangkapUrutan = $this->input->post('urutan');
        $tangkapIdgurutahunan = $this->input->post('id_gurutahunan');
        $tangkapStatuskelas = $this->input->post('status_kelas');

        $data = array(

            'id_kelas'=>$tangkapIdkelas,
            'jurusan'=>$tangkapJurusan,
            'urutan'=>$tangkapUrutan,
            'id_gurutahunan'=>$tangkapIdgurutahunan,
            'status_kelas'=>$tangkapStatuskelas,
            'tgl_submit_kelas'=>date('Y-m-d'),
        );
        
        $this->Mdkelas->insert($data);
        redirect('kelas');
    
    }
    
    
    function editkelas ($id_kelas){
        $where = NULL;
        $data['gurutahunan'] = $this->Mdgurutahunan->select($where)->result();
        $where = array('id_kelas'=>$id_kelas);
        $data['kelas']=$this->Mdkelas->select($where)->result();
        $this->load->view('view2',$data);
    }
        
       
    
    function updatekelas ($id_kelas){
        $tangkapJurusan = $this->input->post('jurusan');
        $tangkapUrutan = $this->input->post('urutan');
        $tangkapIdgurutahunan = $this->input->post('id_gurutahunan');
        $tangkapStatuskelas = $this->input->post('status_kelas');

        $data = array(

            'jurusan'=>$tangkapJurusan,
            'urutan'=>$tangkapUrutan,
            'id_gurutahunan'=>$tangkapIdgurutahunan,
            'status_kelas'=>$tangkapStatuskelas,
            'tgl_submit_kelas'=>date('Y-m-d'),
        );
        
        $where = array('id_kelas'=>$id_kelas);
        $this->Mdkelas->update($data,$where);
        redirect('kelas');
    
    }
        
    
    
    function hapuskelas ($id_kelas){
        $data = array(

            'status_kelas'=>"1",
        );
        
        $where = array('id_kelas'=>$id_kelas);
        $this->Mdkelas->update($data,$where);
        redirect('kelas');
    }
	public function insertMataPelajaran(){
        $this->load->model("Mdmatapelajaran");
        $data = array(
            "nama_matpel" =>  $this->input->post("namamatpel"),
            "status_matpel" => 0,
            "tgl_submit_matpel" => date("Y-m-d"),
            "id_admin_matpel" => $this->session->username
        );
        $this->Mdmatapelajaran->insert($data);
    }
    public function editMataPelajaran($i){
        $this->load->model("Mdmatapelajaran");
        $where = array(
            "id_matpel" => $i
        );
        $data = array(
            "matpel" => $this->Mdmatapelajaran->select($where)->result()
        );
        $this->load->view("mockup_akademik/editmatpel",$data);
    }
    public function updateMataPelajaran(){
        $where = array(
            "id_matpel" => $this->input->post("id_matpel")    
        );
        $data = array(
            "nama_matpel" =>  $this->input->post("namamatpel"),
            "status_matpel" => 0,
            "tgl_submit_matpel" => date("Y-m-d"),
            "id_admin_matpel" => $this->session->username
        );
        $this->Mdmatapelajaran->update($data,$where);
        redirect("akademik/matapelajaran");
    }
    public function deleteMataPelajaran($i){
        $where = array(
            "id_matpel" => $i
        );
        $data = array(
            "status_matpel" => 1
        );
        $this->Mdmatapelajaran->update($data,$where);
        redirect("akademik/matapelajaran");
            
    }
    public function gurutahunan(){
        $where = array();
        $data['guru'] = $this->Mdguru->select($where)->result();
        $this->load->view("mockup_akademik/gurutahun",$data);
    }
    public function insertGurutahunan(){
        $tangkapid_gurutahunan = $this->input->post('id_gurutahunan');
        $tangkapid_tahun_ajaran = $this->input->post('id_tahun_ajaran');
        $tangkapid_guru = $this->input->post('id_guru');
        $tangkapstatus_gurutahunan = $this->input->post('status_gurutahunan');
        $tangkaptgl_submit_gurutahunan = $this->input->post('tgl_submit_gurutahunan');
        
        $data = array(
            'id_gurutahunan'=>$tangkapid_gurutahunan,
            'id_tahun_ajaran'=>$tangkapid_tahun_ajaran,
            'id_guru'=>$tangkapid_guru,
            'status_gurutahunan'=>$tangkapstatus_gurutahunan,
            'tgl_submit_gurutahunan' => date('Y-m-d'),
        );
        $this->Mdgurutahunan->insert($data);
        redirect('akademik/gurutahun');
    }
    public function editGuruTahunan(){
        $where = array(
            "id_gurutahunan" => $i
        );
        $data = array(
            "gurutahunan" => $this->Mdgurutahunan->select($where)->result()
        );
        $this->load->view("akademik/editgurutahunan");
    }
    
    public function updateGurutahunan(){
        $where = array(
            "id_gurutahunan" => $this->input->post('id_gurutahunan')
        );
        $tangkapid_tahun_ajaran = $this->input->post('id_tahun_ajaran');
        $tangkapid_guru = $this->input->post('id_guru');
        $tangkapstatus_gurutahunan = $this->input->post('status_gurutahunan');
        $tangkaptgl_submit_gurutahunan = $this->input->post('tgl_submit_gurutahunan');
        
        $data = array(
            'id_tahun_ajaran'=>$tangkapid_tahun_ajaran,
            'id_guru'=>$tangkapid_guru,
            'status_gurutahunan'=>$tangkapstatus_gurutahunan,
            'tgl_submit_gurutahunan' => date('Y-m-d'),
        );
        $this->Mdgurutahunan->update($data,$where);
        redirect('akademik/gurutahun');
    }
    public function deleteGuruTahunan($i){
        $where = array(
            "id_gurutahunan" => $i
        );
        $data = array(
            "status" => 1
        );
        $this->Mdgurutahunan->update($data,$where);
        redirect("akademik/gurutahun");
    }
    public function penugasanguru(){
    }
}