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
.textfield {font-family: Arial;font-size: 14px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 1px solid #000000;height: 30px;}
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

$day=date("d");
$month=date("m");
$year=date("Y");

if($month=='01'){$fm01="selected='selected'"; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($month=='02'){$fm01=""; $fm02="selected='selected'"; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($month=='03'){$fm01=""; $fm02=""; $fm03="selected='selected'"; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($month=='04'){$fm01=""; $fm02=""; $fm03=""; $fm04="selected='selected'"; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($month=='05'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05="selected='selected'"; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($month=='06'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06="selected='selected'"; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($month=='07'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07="selected='selected'"; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($month=='08'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08="selected='selected'"; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($month=='09'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09="selected='selected'"; $fm10=""; $fm11=""; $fm12="";}
else if($month=='10'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10="selected='selected'"; $fm11=""; $fm12="";}
else if($month=='11'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11="selected='selected'"; $fm12="";}
else if($month=='12'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="selected='selected'";}

echo "
<div align='center'>
<br /><br /><br />
<span class='Arial16BlackBold'>&nbsp;View Manual Payment/s&nbsp;</span>
<br />
<table border='1' cellpadding='0' cellspacing='0' rules='all'>
  <tr>
    <form name='Add' method='get' action='manualPayment_view.php'>
    <input name='username' type='hidden' value='$username' />
    <td height='40'><div align='center'>&nbsp;
      <select name='month' class='textfield'>
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
      </select>
      <select name='day' class='textfield'>
";

for($z=1;$z<=31;$z++){
if($z<10){$y="0".$z;}else{$y=$z;}

if($y==$day){$sfd="selected='selected'";}else{$sfd="";}

echo "
        <option $sfd>$y</option>
";
}

echo "
      </select>
      <select name='year' class='textfield'>
";

for($a=1930;$a<$year;$a++){
echo"
        <option>$a</option>
";
}

echo"
        <option selected='selected'>$year</option>
";

for($b=($year+1);$b<=($year+5);$b++){
echo"
        <option>$b</option>
";
}

echo "
      </select>
      <input name='View' type='submit' class='ButtonOrangeWhite' value='Submit' />
    &nbsp;</div></td>
    </form>
  </tr>
</table>
";

?>
</body>
</html>
