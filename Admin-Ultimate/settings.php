<?php
  require('connection_file.php');
  //session_start();
  $id=1;
  //$id=$_REQUEST['id'];
  $details=$db_connection->prepare("SELECT * FROM `main_admin` WHERE id = ?");
  $details->bind_param("i",$id);
  $details->execute();
  $result= $details->get_result();
  $row=$result->fetch_assoc();
 
  
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin- Ultimate</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown mr-4">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-success">
                    <i class="mdi mdi-information mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">New requests</h6>
                  
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face5.jpg" alt="profile"/>
              <span class="nav-profile-name">Louis Barnett</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="index.html">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Lodge Details</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">New requests</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">All Lodges</a></li>
              </ul>
            </div>
          </li>
          
        </ul>
      </nav>



      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="d-flex">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                   
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                    <p class="text-primary mb-0 hover-cursor">Overview</p>
                  
                  </div>
                </div>
               
              </div>
            </div>
          </div>
          <?php
          
           if (isset($_POST['submit']))
           {
           
            $updatedpass=$_POST['updatedpass'];
             $update=$db_connection->prepare("UPDATE `main_admin` SET `password`=? WHERE id=?
             ");
             $update->bind_param("si",$updatedpass,$id); 
             if($update->execute())
             {
               echo "<script> alert('Updated Sucessfully');</script>";
             }
           }
          ?>
         <div class="row pt-">
           <div class="col-sm-7 bg-white mx-auto">
            <form class="forms-sample m-3" method="post" action="">
                <!-- <div class="form-group">
                  <label for="exampleInputUsername1">Old Password</label>   
                  <div class="input-group">
                    <input type="Password" class="form-control" id="admin-oldpassword"
                    value="<?php //echo $row['password'] ?>" placeholder="Username">
                    <button class="btn border"><i class="fa fa-key"></i></button>
                  </div>
                </div> -->
                <div class="form-group">
                  <label for="exampleInputPassword1"> New Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="admin-password" 
                     placeholder="Password" required>
                    <button class="btn border"><i class="fa fa-key"></i></button>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputConfirmPassword1">Confirm Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" 
                    id="admin-confirm-password" placeholder="Password" 
                    name="updatedpass" required>
                    <button class="btn border"><i class="fa fa-key"></i></button>
                  </div>
                </div>
                <div class="form-check form-check-flat form-check-primary">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" id="toggle-checkbox" onclick="toggle_fn();">
                      Show fields
                    </label>
                  </div>
                <button type="submit" onclick="return check()" 
                class="btn btn-primary mr-2" name="submit" >Submit</button>
                <!-- <button class="btn btn-light">Cancel</button> -->
              </form>
           </div>
         </div>
        
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer bg-white">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © companyname 2020</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/data-table.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script>
      //var admin_username_toggle=document.getElementById('admin-username');
      var admin_password_toggle=document.getElementById('admin-password');
      var admin_confirm_password=document.getElementById('admin-confirm-password');
      //var admin_old_password=document.getElementById('admin-oldpassword');
      var toggle=document.getElementById('toggle-checkbox');

        function toggle_fn()
        {
            
                if(toggle.checked===true)
                {
                    admin_confirm_password.type="text";
                    admin_password_toggle.type="text";
                    //admin_old_password.type="text";

                }
                else{
                    
                    admin_confirm_password.type="password";
                    admin_password_toggle.type="password";
                    //admin_old_password.type="password";
                }
        }

        function check()
        {
          if(admin_password_toggle.value==admin_confirm_password.value)
          {
            return true;
          }
          alert("Password does not match..")
          return false;
        }
  </script>
</body>

</html>

