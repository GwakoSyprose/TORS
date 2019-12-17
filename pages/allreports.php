<?php include '../includes/head.php';
include('../includes/connection.php');


//PSVs
$octqp=mysqli_query($link, "SELECT offences.offenceID, drivers.typeID, incidences.recDate FROM ((offences INNER JOIN drivers ON offences.driverID = drivers.driverID) INNER JOIN incidences ON offences.offenceID = incidences.offenceID) WHERE typeID=1 AND MONTH(recDate)=10");
$octPno=mysqli_num_rows($octqp);

$novqp=mysqli_query($link, "SELECT offences.offenceID, drivers.typeID, incidences.recDate FROM ((offences INNER JOIN drivers ON offences.driverID = drivers.driverID) INNER JOIN incidences ON offences.offenceID = incidences.offenceID) WHERE typeID=1 AND MONTH(recDate)=11");
$novPno=mysqli_num_rows($novqp);

$decqp=mysqli_query($link, "SELECT offences.offenceID, drivers.typeID, incidences.recDate FROM ((offences INNER JOIN drivers ON offences.driverID = drivers.driverID) INNER JOIN incidences ON offences.offenceID = incidences.offenceID) WHERE typeID=1 AND MONTH(recDate)=12");
$decPno=mysqli_num_rows($decqp);

//motor
$octqm=mysqli_query($link, "SELECT offences.offenceID, drivers.typeID, incidences.recDate FROM ((offences INNER JOIN drivers ON offences.driverID = drivers.driverID) INNER JOIN incidences ON offences.offenceID = incidences.offenceID) WHERE typeID=4 AND MONTH(recDate)=10");
$octMno=mysqli_num_rows($octqm);

$novqm=mysqli_query($link, "SELECT offences.offenceID, drivers.typeID, incidences.recDate FROM ((offences INNER JOIN drivers ON offences.driverID = drivers.driverID) INNER JOIN incidences ON offences.offenceID = incidences.offenceID) WHERE typeID=4 AND MONTH(recDate)=11");
$novMno=mysqli_num_rows($novqm);

$decqm=mysqli_query($link, "SELECT offences.offenceID, drivers.typeID, incidences.recDate FROM ((offences INNER JOIN drivers ON offences.driverID = drivers.driverID) INNER JOIN incidences ON offences.offenceID = incidences.offenceID) WHERE typeID=4 AND MONTH(recDate)=12");
$decMno=mysqli_num_rows($decqm);

//personal
$octqps=mysqli_query($link, "SELECT offences.offenceID, drivers.typeID, incidences.recDate FROM ((offences INNER JOIN drivers ON offences.driverID = drivers.driverID) INNER JOIN incidences ON offences.offenceID = incidences.offenceID) WHERE typeID=2 AND MONTH(recDate)=10");
$octPsno=mysqli_num_rows($octqps);

$novqps=mysqli_query($link, "SELECT offences.offenceID, drivers.typeID, incidences.recDate FROM ((offences INNER JOIN drivers ON offences.driverID = drivers.driverID) INNER JOIN incidences ON offences.offenceID = incidences.offenceID) WHERE typeID=2 AND MONTH(recDate)=11");
$novPsno=mysqli_num_rows($novqps);

$decqps=mysqli_query($link, "SELECT offences.offenceID, drivers.typeID, incidences.recDate FROM ((offences INNER JOIN drivers ON offences.driverID = drivers.driverID) INNER JOIN incidences ON offences.offenceID = incidences.offenceID) WHERE typeID=2 AND MONTH(recDate)=12");
$decPsno=mysqli_num_rows($decqps);

//org
$octqo=mysqli_query($link, "SELECT offences.offenceID, drivers.typeID, incidences.recDate FROM ((offences INNER JOIN drivers ON offences.driverID = drivers.driverID) INNER JOIN incidences ON offences.offenceID = incidences.offenceID) WHERE typeID=3 AND MONTH(recDate)=10");
$octOno=mysqli_num_rows($octqo);

$novqo=mysqli_query($link, "SELECT offences.offenceID, drivers.typeID, incidences.recDate FROM ((offences INNER JOIN drivers ON offences.driverID = drivers.driverID) INNER JOIN incidences ON offences.offenceID = incidences.offenceID) WHERE typeID=3 AND MONTH(recDate)=11");
$novOno=mysqli_num_rows($novqo);

$decqo=mysqli_query($link, "SELECT offences.offenceID, drivers.typeID, incidences.recDate FROM ((offences INNER JOIN drivers ON offences.driverID = drivers.driverID) INNER JOIN incidences ON offences.offenceID = incidences.offenceID) WHERE typeID=3 AND MONTH(recDate)=12");
$decOno=mysqli_num_rows($decqo);

//trucks
$octqt=mysqli_query($link, "SELECT offences.offenceID, drivers.typeID, incidences.recDate FROM ((offences INNER JOIN drivers ON offences.driverID = drivers.driverID) INNER JOIN incidences ON offences.offenceID = incidences.offenceID) WHERE typeID=5 AND MONTH(recDate)=10");
$octTno=mysqli_num_rows($octqt);

$novqt=mysqli_query($link, "SELECT offences.offenceID, drivers.typeID, incidences.recDate FROM ((offences INNER JOIN drivers ON offences.driverID = drivers.driverID) INNER JOIN incidences ON offences.offenceID = incidences.offenceID) WHERE typeID=5 AND MONTH(recDate)=11");
$novTno=mysqli_num_rows($novqt);

$decqt=mysqli_query($link, "SELECT offences.offenceID, drivers.typeID, incidences.recDate FROM ((offences INNER JOIN drivers ON offences.driverID = drivers.driverID) INNER JOIN incidences ON offences.offenceID = incidences.offenceID) WHERE typeID=5 AND MONTH(recDate)=12");
$decTno=mysqli_num_rows($decqt);


$queryN=mysqli_query($link, "SELECT * FROM notifications WHERE regionID=1");
$nai=mysqli_num_rows($queryN);

$queryC=mysqli_query($link, "SELECT * FROM notifications WHERE regionID=2");
$coast=mysqli_num_rows($queryC);

$queryT=mysqli_query($link, "SELECT * FROM notifications WHERE regionID=3");
$central=mysqli_num_rows($queryT);

$queryE=mysqli_query($link, "SELECT * FROM notifications WHERE regionID=4");
$eastern=mysqli_num_rows($queryE);

$queryR=mysqli_query($link, "SELECT * FROM notifications WHERE regionID=5");
$valley=mysqli_num_rows($queryR);

$queryW=mysqli_query($link, "SELECT * FROM notifications WHERE regionID=6");
$western=mysqli_num_rows($queryW);


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
                                <h5>Reports</h5>


                            </span>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12 mb-4" id="divid">
                            <div class="card card-small h-100">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Offences by Vehicle Types for the year 2019</h6>
                                    <div style="float:right;"><a href="" onclick="printContent('divid');">Download PDF</a></div>

                                </div>
                                <div class="card-body d-flex py-0">
                                    <canvas height="220" id="myChart"></canvas>

                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12 mb-4">
                            <div class="card card-small h-100">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Incidents reported per Region</h6>
                                </div>
                                <div class="card-body d-flex py-0">
                                    <canvas height="220" width="990" id="bChart"></canvas>

                                </div>

                            </div>
                        </div>



                        <script>
                            var ctx = document.getElementById("myChart").getContext('2d');

                            var myChart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"],
                                    datasets: [{
                                            label: 'PSVs', // Name the serie
                                            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, <?php echo $octPno; ?>, <?php echo $novPno;?>, <?php echo $decPno; ?>], // Specify the data values array
                                            fill: false,
                                            borderColor: '#2196f3', // Add custom color border (Line)
                                            backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
                                            borderWidth: 1 // Specify bar border width
                                        },
                                        {
                                            label: 'Personal Vehicles', // Name the series
                                            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, <?php echo $octPsno; ?>, <?php echo $novPsno; ?>, <?php echo $decPsno; ?>], // Specify the data values array
                                            fill: false,
                                            borderColor: '#4CAF50', // Add custom color border (Line)
                                            backgroundColor: '#4CAF50', // Add custom color background (Points and Fill)
                                            borderWidth: 1 // Specify bar border width
                                        },
                                        {
                                            label: 'Motorcycles', // Name the series
                                            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, <?php echo $octMno; ?>, <?php echo $novMno; ?>, <?php echo $decMno; ?>], // Specify the data values array
                                            fill: false,
                                            borderColor: '#e3f542', // Add custom color border (Line)
                                            backgroundColor: '#e3f542', // Add custom color background (Points and Fill)
                                            borderWidth: 1 // Specify bar border width
                                        },
                                        {
                                            label: 'Organizations', // Name the series
                                            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, <?php echo $octOno; ?>, <?php echo $novOno; ?>, <?php echo $decOno; ?>], // Specify the data values array
                                            fill: false,
                                            borderColor: '#f542ec', // Add custom color border (Line)
                                            backgroundColor: '#f542ec', // Add custom color background (Points and Fill)
                                            borderWidth: 1 // Specify bar border width
                                        }, {
                                            label: 'Trucks', // Name the series
                                            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, <?php echo $octTno; ?>, <?php echo $novTno; ?>, <?php echo $decTno;?>], // Specify the data values array
                                            fill: false,
                                            borderColor: 'red', // Add custom color border (Line)
                                            backgroundColor: 'red', // Add custom color background (Points and Fill)
                                            borderWidth: 1 // Specify bar border width
                                        }
                                    ]
                                },

                                options: {
                                    scales: {

                                        yAxes: [{
                                            display: true,
                                            ticks: {
                                                beginAtZero: true,
                                                steps: 10,
                                                stepValue: 5,
                                                max: 50
                                            }
                                        }]
                                    },
                                    responsive: true, // Instruct chart js to respond nicely.
                                    maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
                                }
                            });
                            //bar chart
                            var ctx = document.getElementById("bChart");
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ["Nairobi", "Coast", "Central", "Eastern", "Rift Valley", "Western"],
                                    datasets: [{
                                        label: 'No of Offenders',
                                        data: [<?php echo $nai; ?>, <?php echo $coast; ?>, <?php echo $central; ?>, <?php echo $eastern; ?>, <?php echo $valley; ?>, <?php echo $western; ?>],
                                        backgroundColor: [

                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255,99,132,1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: false,
                                    scales: {
                                        xAxes: [{
                                            ticks: {
                                                maxRotation: 90,
                                                minRotation: 80
                                            }
                                        }],
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });

                        </script>



                    </div>
                    <!-- End Page Header -->

                    <!-- Small Stats Blocks -->

                </div>

                <?php 
    include '../includes/footer.php'; 
   
    ?>
