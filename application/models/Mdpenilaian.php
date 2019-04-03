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
    public function harianuntukakhir($where){
        $this->db->select("*,avg(nilai) as 'a',siswa_angkatan.id_siswa_angkatan");
        $this->db->join("siswa_angkatan","siswa_angkatan.id_siswa_angkatan = kelas_siswa.id_siswa_angkatan","inner");
        $this->db->join("siswa","siswa.id_siswa = siswa_angkatan.id_siswa","inner");
        $this->db->join("user","user.id_user = siswa.id_user","inner");
        $this->db->join("ulangan_harian","ulangan_harian.id_siswa = siswa_angkatan.id_siswa_angkatan","inner");
        $this->db->join("penilaian","penilaian.id_siswa_angkatan = siswa_angkatan.id_siswa_angkatan","left outer");
        //$this->db->join("")
        $this->db->where($where);
        $this->db->group_by("siswa_angkatan.id_siswa_angkatan");
        return $this->db->get("kelas_siswa");
    }
    public function delete($where){
        $this->db->delete("penilaian",$where);
    }
    public function laporannilai($id_matpel){
        //bugnya disini adalah kalua ada 2 guru yang mengajar mata pelajaran sama
        $this->db->join("aktivitas_mingguan","aktivitas_mingguan.id_mingguan = ulangan_harian.id_aktivitas","inner");
        $this->db->join("jadwal","jadwal.id_jadwal = aktivitas_mingguan.id_jadwal","inner");
        $this->db->join("guru_tahunan","guru_tahunan.id_gurutahunan = jadwal.id_gurutahunan");
        $this->db->join("guru","guru.id_guru = guru_tahunan.id_guru");
        $this->db->join("matapelajaran","matapelajaran.id_matpel = guru.id_matpel");
        $this->db->where("ulangan_harian.id_siswa",$this->session->id_siswa);
        $this->db->where("guru.id_matpel",$id_matpel);
        return $this->db->get("ulangan_harian");
        /*
        query = SELECT * FROM ulangan_harian inner join aktivitas_mingguan on aktivitas_mingguan.id_mingguan = ulangan_harian.id_aktivitas inner join jadwal on jadwal.id_jadwal = aktivitas_mingguan.id_jadwal inner join guru_tahunan on guru_tahunan.id_gurutahunan = jadwal.id_gurutahunan inner join guru on guru.id_guru = guru_tahunan.id_guru inner join matapelajaran on matapelajaran.id_matpel = guru.id_matpel where id_siswa = 5 and guru.id_matpel = 1
        */
    }
    public function kkm($id_matpel){
        $this->db->select("*,avg(nilai) as 'a'");
        $this->db->join("aktivitas_mingguan","aktivitas_mingguan.id_mingguan = ulangan_harian.id_aktivitas","inner");
        $this->db->join("jadwal","jadwal.id_jadwal = aktivitas_mingguan.id_jadwal","inner");
        $this->db->join("guru_tahunan","guru_tahunan.id_gurutahunan = jadwal.id_gurutahunan");
        $this->db->join("guru","guru.id_guru = guru_tahunan.id_guru");
        $this->db->join("matapelajaran","matapelajaran.id_matpel = guru.id_matpel");
        $this->db->where("guru.id_matpel",$id_matpel);
        $this->db->where("jadwal.id_gurutahunan in (select penugasan_guru.id_gurutahunan from penugasan_guru where jadwal.id_kelas = (select kelas_siswa.id_kelas from kelas_siswa where kelas_siswa.id_siswa_angkatan = ".$this->session->id_siswa."))",NULL,FALSE);
        $this->db->group_by("materi_mingguan");
        return $this->db->get("ulangan_harian");
        /*
        query = SELECT * FROM ulangan_harian inner join aktivitas_mingguan on aktivitas_mingguan.id_mingguan = ulangan_harian.id_aktivitas inner join jadwal on jadwal.id_jadwal = aktivitas_mingguan.id_jadwal inner join guru_tahunan on guru_tahunan.id_gurutahunan = jadwal.id_gurutahunan inner join guru on guru.id_guru = guru_tahunan.id_guru inner join matapelajaran on matapelajaran.id_matpel = guru.id_matpel where id_siswa = 5 and guru.id_matpel = 1
        */
    }
    public function rataratasemua(){
        $query = 'select *,AVG(ulangan_harian.nilai) as "a" FROM ulangan_harian inner join aktivitas_mingguan on aktivitas_mingguan.id_mingguan = ulangan_harian.id_aktivitas inner join jadwal on jadwal.id_jadwal = aktivitas_mingguan.id_jadwal inner join guru_tahunan on guru_tahunan.id_gurutahunan = jadwal.id_gurutahunan inner join guru on guru.id_guru = guru_tahunan.id_guru inner join matapelajaran on matapelajaran.id_matpel = guru.id_matpel where id_siswa = '.$this->session->id_siswa.' group by guru.id_matpel';
        return $this->db->query($query);
    }
    public function laporannilaiutama($id_matpel){
        $this->db->join("penugasan_guru","penugasan_guru.id_penugasan = penilaian.id_penugasan","inner");
        $this->db->join("guru_tahunan","guru_tahunan.id_gurutahunan = penugasan_guru.id_gurutahunan","inner");
        $this->db->join("guru","guru.id_guru = guru_tahunan.id_guru","inner");
        $this->db->join("matapelajaran","matapelajaran.id_matpel = guru.id_matpel","inner");
        $this->db->where("penilaian.id_siswa_angkatan",$this->session->id_siswa);
        $this->db->where("guru.id_matpel",$id_matpel);
        return $this->db->get("penilaian");
        /*
        query = select * from penilaian inner join penugasan_guru on penugasan_guru.id_penugasan = penilaian.id_penugasan inner join guru_tahunan on guru_tahunan.id_gurutahunan = penugasan_guru.id_gurutahunan inner join guru on guru.id_guru = guru_tahunan.id_guru inner join matapelajaran on matapelajaran.id_matpel = guru.id_matpel where penilaian.id_siswa_angkatan = 5 and guru.id_matpel = 1
        */
    }
}