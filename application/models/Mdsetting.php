<?php 
class Mdsetting extends CI_Model{
    public function select($where){
        $this->db->join("tahun_ajaran","tahun_ajaran.id_tahun_ajaran = setting.id_tahun_ajaran","inner");
        return $this->db->get_where("setting",$where);
    }
    public function insert($data){
        $this->db->insert("setting",$data);
    }
    public function update($data,$where){
        $this->db->update("setting",$data,$where);
    }
    public function delete($where){
        $this->db->delete("setting",$where);
    }
}