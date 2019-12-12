<?php
include '../includes/connection.php';
include '../includes/head.php';

$id=$_GET['notv'];

if(mysqli_connect_error()) {

    die ("Database Connection Error!");
   }
    // Escape user inputs for security
    else
   {
        
$query=mysqli_query($link, "SELECT * FROM reports where notificationID=$id");
    $row=mysqli_fetch_assoc($query);

        
              
    $date =$row['date'];
    $vehicle1 = $row['vehicle1'];
    $make1 = $row['make'];
    $vehicle2 = $row['vehicle2'];
    $make2 = $row['make2'];
    $owner1 = $row['owner'];
    $id1= $row['ownerid1'];
    $owner2= $row['owner2'];
    $id2= $row['ownerid2'];   
    $company= $row['insurance'];   
    $complete = $row['investigationstatus'];
    $charge = $row['charged'];
    $rule = $row['ruleviolated'];
    $injuries = $row['injuredpersons'];
    $fatalities = $row['fatalities'];
    $witness1 = $row['witness1'];
    $witness2 = $row['witness2'];
    $notID=$row['notificationID'];
        
        
  
    
        
    
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
                        <div class="col-12 col-sm-12 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">The Kenyan Police</span>
                            <h3 class="page-title">Abstract from police on a road accident</h3>

                        </div>
                    </div>
                    <div class="row">
                        <!-- Input & Button Groups -->
                        <div class="card card-small mb-4 col-lg-12">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">Report</h6>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-3">
                                    <form action="viewreport.php" >

                                        <strong class="text-muted d-block mb-2">Police Info</strong>


                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Date of the incident</span>
                                            </div>
                                            <input type="date" name="date" class="form-control" aria-describedby="basic-addon1" value="<?=$date;?>" readonly>
                                        </div>
                                        <div class="col-lg-12">
                                            <strong class="text-muted d-block mb-2">Vehicle(s) involved in the incident</strong></div>
                                        <div class="form-row">

                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Vehicle 1</span>
                                                </div>

                                                <input type="text" class="form-control" name="v1" value="<?=$vehicle1;?>" placeholder="Reg No" readonly>
                                            </div>

                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Make</span>
                                                </div>

                                                <input type="text" class="form-control" value="<?=$make1;?>"  name="m1" placeholder="Select type" readonly>
                                            </div>
                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Vehicle 2</span>
                                                </div>

                                                <input type="text" class="form-control" name="v2" value="<?=$vehicle2;?>" placeholder="Reg No" readonly>
                                            </div>

                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Make</span>
                                                </div>


                                                <input type="text" class="form-control" name="m2" value="<?=$make2;?>"  placeholder="Select Type" readonly>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Name of police station reported</span>
                                                </div>
                                                <input type="text" class="form-control" name="station" placeholder="" aria-label="Name of insurance company" aria-describedby="basic-addon1" readonly>
                                            </div>
                                            <div class="col-lg-12">
                                                <strong class="text-muted d-block mb-2">Vehicle Owners</strong></div>


                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Owner 1</span>
                                                </div>

                                                <input type="text" class="form-control" value="<?=$owner1;?>"  name="owner1" placeholder="Name" readonly>
                                            </div>

                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">ID No</span>
                                                </div>


                                                <input type="number" class="form-control" name="idno1" value="<?=$id1;?>"placeholder="" readonly>
                                            </div>
                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Owner 2</span>
                                                </div>

                                                <input type="text" class="form-control" name="" value="<?=$owner2;?>" placeholder="Name" readonly>
                                            </div>

                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">ID No</span>
                                                </div>


                                                <input type="number" class="form-control" name="idno2" value="<?=$id2;?>"placeholder="" readonly>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Name of the insurance company</span>
                                            </div>
                                            <input type="text" class="form-control" name="company" value="<?=$company;?>" placeholder="" aria-label="Name of insurance company" aria-describedby="basic-addon1" readonly>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Has the investigation been completed?</span>
                                            </div>
                                            <input type="text" class="form-control" name="rule" placeholder=""value="<?=$complete;?>" aria-label="Name of insurance company" aria-describedby="basic-addon1" readonly>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Has anyone been charged?</span>
                                            </div>
                                            <input type="text" class="form-control" name="rule" placeholder=""value="<?=$charge;?>" aria-label="Name of insurance company" aria-describedby="basic-addon1" readonly>
                                        </div>

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Traffic rule violated?</span>
                                            </div>
                                            <input type="text" class="form-control" name="rule" placeholder=""value="<?=$rule;?>" aria-label="Name of insurance company" aria-describedby="basic-addon1" readonly>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Number of persons injured if any</span>
                                            </div>
                                            <input type="number" class="form-control" name="injuries" value="<?=$injuries;?>" placeholder="" aria-label="Name of insurance company" aria-describedby="basic-addon1" readonly>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Number fatalities if any</span>
                                            </div>
                                            <input type="number" class="form-control" name="fatalities" value="<?=$fatalities;?>" placeholder="" aria-label="Name of insurance company" aria-describedby="basic-addon1" readonly>
                                        </div>
                                        <div class="col-lg-12">
                                            <strong class="text-muted d-block mb-2">Names of witness(es)</strong></div>

                                        <div class="form-group input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Witness 1</span>
                                            </div>

                                            <input type="text" class="form-control" name="witness1" value="<?=$witness1;?>" placeholder="Full names of witness" readonly>
                                        </div>
                                       

                                        <div class="form-group  input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Witness 2</span>
                                            </div>


                                            <input type="text" class="form-control" value="<?=$witness2;?>" name="witness2" placeholder="Full names of witness" readonly>
                                        </div>
                                      

                                        <!-- Input Groups -->
                                        <!-- Seamless Input Groups -->

                                        <!-- / Input/Button Group -->
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!-- / Input & Button Groups -->

                    </div>
                </div>


                <?php 
    include '../includes/footer.php'; 
   
    ?>
