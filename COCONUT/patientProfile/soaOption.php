<?php
include("../../myDatabase.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];

$ro = new database();

?>

<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/myCSS/coconutCSS.css" />

<style type="text/css">
a { text-decoration:none; color:red; }

.button{
	border: 1px solid #fff;
	color: #000;
	height: 28px;
	width: 381px;
	border-color:blue blue blue blue;
	font-size:15px;
	text-align:center;
	background-color:white;
}


.button1{
	border: 1px solid #fff;
	color: #000;
	height: 28px;
	width: 381px;
	border-color:red red red red;
	font-size:15px;
	text-align:center;
	background-color:white;
}

.button:hover {
background-color:yellow;
color:black;
}

.button1:hover {
background-color:yellow;
color:black;
}


</style>


<?php


echo "<br>";
echo "<br>";
echo "<br><center><div style='border:1px solid #000000; width:495px; height:auto; border-color:black black black black;'>";
echo "<br>";


if( $ro->selectNow("registeredUser","module","username",$username) == "PHILHEALTH" || $ro->selectNow("registeredUser","module","username",$username) == "HMO" ||
$ro->selectNow("registeredUser","module","username",$username) == "PHARMACY" ||
$ro->selectNow("registeredUser","module","username",$username) == "CASHIER" ||
$ro->selectNow("registeredUser","module","username",$username) == "ADMIN" ||
$ro->selectNow("registeredUser","module","username",$username) == "BILLING" ) {


echo "<form method='get' action='/COCONUT/patientProfile/SOAoption/summary-apr26.php'>";
echo "<input type=hidden name='registrationNo' value='$registrationNo' >";
echo "<input type=hidden name='username' value='$username'>";
//echo "<input type=hidden name='show' value='All'>";
echo "<input type=submit value='Default S.O.A' class='button'>";
echo "</form>";


echo "<form method='get' target='_blank' action='/COCONUT/patientProfile/SOAoption/summaryEditable.php'>";
echo "<input type=hidden name='registrationNo' value='$registrationNo' >";
//echo "<input type=hidden name='username' value='$username'>";
//echo "<input type=hidden name='show' value='All'>";
echo "<input type=submit value='Default S.O.A edit' class='button'>";
echo "</form>";



echo "<form method='get' action='soaOption1.php'>";
echo "<input type=hidden name='registrationNo' value='$registrationNo' >";
echo "<input type=hidden name='username' value='$username'>";
echo "<input type=submit value='Customized S.O.A' class='button1'>";
echo "</form>";
}else {
echo " <font color=red>You are not allowed to view the S.O.A</font><br> ";
}
echo "<Br>";
echo "</div>";

?>
