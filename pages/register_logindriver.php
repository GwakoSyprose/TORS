<?php
 include('../includes/connection.php');
include('../includes/head.php');
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
    
    $allowed= array('jpg', 'jpeg', 'png');
    
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
    
    $type = mysqli_real_escape_string($link, $_POST['type']);
    
    $profile = $_FILES['profile']['name'];
     $password = mysqli_real_escape_string($link, $_POST['password']);   
    $date = mysqli_real_escape_string($link, $_POST['date']);
    

    }

    $sql = "SELECT * FROM drivers WHERE driverID = '$driverID'";
    $result = mysqli_query($link, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0) {
     echo "<script>";
          echo "swal('Ooops..!', 'Could not register officer! National ID already exists!', 'error')";
          echo "</script>" . mysqli_error($link);

    } else {
      //hashing the password
      $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

     

         $query = "INSERT INTO drivers(`driverID`, `dfname`,`dlname`, `licence`, `typeID`, `offenceCount`, `profileImage`,`password`,`regDate`)
            VALUES ('$driverID', '$fname', '$lname','$licence', '$type', '0','$profile','$hashedPwd',  '$date')";
       

       
         
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

           
                  header('location:../pages/viewdriver.php?pid='.$id.'&success=1');;
                  
             
        
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

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Driver Registration/Login</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/mainh.css" rel="stylesheet" media="all">

</head>

<body>


    <div class="card card-1" id="signUp">
        <div class="card-heading"></div>
<div class="row">
        <div class="col-8 border-right float-left card-body container tab-pane active" id="signUp">
            <p>Don't have account? Sign up below</p>
            <br>
            <h2 class="title">Registration Info</h2>
            
            <form method="POST" enctype="multipart/form-data">
                <div class="input-group ">
                    <label for="Fname">NATIONAL ID</label>
                    <input class="input--style-1" type="number"placeholder="enter national id"  name="driverID">
                </div>
                
                <div class="row row-space">
                    <div class="col-6">
                        <div class="input-group">
                             <label for="Fname">FIRST NAME</label>
                            <input class="input--style-1" type="text" placeholder="enter first name" name="fname">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <label for="Fname">LAST NAME</label>
                            <input class="input--style-1" type="text" placeholder="enter last name" name="lname">
                        </div>
                    </div>
                </div>
                <div class="row row-space">
                    <div class="col-6">
                        <label for="Fname">LICENCE</label>
                        <div class="input-group">
                            <input class="input--style-1" type="varchar" placeholder="enter licence number" name="licence">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <label for="Fname">REGISTRATION DATE</label>
                            <input class="input--style-1" type="date" class="form-control" name="date" value="<?=(date('Y-m-d'))?>" required>

                        </div>
                    </div>

                </div>
                <div class="row row-space">
                <div class="input-group col-6">
                    
                    <div class="rs-select2 js-select-simple select--no-search">
                        <select name="type" class="select" id="Type" required>
                            <option disabled selected>Select Vehicle Type</option>
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
                        <div class="select-dropdown"></div>
                    </div>
                </div>
                     <div class="col-6">
                        <div class="input-group">
                            <label for="Fname">Password</label>
                            <input class="input--style-1" type="password" class="custom-file-input" name="password" id="password" placeholder="Enter your password">
                        </div>
                    </div>
                </div>
                <div class="row row-space">
                    <div class="col-6">
                        <div class="input-group">
                            <label for="Fname">Profile Picture</label>
                            <input class="input--style-1" type="file" class="custom-file-input" name="profile" placeholder="Upload your profile picture" id="Profile">
                        </div>
                    </div>
                </div>
                <div class="p-t-20">
                    <button class="btn btn--radius btn--green" name="submitS" type="submit">Sign Up</button>
                </div>
            </form>
            <br>
           

        </div>
  
               <div class="card-body container tab-pane col-4" id="login">
                   <p>Already have an account? Log in to review your details</p>
                   <br>
            <h2 class="title">Login</h2>
            <form method="POST">
                <div class="input-group ">
                    <input class="input--style-1" type="number" placeholder="Enter your National ID" name="driverID">
                </div>
                <div class="input-group ">
                    <input class="input--style-1" type="password" placeholder="Enter your Password" name="password">
                </div>

                <div class="p-t-20">
                    <button class="btn btn-primary" name=submitL type="submit" href="<?=$POST['driverID']; ?>">Log In</button>
                </div>
            </form>
            <br>

        </div>
      </div>
    </div>
        
      



    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
