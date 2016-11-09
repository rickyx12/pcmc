<?php
include("../../myDatabase.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];

$ro = new database();

$ro->getPatientProfile($registrationNo);




echo "
<style type='text/css'>
.txtBox {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 320px;
	padding:4px 4px 4px 5px;
}

.shortField {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 120px;
	padding:4px 4px 4px 5px;
}
.labelz {
font-size:13px;
}

.comboBox {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 320px;
	padding:4px 4px 4px 5px;
}


.comboBoxShort {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 65px;
	padding:4px 4px 4px 5px;
}

</style>";

echo "<form method='get' action='editVitalSign1.php'>";
echo "<input type=hidden name='registrationNo' value='$registrationNo'>";
echo "<input type=hidden name='username' value='$username'>";
echo "<center><br><div style='border:1px solid #000000; width:500px; height:200px; border-color:black black black black;'>";
echo "<br>";
echo "<table border=0 cellpadding=0 cellspacing=0>";
echo "<tr>";
echo "<td>Height&nbsp;</td>";
echo "<td><input type=text name='height'class='txtBox' value='".$ro->getRegistrationDetails_height()."'></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Weight&nbsp;</td>";
echo "<td><input type=text name='weight'class='txtBox' value='".$ro->getRegistrationDetails_weight()."'></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Blood Pres.&nbsp;</td>";
echo "<td><input type=text name='bloodpressure'class='txtBox' value='".$ro->getRegistrationDetails_bloodPressure()."'></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Temperature&nbsp;</td>";
echo "<td><input type=text name='temperature'class='txtBox' value='".$ro->getRegistrationDetails_temperature()."'></td>";
echo "</tr>";
echo "<tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value='         Edit        ' style='border:1px solid #000000; background:#3b5998 no-repeat 4px 4px; color:white;'></td></tr>";
echo "</table>";
echo "</div>";
echo  "</form>";
?>
