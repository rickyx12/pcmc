<?php
include("../../../myDatabase1.php");
$month = $_GET['month'];
$year = $_GET['year'];

$ro = new database1();

$dte=$year."-".$month."-01";

echo "<center><font size=6>".$ro->getReportInformation("hmoSOA_name")."</font>";
echo "<Br>";
echo "<center><font size=3>".$ro->getReportInformation("hmoSOA_address")."</font>";
echo "<br><Br>";
echo "<font size=5>Trial Balance</font><Br><font size=3>".date("F Y",strtotime($dte))."</font>";
$ro->trialBalance($month,$year);

?>
