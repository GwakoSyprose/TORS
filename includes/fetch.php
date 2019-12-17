<?php
session_start();
include('connection.php');

$region = $_SESSION['regionID'];
$station = $_SESSION['stationID'];
$userid = $_SESSION['userID'];
if(isset($_POST['view'])){
// $con = mysqli_connect("localhost", "root", "", "notif");
if($_POST["view"] != '')
{
  
}
$query = "SELECT * FROM notifications WHERE regionID='$region' AND stationID='$station' ORDER BY notificationID DESC LIMIT 3";
$result = mysqli_query($link, $query);
$output = '';
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_array($result))
{
  $output .= '
    <a class="dropdown-item" href="notifications.php">
                      <div class="notification__icon-wrapper">
                        <div class="notification__icon">
                          <i class="material-icons">announcement</i>
                        </div>
                      </div>
                      <div class="notification__content">
                        <span class="notification__category text-danger">Vehicle No. '.$row["numPlate"].'</span>
                         <p>Contact Person '.$row["phone"].'</p><span ><i class="material-icons text-info">&#xE879;</i></span>
                       
                      </div>
                    </a>

                   
  ';
 
}

}
else{
    $output .= '<a class="dropdown-item" href="notifications.php">
                      <div class="notification__icon-wrapper">
                        <div class="notification__icon">
                          <i class="material-icons">announcement</i>
                        </div>
                      </div>
                      <div class="notification__content">
                        <span class="notification__category text-danger">None</span>
                        <p>No new notification</p>
                        
                      </div>
                    </a>
                   
  ';
}
$status_query = "SELECT * FROM notifications WHERE status=0 ORDER BY notificationID";
$result_query = mysqli_query($link, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);
}
?>
