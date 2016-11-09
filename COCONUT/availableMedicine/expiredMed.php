<?php
include("../../myDatabase.php");
$username = $_GET['username'];


$ro = new database();
$ro->coconutDesign();
echo "<br><Br><br><br>";
$ro->coconutBoxStart("600","130");
echo "<center><br>";
$ro->coconutFormStart("get","expiredMed1.php");
echo $ro->coconutText("From Date:&nbsp;");
$ro->coconutComboBoxStart_short("month");
echo "<option value='Jan'>Jan</option>";
echo "<option value='Feb'>Feb</option>";
echo "<option value='Mar'>Mar</option>";
echo "<option value='Apr'>Apr</option>";
echo "<option value='May'>May</option>";
echo "<option value='Jun'>Jun</option>";
echo "<option value='Jul'>Jul</option>";
echo "<option value='Aug'>Aug</option>";
echo "<option value='Sep'>Sep</option>";
echo "<option value='Oct'>Oct</option>";
echo "<option value='Nov'>Nov</option>";
echo "<option value='Dec'>Dec</option>";
$ro->coconutComboBoxStop();
echo "&nbsp;";
$ro->coconutComboBoxStart_short("day");
for($x=1;$x<=31;$x++) {
if($x<10) {
echo "<option value='0$x'>0$x</option>";
}else {
echo "<option value='$x'>$x</option>";
}

}
$ro->coconutComboBoxStop();
echo "&nbsp;";
$ro->coconutComboBoxStart_short("year");

for($year=date("Y");$year>=2000;$year--) {
echo "<option>$year</option>";
}

$ro->coconutComboBoxStop();
echo "<Br><br>";

echo $ro->coconutText("&nbsp;&nbsp;To Date:&nbsp;");
$ro->coconutComboBoxStart_short("month1");
echo "<option value='Jan'>Jan</option>";
echo "<option value='Feb'>Feb</option>";
echo "<option value='Mar'>Mar</option>";
echo "<option value='Apr'>Apr</option>";
echo "<option value='May'>May</option>";
echo "<option value='Jun'>Jun</option>";
echo "<option value='Jul'>Jul</option>";
echo "<option value='Aug'>Aug</option>";
echo "<option value='Sep'>Sep</option>";
echo "<option value='Oct'>Oct</option>";
echo "<option value='Nov'>Nov</option>";
echo "<option value='Dec'>Dec</option>";
$ro->coconutComboBoxStop();
echo "&nbsp;";
$ro->coconutComboBoxStart_short("day1");
for($x=1;$x<=31;$x++) {
if($x<10) {
echo "<option value='0$x'>0$x</option>";
}else {
echo "<option value='$x'>$x</option>";
}

}
$ro->coconutComboBoxStop();
echo "&nbsp;";
$ro->coconutComboBoxStart_short("year1");

for($year=date("Y");$year>=2000;$year--) {
echo "<option>$year</option>";
}

$ro->coconutComboBoxStop();

echo "<br><br>";
$ro->coconutButton("Proceed");
$ro->coconutHidden("username",$username);
$ro->coconutFormStop();
$ro->coconutBoxStop();

?>
