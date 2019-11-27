<?php
include  ('../includes/connection.php');
    
    $typeid= $_GET['typeid'];
    $queryactive=mysqli_query($link, "SELECT * FROM drivers WHERE typeID= '$typeid' AND  status=0  ");
    $querysus=mysqli_query($link, "SELECT * FROM drivers WHERE typeID= '$typeid' AND   status=1 ");
   
?>


<?php include '../includes/head.php'; ?>

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
                            <h6 class="page-title">
                                <?php 
                            if($typeid==1){
                                echo "PSV";
                            }elseif($typeid==2){
                                echo "PERSONAL VEHICLES";
                            }elseif($typeid==3){
                                echo "ORGANIZATIONS";
                            }elseif($typeid==4){
                                echo "MOTORCYCLES";
                            }elseif($typeid==5){
                                echo "TRUCKS";
                            }?>
                            </h6>

                        </div>
                    </div>
                    <!-- Navigation tabs -->

                    <ul class="nav nav-tabs" id="activeTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="activeTab" data-toggle="tab" href="#active" role="tab" aria-controls="home" aria-selected="true">Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="suspendedTab" data-toggle="tab" href="#suspended" role="tab" aria-controls="profile" aria-selected="false">Suspended</a>
                        </li>

                    </ul>

                    <div class="tab-content">

                        <!-- active drivers -->
                        <div id="active" class="tab-pane active">
                            <!-- Default Light Table -->
                            <div class="row" id="activeTable">



                                <div class="table-responsive table-responsive-data2">
                                    <table id="example" class="mdl-data-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Driver ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Licence No</th>
                                                <th>Offence Count</th>
                                                <th>Registration Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                    while($result = mysqli_fetch_assoc($queryactive)) :
                            $id=$result['driverID'];
                            $dfname=$result['dfname'];
                            $dlname=$result['dlname'];
                            $licence=$result['licence'];
                            $status=$result['status'];
                            $count=$result['offenceCount'];
                            $date=$result['regDate'];
                        ?>
                                            <tr class="tr-shadow">

                                                <td id="id"><?php echo $id; ?></td>
                                                <td id="name"><?php echo $dfname; ?></td>

                                                <td id="name"><?php echo $dlname; ?></td>
                                                <td id="license"><?php echo $licence ?></td>

                                                <td id="count"><?php echo $count ?> </td>

                                                <td id="date"><?php echo $date ?> </td>
                                                 <td id="date"><a data-toggle="modal" data-target="#centralModalWarning" onclick="detailsmodal(<?=$result['driverID']; ?>)"><button class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i>View</button> </a></td>

                                                <?php endwhile; ?>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <!-- End Default Light Table -->
                        </div>

                        <div id="suspended" class="tab-pane fade">
                            <!-- Default Dark Table -->
                            <div class="row" id="suspendedTable">

                                <div class="table-responsive table-responsive-data2">
                                    <table id="example" class="mdl-data-table suspended" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Driver ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Licence No</th>
                                                <th>Offence Count</th>
                                                <th>Registration Date</th>
                                                <th>Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                    while($result = mysqli_fetch_assoc($querysus)) :
                            $id=$result['driverID'];
                            $dfname=$result['dfname'];
                            $dlname=$result['dlname'];
                            $licence=$result['licence'];
                            $status=$result['status'];
                            $count=$result['offenceCount'];
                            $date=$result['regDate'];
                        ?>
                                            <tr class="tr-shadow">

                                                <td id="id"><?php echo $id; ?></td>
                                                <td id="name"><?php echo $dfname; ?></td>

                                                <td id="name"><?php echo $dlname; ?></td>
                                                <td id="license"><?php echo $licence ?></td>

                                                <td id="count"><?php echo $count ?> </td>

                                                <td id="date"><?php echo $date ?> </td>
                                                 <td id="date"><a data-toggle="modal" data-target="#centralModalWarning" onclick="detailsmodal(<?=$result['driverID']; ?>)"><button class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i>View</button> </a></td>

                                                <?php endwhile; ?>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- End Default Dark Table -->


                        </div>

                        <!-- End Page Header -->


                    </div>

                    <script>
                        //ajax call,send JSON file
                        function detailsmodal(id) {
                            var data = {
                                "id": id
                            }; //setting object data and passing id 
                            jQuery.ajax({
                                url: 'viewmodal.php',
                                method: "post",
                                data: data,
                                success: function(data) {
                                    jQuery('body').append(data); //add html from detailsmodal page
                                    jQuery('#centralModalWarning').modal('toggle') //select details modal and open/toggle
                                },
                                error: function() {
                                    alert("something went wrong!")
                                }
                            });
                        }

                    </script>
                   
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#example').DataTable({
                                "lengthChange": false,
                                columnDefs: [{
                                    targets: [0, 1, 2],
                                    className: 'mdl-data-table__cell--non-numeric'
                                }]
                            });
                        });

                      
                    </script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('.suspended').DataTable({
                                "lengthChange": false,
                                columnDefs: [{
                                    targets: [0, 1, 2],
                                    className: 'mdl-data-table__cell--non-numeric'
                                }]
                            });
                        });

                      
                    </script>
                    


                    <script>
                        jQuery(document).ready(function($) {
                            $('*[data-href]').on('click', function() {
                                window.location = $(this).data("href");
                            });
                        });

                    </script>
                    <?php 
    include '../includes/footer.php'; 
   ?>
