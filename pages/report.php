<?php
include '../includes/connection.php';
include '../includes/head.php';



if(array_key_exists("submit" , $_POST)) {

  

   if(mysqli_connect_error()) {

    die ("Database Connection Error!");
   }
    // Escape user inputs for security
    else
   {
        
    $date = mysqli_real_escape_string($link, $_POST['date']);
    $vehicle1 = mysqli_real_escape_string($link, $_POST['v1']);
    $make1 = mysqli_real_escape_string($link, $_POST['m1']);
    $vehicle2 = mysqli_real_escape_string($link, $_POST['v2']);
    $make2 = mysqli_real_escape_string($link, $_POST['m2']);
    $owner1 = mysqli_real_escape_string($link, $_POST['owner1']);
    $id1= mysqli_real_escape_string($link, $_POST['idno1']);
    $owner2= mysqli_real_escape_string($link, $_POST['owner2']);
    $id2= mysqli_real_escape_string($link, $_POST['idno2']);   
    $company= mysqli_real_escape_string($link, $_POST['company']);   
    $complete = mysqli_real_escape_string($link, $_POST['ans']);
    $charge = mysqli_real_escape_string($link, $_POST['ans2']);
    $rule = mysqli_real_escape_string($link, $_POST['rule']);
    $injuries = mysqli_real_escape_string($link, $_POST['injuries']);
    $fatalities = mysqli_real_escape_string($link, $_POST['fatalities']);
    $witness1 = mysqli_real_escape_string($link, $_POST['witness1']);
    $witness2 = mysqli_real_escape_string($link, $_POST['witness2']);
    $notID=mysqli_real_escape_string($link, $_POST['custId']);
        
        
         $query = "INSERT INTO reports(`date`,`notificationID`,`vehicle1`,`vehicle2`, `make`, `make2`, `owner`, `owner2`, `ownerid1`, `ownerid2`,`insurance`,`investigationstatus`,`charged`,`ruleviolated`,`injuredpersons`,`fatalities`,`witness1`,`witness2`,`status`)
            VALUES ('$date','$notID','$vehicle1','$vehicle2','$make1','$make2','$owner1','$owner2','$id1','$id2','$company','$complete','$charge','$rule','$injuries','$fatalities','$witness1','$witness2','1')";
        $sql= mysqli_query($link, $query);

        
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
                        <div class="col-12 col-sm-12 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">The Kenyan Police</span>
                            <h3 class="page-title">Abstract from police on a road accident</h3>

                        </div>
                    </div>
                    <div class="row">
                        <!-- Input & Button Groups -->
                        <div class="card card-small mb-4 col-lg-12">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">Fill in the incident details</h6>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-3">
                                    <form action="report.php" method="post">

                                        <strong class="text-muted d-block mb-2">Police Info</strong>


                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Date of the incident</span>
                                            </div>
                                            <input type="date" name="date" class="form-control" aria-describedby="basic-addon1" value="<?=(date('Y-m-d'))?>">
                                        </div>
                                        <div class="col-lg-12">
                                            <strong class="text-muted d-block mb-2">Vehicle(s) involved in the incident</strong></div>
                                        <div class="form-row">

                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Vehicle 1</span>
                                                </div>

                                                <input type="text" class="form-control" name="v1" placeholder="Reg No" required>
                                            </div>

                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Make</span>
                                                </div>

                                                <input type="text" class="form-control" name="m1" placeholder="Select type" required>
                                            </div>
                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Vehicle 2</span>
                                                </div>

                                                <input type="text" class="form-control" name="v2" placeholder="Reg No" required>
                                            </div>

                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Make</span>
                                                </div>


                                                <input type="text" class="form-control" name="m2" placeholder="Select Type" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Name of police station reported</span>
                                                </div>
                                                <input type="text" class="form-control" name="station" placeholder="" aria-label="Name of insurance company" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="col-lg-12">
                                                <strong class="text-muted d-block mb-2">Vehicle Owners</strong></div>


                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Owner 1</span>
                                                </div>

                                                <input type="text" class="form-control" name="owner1" placeholder="Name" required>
                                            </div>

                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">ID No</span>
                                                </div>


                                                <input type="number" class="form-control" name="idno1" placeholder="" required>
                                            </div>
                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Owner 2</span>
                                                </div>

                                                <input type="text" class="form-control" name="owner2" placeholder="Name" required>
                                            </div>

                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">ID No</span>
                                                </div>


                                                <input type="number" class="form-control" name="idno2" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Name of the insurance company</span>
                                            </div>
                                            <input type="text" class="form-control" name="company" placeholder="" aria-label="Name of insurance company" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Has the investigation been completed?</span>
                                            </div>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" Value="yes" id="inlineCheckbox1" name="ans" >
                                                <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" Value="no" name="ans" id="inlineCheckbox2" >
                                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Has anyone been charged?</span>
                                            </div>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="ans2"  Value="yes" id="inlineCheckbox1" >
                                                <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="ans2" Value="no" id="inlineCheckbox2">
                                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Traffic rule violated?</span>
                                            </div>
                                            <input type="text" class="form-control" name="rule" placeholder="" aria-label="Name of insurance company" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Number of persons injured if any</span>
                                            </div>
                                            <input type="number" class="form-control" name="injuries"  placeholder="" aria-label="Name of insurance company" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Number fatalities if any</span>
                                            </div>
                                            <input type="number" class="form-control" name="fatalities" placeholder="" aria-label="Name of insurance company" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="col-lg-12">
                                            <strong class="text-muted d-block mb-2">Names of witness(es)</strong></div>

                                        <div class="form-group input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Witness 1</span>
                                            </div>

                                            <input type="text" class="form-control" name="witness1" placeholder="Full names of witness" required>
                                        </div>
                                        <input type="hidden" id="" name="custId" value="<?=$_GET['not']?>;">

                                        <div class="form-group  input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Witness 2</span>
                                            </div>


                                            <input type="text" class="form-control" name="witness2" placeholder="Full names of witness" required>
                                        </div>
                                        <button type="submit" class="btn btn-success" name="submit">Submit</button>

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
