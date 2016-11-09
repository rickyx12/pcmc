<?php
include("../../../myDatabase2.php");
$registrationNo = $_POST['registrationNo'];
$username = $_POST['username'];

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

echo "<center><br><br><br><Br>PhilHealth<br><Br>";

echo "<form method='post' action='http://".$ro->getMyUrl()."/COCONUT/patientProfile/Payments/phicPayment.php'>";
$ro->coconutHidden("registrationNo",$registrationNo);
$ro->coconutHidden("username",$username);
$ro->coconutHidden("paymentFor","HOSPITAL BILL");
$ro->coconutHidden("itemNo","");
echo "<input type=submit value='Hospital Bill' class='button1'>
</form>";


$ro->phicPaymentSelection($registrationNo,$username);

/*
echo "<form method='get' action='http://".$ro->getMyUrl()."/COCONUT/patientProfile/Payments/viewCompanyPayment.php'>";
$ro->coconutHidden("registrationNo",$registrationNo);
$ro->coconutHidden("username",$username);
echo "<input type=submit value='View Payment' class='button'>
</form>";
*/


?>
