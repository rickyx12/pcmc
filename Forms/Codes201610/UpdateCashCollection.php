<?php
mysql_connect("localhost","root","october112016");
mysql_select_db("Coconut");

$anum=0;
$asql=mysql_query("SELECT collectionNo, date FROM cashCollection ORDER BY CAST(collectionNo AS UNSIGNED), collectionNo ASC");
while($afetch=mysql_fetch_array($asql)){
$anum++;
$cno=$afetch['collectionNo'];
$dp=$afetch['date'];

if($dp!=''){
$dpsplit=preg_split ("/\_/", $dp);
$realdr=$dpsplit[0]."-".$dpsplit[1]."-".$dpsplit[2];

$newdate=date("Y-m-d",strtotime($realdr));

if($newdate=="1970-01-01"){
echo $anum.". ".$cno." | ".$dp." --> ".$dp." --> ".date("H:i:s")."<br />";
}
else{
echo $anum.". ".$cno." | ".$dp." --> ".$newdate." --> ".date("H:i:s")."<br />";
mysql_query("UPDATE cashCollection SET date='$newdate' WHERE collectionNo='$cno'");
}
}
else{
echo $anum.". ".$cno." | ".$dp." --> ".$dp." --> ".date("H:i:s")."<br />";
}
}

?>
