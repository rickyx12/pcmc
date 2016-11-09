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

echo "
<a href='#' onClick=printF('printData') style=text-decoration:none; color:black;>PRINT</a>
<div align='center' id='printData'>
<style type='text/css'>
<!--
.style1 {font-family: Arial;font-size: 14px;color: #000000;font-weight: bold;}
.style2 {font-family: Arial;font-size: 14px;color: #FF0000;font-weight: bold;}
.style3 {text-decoration: none;font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
.style4 {font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
.style5 {font-family: Arial;font-size: 14px;color: #000000;}
.style6 {font-family: Arial;font-size: 10px;color: #FFFFFF;}
.style7 {font-family: Arial;font-size: 12px;color: #FFFFFF;font-weight: bold;}
.style8 {font-family: Arial;font-size: 10px;color: #000000;font-weight: bold;}
.table1Left {border-left: 1px solid #000000;}
.table1Right {border-right: 1px solid #000000;}
.table1Left1Right {border-left: 1px solid #000000;border-right: 1px solid #000000;}
.table1Bottom {border-bottom: 1px solid #000000;}
.table1Bottom1Left {border-bottom: 1px solid #000000;border-left: 1px solid #000000;}
.table1Bottom1Right {border-bottom: 1px solid #000000;border-right: 1px solid #000000;}
.table1Bottom1Left1Right {border-bottom: 1px solid #000000;border-left: 1px solid #000000;border-right: 1px solid #000000;}
.table1Top {border-top: 1px solid #000000;}
.table1Top1Bottom {border-top: 1px solid #000000;border-bottom: 1px solid #000000;}
.table2Top2Bottom {border-top: 2px solid #000000;border-bottom: 2px solid #000000;}
.table2Bottom {border-bottom: 2px solid #000000;}
.table1Top1Bottom1Left {border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-left: 1px solid #000000;}
.table1Top1Bottom1Right {border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-right: 1px solid #000000;}
.table1Top1Bottom1Left1Right {border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-left: 1px solid #000000;border-right: 1px solid #000000;}
.button01 {font-family: Arial;font-size: 12px;font-weight: bold;color: #0066FF;background-color: #FFFFFF;border: 1px solid #0066FF;}
.doubleUnderline {text-decoration:underline;border-bottom: 1px solid #000;font-family: Arial;font-size: 14px;color: #000000;}
tr:hover { background-color:#66FF00;}
-->
</style>

<table border='0' witdh='100%' cellspacing='0' cellpadding='0'>
  <tr>
    <td><div align='center' class='style1'>Expiry and Expired Medicines</div></td>
  </tr>
  <tr>
    <td height='20'></td>
  </tr>
  <tr>
    <td bgcolor='#FFFFFF'><div align='center'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
      <tr>
        <td width='auto' height='20' class='table2Top2Bottom' bgcolor='#0066FF'><div align='center' class='style7'>&nbsp;Edit Expiration&nbsp;</div></td>
        <td width='auto' height='20' class='table2Top2Bottom' bgcolor='#0066FF'><div align='center' class='style7'>&nbsp;Description&nbsp;</div></td>
        <td width='auto' height='20' class='table2Top2Bottom' bgcolor='#0066FF'><div align='center' class='style7'>&nbsp;Generic&nbsp;</div></td>
        <td width='auto' height='20' class='table2Top2Bottom' bgcolor='#0066FF'><div align='center' class='style7'>&nbsp;Quantity&nbsp;</div></td>
        <td width='auto' height='20' class='table2Top2Bottom' bgcolor='#0066FF'><div align='center' class='style7'>&nbsp;Price&nbsp;</div></td>
        <td width='auto' height='20' class='table2Top2Bottom' bgcolor='#0066FF'><div align='center' class='style7'>&nbsp;Expiration Date&nbsp;</div></td>
        <td width='auto' height='20' class='table2Top2Bottom' bgcolor='#0066FF'><div align='center' class='style7'>&nbsp;Status&nbsp;</div></td>
      </tr>
";

$pdate=date("Ymd");
$limitdate = strtotime(date("Ymd", strtotime($pdate)) . " +1 month");
$limitdatefmt=date("Ymd",$limitdate);

$asql=mysql_query("SELECT inventoryCode, description, genericName, quantity, expiration, inventoryType, Added, status, chargeControl FROM inventory WHERE status NOT LIKE 'DELETED_%%%%' AND quantity > '0' AND inventoryType='medicine' ORDER BY expiration DESC, description");
while($afetch=mysql_fetch_array($asql)){
$expiration=$afetch['expiration'];
$expirationfmt=date("Ymd", strtotime($expiration));

if($expirationfmt<=$limitdatefmt){
$inventoryCode=$afetch['inventoryCode'];
$description=$afetch['description'];
$genericName=$afetch['genericName'];
$quantity=$afetch['quantity'];
$Added=$afetch['Added'];
$chargeControl=$afetch['chargeControl'];

$expirationfmt2=date("M d, Y", strtotime($expiration));

$price=preg_split('[_]',$Added);
$pricetrim=trim($price[1]);

if(!is_numeric($pricetrim)){echo $afetch['inventoryCode']."<br>";}

echo "
      <tr>
        <form name='Edit' method='get' action='PharmacyEditMeds.php'>
        <input name='username' type='hidden' value='$username' />
        <input name='module' type='hidden' value='$module' />
        <input name='inventoryCode' type='hidden' value='$inventoryCode' />
        <input name='pricetrim' type='hidden' value='$pricetrim' />
        <td width='auto' height='20' class='table1Bottom1Left'><div align='center' class='style5'><input name='EditExpiration' type='submit' class='button01' value='Edit' /></div></td>
        </form>
        <td width='auto' height='20' class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;$description&nbsp;</div></td>
        <td width='auto' height='20' class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;$genericName&nbsp;</div></td>
        <td width='auto' height='20' class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;$quantity&nbsp;</div></td>
        <td width='auto' height='20' class='table1Bottom1Left'><div align='right' class='style5'>&nbsp;".number_format($pricetrim,2)."&nbsp;</div></td>
        <td width='auto' height='20' class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;$expirationfmt2&nbsp;</div></td>
        <td width='auto' height='20' class='table1Bottom1Left1Right'><div align='center' class='style5'>&nbsp;$chargeControl&nbsp;</div></td>
      </tr>
";
}
}
echo "
    </table></div></td>
  </tr>
</table>
</div>
";
?>
</body>
</html>
