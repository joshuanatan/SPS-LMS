<?php
class Validate extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function validate($hari){
        $this->load->model("Mdjadwal");
        //echo $this->input->post("hari");
        //echo $this->input->post("jam");
        $where = array(
            "id_kelas" => $this->session->pilihkelas,
        );
        
        $this->session->ajaxhari = $hari;
        $this->session->ajaxjam = $this->input->post("jam");
    
        $result = $this->Mdjadwal->selection($where);
        echo json_encode($result);
    }
    public function dokumen($id){
        $this->load->model("Mddokumen");
        //echo $this->input->post("hari");
        //echo $this->input->post("jam");
        $where = array(
            "id_mingguan" => $id,
            "dokumen.status_dokumen" => 0
        );
        $result = $this->Mddokumen->select($where);
        echo json_encode($result);
    }
    public function aktivitasmingguan($kelas){
        $this->load->model("Mdaktivitasmingguan");
        $where = array(
            "id_kelas" => $kelas,
            "user.id_user" => $this->session->id_user
        );
        $result = $this->Mdaktivitasmingguan->selectaktivitas($where);
        echo json_encode($result);
    }
    public function kelassiswa($kelas){
        $this->load->model("Mdkelassiswa");
        $where = array(
            "user.status" => 0,
            "kelas.id_kelas" => $kelas
        );  
        $result = $this->Mdkelassiswa->selectkelassiswa($where);
        echo json_encode($result);
    }
    public function cekulangankelas(){ //buat nampilin button aja

        $this->session->idmingguan = $this->input->post("id_aktivitas");
        $this->load->model("Mdpenilaian");
        $where = array();
        $i = $this->cekulanganharian();
        echo json_encode($i);
    }
    
    public function nilaikelas(){

        $this->session->idmingguan = $this->input->post("id_aktivitas");
        $this->load->model("Mdpenilaian");
        $where = array();
        $result = $this->Mdpenilaian->selectnilaiminggu($where);
        $this->session->unset_userdata('idmingguan');
        echo json_encode($result);
    }
    private function cekulanganharian(){
        $where2 = array(
            "id_mingguan" => $this->session->idmingguan,
            "status_ujian" => 1
        );
        $this->load->model("Mdaktivitasmingguan");
        $result2 = $this->Mdaktivitasmingguan->select($where2)->result();
        //$this->session->nobuka = 0;
        $i = "";
        foreach($result2 as $a){ 
            $i = "A";   
        }
        if($i != "A"){
            $i .= "<button type = 'button' class = 'btn btn-success col-lg-12' onclick = 'bukaulangan()'>BUKA ULANGAN</button>";
        }
        else $i = "";
        return $i;
    }
    public function bukaulangan(){
        $id_aktivitas = $this->input->post("aktivitas");
        $this->session->idmingguan = $id_aktivitas;
        
        $this->load->model("Mdaktivitasmingguan");
        $data = array(
            "status_ujian" => 1
        );      
        $where = array(
            "id_mingguan" => $id_aktivitas  
        );
        $this->Mdaktivitasmingguan->update($data,$where);
        
        $this->load->model("Mdkelassiswa");
        $where2 = array(
            "kelas_siswa.id_kelas" => $this->session->idkelas
        );
        $result = $this->Mdkelassiswa->select($where2)->result();
        
        $this->load->model("Mdpenilaian");
        foreach($result as $a){
            $data = array(
                "id_aktivitas" => $id_aktivitas,
                "id_siswa" => $a->id_siswa_angkatan,
                "nilai" => 0
            );
            $this->Mdpenilaian->insertharian($data);
        }
        
        $where = array();
        $result = $this->Mdpenilaian->selectnilaiminggu($where);
        echo json_encode($result);
    }
}