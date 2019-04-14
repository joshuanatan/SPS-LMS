<?php 
 
defined("BASEPATH") OR exit("No Direct Script");
class user extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        
        $this->load->helper(array('form', 'url'));
        $this->load->model(array('Mduser'));
        
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
        $data['user'] = $this->Mduser->select($where)->result();
        $this->load->view('user/viewuser',$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
    /*end akses menu*/
    
 


    
    function tambahuser(){
        $this->load->view("req/open-content");
        
        
        $this->load->view('user/viewtambahuser');
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
    
    
    
    function simpanuser(){
        
        
        $tangkapNamadepan = $this->input->post('nama_depan');
        $tangkapNamabelakang = $this->input->post('nama_belakang');
        $tangkapTanggallahir = $this->input->post('tanggal_lahir');
        $tangkapNomortelepon = $this->input->post('nomor_telepon');
        $tangkapEmail = $this->input->post('email');
        $tangkapAlamat = $this->input->post('alamat');
        $tangkapPassword = $this->input->post('password');
        $tangkapStatus = $this->input->post('status');



        $data = array(

            'id_user'=>0,
            'nama_depan'=>$tangkapNamadepan,
            'nama_belakang'=>$tangkapNamabelakang,
            'tanggal_lahir'=>$tangkapTanggallahir,
            'nomor_telepon'=>$tangkapNomortelepon,
            'email'=>$tangkapEmail,
            'alamat'=>$tangkapAlamat,
            'password'=>md5($tangkapPassword),
            'tgl_submit'=>date('Y-m-d'),
            'status'=>$tangkapStatus,
            'role'=>1,
            
        );

        $this->Mduser->insert($data);
        redirect('user/user');
    
    }
    
    
    
    function edituser ($id_user){
        $this->load->view("req/open-content");
        
        $where = array();
        
        $data['user'] = $this->Mduser->select($where)->result();
        
        $where = array('id_user'=>$id_user);
        $data['user']=$this->Mduser->select($where)->result();
        $this->load->view('user/viewedituser',$data);
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
    function editprofile ($id_user){
        $this->load->view("req/open-content");
        
        $where = array();
        
        $data['user'] = $this->Mduser->select($where)->result();
        
        $where = array('id_user'=>$id_user);
        $data['user']=$this->Mduser->select($where)->result();
        $this->load->view('user/vieweditprofile',$data);
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
    function editpassword ($id_user){
        $this->load->view("req/open-content");
        
        $where = array();
        
        $data['user'] = $this->Mduser->select($where)->result();
        
        $where = array('id_user'=>$id_user);
        $data['user']=$this->Mduser->select($where)->result();
        $this->load->view('user/vieweditpassword',$data);
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
    function updatepassword ($id_user){
        
        
        $passwordlama = md5($this->input->post("passwordlama"));
        $where = array(
            "id_user" => $user,
            "password" => $passwordlama
        );
        $result = $this->Mduser->select($where)->result();
        $rowcount = mysqli_num_rows($result);
        
        if($rowcount != "0"){



        $data = array(

            
            
            'password'=>md5($this->input->post("passwordbaru")),
            
            
            
        );
        $where = array('id_user'=>$id_user);
        $this->Mduser->update($data,$where);
        redirect('user/user');
        }
    
    }
    
    
    
    
    function updateuser ($id_user){
        $tangkapNamadepan = $this->input->post('nama_depan');
        $tangkapNamabelakang = $this->input->post('nama_belakang');
        $tangkapTanggallahir = $this->input->post('tanggal_lahir');
        $tangkapNomortelepon = $this->input->post('nomor_telepon');
        $tangkapEmail = $this->input->post('email');
        $tangkapAlamat = $this->input->post('alamat');
        
        //$tangkapPassword = $this->input->post('password');
        
        $tangkapStatus = $this->input->post('status');



        $data = array(

            
            'nama_depan'=>$tangkapNamadepan,
            'nama_belakang'=>$tangkapNamabelakang,
            'tanggal_lahir'=>$tangkapTanggallahir,
            'nomor_telepon'=>$tangkapNomortelepon,
            'email'=>$tangkapEmail,
            'alamat'=>$tangkapAlamat,
            
            //'password'=>md5($tangkapPassword),
            
            'tgl_submit'=>date('Y-m-d'),
            'status'=>$tangkapStatus,
            //'role'=>1,
            
        );
        $where = array('id_user'=>$id_user);
        $this->Mduser->update($data,$where);
        redirect('user/user');
    
    }
    
    function updateprofile ($id_user){
        $tangkapNamadepan = $this->input->post('nama_depan');
        $tangkapNamabelakang = $this->input->post('nama_belakang');
        $tangkapTanggallahir = $this->input->post('tanggal_lahir');
        $tangkapNomortelepon = $this->input->post('nomor_telepon');
        $tangkapEmail = $this->input->post('email');
        $tangkapAlamat = $this->input->post('alamat');
        
        $tangkapPassword = $this->input->post('password');
        
        $tangkapStatus = $this->input->post('status');



        $data = array(

            
            'nama_depan'=>$tangkapNamadepan,
            'nama_belakang'=>$tangkapNamabelakang,
            'tanggal_lahir'=>$tangkapTanggallahir,
            'nomor_telepon'=>$tangkapNomortelepon,
            'email'=>$tangkapEmail,
            'alamat'=>$tangkapAlamat,
            
            'password'=>md5($tangkapPassword),
            
            'tgl_submit'=>date('Y-m-d'),
            'status'=>$tangkapStatus,
            //'role'=>1,
            
        );
        $where = array('id_user'=>$id_user);
        $this->Mduser->update($data,$where);
        redirect('user/sekolah');
    
    }
    

    
    function hapususer ($id_user){
        
        $data = array(

            'status'=>"1",
            'tgl_submit'=>date('Y-m-d'),
        );
        
        $where = array('id_user'=>$id_user);
        $this->Mduser->update($data,$where);
        redirect('user/user');
    }
}