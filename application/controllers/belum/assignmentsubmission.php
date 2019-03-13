<?php 
 
class assignmentsubmission extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		  $this->load->helper(array('form', 'url'));
          $this->load->model(array('Mdassignmentsubmission','Mdsiswa','Mddokumen'));
          
	}
 
	public function index(){
        $where = NULL;
        $data['assignmentsubmission'] = $this->Mdassignmentsubmission->select($where)->result();
        
        $this->load->view('view1',$data);
    }
    
    function tambahassignmentsubmission(){
        $where = NULL;
        $data['siswa'] = $this->Mdsiswa->select($where)->result();
        $data['dokumen'] = $this->Mddokumen->select($where)->result();
        
        $this->load->view('view',$data);
    }
    
    
    function simpanassignmentsubmission(){
        
        $config['upload_path']          = './assignment_submission/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 20000;
 
		$this->load->library('upload', $config);
        
        $this->upload->do_upload('file_submission');
        $upload_data = $this->upload->data();
        $file_name = $upload_data['file_name'];
 
        $tangkapIdassignmentsubmission = $this->input->post('id_assignment_submission');
        $tangkapIdsiswa = $this->input->post('id_siswa');
        $tangkapIddokumen = $this->input->post('id_dokumen');

        $tangkapfilesubmission = $file_name;

        $tangkapStatusassignment = $this->input->post('status_assignment');

        $data = array(

            'id_assignment_submission'=>$tangkapIdassignmentsubmission,
            'id_siswa'=>$tangkapIdsiswa,
            'id_dokumen'=>$tangkapIddokumen,
            'file_submission'=>$tangkapfilesubmission,               'status_assignment'=>$tangkapStatusassignment,
            'tgl_submit_assignment'=>date('Y-m-d'),
        );

        $this->Mdassignmentsubmission->insert($data);
        redirect('assignmentsubmission');
    
    }
    
    function editassignmentsubmission ($id_assignment_submission){
        $where = NULL;
        $data['siswa'] = $this->Mdsiswa->select($where)->result();
        $data['dokumen'] = $this->Mddokumen->select($where)->result();
        
        $where = array('id_assignment_submission'=>$id_assignment_submission);
        $data['assignmentsubmission']=$this->Mdassignmentsubmission->select($where)->result();
        $this->load->view('view2',$data);
    }
    
    function updateassignmentsubmission ($id_assignment_submission){
        $tangkapIdsiswa = $this->input->post('id_siswa');
        $tangkapIddokumen = $this->input->post('id_dokumen');

        $tangkapStatusassignment = $this->input->post('status_assignment');

        $data = array(

            'id_siswa'=>$tangkapIdsiswa,
            'id_dokumen'=>$tangkapIddokumen,             'status_assignment'=>$tangkapStatusassignment,
            'tgl_submit_assignment'=>date('Y-m-d'),
        );
        
        $where = array('id_assignment_submission'=>$id_assignment_submission);
        $this->Mdassignmentsubmission->update($data,$where);
        redirect('assignmentsubmission');
    
    }
    
    function editfilesubmission ($id_assignment_submission){
        $where = NULL;
        $data['siswa'] = $this->Mdsiswa->select($where)->result();
        $data['dokumen'] = $this->Mddokumen->select($where)->result();
        
        $where = array('id_assignment_submission'=>$id_assignment_submission);
        $data['filesubmission']=$this->Mdassignmentsubmission->select($where)->result();
        $this->load->view('view2',$data);
    }
    
    
    function updatefilesubmission ($id_assignment_submission){

        $config['upload_path']          = './assignment_submission/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 20000;
 
		$this->load->library('upload', $config);
        
        $this->upload->do_upload('file_submission');
        $upload_data = $this->upload->data();
        $file_name = $upload_data['file_name'];

        $tangkapfilesubmission = $file_name;
        
        $data = array(

            'file_submission'=>$tangkapfilesubmission,
            'tgl_submit_assignment'=>date('Y-m-d'),
        );
        
        $where = array('id_assignment_submission'=>$id_assignment_submission);
        $this->Mdassignmentsubmission->update($data,$where);
        redirect('assignmentsubmission');
    
    }
        
    
    
    function hapusassignmentsubmission ($id_assignment_submission){
        
        $data = array(

            'status_assignment'=>"1",
        );
        
        $where = array('id_assignment_submission'=>$id_assignment_submission);
        $this->Mdassignmentsubmission->update($data,$where);
        redirect('assignmentsubmission');
    }
}