<?php
include("../../../myDatabase1.php");
$month = $_GET['month'];
$year =$_GET['year'];
$title = $_GET['title'];
$type = $_GET['type'];


$ro = new database1();

$d2=$year."-".$month."-01";

echo "<center><font size=4>Fast Moving Item's in $type $title</font><Br><font size=2>( ".date("F Y",strtotime($d2))." )</font><br><Br>";

$ro->getFastMovingItems($month,$year,$title,$type);



?>
