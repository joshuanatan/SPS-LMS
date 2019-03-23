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
   
    public function selectnilaiminggu($where){
        $this->db->where($where);
        $this->db->join("aktivitas_mingguan","aktivitas_mingguan.id_mingguan = ulangan_harian.id_aktivitas","inner");
        $this->db->join("siswa_angkatan","siswa_angkatan.id_siswa_angkatan = ulangan_harian.id_siswa","inner");
        $this->db->join("siswa","siswa.id_siswa = siswa_angkatan.id_siswa","inner");
        $this->db->join("user","user.id_user = siswa.id_user","inner");
        $this->db->from("ulangan_harian");
        $result = $this->db->get()->result();
        $i = "";
        foreach($result as $a){
            $i .= "<tr><td><input class = 'form-control col-lg-12' type = 'text' name = 'id[]' value = '".$a->id_siswa_angkatan."' readonly></td><td><input class = 'form-control col-lg-12' type = 'text' value = '".$a->nama_depan." ".$a->nama_belakang."' readonly></td><td><input type = 'number' class = 'Form-control' name='nilai[]' value = '".$a->nilai."' required></td></tr>";
        }
        return $i;
    }
}