<?php
class Mdsistemprofile extends CI_Model{
    public function insert($data){
        $this->db->insert("sistemprofile",$data);
    }
    public function select($where){
        return $this->db->get_where("sistemprofile",$where);
    }
    public function update($data,$where){
        $this->db->update("sistemprofile",$data,$where);
    }
}
?>