<?php
include '../includes/connection.php';

// Gets data from URL parameters.
function get_confirmed_locations(){
    $location_id=$_GET['id'];
    include '../includes/connection.php';
    // update location with location_status if admin location_status.
    $sqldata = mysqli_query($link,"
select notificationID,lat,lng,location_status as isconfirmed
from notifications WHERE  notificationID = '$location_id'
  ");

    $rows = array();

    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }

    $indexed = array_map('array_values', $rows);
    //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}
function get_all_locations(){
    include '../includes/connection.php';
    // update location with location_status if admin location_status.
    $sqldata = mysqli_query($link,"
select notificationID,lat,lng,location_status as isconfirmed
from notifications
  ");

    $rows = array();
    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }
  $indexed = array_map('array_values', $rows);
  //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}
function array_flatten($array) {
    if (!is_array($array)) {
        return FALSE;
    }
    $result = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, array_flatten($value));
        }
        else {
            $result[$key] = $value;
        }
    }
    return $result;
}

?>