<?php
include("../../../myDatabase1.php");
$registrationNo = $_GET['registrationNo'];
$itemNo = $_GET['itemNo'];


$ro = new database1();

$ro->getPatientProfile($registrationNo);

echo "<script type='text/javascript' src='/ckeditor/ckeditor.js'></script>";

//echo "<br>";
echo "<center><font size=4><b>PAGADIAN CITY MEDICAL CENTER</b></font></center>";
echo "<center><b><font size=3><b>LABORATORY DEPARTMENT</b></font></b></center>";
echo "<center><font size=3>Cabrera St., Pagadian City</font></center>";
echo "<center><font size=3>Tel No. 062-2143237</font></center>";
echo "<br><br>";
echo "<center>";

echo "<table border=0 cellspacing=0 cellpadding=1 width='100%' >";
echo "<tr>";
echo "<td>&nbsp;<b>Name:</b>&nbsp;".$ro->getPatientRecord_lastName().", ".$ro->getPatientRecord_firstName()."</td>";
echo "<td>&nbsp;<b>Age/Sex:</b>&nbsp;".$ro->getPatientRecord_age()."/".$ro->getPatientRecord_gender()."</td>";
echo "<Td>&nbsp;<b>Date:</b>&nbsp;".$ro->selectNow("labSavedResult","date","itemNo",$itemNo)."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>&nbsp;<b>Physician:</b>&nbsp;".$ro->getAttendingDoc($registrationNo,"ATTENDING")."</td>";
echo "<td>&nbsp;<b>D.O.B:</b>&nbsp;".$ro->getPatientRecord_birthDate()."</td>";
echo "<Td>&nbsp;<b>WARD:</b>&nbsp;".$ro->getRegistrationDetails_room()."</td>";
echo "</tr>";

echo "</table>";

echo "<Br>";


echo $ro->doubleSelectNow("labSavedResult","result","itemNo",$itemNo,"registrationNo",$registrationNo);


echo "<br><BR>";
echo "<table border=0 cellpadding=1 width='100%' cellspacing=0>";
echo "<tr>";
echo "<td>&nbsp;MARIA CYNTHIA R. HERRERA,M.D.,F.P.S.P</tD>";
echo "<td>&nbsp;".$ro->getMedtechName($ro->selectNow("labSavedResult","medtech","itemNo",$itemNo,"registrationNo",$registrationNo))."</td>";
echo "</tr>";

echo "<Tr>";
echo "<td>&nbsp;Pathologist</td>";
echo "<td>&nbsp;Medical Technologist</td>";
echo "</tr>";

if( $ro->selectNow("labSavedResult","proficiencyNo","itemNo",$itemNo) != "" ) {
echo "<tr>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;HIV PROF NO:&nbsp; ".$ro->selectNow("labSavedResult","proficiencyNo","itemNo",$itemNo)."</td>";
echo "</tr>";
}else { }


echo "</table>";

?>


