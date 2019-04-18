<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdorangtua extends CI_Model{
    public function select2($where){
        return $this->db->query("select * from orangtua inner join siswa on siswa.id_orangtua = orangtua.id_orangtua inner join user on user.id_user = siswa.id_user where siswa.id_siswa in (select siswa_angkatan.id_siswa from siswa_angkatan where siswa_angkatan.id_siswa_angkatan in ( select kelas_siswa.id_siswa_angkatan from kelas_siswa) and siswa_angkatan.id_tahun_ajaran in (select setting.id_tahun_ajaran from setting where setting.status))");
        /*
        query = select * from orangtua inner join siswa on siswa.id_orangtua = orangtua.id_orangtua inner join user on user.id_user = siswa.id_user where siswa.id_siswa in (select siswa_angkatan.id_siswa from siswa_angkatan where siswa_angkatan.id_siswa_angkatan in ( select kelas_siswa.id_siswa_angkatan from kelas_siswa where kelas_siswa.id_kelas = 23) and siswa_angkatan.id_tahun_ajaran in (select setting.id_tahun_ajaran from setting where setting.status))

        select semua data orang tua yang udh di assign siswanya trus ke user untuk liat detailnya yang dimana siswanya itu ada di sebuah angkatan dan masuk suatu kelas yang kelasnya id nya 23 serta yang taun ajaran lagi aktif. bisa aja dia kelas 23 di taun sebelumnya dan 32 di taun ini jadi kan ga kepilih gitu
        */
    }
    public function selectortulast($where){
        
        return $this->db->get_where("orangtua",$where);
    }
    public function login($where){
        return $this->db->get_where("orangtua",$where);
    }
    public function select($where){
        return $this->db->query("select * from orangtua inner join siswa on siswa.id_orangtua = orangtua.id_orangtua inner join user on user.id_user = siswa.id_user where siswa.id_siswa in (select siswa_angkatan.id_siswa from siswa_angkatan where siswa_angkatan.id_siswa_angkatan in ( select kelas_siswa.id_siswa_angkatan from kelas_siswa where kelas_siswa.id_kelas = ".$this->session->pilihkelas.") and siswa_angkatan.id_tahun_ajaran = ".$this->session->tahunajaran.")");
        /*
        query = select * from orangtua inner join siswa on siswa.id_orangtua = orangtua.id_orangtua inner join user on user.id_user = siswa.id_user where siswa.id_siswa in (select siswa_angkatan.id_siswa from siswa_angkatan where siswa_angkatan.id_siswa_angkatan in ( select kelas_siswa.id_siswa_angkatan from kelas_siswa where kelas_siswa.id_kelas = 23) and siswa_angkatan.id_tahun_ajaran in (select setting.id_tahun_ajaran from setting where setting.status))

        select semua data orang tua yang udh di assign siswanya trus ke user untuk liat detailnya yang dimana siswanya itu ada di sebuah angkatan dan masuk suatu kelas yang kelasnya id nya 23 serta yang taun ajaran lagi aktif. bisa aja dia kelas 23 di taun sebelumnya dan 32 di taun ini jadi kan ga kepilih gitu
        */
    }
    public function insert($data){
        $this->db->insert("orangtua",$data);
    }
    public function update($data,$where){
        $this->db->update("orangtua",$data,$where);
    }
}