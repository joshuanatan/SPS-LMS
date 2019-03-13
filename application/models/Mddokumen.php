<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mddokumen extends CI_Model{
    public function select($where){
        return $this->db->get_where("dokumen",$where);
    }
    public function insert($data){
        $this->db->insert("dokumen",$data);
    }
    public function update($data,$where){
        $this->db->update("dokumen",$data,$where);
    }
}