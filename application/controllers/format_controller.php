<?php
defined("BASEPATH") OR exit("No Direct Script");

class format_model extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model(array(""));
    }
    public function index(){
        if($this->session->role == "admin"){
            $this->load->view("");
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("message successfully sent")';
            echo '</script>';
            redirect("user/signin");
        }
    }
    public function insert(){
        
        if($this->session->role == "admin"){
            $this->load->view("");
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("message successfully sent")';
            echo '</script>';
            redirect("user/signin");
        }
    }
    public function submit(){
        
        if($this->session->role == "admin"){
            redirect("");        
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("message successfully sent")';
            echo '</script>';
            redirect("user/signin");
        }
    }
    public function edit($i){
        if($this->session->role == "admin"){
            $where = array(
                "id" => $i
            );
            $data = array(
            
            );
            $this->load->view("",$data);
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("message successfully sent")';
            echo '</script>';
            redirect("user/signin");
        }
    }
    public function update(){
        
        if($this->session->role == "admin"){
            redirect("");        
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("message successfully sent")';
            echo '</script>';
            redirect("user/signin");
        }
    }
    public function delete($i){
        if($this->session->role == "admin"){
            $data = array(
                "status" => 1
            );
            redirect("");
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("message successfully sent")';
            echo '</script>';
            redirect("user/signin");
        }
    }
}