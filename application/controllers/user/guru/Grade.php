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
        $where = array(
            "status_profile" => 0
        );
        $data = array(
            "profile" => $this->Mdsistemprofile->select($where)
        );
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
    public function insertnilai(){
        $where = array(
            "user.id_user" => $this->session->id_user,
            "penugasan_guru.id_kelas" => $this->session->idkelas
        );
        $this->load->model("Mdgurumatapelajaran");
        $result = $this->Mdgurumatapelajaran->select($where)->result();
        $idgurutahun = "";
        foreach($result as $a){
            $idgurutahun = $a->id_penugasan;
        }
        $id = array();
        $tugas = array();
        $lab = array();
        $uh = array();
        $uts = array();
        $uas = array();

        $getid = $this->input->post("id");
        $gettugas = $this->input->post("tugas");
        $getlab = $this->input->post("lab");
        $getuh = $this->input->post("uh");
        $getuts = $this->input->post("uts");
        $getuas = $this->input->post("uas");
        $i = 0;
        foreach($getid as $a){
            $id[$i] = $a;
            $i++;
        }
        $i = 0;
        foreach($gettugas as $a){
            $tugas[$i] = $a;
            $i++;
        }
        $i = 0;
        foreach($getlab as $a){
            $lab[$i] = $a;
            $i++;
        }
        $i = 0;
        foreach($getuh as $a){
            $uh[$i] = $a;
            $i++;
        }
        $i = 0;
        foreach($getuts as $a){
            $uts[$i] = $a;
            $i++;
        }
        $i = 0;
        foreach($getuas as $a){
            $uas[$i] = $a;
            $i++;
        }
        $this->load->model("Mdpenilaian");
        for($i = 0; $i<count($uas);$i++){
            $where = array(
                "penilaian.id_siswa_angkatan" =>$id[$i],
                "id_penugasan" => $idgurutahun
            );
            $this->Mdpenilaian->delete($where);
            if($lab[i] != ""){
                $data = array(
                    "id_siswa_angkatan" => $id[$i],
                    "id_penugasan" => $idgurutahun,
                    "nilai_tugas" => $tugas[$i],
                    "nilai_lab" => $lab[$i],
                    "nilai_uh" => $uh[$i],
                    "nilai_uts" => $uts[$i],
                    "nilai_uas" => $uas[$i],
                    "tgl_submit_penilaian" => date("Y-m-d")
                );
            }
            else{
                $data = array(
                    "id_siswa_angkatan" => $id[$i],
                    "id_penugasan" => $idgurutahun,
                    "nilai_tugas" => $tugas[$i],
                    "nilai_lab" => 0,
                    "nilai_uh" => $uh[$i],
                    "nilai_uts" => $uts[$i],
                    "nilai_uas" => $uas[$i],
                    "tgl_submit_penilaian" => date("Y-m-d")
                );
            }
            $this->Mdpenilaian->insert($data);
        }
        redirect("user/guru/grade/ujian");
    }
    public function ujian(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where = array(
            "kelas_siswa.id_kelas" => $this->session->idkelas
        );
        $where123 = array(
            "id_matpel" => $this->session->id_kelas_guru_login
        );
        $this->load->model("Mdpenilaian");
        $this->load->model("Mdulanganharian");
        $data = array(
            "siswa" => $this->Mdpenilaian->harianuntukakhir($where)->result(),
            "ulangan" => $this->Mdulanganharian->averageTiapAnak($where)->result(),
            "matapelajaran" => $this->Mdmatapelajaran->select($where123)->result()
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
        //disini harus ngeload email ortu tiap murid lalu kirimin email
        $mingguan = $this->input->post("aktivitas");
        $this->load->model("Mdaktivitasmingguan");
        $where = array("id_mingguan" => $mingguan);
        $result = $this->Mdaktivitasmingguan->select($where)->result();
        foreach($result as $a){
            $namaaktivitas = $a->materi_mingguan;
            $tanggal = $a->tgl_kelas;
        }
        /*$nilais = $this->input->post("nilai");
        $idsiswa = $this->input->post("id");
        $nilai = array();
        $id = array();
        $i = 0;
        foreach($nilais as $a){
            $nilai[$i] = $a;
        }
        echo "panjang nilai = ".count($nilai);
        $i = 0;
        foreach($idsiswa as $a){
            $id[$i] = $a;
        }
        echo "panjang nilai = ".count($id);*/
        $this->load->model("Mdpenilaian");
        for($i = 0; $i<$this->session->jumlahsiswa;$i++){
            echo $mingguan;
            $where = array(
                "id_siswa" => $this->input->post("id".$i),
                "id_aktivitas" => $mingguan
            );
            $data = array(
                "nilai" => $this->input->post("nilai".$i) //bukannya ini harusnya rata2 ya ?
            );
            $this->Mdpenilaian->updateharian($data,$where);

            $this->load->model("Mdorangtua");
            $result = $this->Mdorangtua->selectortuanak($this->input->post("id".$i))->result();
            $this->email();
            foreach($result as $a){
                $this->email->from('eeducation.is.1@gmail.com', 'iSupport Team');
                $this->email->to($a->email_orangtua); 
                $this->email->subject('Nilai Siswa');
    
                $this->email->message("Selamat Pagi/Siang/Sore/Malam, berikut saya beritahukan terkait nilai pada materi ulangan ".$namaaktivitas." pada tanggal ".$tanggal.". Anak anda atas nama ".$a->nama_depan." ".$a->nama_belakang." Mendapatkan nilai ulangan sebesar ".$this->input->post("nilai".$i));  
                $this->email->send();
            }
        }
        redirect("user/guru/grade/harian");
    }
    private function email(){
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