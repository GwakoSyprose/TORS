<?php include '../includes/head.php';
include('../includes/connection.php');

//getting the number of psvs
 $querypsv=mysqli_query($link, "SELECT * FROM drivers WHERE typeID= 1");
    $psvno= mysqli_num_rows($querypsv);
//getting the number of motorcycles
 $querymotor=mysqli_query($link, "SELECT * FROM drivers WHERE typeID=4");
    $motorno= mysqli_num_rows($querymotor);
//getting the number of personal cars
 $querycar=mysqli_query($link, "SELECT * FROM drivers WHERE typeID=2");
    $carno= mysqli_num_rows($querycar);
//getting the number of organizations
 $queryorg=mysqli_query($link, "SELECT * FROM drivers WHERE typeID=3");
    $orgno= mysqli_num_rows($queryorg);
//getting the number of trucks
 $querytruck=mysqli_query($link, "SELECT * FROM drivers WHERE typeID=5");
    $truckno= mysqli_num_rows($querytruck);

//getting the number of active drivers
$queryactive=mysqli_query($link, "SELECT * FROM drivers WHERE status=0");
    $activeno= mysqli_num_rows($queryactive);
//getting the number of suspended drivers
 $querysus=mysqli_query($link, "SELECT * FROM drivers WHERE status=1");
    $susno= mysqli_num_rows($querysus);

//getting the top offender PSV
$qv= mysqli_query($link, "SELECT MAX(offenceCount) AS maxv FROM drivers WHERE typeID=1");
$arrayv= mysqli_fetch_assoc($qv); 
$maxV=$arrayv['maxv'];

$resultv =mysqli_query($link, "SELECT * FROM drivers WHERE offenceCount=$maxV");

$row = mysqli_fetch_assoc($resultv); 

$firstnamePSV = $row['dfname'];
$lastnamePSV = $row['dlname'];
//getting the top offender MOTORCYCLES`
$qm= mysqli_query($link, "SELECT MAX(offenceCount) AS maxm FROM drivers WHERE typeID=4");
$arraym= mysqli_fetch_assoc($qm); 
$maxM=$arraym['maxm'];

$resultm =mysqli_query($link, "SELECT * FROM drivers WHERE offenceCount=$maxM");


$rowm = mysqli_fetch_assoc($resultm); 

$firstnameMotor = $rowm['dfname'];
$lastnameMotor = $rowm['dlname'];
//getting the top offender PERSONAL
$qp= mysqli_query($link, "SELECT MAX(offenceCount) AS maxp FROM drivers WHERE typeID=2");
$arrayp= mysqli_fetch_assoc($qp); 
$maxP=$arrayp['maxp'];

$resultp =mysqli_query($link, "SELECT * FROM drivers WHERE offenceCount=$maxP");

$rowp = mysqli_fetch_assoc($resultp); 

$firstnamePersonal = $rowp['dfname'];
$lastnamePersonal = $rowp['dlname'];
//getting the top offender ORGANIZATION
$qo= mysqli_query($link, "SELECT MAX(offenceCount) AS maxo FROM drivers WHERE typeID=3");
$arrayo= mysqli_fetch_assoc($qo); 
$maxO=$arrayo['maxo'];

$resulto =mysqli_query($link, "SELECT * FROM drivers WHERE offenceCount=$maxO");


$rowo = mysqli_fetch_assoc($resulto); 

$firstnameOrg = $rowo['dfname'];
$lastnameOrg = $rowo['dlname'];
//getting the top offender TRUCKS
$qt= mysqli_query($link, "SELECT MAX(offenceCount) AS maxt FROM drivers WHERE typeID=5");
$arrayt= mysqli_fetch_assoc($qt); 
$maxT=$arrayt['maxt'];

$resultt =mysqli_query($link, "SELECT * FROM drivers WHERE offenceCount=$maxT");

$rowt = mysqli_fetch_assoc($resultt); 

$firstnameTruck = $rowt['dfname'];
$lastnameTruck = $rowt['dlname'];

//incidences monthly
$bjan='SELECT COUNT(incidentID) FROM incidences WHERE MONTH(recDate)=1 AND YEAR(recDate)=2019';
$bres1 =mysqli_query($link, $bjan);
$brow1 =mysqli_fetch_assoc($bres1);
$jan=$brow1['COUNT(incidentID)'];

$bfeb='SELECT COUNT(incidentID) FROM incidences WHERE MONTH(recDate)=2 AND YEAR(recDate)=2019';
$bres2 =mysqli_query($link,$bfeb);
$brow2 =mysqli_fetch_assoc($bres2);
$feb=$brow2['COUNT(incidentID)'];

$bmar='SELECT COUNT(incidentID) FROM incidences WHERE MONTH(recDate)=3 AND YEAR(recDate)=2019';
$bres3 =mysqli_query($link,$bmar);
$brow3 =mysqli_fetch_assoc($bres3);
$mar=$brow3['COUNT(incidentID)'];

$bapr='SELECT COUNT(incidentID) FROM incidences WHERE MONTH(recDate)=4 AND YEAR(recDate)=2019';
$bres4 =mysqli_query($link,$bapr);
$brow4 =mysqli_fetch_assoc($bres4);
$apr=$brow4['COUNT(incidentID)'];


$bmay='SELECT COUNT(incidentID) FROM incidences WHERE MONTH(recDate)=5 AND YEAR(recDate)=2019';
$bres5 =mysqli_query($link,$bmay);
$brow5 =mysqli_fetch_assoc($bres5);
$may=$brow5['COUNT(incidentID)'];

$bjun='SELECT COUNT(incidentID) FROM incidences WHERE MONTH(recDate)=6 AND YEAR(recDate)=2019';
$bres6 =mysqli_query($link,$bjun);
$brow6 =mysqli_fetch_assoc($bres6);
$jun=$brow6['COUNT(incidentID)'];

$bjul='SELECT COUNT(incidentID) FROM incidences WHERE MONTH(recDate)=7 AND YEAR(recDate)=2019';
$bres7 =mysqli_query($link,$bjul);
$brow7 =mysqli_fetch_assoc($bres7);
$july=$brow7['COUNT(incidentID)'];

$baug='SELECT COUNT(incidentID) FROM incidences WHERE MONTH(recDate)=8 AND YEAR(recDate)=2019';
$bres8 =mysqli_query($link,$baug);
$brow8 =mysqli_fetch_assoc($bres8);
$aug=$brow8['COUNT(incidentID)'];

$bsep='SELECT COUNT(incidentID) FROM incidences WHERE MONTH(recDate)=9 AND YEAR(recDate)=2019';
$bres9 =mysqli_query($link,$bsep);
$brow9 =mysqli_fetch_assoc($bres9);
$sep=$brow9['COUNT(incidentID)'];

$boct='SELECT COUNT(incidentID) FROM incidences WHERE MONTH(recDate)=10 AND YEAR(recDate)=2019';
$bres10 =mysqli_query($link,$boct);
$brow10 =mysqli_fetch_assoc($bres10);
$oct=$brow10['COUNT(incidentID)'];

$bnov='SELECT COUNT(incidentID) FROM incidences WHERE MONTH(recDate)=11 AND YEAR(recDate)=2019';
$bres11 =mysqli_query($link, $bnov);
$brow11 =mysqli_fetch_assoc($bres11);
$nov=$brow11['COUNT(incidentID)'];

$bdec='SELECT COUNT(incidentID) FROM incidences WHERE MONTH(recDate)=12 AND YEAR(recDate)=2019';
$bres12 =mysqli_query($link,$bdec);
$brow12 =mysqli_fetch_assoc($bres12);
$dec=$brow12['COUNT(incidentID)'];




?>


<body class="h-100">



    <div class="container-fluid">
        <div class="row">

            <?php include '../includes/sidenav.php'; ?>

            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">


                <?php include '../includes/navbar.php';?>
                <div class="main-content-container container-fluid px-4">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">
                                <h5>Dashboard</h5>

                            </span>


                        </div>
                    </div>
                    <!-- End Page Header -->

                    <!-- Small Stats Blocks -->
                    <div class="row">

                        <div class="col-lg col-md-4 col-sm-12 mb-4">
                            <div class="stats-small stats-small--1 card card-small" style="background-image: linear-gradient( 179.8deg,  rgba(0,116,117,1) 19.2%, rgba(232,232,232,1) 91.3% );">

                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label ">
                                                <h6 id="labels">PSVs</h6>
                                                </s #00cc7epan>
                                                <span> <i class='fas fa-shuttle-van' style='font-size:36px'></i></span>
                                                <h6 class="stats-small__value  my-3"><?php echo $psvno ?></h6>
                                                <span style="font-weight:450; overflow: hidden; white-space: nowrap;"><b>Top
                                                        Offender:</b><?= $firstnamePSV; ?> <?= $lastnamePSV; ?> </span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-md-4 col-sm-12 mb-4">
                            <div class="stats-small stats-small--1 card card-small" style="background-image: linear-gradient( 179.8deg,  rgba(0,116,117,1) 19.2%, rgba(232,232,232,1) 91.3% );">

                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label ">
                                                <h6 id="labels">PERSONALS</h6>
                                                </s #00cc7epan>
                                                <span> <i class='fas fa-car' style='font-size:36px'></i></span>
                                                <h6 class="stats-small__value my-3"><?php echo $carno ?></h6>
                                                <span style="font-weight:450; overflow: hidden; white-space: nowrap;"><b>Top
                                                        Offender:</b><?= $firstnamePersonal; ?>
                                                    <?= $lastnamePersonal; ?> </span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-md-4 col-sm-12 mb-4">
                            <div class="stats-small stats-small--1 card card-small" style="background-image: linear-gradient( 179.8deg,  rgba(0,116,117,1) 19.2%, rgba(232,232,232,1) 91.3% );">
                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label ">
                                                <h6 id="labels">ORGANIZATIONS</h6>
                                                </s #00cc7epan>
                                                <span> <i class='fas fa-ambulance' style='font-size:36px'></i></span>
                                                <h6 class="stats-small__value my-3"><?php echo $orgno ?></h6>
                                                <span style="font-weight:450; overflow: hidden; white-space: nowrap;"><b>Top
                                                        Offender:</b><?= $firstnameOrg; ?> <?= $lastnameOrg; ?> </span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-md-4 col-sm-12 mb-4">
                            <div class="stats-small stats-small--1 card card-small" style="background-image: linear-gradient( 179.8deg,  rgba(0,116,117,1) 19.2%, rgba(232,232,232,1) 91.3% );">
                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label ">
                                                <h6 id="labels">MOTORCYLCLES</h6>
                                                </s #00cc7epan>
                                                <span> <i class='fas fa-motorcycle' style='font-size:36px'></i></span>
                                                <h6 class="stats-small__value my-3"><?php echo $motorno ?></h6>
                                                <span style="font-weight:450; overflow: hidden; white-space: nowrap;"><b>Top
                                                        Offender:</b><?= $firstnameMotor; ?> <?= $lastnameMotor; ?>
                                                </span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg col-md-4 col-sm-12 mb-4">
                            <div class="stats-small stats-small--1 card card-small" style="background-image: linear-gradient( 179.8deg,  rgba(0,116,117,1) 19.2%, rgba(232,232,232,1) 91.3% );">
                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label ">
                                                <h6 id="labels">TRUCKS</h6>
                                                </s #00cc7epan>
                                                <span> <i class='fas fa-truck' style='font-size:36px'></i></span>
                                                <h6 class="stats-small__value  my-3"><?php echo $truckno ?></h6>
                                                <span style="font-weight:450; overflow: hidden; white-space: nowrap;"><b>Top
                                                        Offender:</b><?= $firstnameTruck; ?> <?= $lastnameTruck; ?>
                                                </span>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Small Stats Blocks -->
                    <div class="row">
                        <!-- Users Stats -->

                        <!-- End Users Stats -->
                        <!-- Users By Device Stats -->
                        <div class="col-lg-12 col-md-6 col-sm-12 mb-4">
                            <div class="card card-small h-100">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Monthly incidences recorded in 2019</h6>
                                </div>
                                <div class="card-body d-flex py-0">
                                    <canvas height="220" class="" id="myChart"></canvas>
                                </div>

                            </div>
                        </div>

                        <!-- End Users By Device Stats -->


                    </div>
                    <div class="row">
                        <!-- Users Stats -->
                        <div class="col-lg-4 col-md-12 col-sm-12 mb-4" style="display: none;">
                            <div class="card card-small">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Users</h6>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row border-bottom py-2 bg-light">
                                        <div class="col-12 col-sm-6">
                                            <div id="blog-overview-date-range" class="input-daterange input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0" style="max-width: 350px;">
                                                <input type="text" class="input-sm form-control" name="start" placeholder="Start Date" id="blog-overview-date-range-1">
                                                <input type="text" class="input-sm form-control" name="end" placeholder="End Date" id="blog-overview-date-range-2">
                                                <span class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="material-icons"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 d-flex mb-2 mb-sm-0">
                                            <button type="button" class="btn btn-sm btn-white ml-auto mr-auto ml-sm-auto mr-sm-0 mt-3 mt-sm-0">View
                                                Full Report &rarr;</button>
                                        </div>
                                    </div>
                                    <canvas height="220" style="max-width: 100% !important;" class="blog-overview-users"></canvas>
                                </div>

                            </div>
                        </div>
                        <!-- End Users Stats -->
                        <!-- Users By Device Stats -->
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <div class="card card-small h-100">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Drivers by Vehicle Type</h6>
                                </div>
                                <div class="card-body d-flex py-0">
                                    <canvas height="220" class="drivers-by-vehicletype"></canvas>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                            <div class="card card-small h-100">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Active vs Suspended Drivers</h6>
                                </div>
                                <div class="card-body d-flex py-0">
                                    <canvas height="220" class="active-vs-suspended"></canvas>
                                </div>

                            </div>
                        </div>
                        <!-- End Users By Device Stats -->


                    </div>

                </div>
                <script type="text/javascript">
                    var ctx = document.getElementById("myChart").getContext('2d');


                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ["Jan", "Feb", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                            datasets: [{
                                label: 'Series 1', // Name the series
                                data: [<?= $jan; ?>, <?= $feb; ?>, <?= $mar; ?>, <?= $apr; ?>, <?= $may; ?>, <?= $jun; ?>, <?= $july; ?>, <?= $aug; ?>, <?= $sep; ?>, <?= $oct; ?>, <?= $nov; ?>, <?= $dec; ?>], // Specify the data values array
                                fill: false,
                                borderColor: '#2196f3', // Add custom color border (Line)
                                backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
                                borderWidth: 1 // Specify bar border width
                            }]
                        },
                        options: {
                            responsive: true, // Instruct chart js to respond nicely.
                            maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
                        }
                    });

                </script>
                <script>
                    /*
 |--------------------------------------------------------------------------
 | Shards Dashboards: Blog Overview Template
 |--------------------------------------------------------------------------
 */

                    'use strict';

                    (function($) {
                        $(document).ready(function() {

                            // Blog overview date range init.
                            $('#blog-overview-date-range').datepicker({});

                            //
                            // Small Stats
                            //

                            // Datasets

                            //
                            // Blog Overview Users
                            //

                            var bouCtx = document.getElementsByClassName('blog-overview-users')[0];

                            // Data
                            var bouData = {
                                // Generate the days labels on the X axis.
                                labels: Array.from(new Array(12), function(_, i) {
                                    return i === 0 ? 1 : i;
                                }),
                                datasets: [{
                                    label: 'Current Month',
                                    fill: 'start',
                                    data: [500, 800, 320, 180, 240, 320, 230, 650, 590, 1200, 750,
                                        940
                                    ],
                                    backgroundColor: 'rgba(0,123,255,0.1)',
                                    borderColor: 'rgba(0,123,255,1)',
                                    pointBackgroundColor: '#ffffff',
                                    pointHoverBackgroundColor: 'rgb(0,123,255)',
                                    borderWidth: 1.5,
                                    pointRadius: 0,
                                    pointHoverRadius: 3
                                }, {
                                    label: 'Past Month',
                                    fill: 'start',
                                    data: [380, 430, 120, 230, 410, 740, 472, 219, 391, 229, 400,
                                        203
                                    ],
                                    backgroundColor: 'rgba(255,65,105,0.1)',
                                    borderColor: 'rgba(255,65,105,1)',
                                    pointBackgroundColor: '#ffffff',
                                    pointHoverBackgroundColor: 'rgba(255,65,105,1)',
                                    borderDash: [3, 3],
                                    borderWidth: 1,
                                    pointRadius: 0,
                                    pointHoverRadius: 2,
                                    pointBorderColor: 'rgba(255,65,105,1)'
                                }]
                            };

                            // Options
                            var bouOptions = {
                                responsive: true,
                                legend: {
                                    position: 'top'
                                },
                                elements: {
                                    line: {
                                        // A higher value makes the line look skewed at this ratio.
                                        tension: 0.3
                                    },
                                    point: {
                                        radius: 0
                                    }
                                },
                                scales: {
                                    xAxes: [{
                                        gridLines: false,
                                        ticks: {
                                            callback: function(tick, index) {
                                                // Jump every 7 values on the X axis labels to avoid clutter.
                                                return index % 1 !== 0 ? '' : tick;
                                            }
                                        }
                                    }],
                                    yAxes: [{
                                        ticks: {
                                            suggestedMax: 45,
                                            callback: function(tick, index, ticks) {
                                                if (tick === 0) {
                                                    return tick;
                                                }
                                                // Format the amounts using Ks for thousands.
                                                return tick > 999 ? (tick / 1000).toFixed(1) +
                                                    'K' : tick;
                                            }
                                        }
                                    }]
                                },
                                // Uncomment the next lines in order to disable the animations.
                                // animation: {
                                //   duration: 0
                                // },
                                hover: {
                                    mode: 'nearest',
                                    intersect: false
                                },
                                tooltips: {
                                    custom: false,
                                    mode: 'nearest',
                                    intersect: false
                                }
                            };

                            // Generate the Analytics Overview chart.
                            window.BlogOverviewUsers = new Chart(bouCtx, {
                                type: 'LineWithLine',
                                data: bouData,
                                options: bouOptions
                            });

                            // Hide initially the first and last analytics overview chart points.
                            // They can still be triggered on hover.
                            var aocMeta = BlogOverviewUsers.getDatasetMeta(0);
                            aocMeta.data[0]._model.radius = 0;
                            aocMeta.data[bouData.datasets[0].data.length - 1]._model.radius = 0;

                            // Render the chart.
                            window.BlogOverviewUsers.render();

                            //
                            // Users by device pie chart
                            //

                            // Data
                            var ubdData = {
                                datasets: [{
                                    hoverBorderColor: '#ffffff',
                                    data: [<?php echo $psvno; ?>, <?php echo $motorno; ?>, <?php echo $orgno; ?>, <?php echo $truckno; ?>, <?php echo $carno; ?>],
                                    backgroundColor: [
                                        '#ffb3b3',
                                        '#ff6666',
                                        '#ff4d4d',
                                        '#ffe6e6',
                                        '#ff9999'
                                    ]
                                }],
                                labels: ["PSVs", "Motorcycles", "Organizations", "Trucks", "Personal Cars"]
                            };

                            // Options
                            var ubdOptions = {
                                legend: {
                                    position: 'bottom',
                                    labels: {
                                        padding: 10,
                                        boxWidth: 20
                                    }
                                },
                                cutoutPercentage: 0,
                                // Uncomment the following line in order to disable the animations.
                                // animation: false,
                                tooltips: {
                                    custom: false,
                                    mode: 'index',
                                    position: 'nearest'
                                }
                            };

                            var ubdCtx = document.getElementsByClassName('drivers-by-vehicletype')[0];

                            // Generate the users by device chart.
                            window.ubdChart = new Chart(ubdCtx, {
                                type: 'pie',
                                data: ubdData,
                                options: ubdOptions
                            });


                            var ubdData = {
                                datasets: [{
                                    hoverBorderColor: '#ffffff',
                                    data: [<?php echo $activeno; ?>, <?php echo $susno; ?>],
                                    backgroundColor: [
                                        '#ffe6e6',
                                        '#ff9999'
                                    ]
                                }],
                                labels: ["Active", "Suspended"]
                            };

                            // Options
                            var ubdOptions = {
                                legend: {
                                    position: 'bottom',
                                    labels: {
                                        padding: 10,
                                        boxWidth: 20
                                    }
                                },
                                cutoutPercentage: 0,
                                // Uncomment the following line in order to disable the animations.
                                // animation: false,
                                tooltips: {
                                    custom: false,
                                    mode: 'index',
                                    position: 'nearest'
                                }
                            };

                            var ubdCtx = document.getElementsByClassName('active-vs-suspended')[0];

                            // Generate the users by device chart.
                            window.ubdChart = new Chart(ubdCtx, {
                                type: 'pie',
                                data: ubdData,
                                options: ubdOptions
                            });

                        });
                    })(jQuery);

                </script>
                <?php 
    include '../includes/footer.php'; 
   
    ?>
