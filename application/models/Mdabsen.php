 <?php
class Mdabsen extends CI_Model{
    public function insert($data){
        $this->db->insert("absen",$data);
    }
    public function remove($where){
        $this->db->delete("absen",$where);
    }
    public function select($where){
        $this->db->where($where);
        return $this->db->get("absen");
    }
    public function absensiswabulanan($matapelajaran, $bulan){
        return $this->db->query("select * from aktivitas_mingguan inner join jadwal on jadwal.id_jadwal = aktivitas_mingguan.id_jadwal inner join guru_tahunan on jadwal.id_gurutahunan = guru_tahunan.id_gurutahunan inner join guru on guru.id_guru = guru_tahunan.id_guru inner join matapelajaran on matapelajaran.id_matpel = guru.id_matpel and guru.id_matpel = 1 left outer join absen on absen.id_mingguan = aktivitas_mingguan.id_mingguan and absen.id_siswaangkatan = ".$this->session->id_siswa." where month(aktivitas_mingguan.tgl_kelas) = ".$bulan." and matapelajaran.id_matpel = ".$matapelajaran." and jadwal.id_kelas = ".$this->session->id_kelas);
        /*
        query = select * from aktivitas_mingguan inner join jadwal on jadwal.id_jadwal = aktivitas_mingguan.id_jadwal inner join guru_tahunan on jadwal.id_gurutahunan = guru_tahunan.id_gurutahunan inner join guru on guru.id_guru = guru_tahunan.id_guru inner join matapelajaran on matapelajaran.id_matpel = guru.id_matpel and guru.id_matpel = 1 left outer join absen on absen.id_mingguan = aktivitas_mingguan.id_mingguan and absen.id_siswaangkatan = 5 where month(aktivitas_mingguan.tgl_kelas) = 3 and matapelajaran.id_matpel = 1 and jadwal.id_kelas = 13
        */
    }
    public function absensiswabulananuntukortu($matapelajaran, $bulan){
        return $this->db->query("select * from aktivitas_mingguan inner join jadwal on jadwal.id_jadwal = aktivitas_mingguan.id_jadwal inner join guru_tahunan on jadwal.id_gurutahunan = guru_tahunan.id_gurutahunan inner join guru on guru.id_guru = guru_tahunan.id_guru inner join matapelajaran on matapelajaran.id_matpel = guru.id_matpel and guru.id_matpel = 1 left outer join absen on absen.id_mingguan = aktivitas_mingguan.id_mingguan and absen.id_siswaangkatan = ".$this->session->id_siswa." where month(aktivitas_mingguan.tgl_kelas) = ".$bulan." and matapelajaran.id_matpel = ".$matapelajaran." and jadwal.id_kelas in (select kelas_siswa.id_kelas from kelas_siswa where kelas_siswa.id_siswa_angkatan = ".$this->session->id_siswa.")");
        /*
        select * from aktivitas_mingguan inner join jadwal on jadwal.id_jadwal = aktivitas_mingguan.id_jadwal inner join guru_tahunan on jadwal.id_gurutahunan = guru_tahunan.id_gurutahunan inner join guru on guru.id_guru = guru_tahunan.id_guru inner join matapelajaran on matapelajaran.id_matpel = guru.id_matpel and guru.id_matpel = 1 left outer join absen on absen.id_mingguan = aktivitas_mingguan.id_mingguan and absen.id_siswaangkatan = 5 where month(aktivitas_mingguan.tgl_kelas) = 3 and matapelajaran.id_matpel = 1 and jadwal.id_kelas in (select kelas_siswa.id_kelas from kelas_siswa where kelas_siswa.id_siswa_angkatan = 5)
        */
    }
}