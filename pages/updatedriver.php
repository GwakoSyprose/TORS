<?php
include  ('../includes/connection.php');
include '../includes/head.php';


include $_SERVER['DOCUMENT_ROOT'] . '/TORS/includes/connection.php';

if (isset($_GET['pid'])) {
$id = $_GET['pid'];
$query = "SELECT * FROM drivers WHERE driverID = $id";
$result = mysqli_query($link, $query);
$driver= mysqli_fetch_assoc($result);


}


?>




<body class="h-100">

    <div class="container-fluid">
        <div class="row">
            <!-- Main Sidebar -->
                       <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    <div class="main-navbar">
        <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                    <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;"
                        src="images/shards-dashboards-logo.svg" alt="Shards Dashboard">
                    <span class="d-none d-md-inline ml-1">Traffic Offenders System</span>
                </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
            </a>
        </nav>
    </div>
    <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
        <div class="input-group input-group-seamless ml-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <input class="navbar-search form-control" type="text" placeholder="Search for something..."
                aria-label="Search">
        </div>
    </form>
    <div class="nav-wrapper" style="background-color:#262626;">
        <ul class="nav flex-column" style="border: none;">
            <li class="nav-item text-center " style="background-color: transparent;">
                <a class="nav-link text-white" href="">

                    <h6 style="color:#ffff;">DASHBOARD</h6>

                </a>
            </li>
      

            <li class="nav-item" style="background-color: transparent;">
                <a class="nav-link " style="border-bottom: 0px;" href="">

                    <button class="btn btn-light col text-center">Personal Details</button>
                </a>
            </li>

           
           
            


        </ul>
    </div>
</aside>
            <!-- End Main Sidebar -->
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">

                <!-- / .main-navbar -->
                <div class="main-content-container container-fluid px-4">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">Overview</span>
                            <h6 class="page-title">Profile

                            </h6>

                        </div>
                    </div>
                    <div class="container">
                        <div class="view-account">
                            <section class="module">
                                <div class="module-inner">



                                    <form class="form-horizontal">
                                        <fieldset class="fieldset">
                                            <h6 class="fieldset-title">Personal Info</h6>
                                            <div class="form-group avatar">
                                                <figure class="figure col-md-2 col-sm-3 col-xs-12">
                                                   <?php
                                    
                                    echo "<img src='images/".$driver['profileImage']."' width=200 height=200 >";
                                    
                                     ?>
                                                </figure>
                                                <div class="form-inline col-md-10 col-sm-9 col-xs-12">
                                                    <input type="file" class="file-uploader pull-left">
                                                    <button type="submit" class="btn btn-sm btn-default-alt pull-left">Update Image</button>
                                                </div>
                                            </div>
                                           

                                            <div class="form-group">
                                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">First Name</label>
                                                <div class="col-md-10 col-sm-9 col-xs-12">
                                                    <input type="text" class="form-control" value="<?=$driver['dfname'] ;?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Last Name</label>
                                                <div class="col-md-10 col-sm-9 col-xs-12">
                                                    <input type="text" class="form-control" value="<?=$driver['dlname'] ;?>">
                                                </div>
                                            </div>
                                            
                                        </fieldset>
                                        <fieldset class="fieldset">
                                            <h3 class="fieldset-title">Contact Info</h3>
                                            <div class="form-group">
                                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Email</label>
                                                <div class="col-md-10 col-sm-9 col-xs-12">
                                                    <input type="email" class="form-control" value="Rebecca@website.com">
                                                    <p class="help-block">This is the email </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Twitter</label>
                                                <div class="col-md-10 col-sm-9 col-xs-12">
                                                    <input type="text" class="form-control" value="SpeedyBecky">
                                                    <p class="help-block">Your twitter username</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2  col-sm-3 col-xs-12 control-label">Linkedin</label>
                                                <div class="col-md-10 col-sm-9 col-xs-12">
                                                    <input type="url" class="form-control" value="https://www.linkedin.com/in/lorem">
                                                    <p class="help-block">eg. https://www.linkedin.com/in/yourname</p>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <hr>
                                        <div class="form-group">
                                            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                                <input class="btn btn-primary" type="submit" value="Update Profile">
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </section>
                        </div>
                    </div>

                </div>


                <?php 
    include '../includes/footer.php'; 
   
    ?>
