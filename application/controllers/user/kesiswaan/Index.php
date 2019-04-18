<?php
defined("BASEPATH") OR exit("No Direct Script");

class Index extends CI_Controller{
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
        $data = array(
            "tahunajaran" => $this->Mdtahunajaran->select($where)->result(),
            "siswa" => $this->Mdsiswa->selectsiswaortu($where)->result()
        );
        $this->load->view("user/kesiswaan/index",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function siswa(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
       
        $this->load->view("user/master/siswa");
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
       
        $this->load->view("user/master/kelas");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    function tambahsiswa(){
        $whereuser = array('id_role'=>"SISWA");
        $where = NULL;
        $data['user'] = $this->Mduser->select($whereuser)->result();
        $data['orangtua'] = $this->Mdorangtua->select($where)->result();
        
        $this->load->view('view',$data);
    }
    function simpansiswa(){
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
        $whereuser = array('id_role'=>"SISWA");
        $where = NULL;
        $data['user'] = $this->Mduser->select($whereuser)->result();
        $data['orangtua'] = $this->Mdorangtua->select($where)->result();
        
        $where = array('id_siswa'=>$id_siswa);
        $data['siswa']=$this->Mdsiswa->select($where)->result();
        $this->load->view('view2',$data);
    }
        
       
    
    function updatesiswa ($id_siswa){
        
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
        
        $data = array(

            'status_siswa'=>"1",
        );
        
        $where = array('id_siswa'=>$id_siswa);
        $this->Mdsiswa->update($data,$where);
        redirect('siswa');
    }
	
    public function insertOrangTua(){
        $this->load->model("Mdorangtua");
        $data = array(
            "id_user" =>  $this->input->post("iduser"),
            "pekerjaan" =>  $this->input->post("pekerjaan"),
            "status_orangtua" => 0,
            "tgl_submit_orangtua" => date('Y-m-d')
        );
        $this->Mdorangtua->insert($data);
    }
    public function viewAll(){
        $this->load->model("Mdorangtua");
        $where = array();
        $data = array(
            "orangtua" => $this->Mdorangtua->select($where)->result()
        );
        $this->load->view("user/master/orangtua",$data);
    }
    function tambahkelassiswa(){
        $where = NULL;
        $data['siswaangkatan'] = $this->Mdsiswaangkatan->select($where)->result();
        $data['kelas'] = $this->Mdkelas->select($where)->result();
        
        $this->load->view('view',$data);
    }
    
    
    function simpankelassiswa(){
        $tangkapIdkelassiswa = $this->input->post('id_kelas_siswa');
        $tangkapIdsiswaangkatan = $this->input->post('id_siswa_angkatan');
        $tangkapIdkelas = $this->input->post('id_kelas');
        $tangkapStatuskelassiswa = $this->input->post('status_kelas_siswa');

        $data = array(

            'id_kelas_siswa'=>$tangkapIdkelassiswa,
            'id_siswa_angkatan'=>$tangkapIdsiswaangkatan,
            'id_kelas'=>$tangkapIdkelas,
            'status_kelas_siswa'=>$tangkapStatuskelassiswa,
            'tgl_submit_kelas_siswa'=>date('Y-m-d'),
        );
        
        $this->Mdkelassiswa->insert($data);
        redirect('kelassiswa/tambahkelassiswa');
    
    }
    
    function editkelassiswa ($id_kelas_siswa){
        $where = NULL;
        $data['siswaangkatan'] = $this->Mdsiswaangkatan->select($where)->result();
        $data['kelas'] = $this->Mdkelas->select($where)->result();
        
        $where = array('id_kelas_siswa'=>$id_kelas_siswa);
        $data['kelassiswa']=$this->Mdkelassiswa->select($where)->result();
        $this->load->view('view2',$data);
    }
    
    
        
       
    
    function updatekelassiswa ($id_kelas_siswa){
        
        $tangkapIdsiswaangkatan = $this->input->post('id_siswa_angkatan');
        $tangkapIdkelas = $this->input->post('id_kelas');
        $tangkapStatuskelassiswa = $this->input->post('status_kelas_siswa');

        $data = array(

            'id_siswa_angkatan'=>$tangkapIdsiswaangkatan,
            'id_kelas'=>$tangkapIdkelas,
            'status_kelas_siswa'=>$tangkapStatuskelassiswa,
            'tgl_submit_kelas_siswa'=>date('Y-m-d'),
        );
        
        $where = array('id_kelas_siswa'=>$id_kelas_siswa);
        $this->Mdkelassiswa->update($data,$where);
        redirect('kelassiswa');
    
    }
        
    

    function hapuskelassiswa ($id_kelassiswa){
        
        $data = array(

            'status_kelas_siswa'=>"1",
        );
        
        $where = array('id_kelas_siswa'=>$id_kelassiswa);
        $this->Mdkelassiswa->update($data,$where);
        redirect('kelassiswa');
    }
}