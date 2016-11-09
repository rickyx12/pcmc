<?php
include("../../myDatabase2.php");
$room = $_GET['room'];
$date1 = $_GET['date1'];
$date2 = $_GET['date2'];

$ro = new database2();

echo "<center> $room<Br>(Discharge between $date1 to $date2)<br><br>";
$ro->roomCensus_totalPx_list($room,$date1,$date2);

?>
