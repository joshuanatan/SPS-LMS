<?php
//load tugas yang belum selesai
//pilih mata pelajaran
defined("BASEPATH") OR exit("No Direct Script");

class sekolah extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->helper(array('form', 'url'));
        $this->load->model(array('Mdsekolah'));
        
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
        $data['sekolah'] = $this->Mdsekolah->select($where)->result();
        $this->load->view("user/viewsekolah",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
    /*end akses menu*/
    
    function tambahsekolah(){
        
        $this->load->view("req/open-content");
        $this->load->view('user/viewtambahsekolah');
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
    
    function simpansekolah(){
        
        $config['upload_path']          = './logo_sekolah/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 20000;
 
		$this->load->library('upload', $config);
        
        $this->upload->do_upload('logo_sekolah');
        $upload_data = $this->upload->data();
        $file_name = $upload_data['file_name'];
 
        
        
        
        $tangkapIdsekolah = 0;
        $tangkapNamasekolah = $this->input->post('nama_sekolah');
        $tangkapAlamatsekolah = $this->input->post('alamat_sekolah');
        $tangkapEmailsekolah = $this->input->post('email_sekolah');
        $tangkapStatussekolah = $this->input->post('status_sekolah');

        if($file_name == NULL){
            $tangkapLogosekolah = "default.png";    
        }else{
            $tangkapLogosekolah = $file_name;
        }
        


        $data = array(

            'id_sekolah'=>0,
            'nama_sekolah'=>$tangkapNamasekolah,
            'alamat_sekolah'=>$tangkapAlamatsekolah,
            'email_sekolah'=>$tangkapEmailsekolah,
            'logo_sekolah'=>$tangkapLogosekolah,               
            'status_sekolah'=>$tangkapStatussekolah,
            'tgl_submit_sekolah'=>date('Y-m-d'),
        );

        $this->Mdsekolah->insert($data);
        redirect('user/sekolah');
    
    }
    
    
    function editsekolah ($id_sekolah){
        
        $where = array('id_sekolah'=>$id_sekolah);
        $data['sekolah']=$this->Mdsekolah->select($where)->result();
        $this->load->view('user/vieweditsekolah',$data);
    }
    
    
    function updatesekolah ($id_sekolah){
        $tangkapNamasekolah = $this->input->post('nama_sekolah');
        $tangkapAlamatsekolah = $this->input->post('alamat_sekolah');
        $tangkapEmailsekolah = $this->input->post('email_sekolah');
        $tangkapStatussekolah = $this->input->post('status_sekolah');

        $data = array(

            'nama_sekolah'=>$tangkapNamasekolah,
            'alamat_sekolah'=>$tangkapAlamatsekolah,
            'email_sekolah'=>$tangkapEmailsekolah,
            'status_sekolah'=>$tangkapStatussekolah,
            'tgl_submit_sekolah'=>date('Y-m-d'),
        );

        
        $where = array('id_sekolah'=>$id_sekolah);
        $this->Mdsekolah->update($data,$where);
        redirect('user/sekolah');
    
    }
    
    
    
    function editlogosekolah ($id_sekolah){
        
        $where = array('id_sekolah'=>$id_sekolah);
        $data['sekolah']=$this->Mdsekolah->select($where)->result();
        $this->load->view('user/vieweditlogosekolah',$data);
    }
    
    
    function updatelogosekolah ($id_sekolah){

        $config['upload_path']          = './logo_sekolah/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 20000;
 
		$this->load->library('upload', $config);
        
        $this->upload->do_upload('logo_sekolah');
        $upload_data = $this->upload->data();
        $file_name = $upload_data['file_name'];
        
        if($file_name == NULL){
            $tangkapLogosekolah = "default.png";    
        }else{
            $tangkapLogosekolah = $file_name;
        }

        
        
        
        $data = array(

            'logo_sekolah'=>$tangkapLogosekolah,
            'tgl_submit_sekolah'=>date('Y-m-d'),
        );
        
        $where = array('id_sekolah'=>$id_sekolah);
        $this->Mdsekolah->update($data,$where);
        redirect('user/sekolah');
    
    }
        
    
    
    function hapussekolah ($id_sekolah){
        
        $data = array(

            'status_sekolah'=>"1",
            'tgl_submit_sekolah'=>date('Y-m-d'),
        );
        
        $where = array('id_sekolah'=>$id_sekolah);
        $this->Mdsekolah->update($data,$where);
        redirect('user/sekolah');
    }
    
    public function emailrapor(){
        
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
$this->email->to('bryanlimcho@gmail.com'); 


$this->email->subject('Email Test');

$this->email->message('Testing the email class.');  

$this->email->send();

echo $this->email->print_debugger();

        
           
    
        
        
    }
    
}?>