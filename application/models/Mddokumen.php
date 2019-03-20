<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mddokumen extends CI_Model{
    public function select($where){
        $isi = "";
        $result = $this->db->get_where("dokumen",$where)->result();
        foreach($result as $a){
            $isi .= "<tr><td>".strtoupper($a->jenis)."</td><td><a href = '".base_url()."document/".$a->file_assignment."'>".$a->file_assignment."</a></td><td>".$a->tgl_submit_dokumen."</td></tr>";
        }
        return $isi;
    }
    public function insert($data){
        $this->db->insert("dokumen",$data);
    }
    public function update($data,$where){
        $this->db->update("dokumen",$data,$where);
    }
}