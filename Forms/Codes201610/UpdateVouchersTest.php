<?php
mysql_connect("localhost","root","shodai");
mysql_select_db("Coconut-PCMC");

$anum=0;
$asql=mysql_query("SELECT controlNo, date FROM vouchers WHERE date LIKE '%sept %' ORDER BY CAST(controlNo AS UNSIGNED), controlNo ASC");
while($afetch=mysql_fetch_array($asql)){
$anum++;
$cno=$afetch['controlNo'];
$dp=$afetch['date'];

if($dp!=''){
$dpsplit=preg_split ("/\ /", $dp);
$realdr="Sep_".$dpsplit[1];
$realdrsplit=preg_split ("/\_/", $realdr);

$realdrsp=$realdrsplit[0]."-".$realdrsplit[1]."-".$realdrsplit[2];

$newdate=date("Y-m-d",strtotime($realdrsp));

if($newdate=="1970-01-01"){
echo $anum.". ".$cno." | ".$dp." --> ".$dp." --> ".date("H:i:s")."<br />";
}
else{
echo $anum.". ".$cno." | ".$dp." --> ".$newdate." --> ".date("H:i:s")."<br />";
mysql_query("UPDATE vouchers SET date='$newdate' WHERE controlNo='$cno'");
}
}
else{
echo $anum.". ".$cno." | ".$dp." --> ".$dp." --> ".date("H:i:s")."<br />";
}
}

?>
