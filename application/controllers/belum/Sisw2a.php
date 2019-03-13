<?php 
 
class Siswa extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		  
          $this->load->model(array('Mdsiswa','Mduser','Mdorangtua'));
          
	}
 
	public function index(){

        $where = NULL;
        $data['siswa']=$this->Mdsiswa->select($where)->result();
        $this->load->view('view1',$data);
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