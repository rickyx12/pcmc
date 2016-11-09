<?php
include("../../myDatabase1.php");
$fromMonth = $_GET['fromMonth'];
$fromDay = $_GET['fromDay'];
$fromYear = $_GET['fromYear'];
$toMonth = $_GET['toMonth'];
$toDay = $_GET['toDay'];
$toYear = $_GET['toYear'];


$d1=$fromYear."-".$fromMonth."-".$fromDay;
$d2=$toYear."-".$toMonth."-".$toDay;

$ro = new database1();

echo "<center><font size=6>".$ro->getReportInformation("hmoSOA_name")."</font></center>";
echo "<center><font size=4>Registration Census</font></center>";
echo "<center><font size=3>( ".date("F d, Y",strtotime($d1))." - ".date("F d, Y",strtotime($d2))." )</font></center>";
echo "<Br><Br>";
echo "<hr>";
echo "<centeR><img src='/COCONUT/graphicalReport/censusPie.php?month=$fromMonth&day=$fromDay&year=$fromYear&month1=$toMonth&day1=$toDay&year1=$toYear' >";

echo "<Br>";

echo "<font color=blue>OPD&nbsp;(".$ro->getTotalPx($fromMonth,$fromDay,$fromYear,$toMonth,$toDay,$toYear,"OPD").")</font>";
echo "&nbsp;&nbsp;vs&nbsp;&nbsp;";
echo "<font color=red>IPD&nbsp;(".$ro->getTotalPx($fromMonth,$fromDay,$fromYear,$toMonth,$toDay,$toYear,"IPD").")</font>";

echo "<hr>";

echo "<Br><Br>";



?>
