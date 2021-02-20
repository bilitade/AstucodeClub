<?php 

  include_once('../../Model/Database.php')

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
    <link rel="stylesheet" href="../../assets/css/Footer-Dark.css" />
    <link rel="stylesheet" href="../../assets/css/styles.css" />
  </head>

  <body>
    <nav class="navbar navbar-light navbar-expand-md shadow">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo URL."index.php";?>">ASTU-Code Club</a
        ><button
          data-toggle="collapse"
          class="navbar-toggler"
          data-target="#navcol-1"
        >
          <span class="sr-only">Toggle navigation</span
          ><span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
         
        </div>
      </div>
    </nav>
    <div class="row" style="margin: 2%">

    <?php if (isset( $_REQUEST["info"])):?>
      <div class="col">
        <div class="alert alert-success" role="alert">
          <span><strong>Successfully Registered !</strong>.</span>
        </div>
      </div>
    <?php endif?>
    
    </div>
    <div class="container-fluid" style="margin-top: 2%">
      <div class="card">
        <div class="card-body">
          <form  method="GET">
            <h1 class="text-center" style="font-size: 35px">Member Signup</h1>
            <div class="form-row">
              <div
                class="col col-12 col-md-6"
                style="padding-right: 5%; padding-left: 5%"
              >
                <div class="form-group">
                  <label>First Name</label
                  ><input class="form-control" name="firstName" type="text" />
                </div>
                <div class="form-group">
                  <label>Last Name</label
                  ><input class="form-control" name="lastName" type="text" />
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control"  name="email" type="text" />
                </div>
                <div class="form-group">
                  <label>Age</label
                  ><input
                    class="form-control"
                    type="number"
                    name="age"
                  />
                </div>
                <div class="form-group">
                  <label>Gender&nbsp;</label>
                  <div class="d-flex">
                    <div class="form-check" style="margin-right: 3%">
                      <input
                        class="form-check-input"
                        type="radio"
                        id="formCheck-1"
                        value="male"
                        name="gender"
                      /><label class="form-check-label" for="male"
                        >Male</label
                      >
                    </div>
                    <div class="form-check">
                      <input
                        class="form-check-input"
                        type="radio"
                        id="formCheck-2"
                        name="gender"
                        value="female"
                      /><label class="form-check-label" for="female"
                        >Female</label
                      >
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="col col-12 col-md-6"
                style="padding-right: 5%; padding-left: 5%"
              >
                <div class="form-group">
                  <label>Password</label
                  ><input class="form-control" type="password" />
                </div>
                <div class="form-group">
                  <label>Confirm&nbsp; Password</label
                  ><input class="form-control" type="password" />
                </div>
                <div class="form-group">
                  <label>Dept</label
                  ><select class="form-control">
                    <option value="undefined" selected="">CSE</option>
                    <option value="ECE">ECE</option>
                    <option value="PCE">PCE</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Academic Year</label
                  ><select class="form-control">
                    <option value="2" selected="">2ndYear</option>
                    <option value="3">3rdYear</option>
                    <option value="4">4thYear</option>
                    <option value="5">5thYear</option>
                  </select>
                </div>
                <button class="btn btn-primary" type="button">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bs-init.js"></script>
  </body>
</html>
