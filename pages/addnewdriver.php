<?php 
    include '../includes/connection.php'; 

    

    include '../includes/driverhead.php'; 
    


 $error = "";


if(array_key_exists("submitS" , $_POST)) {

  

   $link = mysqli_connect('localhost','root','','tobs');

   if(mysqli_connect_error()) {

    die ("Database Connection Error!");
   }
    // Escape user inputs for security
    if(isset($_POST["submitS"])) {
        
    
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
    //$password = mysqli_real_escape_string($link, $_POST['password']);
    $fname = mysqli_real_escape_string($link, $_POST['fname']);
      $lname = mysqli_real_escape_string($link, $_POST['lname']);
    $licence = mysqli_real_escape_string($link, $_POST['licence']);
    $phoneno = mysqli_real_escape_string($link, $_POST['phone']);
    $email= mysqli_real_escape_string($link, $_POST['email']);
    $password= mysqli_real_escape_string($link, $_POST['password']);
        
    
    $type = mysqli_real_escape_string($link, $_POST['type']);
    
    $profile = $_FILES['profile']['name'];
    $date = mysqli_real_escape_string($link, $_POST['date']);
    

    }


      $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

         $query = "INSERT INTO drivers(`driverID`, `dfname`,`dlname`, `licence`, `phone`, `email`, `password`, `typeID`, `offenceCount`, `profileImage`,`regDate`)
            VALUES ('$driverID', '$fname', '$lname','$licence','$phoneno','$email','$hashedPwd', '$type', '0','$profile',  '$date')";
       

       
         
if(!mysqli_query($link, $query)) {
                 echo "<script>";
          echo "swal('Ooops..!', 'Something went wrong,Could not register driver!', 'error')";
          echo "</script>" . mysqli_error($link);
  

           } else { 

            mysqli_query($link, $query);
           echo "<script>";
          echo "swal('Good job!', 'Driver registered successfully', 'success')";
          echo "</script>";
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
    
           
                  header('location:../pages/driverview.php?pid='.$id.'&success=1');;
                  
             
        
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

            <main class="main-content col-lg-12">



                <div class="main-content-container col-10 container-fluid  px-4">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text mb-0">
                            <span class="text-uppercase page-subtitle">Overview</span>
                            <h3 class="page-title">Driver Registration</h3>
                        </div>
                        <?php echo $error; ?>
                    </div>
                    <!-- End Page Header -->
                    <!-- Default Light Table -->
                    <ul class="nav nav-tabs justify-content-center" id="" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="" data-toggle="tab" href="#signup" role="tab" aria-controls="home" aria-selected="true">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="" data-toggle="tab" href="#login" role="tab" aria-controls="profile" aria-selected="false">Log in</a>
                        </li>

                    </ul>

                    <div class="tab-content">

                        <!-- active drivers -->
                        <div id="signup" class="tab-pane active">
                            <!-- Default Light Table -->
                            <div class="card card-small mb-4">

                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Account Details</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-3">
                                        <div class="row">
                                            <div class="col">
                                                <form method="post" action="addnewdriver.php" enctype="multipart/form-data">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="ID">National ID</label>
                                                            <input type="number" class="form-control" name="driverID" placeholder="National ID" required> </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="Fname">First name</label>
                                                            <input type="text" class="form-control" name="fname" placeholder="First name" required> </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="Lname">Last name</label>
                                                            <input type="text" class="form-control" name="lname" placeholder="Last name" required> </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="licence">Licence</label>
                                                            <input type="text" class="form-control" name="licence" placeholder="licence" required> </div>
                                                         <div class="form-group col-md-12">
                                                            <label for="Phone">Phone</label>
                                                            <input type="varchar" class="form-control" name="phone" placeholder="eg. 2547123456" required> </div>
                                                         <div class="form-group col-md-12">
                                                            <label for="licence">Email</label>
                                                            <input type="email" class="form-control" name="email" placeholder="example@abc.com" required> </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="Type">Type</label>
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
                                                        <div class="form-group col-md-12">
                                                            <label for="Profile">Profile Picture</label>
                                                            <div class="input-group mb-3 ">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" name="profile" id="Profile" required>
                                                                    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02"></label>
                                                                </div>

                                                            </div>
                                                        </div>


                                                        <div class="form-group col-md-12">
                                                            <label for="Date">Password</label>
                                                            <input type="password" class="form-control" name="password" id="password1"placeholder="Enter your preffered password" required> </div>
                                                          <div class="row" >
                                                        <div class="col-sm-6">
                                                            <small><i class="fa fa-times" style="font-size:13px;color:red" id="8char"></i> 8 Characters Long <br></small>
                                                            <small><i class="fa fa-times" style="font-size:13px;color:red" id="ucase"></i> One Uppercase Letter</small>
                                                        </div>
                                                        <div class="col-sm-6">
                                                           <small> <i class="fa fa-times" style="font-size:13px;color:red" id="lcase"></i> One Lowercase Letter<br></small>
                                                            <small><i class="fa fa-times" style="font-size:13px;color:red" id="num"></i> One Number</small>
                                                        </div>
                                                    </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="Date">Registration Date</label>
                                                            <input type="date" class="form-control" name="date" value="<?=(date('Y-m-d'))?>" required> </div>








                                                        <button name="submitS" type="submit" class="btn btn-accent">Sign Up</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            


                            <!-- End Default Light Table -->
                        </div>

                        <div id="login" class="tab-pane fade">
                            <!-- Default Dark Table -->
                            <div class="card card-small mb-4  ">
                                <div class="card-header border-bottom">
                                    <h6 class="m-0">Welcome Back</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-3">
                                        <div class="row">
                                            <div class="col">
                                                <form method="post" id="passwordForm">

                                                    <div class="form-group col-md-12">
                                                        <label for="NationalID">National ID</label>
                                                        <input class="form-control" type="number" placeholder="Enter your National ID" name="driverID" autocomplete="off"> </div>

                                                    <div class="form-group col-md-12">
                                                        <label for="Password">Password</label>
                                                        <input class="form-control" type="password" placeholder="Enter your password" name="password" autocomplete="off"></div>



                                                    <div><button class="btn btn-primary" name=submitL type="submit" href="">Log In</button></div>

                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <!-- End Default Dark Table -->


                        </div>

                        <!-- End Page Header -->


                    </div>
                    <script>
                   $("input[type=password]").keyup(function(){
    var ucase = new RegExp("[A-Z]+");
    var lcase = new RegExp("[a-z]+");
    var num = new RegExp("[0-9]+");
    
    if($("#password1").val().length >= 8){
        $("#8char").removeClass("fa fa-times ");
        $("#8char").addClass("fa fa-check");
        $("#8char").css("color","#00A41E");
    }else{
        $("#8char").removeClass("fa fa-check");
        $("#8char").addClass("fa fa-times ");
        $("#8char").css("color","#FF0004");
    }
    
    if(ucase.test($("#password1").val())){
        $("#ucase").removeClass("fa fa-times ");
        $("#ucase").addClass("fa fa-check");
        $("#ucase").css("color","#00A41E");
    }else{
        $("#ucase").removeClass("fa fa-check");
        $("#ucase").addClass("fa fa-times ");
        $("#ucase").css("color","#FF0004");
    }
    
    if(lcase.test($("#password1").val())){
        $("#lcase").removeClass("fa fa-times ");
        $("#lcase").addClass("fa fa-check");
        $("#lcase").css("color","#00A41E");
    }else{
        $("#lcase").removeClass("fa fa-check");
        $("#lcase").addClass("fa fa-times ");
        $("#lcase").css("color","#FF0004");
    }
    
    if(num.test($("#password1").val())){
        $("#num").removeClass("fa fa-times ");
        $("#num").addClass("fa fa-check");
        $("#num").css("color","#00A41E");
    }else{
        $("#num").removeClass("fa fa-check");
        $("#num").addClass("fa fa-times ");
        $("#num").css("color","#FF0004");
    }
    
    if($("#password1").val() == $("#password2").val()){
        $("#pwmatch").removeClass("fa fa-times ");
        $("#pwmatch").addClass("fa fa-check");
        $("#pwmatch").css("color","#00A41E");
    }else{
        $("#pwmatch").removeClass("fa fa-check");
        $("#pwmatch").addClass("fa fa-times ");
        $("#pwmatch").css("color","#FF0004");
    }
});

                </script>

                    <?php 
    include '../includes/footer.php'; 
   
    ?>
