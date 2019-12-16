<?php include   '../includes/driverhead.php';

      include  '../includes/connection.php';

      if (isset($_GET['pid'])) {
        $id = $_GET['pid'];
        $query = "SELECT * FROM drivers WHERE driverID = $id";
        $result = mysqli_query($link, $query);
        $driver= mysqli_fetch_assoc($result);
        $summ= 0;

      }
        
 // Escape user inputs for security
    if(isset($_POST["submit"])) {
      $id = $_GET['pid'];
      $offense =  $_POST['offense'];
      $numplate = mysqli_real_escape_string($link, $_POST['numplate']);
      $description = mysqli_real_escape_string($link, $_POST['description']);

      $cou = count($_POST['offense']);
      $sql = "INSERT INTO offences(offenceType,description,driverID) VALUES ";
      $comma = "";
      for ($i=0; $i < $cou; $i++) { 
        if ($i > 0) {
          $comma = ",";
        }
        $sql .= $comma."(".$_POST['offense'][$i].",'$description','$id')";
      }
      if ($link->multi_query($sql) === TRUE) {

        // record incident
        $date  = date('Y-m-d');
        $days = 90;
        $oid = $_SESSION['userID'];
        //inserting offences to offences table and incidences table
        $sql = "INSERT INTO `incidences` (`offenceID`, `userID`,`numPlate`, `location`,`recDate`)
               SELECT offences.`offenceID`,$oid,'$numplate','MOI','$date' FROM offences  WHERE  NOT EXISTS( SELECT 
            incidences.`offenceID` FROM  incidences  WHERE incidences.`offenceID` = `offences`.`offenceID` );";
            //checks if the insertion has performed successfully
            if (mysqli_query($link, $sql)) {
              //sum the total ofences for that driver
                $sql2 = "SELECT SUM(ot.value) offenceCount FROM offences off 
INNER JOIN drivers d ON d.driverID = off.driverID
INNER JOIN offence_types ot ON off.offenceType=ot.otID
WHERE d.driverID = '$id' ";
            //assign the total sum to $summ variable
          $summ = mysqli_query($link, $sql2);
          $result = mysqli_fetch_assoc($summ);
          $base = $result['offenceCount'];
          //updates the offenceCount of that driver
          $sql3 = "UPDATE drivers SET offenceCount = '$base'  WHERE driverID = '$id'";
          if(mysqli_query($link, $sql3)){
            //updates the status to suspended if condition is met
            $sql4 = "UPDATE drivers SET status = '1' WHERE offenceCount > '12'";
           if(mysqli_query($link, $sql4)){
            $sql5 = "INSERT INTO suspended_licences(driverID, suspendedDate, activatedDate)
                 VALUES ('$id', '$date', DATE_ADD(suspendedDate, INTERVAL 90 DAY))";
            mysqli_query($link, $sql5);
           }
                header('location:viewdriver.php?pid='.$id.'&success=1');

            }
          }

       
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
     
  
    }




?>

<body class="h-100">

    
    <div class="container-fluid">
        <div class="row  d-flex justify-content-center">
            <!-- Main Sidebar -->

            <!-- End Main Sidebar -->
            <main class="main-content col-lg-12">
                <div class="main-navbar sticky-top bg-white">
                    <!-- Main Navbar -->
                    <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->

                <!-- / .main-navbar -->
                
                <div class="main-content-container container-fluid px-4">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">Overview</span>
                            <h3 class="page-title">Driver Details</h3>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <!-- Default Light Table -->
                    <div class="row" id="divid">
                        <div class="col-lg-4">
                            <div class="card card-small mb-4 pt-3">
                                <div class="card-header border-bottom text-center">
                                    <h6 class="mb-0">Profile Picture</h6>
                                    <div class="mb-3 mx-auto">
                                        <?php
                                    
                                    echo "<img src='images/".$driver['profileImage']."' width=200 height=200 >";
                                    
                                     ?> </div>
                                  
                                   <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-4">
                                            <div class="progress-wrapper">
                                                <strong class="text-muted d-block mb-2">Infringement rate</strong>
                                                   <?php 
                                                        $percentage = round((($driver['offenceCount'] / 12) * 100));
                                                        
                                                        ?>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: <?= $percentage;?>%;">
                                                       <!-- calculating infrigement rate -->
                                                     
                                                        
                                                        <span class="progress-value"><?= $percentage;?>%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item p-4">
                                            <strong class="text-muted d-block mb-2">Infringement rate of above 100% leads to suspension of the driver's license</strong>
                                            <span></span>
                                        </li>
                                    </ul>



                                </div>

                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card card-small mb-4">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Account Details</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-3">
                                        <div class="row">
                                            <div class="col">
                                                <h6 class="font-weight-bold text-center">Personal Details</h6>
                                                <ul>
                                                    <table class="table table-striped table-borderless">
                                                       <div><a href="" id="print" onclick="printContent('divid');" name="submit">Download </a></div>

                                                        <tbody>
                                                            <tr>

                                                                <td class="font-weight-bold">First Name</td>
                                                                <td><?= $driver['dfname']; ?> <?= $driver['dlname']; ?></td>



                                                            </tr>

                                                            <tr>

                                                                <td class="font-weight-bold">National ID</td>
                                                                <td><?= $driver['driverID']; ?></td>

                                                            </tr>
                                                            <tr>

                                                                <td class="font-weight-bold">License No</td>
                                                                <td><?= $driver['licence']; ?></td>


                                                            </tr>
                                                            <tr>

                                                                <td class="font-weight-bold">Status</td>
                                                                <td><?= ($driver['status'] == 0)? 'Active' : 'Suspended'; ?></td>


                                                            </tr>
                                                            <tr>

                                                                <td class="font-weight-bold">Type</td>
                                                                <td><?= $driver['typeID']; ?></td>


                                                            </tr>
                                                            <tr>

                                                                <td class="font-weight-bold">Offence Count</td>
                                                                <td><?= $driver['offenceCount']; ?></td>


                                                            </tr>
                                                            <tr>

                                                                <td class="font-weight-bold">Registration Date</td>
                                                                <td><?= $driver['regDate']; ?></td>


                                                            </tr>

                                                        </tbody>
                                                    </table>

                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <?php 
    include   '../includes/footer.php'; 
   
    ?>
