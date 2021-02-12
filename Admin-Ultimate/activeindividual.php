<?php
  require('connection_file.php');
  //session_start();
  
  
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
  <style>
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
      bottom: .5em;
    }
  .checked {
    color: orange;
  }
  .border-bottom{
    border-bottom:1px solid grey;
  }
  </style>
        
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
              <a class="dropdown-item">
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
          <?php
                if(!isset($_REQUEST['pending']))
                {

                
              ?>
              <li class="nav-item">
                <a class="nav-link" href="pages/forms/basic_elements.html">
                  <i class="mdi mdi-view-headline menu-icon"></i>
                  <span class="menu-title">User Ratings</span>
                </a>
              </li>
          <?php
               }
              ?>
          
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
                   
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Lodge Details&nbsp;/&nbsp;</p>
                    <p class="text-primary mb-0 hover-cursor">Individual details</p>
                  
                  </div>
                </div>
               
              </div>
            </div>
          </div>
          <?php
          $local_admin_id=$_REQUEST['id'];
          if(!isset($_REQUEST['pending']))
           {

            $sql_all_details=$db_connection->prepare("SELECT id,type,original_name,address,mobile_01,mobile_02,
            lodge_name,lodge_location,lodge_address,opening_time,closing_time,address,
            car_parking,security,swimming_pool,restaurent,lodge_status,rate_hr,
            count(type) as totalrooms  FROM local_admin JOIN rooms 
            ON local_admin.id=rooms.local_admin_id             
            where local_admin.id=? AND lodge_status=1 GROUP BY TYPE");
            $sql_all_details->bind_param("i",$local_admin_id);
            $sql_all_details->execute();
            $result= $sql_all_details->get_result();
            $row=$result->fetch_assoc();
           }
           else
           {
            $sql_all_details=$db_connection->prepare("SELECT id,type,original_name,address,mobile_01,mobile_02,
            lodge_name,lodge_location,lodge_address,opening_time,closing_time,
            car_parking,security,swimming_pool,restaurent,lodge_status,rate_hr,
            count(type) as totalrooms FROM local_admin JOIN rooms ON local_admin.id=rooms.local_admin_id            
            where local_admin.id=? AND lodge_status=1
            GROUP BY TYPE");
            $sql_all_details->bind_param("i",$local_admin_id);
            $sql_all_details->execute();
            $result= $sql_all_details->get_result();
            $row=$result->fetch_assoc();
            // print_r($row);
            // echo $local_admin_id;
           }                  
          ?>
         <div class="row bg-white pt-3">
            <div class="col-sm-12">
                <h2>Lodge Details</h2>
                <div class="card">
                  <div class="card-header">Lodge Name: <?php echo $row['lodge_name'] ?></div>
                  <div class="card-body">
                    <div class="row mb-3 border-bottom">
                      <div class="col-md-6">
                       Owner Name:
                      </div>
                      <div class="col-md-6">
                        <?php echo $row['original_name'] ?>
                      </div>
                   </div>
                   <div class="row  mb-3 border-bottom">
                      <div class="col-md-6">
                        Owner Address:
                      </div>
                      <div class="col-md-6">
                        <?php echo $row['address'] ?>
                      </div>
                   </div>
                   <div class="row  mb-3 border-bottom">
                      <div class="col-md-6">
                      Lodge Location:
                      </div>
                      <div class="col-md-6">
                      <?php echo $row['lodge_location'] ?>
                      </div>
                   </div>
                   <div class="row  mb-3 border-bottom">
                      <div class="col-md-6">
                      Lodge Address:
                      </div>
                      <div class="col-md-6">
                      <?php echo $row['lodge_address'] ?>
                      </div>
                   </div>
                   <div class="row  mb-3 border-bottom ">
                      <div class="col-md-6">
                      Mobile Number:
                      </div>
                      <div class="col-md-6">
                      <?php echo $row['mobile_01']; echo $row['mobile_02']==NULL?"":", ".$row['mobile_02']; ?>
                      </div>
                   </div>
                      <?php
                        if(!isset($_REQUEST['pending']))
                        {

                        
                        ?>  
                   
                    <?php
                          }
                              
                        ?>
                   <div class="row  mb-3 border-bottom">
                      <div class="col-md-6">Status:</div>
                      <div class="col-md-6"><?php echo $row['lodge_status']==1?"Active":"Pending" ?> </div>
                   </div>
                  </div>
                  <!-- <div class="card-footer">Footer</div> -->
              </div>
             </div>
             <div class="col-md-12 mt-4">      
                    <h2 mt-4>Room Details</h2>
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                      <thead >
                        <tr>
                          <th class="th-sm">Room Type
                          </th>
                          <th class="th-sm">No. of Rooms
                          </th>
                          <th class="th-sm">Rent/Hr
                          </th>                         
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $sql_all_details->execute();
                      $result= $sql_all_details->get_result();
                        while($row=$result->fetch_assoc())
                        {

                        
                      ?>
                        <tr>
                          <td><?php echo $row['type'] ?></td>
                          <td><?php echo $row['totalrooms'] ?></td>
                          <td><?php echo $row['rate_hr'] ?></td>
                        </tr>  
                        <?php
                        }
                        ?>

                     </tbody>
                     </table>
                </div>
                <div class="col-sm-12 mb-3">
                    <form action="#">
                    <?php
                            if(isset($_REQUEST['pending']))
                            {

                            
                            ?>  
                        <input type="button" value="Approve" class="btn btn-success"data-toggle="modal" data-target="#myModal-approval"> 
                        <?php
                              }
                                  
                            ?>
                        <input type="button" value="Remove" class="btn btn-danger" data-toggle="modal" data-target="#myModal-removal">
                    </form>
                </div>
               <?php
                if(!isset($_REQUEST['pending']))
                {

                $sql_get_ratings=$db_connection->prepare("SELECT * FROM review WHERE local_admin_id=?");
                $sql_get_ratings->bind_param("i",$local_admin_id);
                $sql_get_ratings->execute();
                $result= $sql_get_ratings->get_result();
               
                 if($result->num_rows>0)
                 {

                
              ?>
                <div class="col-sm-12 my-5">
                    <hr>
                    <br>
                    <h2>User Ratings</h2>
                    <!-- <p>123 Users rated on this lodge.</p> -->
                    <?php
                    while($row=$result->fetch_assoc())
                    {
                    ?>
                    <div class="media border p-3 mt-3">
                      <img src="images/faces/face10.jpg" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                      <div class="media-body">
                        <h4> <?php echo $row['user_name']  ?> <small><i>Posted on February  <?php echo $row['time'] ?></i></small></h4>
                        <p><?php echo $row['comment'] ?></p>      
                        <p>
                        <?php
                            for($i=1;$i<=$row['rating'];$i++)
                            {

                            
                        ?>
                            <span class="fa fa-star checked"></span>
                        
                         <?php } 
                          for($i=$row['rating'];$i<=5;$i++)
                          {

                         
                         ?>
                          <span class="fa fa-star"></span>
                         <?php
                          }
                         ?>
                        </p>
                      </div>
                    </div>
                    <?php
                    }
                    ?>
                   
                </div>
                <?php
                 }
               ?>
            </div>

            <?php
                }
            ?>
             
         <!-- The Modal for deletion-->
            <div class="modal fade" id="myModal-removal">
                <div class="modal-dialog">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Confirm</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <?php
                      
                    if(isset($_POST['dummy']))
                    {
                       
                         $id=(int)$_REQUEST['id'];

                        $remove=$db_connection->prepare("DELETE from local_admin WHERE id=?");
                        $remove->bind_param("i",$id);
                        if($remove->execute())
                        {
                           // echo"Removed sussesfully";
                            echo"<script>window.location.href='index.php'</script>";
                        }
                        else
                        {
                            echo"<script>alert('Server error');</script>";
                        }
                    }
                   
                    ?>
                   
                        <!-- Modal body -->
                        <div class="modal-body">
                        Do you really want to delete this lodge from the list?
                        </div>
                         <form name="remove" method="post" action="" id="remove">
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <input type="text" hidden="true" value="default" name="dummy">
                        <input type="submit" class="btn btn-danger" onclick="submit_form()" name="remove_button" 
                        data-dismiss="modal" value="Confirm"> 
                        </form>
                        </div>
                   
                </div>
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
    $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
  </script>
  <script>
      function submit_form()
      {
         
        document.getElementById("remove").submit();
      }
  </script>
</body>

</html>
