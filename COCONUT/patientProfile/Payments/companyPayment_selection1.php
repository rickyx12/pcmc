<?php
include("../../../myDatabase2.php");
$registrationNo = $_POST['registrationNo'];
$username = $_POST['username'];
$companyName = $_POST['companyName'];
$columnToGet = $_POST['columnToGet'];
$ro = new database2();

?>
<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/BE1EA/coconutCSS.css" />
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

echo "<center><br><br><br><Br>Company<br><Br>";

echo "<form method='post' action='http://".$ro->getMyUrl()."/COCONUT/patientProfile/Payments/companyPayment.php'>";
$ro->coconutHidden("registrationNo",$registrationNo);
$ro->coconutHidden("username",$username);
$ro->coconutHidden("companyName",$companyName);
$ro->coconutHidden("columnToGet",$columnToGet);
echo "<input type=submit value='Hospital Bill' class='button1'>
</form>";


$ro->companyPaymentSelection($registrationNo,$username,$companyName,$columnToGet);

/*
echo "<form method='get' action='http://".$ro->getMyUrl()."/COCONUT/patientProfile/Payments/viewCompanyPayment.php'>";
$ro->coconutHidden("registrationNo",$registrationNo);
$ro->coconutHidden("username",$username);
echo "<input type=submit value='View Payment' class='button'>
</form>";
*/


?>
