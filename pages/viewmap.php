<?php
include '../includes/connection.php';
include '../includes/head.php'; 
require 'officer_name.php';

$region = $_SESSION['regionID'];
$station = $_SESSION['stationID'];
$id =$_SESSION['userID'];

$query=mysqli_query($link, "SELECT * FROM notifications WHERE regionID='$region' AND stationID='$station'");
 if (isset($_GET['respond'])) {
     $notID = $_GET['respond'];
     $sql= "UPDATE notifications SET `status` = '$id' WHERE notificationID= '$notID'";
     if ($link->query($sql) === TRUE) {
        header("Location: notifications.php");
    } else {
      echo "Error updating record: " . $link->error;
    }
 }

?>
  


<body class="h-100">

    <div class="container-fluid">
        <div class="row">
            <!-- Main Sidebar -->
            <?php include '../includes/sidenav.php'; ?>
            <!-- End Main Sidebar -->
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <?php include '../includes/navbar.php'; ?>
                <!-- / .main-navbar -->
                <div class="main-content-container container-fluid px-4">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">Overview</span>
                            <h3 class="page-title">Map</h3>

                        </div>
                    </div>
                <div class="row">
                    <!-- Discussions Component -->
              <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                <div class="card card-small blog-comments">
                  <div class="card-header border-bottom">
                    <h6 class="m-0"></h6>
                  </div>
                  <div class="card-body p-0">
                  <!-- one item -->

                 

<?php

require 'user_map.php';

?>	
              
                   
                  </div>
                  
                </div>
              </div>
         
          </div>
          </div>

                  
                <?php 
    include '../includes/footer.php'; 
   
    ?>