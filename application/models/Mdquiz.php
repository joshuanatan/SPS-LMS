<?php
defined("BASEPATH") OR exit("No Direct Script");

class Mdquiz extends CI_Model{
    public function select($where){
        $this->db->join("soal","soal.id_quiz = quiz.id_quiz","inner");
        return $this->db->get_where("quiz",$where);
        
    }
    public function insert($data){
        $this->db->insert("quiz",$data);
        $result = $this->updatelast();
        return $result;
    }
    public function update($data,$where){
        $this->db->update("quiz",$data,$where);
    }
    public function updatelast(){
        $this->db->select("id_quiz");
        $this->db->order_by("id_quiz","DESC");
        $this->db->limit(1);
        $result = $this->db->get("quiz")->result();
        foreach($result as $a){
            return $a->id_quiz;
        }
    }
    public function cekpengambilanquiz($where){
        $this->db->where($where);
        $this->db->join("soal","jawaban_quiz.id_soal = soal.id_soal","inner");
        $this->db->join("quiz","quiz.id_quiz = soal.id_quiz","inner");
        return $this->db->get("jawaban_quiz");
    }
    public function masuksoal($data){
        $this->db->insert("soal",$data);
    }
    public function masukjawab($data){
        $this->db->insert("jawaban_quiz",$data);
    }
}