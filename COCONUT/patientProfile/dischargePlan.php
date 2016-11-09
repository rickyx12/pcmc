<?php
include("../../myDatabase2.php");
$registrationNo = $_GET['registrationNo'];
$ro = new database2();
$ro->getPatientProfile($registrationNo);

echo "<center><a style='text-decoration:none; color:black;' href='http://".$ro->getMyUrl()."/COCONUT/patientProfile/addDischargePlan.php?registrationNo=$registrationNo'><b><font size=4>Pagadian City Medical Center</font></b></a></center>";
echo "<center><b><font size=3>Cabrera St, Pagadian City</font></b></center>";
echo "<center><font size=3>Tel No. 062-2143237</font></center>";

echo "<br>";

echo "<table width='1000px;' border=1 cellspacing=0>";
echo "<tr>";
echo "<td><b>Last Name:</b>&nbsp;".$ro->getPatientRecord_lastName()."</td>";
echo "<td><b>Age:</b>&nbsp;".$ro->getPatientRecord_Age()."</td>";
echo "<td><b>Hospital Case Number:</b></td>";
echo "</tr>";

echo "<tr>";
echo "<td><b>First Name:</b>&nbsp;".$ro->getPatientRecord_firstName()."</td>";
echo "<td><b>Sex:</b>&nbsp;".$ro->getPatientRecord_gender()."</td>";
echo "<td><B>Room Number:</b>&nbsp;".$ro->getRegistrationDetails_room()."</td>";
echo "</tr>";

echo "</table>";


echo "<br><br><br>";
echo "<table width='1000px;' border=0>";
echo "<tr>";
echo "<td><b>Date Admitted:</b>&nbsp;".$ro->getRegistrationDetails_dateRegistered()."</td>";
echo "<td><b>Date Discharge:</b>&nbsp;".$ro->getRegistrationDetails_dateUnregistered()."</td>";
echo "</tr>";
echo "</table>";

echo "<table width='1000px;' border=0>";
echo "<tr>";
echo "<td><b>Attending Physician:</b>&nbsp;".$ro->getAttendingDoc($registrationNo,"ATTENDING")."</td>";
echo "</tr>";

echo "<Tr>";
echo "<td><b>Final Diagnosis:</b>&nbsp;";
$ro->getPatientICD_diagnosis($registrationNo);
echo "</td>";
echo "</tr>";

echo "<Tr>";
echo "<td><b>Chief Complaint:</b>&nbsp;".$ro->getRegistrationDetails_initialDiagnosis()."</td>";
echo "</tr>";
echo "</table>";

echo "<Br><br>";

echo $ro->selectNow("dischargedPlan","dischargedPlan","registrationNo",$registrationNo);

echo "<br><br>";



echo "<table border=0 width='100%'>";
echo "<tr>";
echo "<td>______________________________<br>&nbsp;&nbsp;&nbsp;Date Accomplished</td>";

echo "<td>______________________________<br>&nbsp;&nbsp;&nbsp;Attending Physician</td>";

echo "</tr>";
echo "</table>";

?>
