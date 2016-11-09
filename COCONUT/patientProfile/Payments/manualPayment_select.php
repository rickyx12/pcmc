<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Manual Payment</title>
<style type="text/css">
<!--
.Arial16BlackBold {font-family: Arial; font-size: 16px; color: #000000; font-weight: bold; }
.ButtonBlueWhite {font-family: Arial;font-size: 12px;font-weight: bold;color: #FFFFFF;background-color: #0066FF;border: 1px solid #000000;height: 30px;}
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

echo "
<div align='center'>
<br /><br /><br /><br />
<table border='0' cellpadding='0' cellspacing='0'>
  <tr>
    <td height='30'><div align='center' class='Arial16BlackBold'>Manual Payment/s</div></td>
  </tr>
  <tr>
    <form name='Add' method='get' action='manualPayment.php'>
    <input name='username' type='hidden' value='$username' />
    <td height='40'><div align='center'><input name='Add' type='submit' class='ButtonBlueWhite' value='   Add Manual Payment/s  ' /></div></td>
    </form>
  </tr>
  <tr>
    <form name='View' method='get' action='manualPayment_viewSD.php'>
    <input name='username' type='hidden' value='$username' />
    <td height='40'><div align='center'><input name='View' type='submit' class='ButtonOrangeWhite' value='  View Manual Payment/s  ' /></div></td>
    </form>
  </tr>
</table>
";

?>
</body>
</html>
