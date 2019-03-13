<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdassignmentsubmission extends CI_Model{
    public function select($where){
        return $this->db->get_where("assignment_submission",$where);
    }
    public function insert($data){
        $this->db->insert("assignment_submission",$data);
    }
    public function update($data,$where){
        $this->db->update("assignment_submission",$data,$where);
    }
}