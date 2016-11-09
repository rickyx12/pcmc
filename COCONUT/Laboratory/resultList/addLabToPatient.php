<?php
include("../../../myDatabase1.php");
$registrationNo = $_POST['registrationNo'];
$itemNo = $_POST['itemNo'];
$chargesCode = $_POST['chargesCode'];
$username = $_POST['username'];
$date = $_POST['date'];
$result = $_POST['result'];
$proficiencyNo = $_POST['proficiencyNo'];

$ro = new database1();

$ro->addLaboratoryResultChecker($registrationNo,$itemNo);
$ro->addLaboratoryResultInPatient($registrationNo,$itemNo,$chargesCode,$username,$date,$result,$ro->getSynapseTime(),$proficiencyNo);

?>
