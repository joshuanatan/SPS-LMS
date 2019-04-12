<?php 
 
defined("BASEPATH") OR exit("No Direct Script");
class tagihan extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        
        $this->load->helper(array('form', 'url'));
        $this->load->model(array('Mdtagihan','Mdsekolah','Mdtahunajaran'));
        $this->load->library('pdf');
        
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
        $data['tagihanjoin'] = $this->Mdtagihan->selectjoin($where)->result();
        $this->load->view('user/viewtagihan',$data);
        /* endnya disini */
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
    /*end akses menu*/
    
 


    
    function tambahtagihan(){
        $this->load->view("req/open-content");
        
        $where = array();
        $data['sekolah'] = $this->Mdsekolah->select($where)->result();
        $data['tahunajaran'] = $this->Mdtahunajaran->select($where)->result();
        
        $this->load->view('user/viewtambahtagihan',$data);
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
    
    
    
    function simpantagihan(){
        
        
        $tangkapIdtagihan = $this->input->post('id_tagihan');
        $tangkapIdsekolah = $this->input->post('id_sekolah');
        $tangkapIdtahunajaran = $this->input->post('id_tahun_ajaran');
        $tangkapJumlahtagihan = $this->input->post('jumlah_tagihan');
        $tangkapStatustagihan = $this->input->post('status_tagihan');



        $data = array(

            'id_tagihan'=>0,
            'id_sekolah'=>$tangkapIdsekolah,
            'id_tahun_ajaran'=>$tangkapIdtahunajaran,               'jumlah_tagihan'=>$tangkapJumlahtagihan,
            'status_tagihan'=>$tangkapStatustagihan,
            'tgl_submit_tagihan'=>date('Y-m-d'),
        );

        $this->Mdtagihan->insert($data);
        redirect('user/tagihan');
    
    }
    
    
    
    function edittagihan ($id_tagihan){
        $this->load->view("req/open-content");
        
        $where = array();
        $data['sekolah1'] = $this->Mdsekolah->select($where)->result();
        $data['tahunajaran1'] = $this->Mdtahunajaran->select($where)->result();
        
        $where = array('id_tagihan'=>$id_tagihan);
        $data['tagihan']=$this->Mdtagihan->select($where)->result();
        $this->load->view('user/viewedittagihan',$data);
        $this->load->view("req/close-content");
        $this->load->view("req/space");
        $this->close();
        $this->load->view("script/js-calender");
        $this->load->view("script/js-datatable");
    }
    
    
    
    function updatetagihan ($id_tagihan){
        $tangkapIdsekolah = $this->input->post('id_sekolah');
        $tangkapIdtahunajaran = $this->input->post('id_tahun_ajaran');
        $tangkapJumlahtagihan = $this->input->post('jumlah_tagihan');
        $tangkapStatustagihan = $this->input->post('status_tagihan');



        $data = array(

            'id_sekolah'=>$tangkapIdsekolah,
            'id_tahun_ajaran'=>$tangkapIdtahunajaran,               'jumlah_tagihan'=>$tangkapJumlahtagihan,
            'status_tagihan'=>$tangkapStatustagihan,
            'tgl_submit_tagihan'=>date('Y-m-d'),
        );

        $where = array('id_tagihan'=>$id_tagihan);
        $this->Mdtagihan->update($data,$where);
        redirect('user/tagihan');
    
    }
    

    
    function hapustagihan ($id_tagihan){
        
        $data = array(

            'status_tagihan'=>"1",
            'tgl_submit_tagihan'=>date('Y-m-d'),
        );
        
        $where = array('id_tagihan'=>$id_tagihan);
        $this->Mdtagihan->update($data,$where);
        redirect('user/tagihan');
    }
    
    
    
    function pdftagihan ($id_tagihan){
        
        $where = array('id_tagihan'=>$id_tagihan);
        $tagihanjoin = $this->Mdtagihan->selectjoin($where)->result();
        
        foreach ($tagihanjoin as $list){
        
            
            
        $pdf = new FPDF ('p','mm','A4');
        $pdf->AddPage();
        $pdf->SetMargins(30,10, 30); 
        
        $image1 = base_url().'assets/login-assets/img/logo/eduyelcopy.png';    
        $pdf->Image($image1, 70, 15, 70);
            
        $pdf->SetFont('Arial','B',18);
        $pdf->Cell(0,25,'',0,1,'C');
        
        $pdf->Cell(0,15,'Tagihan Pembayaran',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,6,$list->nama_sekolah,0,1,'C');
        $pdf->Cell(0,6,'Tahun Ajaran '.$list->tahun_awal.'-'.$list->tahun_akhir,0,1,'C');
        $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial','B','10');
            
          
            
        $pdf->Cell(75,10,'ID Tagihan',1,0,'L');
        $pdf->SetFont('Arial','','10');
            
        $pdf->Cell(75,10,$list->id_tagihan,1,1,'L');
        $pdf->SetFont('Arial','B','10');
        $pdf->Cell(75,10,'Nama Sekolah',1,0,'L');
        $pdf->SetFont('Arial','','10');
        $pdf->Cell(75,10,$list->nama_sekolah,1,1,'L');
        $pdf->SetFont('Arial','B','10');    
        $pdf->Cell(75,10,'Tahun Ajaran',1,0,'L');
        $pdf->SetFont('Arial','','10');
        $pdf->Cell(75,10,$list->tahun_awal.'-'.$list->tahun_akhir,1,1,'L');
        $pdf->SetFont('Arial','B','10');    
        $pdf->Cell(75,10,'Jumlah Tagihan',1,0,'L');
            
            $res = number_format($list->jumlah_tagihan);
        $pdf->SetFont('Arial','','10');    
        $pdf->Cell(75,10,'Rp. '.$res.',-',1,1,'L'); 
        $pdf->SetFont('Arial','B','10');    
        $pdf->Cell(75,10,'Status Tagihan',1,0,'L');
            
            if ($list->status_tagihan == 0){
                $tagihan = 'Aktif';  
                }  else {$tagihan = 'Tidak Aktif';}
        $pdf->SetFont('Arial','','10');    
        $pdf->Cell(75,10,$tagihan,1,1,'L');
        $pdf->SetFont('Arial','B','10');    
        $pdf->Cell(75,10,'Tanggal Submit Tagihan',1,0,'L');
            $dt = $list->tgl_submit_tagihan;
            $date = strtotime($dt);
        $pdf->SetFont('Arial','','10');    
        $pdf->Cell(75,10,date("d-m-Y", $date),1,1,'L');
        $pdf->SetFont('Arial','B','10');    
        $pdf->Cell(75,10,'Jatuh Tempo Pembayaran',1,0,'L');
            
            
            $date1 = strtotime("+14 day", strtotime($dt));
            //echo date("Y-m-d", $date);
        $pdf->SetFont('Arial','','10');    
        $pdf->Cell(75,10,date("d-m-Y", $date1),1,1,'L');
        $pdf->SetFont('Arial','','10');
        
        }
        
            
            
        
        $filename='a.pdf';
        
        $pdf->Output($filename,'F');
        
        $pdf->Output();
        
        
    }
    
    public function kirimtagihan ($id_tagihan){
        $where = array('id_tagihan'=>$id_tagihan);
        $tagihanjoin = $this->Mdtagihan->selectjoin($where)->result();
        
        $tagihanjoin = $this->Mdtagihan->selectjoin($where)->result();
        
        foreach ($tagihanjoin as $list){
            $email = $list->email_sekolah;
            $nama = $list->nama_sekolah;
            $ta = $list->tahun_awal.'-'.$list->tahun_akhir;
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


            $this->email->subject('Tagihan Pembayaran Tahunan');

            $this->email->message("Demikian kami lampirkan tagihan pembayaran tahunan sistem e-Education sekolah ".$nama. " periode ".$ta. ".\nMohon diperhatikan deadline pembayaran tagihan yang terlampir pada attachment di bawah.\nTerima Kasih. ");  
            $this->email->attach('http://localhost:8888/superadmin/user/tagihan/pdftagihan/'.$id_tagihan , 'attachment', $nama.'.pdf');

            $this->email->send();

            redirect('user/tagihan/index');        
            //echo $this->email->print_debugger();
            
    }
}