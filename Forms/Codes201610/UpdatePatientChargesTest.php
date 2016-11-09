<?php
mysql_connect("localhost","root","shodai");
mysql_select_db("Coconut-PCMC");

$anum=0;
$asql=mysql_query("SELECT itemNo, registrationNo, dateCharge FROM patientCharges WHERE registrationNo > 44999 AND registrationNo < 50000  ORDER BY CAST(registrationNo AS UNSIGNED), registrationNo ASC");
while($afetch=mysql_fetch_array($asql)){
$anum++;
$ino=$afetch['itemNo'];
$regNo=$afetch['registrationNo'];
$dc=$afetch['dateCharge'];

echo $anum.". ".$regNo." | ".$ino." | ".$dc." --> ".$dc." --> ".date("H:i:s")."<br />";

}
?>
