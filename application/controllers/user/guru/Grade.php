<?php
//ngeload kelas yang diajar
//pilih kelas 
//input nilai harian
//input nilai (non harian nanti rata2 dari non harian itu masuk ke kolom rapot ini) (input sekaligus banyak siswa)
//edit nilai (bukan peranak, tapi semua kebuka langsung aja)

defined("BASEPATH") OR exit("No Direct Script");

class Grade extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->req();
        $this->load->model(array("Mduser","Mdmatapelajaran"));
    }
    public function req(){
        $this->load->view("req/html-open");
        $this->load->view("req/head");
        $this->load->view("user/guru/menu");
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
        $this->load->model("Mdgurumatapelajaran");
        $where = array(
            "user.id_user" => $this->session->id_user
        );
        $data = array(
            "kelas" => $this->Mdgurumatapelajaran->selectgurukelas($where)->result()
        );
        $this->load->view("user/guru/gradeguru",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-linechart");
        $this->load->view("script/js-datatable");
    }
    
    public function ujian(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where = array(
            "kelas_siswa.id_kelas" => $this->session->idkelas
        );
        $this->load->model("Mdkelassiswa");
        $data = array(
            "siswa" => $this->Mdkelassiswa->select($where)->result(),
            //"ulangan" => $this->Mdulanganharian->select($where)->result()
        );
        $this->load->view("user/guru/inputnilai",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
    public function harian(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->model("Mdaktivitasmingguan");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where = array(
            "kelas_siswa.id_kelas" => $this->session->idkelas
        );
        $this->load->model("Mdkelassiswa");
        $data = array(
            "siswa" => $this->Mdkelassiswa->select($where)->result(),
            "mingguan" => $this->Mdaktivitasmingguan->selectaktivitasmingguanguru2()->result()
            //"ulangan" => $this->Mdulanganharian->select($where)->result()
        );
        $this->load->view("user/guru/inputnilaiharian",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
        $this->load->view("user/guru/script/js-ajax-mingguuh");
    }
    
    public function walikelas(){
         //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->view("user/guru/walikelas");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function kelas(){
        $kelas = $this->input->post("kelas");
        $this->session->idkelas = $kelas;
        redirect("user/guru/grade");
    }
    public function ulanganharian(){
        $data = array(
            "tgl_ujian" => $this->input->post("tglujian"),
            "tema_ujian" => $this->input->post("tema")
        );
        $this->load->model("Mdulanganharian");
        $this->Mdulanganharian->insert($data);
        redirect("user/guru/grade");
    }
    public function inputharian(){
        $mingguan = $this->input->post("aktivitas");
        $nilais = $this->input->post("nilai");
        $idsiswa = $this->input->post("id");
        $nilai = array();
        $id = array();
        $i = 0;
        foreach($nilais as $a){
            $nilai[$i] = $a;
        }
        $i = 0;
        foreach($idsiswa as $a){
            $id[$i] = $a;
        }
        $this->load->model("Mdpenilaian");
        for($i = 0; $i<count($id);$i++){
            $data = array(
                "id_siswa" => $id[$i],
                "id_aktivitas" => $mingguan,
                "nilai" => $nilai[$i]
            );
            $this->Mdpenilaian->insertharian($data);
        }
        redirect("user/guru/grade");
    }
    public function detailnilaisiswa(){
         //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->view("user/guru/detailnilaisiswa");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-linechart");
        $this->load->view("script/js-datatable");
    }
    public function detailabsensiswa(){
         //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->view("user/guru/detailabsensiswa");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-piechart");
        $this->load->view("script/js-datatable");
    }
    
}
?>