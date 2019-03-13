<?php 
 
class penilaian extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		  
          $this->load->model(array('Mdpenilaian','Mdkelassiswa','Mdjadwal','Mdjenis'));
          
	}
 
	public function index(){
        
        $where = NULL;
        $data['penilaian'] = $this->Mdpenilaian->select($where)->result();
        
        $this->load->view('view1',$data);

    }
    
    function tambahpenilaian(){
        $where = NULL;
        $data['kelassiswa'] = $this->Mdkelassiswa->select($where)->result();
        $data['jadwal'] = $this->Mdjadwal->select($where)->result();
        $data['jenis'] = $this->Mdjenis->select($where)->result();
        
        $this->load->view('view',$data);
    }
    
    
    function simpanpenilaian(){
        $tangkapIdpenilaian = $this->input->post('id_penilaian');
        $tangkapIdkelasisiswa = $this->input->post('id_kelas_siswa');
        $tangkapIdjadwal = $this->input->post('id_jadwal');
        $tangkapIdjenisdokumen = $this->input->post('id_jenis_dokumen');
        $tangkapNilai = $this->input->post('nilai');
        $tangkapStatuspenilaian = $this->input->post('status_penilaian');

        $data = array(

            'id_penilaian'=>$tangkapIdpenilaian,
            'id_kelas_siswa'=>$tangkapIdkelasisiswa,
            'id_jadwal'=>$tangkapIdjadwal,
            'id_jenis_dokumen'=>$tangkapIdjenisdokumen,
            'nilai'=>$tangkapNilai,
            'status_penilaian'=>$tangkapStatuspenilaian,
            'tgl_submit_penilaian'=>date('Y-m-d'),
        );
        
        $this->Mdpenilaian->insert($data);
        redirect('penilaian');
    
    }
    
    function editpenilaian ($id_penilaian){
        $where = NULL;
        $data['kelassiswa'] = $this->Mdkelassiswa->select($where)->result();
        $data['jadwal'] = $this->Mdjadwal->select($where)->result();
        $data['jenis'] = $this->Mdjenis->select($where)->result();
        
        $where = array('id_penilaian'=>$id_penilaian);
        $data['penilaian']=$this->Mdpenilaian->select($where)->result();
        $this->load->view('view2',$data);
    }
        
       
    
    function updatepenilaian ($id_penilaian){
        $tangkapIdkelasisiswa = $this->input->post('id_kelas_siswa');
        $tangkapIdjadwal = $this->input->post('id_jadwal');
        $tangkapIdjenisdokumen = $this->input->post('id_jenis_dokumen');
        $tangkapNilai = $this->input->post('nilai');
        $tangkapStatuspenilaian = $this->input->post('status_penilaian');

        $data = array(

            'id_kelas_siswa'=>$tangkapIdkelasisiswa,
            'id_jadwal'=>$tangkapIdjadwal,
            'id_jenis_dokumen'=>$tangkapIdjenisdokumen,
            'nilai'=>$tangkapNilai,
            'status_penilaian'=>$tangkapStatuspenilaian,
            'tgl_submit_penilaian'=>date('Y-m-d'),
        );
        
        $where = array('id_penilaian'=>$id_penilaian);
        $this->Mdpenilaian->update($data,$where);
        redirect('penilaian');
    
    }
        
    
    
    function hapuspenilaian ($id_penilaian){
        
        $data = array(

            'status_penilaian'=>"1",
        );
        
        $where = array('id_penilaian'=>$id_penilaian);
        $this->Mdpenilaian->update($data,$where);
        redirect('penilaian');
    }
	
}