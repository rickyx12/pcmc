<?php
include("../../../myDatabase1.php");
$registrationNo = $_GET['registrationNo'];
$itemNo = $_GET['itemNo'];
$description = $_GET['description'];


$ro = new database1();

$ro->getPatientProfile($registrationNo);

echo "
<style type='text/css'>

.txtArea {
	border: 1px solid #000;
	color: #000;
	height: auto;
	width:900px;
	padding:4px 4px 4px 5px;
	font-size:20px;
}

</style>
";

echo "<br>";
echo "<center><font size=6>".$ro->selectNow("radioSavedReport","hospitalName","itemNo",$itemNo)."</font></center>";
echo "<center><font size=3>".$ro->selectNow("radioSavedReport","hospitalAddress","itemNo",$itemNo)."</font></center>";


echo "<br><br>";
echo "<center><font size=4><b>Radiology Report</b></font>";
echo "<br><br>";

$ro->coconutFormStart("get","radioReport_insert.php");

echo "<table border=0 width='160%'>";
echo "<tr>";
echo "<td>Last Name:&nbsp;<b>".$ro->getPatientRecord_lastName()."</b>  </td>";
echo "<td>Date:&nbsp;<b>".$ro->selectNow("radioSavedReport","date","itemNo",$itemNo)."</b></td>";
echo "</tr>";

echo "<tr>";
echo "<td>First Name:&nbsp;<b>".$ro->getPatientRecord_firstName()."</b></td>";
echo "<td>Physician:&nbsp;<b>Dr. ".$ro->selectNow("radioSavedReport","physician","itemNo",$itemNo)."</b></td>";
echo "</tr>";

echo "<tr>";
echo "<td>Age:&nbsp;<b>".$ro->getPatientRecord_age()."</b></td>";
echo "<td>Examination:&nbsp;<b>$description</b></td>";
echo "</tr>";

echo "<tr>";
echo "<td>Sex:&nbsp;<b>".$ro->getPatientRecord_gender()."</b></td>";

echo "</tr>";

echo "<tr>";
echo "<td>Room:&nbsp;<b>".$ro->getRegistrationDetails_room()."</b></td>";

echo "</tr>";

echo "</table>";

echo "<br><br><br><br>";
echo "</center>";

echo "<font size=4>".$ro->selectNow("radioSavedReport","radioReport","itemNo",$itemNo)."</font>";

echo "<br><br><br><br>";

echo "<u>GLENSON HIDALGO,MD,FPCR</u><br>&nbsp;&nbsp;&nbsp;Radiologist";

//$ro->coconutButton("Proceed");
$ro->coconutFormStop();

?>
