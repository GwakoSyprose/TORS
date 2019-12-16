
<?php 

include ('../includes/head.php');
require '../checkadmin.php';

      include ('../includes/connection.php');

    $queryofficer=mysqli_query($link, "SELECT * FROM drivers INNER JOIN TYPES ON types.typeID = drivers.typeID");
    // sql query statement that selects all registered users

  //Delete category
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
  $delete_id=(int)$_GET['delete'];
  $sql="DELETE FROM drivers WHERE driverID='$delete_id'";
  $link->query($sql);
  header('Location: adminhome.php');

}
   

?>


<body class="h-100">



    <div class="container-fluid">
        <div class="row">

            <?php include ('../includes/adminsidenav.php'); ?>

            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">


                <?php include ('../includes/navbar.php');?>
                <div class="main-content-container container-fluid px-4">
                   

                      <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">Drivers Accounts</span>
                            <h3 class="page-title">Registered Drivers</h3>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <!-- Default Light Table -->


                    <div class="row">
                        <div class="col">
                            <div class="card card-small mb-4">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Current Users</h6>
                                </div>
                                <div class="card-body p-0 pb-3 text-center">


                                    <table class="table mb-0" id="drivers">
                                        <thead class="bg-light">
                                            <tr>

                                                <th scope="col" class="border-0">National ID</th>
                                                <th scope="col" class="border-0">First Name</th>
                                                <th scope="col" class="border-0">Second Name</th>
                                                <th scope="col" class="border-0">Licence No</th>
                                                <th scope="col" class="border-0">Vehicle</th>
                                                <th scope="col" class="border-0">Status</th>
                                                <th scope="col" class="border-0">Offence Count</th>
                                                 <th scope="col" class="border-0">Date</th>
                                                  <th scope="col" class="border-0">Action</th>

                                             

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                    while($result = mysqli_fetch_assoc($queryofficer)) :
                            $did=$result['driverID'];
                            $dfname=$result['dfname'];
                            $dlname=$result['dlname'];                
                            $licence=$result['licence'];
                            $typeName=$result['typeName'];
                            $status=$result['status'];
                            $count=$result['offenceCount'];
                            $date=$result['regDate'];
                            
                
                        ?>

                                            <tr>
                                                <td id="id"><?php echo $did; ?></td>
                                                <td id="name"><?php echo $dfname; ?></td>
                                                <td id="name"><?php echo $dlname; ?></td>
                                                <td id="license"><?php echo $licence; ?></td>
                                                <td id="type"><?php echo $typeName; ?></td>
                                                 <td><?= ($status == 0)? 'Active' : 'Suspended'; ?></td>
                                                <td id="name"><?php echo $count; ?></td>
                                                <td id="name"><?php echo $date; ?></td>
                                               
                                                <td><a  id="<?= $did; ?>" class="btn btn-xs btn-danger delete"><span class="glyphicon glyphicon-trash "> Delete </span></a></td>

                                            </tr>


                                            <?php endwhile; ?>



                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Default Light Table -->

                    <!-- End Default Dark Table -->
                </div>
                <script type="text/javascript">
 $(document).ready(function(){  

   $('.delete').click(function(){
    var el = this;
    var id = this.id;
    var opt = "delete";
    $.confirm({
      title: 'Confirm Action',
      content: 'Are You Sure You want To Delete ?',
      type: 'red',
      typeAnimated: true,
      buttons: {
        Yes: {
          text: 'Yes',
          btnClass: 'btn-red',
          action: function(){
                // AJAX Request
                $.ajax({
                 url: 'adminhome.php',
                 type: 'GET',
                 data: {delete:id,dc:opt },
                 success: function(response){
                  console.log(response);
              // Removing row from HTML Table
              $(el).closest('tr').css('background','tomato');
              $(el).closest('tr').fadeOut(800, function(){ 
               $(this).remove();
             });

            }
          });
              }
            },
            No: function () {
            }
          }
        });


  });

 });
</script>
 <script type="text/javascript">
                        $(document).ready(function() {
                            $('#drivers').DataTable({
                                "lengthChange": false,
                                columnDefs: [{
                                    targets: [0, 1, 2],
                                    className: 'mdl-data-table__cell--non-numeric'
                                }]
                            });
                        });

                      
                    </script>

                <?php 
    include '../includes/footer.php'; 
   
    ?>
