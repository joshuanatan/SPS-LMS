<?php
class Mdpengumuman extends CI_Model{
    public function insert($data){
        $this->db->insert("pengumuman",$data);
    }
    public function select($where){
        return $this->db->query("select * from pengumuman where pengumuman.id_user = '".$this->session->id_user."' and  dateline > '".date("Y-m-d")."' and status_pengumuman = 0");
    }
    public function update($data,$where){
        $this->db->update("pengumuman",$data,$where);
    }
    public function pengumumansiswa(){
        return $this->db->query("select * from pengumuman inner join user on user.id_user = pengumuman.id_user inner join guru on guru.id_user = user.id_user inner join guru_tahunan on guru_tahunan.id_guru = guru.id_guru inner join jadwal on jadwal.id_gurutahunan = guru_tahunan.id_gurutahunan where jadwal.id_jadwal in (select id_jadwal from jadwal where id_kelas in (select kelas_siswa.id_kelas from kelas_siswa inner join siswa_angkatan on siswa_angkatan.id_siswa_angkatan = kelas_siswa.id_siswa_angkatan inner join siswa on siswa.id_siswa = siswa_angkatan.id_siswa where siswa.id_user = ".$this->session->id_user.")) and pengumuman.dateline > '".date("Y-m-d")."' and pengumuman.status_pengumuman = 0 group by id_pengumuman");
        /*
        query = select * from pengumuman inner join user on user.id_user = pengumuman.id_user inner join guru on guru.id_user = user.id_user inner join guru_tahunan on guru_tahunan.id_guru = guru.id_guru inner join jadwal on jadwal.id_gurutahunan = guru_tahunan.id_gurutahunan where jadwal.id_jadwal in (select id_jadwal from jadwal where id_kelas in (select kelas_siswa.id_kelas from kelas_siswa inner join siswa_angkatan on siswa_angkatan.id_siswa_angkatan = kelas_siswa.id_siswa_angkatan inner join siswa on siswa.id_siswa = siswa_angkatan.id_siswa where siswa.id_user = 47)) group by id_pengumuman and pengumuman.dateline > "2019/03/29"
        */
    }
}
?>