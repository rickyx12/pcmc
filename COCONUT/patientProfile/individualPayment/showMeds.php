<?php
include("../../../myDatabase1.php");
$username = $_GET['username'];
$registrationNo = $_GET['registrationNo'];

$ro = new database1();

$ro->getIndividualPayments($registrationNo,$username);



?>
