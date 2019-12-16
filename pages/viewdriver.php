<?php include '../includes/head.php';

      include '../includes/connection.php';
     ob_start();
      if (isset($_GET['pid'])) {
        $id = $_GET['pid'];
        $query = "SELECT * FROM drivers WHERE driverID = $id";
        $result = mysqli_query($link, $query);
        $driver= mysqli_fetch_assoc($result);
        
  
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
     



?>

<body class="h-100">

   
    <div class="container-fluid">
        <div class="row">
            <!-- Main Sidebar -->
            <?php include '../includes/sidenav.php'; ?>
            <!-- End Main Sidebar -->
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <div class="main-navbar sticky-top bg-white">
                    <!-- Main Navbar -->
                    <?php include '../includes/navbar.php'; ?>
                </div>
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
                                                        <div class="col-md-3" style="float:right;" >
                                                            <form method="post">
                                                                <input type="button" name="generate_pdf" class="btn btn-success"  onclick="PrintMe('divid')" value="Generate PDF" />
                                                            </form>
                                                        </div>

                                                        <tbody>
                                                            <tr>

                                                                <td class="font-weight-bold">Full Name</td>
                                                                <td><?= $driver['dfname']; ?> <?= $driver['dlname']; ?></td>



                                                            </tr>

                                                            <tr>

                                                                <td class="font-weight-bold">License No</td>
                                                                <td><?= $driver['licence']; ?></td>


                                                            </tr>
                                                            <tr>

            <td class="font-weight-bold">Offence Count</td>
            <td><?= $driver['offenceCount']; ?></td>


            </tr>
                                                            <tr>

                                                                <td class="font-weight-bold">Status</td>
                                                                <td><?= ($driver['status'] == 0)? 'Active' : 'Suspended'; ?></td>


                                                            </tr>
                                                      
                                                            <tr>

                                                                <td class="font-weight-bold">Fine</td>
                                                                <td><?= 'Required to pay: '.$driver['fine']; ?>
                                                                
                                                                <?php 

                                                              
                                                                    if($driver['fine'] > 0.00 ){
                                                                        require_once('../includes/sendsms.php');
                                                                        $amt = number_format($driver['fine']);
                                                                        $sms = "Dear ".$driver['dfname'].", You are required to pay a fine of  KES ".$amt.".";
                                                                       // $no = $driver['phone'];                                                                      
                                                                        sendSms("254718525285",$sms);
                                                                    }
                                                                ?>
                                                                
                                                                </td>


                                                            </tr>
                                                            <tr>

<td class="font-weight-bold">Court</td>
<?php
$date_to = "";
$count = 0;
$ssql = "SELECT drivers.`driverID`, drivers.`dfname`,offences.`offenceID`,offence_types.`otID`,offence_types.`status` FROM
drivers INNER JOIN `offences` ON drivers.`driverID` = offences.`driverID`
INNER JOIN `offence_types` ON offences.`offenceType` = offence_types.`otID` WHERE drivers.`driverID`='$id' AND  offence_types.`status` = 1;";

$result = $link->query($ssql);
if ($result->num_rows > 0) {
     $count = 1;   
} else {
     
}
?>
<td><?php if($count > 0){
 echo $driver['date_to_court'];
 echo "\t" ;
 if(isset($_POST['date_to_see'])){
     $dat = $_POST['date_to_see'];
    $did = $_POST['driver'];
     $sqlu = "UPDATE drivers SET date_to_court = '$dat' WHERE driverID = '$did' ;";
     if ($link->query($sqlu) === TRUE) {
            require '../includes/sendsms.php';
            $sms = "Dear".$driver['dfname'].", You are required to appear in court on ".$dat.".";
            $no = $driver['phone'];
          
            sendSms("254718525285",$sms);
            echo "<script>";
          echo "swal('Text message sent!', 'Court date is set successfully', 'success')";
          echo "</script>";
    } else {
        echo "Error updating record: " . $link->error;
    }
 }
?>

<form method="post" class="form-inline">
<div class="form-group col-md-6">
    <input type="date" name="date_to_see" value="<?=(date('Y-m-d'))?>" class="form-control" required>
</div>
    <input type="hidden" name="driver" value="<?php echo $id; ?>" required>
<div class="form-group col-md-6">
    <input type="submit" class="btn btn-danger" value="Set Court Date">
    </div>
</form>
<?php

}
 echo 'N/A';


?></td>


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
                    <!-- End Default Light Table -->
                </div>
                <?php 
    include '../includes/footer.php'; 
   
    ?>
