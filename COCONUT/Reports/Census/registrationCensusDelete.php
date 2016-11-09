<?php
include("../../../myDatabase.php");
$fromMonth = $_GET['month'];
$fromDay = $_GET['day'];
$fromYear = $_GET['year'];
$toMonth = $_GET['month1'];
$toDay = $_GET['day1'];
$toYear = $_GET['year1'];
$type = $_GET['type'];
$branch = $_GET['branch'];
$username = $_GET['username'];
$registrationNo = $_GET['registrationNo'];

$ro = new database();
$ro->getPatientProfile($registrationNo);

mysql_connect($ro->myHost(),$ro->getUser(),$ro->getPass());
mysql_select_db($ro->getDB());

$asql=mysql_query("SELECT username, module FROM registeredUser WHERE username='$username' AND module='ADMIN'");
$acount=mysql_num_rows($asql);

if($acount!=0){
$ro->coconutFormStart("get","registrationCensusDelete1.php");
$ro->coconutHidden("registrationNo",$registrationNo);
echo "<Br><Br><br><br><br><Br>";
$ro->coconutBoxStart_red("600","120");
echo "<br>	";
echo "<font size=3 color=red>You are about to delete the record of ".$ro->getPatientRecord_lastName().", ".$ro->getPatientRecord_firstName()." <br>with a registration No#: ".$registrationNo." and register by ".$ro->getRegistrationDetails_registeredBy()."</font>";
echo "<br><br>";
echo "<input type='hidden' name='fromMonth' value='$fromMonth' />";
echo "<input type='hidden' name='fromDay' value='$fromDay' />";
echo "<input type='hidden' name='fromYear' value='$fromYear' />";
echo "<input type='hidden' name='toMonth' value='$toMonth' />";
echo "<input type='hidden' name='toDay' value='$toDay' />";
echo "<input type='hidden' name='toYear' value='$toYear' />";
echo "<input type='hidden' name='type' value='$type' />";
echo "<input type='hidden' name='branch' value='$branch' />";
echo "<input type='hidden' name='username' value='$username' />";
$ro->coconutButton("Delete");
$ro->coconutBoxStop();
$ro->coconutFormStop();
}
else{
echo "<Br><Br><br><br><br><Br>";
$ro->coconutBoxStart_red("600","80");
echo "<br>	";
echo "<font size=3 color=red>You are not authorized to delete the record of ".$ro->getPatientRecord_lastName().", ".$ro->getPatientRecord_firstName()." <br>with a registration No#: ".$registrationNo." and register by ".$ro->getRegistrationDetails_registeredBy()."</font>";
echo "<br><br>";
$ro->coconutBoxStop();

echo "<META HTTP-EQUIV='Refresh'CONTENT='3;URL=registrationCensus.php?username=$username&fromYear=$fromYear&toYear=$toYear&fromMonth=$fromMonth&toMonth=$toMonth&fromDay=$fromDay&toDay=$toDay&type=$type&branch=$branch&registrationNo=$registrationNo'>";
}


?>
