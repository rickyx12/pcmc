<?php
include("../../../myDatabase2.php");
$username = $_GET['username'];


$ro = new database2();
$ro->coconutDesign();
$ro->getRequestNo();
$myFile = $ro->getReportInformation("homeRoot")."/COCONUT/trackingNo/requestNo.dat";
$fh = fopen($myFile, 'r');
$requestNo = fread($fh, 100);
fclose($fh);
/*
echo $username;
echo "<br>";
echo $requestNo;
*/

echo "<Br><Br><Br><Br>";
$ro->coconutFormStart("get","requestHandler.php");
$ro->coconutHidden("username",$username);
$ro->coconutHidden("requestNo",$requestNo);
$ro->coconutBoxStart("500","80");
echo "<Br>";
echo "<table border=0>";
echo "<tr>";
echo "<td>Department:&nbsp;</td>";
echo "<td>";
$ro->coconutComboBoxStart_long("department");
echo "<option value='2D Echo'>2D Echo</option>";
echo "<option value='DIALYSIS'>DIALYSIS</option>";
echo "<option value='ER'>ER</option>";
echo "<option value='ICU'>ICU</option>";
echo "<option value='CSR'>CSR</option>";
echo "<option value='LABORATORY'>LABORATORY</option>";
echo "<option value='OR'>OR</option>";
echo "<option value='DR'>DR</option>";
echo "<option value='Radiology'>RADIOLOGY</option>";
echo "<option value='X-RAY'>X-RAY</option>";
echo "<option value='PHARMACY'>PHARMACY</option>";
echo "<option value='BILLING'>BILLING</option>";
echo "<option value='2nd Floor Old'>2nd Floor Old</option>";
echo "<option value='3rd Floor Old'>3rd Floor Old</option>";
echo "<option value='4th Floor Old'>4th Floor Old</option>";
echo "<option value='5th Floor Old'>5th Floor Old</option>";
echo "<option value='3rd Floor MAB'>3rd Floor MAB</option>";
echo "<option value='4th Floor MAB'>4th Floor MAB</option>";

$ro->coconutComboBoxStop();
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<Br>";
$ro->coconutButton("Proceed");
$ro->coconutBoxStop();
$ro->coconutFormStop();

?>
