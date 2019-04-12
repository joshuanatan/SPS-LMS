<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdtagihan extends CI_Model{
    
     public function selectjoin($where)
    {
        $this->db->select('tagihan.id_tagihan,sekolah.id_sekolah,sekolah.nama_sekolah,sekolah.email_sekolah,tahun_ajaran.id_tahun_ajaran,tahun_ajaran.tahun_awal,tahun_ajaran.tahun_akhir,tagihan.jumlah_tagihan,tagihan.status_tagihan,tagihan.tgl_submit_tagihan')->from('tagihan')->join('sekolah', 'tagihan.id_sekolah = sekolah.id_sekolah','inner')->join('tahun_ajaran', 'tagihan.id_tahun_ajaran = tahun_ajaran.id_tahun_ajaran','inner');
        $this->db->order_by("id_tagihan", "asc");
        $this->db->where($where); 
        $query=$this->db->get();
        return $query;
            
        }
    
    public function select($where){
        return $this->db->get_where("tagihan",$where);
    }
    public function insert($data){
        $this->db->insert("tagihan",$data);
    }
    public function update($data,$where){
        $this->db->update("tagihan",$data,$where);
    }
}