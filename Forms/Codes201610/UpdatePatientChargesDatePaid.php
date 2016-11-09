<?php
mysql_connect("localhost","root","october112016");
mysql_select_db("Coconut");

$anum=0;
//$asql=mysql_query("SELECT itemNo, registrationNo, dateCharge FROM patientCharges WHERE registrationNo > 9999 AND registrationNo < 45000  ORDER BY CAST(registrationNo AS UNSIGNED), registrationNo ASC");
$asql=mysql_query("SELECT itemNo, registrationNo, datePaid FROM patientCharges WHERE registrationNo > 79999 AND registrationNo < 900000  ORDER BY CAST(registrationNo AS UNSIGNED), registrationNo ASC");
while($afetch=mysql_fetch_array($asql)){
$anum++;
$ino=$afetch['itemNo'];
$regNo=$afetch['registrationNo'];
$dc=$afetch['datePaid'];

if($dc!=''){
$dcsplit=preg_split ("/\_/", $dc);
$realdr=$dcsplit[0]."-".$dcsplit[1]."-".$dcsplit[2];

$newdate=date("Y-m-d",strtotime($realdr));

if($newdate=="1970-01-01"){
echo $anum.". ".$regNo." | ".$ino." | ".$dc." --> ".$dc." --> ".date("H:i:s")."<br />";
}
else{
echo $anum.". ".$regNo." | ".$ino." | ".$dc." --> ".$newdate." --> ".date("H:i:s")."<br />";
mysql_query("UPDATE patientCharges SET datePaid='$newdate' WHERE itemNo='$ino'");
}
}
else{
echo $anum.". ".$regNo." | ".$ino." | ".$dc." --> ".$dc." --> ".date("H:i:s")."<br />";
}
}

?>
