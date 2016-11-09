<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Manual Payment</title>
<style type="text/css">
<!--
.Arial12WhiteBold {font-family: Arial; font-size: 12px; color: #FFFFFF; font-weight: bold; }
.Arial12BlackBold {font-family: Arial; font-size: 12px; color: #000000; font-weight: bold; }
.Arial13Black {font-family: Arial; font-size: 13px; color: #000000; }
.Arial16Red {font-family: Arial; font-size: 16px; color: #FF0000; }
.ButtonBlueWhite {font-family: Arial;font-size: 12px;font-weight: bold;color: #FFFFFF;background-color: #33B5E5;border: 1px solid #000000;height: 30px;}
.ButtonOrangeWhite {font-family: Arial;font-size: 12px;font-weight: bold;color: #FFFFFF;background-color: #E55833;border: 1px solid #000000;height: 30px;}
-->
</style>
<script type="text/JavaScript">
<!--
function placeFocus() {
if (document.forms.length > 0) {
var field = document.forms[0];
for (i = 0; i < field.length; i++) {
if ((field.elements[i].type == "text") || (field.elements[i].type == "textarea") || (field.elements[i].type.toString().charAt(0) == "s")) {
document.forms[0].elements[i].focus();
break;
         }
      }
   }
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
</head>

<body onload="placeFocus()">
<?php
include("../../../myDatabase.php");
$cuz = new database();

mysql_connect($cuz->myHost(),$cuz->getUser(),$cuz->getPass());
mysql_select_db($cuz->getDB());

$username=$_GET['username'];
$month=$_GET['month'];
$day=$_GET['day'];
$year=$_GET['year'];
$paymentNo=$_GET['paymentNo'];

$sdate=$year."-".$month."-".$day;

$asql=mysql_query("SELECT registrationNo, amountPaid, timePaid, paymentFor, orNo, paidVia, paidBy FROM patientPayment WHERE paymentNo='$paymentNo'");

while($afetch=mysql_fetch_array($asql)){
$registrationNo=$afetch['registrationNo'];
$amountPaid=$afetch['amountPaid'];
$timePaid=$afetch['timePaid'];
$paymentFor=$afetch['paymentFor'];
$orNo=$afetch['orNo'];
$paidVia=$afetch['paidVia'];
$paidBy=$afetch['paidBy'];
}

$contents=$registrationNo."|".$amountPaid."|".$sdate."|".$timePaid."|".$paymentFor."|".$orNo."|".$paidVia."|".$paidBy;

mysql_query("INSERT INTO `patientPaymentDeleteLog` (`paymentNo`, `contents`, `deletedby`, `datedeleted`) VALUES ('$paymentNo', '$contents', '$username', '".date("YmdHis")."');");

mysql_query("DELETE FROM patientPayment WHERE paymentNo='$paymentNo'");

echo "
<div align='left'>
<br />
<span class='Arial16Red'>Payment deleted!!!</span>
</div>

<META HTTP-EQUIV='Refresh'CONTENT='1;URL=manualPayment_view.php?username=$username&month=$month&day=$day&year=$year'>
";
?>
</body>
</html>
