<?php
session_start();

$lat=(isset($_GET['lat']))?$_GET['lat']:'';
$lng=(isset($_GET['lng']))?$_GET['lng']:'';



$_SESSION['lat']=$lat;
$_SESSION['lng']=$lng;
?>