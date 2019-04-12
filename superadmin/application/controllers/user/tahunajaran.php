<?php 
 
defined("BASEPATH") OR exit("No Direct Script");
class tahunajaran extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        
        $this->load->helper(array('form', 'url'));
        $this->load->model(array('Mdtahunajaran'));
        
        $this->req();
    }
    public function req(){
        $this->load->view("req/html-open");
        $this->load->view("req/head");
        $this->load->view("user/menu");
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
    
    /*akses menu*/
    public function index(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        
        $where = array();
        $data['tahunajaran'] = $this->Mdtahunajaran->select($where)->result();
        $this->load->view('user/viewtahunajaran',$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
    /*end akses menu*/
    
 


    
    function tambahtahunajaran(){
        $this->load->view("req/open-content");
        
        
        $this->load->view('user/viewtambahtahunajaran');
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
    
    
    
    function simpantahunajaran(){
        
        
        
        $tangkapTahunawal = $this->input->post('tahun_awal');
        $tangkapTahunakhir = $this->input->post('tahun_akhir');
        
        $tangkapStatustahunajaran = $this->input->post('status_tahunajaran');



        $data = array(

            'id_tahun_ajaran'=>0,
            'tahun_awal'=>$tangkapTahunawal,
            'tahun_akhir'=>$tangkapTahunakhir,
            'status_tahunajaran'=>$tangkapStatustahunajaran,
            'tgl_submit_tahunajaran'=>date('Y-m-d'),
        );

        $this->Mdtahunajaran->insert($data);
        redirect('user/tahunajaran');
    
    }
    
    
    
    function edittahunajaran ($id_tahunajaran){
        $this->load->view("req/open-content");
        
        $where = array();
        
        $data['tahunajaran'] = $this->Mdtahunajaran->select($where)->result();
        
        $where = array('id_tahun_ajaran'=>$id_tahunajaran);
        $data['tahunajaran']=$this->Mdtahunajaran->select($where)->result();
        $this->load->view('user/viewedittahunajaran',$data);
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
    
    
    function updatetahunajaran ($id_tahunajaran){
        $tangkapTahunawal = $this->input->post('tahun_awal');
        $tangkapTahunakhir = $this->input->post('tahun_akhir');
        
        $tangkapStatustahunajaran = $this->input->post('status_tahunajaran');



        $data = array(

            'tahun_awal'=>$tangkapTahunawal,
            'tahun_akhir'=>$tangkapTahunakhir,
            'status_tahunajaran'=>$tangkapStatustahunajaran,
            'tgl_submit_tahunajaran'=>date('Y-m-d'),
        );

        $where = array('id_tahun_ajaran'=>$id_tahunajaran);
        $this->Mdtahunajaran->update($data,$where);
        redirect('user/tahunajaran');
    
    }
    

    
    function hapustahunajaran ($id_tahunajaran){
        
        $data = array(

            'status_tahunajaran'=>"1",
            'tgl_submit_tahunajaran'=>date('Y-m-d'),
        );
        
        $where = array('id_tahun_ajaran'=>$id_tahunajaran);
        $this->Mdtahunajaran->update($data,$where);
        redirect('user/tahunajaran');
    }
}