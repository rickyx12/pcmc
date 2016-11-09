<?php
include("../../myDatabase1.php");
$username = $_GET['username'];
$ro = new database1();

$ro->coconutDesign();


echo "<br><br><Br>";
$ro->coconutBoxStart("500","85");
echo "<br>";
echo "<table border=0>";
echo "<tr>";
echo "<td>Date</td>";
echo "<td>";
$ro->coconutComboBoxStart_short("month");
echo "<option value='Jan'>Jan</option>";
$ro->coconutComboBoxStop();
echo "&nbsp;";
$ro->coconutComboBoxStart_short("day");
for($x=1;$x<32;$x++) {

if( $x < 10 ) {
echo "<option value='0$x'>0$x</option>";
}else {
echo "<option value='$x'>$x</option>";
}

}
$ro->coconutComboBoxStop();

echo "&nbsp;";

$ro->coconutTextBox_short("year",date("Y"));

echo "</td>";
echo "</tr>";
echo "</table>";

echo "<br>";
$ro->coconutButton("Proceed");
$ro->coconutBoxStop();

?>
