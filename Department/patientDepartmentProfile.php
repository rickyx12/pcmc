<?php
include("../myDatabase.php");
$registrationNo = $_GET['registrationNo'];
$module = $_GET['module'];
$username = $_GET['username'];
$month = $_GET['month'];
$day = $_GET['day'];
$year = $_GET['year'];
$fromTime_hour = $_GET['fromTime_hour'];
$fromTime_minutes = $_GET['fromTime_minutes'];
$fromTime_seconds = $_GET['fromTime_seconds'];
$toTime_hour = $_GET['toTime_hour'];
$toTime_minutes = $_GET['toTime_minutes'];
$toTime_seconds = $_GET['toTime_seconds'];
$module = $_GET['module'];


$ro = new database();
$ro->getPatientProfile($registrationNo);

if( $module == "PHARMACY" && $ro->getRegistrationDetails_company() != "" ) {
echo "<font color=red>Company</font>: ".$ro->getRegistrationDetails_company()."&nbsp;&nbsp;&nbsp;&nbsp;";
}else {
echo "<font color=green>PhilHealth</font>: ".$ro->getPatientRecord_PHIC()."&nbsp;&nbsp;&nbsp;&nbsp;";

}

echo "<table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";

if( $module == "PHARMACY" ) {
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white class='head'></font>&nbsp;</th>";
}else { }

echo "<th bgcolor='#3b5998'>&nbsp;<font color=white class='head'></font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white class='head'></font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white class='head'></font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white class='head'>Description</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white class='head'>Price</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white class='head'>QTY</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white class='head'>Disc</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white class='head'>Total</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white class='head'>Time</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white class='head'>Date</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white class='head'>User</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white class='head'>Status</font>&nbsp;</th>";
echo "<th bgcolor='#3b5998'>&nbsp;<font color=white class='head'>Payment</font>&nbsp;</th>";
echo "</tr>";
$ro->getPatientChargesByTitle($registrationNo,$module,$month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$username,$module);
echo "</table>";
if( $module == "LABORATORY" ) {
echo "<a href='http://".$ro->getMyUrl()."/COCONUT/Laboratory/labRequest.php?registrationNo=$registrationNo' target='_blank'><font color=red>Print Lab Request</font></a>";
}else {

}


?>
