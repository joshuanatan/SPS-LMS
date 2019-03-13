<?php
defined("BASEPATH") OR exit("No Direct Script");

class Siswa extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->req();
    }
    public function req(){
        $this->load->view("req/html-open");
        $this->load->view("req/head");
        $this->load->view("siswa/menu");
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
    public function index(){ //buat nampilin dashboard siswa (kalau siswa login)
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->view("siswa/index");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function matapelajaran(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->view("siswa/matapelajaran");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function assignment(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->view("siswa/index2");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function grade(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->view("siswa/index3");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-linechart");
        $this->load->view("script/js-datatable");
    }
    public function attendance(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->view("siswa/index4");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
        $this->load->view("script/js-piechart");
    }
    public function announcement(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->view("siswa/index5");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("siswa/script/js-datatable");
    }
    /*end akses menu*/
    
    
    /* fungsi yang seharusnya tidak diakses oleh siswa*/
    function tambahsiswa(){
        /*pindah ke page baru untuk menambah siswa*/
        $whereuser = array('id_role'=>"SISWA");
        $where = NULL;
        $data['user'] = $this->Mduser->select($whereuser)->result();
        $data['orangtua'] = $this->Mdorangtua->select($where)->result();
        
        $this->load->view('view',$data);
    }
    
    
    function simpansiswa(){
        /*fungsi yang dipanggil saat submit */
        $tangkapIdsiswa = $this->input->post('id_siswa');
        $tangkapIduser = $this->input->post('id_user');
        $tangkapJurusan = $this->input->post('jurusan');
        $tangkapIdorangtua = $this->input->post('id_orangtua');
        $tangkapStatussiswa = $this->input->post('status_siswa');

        $data = array(

            'id_siswa'=>$tangkapIdsiswa,
            'id_user'=>$tangkapIduser,
            'jurusan'=>$tangkapJurusan,
            'id_orangtua'=>$tangkapIdorangtua,
            'status_siswa'=>$tangkapStatussiswa,
            'tgl_submit_siswa'=>date('Y-m-d'),
        );
        
        $this->Mdsiswa->insert($data);
        redirect('siswa/tambahsiswa');
    
    }
    function editsiswa ($id_siswa){
        /*pindah ke page untuk melakukan edit data siswa*/
        $whereuser = array('id_role'=>"SISWA");
        $where = NULL;
        $data['user'] = $this->Mduser->select($whereuser)->result();
        $data['orangtua'] = $this->Mdorangtua->select($where)->result();
        
        $where = array('id_siswa'=>$id_siswa);
        $data['siswa']=$this->Mdsiswa->select($where)->result();
        $this->load->view('view2',$data);
    }
    function updatesiswa ($id_siswa){
        /*fungsi yang dipangil saat perubahan disubmit*/
        $tangkapIduser = $this->input->post('id_user');
        $tangkapJurusan = $this->input->post('jurusan');
        $tangkapIdorangtua = $this->input->post('id_orangtua');
        $tangkapStatussiswa = $this->input->post('status_siswa');

        $data = array(

            
            'id_user'=>$tangkapIduser,
            'jurusan'=>$tangkapJurusan,
            'id_orangtua'=>$tangkapIdorangtua,
            'status_siswa'=>$tangkapStatussiswa,
            'tgl_submit_siswa'=>date('Y-m-d'),
        );
        
        $where = array('id_siswa'=>$id_siswa);
        $this->Mdsiswa->update($data,$where);
        redirect('siswa');
    
    }
        
    
    
    function hapussiswa ($id_siswa){
        /*fungsi yang dipanggil untuk menghapus siswa*/
        $data = array(

            'status_siswa'=>"1",
        );
        
        $where = array('id_siswa'=>$id_siswa);
        $this->Mdsiswa->update($data,$where);
        redirect('siswa');
    }
    
    
    public function quiz(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->view("siswa/quiz");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
}