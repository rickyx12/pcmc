<?php
mysql_connect("localhost","root","shodai");
mysql_select_db("Coconut-PCMC");


$asql=mysql_query("SELECT patientNo, completeName FROM patientRecord ORDER BY CAST(patientNo AS UNSIGNED), patientNo ASC");
while($afetch=mysql_fetch_array($asql)){
$bsql=mysql_query("SELECT registrationNo FROM registrationDetails WHERE patientNo=".$afetch['patientNo']."");
$bcount=mysql_num_rows($bsql);

echo $afetch['patientNo']."-".$afetch['completeName']." | ".$bcount."<br />";

}
?>
