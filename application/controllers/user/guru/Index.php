<?php
//ada ngeload jadwal
//fungsi print jadwal
defined("BASEPATH") OR exit("No Direct Script");

class Index extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->req();
        $this->load->model(array("Mduser","Mdmatapelajaran","Mdjadwal"));
        $this->load->library('pdf');
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
        $this->load->model("Mdjadwal");
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where3 = array(
            "user.id_user" => $this->session->id_user
        );
        $data = array(
            "jadwal" => $this->Mdjadwal->selectjadwalguru($where3)->result()
        );
        $this->load->view("user/guru/index",$data);
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
        $this->load->view("user/guru/assignmentguru");
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
        $this->load->view("user/guru/gradeguru");
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
        $this->load->view("user/guru/attendanceguru");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function tambahquiz(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->view("user/guru/tambahquiz");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    public function announcement(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->view("user/guru/announcementguru");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }    
    public function inputnilai(){
        //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->view("user/guru/inputnilai");
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
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
    
    public function jadwalpdf(){
        
        
        $this->load->model("Mdjadwal");
        $this->load->model("Mdjadwalpdf");
        
        $where3 = array(
            "user.id_user" => $this->session->id_user
        );
        $data = array(
            "jadwal" => $this->Mdjadwalpdf->selectjadwalguru($where3)->result(),
            "user" => $this->Mduser->select($where3)->result(),
            "matpel" => $this->Mdjadwalpdf->matpelpdf($this->session->id_user)->result(),
            "thajaran" => $this->Mdjadwalpdf->thajaran($this->session->id_user)->result(),
            
        );
        
               

$i = 0;
$hari = 0;

for($hari = 0; $hari < 5; $hari++){
    for($jampel = 0; $jampel < 9; $jampel++){
        $data[$hari][$jampel] = "-";
    }
}
foreach($data['jadwal'] as $a){
    switch($a->hari){
        case "SENIN" : $hari = 0;
            break;
        case "SELASA":$hari = 1;
            break;
        case "RABU" :$hari = 2;
            break;
        case "KAMIS":$hari = 3;
            break;
        case "JUMAT":$hari = 4;
            break;
    }
    $data[$hari][($a->jam_pelajaran-1)] = $a->kelas." ".$a->jurusan." ".$a->urutan;
    $i++;
}


foreach($data['user'] as $nm){
    $nama = $nm->nama_depan.' '.$nm->nama_belakang;
}
        
foreach($data['matpel'] as $mp){
    $matpel = $mp->nama_matpel;
}
        
        
 foreach($data['thajaran'] as $th){
    $thajaran = $th->tahun_awal.'-'.$th->tahun_akhir;
}       
        
        $pdf = new FPDF ('l','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','18');
        $pdf->Cell(0,15,'Jadwal Mingguan',0,1,'C');
       
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,6,$nama.' - '.$matpel.' - '.$thajaran,0,1,'C');
        
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B','10');
        $pdf->Cell(55,7,'Senin',1,0,'C');
        $pdf->Cell(55,7,'Selasa',1,0,'C');
        $pdf->Cell(55,7,'Rabu',1,0,'C');
        $pdf->Cell(55,7,'Kamis',1,0,'C');
        $pdf->Cell(55,7,'Jumat',1,1,'C');
        $pdf->SetFont('Arial','','10');
        
        
        
        
        for($jampel = 0; $jampel < 9; $jampel++){ 
            
                        
             for($hari = 0; $hari < 5; $hari++){
                 if($hari != 4)
                $pdf->Cell(55,15,$data[$hari][$jampel],1,0,'C');
                 else
                     $pdf->Cell(55,15,$data[$hari][$jampel],1,1,'C');
             }
            
        
        
            
        }
        $filename='tes.pdf';
        
        $pdf->Output($filename,'F');
        
        $pdf->Output();


        
        
        
    
        
        
    }
    
}
