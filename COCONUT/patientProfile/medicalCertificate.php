<?php
include("../../myDatabase1.php");
$registrationNo = $_GET['registrationNo'];

$ro = new database1();

$ro->getPatientProfile($registrationNo);

?>


<script type="text/javascript">
function printF(printData)
{
	var a = window.open ('',  '',"status=1,scrollbars=1, width=auto,height=auto");
	a.document.write(document.getElementById(printData).innerHTML.replace(/<a\/?[^>]+>/gi, ''));
	a.document.close();
	a.focus();
	a.print();
	a.close();
}
</script>

<div id='printData'>
<a href="#" onClick="#" style="text-decoration:none; color:black;"><?php echo "<center><font size=5>".$ro->getReportInformation("hmoSOA_name")."</font></center>"; ?></a>

<?php

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
width:320px;
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
width:625px;
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

.underLine6 {
border-color:transparent transparent black transparent;
text-align:center;
font-size:17px;
width:605px;
}



";
echo "</style>";

echo "<center>";

echo "<font size=3>".$ro->getReportInformation("hmoSOA_address")."</font>";

echo "<br><Br><Br><br><Br>";

echo "<b><u><font size=5>MEDICAL CERTIFICATE</font></u></b>";

echo "<justify>";
echo "<br><Br><Br>";
echo "</center>";
echo "<table border=0>";

$ro->coconutFormStart("get","medicalCertificate1.php");

echo "<tr>";
echo "<p allign='left'>";
echo "<td width='25%'>&nbsp;</td>";
echo "<td width='10%'><input type='text' name='dateHead' class='underLine'  value='".date("M d, Y")."'><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=2>Date</font></td>";
echo "</tr>";


echo "<tr>";
echo "<td width='25%'>&nbsp;</td>";
echo "<td width='10%'><input type='text' class='underLine'  value='".$registrationNo."'><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=2>(Registration Number)</font></td>";
echo "</tr>";

echo "</table>";

echo "<br><Br>";

echo "<center>";

echo "<table border=0>";

echo "<tr>";
echo "<br>";
echo "<td width='39%'>&nbsp;<B><font size=3>TO WHOM IT MAY CONCERN:</font></b></td>";
echo "<td width='40%'>&nbsp;</td>";
echo "</tr>";
echo "</table>";

echo "<br>";

echo "<table border=0>";
echo "<tr>";
echo "<td>THIS IS TO CERTIFY THAT <input type=text name='px' class='underLine' value='".$ro->getPatientRecord_lastName().", ".$ro->getPatientRecord_firstName()."'></td>";
echo "</tr>";
echo "</table>";


echo "<table border=0>";
echo "<tr>";
echo "<td><font size=2>AGE</font> <input type=text name='age' class='underLine' value='".$ro->getPatientRecord_age()."    Years Old'> <font size=2>WAS EXAMINED AND TREATED/CONFINED</font></td>";
echo "</tr>";
echo "</table>";

echo "<table border=0>";
echo "<tr>";
echo "<td><font size=2>IN THIS HOSPITAL FROM <input type=text class='underLine2' name='date1' value='".$ro->getRegistrationDetails_dateRegistered()."'></font>
<font size=2>TO</font>
<input type=text class='underLine2' name='date2' value='".$ro->getRegistrationDetails_dateUnregistered()."' >
</td>";
echo "</tr>";
echo "<tr>";
echo "<td><font size=2>WITH THE FOLLOWING FINDINGS AND OR DIAGNOSIS:</font><input type='text' autocomplete='off' name='d1' class='underline2'></td>";
echo "</tr>";

echo "</table>";
echo "<input type=text name='d2' autocomplete='off' class='underLine3'>";
echo "<br>";
echo "<input type=text name='d2' autocomplete='off' class='underLine3'>";
echo "<br>";
echo "<input type=text name='d2' autocomplete='off' class='underLine3'>";
echo "<br>";
echo "<input type=text name='d3' autocomplete='off' class='underLine3'>";
echo "<br><Br>";

echo "<table border=0>";
echo "<br>";
echo "<br>";
echo "<tr>";
echo "<td><font size=2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;THE CERTIFICATION IS ISSUED UPON REQUEST OF</font> <input type=text autocomplete='off' name='r1' class='underLine'> </td>";
echo "</tr>";

echo "<tr>";
echo "<td><font size=2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FOR</font> <input type=text autocomplete='off' name='r2' class='underLine6'> </td>";
echo "</tr>";

echo "</table>";

echo "<br><br>";

echo "<table border=0>";

echo "<tr>";
echo "<br><Br>";
echo "<br><Br>";
echo "<td width='25%'>&nbsp;</td>";
echo "<td width='10%'><input type='text' name='ap' class='underLine4'  value='".$ro->getAttendingDoc($registrationNo,"Attending")."'><br>&nbsp;&nbsp;<font size=2>ATTENDING PHYSICIAN</font></td>";
echo "</tr>";

echo "</table>";
$ro->coconutHidden("registrationNo",$registrationNo);
$ro->coconutButton("Printable Version");
$ro->coconutFormStop();
?>
</div>