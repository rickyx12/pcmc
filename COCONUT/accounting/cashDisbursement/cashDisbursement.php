<?php
include("../../../myDatabase1.php");
$month = $_GET['month'];
$day = $_GET['day'];
$year = $_GET['year'];
$month1 = $_GET['month1'];
$day1 = $_GET['day1'];
$year1 = $_GET['year1'];
$user = $_GET['username'];
$payee = $_GET['payee'];

$ro = new database1();

$ro->cashDisbursement($month,$day,$year,$month1,$day1,$year1,$user,$payee);


?>
