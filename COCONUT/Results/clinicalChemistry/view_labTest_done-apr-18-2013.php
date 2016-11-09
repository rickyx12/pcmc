<?php
include("../../../myDatabase.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];
$ro = new database();

$ro->coconutDesign();
echo "<a href='http://".$ro->getMyUrl()."/COCONUT/Laboratory/laboratoryNote.php?username=$username'>Send Laboratory Note</a>";

echo "<center><br><br>";
$ro->getLabTest_done($registrationNo,$username);




?>
