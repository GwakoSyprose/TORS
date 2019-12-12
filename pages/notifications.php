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
                            <h3 class="page-title">Reported incidences near Langata station</h3>

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
                                                     
                                                        ?>
                                                    
                                                       
                    <div class="blog-comments__item d-flex p-3">
                      <div class="blog-comments__avatar mr-3">
                        <img src="images/avatars/1.jpg" alt="User avatar" /> </div>
                      <div class="blog-comments__content">
                        <div class="blog-comments__meta text-muted">
                          <a class="text-secondary" href="#"><?php echo $numPlate; ?></a> on
                          <a class="text-secondary" href="#"><?php echo $phone; ?></a>
                          <span class="text-muted">– 3 days ago</span>
                        </div>
                        <p class="m-0 my-1 mb-2 text-muted"><?php echo  $description;?> ...</p>
                        <div class="blog-comments__actions">
                          <div class="btn-group btn-group-sm">
                            
                          <a href="?respond=<?= $notfID;?>">
                            <button type="button" class="btn btn-white text-success">
                              
                            <?=(($status == 0)?"<i class='material-icons text-danger'>alarm</i>" .' '. '<a class="text-danger">Respond</a>':''.getName($status));?>
                            
                         </button>
                         </a> 
                         <a href="report.php?not=<?= $notfID; ?>">
                            <button type="button" class="btn btn-white text-info">
                              <span class="text-info">
                              
                                <i class="material-icons">info</i>
                                </span> Give Report </button>
                                </a>
                              <a href="viewreport.php?notv=<?= $notfID; ?>">
                            <button type="button" class="btn btn-white text-info">
                              <span class="text-info">
                              
                                <i class="material-icons">info</i>
                                </span> View Report </button>
                                </a>
                              
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
                        <button type="submit" class="btn btn-white">View All Comments</button>
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
                    <h6 class="m-0">Officers Concerned</h6>
                  </div>
                  <div class="card-body p-0">
                    <ul class="list-group list-group-small list-group-flush">
                      <li class="list-group-item-dark d-flex px-3">
                        <span class="text-semibold text-fiord-blue">Officer</span>
                        <span class="ml-auto text-right text-semibold text-reagent-gray">Cases</span>
                      </li>
                      <li class="list-group-item d-flex px-3">
                        <span class="text-semibold text-fiord-blue">Syprose Gwako</span>
                        <span class="ml-auto text-right text-semibold text-reagent-gray">11,201</span>
                      </li>
                      <li class="list-group-item d-flex px-3">
                        <span class="text-semibold text-fiord-blue">Stacy Chebet</span>
                        <span class="ml-auto text-right text-semibold text-reagent-gray">9,291</span>
                      </li>
                      <li class="list-group-item d-flex px-3">
                        <span class="text-semibold text-fiord-blue">Linda Kiogora</span>
                        <span class="ml-auto text-right text-semibold text-reagent-gray">8,281</span>
                      </li>
                      <li class="list-group-item d-flex px-3">
                        <span class="text-semibold text-fiord-blue">John Doe</span>
                        <span class="ml-auto text-right text-semibold text-reagent-gray">7,128</span>
                      </li>
                      <li class="list-group-item d-flex px-3">
                        <span class="text-semibold text-fiord-blue">Karanja Mugo</span>
                        <span class="ml-auto text-right text-semibold text-reagent-gray">6,218</span>
                      </li>
                      <li class="list-group-item d-flex px-3">
                        <span class="text-semibold text-fiord-blue">Dela Otieno</span>
                        <span class="ml-auto text-right text-semibold text-reagent-gray">1,218</span>
                      </li>
                      <li class="list-group-item d-flex px-3">
                        <span class="text-semibold text-fiord-blue">Keno Ndio</span>
                        <span class="ml-auto text-right text-semibold text-reagent-gray">827</span>
                      </li>
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