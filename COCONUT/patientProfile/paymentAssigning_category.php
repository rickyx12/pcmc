<?php
include("../../myDatabase1.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];
$desc = $_GET['desc'];
$ro = new database();
$ro->coconutDesign();

echo "<br><Br><br>";

$ro->coconutFormStart("get","paymentAssigning.php");
$ro->coconutHidden("registrationNo",$registrationNo);
$ro->coconutHidden("username",$username);
$ro->coconutHidden("desc",$desc);
$ro->coconutBoxStart("600","100");
echo "<br><center>";
$ro->coconutComboBoxStart_long("type");
$ro->showOption("Category","Category");
$ro->coconutComboBoxStop();
echo "<br><Br>";
$ro->coconutButton("Proceed");
$ro->coconutBoxStop();
$ro->coconutFormStop();
?>
