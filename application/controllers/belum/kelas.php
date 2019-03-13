<?php 
 
class kelas extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		  
          $this->load->model(array('Mdkelas','Mdgurutahunan'));
          
	}
 
	public function index(){
        $where = NULL;
        $data['kelas'] = $this->Mdkelas->select($where)->result();
        
        $this->load->view('view1',$data);

    }
    
    function tambahkelas(){
        $where = NULL;
        $data['gurutahunan'] = $this->Mdgurutahunan->select($where)->result();
        
        $this->load->view('view',$data);
    }
    
    
    function simpankelas(){
        $tangkapIdkelas = $this->input->post('id_kelas');
        $tangkapJurusan = $this->input->post('jurusan');
        $tangkapUrutan = $this->input->post('urutan');
        $tangkapIdgurutahunan = $this->input->post('id_gurutahunan');
        $tangkapStatuskelas = $this->input->post('status_kelas');

        $data = array(

            'id_kelas'=>$tangkapIdkelas,
            'jurusan'=>$tangkapJurusan,
            'urutan'=>$tangkapUrutan,
            'id_gurutahunan'=>$tangkapIdgurutahunan,
            'status_kelas'=>$tangkapStatuskelas,
            'tgl_submit_kelas'=>date('Y-m-d'),
        );
        
        $this->Mdkelas->insert($data);
        redirect('kelas');
    
    }
    
    
    function editkelas ($id_kelas){
        $where = NULL;
        $data['gurutahunan'] = $this->Mdgurutahunan->select($where)->result();
        $where = array('id_kelas'=>$id_kelas);
        $data['kelas']=$this->Mdkelas->select($where)->result();
        $this->load->view('view2',$data);
    }
        
       
    
    function updatekelas ($id_kelas){
        $tangkapJurusan = $this->input->post('jurusan');
        $tangkapUrutan = $this->input->post('urutan');
        $tangkapIdgurutahunan = $this->input->post('id_gurutahunan');
        $tangkapStatuskelas = $this->input->post('status_kelas');

        $data = array(

            'jurusan'=>$tangkapJurusan,
            'urutan'=>$tangkapUrutan,
            'id_gurutahunan'=>$tangkapIdgurutahunan,
            'status_kelas'=>$tangkapStatuskelas,
            'tgl_submit_kelas'=>date('Y-m-d'),
        );
        
        $where = array('id_kelas'=>$id_kelas);
        $this->Mdkelas->update($data,$where);
        redirect('kelas');
    
    }
        
    
    
    function hapuskelas ($id_kelas){
        $data = array(

            'status_kelas'=>"1",
        );
        
        $where = array('id_kelas'=>$id_kelas);
        $this->Mdkelas->update($data,$where);
        redirect('kelas');
    }
	
}