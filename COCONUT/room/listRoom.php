<?php
include("../../myDatabase2.php");

$ro = new database2();

echo "";
echo "<table border='1' cellspacing='0' rules='all' width='auto'>";
echo "<tr>";
echo "<th><b>Beds</b></th>";
echo "</tr>";

echo "<tr>";
echo "<td>&nbsp;<B>2nd floor OLD</b></td>";
$ro->listRoom("2ND FLOOR OLD BUILDING");
echo "</tr>";


echo "<tr>";
echo "<td>&nbsp;<B>3rd floor OLD</b></td>";
$ro->listRoom("3RD FLOOR OLD BUILDING");
echo "</tr>";


echo "<tr>";
echo "<td>&nbsp;<B>4th floor OLD</b></td>";
$ro->listRoom("4TH FLOOR OLD BUILDING");
echo "</tr>";


echo "<tr>";
echo "<td>&nbsp;<B>5th floor OLD</b></td>";
$ro->listRoom("5TH FLOOR OLD BUILDING");
echo "</tr>";

echo "<tr>";
echo "<td>&nbsp;<B>3rd floor MAB</b></td>";
$ro->listRoom("3RD FLOOR NEW BUILDING(MAB)");
echo "</tr>";


echo "<tr>";
echo "<td>&nbsp;<B>4th floor MAB</b></td>";
$ro->listRoom("4TH FLOOR NEW BUILDING(MAB)");
echo "</tr>";

echo "<Tr>";
echo "<td>&nbsp;<font size=2><b>".$ro->listRoom_total." Patients</b></font></tD>";
echo "</tr>";

echo "</table>";
?>
