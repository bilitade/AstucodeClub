<?php 
  session_start();
  include('../club/Model/Database.php');
  include('../club/Model/admin.php');
  include('../club/Model/members.php');
 $dbObj= new Database();
 $dbObj->Connect();
 $announces=$dbObj->fetchannounce();
 $events =$dbObj->fetchEvent();

  if (isset($_REQUEST['admin_login'])){

   $adminObj= new Admin();
   $adminObj->adminLogin($_REQUEST);


  }
  if (isset($_REQUEST['member_login'])){
    $memberObj= new member();
    $memberObj->memberLogin($_REQUEST);

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
    <title>ASTU-Code Club |Home</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Akronim"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Alef"
    />
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css" />
    <link rel="stylesheet" href="assets/css/Footer-Dark.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
      <link rel = "icon" href =  "./icon.png" 
        type = "image/x-icon"> 

  </head>

  <body>
    <nav
      class="navbar  navbar-light navbar-expand-md bg-light shadow"
      id="navbar"
      style="position: fixed; top: 0px; z-index: 4; width: 100%"
    >
      <div class="container-fluid">
        <a class="navbar-brand" href="#">ASTU-Code Club</a
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
            <li class="nav-item"></li>
            <li class="nav-item">
              <button
                class="btn btn-primary"
                type="button"
                style="font-size: 1.2rem"
                title="Admin Login"
                data-toggle="modal"
                data-target="#adminLogin"
              >
                <i class="fa fa-user"></i>
              </button>
            </li>
          </ul>
        </div>
      </div>
    </nav>


  
    
    <div class="container-fluid" style="margin-top: 6%">
      <div class="row">
      <?php if(isset($_REQUEST["info"])): ?>

        <?php if($_REQUEST["info"]=="notexist"):?>
        <div class="col">
          <div class="alert alert-danger" role="alert" style="margin-top: 2px">
            <span
              ><strong
                >&nbsp; &nbsp; &nbsp; &nbsp; Username or password is not correct
                !</strong
              >.</span
            >
          </div>
        </div>
        <?php endif?>

        <?php if($_REQUEST["info"]=="notApproved"):?>
        <div class="col">
          <div class="alert alert-warning" role="alert" style="margin-top: 2px">
            <span
              ><strong
                >&nbsp; &nbsp; &nbsp; &nbsp; You are not approved my Admin, try later!
                !</strong
              >.</span
            >
          </div>
        </div>
        <?php endif?>
  
        <?php endif ?>

      </div>



      <div class="row">
        <div class="col">
          <h1
            class="text-center"
            style="font-family: Akronim, cursive; background: var(--danger)"
          >
            Welcome To ASTU Code Club&nbsp;
          </h1>
        </div>
      </div>
      <div class="row">
        <div class="col col-12 col-lg-4">
          <div class="card">
            <div class="card-body"></div>
            <span style="font-size: 2rem"
              ><i class="fa fa-bullhorn" style="font-size: 3rem"></i
              >&nbsp;Announcement</span
              <?php  foreach($announces as $announce):?>

            >
            <hr />
            <h1 style="font-size: 1.3rem"><?php echo $announce["announce_title"];?></h1>
            <p class="text-justify" style="padding: 14px">
            <?php echo $announce["announce_content"];?>
              <hr>
              <strong>Posted on : <?php echo $announce["posted"] ?></strong>
            </p>
          </div>
        </div>
       <?php endforeach?>


        <div class="col col-12 col-lg-5">
          <div class="card">
            <span style="font-size: 2rem"
              ><i class="fa fa-calendar" style="font-size: 3rem"></i
              >&nbsp;upcoming Event</span
            >
            <hr />
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Event</th>
                      <th>Begin Date</th>
                      <th>End Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  foreach($events as $event): ?>
                    <tr>
                      <td><?php echo $event["title"] ?></td>
                      <td><?php echo $event["begin_at"]?></td>
                      <td><?php echo $event["end_at"]?></td>

                      
                    </tr>
                    <tr>
                      
                    </tr>
                  

                    <?php  endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col col-12 col-lg-3">
          <div class="card" style="padding: 2%; margin-top: 5%">
            <div class="card-body">
              <h1>Not member ?</h1>
              <a  class=" btn btn-primary" href="<?php echo URL ."view/member/signup.php";?>"class="btn btn-primary" type="button">Join us</a>
              <h1>Already Member?</h1>
              <button
                class="btn btn-success"
                type="button"
                data-toggle="modal"
                data-target="#member"
              >
                Sign in
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="adminLogin">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              &nbsp;Admin Login
            </h4>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="GET">
              <div class="form-group">
                <label>Email</label><input name="email" class="form-control" type="email" />
              </div>
              <div class="form-group">
                <label>Password</label
                ><input class="form-control" name="password" type="password" />
              </div>
              <button class="btn btn-primary" type="submit" name="admin_login">Login</button>
            </form>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="member">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              &nbsp;Member Login
            </h4>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="GET">
              <div class="form-group">
                <label>Email</label><input  name="email" class="form-control" type="text" />
              </div>
              <div class="form-group">
                <label>Password</label
                ><input class="form-control" name="password" type="password" />
              </div>
              <button class="btn btn-primary"  name="member_login"  type="submit">Login</button>
            </form>
          </div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
    <div
      class="footer-dark"
      style="width: 100%; height: 3vh; position: fixed; bottom: 1px"
    >
      <footer>
        <div class="container">
          <div class="row">
            <div class="col item social">
              <a href="#"><i class="icon ion-social-facebook"></i></a
              ><a href="#"><i class="icon ion-social-twitter"></i></a
              ><a href="#"><i class=" icon  ion-social-youtube"></i></a
              ><a href="#"><i class="icon ion-social-instagram"></i></a>
            </div>
            <div class="col">
              <p><strong>  &copy; 2021 ASTU-Code Club</strong></p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
  </body>
</html>
