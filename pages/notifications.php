<?php
include '../includes/connection.php';
include '../includes/head.php'; 
require 'officer_name.php';

$region = $_SESSION['regionID'];
$station = $_SESSION['stationID'];
$id =$_SESSION['userID'];

$generalquery=mysqli_query($link, "SELECT * FROM notifications ORDER BY notificationID");
$result = mysqli_fetch_assoc($generalquery);
 $getdate = $result['date'];

 $query=mysqli_query($link, "SELECT notifications.notificationID,notifications.numPlate,notifications.description,
notifications.phone,notifications.status,reports.reportID FROM notifications 
LEFT OUTER JOIN reports ON notifications.notificationID = reports.notificationID WHERE notifications.regionID='$region' AND notifications.stationID='$station' ORDER BY notificationID");



 if (isset($_GET['respond'])) {
     $notID = $_GET['respond'];
     $sql= "UPDATE notifications SET `status` = '$id' WHERE notificationID= '$notID'";
     if ($link->query($sql) === TRUE) {
        header("Location: notifications.php");
    } else {
      echo "Error updating record: " . $link->error;
    }
 }
 //picking station name of current sesssion station
 $stationquery=mysqli_query($link, "SELECT * FROM stations WHERE stationID='$station'");
 $result = mysqli_fetch_assoc($stationquery);
 $stationName = $result['stationName'];

//calculating the number of officers
 $officers=mysqli_query($link, "SELECT * FROM users WHERE regionID='$region' AND stationID='$station'");

 //getting the number of cases handled by each officer
 $incidences=mysqli_query($link, "SELECT * FROM notifications WHERE status ='$id'");
    $incedencesno= mysqli_num_rows($incidences);

    

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
                        <div class="col-12 col-sm-12 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">Overview</span>
                            <h4 class="page-title" style="text-transform: uppercase;">Reported incidences near <?= $stationName; ?> station</h4>

                        </div>
                    </div>
                    <div class="row">
                        <!-- Discussions Component -->
                        <div class="col-lg-9 col-md-12 col-sm-12 mb-4">
                            <div class="card card-small blog-comments">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Notifications</h6>
                                </div>
                                <div class="card-body p-0">
                                    <!-- one item -->


                                    <?php
                   while($result = mysqli_fetch_assoc($query)) :
                             $notfID=$result['notificationID'];
                             $status=$result['status'];
                            $numPlate=$result['numPlate'];
                            $description=$result['description'];
                            $phone=$result['phone'];
                             $report=$result['reportID'];
                                                     
                                                        ?>


                                    <div class="blog-comments__item d-flex p-3">
                                        <div class="blog-comments__avatar mr-3">
                                            <img src="images/saga.jpg" alt="User avatar" /> </div>
                                        <div class="blog-comments__content">
                                            <div class="blog-comments__meta text-muted">
                                                <a class="text-secondary" href="#">Incident report on</a> vehicle number.
                                                <a class="text-secondary" href="#"><?php echo $numPlate; ?></a>

                                                <?php
                          // setting time last seen

$seconds_ago = (time() - strtotime('2019-12-12 06:27:00'));

if ($seconds_ago >= 31536000) {
    
     echo '<span class="text-muted">– ' . intval($seconds_ago / 31536000) .' years ago</span>';
} elseif ($seconds_ago >= 2419200) {
    
    echo '<span class="text-muted">– ' . intval($seconds_ago / 2419200) .' months ago</span>';
} elseif ($seconds_ago >= 86400) {
   
    echo '<span class="text-muted">– ' . intval($seconds_ago / 86400) .' days ago</span>';
} elseif ($seconds_ago >= 3600) {
   
    echo '<span class="text-muted">– ' . intval($seconds_ago / 3600) .' hours ago</span>';
} elseif ($seconds_ago >= 60) {
    
    echo '<span class="text-muted">– ' . intval($seconds_ago / 60) .' minutes ago</span>';
} else { 
    
    echo '<span class="text-muted">– Less than a minute ago </span>';
}


                           ?>





                                            </div>
                                            <p class="m-0 my-1 mb-2 text-muted">Contact person <?php echo  $phone;?></p>
                                            <p class="m-0 my-1 mb-2 text-muted"><?php echo  $description;?> ...</p>
                                            <div class="blog-comments__actions">
                                                <div class="btn-group btn-group-sm">

                                                    <a href="?respond=<?= $notfID;?>">
                                                        <button type="button" class="btn btn-white text-success">

                                                            <?=(($status == 0)?"<i class='material-icons text-danger'>alarm</i>" .' '. '<a class="text-danger">Respond</a>':''.getName($status));?>

                                                        </button>
                                                    </a>



                                                    <?php if($report == NULL){
                                            ?>
                                                    <a href="report.php?not=<?= $notfID; ?>">
                                                        <button type="button" class="btn btn-white text-info">
                                                            <span class="text-info">

                                                                <i class="material-icons">info</i>
                                                            </span> Give Report </button>
                                                    </a>
                                                    <?php   
    
    
                                        }else{
                                            ?>
                                                    <a href="viewreport.php?notv=<?= $notfID; ?>">
                                                        <button type="button" class="btn btn-white text-info">
                                                            <span class="text-info">

                                                                <i class="material-icons">info</i>
                                                            </span> View Report </button>
                                                    </a>
                                                    <?php

                                                    } ?>

                                                    <a href="viewmap.php?id=<?= $notfID; ?>" target="_blank">
                                                        <button type="button" class="btn btn-white text-warning">
                                                            <span class="text-warning">
                                                                <i class="material-icons ">my_location</i>
                                                            </span> View Map </button>
                                                    </a>



                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <?php endwhile; ?>

                                </div>
                                <div class="card-footer border-top">
                                    <div class="row">
                                        <div class="col text-center view-report">
                                            <button type="submit" class="btn btn-white">View All Notifications</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Discussions Component -->

                        <!-- Top Referrals Component -->
                        <div class="col-lg-3 col-md-12 col-sm-12 mb-4">
                            <div class="card card-small">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0" style="text-transform: uppercase;"><?= $stationName; ?> Station</h6>
                                </div>

                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Officers Concerned</h6>
                                </div>

                                <div class="card-body p-0">
                                    <ul class="list-group list-group-small list-group-flush">

                                        <li class="list-group-item-dark d-flex px-3">
                                            <span class="text-semibold text-fiord-blue">Officer</span>
                                            <span class="ml-auto text-right text-semibold text-reagent-gray">Cases</span>
                                        </li>

                                        <?php
                   while($result = mysqli_fetch_assoc($officers)) :
                             $fname=$result['fname'];
                             $lname=$result['lname'];
                            ?>
                                        <li class="list-group-item d-flex px-3">
                                            <span class="text-semibold text-fiord-blue"><?= $fname; ?> <?= $lname; ?> </span>
                                            <span class="ml-auto text-right text-semibold text-reagent-gray"><?= $incedencesno; ?></span>
                                        </li>
                                        <?php endwhile; ?>

                                    </ul>
                                </div>
                                <div class="card-footer border-top">
                                    <div class="row">
                                        <div class="col">
                                            <select class="custom-select custom-select-sm">
                                                <option selected>Last Week</option>
                                                <option value="1">Today</option>
                                                <option value="2">Last Month</option>
                                                <option value="3">Last Year</option>
                                            </select>
                                        </div>
                                        <div class="col text-right view-report">
                                            <a href="#">Full report &rarr;</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Top Referrals Component -->
                    </div>
                </div>


                <?php 
    include '../includes/footer.php'; 
   
    ?>
