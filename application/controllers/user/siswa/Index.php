<?php
//jadwal
//pengumuman
?>
<?php
defined("BASEPATH") OR exit("No Direct Script");

class Index extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->req();
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
        $this->load->view("user/siswa/menu");
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
    
    public function index(){ //buat nampilin dashboard siswa (kalau siswa login)
        $this->load->model("Mdkelassiswa");
        $this->load->model("Mdjadwal");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where = array(
            "user.id_user" => $this->session->id_user //cari id kelas dulu
        );
        $result = $this->Mdkelassiswa->carikelas($where)->result();
        foreach($result as $a){
            $this->session->id_kelas = $a->id_kelas;
        }
        $where3 = array(
            "kelas.id_kelas" => $this->session->id_kelas
        );
        $data = array(
            "jadwal" => $this->Mdjadwal->selectjadwalsiswa($where3)->result()
        );
        $this->load->view("user/siswa/index",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
    
}