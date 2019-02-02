<?php
defined("BASEPATH") OR exit("No Direct Script");

class Database extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->dbforge();
        //$this->load->model(array("dbmodel"));
    }
    public function addmenudb(){
        $field = array(
            "id" => array(
                "type" => "tinyint",
                "first" => true,
                "auto_increment" => true,
                "unsigned" => true //supaya integernya gabisa ikut mines. ex: jarak int -10 <-> 10, maka diubah jadi 0 <-> 20
            ),  
            "nama" => array(
                "type" => "varchar",
                "constraint" => 100,
            ),
            "icon" => array(
                "type" => "varchar",
                "constraint" => 100,
            ),
            "link" => array(
                "type" => "varchar",
                "constraint" => 100,
            ),
            "id_admin" => array(
                "type" => "varchar",
                "constraint" => 250,
            ),
            "tgl_submit" => array(
                "type" => "date",
            ),
            "status" => array(
                "type" => "tinyint",
            ),
            "id_parent" => array(
                "type" => "tinyint",
            ),
            
        );
        $this->dbforge->add_field($field);
        $this->dbforge->add_key('id',TRUE);
        //$this->dbforge->add_key('field_lain',TRUE); //tambahin kalau mau bkin composite key
        
        $this->dbforge->create_table('menu', TRUE);
    }
}
?>