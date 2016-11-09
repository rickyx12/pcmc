<?php
mysql_connect("localhost","root","shodai");
mysql_select_db("Coconut-PCMC");

$anum=0;
$asql=mysql_query("SELECT registrationNo, dateRegistered, dateUnregistered FROM registrationDetails ORDER BY CAST(registrationNo AS UNSIGNED), registrationNo ASC");
while($afetch=mysql_fetch_array($asql)){
$anum++;
$regNo=$afetch['registrationNo'];
$dr=$afetch['dateRegistered'];


echo $anum.". ".$regNo." | ".$dr."<br />";

}

?>
