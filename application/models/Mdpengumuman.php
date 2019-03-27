<?php
class Mdpengumuman extends CI_Model{
    public function insert($data){
        $this->db->insert("pengumuman",$data);
    }
    public function select($where){
        return $this->db->query("select * from pengumuman where pengumuman.id_user = '".$this->session->id_user."' and  dateline > '".date("Y-m-d")."' and status_pengumuman = 0");
    }
    public function update($data,$where){
        $this->db->update("pengumuman",$data,$where);
    }
}
?>