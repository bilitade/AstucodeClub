<?php
include_once('Database.php');

class member extends Database{

   private $conn;
public function __construct()
{
   $this->conn=$this->Connect();
}





public function  CreateAcccount($data){

   $firstName= $data["firstName"];
   $lastName=$data["lastName"];
   $Email=$data["email"];
   $gender=$data["gender"];
   $age=$data["age"];
   $pwd=$data["pwd"];
   $cpwd=$data["cpwd"];
   $dept=$data["dept"];
   $Academic=$data["academic"];
   print_r($_REQUEST);

   if ($cpwd != $pwd) {
  
      header('location: '.URL.'/view/member/signup.php?info=notmatch');
    } else {
  
          $sql="SELECT *FROM  members where email='$Email'";
          $result=$this->conn->query($sql);

          if($result->num_rows>0){

            header("location: ".URL."/view/member/signup.php?info=emailtaken");


          }

          else{
            $sql2 = "INSERT INTO members (firstName, lastName,gender,age,pwd,dept,academicYear,email) values ('$firstName','$lastName','$gender','$age','$pwd','$dept','$Academic','$Email')";
              if( $this->conn->query($sql2)==TRUE){
               header("location: ".URL."/view/member/signup.php?info=success");
              }
              else{
               echo "Error: " . $sql . "<br>" .$this->conn->error;

              }


              



               
            
           



            

          }
        



       
  
     
      }









}}










?>