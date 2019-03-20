<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdjadwal extends CI_Model{
    public function select($where){
        return $this->db->get_where("jadwal",$where);
    }
    public function selectsenin($where){
        $this->db->where($where);   
        $this->db->where("hari","senin");
        return $this->db->get("jadwal");
        
    }
    public function selectselasa($where){
        $this->db->where($where);   
        $this->db->where("hari","selasa");
        return $this->db->get("jadwal");
        
    }
    public function selectrabu($where){
        $this->db->where($where);   
        $this->db->where("hari","rabu");
        return $this->db->get("jadwal");
        
    }
    public function selectkamis($where){
        $this->db->where($where);   
        $this->db->where("hari","kamis");
        return $this->db->get("jadwal");
        
    }
    public function selectjumat($where){
        $this->db->where($where);   
        $this->db->where("hari","jumat");
        return $this->db->get("jadwal");
        
    }
    public function insert($data){
        $this->db->insert("jadwal",$data);
    }
    public function update($data,$where){
        $this->db->where($where);
        $this->db->set($data);
        $this->db->update("jadwal");
    }
    public function remove($where){
        $this->db->where($where);
        $this->db->delete("jadwal");
    }
    public function selectjadwalguru($where){
        $this->db->where($where);
        $this->db->join("guru_tahunan","guru_tahunan.id_gurutahunan = jadwal.id_gurutahunan","inner");
        $this->db->join("guru","guru_tahunan.id_guru = guru.id_guru","inner");
        $this->db->join("user","guru.id_user = user.id_user","inner");
        $this->db->join("kelas","kelas.id_kelas = jadwal.id_kelas","inner");
        return $this->db->get("jadwal");
    }
    public function selectjadwalgurudistinct($where){
        $this->db->where($where);
        $this->db->group_by("kelas.id_kelas");
        $this->db->join("guru_tahunan","guru_tahunan.id_gurutahunan = jadwal.id_gurutahunan","inner");
        $this->db->join("guru","guru_tahunan.id_guru = guru.id_guru","inner");
        $this->db->join("user","guru.id_user = user.id_user","inner");
        $this->db->join("kelas","kelas.id_kelas = jadwal.id_kelas","inner");
        return $this->db->get("jadwal");
    }
    public function selectjadwalsiswa($where){
        $this->db->where($where);
        $this->db->join("guru_tahunan","guru_tahunan.id_gurutahunan = jadwal.id_gurutahunan","inner");
        $this->db->join("guru","guru_tahunan.id_guru = guru.id_guru","inner");
        $this->db->join("user","guru.id_user = user.id_user","inner");
        $this->db->join("matapelajaran","matapelajaran.id_matpel = guru.id_matpel","inner");
        $this->db->join("kelas","kelas.id_kelas = jadwal.id_kelas","inner");
        return $this->db->get("jadwal");
    }
    public function selection($where){
        $this->db->where($where);
        $this->db->join("guru","guru.id_guru = guru_tahunan.id_guru","inner");
        $this->db->join("user","user.id_user = guru.id_user","inner");
        $this->db->join("penugasan_guru","penugasan_guru.id_gurutahunan = guru_tahunan.id_gurutahunan","inner");
        $this->db->group_by("guru_tahunan.id_gurutahunan");
        $this->db->join("matapelajaran","matapelajaran.id_matpel = guru.id_matpel","inner");
        $this->db->where("guru_tahunan.id_gurutahunan not in (select jadwal.id_gurutahunan from jadwal where jadwal.hari = '".$this->session->ajaxhari."' and jadwal.jam_pelajaran = '".$this->session->ajaxjam."' )");
        $result = $this->db->get_where("guru_tahunan",$where)->result();
        $output ="<option value = '0'>-</option>";
        foreach($result as $a){
            $output .= "<option value = '".$a->id_gurutahunan."'>".$a->nama_depan." ".$a->nama_belakang." - ".$a->nama_matpel."</option>";
        }
        $this->db->join("guru_tahunan","guru_tahunan.id_gurutahunan = jadwal.id_gurutahunan","inner");
        $this->db->join("guru","guru.id_guru = guru_tahunan.id_guru","inner");
        $this->db->join("user","user.id_user = guru.id_user","inner");
        $this->db->join("penugasan_guru","penugasan_guru.id_gurutahunan = guru_tahunan.id_gurutahunan","inner");
        $this->db->group_by("guru_tahunan.id_gurutahunan");
        $this->db->join("matapelajaran","matapelajaran.id_matpel = guru.id_matpel","inner");
        $this->db->where("jadwal.hari",$this->session->ajaxhari);
        $this->db->where("jadwal.jam_pelajaran",$this->session->ajaxjam);
        $this->db->where("jadwal.id_kelas",$this->session->pilihkelas);
        $result = $this->db->get("jadwal")->result();
        foreach($result as $a){
            $output .= "<option value = '".$a->id_gurutahunan."' selected>".$a->nama_matpel." - ".$a->nama_depan." ".$a->nama_belakang."</option>";
        }
        return $output;
    }
    /*query cek 
    SELECT * FROM `penugasan_guru` inner join guru on guru.id_guru = penugasan_guru.id_gurutahunan inner join user on user.id_user = guru.id_user where id_kelas = 4 and penugasan_guru.id_penugasan not in (select jadwal.id_penugasan from jadwal where jadwal.hari ="senin" and jadwal.jam_pelajaran = 1)
    //senin & jam pelajaran dinamis
    */
}