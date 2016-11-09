<?php
include("../../myDatabase2.php");
$registrationNo = $_GET['registrationNo'];
$ro = new database2();
$ro->getPatientProfile($registrationNo);
$ro->coconutDesign();

echo "<style type='text/css'>
#txt1 {
	border: 1px solid #000;
	color: #000;
	height:200px;
	width:800px;
	padding:4px 4px 4px 5px;
	font-size:20px;
}

</style>";

echo "<br><Br>";

echo "<Table border=0>";
echo "<tr>";
echo "<td>Name</td>";
echo "<td>".$ro->coconutTextBox_return("name",$ro->getPatientRecord_lastName().", ".$ro->getPatientRecord_firstName())."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Age</td>";
echo "<td>".$ro->coconutTextBox_return("age",$ro->getPatientRecord_Age())."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Address</td>";
echo "<td>".$ro->coconutTextBox_return("address",$ro->getPatientRecord_address())."</td>";
echo "</tr>";

$ro->coconutFormStart("get","addMedicoLegal1.php");
$ro->coconutHidden("registrationNo",$registrationNo);
echo "<tr>";
echo "<td>Date Of Incidence</td>";
echo "<td>".$ro->coconutTextBox_return("incidenceDate","")."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Time of Incidence</td>";
echo "<td>".$ro->coconutTextBox_return("incidenceTime","")."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Place of Incidence</td>";
echo "<td>".$ro->coconutTextBox_return("incidencePlace","")."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Date of Examination</td>";
echo "<td>".$ro->coconutTextBox_return("examinationDate","")."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Time of Examination</td>";
echo "<td>".$ro->coconutTextBox_return("examinationTime","")."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Place of Examination</td>";
echo "<td>".$ro->coconutTextBox_return("examinationPlace","")."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Nature</td>";
echo "<td>".$ro->coconutTextBox_return("nature","")."</td>";
echo "</tr>";
echo "</table>";

echo "<br><br>";
echo "PERTINENT PHYSICAL EXAMINATION";
echo "<br>";
echo "<textarea id='txt1' name='pertinent'>";

echo "</textarea>";
echo "<br>";
$ro->coconutButton("Proceed");

$ro->coconutFormStop();

?>
