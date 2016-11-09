<?php
include("../../../myDatabase.php");
$fromMonth = $_GET['fromMonth'];
$fromDay = $_GET['fromDay'];
$fromYear = $_GET['fromYear'];
$toMonth = $_GET['toMonth'];
$toDay = $_GET['toDay'];
$toYear = $_GET['toYear'];
$type = $_GET['type'];
$branch = $_GET['branch'];
$username = $_GET['username'];
$registrationNo = $_GET['registrationNo'];

$ro = new database();

mysql_connect($ro->myHost(),$ro->getUser(),$ro->getPass());
mysql_select_db($ro->getDB());

$asql=mysql_query("SELECT username, module FROM registeredUser WHERE username='$username' AND module='ADMIN'");
$acount=mysql_num_rows($asql);

if($acount!=0){
$ro->deleteNow("registrationDetails","registrationNo",$registrationNo);
echo "<center><Br><br><Br><br><font color=red size=5>Successfully Deleted</font>";

echo "<META HTTP-EQUIV='Refresh'CONTENT='2;URL=registrationCensus.php?username=$username&fromYear=$fromYear&toYear=$toYear&fromMonth=$fromMonth&toMonth=$toMonth&fromDay=$fromDay&toDay=$toDay&type=$type&branch=$branch&registrationNo=$registrationNo'>";
}
else{
echo "<center><Br><br><Br><br><font color=red size=5>You are not authorize to delete this patient.</font>";
echo "<META HTTP-EQUIV='Refresh'CONTENT='2;URL=registrationCensus.php?username=$username&fromYear=$fromYear&toYear=$toYear&fromMonth=$fromMonth&toMonth=$toMonth&fromDay=$fromDay&toDay=$toDay&type=$type&branch=$branch&registrationNo=$registrationNo'>";
}




?>
