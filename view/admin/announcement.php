<?php

session_start();
if ($_SESSION["adminUser"]==""||$_SESSION["adminUser"]==null ){

  header("location: ".URL."index.php?");

}

require('../../Model/admin.php');
$adminobj= new Admin();
$events=$adminobj->fetchAllEvent();
$announces=$adminobj->fetchAllAnnounce();
if(isset($_REQUEST['edit_announce'])){

$singleAnnounce=$adminobj->fetchSingleAnnounce($_REQUEST['announce_id']);
}
if(isset($_REQUEST['update_announce'])){


$adminobj->updateAnnounce($_REQUEST);
//print_r($_REQUEST);

}
if(isset($_REQUEST['add_announce'])){
$adminobj->insertAnnounce($_REQUEST);

}
if(isset($_REQUEST['delete_announce'])){
  $adminobj->deleteAnnounce($_REQUEST['delete_id']);
  
  }


  
  if (isset($_REQUEST["logout"]))
       $adminobj->logout();
  
  ?> 




<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>ASTU-Code Club |Annoucements</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Akronim"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Alef"
    />
    <link rel = "icon" href =  "../../icon.png" 
        type = "image/x-icon"> 
    <link rel="stylesheet" href="../../assets/fonts/font-awesome.min.css" />
    <link rel="stylesheet" href="../../assets/fonts/ionicons.min.css" />
    <link rel="stylesheet" href="../..assets/css/Footer-Dark.css" />
    <link rel="stylesheet" href="../..assets/css/styles.css" />
  </head>

  <body>
    <nav class="navbar navbar-light navbar-expand-md shadow">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">ASTU-Code Club</a
        ><a class="navbar-brand" href="AdminDash.php" style="font-size: 1.3rem"
          ><strong><em>&nbsp;| Admin DashBoard</em></strong></a
        ><button
          data-toggle="collapse"
          class="navbar-toggler"
          data-target="#navcol-1"
        >
          <span class="sr-only">Toggle navigation</span
          ><span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item" style="margin: 7px">
              <strong><?php echo $_SESSION["adminUser"];?></strong>
            </li>
            <li class="nav-item">
            <form  method="GET">
            <button class="btn btn-danger" name="logout"  type="submit">Logout</button>
            </form>
             
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid" style="margin-top: 3%">
    <h1
                  class="text-center"
                  style="font-size: 22px; padding-top: 21px"
                >
                  Announcements
                </h1>
        <div class="row">
            <div class="col col-12 col-md-8" style="padding: 0px">
              <div
                class="table-responsive table-bordered border rounded-0"
                style="
                  padding: 0px;
                  margin-top: 4%;
                  padding-bottom: 0;
                  margin-left: 5px;
                "
              >
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Event Title</th>
                      <th>Event Content</th>
                      <th>Posted on</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($announces as $announce): ?>
                    <tr>
                      <td><?php echo $announce['id'] ?></td>
                      <td><?php echo $announce['announce_title'] ?></td>
                      <td><?php echo $announce['announce_content'] ?></td>
                      <td><?php echo $announce['posted'] ?></td>
                      <td>
                      <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
                          <input
                            class="form-control"
                            type="number"
                            hidden=""
                            name="announce_id"
                              value="<?php echo $announce['id'] ?>"
                          /><button
                            class="btn btn-warning"
                            type="submit"
                            name="edit_announce"
                          
                          >
                            <i class="fa fa-edit"></i>Edit
                          </button>
                        </form>
                      </td>
                      <td>
                        <form method="GET">
                          <input
                            class="form-control"
                            type="number"
                            hidden=""
                            name="delete_id"
                            value="<?php echo $announce['id'] ?>"
                          /><button
                            class="btn btn-danger"
                            type="submit"
                            name="delete_announce"
                          >
                            <i class="fa fa-remove"></i>Delete
                          </button>
                        </form>
                      </td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col col-12 col-md-4">
              <div class="card border-primary" style="margin-top: 15px">
                <div class="card-body border rounded">
                  <h1 class="text-center" style="font-size: 1.3rem">
                  Announcement add form
                  </h1>
                  <form  action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
                    <div class="form-group">
                      <label>Announcement Title</label
                      ><input class="form-control" name="title" type="text" />
                    </div>
                    <div class="form-group">
                      <label>Announcement Content</label
                      ><textarea class="form-control" name="content"></textarea>
                    </div>
                   
                  
                    <button class="btn btn-primary" name="add_announce" type="submit">
                      Add Announcement
                    </button>
                  </form>
                </div>
              </div>
              <div class="row">
                <div class="col">
                <?php if(isset($singleAnnounce)) :?>
                  <div class="card border-warning" style="margin-top: 15px; margin-bottom:5vh ">
                    <div class="card-body">
                      <h1 class="text-center" style="font-size: 1.3rem">
                        Event update form
                      </h1>
                      <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
                         
                            <?php foreach($singleAnnounce as $single):?>
                        <div class="form-group">
                          <label>Event Title</label
                          ><input class="form-control" value="<?php echo $single['announce_title']?>" name="update_title" type="text" />
                          <input class="form-control" name="update_id" hidden value="<?php echo $single['id']?>" type="number" />
                        </div>
                        <div class="form-group">
                          <label>Event Description</label
                          ><textarea  name="update_content" class="form-control"><?php echo $single['announce_content']?></textarea>
                        </div>
                      
                       
                        <button class="btn btn-success" type="submit" name="update_announce">
                          Update Announcement
                        </button>
                        <?php 
                        
                            endforeach;
                        endif;?>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        
        </div>
     
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bs-init.js"></script>
  </body>
</html>
