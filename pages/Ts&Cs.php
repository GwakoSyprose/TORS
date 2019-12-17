<?php 
    include '../includes/connection.php'; 

    

    include '../includes/driverhead.php'; 
    


    ?>


<body class="h-100">

    <div class="container-fluid">
        <div class="row">
            <!-- Main Sidebar -->
            <?php include '../includes/driverside.php'; ?>
            <!-- End Main Sidebar -->
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <?php include '../includes/drivernav.php'; ?>
                <!-- / .main-navbar -->
                <div class="main-content-container container-fluid px-4">
                    <!-- Page Header -->

                    <div class="page-header row no-gutters py-4">

                        Terms and Conditions
                    </div>

                    <div class="row">
                        <!-- Input & Button Groups -->
                        <div class="card card-small mb-4 col-lg-12">
                            <h4>How the demerit system works:</h4>
                            <p>Every driver starts off with a clean slate of zero points, however, if you get 12 points, your licence will be suspended for a period of three months. If you exceed three suspensions you could lose your licence permanently and if a licence has been suspended for the third time, it can be cancelled.</p>

                            <p>Points work on an accumulative basis with a different number of points assigned to specific traffic infringements, together with a fine.If you have accrued points and if don’t have any further traffic violations within a three-month period, one point will be removed every three months.

                                <h4>These are the amount of points allocated for various offenses:</h4>
                                <ul>
                                    <li>Driving without a licence equals four demerit points</li>
                                    <li>Driving under the influence of an intoxicating substance will be six demerit points (determined by court)</li>
                                    <li>Using and holding cell phone while driving will be one demerit point</li>
                                    <li>Speeding can be anywhere from two to six points depending on the speed limit (determined by court)</li>
                                    <li>Skipping a stop sign (light vehicles) is one demerit point and for buses and trucks it is two points.</li>
                                </ul>

                        </div>

                    </div>
                    <!-- / Input & Button Groups -->

                </div>




                <?php include '../includes/footer.php'; ?>
