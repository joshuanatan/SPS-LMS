<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdpenilaian extends CI_Model{
    public function select($where){
        return $this->db->get_where("penilaian",$where);
    }
    public function insert($data){
        $this->db->insert("penilaian",$data);
    }
    public function update($data,$where){
        $this->db->update("penilaian",$data,$where);
    }
    public function insertharian($data){
        $this->db->insert("ulangan_harian",$data);
    }
    
    public function updateharian($data,$where){
        $this->db->update("ulangan_harian",$data,$where);
    }
   
    
    public function selectnilaiminggu($where){
        $query = "select * from kelas_siswa inner join siswa_angkatan on siswa_angkatan.id_siswa_angkatan = kelas_siswa.id_siswa_angkatan inner join siswa on siswa.id_siswa = siswa_angkatan.id_siswa inner join user on user.id_user = siswa.id_user inner join ulangan_harian on ulangan_harian.id_siswa = siswa_angkatan.id_siswa_angkatan where ulangan_harian.id_aktivitas = ".$this->session->idmingguan;
        $result = $this->db->query($query)->result();   
        $i = "";
        $urut = 0;
        foreach($result as $a){
            $i .= "<tr><td><input class = 'form-control col-lg-12' type = 'text' name = 'id".$urut."' value = '".$a->id_siswa_angkatan."' readonly></td><td><input class = 'form-control col-lg-12' type = 'text' value = '".$a->nama_depan." ".$a->nama_belakang."' readonly></td><td><input type = 'number' class = 'Form-control' name='nilai".$urut."' value = '".$a->nilai."' required></td></tr>";
            $urut++;
        }
        $this->session->jumlahsiswa = $urut;
        return $i;
    }
}