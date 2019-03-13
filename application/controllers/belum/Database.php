<?php
defined("BASEPATH") OR exit("No Direct Script");

class Database extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->dbforge();
        //$this->load->model(array("dbmodel"));
    }
    public function dbmenu(){
        $field = array(
            "id" => array(
                "type" => "tinyint",
                "first" => true,
                "auto_increment" => true,
                "unsigned" => true //supaya integernya gabisa ikut mines. ex: jarak int -10 <-> 10, maka diubah jadi 0 <-> 20
            ),  
            "nama" => array(
                "type" => "varchar",
                "constraint" => 100,
            ),
            "icon" => array(
                "type" => "varchar",
                "constraint" => 100,
            ),
            "link" => array(
                "type" => "varchar",
                "constraint" => 100,
            ),
            "id_admin" => array(
                "type" => "varchar",
                "constraint" => 250,
            ),
            "tgl_submit" => array(
                "type" => "date",
            ),
            "status" => array(
                "type" => "tinyint",
            ),
            "id_parent" => array(
                "type" => "tinyint",
            ),
            
        );
        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id',TRUE);
        //$this->dbforge->add_key('field_lain',TRUE); //tambahin kalau mau bkin composite key
        
        $this->dbforge->create_table('menu', TRUE);
    }

    public function dbtahunajaran(){
        $field = array(
            "id_tahun_ajaran" => array(
                "type" => "int",
                "auto_increment" => "true",
            ),
            "tahun_awal" => array(
                "type" => "int",
            ),
            "tahun_akhir" => array(
                "type" => "int",
            ),
            "status_tahun_ajaran" => array(
                "type" => "varchar",
                "constraint" => 250,
            ),
            "tgl_submit_tahunajaran" => array(
                "type" => "date",
            )
        );
        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id_tahun_ajaran',TRUE);
        $this->dbforge->create_table('tahun_ajaran',TRUE);
    }
    public function dbjenis(){
        $field = array(
            "id_jenis_dokumen" => array(
                "type" => "int",
                "auto_increment" => "true",
            ),
            "nama_jenis_dokumen" => array(
                "type" => "int",
            ),
            "status_jenis_dokumen" => array(
                "type" => "varchar",
                "constraint" => 250,
            ),
            "tgl_submit_jenis_dokumen" => array(
                "type" => "date",
            ),
            "peruntukan" => array(
                "type" => "varchar",
                "constraint" => "200"
            )
        );
        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id_jenis_dokumen',TRUE);
        $this->dbforge->create_table('jenis',TRUE);
    }
    public function wakasek(){
        $field = array(
            "id_wakasek" => array(
                "type" => "int",
                "auto_increment" => "true",
            ),
            "id_guru" => array(
                "type" => "int",
            ),
            "jenis_wakasek" => array(
                "type" => "varchar",
                "constraint" => 250,
            ),
            "status_wakasek" => array(
                "type" => "tinyint",
            ),
        );
        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id_wakasek',TRUE);
        $this->dbforge->create_table('wakasek',TRUE);
    }
    public function dbhakakses(){
        $field = array(
            "id_hak_akses" => array(
                "type" => "int",
                "auto_increment" => "true",
            ),
            "id_role" => array(
                "type" => "int",
            ),
            "id_menu" => array(
                "type" => "int",
            ),
            "status_hak_akses" => array(
                "type" => "tinyint",
            ),
            "tgl_submit_hak_akses" => array(
                "type" => "date",
            ),
        );
        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id_hak_akses',TRUE);
        $this->dbforge->create_table('hak_akses',TRUE);
    }
    public function dborangtua(){
        $field = array(
            "id_orangtua" => array(
                "type" => "int",
                "auto_increment" => "true",
            ),
            "id_user" => array(
                "type" => "int",
            ),
            "pekerjaan" => array(
                "type" => "varchar",
                "constraint" => "250"
            ),
            "status_orangtua" => array(
                "type" => "tinyint",
            ),
            "tgl_submit_orangtua" => array(
                "type" => "date",
            ),
        );
        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id_orangtua',TRUE);
        $this->dbforge->create_table('orangtua',TRUE);
    }
    public function dbmatpel(){
        $field = array(
            "id_matpel" => array(
                "type" => "int",
                "auto_increment" => "true",
            ),
            "nama_matpel" => array(
                "type" => "int",
            ),
            "status_matpel" => array(
                "type" => "tinyint",
            ),
            "tgl_submit_matpel" => array(
                "type" => "date",
            ),
        );
        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id_matpel',TRUE);
        $this->dbforge->create_table('mata_pelajaran',TRUE);
    }
    public function dbnilaiquiz(){
        $field = array(
            "id_nilai_quiz" => array(
                "type" => "int",
                "auto_increment" => "true",
            ),
            "id_siswa" => array(
                "type" => "int",
            ),
            "id_quiz" => array(
                "type" => "int",
            ),
            "nilai_quiz" => array(
                "type" => "text"
            ),
            "status_nilai" => array(
                "type" => "tinyint",
            ),
            "tgl_submit_nilai" => array(
                "type" => "date",
            ),
        );
        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id_nilai_quiz',TRUE);
        $this->dbforge->create_table('nilai_quiz',TRUE);
    }
    public function dbmatapelajarann(){
        $field = array(
            "id_pengumuman" => array(
                "type" => "int",
                "auto_increment" => "true",
            ),
            "id_jenis_dokumen" => array(
                "type" => "int",
            ),
            "id_user" => array(
                "type" => "int",
            ),
            "konten" => array(
                "type" => "text"
            ),
            "status_pengumuman" => array(
                "type" => "tinyint",
            ),
            "tgl_submit_pengumuman" => array(
                "type" => "date",
            ),
        );
        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id_pengumuman',TRUE);
        $this->dbforge->create_table('pengumuman',TRUE);
    }
    public function dbjawaban(){
        $field = array(
            "id_jawaban" => array(
                "type" => "int",
                "auto_increment" => "true",
            ),
            "id_soal" => array(
                "type" => "int",
            ),
            "id_user" => array(
                "type" => "int",
            ),
            "jawaban_quiz" => array(
                "type" => "varchar",
                "constraint" => 1
            ),
            "status_jawaban" => array(
                "type" => "tinyint",
            ),
            "tgl_submit_jawaban" => array(
                "type" => "date",
            ),
        );
        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id_jawaban',TRUE);
        $this->dbforge->create_table('jawaban_quiz',TRUE);
    }
    public function dbsiswaangkatan(){
        $field = array(
            "id_siswa_angkatan" => array(
                "type" => "int",
                "auto_increment" => "true",
            ),
            "id_tahun_ajaran" => array(
                "type" => "int",
            ),
            "id_siswa" => array(
                "type" => "int",
            ),
            "kelas" => array(
                "type" => "int",
            ),
            "status_siswa_angkatan" => array(
                "type" => "tinyint",
            ),
            "tgl_submit_siswa_angkatan" => array(
                "type" => "date",
            ),
        );
        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id_siswa_angkatan',TRUE);
        $this->dbforge->create_table('siswa_angkatan',TRUE);
    }
    public function dbuser(){
        $field = array(
            "id_user" => array(
                "type" => "int",
                "auto_increment" => "true",
            ),
            "nama_depan" => array(
                "type" => "varchar",
                "constraint" => "100"
            ),
            "nama_belakang" => array(
                "type" => "varchar",
                "constraint" => "100"
            ),
            "tanggal_lahir" => array(
                "type" => "date",
            ),
            "nomor_telpon" => array(
                "type" => "varchar",
                "constraint" => "15"
            ),
            "email" => array(
                "type" => "varchar",
                "constraint" => "100"
            ),
            "alamat" => array(
                "type" => "text",
            ),
            "password" => array(
                "type" => "varchar",
                "constraint" => "100"
            ),
            "tgl_submit" => array(
                "type" => "date",
            ),
            "id_admin" => array(
                "type" => "int",
            ),
            "status" => array(
                "type" => "tinyint",
            ),
            "id_role" => array(
                "type" => "tinyint",
            ),
        );
        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id_user',TRUE);
        $this->dbforge->create_table('user',TRUE);
    }
    
}
?>