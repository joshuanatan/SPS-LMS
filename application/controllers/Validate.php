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
    public function cekujian(){
        $id_mingguan = $this->input->post("id_mingguan");
        $this->load->model("Mdquiz");
        $where = array(
            "quiz.id_mingguan" => $id_mingguan
        );
        $result = $this->Mdquiz->select($where)->num_rows();
        echo json_encode($result);
    }
    public function nilaiulangan(){
        $id_matpel = $this->input->post("id_matpel");
        $this->load->model("Mdpenilaian");
        $result = $this->Mdpenilaian->laporannilai($id_matpel)->result();
        $i = "";
        foreach($result as $a){
            $i .= "<tr><td>".$a->materi_mingguan."</td><td>".$a->tgl_kelas."</td><td>".$a->nilai."</td><td>ULANGAN HARIAN</td>";
            
        }
        $this->load->model("Mdnilaiquiz");
        $result = $this->Mdnilaiquiz->laporannilai($id_matpel)->result();
        foreach($result as $a){
            
            $i .= "<tr><td>".$a->materi_mingguan."</td><td>".$a->tgl_kelas."</td><td>".(($a->nilai_quiz)*10)."</td><td>QUIZ</td>";
            
        }        
        echo json_encode($i);
    }
    public function nilaiulanganuntukchart(){
        $id_matpel = $this->input->post("id_matpel");
        $this->load->model("Mdpenilaian");
        $this->load->model("Mdsiswaangkatan");
        $where = array(
            "user.id_user" => $this->session->id_user
        );
        $result = $this->Mdsiswaangkatan->select($where);
        foreach($result->result() as $a){
            $this->session->id_siswa = $a->id_siswa_angkatan;
        }
        $result = $this->Mdpenilaian->kkm($id_matpel)->result();
        $kkm = array();
        $b = 0;
        foreach($result as $a){
            $kkm[$b] = $a->a;
            $b++;
        }       
        $result = $this->Mdpenilaian->laporannilai($id_matpel)->result();
        $i = "";
        $b=0;
        foreach($result as $a){
            $i .= $a->materi_mingguan."-".($a->nilai)."-".$kkm[$b].",";
            $b++;
            
        }       
        echo json_encode($i);
    }
    public function datanilaiulangansiswa(){
        $id_matpel = $this->input->post("id_matpel");
        $this->load->model("Mdpenilaian");
        $result = $this->Mdpenilaian->laporannilai($id_matpel)->result();
        $i = "";
        foreach($result as $a){
            $i .= "<tr><td>".$a->materi_mingguan."</td><td>".$a->tgl_kelas."</td><td>".$a->nilai."</td><td>ULANGAN HARIAN</td>";
            
        }
        $this->load->model("Mdnilaiquiz");
        $result = $this->Mdnilaiquiz->laporannilai($id_matpel)->result();
        foreach($result as $a){
            
            $i .= "<tr><td>".$a->materi_mingguan."</td><td>".$a->tgl_kelas."</td><td>".(($a->nilai_quiz)*10)."</td><td>QUIZ</td>";
            
        }        
        echo json_encode($i);
    }
    public function nilairataratauntukchart(){
        $id_matpel = $this->input->post("id_matpel");
        $this->load->model("Mdpenilaian");
        $this->load->model("Mdsiswaangkatan");
        $where = array(
            "user.id_user" => $this->session->id_user
        );
        $result = $this->Mdsiswaangkatan->select($where);
        foreach($result->result() as $a){
            $this->session->id_siswa = $a->id_siswa_angkatan;
        }   
        $result = $this->Mdpenilaian->rataratasemua($id_matpel)->result();
        $i = "";
        foreach($result as $a){
            $i .= $a->a."-".$a->nama_matpel."=";
            
        }       
        echo json_encode($i);
    }
    public function nilaiulangansiswa(){
        $id_matpel = $this->input->post("id_matpel");
        $this->load->model("Mdpenilaian");
        $this->load->model("Mdsiswaangkatan");
        $where = array(
            "user.id_user" => $this->session->id_user
        );
        $result = $this->Mdsiswaangkatan->select($where);
        foreach($result->result() as $a){
            $this->session->id_siswa = $a->id_siswa_angkatan;
        }
        $result = $this->Mdpenilaian->laporannilai($id_matpel)->result();
        $i = "";
        foreach($result as $a){
            $i .= "<tr><td>".$a->materi_mingguan."</td><td>".$a->tgl_kelas."</td><td>".$a->nilai."</td><td>ULANGAN HARIAN</td>";
            
        }
        $this->load->model("Mdnilaiquiz");
        $result = $this->Mdnilaiquiz->laporannilai($id_matpel)->result();
        foreach($result as $a){
            
            $i .= "<tr><td>".$a->materi_mingguan."</td><td>".$a->tgl_kelas."</td><td>".(($a->nilai_quiz)*10)."</td><td>QUIZ</td>";
            
        }        
        echo json_encode($i);
    }
    public function nilaiutama(){
        $id_matpel = $this->input->post("id_matpel");
        $this->load->model("Mdpenilaian");
        $this->load->model("Mdnilaiquiz");
        $result = $this->Mdnilaiquiz->laporannilai($id_matpel)->result();
        $total = 0; $jumlah = 0;
        foreach($result as $a){
            $total += ($a->nilai_quiz)*10;
            $jumlah++;
        } 
        $result = $this->Mdpenilaian->laporannilaiutama($id_matpel)->result();
        $i = "";
        foreach($result as $a){
            $i .= "<tr><td>UAS</td><td>".$a->uas."%</td><td>".$a->nilai_uas."</td>";
            $i .= "<tr><td>UTS</td><td>".$a->uts."%</td><td>".$a->nilai_uts."</td>";
            $i .= "<tr><td>RATA-RATA UH</td><td>".$a->uh."%</td><td>".$a->nilai_uh."</td>";
            $i .= "<tr><td>RATA-RATA QUIZ</td><td>".$a->quiz."%</td><td>".round($total/$jumlah,2)."</td>";
            $i .= "<tr><td>LAB</td><td>".$a->lab."%</td><td>".$a->nilai_lab."</td>";
            $i .= "<tr><td>TUGAS</td><td>".$a->tugas."%</td><td>".$a->nilai_tugas."</td>";
            $i .= "<tr><td>NILAI AKHIR</td><td>".($a->tugas+$a->lab+$a->uh+$a->uts+$a->uas+$a->quiz)."%</td><td>".($a->nilai_tugas*($a->tugas/100)+$a->nilai_lab*($a->lab/100)+$a->nilai_uh*($a->uh/100)+$a->nilai_uts*($a->uts/100)+$a->nilai_uas*($a->uas/100)+round($total/$jumlah,2)*($a->quiz/100))."</td>";
        }
        echo json_encode($i);
    }
    public function nilaiutamasiswa(){
        $this->load->model("Mdsiswaangkatan");
        $where = array(
            "user.id_user" => $this->session->id_user
        );
        $result = $this->Mdsiswaangkatan->select($where);
        foreach($result->result() as $a){
            $this->session->id_siswa = $a->id_siswa_angkatan;
        }
        $id_matpel = $this->input->post("id_matpel");
        $this->load->model("Mdpenilaian");
        $this->load->model("Mdnilaiquiz");
        $result = $this->Mdnilaiquiz->laporannilai($id_matpel)->result();
        $total = 0; $jumlah = 0;
        foreach($result as $a){
            $total += ($a->nilai_quiz)*10;
            $jumlah++;
        } 
        $result = $this->Mdpenilaian->laporannilaiutama($id_matpel)->result();
        $i = "";
        foreach($result as $a){
            $i .= "<tr><td>UAS</td><td>".$a->uas."%</td><td>".$a->nilai_uas."</td>";
            $i .= "<tr><td>UTS</td><td>".$a->uts."%</td><td>".$a->nilai_uts."</td>";
            $i .= "<tr><td>RATA-RATA UH</td><td>".$a->uh."%</td><td>".$a->nilai_uh."</td>";
            $i .= "<tr><td>RATA-RATA QUIZ</td><td>".$a->quiz."%</td><td>".round($total/$jumlah,2)."</td>";
            $i .= "<tr><td>LAB</td><td>".$a->lab."%</td><td>".$a->nilai_lab."</td>";
            $i .= "<tr><td>TUGAS</td><td>".$a->tugas."%</td><td>".$a->nilai_tugas."</td>";
            $i .= "<tr><td>NILAI AKHIR</td><td>".($a->tugas+$a->lab+$a->uh+$a->uts+$a->uas+$a->quiz)."%</td><td>".($a->nilai_tugas*($a->tugas/100)+$a->nilai_lab*($a->lab/100)+$a->nilai_uh*($a->uh/100)+$a->nilai_uts*($a->uts/100)+$a->nilai_uas*($a->uas/100)+round($total/$jumlah,2)*($a->quiz/100))."</td>";
        }
        echo json_encode($i);
    }
    public function ambilabsen(){
        $matapelajaran = $this->input->post("matapelajaran");
        $bulan = $this->input->post("bulan");
        $this->load->model("Mdabsen");
        $result = $this->Mdabsen->absensiswabulanan($matapelajaran,$bulan);
        $i = "";
        foreach($result->result() as $a){
            $i .= "<tr><td>".$a->tgl_kelas."</td><td>".$a->materi_mingguan."</td>";
            if($a->id_absen  == null){
                $i .= "<td>TIDAK MASUK</td>";
            }
            else $i .= "<td>MASUK</td>";
            $i .= "</tr>";
        }
        echo json_encode($i);
    }
    public function ambilabsensiswa(){
        $this->load->model("Mdsiswaangkatan");
        $where = array(
            "user.id_user" => $this->session->id_user
        );
        $result = $this->Mdsiswaangkatan->select($where);
        foreach($result->result() as $a){
            $this->session->id_siswa = $a->id_siswa_angkatan;
        }
        $matapelajaran = $this->input->post("matapelajaran");
        $bulan = $this->input->post("bulan");
        $this->load->model("Mdabsen");
        $result = $this->Mdabsen->absensiswabulanan($matapelajaran,$bulan);
        $this->session->attendancechartdata = array();
        $i = "";
        $hadir = 0;
        $tidak = 0;
        foreach($result->result() as $a){
            $i .= "<tr><td>".$a->tgl_kelas."</td><td>".$a->materi_mingguan."</td>";
            if($a->id_absen  == null){
                $i .= "<td>TIDAK MASUK</td>";
                $tidak++;
            }
            else{ $i .= "<td>MASUK</td>"; $hadir++;}
            $i .= "</tr>";
        }
        echo json_encode($i);
    }
    public function ambilabsensiswa2(){
        $this->load->model("Mdsiswaangkatan");
        
        $matapelajaran = $this->input->post("matapelajaran");
        $bulan = $this->input->post("bulan");
        $this->load->model("Mdabsen");
        $result = $this->Mdabsen->absensiswabulananuntukortu($matapelajaran,$bulan);
        $this->session->attendancechartdata = array();
        $i = "";
        $hadir = 0;
        $tidak = 0;
        foreach($result->result() as $a){
            $i .= "<tr><td>".$a->tgl_kelas."</td><td>".$a->materi_mingguan."</td>";
            if($a->id_absen  == null){
                $i .= "<td>TIDAK MASUK</td>";
                $tidak++;
            }
            else{ $i .= "<td>MASUK</td>"; $hadir++;}
            $i .= "</tr>";
        }
        echo json_encode($i);
    }
    
    public function dataabsenchart(){
        
        $matapelajaran = $this->input->post("matapelajaran");
        $bulan = $this->input->post("bulan");
        $this->load->model("Mdabsen");
        $result = $this->Mdabsen->absensiswabulananuntukortu($matapelajaran,$bulan);
        $this->session->attendancechartdata = array();
        $i = "";
        $hadir = 0;
        $tidak = 0;
        foreach($result->result() as $a){
            if($a->id_absen  == null){
                $tidak++;
            }
            else{ 
                $hadir++;
            }
        }
        $i = $hadir.",".$tidak;
        echo json_encode($i);
    }
    public function detailidsiswa(){
        $id_user = $this->input->post("id_user");
        $this->load->model("Mdsiswa");
        $where = array(
            "user.id_user" => $id_user,
            "md5(user.id_user)" => $this->input->post("password")
        );
        $result = $this->Mdsiswa->select($where);
        $i = "<table class = 'table table-stripped table-bordered'>";
        foreach($result->result() as $a){
            
            $i.= "<tr><td style = 'width:30%'>ID User: </td><td style = 'width:70%'>".$a->id_user."</td></tr>";
            $i.= "<tr><td>ID Siswa: </td><td>".$a->id_siswa."</td></tr>";
            $i.= "<tr><td>Nama Siswa: </td><td>".ucwords($a->nama_depan)." ".ucwords($a->nama_belakang)."</td></tr>";
            $i.= "<tr><td>Tanggal Lahir Siswa: </td><td>".$a->tanggal_lahir."</td></tr>";
            $i.= "<tr><td>Alamat Siswa: </td><td>".$a->alamat."</td></tr>";
            $i.= "<tr><td>Nomor Telpon Siswa: </td><td>".$a->nomor_telpon."</td></tr>";
            $i.= "<tr><td>Jurusan Siswa: </td><td>".$a->jurusan."</td></tr>";

        }
        $i .= "</table>";
        echo json_encode($i);
    }
}