<?php
class Mdulanganharian extends CI_Model{
    public function select($where){
        return $this->db->get_where("ulangan_harian",$where);
    }
    public function insert($data){
        $this->db->insert("ulangan_harian",$data);
    }
    public function average(){
        return $this->db->query("select avg(ulangan_harian.nilai) as 'a' from ulangan_harian inner join aktivitas_mingguan on aktivitas_mingguan.id_mingguan = ulangan_harian.id_aktivitas where ulangan_harian.id_siswa = ".$this->session->id_siswa);
    }
    public function averageTiapAnak(){
        return $this->db->query("select *,avg(ulangan_harian.nilai) as 'a' from ulangan_harian inner join aktivitas_mingguan on aktivitas_mingguan.id_mingguan = ulangan_harian.id_aktivitas inner join jadwal on jadwal.id_jadwal = aktivitas_mingguan.id_jadwal where jadwal.id_kelas = ".$this->session->idkelas." GROUP by ulangan_harian.id_siswa");

    }
}