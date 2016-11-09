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
.Arial16BlackBold {font-family: Arial; font-size: 16px; color: #000000; font-weight: bold; }
.ButtonBlueWhite {font-family: Arial;font-size: 12px;font-weight: bold;color: #FFFFFF;background-color: #33B5E5;border: 1px solid #000000;}
.ButtonOrangeWhite {font-family: Arial;font-size: 12px;font-weight: bold;color: #FFFFFF;background-color: #E55833;border: 1px solid #000000;}
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

$sdate=$year."-".$month."-".$day;

echo "
<div align='left'>
<br />
<span class='Arial16BlackBold'>View Manual Payment/s</span>
<br />
<span class='Arial13Black'>".date("M d, Y",strtotime($sdate))."</span>
<br /><br />
<table border='1' cellpadding='0' cellspacing='0' rules='all'>
  <tr>
    <td height='15' bgcolor='#0066FF'><div align='center' class='Arial12WhiteBold'>&nbsp;Delete&nbsp;</div></td>
    <td height='15' bgcolor='#0066FF'><div align='center' class='Arial12WhiteBold'>&nbsp;Edit&nbsp;</div></td>
    <td height='15' bgcolor='#0066FF'><div align='center' class='Arial12WhiteBold'>&nbsp;OR No.&nbsp;</div></td>
    <td height='15' bgcolor='#0066FF'><div align='center' class='Arial12WhiteBold'>&nbsp;Name&nbsp;</div></td>
    <td height='15' bgcolor='#0066FF'><div align='center' class='Arial12WhiteBold'>&nbsp;Payment For&nbsp;</div></td>
    <td height='15' bgcolor='#0066FF'><div align='center' class='Arial12WhiteBold'>&nbsp;Paid Via&nbsp;</div></td>
    <td height='15' bgcolor='#0066FF'><div align='center' class='Arial12WhiteBold'>&nbsp;Amount&nbsp;</div></td>
  </tr>
";

$asql=mysql_query("SELECT paymentNo, registrationNo, amountPaid, timePaid, paymentFor, orNo, paidVia FROM patientPayment WHERE paidBy='$username' AND datePaid='$sdate' ORDER BY timePaid");

while($afetch=mysql_fetch_array($asql)){
$bsql=mysql_query("SELECT registrationNo FROM registrationDetails WHERE registrationNo='".$afetch['registrationNo']."'");
$bcount=mysql_num_rows($bsql);

if($bcount==0){
echo "
  <tr>
    <form name='Delete' method='get' action='manualPayment_deleteconf.php'>
    <input name='username' type='hidden' value='$username' />
    <input name='month' type='hidden' value='$month' />
    <input name='day' type='hidden' value='$day' />
    <input name='year' type='hidden' value='$year' />
    <input name='paymentNo' type='hidden' value='".$afetch['paymentNo']."' />
    <td height='20'><div align='center' class='Arial13Black'>&nbsp;<input name='Del' type='submit' class='ButtonOrangeWhite' value=' X ' />&nbsp;</div></td>
    </form>
    <form name='Delete' method='get' action='manualPayment_edit.php'>
    <input name='username' type='hidden' value='$username' />
    <input name='month' type='hidden' value='$month' />
    <input name='day' type='hidden' value='$day' />
    <input name='year' type='hidden' value='$year' />
    <input name='paymentNo' type='hidden' value='".$afetch['paymentNo']."' />
    <td height='20'><div align='center' class='Arial13Black'>&nbsp;<input name='Del' type='submit' class='ButtonBlueWhite' value=' E ' />&nbsp;</div></td>
    </form>
    <td height='20'><div align='left' class='Arial13Black'>&nbsp;".$afetch['orNo']."&nbsp;</div></td>
    <td height='20'><div align='left' class='Arial13Black'>&nbsp;".strtoupper($afetch['registrationNo'])."&nbsp;</div></td>
    <td height='20'><div align='left' class='Arial13Black'>&nbsp;".strtoupper($afetch['paymentFor'])."&nbsp;</div></td>
    <td height='20'><div align='left' class='Arial13Black'>&nbsp;".strtoupper($afetch['paidVia'])."&nbsp;</div></td>
    <td height='20'><div align='right' class='Arial13Black'>&nbsp;".$afetch['amountPaid']."&nbsp;</div></td>
  </tr>
";
}
}


echo "
  <tr>
   <td height='6' bgcolor='#0066FF'></td>
   <td height='6' bgcolor='#0066FF'></td>
   <td height='6' bgcolor='#0066FF'></td>
   <td height='6' bgcolor='#0066FF'></td>
   <td height='6' bgcolor='#0066FF'></td>
   <td height='6' bgcolor='#0066FF'></td>
   <td height='6' bgcolor='#0066FF'></td>
  </tr>
</table>
";

?>
</body>
</html>
