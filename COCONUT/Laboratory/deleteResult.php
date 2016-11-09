<?php
include("../../myDatabase2.php");
$registrationNo = $_GET['registrationNo'];
$itemNo = $_GET['itemNo'];

$ro = new database();

$ro->coconutDesign();

echo "<br><br><br>";

echo "<center><font color=red size=2></font></center>";
$ro->coconutFormStart("post","deleteResult1.php");
$ro->coconutHidden("registrationNo",$registrationNo);
$ro->coconutHidden("itemNo",$itemNo);
$ro->coconutBoxStart("500","120");
echo "<br>";
echo "<table border=0>";
echo "<tr>";
echo "<Td>Username&nbsp;</td>";
echo "<td>";
$ro->coconutTextBox("username","");
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<Td>Password&nbsp;</td>";
echo "<td>".$ro->coconutPasswordBox_return("password","")."</td>";
echo "</tr>";
echo "</table>";
echo "<br>";
$ro->coconutButton("Proceed");
$ro->coconutBoxStop();
$ro->coconutFormStop();

?>
