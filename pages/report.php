<?php
include '../includes/connection.php';
include '../includes/head.php'; 
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
                                    <form>
                                        
                                        <strong class="text-muted d-block mb-2">Police Info</strong>
                                     

                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Date of the incident</span>
                                            </div>
                                            <input type="text" class="form-control" aria-describedby="basic-addon1" value="<?=(date('Y-m-d'))?>">
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


                                                <input type="text" class="form-control" name="regno1" placeholder="Select type" required>
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


                                                <input type="text" class="form-control" name="regno1" placeholder="Select Type" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Name of police station reported</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="" aria-label="Name of insurance company" aria-describedby="basic-addon1">
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
                                                    <span class="input-group-text">Reg No</span>
                                                </div>


                                                <input type="text" class="form-control" name="regno1" placeholder="Reg no" required>
                                            </div>
                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Owner 2</span>
                                                </div>

                                                <input type="text" class="form-control" name="owner1" placeholder="Name" required>
                                            </div>

                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Reg No</span>
                                                </div>


                                                <input type="text" class="form-control" name="regno2" placeholder="Reg no" required>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Name of the insurance company</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="" aria-label="Name of insurance company" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Has the investigation been completed?</span>
                                            </div>
                                            <br>
                                               <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="inlineCheckbox1" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="inlineCheckbox2" value="option2">
                                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Has anyone been charged?</span>
                                            </div>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="inlineCheckbox1" value="option1">
                                                <label class="form-check-label" for="inlineCheckbox1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="inlineCheckbox2" value="option2">
                                                <label class="form-check-label" for="inlineCheckbox2">No</label>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Traffic rule violated?</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="" aria-label="Name of insurance company" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Number of persons injured if any</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="" aria-label="Name of insurance company" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Number fatalities if any</span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="" aria-label="Name of insurance company" aria-describedby="basic-addon1">
                                        </div>
                                         <div class="col-lg-12">
                                                <strong class="text-muted d-block mb-2">Names of witness(es)</strong></div>
                                        
                                               <div class="form-group input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Witness 1</span>
                                                </div>

                                                <input type="text" class="form-control" name="owner1" placeholder="Full names of witness" required>
                                            </div>

                                            <div class="form-group  input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Witness 2</span>
                                                </div>


                                                <input type="text" class="form-control" name="regno2" placeholder="Full names of witness"  required>
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
