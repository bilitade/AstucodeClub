<?php

session_start();
require('../../Model/admin.php');
$adminobj= new Admin();
$events=$adminobj->fetchAllEvent();
if(isset($_REQUEST['edit_button'])){

$singleEvent=$adminobj->fetchSingleEvent($_REQUEST['edit_id']);
}
if(isset($_REQUEST['update_event'])){


$adminobj->updateEvent($_REQUEST);
//print_r($_REQUEST);

}
if(isset($_REQUEST['add_event'])){
$adminobj->insertEvent($_REQUEST);

}
if(isset($_REQUEST['delete_event'])){
  $adminobj->deleteEvent($_REQUEST['delete_id']);
  
  }
  


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    />
    <title>Develpment</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Akronim"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Alef"
    />
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
              <strong>Bilisuma</strong>
            </li>
            <li class="nav-item">
              <button class="btn btn-primary" type="button">Logout</button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid" style="margin-top: 3%">

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
                      <th>Begin at</th>
                      <th>End at</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($events as $event): ?>
                    <tr>
                      <td><?php echo $event['id'] ?></td>
                      <td><?php echo $event['title'] ?></td>
                      <td><?php echo $event['begin_at'] ?></td>
                      <td><?php echo $event['end_at'] ?></td>
                      <td>
                      <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
                          <input
                            class="form-control"
                            type="number"
                            hidden=""
                            name="edit_id"
                              value="<?php echo $event['id'] ?>"
                          /><button
                            class="btn btn-warning"
                            type="submit"
                            name="edit_button"
                          
                          >
                            <i class="fa fa-edit"></i>Edit
                          </button>
                        </form>
                      </td>
                      <td>
                        <form method="POST">
                          <input
                            class="form-control"
                            type="number"
                            hidden=""
                            name="delete_id"
                            value="<?php echo $event['id'] ?>"
                          /><button
                            class="btn btn-danger"
                            type="submit"
                            name="delete_event"
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
                    Event add form
                  </h1>
                  <form  action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
                    <div class="form-group">
                      <label>Event Title</label
                      ><input class="form-control" name="title" type="text" />
                    </div>
                    <div class="form-group">
                      <label>Event Description</label
                      ><textarea class="form-control" name="description"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Begin at</label
                      ><input class="form-control"  name="begin_at"type="datetime-local" />
                    </div>
                    <div class="form-group">
                      <label>End at</label
                      ><input class="form-control" name="end_at" type="datetime-local" />
                    </div>
                    <button class="btn btn-primary" name="add_event" type="submit">
                      Add Event
                    </button>
                  </form>
                </div>
              </div>
              <div class="row">
                <div class="col">
                <?php if(isset($singleEvent)) :?>
                  <div class="card border-warning" style="margin-top: 15px; margin-bottom:5vh ">
                    <div class="card-body">
                      <h1 class="text-center" style="font-size: 1.3rem">
                        Event update form
                      </h1>
                      <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
                         
                            <?php foreach($singleEvent as $single):?>
                        <div class="form-group">
                          <label>Event Title</label
                          ><input class="form-control" value="<?php echo $single['title']?>" name="update_title" type="text" />
                          <input class="form-control" name="update_event_id" hidden value="<?php echo $single['id']?>" type="number" />
                        </div>
                        <div class="form-group">
                          <label>Event Description</label
                          ><textarea  name="update_desc" class="form-control"><?php echo $single['descriptions']?></textarea>
                        </div>
                        <div class="form-group">
                          <label>Begin at</label
                          ><input name="update_begin"
                            class="form-control"
                            type="datetime-local"
                          
                          />
                        </div>
                        <div class="form-group">
                          <label>End at</label
                          ><input
                          name="update_end"
                            class="form-control"
                            type="datetime-local"
                      
                          />
                        </div>
                        <button class="btn btn-success" type="submit" name="update_event">
                          Update Event
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
