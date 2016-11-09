<?php
include("../../../myDatabase2.php");
$month = $_GET['month'];
$day = $_GET['day'];
$year = $_GET['year'];

$ro = new database2();


$ro->coconutDesign();
echo "<Br><Br><Br><Br><br>";
$ro->coconutFormStart("get","cashCollectionSummary_insert1.php");
$ro->coconutHidden("month",$month);
$ro->coconutHidden("day",$day);
$ro->coconutHidden("year",$year);
$ro->coconutBoxStart("500","120");
echo "<br>";
echo "<table border=0>";
echo "<tr>";
echo "<Td>Title</tD>";
echo "<tD>";
$ro->coconutComboBoxStart_long("title");
$ro->showOption("cashCollection_title","title");
$ro->coconutComboBoxStop();
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Amount</td>";
echo "<td>";
$ro->coconutTextBox("amount","");
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<br>";
$ro->coconutButton("Proceed");
$ro->coconutBoxStop();
$ro->coconutFormStop();

echo "<Br><Br>";
echo "<iframe src='http://".$ro->getMyUrl()."/COCONUT/Cashier/cashCollection/cashCollectionDetails.php?month=$month&day=$day&year=$year' width='410' height='300'  name='welcome' border=1 frameborder=no scrolling=yes></iframe>";



?>
