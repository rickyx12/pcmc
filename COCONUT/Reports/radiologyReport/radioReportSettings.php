<?php
include("../../../myDatabase1.php");

$registrationNo = $_GET['registrationNo'];
$itemNo = $_GET['itemNo'];
$description = $_GET['description'];
$branch = $_GET['branch'];


$ro = new database1();
$ro->coconutDesign();
echo "<br><br><br>";
$ro->getPatientProfile($registrationNo);
//$ro->coconutFormStart("get","radioReport.php");
echo "<form method='get' action='radioReport.php' target='_blank'>";
$ro->coconutHidden("registrationNo",$registrationNo);
$ro->coconutHidden("itemNo",$itemNo);
$ro->coconutHidden("description",$description);


echo "<center><font color=red>".$ro->getPatientRecord_lastName().", ".$ro->getPatientRecord_firstName()."</font>";
$ro->coconutBoxStart("500","145");
echo "<br>";
echo "<table border=0>";
echo "<tr>";
echo "<td>Hospital</td>";
echo "<td>";
$ro->coconutComboBoxStart_long("hospital");
echo "<option value='PAGADIAN CITY MEDICAL CENTER'> PAGADIAN CITY MEDICAL CENTER </option>";
$ro->coconutComboBoxStop();
echo "</td>";
echo "</tr>";


echo "<tr>";
echo "<td>Report</td>";
echo "<td>";
$ro->coconutComboBoxStart_long("report");
$ro->showOption("radioReportList","title");
$ro->coconutComboBoxStop();
echo "</td>";
echo "</tr>";


echo "<tr>";
echo "<td>Doctor</td>";
echo "<td>";
$ro->coconutComboBoxStart_long("doctor");
$ro->showOption_where("Doctors","Name","Specialization1","RADIOLOGIST");
$ro->coconutComboBoxStop();
echo "</td>";
echo "</tr>";


echo "</table>";
echo "<br><br>";
$ro->coconutButton("Proceed");
$ro->coconutBoxStop();
$ro->coconutFormStop();


?>
