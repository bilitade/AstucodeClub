<?php
include_once('../club/Model/Database.php');
 class Admin extends Database{

    private $db;
 public function __construct()
 {
    $this->db=$this->Connect();
    
 }

 }




?>