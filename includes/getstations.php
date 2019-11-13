
<?php 
include "connection.php";
$sql= "SELECT * FROM stations WHERE regionID ='".$_POST['regionID']."'";
$result = $link->query($sql);

?>
<option> Select Station</option>
<?php 
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo  '<option value="'.$row["stationID"].'" >'.$row["stationName"].'</option>';
    }
} else {

}

?>

