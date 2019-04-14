<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdkelassiswa extends CI_Model{
    public function select($where){
        $this->db->join("kelas","kelas.id_kelas = kelas_siswa.id_kelas","inner");
        $this->db->join("siswa_angkatan","siswa_angkatan.id_siswa_angkatan = kelas_siswa.id_siswa_angkatan","inner");
        $this->db->join("siswa","siswa.id_siswa = siswa_angkatan.id_siswa");
        $this->db->join("user","user.id_user= siswa.id_user","inner");
        $this->db->where("siswa_angkatan.id_tahun_ajaran in (SELECT setting.id_tahun_ajaran FROM setting WHERE status = 0)",NULL,FALSE);
        return $this->db->get_where("kelas_siswa",$where);
        /*
        query = 
        SELECT * FROM `kelas_siswa` INNER JOIN kelas on kelas.id_kelas = kelas_siswa.id_kelas INNER JOIN siswa_angkatan on siswa_angkatan.id_siswa_angkatan = kelas_siswa.id_siswa_angkatan INNER JOIN siswa on siswa.id_siswa = siswa_angkatan.id_siswa INNER JOIN user on user.id_user= siswa.id_user where user.id_user = 47 and siswa_angkatan.id_tahun_ajaran in (SELECT setting.id_tahun_ajaran FROM setting WHERE status = 0)

        */
    }
    public function selectkelassiswa($where){
        $this->db->join("kelas","kelas.id_kelas = kelas_siswa.id_kelas","inner");
        $this->db->join("siswa_angkatan","siswa_angkatan.id_siswa_angkatan = kelas_siswa.id_siswa_angkatan","inner");
        $this->db->join("siswa","siswa.id_siswa = siswa_angkatan.id_siswa");
        $this->db->join("user","user.id_user= siswa.id_user","inner");
        $this->db->where("siswa_angkatan.id_tahun_ajaran in (SELECT setting.id_tahun_ajaran FROM setting WHERE status = 0)",NULL,FALSE);
        $result = $this->db->get_where("kelas_siswa",$where)->result();
        $i = "";
        foreach($result as $a){
            
            $i .= "<tr><td>".$a->nama_depan." ".$a->nama_belakang."</td><td><input type = 'checkbox' name = 'status[]' value = '".$a->id_siswa_angkatan."'></td></tr>";
        }
        return $i;
    }
    public function insert($data){
        $this->db->insert("kelas_siswa",$data);
    }
    public function update($data,$where){
        $this->db->update("kelas_siswa",$data,$where);
    }
    public function remove($where){
        $this->db->delete("kelas_siswa",$where);
    }
    public function carikelas($where){
        $this->db->join("siswa_angkatan","siswa_angkatan.id_siswa_angkatan = kelas_siswa.id_siswa_angkatan","inner");
        $this->db->join("siswa","siswa.id_siswa = siswa_angkatan.id_siswa","inner");
        $this->db->join("user","user.id_user = siswa.id_user","inner");
        $this->db->join("kelas","kelas.id_kelas = kelas_siswa.id_kelas","inner");
        $this->db->where("siswa_angkatan.id_tahun_ajaran in (SELECT setting.id_tahun_ajaran FROM setting WHERE status = 0)",NULL,FALSE);
        return $this->db->get_where("kelas_siswa",$where);
    }
    public function selectsiswawalikelas($where){
        $this->db->where($where);
        $this->db->join("siswa_angkatan","kelas_siswa.id_siswa_angkatan = siswa_angkatan.id_siswa_angkatan","inner");
        $this->db->join("siswa","siswa_angkatan.id_siswa = siswa.id_siswa","inner");
        $this->db->join("user","user.id_user = siswa.id_user");
        $this->db->join("kelas","kelas.id_kelas = kelas_siswa.id_kelas");
        $this->db->join("guru_tahunan","guru_tahunan.id_gurutahunan = kelas.id_gurutahunan");
        $this->db->join("guru","guru_tahunan.id_guru = guru.id_guru");
        $this->db->where("siswa_angkatan.id_tahun_ajaran in (SELECT setting.id_tahun_ajaran FROM setting WHERE status = 0)",NULL,FALSE);
        return $this->db->get("kelas_siswa");
    }
}