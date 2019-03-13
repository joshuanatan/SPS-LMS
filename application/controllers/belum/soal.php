<?php 
 
class soal extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		  
          $this->load->model(array('Mdsoal','Mdquiz'));
          
	}
 
	public function index(){

        $where = NULL;
        $data['soal'] = $this->Mdsoal->select($where)->result();
        
        $this->load->view('view1',$data);
    }
    
    function tambahsoal(){
        $where = NULL;
        $data['quiz'] = $this->Mdquiz->select($where)->result();
        
        $this->load->view('view',$data);
    }
    
    
    function simpansoal(){
        $tangkapIdsoal = $this->input->post('id_soal');
        $tangkapPertanyaan = $this->input->post('pertanyaan');
        $tangkapOpsi1 = $this->input->post('opsi1');
        $tangkapOpsi2 = $this->input->post('opsi2');
        $tangkapOpsi3 = $this->input->post('opsi3');
        $tangkapOpsi4 = $this->input->post('opsi4');
        $tangkapJawaban = $this->input->post('jawaban');
        $tangkapIdquiz = $this->input->post('id_quiz');
        $tangkapStatussoal = $this->input->post('status_soal');

        $data = array(

            'id_soal'=>$tangkapIdsoal,
            'pertanyaan'=>$tangkapPertanyaan,
            'opsi1'=>$tangkapOpsi1,
            'opsi2'=>$tangkapOpsi2,
            'opsi3'=>$tangkapOpsi3,
            'opsi4'=>$tangkapOpsi4,
            'jawaban'=>$tangkapJawaban,
            'id_quiz'=>$tangkapIdquiz,
            'status_soal'=>$tangkapStatussoal,
            'tgl_submit_soal'=>date('Y-m-d'),
        );
        
        $this->Mdsoal->insert($data);
        redirect('soal');
    
    }
	
    function editsoal ($id_soal){
        $where = NULL;
        $data['quiz'] = $this->Mdquiz->select($where)->result();
        
        $where = array('id_soal'=>$id_soal);
        $data['soal']=$this->Mdsoal->select($where)->result();
        $this->load->view('view2',$data);
    }
        
       
    
    function updatesoal ($id_soal){
        $tangkapPertanyaan = $this->input->post('pertanyaan');
        $tangkapOpsi1 = $this->input->post('opsi1');
        $tangkapOpsi2 = $this->input->post('opsi2');
        $tangkapOpsi3 = $this->input->post('opsi3');
        $tangkapOpsi4 = $this->input->post('opsi4');
        $tangkapJawaban = $this->input->post('jawaban');
        $tangkapIdquiz = $this->input->post('id_quiz');
        $tangkapStatussoal = $this->input->post('status_soal');

        $data = array(

            'pertanyaan'=>$tangkapPertanyaan,
            'opsi1'=>$tangkapOpsi1,
            'opsi2'=>$tangkapOpsi2,
            'opsi3'=>$tangkapOpsi3,
            'opsi4'=>$tangkapOpsi4,
            'jawaban'=>$tangkapJawaban,
            'id_quiz'=>$tangkapIdquiz,
            'status_soal'=>$tangkapStatussoal,
            'tgl_submit_soal'=>date('Y-m-d'),
        );
        
        $where = array('id_soal'=>$id_soal);
        $this->Mdsoal->update($data,$where);
        redirect('soal');
    
    }
        
    
    
    function hapussoal ($id_soal){
        
        $data = array(

            'status_soal'=>"1",
        );
        
        $where = array('id_soal'=>$id_soal);
        $this->Mdsoal->update($data,$where);
        redirect('soal');
    }
}