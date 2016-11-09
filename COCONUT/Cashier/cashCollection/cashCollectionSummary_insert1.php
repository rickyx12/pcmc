<?php
include("../../../myDatabase2.php");
$title = $_GET['title'];
$amount = $_GET['amount'];
$month = $_GET['month'];
$day = $_GET['day'];
$year = $_GET['year'];

$ro = new database2();

$curDate = $year."-".$month."-".$day;

$ro->addCashCollection($title,$amount,$curDate);

$ro->gotoPage("http://".$ro->getMyUrl()."/COCONUT/Cashier/cashCollection/cashCollectionSummary_insert.php?month=$month&day=$day&year=$year");

?>
