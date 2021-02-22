<?php 
session_start();

require('../../Model/admin.php');
if ($_SESSION["adminUser"]==""||$_SESSION["adminUser"]==null ){

  header("location: ".URL."index.php?");
}
$adminobj= new Admin();
$members=$adminobj->fetchAllMember();

if(isset($_REQUEST['approve_member']))
{  
 $adminobj->approve($_REQUEST['approve_id']);
}

if(isset($_REQUEST['reject_member']))
{  
 $adminobj->reject($_REQUEST['reject_id']);
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
    <title>ASTU-Code Club |member List</title>
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
              <strong><?php if (isset($_SESSION['adminUser'])){echo $_SESSION['adminUser'];}?></strong>
            </li>
            <li class="nav-item">
            <form  method="GET">
            <button class="btn btn-primary" name="logout"  type="submit">Logout</button>
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
                  List of&nbsp; member Registered
                </h1>
                <div class="table-responsive table-bordered">
                  <table class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Member Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Dept</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Academic Year</th>
                        <th>status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                <?php foreach( $members as $student):?>
                      <tr>
                        <td><?php echo $student['memid'];?></td>
                        <td><?php echo $student['firstName'];?></td>
                        <td><?php echo $student['lastName'];?></td>
                        <td><?php echo $student['age'];?></td>
                        <td><?php echo $student['dept'];?></td>
                        <td><?php echo $student['gender'];?></td>
                        <td><?php echo $student['email'];?></td>
                        <td><?php echo $student['academicYear'];?></td>
                        <td><?php echo $student['status'];?></td>
                        <td>

                          <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
                            <input
                              class="form-control"
                              type="number"
                              hidden=""
                        
                              name="approve_id"
                              value="<?php echo $student['memid'];?>"
                            /><button
                              class="btn btn-success"
                              type="submit"
                              name="approve_member"
                            >
                              <i class="fa fa-check"></i>Approve
                            </button>
                          </form>
                        </td>
                        <td>
                          <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
                            <input
                              class="form-control"
                              type="number"
                              hidden=""
                              name="reject_id"
                              value="<?php echo $student['memid'];?>"
                            /><button
                              class="btn btn-danger"
                              type="submit"
                              name="reject_member"
                            >
                              <i class="fa fa-remove"></i>&nbsp;Reject
                            </button>
                          </form>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
      </div>
    </div>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bs-init.js"></script>
  </body>
</html>


