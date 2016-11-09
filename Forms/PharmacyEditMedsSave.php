<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ADMISSION AND DISCHARGE RECORD</title>
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

function printF(printData){
	var a = window.open ('',  '',"status=1,scrollbars=1, width=auto,height=auto");
	a.document.write(document.getElementById(printData).innerHTML.replace(/<a\/?[^>]+>/gi, ''));
	a.document.close();
	a.focus();
	a.print();
	a.close();
}
//-->
</script>
</head>

<body onload="placeFocus()">
<?php
include("../myDatabase.php");
$cuz = new database();

mysql_connect($cuz->myHost(),$cuz->getUser(),$cuz->getPass());
mysql_select_db($cuz->getDB());

$module=$_GET['module'];
$username=$_GET['username'];
$inventoryCode=$_GET['inventoryCode'];
$price=$_GET['price'];
$expirationYear=$_GET['expirationYear'];
$expirationMonth=$_GET['expirationMonth'];
$expirationDay=$_GET['expirationDay'];

$expiration=$expirationYear."-".$expirationMonth."-".$expirationDay;

echo "
<div align='center' id='printData'>
<style type='text/css'>
<!--
.style1 {font-family: Arial;font-size: 14px;color: #000000;font-weight: bold;}
.style2 {font-family: Arial;font-size: 16px;color: #000000;font-weight: bold;}
.style3 {text-decoration: none;font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
.style4 {font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
.style5 {font-family: Arial;font-size: 14px;color: #000000;}
.style6 {font-family: Arial;font-size: 10px;color: #FFFFFF;}
.style7 {font-family: Arial;font-size: 12px;color: #FFFFFF;font-weight: bold;}
.style8 {font-family: Arial;font-size: 16px;color: #FF0000;font-weight: bold;}
.table2Top2Bottom2Left1Right {border-top: 2px solid #000000;border-bottom: 2px solid #000000;border-left: 2px solid #000000;border-right: 1px solid #000000;}
.table2Top2Bottom1Left2Right {border-top: 2px solid #000000;border-bottom: 2px solid #000000;border-left: 1px solid #000000;border-right: 2px solid #000000;}
.table2Bottom2Left1Right {border-bottom: 2px solid #000000;border-left: 2px solid #000000;border-right: 1px solid #000000;}
.table2Bottom1Left2Right {border-bottom: 2px solid #000000;border-left: 1px solid #000000;border-right: 2px solid #000000;}
.button01 {font-family: Arial;font-size: 16px;font-weight: bold;color: #0066FF;background-color: #FFFFFF;border: 1px solid #0066FF;}
.textfield01 {font-family: Arial;font-size: 12px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 1px solid #000000;height: 25px;width: 200px;}
.textfield02 {font-family: Arial;font-size: 12px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 1px solid #000000;height: 25px;}
.doubleUnderline {text-decoration:underline;border-bottom: 1px solid #000;font-family: Arial;font-size: 14px;color: #000000;}
-->
</style>
<br />
<br />
";

if(!is_numeric($price)){
echo "
<span class='style8'>INCORRECT PRICE!!! TRY AGAIN!!!</span>
";
echo "<META HTTP-EQUIV='Refresh'CONTENT='3;URL=PharmacyEditMeds.php?username=$username&module=$module&inventoryCode=$inventoryCode&pricetrim=$price'>";
}
else {
echo "
<span class='style2'>SAVING CHANGES...</span>
";
mysql_query("UPDATE inventory SET expiration='$expiration', Added='sellingPrice_$price' WHERE inventoryCode='$inventoryCode'");
echo "<META HTTP-EQUIV='Refresh'CONTENT='0;URL=PharmacyExpiryMeds.php?username=$username&module=$module'>";
}

echo "
</div>
";
?>
</body>
</html>
