<?php
mysql_connect("localhost","root","october112016");
mysql_select_db("Coconut");

$anum=0;
$asql=mysql_query("SELECT paymentNo, registrationNo, datePaid FROM patientPayment ORDER BY CAST(registrationNo AS UNSIGNED), registrationNo ASC");
while($afetch=mysql_fetch_array($asql)){
$anum++;
$pno=$afetch['paymentNo'];
$regNo=$afetch['registrationNo'];
$dp=$afetch['datePaid'];

if($dp!=''){
$dpsplit=preg_split ("/\_/", $dp);
$realdr=$dpsplit[0]."-".$dpsplit[1]."-".$dpsplit[2];

$newdate=date("Y-m-d",strtotime($realdr));

if($newdate=="1970-01-01"){
echo $anum.". ".$regNo." | ".$pno." | ".$dp." --> ".$dp." --> ".date("H:i:s")."<br />";
}
else{
echo $anum.". ".$regNo." | ".$pno." | ".$dp." --> ".$newdate." --> ".date("H:i:s")."<br />";
mysql_query("UPDATE patientPayment SET datePaid='$newdate' WHERE paymentNo='$pno'");
}
}
else{
echo $anum.". ".$regNo." | ".$pno." | ".$dp." --> ".$dp." --> ".date("H:i:s")."<br />";
}
}

?>
