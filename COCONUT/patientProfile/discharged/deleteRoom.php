<?php
include("../../../myDatabase2.php");
$registrationNo = $_GET['registrationNo'];
$itemNo = $_GET['itemNo'];
$chargesCode = $_GET['chargesCode'];

$ro = new database2();

echo "<Br><Br><Br>";
$ro->coconutBoxStart_red("500","100");
echo "<br>";
$ro->coconutFormStart("get","deleteRoom1.php");
$ro->coconutHidden("registrationNo",$registrationNo);
$ro->coconutHidden("itemNo",$itemNo);
$ro->coconutHidden("chargesCode",$chargesCode);
$ro->coconutHidden("control","delete");
$ro->coconutButton("&nbsp;&nbsp;Delete Room&nbsp;&nbsp;");
$ro->coconutFormStop();

$ro->coconutFormStart("get","deleteRoom1.php");
$ro->coconutHidden("registrationNo",$registrationNo);
$ro->coconutHidden("itemNo",$itemNo);
$ro->coconutHidden("chargesCode",$chargesCode);
$ro->coconutHidden("control","discharge");
$ro->coconutButton("&nbsp;&nbsp;Discharge Room&nbsp;&nbsp;");
$ro->coconutFormStop();

$ro->coconutBoxStop();

?>
