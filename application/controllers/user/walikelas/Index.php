<?php
//ngeload semua anak
//ngeload mata pelajaran
//ngeload grafik nilai & absensi setiap mata pelajaran

//melihat detail nilai tiap anak
//cetak pdf absen
//cetak rapot absen
//lulus ga lulus otomatis dari sistem melalui tombol evaluate

defined("BASEPATH") OR exit("No Direct Script");

class Index extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->req();
        $this->load->model(array("Mduser","Mdmatapelajaran","Mdraporpdf","Mdnilaiquiz"));
        $this->load->library('pdf');
        $this->load->library('email');
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
        $this->load->model("Mdkelassiswa");
        $where = array(
            "guru.id_user" => $this->session->id_user
        );
        $data = array(
            "siswakelas" => $this->Mdkelassiswa->selectsiswawalikelas($where)
        );
        foreach($data["siswakelas"]->result() as $a){
            $this->session->id_kelas = $a->id_kelas;
        }
        $this->load->view("user/guru/walikelas",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
        $this->load->view("user/guru/script/js-ajax-nilai");
    }
    
    public function detailnilaisiswa($i){
         //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        $this->load->model("Mdmatapelajaran");
        $this->session->id_siswa = $i;
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $where = array(
            "id_siswa_angkatan" => $i
        );
        $data = array(
            "matpel" => $this->Mdmatapelajaran->matpel()
        );
        $this->load->view("user/guru/detailnilaisiswa",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-linechart");
        $this->load->view("user/guru/script/js-datatable");
        $this->load->view("user/guru/script/js-ajax-nilai");
    }
    
    
    public function raporpdf($i){
        $this->load->model("Mdraporpdf");
        $where = array(
            "siswa_angkatan.id_siswa_angkatan" => $i
        );
        $this->session->id_siswa = $i;
        $nama=$this->Mdraporpdf->nama($where)->result();
        $kelas=$this->Mdraporpdf->kelas($where)->result();
        $thajaran=$this->Mdraporpdf->thajaran($where)->result();
        
        
        
        foreach ($nama as $nm);
        foreach ($kelas as $kls);
        foreach ($thajaran as $th);
        
        
        
        $pdf = new FPDF ('p','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B','18');
        $pdf->Cell(0,15,'Rapot Personal',0,1,'C');
        
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,6,$nm->nama_depan.' '.$nm->nama_belakang,0,1,'C');
        $pdf->Cell(0,6,$kls->kelas.' '.$kls->jurusan.' '.$kls->urutan.' - '.$th->tahun_awal.' / '.$th->tahun_akhir,0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B','10');
        $pdf->Cell(57,7,'Mata Pelajaran',1,0,'C');
        $pdf->Cell(13,7,'KKM',1,0,'C');
        $pdf->Cell(13,7,'UH',1,0,'C');
        $pdf->Cell(13,7,'UTS',1,0,'C');
        $pdf->Cell(13,7,'UAS',1,0,'C');
        $pdf->Cell(13,7,'Quiz',1,0,'C');
        $pdf->Cell(13,7,'Lab',1,0,'C');
        $pdf->Cell(13,7,'Tugas',1,0,'C');
        $pdf->Cell(43,7,'Rata-rata Akhir',1,1,'C');
        $pdf->SetFont('Arial','','10');
        
        $wherematpel = array(
            "matapelajaran.jenis_matpel" => $kls->jurusan
        );
        
        $matpel = $this->Mdraporpdf->matpel($wherematpel)->result();
        
        foreach ($matpel as $mp){
            
            
        
            
        
            $pdf->Cell(57,6,'','LR',0,'C',0);
            $pdf->Cell(13,6,'','LR',0,'C',0);
            $pdf->Cell(13,6,$mp->uh.'%',1,0,'C');
            $pdf->Cell(13,6,$mp->uts.'%',1,0,'C');
            $pdf->Cell(13,6,$mp->uas.'%',1,0,'C');
            $pdf->Cell(13,6,$mp->quiz.'%',1,0,'C');
            $pdf->Cell(13,6,$mp->lab.'%',1,0,'C');
            $pdf->Cell(13,6,$mp->tugas.'%',1,0,'C');
            $pdf->Cell(43,6,' ','LR',1,1);
            
            $pdf->Cell(57,6,$mp->nama_matpel,'LBR',0,'C',0);



            
            $pdf->Cell(13,6,$mp->kkm,'LBR',0,'C',0);
            
            $wheremp = array(
            "guru.id_matpel" => $mp->id_matpel,
            "penilaian.id_siswa_angkatan" => $i,
        );
            
            $nilai = $this->Mdraporpdf->nilai($wheremp)->result();
            
            if($nilai != NULL){
        
            foreach ($nilai as $nl){
            
            if($nl->nilai_uh == NULL)
                $nl->nilai_uh = '-';
            if($nl->nilai_uts == NULL)
                $nl->nilai_uts = '-';
            if($nl->nilai_uas == NULL)
                $nl->nilai_uas = '-';
            if($nl->nilai_lab == NULL)
                $nl->nilai_lab = '-';    
            if($nl->nilai_tugas == NULL)
                $nl->nilai_tugas = '-';
            
                $pdf->SetTextColor(0,0,0);
                if($nl->nilai_uh < $mp->kkm){
                    $pdf->SetTextColor(255,0,0);
                }
            $pdf->Cell(13,6,$nl->nilai_uh,1,0,'C');
                
                $pdf->SetTextColor(0,0,0);
                if($nl->nilai_uts < $mp->kkm){
                    $pdf->SetTextColor(255,0,0);
                }
            $pdf->Cell(13,6,$nl->nilai_uts,1,0,'C');
                
                $pdf->SetTextColor(0,0,0);
                if($nl->nilai_uas < $mp->kkm){
                    $pdf->SetTextColor(255,0,0);
                }
                
            $pdf->Cell(13,6,$nl->nilai_uas,1,0,'C');
                $pdf->SetTextColor(0,0,0);
                
        
        $result = $this->Mdraporpdf->quiz($mp->id_matpel)->result();
        $total = 0; $jumlah = 0;
        foreach($result as $a){
            $total += (($a->nilai_quiz)*10);
            $jumlah++;
        } 
                if(round($total/$jumlah,2) < $mp->kkm){
                    $pdf->SetTextColor(255,0,0);
                }
            $pdf->Cell(13,6,round($total/$jumlah,2),1,0,'C');
                $pdf->SetTextColor(0,0,0);
                
                if($nl->nilai_lab < $mp->kkm){
                    $pdf->SetTextColor(255,0,0);
                }
            $pdf->Cell(13,6,$nl->nilai_lab,1,0,'C');
                $pdf->SetTextColor(0,0,0);
                
                if($nl->nilai_tugas < $mp->kkm){
                    $pdf->SetTextColor(255,0,0);
                }
            $pdf->Cell(13,6,$nl->nilai_tugas,1,0,'C');
                
                $pdf->SetTextColor(0,0,0);
                
                if(($nl->nilai_tugas*($mp->tugas/100)+$nl->nilai_lab*($mp->lab/100)+$nl->nilai_uh*($mp->uh/100)+$nl->nilai_uts*($mp->uts/100)+$nl->nilai_uas*($mp->uas/100)+round($total/$jumlah,2)*($mp->quiz/100)) < $mp->kkm){
                    $pdf->SetTextColor(255,0,0);
                }
            $pdf->Cell(43,6,($nl->nilai_tugas*($mp->tugas/100)+$nl->nilai_lab*($mp->lab/100)+$nl->nilai_uh*($mp->uh/100)+$nl->nilai_uts*($mp->uts/100)+$nl->nilai_uas*($mp->uas/100)+round($total/$jumlah,2)*($mp->quiz/100)),'LBR',1,'C',0);
                
            $pdf->SetTextColor(0,0,0);
            
            }
            }
            else{
            $pdf->Cell(13,6,'-',1,0,'C');
            $pdf->Cell(13,6,'-',1,0,'C');
            $pdf->Cell(13,6,'-',1,0,'C');
            $pdf->Cell(13,6,'-',1,0,'C');
            $pdf->Cell(13,6,'-',1,0,'C');
            $pdf->Cell(13,6,'-',1,0,'C');
            $pdf->Cell(43,6,'-','LBR',1,'C',0);
            }
            
        }
        $filename='tes.pdf';
        
        $pdf->Output($filename,'F');
        
        $pdf->Output();
        
        
        
        
        
    }
    
    
    public function detailabsensiswa($i){
         //$this->load->view("namapage/breadcrumb");
        $this->load->view("req/open-content");
        /* disini custom contentnya pake apapun yang dibutuhkan */
        $this->load->model("Mdmatapelajaran");
        $this->session->id_siswa = $i;
        $where = array(
            "id_siswa_angkatan" => $i
        );
        $data = array(
            "matpel" => $this->Mdmatapelajaran->matpel()
        );
        $this->load->view("user/guru/detailabsensiswa",$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("user/guru/script/js-datatable");
        $this->load->view("user/guru/script/js-ajax-absen");
    }
    public function selesai($i){
        //nonaktifkan yang ini
        //tambahin di kelas berikutnya
        $where = array(
            "id_siswa_angkatan" => $i
        );
        $data = array(
            "status_siswa_angkatan" => 1
        );
        $this->load->model("Mdsiswaangkatan");
        $this->load->model("Mdsetting");
        $this->Mdsiswaangkatan->update($data,$where);
        $result = $this->Mdsiswaangkatan->select($where);
        $where2 = array(
            "status" => 0
        );
        $tahunajaran = $this->Mdsetting->select($where2);
        foreach($tahunajaran->result() as $a){
            $tahunajaranbaru = $a->id_next_tahun_ajaran;
        }
        foreach($result->result() as $a){    
            $data = array(
                "id_tahun_ajaran" => $tahunajaranbaru,
                "id_siswa" => $a->id_siswa,
                "kelas" => $a->kelas + $this->input->post("status_naik"),
                "status_siswa_angkatan" => 0,
                "tgl_submit_siswa_angkatan" => date("Y-m-d")  
            );
            $this->Mdsiswaangkatan->insert($data);
        }
        redirect("user/walikelas/index");
    }
    
    public function emailrapor($i){
        $this->load->model("Mdemailrapor");
        
        $whereemail = array(
            "siswa_angkatan.id_siswa_angkatan" => $i);
    $email = $this->Mdemailrapor->email($whereemail)->result();
            
            foreach ($email as $em){
                $email = $em->email_orangtua;
                $nm = $em->nama_orangtua;
                $nms = $em->nama_depan." ".$em->nama_belakang;
                
            }
        
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
            $this->email->to($email); 


            $this->email->subject('Laporan Rapor Siswa');

            $this->email->message("Halo, ".$nm. ".\nBerikut terlampir laporan hasil pembelajaran siswa : ".$nms.".");  
            $this->email->attach('http://localhost:8888/spsmaster/user/walikelas/index/raporpdf/'.$i , 'attachment', $nms.'.pdf');

            $this->email->send();

            redirect('user/walikelas/index');        
            //echo $this->email->print_debugger();

        
           
    }
    
}