<?php
include("../../myDatabase.php");
$month = $_GET['month'];
$day = $_GET['day'];
$year = $_GET['year'];
$fromTime_hour = $_GET['fromTime_hour'];
$fromTime_minutes = $_GET['fromTime_minutes'];
$fromTime_seconds = $_GET['fromTime_seconds'];
$toTime_hour = $_GET['toTime_hour'];
$toTime_minutes = $_GET['toTime_minutes'];
$toTime_seconds = $_GET['toTime_seconds'];
$username = $_GET['username'];
$branch = $_GET['branch'];
$type = $_GET['type'];

$ro = new database();

echo "<font size=1>BRANCH:</font> <font size=2 color=red>$branch</font>";
echo "<br><font size=1>DATE:</font> <font size=1>$month-$day-$year</font><br><font size=1>$fromTime_hour:$fromTime_minutes:$fromTime_seconds - $toTime_hour:$toTime_minutes:$toTime_seconds</font>";
$ro->getUnpaidPatient($month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$username,$branch,$type);

?>
