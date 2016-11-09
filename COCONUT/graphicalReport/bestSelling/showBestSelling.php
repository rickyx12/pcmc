<?php
include("../../../myDatabase1.php");
$month = $_GET['month'];
$year =$_GET['year'];
$title = $_GET['title'];

$ro = new database1();

$d2=$year."-".$month."-01";

echo "<center><font size=4>OPD Top 20 Highest Sale's in $title</font><Br><font size=2>( ".date("F Y",strtotime($d2))." )</font><br><Br>";

$ro->getBestSelling_opd($month,$year,$title);



?>
