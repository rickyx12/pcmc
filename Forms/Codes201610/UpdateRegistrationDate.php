<?php
mysql_connect("localhost","root","october112016");
mysql_select_db("Coconut");

$anum=0;
$asql=mysql_query("SELECT registrationNo, dateRegistered, dateUnregistered FROM registrationDetails ORDER BY CAST(registrationNo AS UNSIGNED), registrationNo ASC");
while($afetch=mysql_fetch_array($asql)){
$anum++;
$regNo=$afetch['registrationNo'];
$dr=$afetch['dateRegistered'];

if($dr!=''){
$drsplit=preg_split ("/\_/", $dr);
$realdr=$drsplit[0]."-".$drsplit[1]."-".$drsplit[2];

$newdate=date("Y-m-d",strtotime($realdr));

echo $anum.". ".$regNo." | ".$dr." --> ".$newdate;

mysql_query("UPDATE registrationDetails SET dateRegistered='$newdate' WHERE registrationNo='$regNo'");
}
else{
echo $anum.". ".$regNo." | ".$dr." --> ".$dr;
}


$du=$afetch['dateUnregistered'];

if($du!=''){
$dusplit=preg_split ("/\_/", $du);
$realdu=$dusplit[0]."-".$dusplit[1]."-".$dusplit[2];

$newdatedu=date("Y-m-d",strtotime($realdu));

echo " | ".$du." --> ".$newdatedu."<br />";

mysql_query("UPDATE registrationDetails SET dateUnregistered='$newdatedu' WHERE registrationNo='$regNo'");
}
else{
echo " | ".$du." --> ".$du."<br />";
}

}

?>
