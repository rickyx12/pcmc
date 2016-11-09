<?php
include("../../../myDatabase2.php");
$inventoryCode = $_GET['inventoryCode'];
$month = $_GET['month'];
$day = $_GET['day'];
$year = $_GET['year'];

$fromTime_hour = $_GET['fromTime_hour'];
$fromTime_minutes = $_GET['fromTime_minutes'];
$fromTime_seconds = $_GET['fromTime_seconds'];

$toTime_hour = $_GET['toTime_hour'];
$toTime_minutes = $_GET['toTime_minutes'];
$toTime_seconds = $_GET['toTime_seconds'];

$month1="";

$ro = new database2();
echo "<br>";
echo "<center><font size=5>".$ro->selectNow("inventory","description","inventoryCode",$inventoryCode)."</font></center>";
echo "<center>$month $day, $year</center>";
echo "<Center>( ".$fromTime_hour.":".$fromTime_minutes.":".$fromTime_seconds." - ".$toTime_hour.":".$toTime_minutes.":".$toTime_seconds.")</center>";
$ro->dispensedMonitor($inventoryCode,$month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds);


if( $month == "Jan" ) {
$month1 = 01;
}else if( $month == "Feb" ) {
$month1 = 02;
}else if ( $month == "Mar" ) {
$month1 = 03;
}else if( $month == "Apr" ) {
$month1 = 04;
}else if( $month == "May" ) {
$month1 = 05;
}else if( $month == "Jun" ) {
$month1 = 06;
}else if( $month == "Jul" ) {
$month1 = 07;
}else if( $month == "Aug" ) {
$month1 = 08;
}else if( $month == "Sep" ) {
$month1 = 09;
}else if( $month == "Oct" ) {
$month1 = 10;
}else if( $month == "Nov" ) {
$month1 = 11;
}else if( $month == "Dec" ) {
$month1 = 12;
}else { }


$ro->getRequestedDept($inventoryCode,$year."-".$month1."-".$day,$year."-".$month1."-".$day);





?>
