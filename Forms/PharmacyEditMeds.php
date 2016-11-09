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
$pricetrim=$_GET['pricetrim'];

$asql=mysql_query("SELECT inventoryCode, description, genericName, quantity, expiration, inventoryType, Added, status, chargeControl FROM inventory WHERE inventoryCode='$inventoryCode'");
while($afetch=mysql_fetch_array($asql)){$description=$afetch['description'];$genericName=$afetch['genericName'];$expiration=$afetch['expiration'];}

$expirationstr=strtotime($expiration);
$expirationYear=date("Y",$expirationstr);
$expirationMonth=date("m",$expirationstr);
$expirationDay=date("d",$expirationstr);

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
.style8 {font-family: Arial;font-size: 10px;color: #000000;font-weight: bold;}
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
<span class='style2'>EDIT MEDICINE</span>
<br />
<br />
<form name='Edit' method='get' action='PharmacyEditMedsSave.php'>
<table width='400' border='0' bordercolor='#000000' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='auto' height='35' class='table2Top2Bottom2Left1Right'><div align='left' class='style1'>&nbsp;Description&nbsp;</div></td>
    <td width='auto' height='35'  class='table2Top2Bottom1Left2Right'><div align='left' class='style1'>&nbsp;<input name='description' type='text' class='textfield01' value='$description' readonly='readonly' />&nbsp;</div></td>
  </tr>
  <tr>
    <td height='35' class='table2Bottom2Left1Right'><div align='left' class='style1'>&nbsp;Generic Name&nbsp;</div></td>
    <td height='35' class='table2Bottom1Left2Right'><div align='left' class='style1'>&nbsp;<input name='genericName' type='text' class='textfield01' value='$genericName' readonly='readonly' />&nbsp;</div></td>
  </tr>
  <tr>
    <td height='35' class='table2Bottom2Left1Right'><div align='left' class='style1'>&nbsp;Price&nbsp;</div></td>
    <td height='35' class='table2Bottom1Left2Right'><div align='left' class='style1'>&nbsp;<input name='price' type='text' class='textfield02' value='$pricetrim' size='10' />&nbsp;</div></td>
  </tr>
  <tr>
    <td height='35' class='table2Bottom2Left1Right'><div align='left' class='style1'>&nbsp;Expiration&nbsp;</div></td>
    <td height='35' class='table2Bottom1Left2Right'><div align='left' class='style1'>
      &nbsp;<select name='expirationMonth' class='textfield02'>
";

if($expirationMonth=='01'){$fm01="selected='selected'"; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($expirationMonth=='02'){$fm01=""; $fm02="selected='selected'"; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($expirationMonth=='03'){$fm01=""; $fm02=""; $fm03="selected='selected'"; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($expirationMonth=='04'){$fm01=""; $fm02=""; $fm03=""; $fm04="selected='selected'"; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($expirationMonth=='05'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05="selected='selected'"; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($expirationMonth=='06'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06="selected='selected'"; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($expirationMonth=='07'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07="selected='selected'"; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($expirationMonth=='08'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08="selected='selected'"; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($expirationMonth=='09'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09="selected='selected'"; $fm10=""; $fm11=""; $fm12="";}
else if($expirationMonth=='10'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10="selected='selected'"; $fm11=""; $fm12="";}
else if($expirationMonth=='11'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11="selected='selected'"; $fm12="";}
else if($expirationMonth=='12'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="selected='selected'";}

echo "
        <option value='01' $fm01>Jan</option>
        <option value='02' $fm02>Feb</option>
        <option value='03' $fm03>Mar</option>
        <option value='04' $fm04>Apr</option>
        <option value='05' $fm05>May</option>
        <option value='06' $fm06>Jun</option>
        <option value='07' $fm07>Jul</option>
        <option value='08' $fm08>Aug</option>
        <option value='09' $fm09>Sep</option>
        <option value='10' $fm10>Oct</option>
        <option value='11' $fm11>Nov</option>
        <option value='12' $fm12>Dec</option>
";


echo "
      </select>
      <select name='expirationDay' class='textfield02'>
";

for($z=1;$z<=31;$z++){
if($z<10){$y="0".$z;}else{$y=$z;}

if($y==$expirationDay){$sfd="selected='selected'";}else{$sfd="";}

echo "
        <option $sfd>$y</option>
";
}

echo "
      </select>
      <select name='expirationYear' class='textfield02'>
";

for($a=($expirationYear-1);$a<$expirationYear;$a++){
echo "
        <option>$a</option>
";
}

echo "
        <option selected='selected'>$expirationYear</option>
";

for($b=($expirationYear+1);$b<=($expirationYear+60);$b++){
echo "
        <option>$b</option>
";
}

echo "
      </select>
    &nbsp;</div></td>
  </tr>
  <tr>
    <td height='60' colspan='2'><div align='center'><input name='Edit' type='submit' class='button01' value='Save' /></div></td>
  </tr>
</table>
<input name='username' type='hidden' value='$username' />
<input name='module' type='hidden' value='$module' />
<input name='inventoryCode' type='hidden' value='$inventoryCode' />
</form>
</div>
";
?>
</body>
</html>
