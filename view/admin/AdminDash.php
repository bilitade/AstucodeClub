<?php 
session_start();
require('../../Model/config.php');
require('../../Model/admin.php');
$adminobj= new Admin();
if ($_SESSION["adminUser"]==""||$_SESSION["adminUser"]==null ){


  header("location: ".URL."index.php?");


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
    <title>ASTU-Code Club | Admin Dashbaord</title>
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
    <link rel="stylesheet" href="../../assets/css/Footer-Dark.css" />
    <link rel="stylesheet" href="../../assets/css/styles.css" />
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
    <div class="container" style="margin-top: 3%">
      <div class="row" style="max-width: 95%">
        <div class="col col-12 col-md-4">
          <div class="card">
            <div class="card-body text-center">
              <a href="<?php echo URL.'view/admin/memberList.php'; ?>" class="card-link"
                ><i
                  class="fa fa-list-alt"
                  data-toggle="tooltip"
                  data-bs-tooltip=""
                  style="font-size: 131px"
                  title="Member List"
                ></i>
                <h1></h1>
              </a>
            </div>
          </div>
        </div>
        <div class="col col-12 col-md-4">
          <div class="card">
            <div class="card-body text-center">
              <a  href="<?php echo URL.'view/admin/events.php'; ?>"class="card-link text-warning"
                ><i
                  class="fa fa-calendar-check-o"
                  data-toggle="tooltip"
                  data-bs-tooltip=""
                  style="font-size: 131px"
                  title="Events"
                ></i>
                <h1></h1>
              </a>
            </div>
          </div>
        </div>
        <div class="col col-12 col-md-4">
          <div class="card">
            <div class="card-body text-center">
              <a  href="announcement.php"class="card-link text-danger"
                ><i
                  class="fa fa-bullhorn"
                  data-toggle="tooltip"
                  data-bs-tooltip=""
                  style="font-size: 131px"
                  title="Announcement"
                ></i
              ></a>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="max-width: 95%; margin-top: 19px">
        <div class="col col-12 col-md-4">
          <div class="card">
            <div
              class="card-body text-center"
              data-toggle="tooltip"
              data-bs-tooltip=""
              title="Groups"
            >
              <a class="card-link text-success"
                ><i class="fa fa-group" style="font-size: 131px"></i
              ></a>
            </div>
          </div>
        </div>
        <div class="col col-12 col-md-4">
          <div class="card">
            <div class="card-body text-center">
              <a class="card-link text-dark"
                ><i
                  class="fa fa-user-circle-o"
                  data-toggle="tooltip"
                  data-bs-tooltip=""
                  style="font-size: 131px"
                  title="Execute Commite"
                ></i
              ></a>
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
