<?php
include_once('Database.php');
 class Admin extends Database{

 private $conn;
 public function __construct()
 {
    $this->conn=$this->Connect();
    
 }

      public function adminLogin($data){
         $email = $data['email'];
         $password = $data['password'];
      
         $sql = "SELECT * FROM  admin WHERE  email='$email' AND  password ='$password' ";
         $result = $this->conn->query($sql);
         if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
            $_SESSION['adminUser'] = $row['firstName'];
          
        
            header("location: ".URL."view/admin/AdminDash.php?");

               }
            }

         else{

          header("location: ".URL."index.php?info=notexist");

        

         }


      }




      function fetchAllMember(){
         $sql="SELECT * FROM members order By memid ASC";
         $result=$this->conn->query( $sql);
         while($row = mysqli_fetch_assoc($result)){
           $array[] = $row;
          }
      
       return $array;
     
     
        }
        
      function fetchAllEvent(){
         $sql="SELECT * FROM events";
         $result=$this->conn->query( $sql);
         while($row = mysqli_fetch_assoc($result)){
           $array[] = $row;
          }
      
       return $array;
     
     
        }
        function fetchSingleEvent($id){
         $sql="SELECT * FROM events where id=$id";
         $result=$this->conn->query( $sql);
         while($row = mysqli_fetch_assoc($result)){
           $array[] = $row;
          }
      
       return $array;
     
     
        }

    function approve($id){
   

      $sql = "UPDATE members SET accepted=1 , status='accepted' WHERE memid=$id";
        
        
        if($this->conn->query($sql)){

         header("location: ".URL."/view/admin/memberList.php?info=success");
        }
        else{
         echo "Error updating record: " .$this->conn->error;
        }
    }


    function reject($id){
   

      $sql = "DELETE FROM  members  WHERE memid=$id";
        
        
        if($this->conn->query($sql)){

         header("location: ".URL."/view/admin/memberList.php");
        }
        else{
         echo "Error updating record: " .$this->conn->error;
        }
    }
   function updateEvent($data){
       $id=$data['update_event_id'];
       $title=$data['update_title'];
       $desc=$data['update_desc'];
       $beign=$data['update_begin'];
       $end=$data['update_end'];
      $sql = "UPDATE events SET   title='$title' , descriptions='$desc' , begin_at='$beign', end_at='$end' WHERE id=$id";
        
        
      if($this->conn->query($sql)){

       header("location: ".URL."/view/admin/events.php?info=success");
      }
      else{
       echo "Error updating record: " .$this->conn->error;
      }


   }




   function insertEvent($data){
     
      $title=$data['title'];
      $desc=$data['description'];
      $begin=$data['begin_at'];
      $end=$data['end_at'];
     $sql = "INSERT INTO events (title, descriptions,begin_at,end_at) values('$title','$desc','$begin','$end')";
       
       
     if($this->conn->query($sql)){

      header("location: ".URL."/view/admin/events.php?info=success");
     }
     else{
      echo "Error updating record: " .$this->conn->error;
     }


  }


 function  deleteEvent($id){

   $sql = "DELETE FROM  events  WHERE id=$id";
        
        
   if($this->conn->query($sql)){

    header("location: ".URL."/view/admin/events.php");
   }
   else{
    echo "Error updating record: " .$this->conn->error;
   }


 }



   function insertAnnounce($data){
     
      $title=$data['title'];
      $desc=$data['content'];
   
     $sql = "INSERT INTO announcement (announce_title, announce_content) values('$title','$desc')";
       
       
     if($this->conn->query($sql)){

      header("location: ".URL."/view/admin/announcement.php?info=success");
     }
     else{
      echo "Error updating record: " .$this->conn->error;
     }


  }
  
  function fetchAllAnnounce(){
   $sql="SELECT * FROM announcement";
   $result=$this->conn->query( $sql);
   while($row = mysqli_fetch_assoc($result)){
     $array[] = $row;
    }

 return $array;


  }
  function deleteAnnounce($id){

   $sql = "DELETE FROM  announcement WHERE id=$id";
        
        
   if($this->conn->query($sql)){

    header("location: ".URL."/view/admin/announcement.php");
   }
   else{
    echo "Error updating record: " .$this->conn->error;
   }

  }

   function updateAnnounce($data){

      $id=$data['update_id'];
      $title=$data['update_title'];
      $content=$data['update_content'];
      
     $sql = "UPDATE  announcement SET   announce_title='$title' , announce_content='$content'  WHERE id=$id";
       
       
     if($this->conn->query($sql)){

      header("location: ".URL."/view/admin/announcement.php?info=success");
     }
     else{
      echo "Error updating record: " .$this->conn->error;
     }


   }
   function fetchSingleAnnounce($id){
      $sql="SELECT * FROM announcement where id=$id";
      $result=$this->conn->query( $sql);
      while($row = mysqli_fetch_assoc($result)){
        $array[] = $row;
       }
   
    return $array;
  
  
     }


}








