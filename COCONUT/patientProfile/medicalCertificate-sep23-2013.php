<?php
include("../../myDatabase1.php");
$registrationNo = $_GET['registrationNo'];

$ro = new database1();

$ro->getPatientProfile($registrationNo);

echo " <style type='text/css'>  ";
echo "

.underLine0 {
border-color:transparent transparent black transparent;
text-align:center;
font-size:17px;
width:152px;
}


.underLine {
border-color:transparent transparent black transparent;
text-align:center;
font-size:17px;
width:315px;
}


.underLine2 {
border-color:transparent transparent black transparent;
text-align:center;
font-size:17px;
width:220px;
}


.underLine3 {
border-color:transparent transparent black transparent;
text-align:center;
font-size:17px;
width:640px;
}


.underLine4 {
border-color:transparent transparent black transparent;
text-align:center;
font-size:13px;
width:200px;
}

.underLine5 {
border-color:transparent transparent black transparent;
text-align:center;
font-size:13px;
width:270px;
}


";
echo "</style>";

echo "<center><br><Br>";
echo "<font size=4>".$ro->getReportInformation("hmoSOA_name")."</font>";
echo "<br>";
echo "<font size=3>".$ro->getReportInformation("hmoSOA_address")."</font>";

echo "<br><Br><Br>";


echo "<b><u><font size=4>MEDICAL CERTIFICATE</font></u></b>";

echo "<p align='justify'> ";

echo "<br>";
echo "</center>";
echo "<table border=0>";

echo "<tr>";
echo "<td width='25%'>&nbsp;</td>";
echo "<td width='10%'><input type='text' class='underLine0'  value='".date("M d, Y")."'><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=2>Date</font></td>";
echo "</tr>";


echo "<tr>";
echo "<td width='25%'>&nbsp;</td>";
echo "<td width='10%'><input type='text' class='underLine0'  value='".$registrationNo."'><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=2>(Registration Number)</font></td>";
echo "</tr>";

echo "</table>";

echo "<br><Br>";

echo "<center>";
echo "<table border=0>";

echo "<tr>";
echo "<td width='38%'>&nbsp;<B><font size=3>TO WHOM IT MAY CONCERN:</font></b></td>";
echo "<td width='40%'>&nbsp;</td>";
echo "</tr>";
echo "</table>";

echo "<br>";

echo "<table border=0>";
echo "<tr>";
echo "<td>THIS IS TO CERTIFY THAT <input type=text class='underLine' value='".$ro->getPatientRecord_lastName().", ".$ro->getPatientRecord_firstName()."'></td>";
echo "</tr>";
echo "</table>";


echo "<table border=0>";
echo "<tr>";
echo "<td><font size=2>AGE</font> <input type=text class='underLine' value='".$ro->getPatientRecord_age()."    Years Old'> <font size=2>WAS EXAMINED AND TREATED/CONFINED IN </font></td>";
echo "</tr>";
echo "</table>";

echo "<table border=0>";
echo "<tr>";
echo "<td><font size=2>THIS HOSPITAL FROM <input type=text class='underLine2' value='".$ro->getRegistrationDetails_dateRegistered()."'></font>
<font size=2>TO</font>
<input type=text class='underLine2' value='".$ro->getRegistrationDetails_dateUnregistered()."' >
</td>";
echo "</tr>";
echo "<tr>";
echo "<td width='97%'><font size=2>WITH THE FOLLOWING FINDINGS AND OR DIAGNOSIS:</font><input type='text' class='underline5'></td>";
echo "</tr>";

echo "</table>";
echo "<input type=text class='underLine3'>";
echo "<br>";
echo "<input type=text class='underLine3'>";
echo "<br><Br>";

echo "<table border=0>";
echo "<tr>";
echo "<td width='150%'><br>&nbsp;&nbsp;&nbsp;&nbsp;<font size=2>THE CERTIFICATION IS ISSUED UPON REQUEST OF</font> <input type=text class='underLine'> </td>";
echo "</tr>";

echo "<tr>";
echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;<font size=2>FOR</font> <input type=text class='underLine3'> </td>";
echo "</tr>";

echo "</table>";

echo "<br><br>";

echo "<table border=0>";

echo "<tr>";
echo "<td width='25%'>&nbsp;</td>";
echo "<br><td width='10%'><input type='text' class='underLine4'  value='".$ro->getAttendingDoc($registrationNo,"Attending")."'><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=2>ATTENDING PHYSICIAN</font></td>";
echo "</tr>";

echo "</p>";

echo "</table>";


?>
