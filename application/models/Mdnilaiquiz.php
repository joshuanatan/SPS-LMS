<?php
class Mdnilaiquiz extends CI_Model{
    public function insert($data){
        $this->db->insert("nilai_quiz",$data);
    }
}