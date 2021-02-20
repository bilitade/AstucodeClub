<?php
include_once("config.php");

 class Database {

    private $conn;

  function Connect()

  {

     $this->conn= new mysqli(HOST,USER,PWD,DB);

     if($this->conn->connect_error){
   
         echo "error occured";



     }
     

     
     return $this->conn;

     

  
  
  }

  function fetchEvent(){
    $sql="SELECT * FROM events order By begin_at Desc  LIMIT 3";
    $result=$this->conn->query( $sql);
    while($row = mysqli_fetch_assoc($result)){
      $array[] = $row;
     }
 
  return $array;


   }
    


   function fetchannounce(){
    $sql="SELECT * FROM announcement order BY posted  DESC  LIMIT 1 ";
    $result=$this->conn->query( $sql);
    while($row = mysqli_fetch_assoc($result)){
      $array[] = $row;
     }
 
  return $array;


   }
   

 
   public function logout(){
   
    header("location:".URL."index.php");
   
    session_destroy();
    exit();


}


 }


?>