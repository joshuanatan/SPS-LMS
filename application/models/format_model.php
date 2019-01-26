<?php
defined("BASEPATH") OR exit("No Direct Script");

class format_model extends CI_Model{
    public function select($where){
        return $this->db->get_where("",$where);
    }
    public function insert($data){
        $this->db->insert("",$data);
    }
    public function update($data,$where){
        $this->db->update("",$data,$where);
    }
}