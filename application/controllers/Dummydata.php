<?php
defined("BASEPATH") OR exit("No Direct Script");

class Dummydata extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("Mdmenu");
    }
    public function insertmenu(){
        $data = array(
            "nama" => strtoupper("lagu"),
            "icon" => "lagu",
            "id_admin" => "joshuanatan.jn@gmail.com",
            "link" => "pembicara",
            "tgl_submit" => date('y-m-d'),
            "id_parent" => 2,
            "status" => 0
        );
        $this->Mdmenu->insert($data);
    }
}
?>