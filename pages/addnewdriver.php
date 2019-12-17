<?php 

ob_start();
    include '../includes/connection.php'; 

 
    include '../includes/driverhead.php'; 
    
 $error = "";
 $success = "";


if(array_key_exists("submitS" , $_POST)) {

  

   $link = mysqli_connect('localhost','root','','tobs');

   if(mysqli_connect_error()) {

    die ("Database Connection Error!");
   }
    // Escape user inputs for security
    else{
        
    
    $file = $_FILES['profile'];
    
    $fileName = $_FILES['profile']['name'];
    $fileTmpName = $_FILES['profile']['tmp_name'];
    $fileSize = $_FILES['profile']['size'];
    $fileError = $_FILES['profile']['error'];
    $fileType = $_FILES['profile']['type'];
    
    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    $allowed= array('jpg', 'jpeg', 'png','JPG');
    
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize< 2000000){
                //giving the image a unique name
                //$fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination= '../pages/images/'.$fileName;
                move_uploaded_file($fileTmpName, $fileDestination);
            }else{
                echo "Your file is too big";
            }
            
        }else{
            echo "There was an error in uploading your file";
        }
        
        
    }else{
        echo "You cannot upload files of this type";
    }
        
      $driverID = mysqli_real_escape_string($link, $_POST['driverID']);
    
    $fname = mysqli_real_escape_string($link, $_POST['fname']);
    $lname = mysqli_real_escape_string($link, $_POST['lname']);
    $licence = mysqli_real_escape_string($link, $_POST['licence']);
    $phoneno = mysqli_real_escape_string($link, $_POST['phone']);
    $email= mysqli_real_escape_string($link, $_POST['email']);
    $password= mysqli_real_escape_string($link, $_POST['password1']);
    $type = mysqli_real_escape_string($link, $_POST['type']);
    $profile = $_FILES['profile']['name'];
    $date = mysqli_real_escape_string($link, $_POST['date']);
    
    }
 
    $resulti = mysqli_query($link, "SELECT * FROM drivers WHERE driverID='$driverID'");
    $num_rows = mysqli_num_rows($resulti);

if ($num_rows > 0) {
          $error.='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error!</strong>National ID exists.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
    
}
else {
      $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

         $query = "INSERT INTO drivers(`driverID`, `dfname`,`dlname`, `licence`, `phone`, `email`, `password`, `typeID`, `offenceCount`, `profileImage`,`regDate`)
            VALUES ('$driverID', '$fname', '$lname','$licence','$phoneno','$email','$hashedPwd', '$type', '0','$profile',  '$date')";
      mysqli_query($link, $query);
      $success.='<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong>You may now proceed to log in
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';

}
     
    
       

  }
if(array_key_exists("submitL" , $_POST)) {
     $dID = mysqli_real_escape_string($link, $_POST['driverID']);
  $password = mysqli_real_escape_string($link, $_POST['password']);
  

//Error Handlers
  //Check if inputs are empty
  if (empty($dID) || empty($password)) {
    echo "empty";

  } else {
    $query = "SELECT * FROM drivers WHERE driverID = '$dID'";
    $results = mysqli_query($link, $query);
    $resultChecks = mysqli_num_rows($results);
    if ($resultChecks == 0) {
     echo '<div class="alert alert-danger alert-dismissable" id="flash-msg">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <h4><i class="icon fa fa-times"></i>That National ID does not exist!</h4>
      </div>';

    } else {
       if($row = mysqli_fetch_assoc($results)) {
          $id=$_POST['driverID'];
          //De-hashing the password!
        if(password_verify($password, $row['password'])){
    
        $_SESSION['driverID'] = $row['driverID'];
    
           
        exit(header('location:../pages/driverview.php?pid='.$id.'&success=1'));
                  
             
        
        } else {
            
            echo '<div class="alert alert-danger alert-dismissable" id="flash-msg">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <h4><i class="icon fa fa-times"></i>wrong password!</h4>
                </div>';
echo mysqli_error($link);
             

        }
  
      }
  }

}

}
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

                        Already registered? View your profile<a href="" data-toggle="modal" data-target="#ModalExample">&nbsp;login here</a>
                    </div>
                    <div><?php echo $error; ?></div>
                    <div><?php echo $success; ?></div>
                    <div class="row">
                        <!-- Input & Button Groups -->
                        <div class="card card-small mb-4 col-lg-12">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">Fill in your details below</h6>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-3">
                                    <form action="addnewdriver.php" method="post" enctype="multipart/form-data">

                                        <div class="col-lg-12">
                                            <strong class="text-muted d-block mb-2">Personal Details</strong></div>
                                        <div class="form-row">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">National ID</span>
                                                </div>
                                                <input type="number" name="driverID" class="form-control" aria-describedby="basic-addon1">
                                            </div>

                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">First Name</span>
                                                </div>

                                                <input type="text" class="form-control" name="fname" placeholder="" required>
                                            </div>

                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Last Name</span>
                                                </div>

                                                <input type="text" class="form-control" name="lname" placeholder="" required>
                                            </div>
                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Phone No</span>
                                                </div>

                                                <input type="varchar" class="form-control" name="phone" placeholder="" required>
                                            </div>

                                            <div class="form-group col-md-6 input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Email</span>
                                                </div>


                                                <input type="email" class="form-control" name="email" placeholder="example@abc.com" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload Profile Picture</span>
                                                </div>
                                                <input type="file" class="form-control" name="profile" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Enter your preffered password</span>
                                                </div>
                                                <input type="password" class="form-control" name="password1" placeholder="" aria-label="" aria-describedby="basic-addon1">

                                            </div>

                                            <div class="col-lg-12">
                                                <strong class="text-muted d-block mb-2">Other Details</strong></div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Your License Number</span>
                                                </div>
                                                <input type="text" name="licence" class="form-control" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">What vehicle type do you drive</span>
                                                </div>
                                                <select name="type" class="form-control" id="Type" required>
                                                    <option disabled selected>Select Type</option>
                                                    <?php 
                                                            require_once('../includes/connection.php');

                                                                $sql = "SELECT * FROM types;";
                                                                $result = $link->query($sql);

                                                                if ($result->num_rows > 0) {
                                                                    // output data of each row
                                                                    while($row = $result->fetch_assoc()) {
                                                                        echo  '<option value="'.$row["typeID"].'" >'.$row["typeName"].'</option>';
                                                                    }
                                                                } else {

                                                                }
                                                                ?>
                                                </select>
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Registration Date</span>
                                                </div>
                                                <input type="date" name="date" class="form-control" aria-describedby="basic-addon1">
                                            </div>






                                        </div>


                                        <button type="submit" class="btn btn-success" name="submitS">Sign Up</button>

                                        <!-- Input Groups -->
                                        <!-- Seamless Input Groups -->

                                        <!-- / Input/Button Group -->
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!-- Modal HTML Markup -->
                        <div id="ModalExample" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title text-xs-center">Login</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" method="POST" action="addnewdriver.php">
                                            <input type="hidden" name="_token" value="">
                                            <div class="form-group">
                                                <label class="control-label">National ID</label>
                                                <div>
                                                    <input type="text" class="form-control input-lg" name="driverID">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Password</label>
                                                <div>
                                                    <input type="password" class="form-control input-lg" name="password">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div>

                                                    <button type="submit" name="submitL" class="btn btn-info btn-block">Login</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer text-xs-center">
                                        Don't have an account? <a href="/auth/register">Sign up »</a>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                    </div> <!-- / Input & Button Groups -->

                </div>




                <script>
                    $("input[type=password]").keyup(function() {
                        var ucase = new RegExp("[A-Z]+");
                        var lcase = new RegExp("[a-z]+");
                        var num = new RegExp("[0-9]+");

                        if ($("#password1").val().length >= 8) {
                            $("#8char").removeClass("fa fa-times ");
                            $("#8char").addClass("fa fa-check");
                            $("#8char").css("color", "#00A41E");
                        } else {
                            $("#8char").removeClass("fa fa-check");
                            $("#8char").addClass("fa fa-times ");
                            $("#8char").css("color", "#FF0004");
                        }

                        if (ucase.test($("#password1").val())) {
                            $("#ucase").removeClass("fa fa-times ");
                            $("#ucase").addClass("fa fa-check");
                            $("#ucase").css("color", "#00A41E");
                        } else {
                            $("#ucase").removeClass("fa fa-check");
                            $("#ucase").addClass("fa fa-times ");
                            $("#ucase").css("color", "#FF0004");
                        }

                        if (lcase.test($("#password1").val())) {
                            $("#lcase").removeClass("fa fa-times ");
                            $("#lcase").addClass("fa fa-check");
                            $("#lcase").css("color", "#00A41E");
                        } else {
                            $("#lcase").removeClass("fa fa-check");
                            $("#lcase").addClass("fa fa-times ");
                            $("#lcase").css("color", "#FF0004");
                        }

                        if (num.test($("#password1").val())) {
                            $("#num").removeClass("fa fa-times ");
                            $("#num").addClass("fa fa-check");
                            $("#num").css("color", "#00A41E");
                        } else {
                            $("#num").removeClass("fa fa-check");
                            $("#num").addClass("fa fa-times ");
                            $("#num").css("color", "#FF0004");
                        }

                        if ($("#password1").val() == $("#password2").val()) {
                            $("#pwmatch").removeClass("fa fa-times ");
                            $("#pwmatch").addClass("fa fa-check");
                            $("#pwmatch").css("color", "#00A41E");
                        } else {
                            $("#pwmatch").removeClass("fa fa-check");
                            $("#pwmatch").addClass("fa fa-times ");
                            $("#pwmatch").css("color", "#FF0004");
                        }
                    });

                </script>
                <?php include '../includes/footer.php'; ?>
