<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>O. R. Date Range</title>
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

function printF(printData)
{
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

$username=mysql_real_escape_string($_GET['username']);

$pm=date("m");
$pd=date("d");
$py=date("Y");

if($pm=='01'){$sfm01="selected='selected'";$sfm02="";$sfm03="";$sfm04="";$sfm05="";$sfm06="";$sfm07="";$sfm08="";$sfm09="";$sfm10="";$sfm11="";$sfm12="";$stm01="selected='selected'";$stm02="";$stm03="";$stm04="";$stm05="";$stm06="";$stm07="";$stm08="";$stm09="";$stm10="";$stm11="";$stm12="";}
else if($pm=='02'){$sfm01="";$sfm02="selected='selected'";$sfm03="";$sfm04="";$sfm05="";$sfm06="";$sfm07="";$sfm08="";$sfm09="";$sfm10="";$sfm11="";$sfm12="";$stm01="";$stm02="selected='selected'";$stm03="";$stm04="";$stm05="";$stm06="";$stm07="";$stm08="";$stm09="";$stm10="";$stm11="";$stm12="";}
else if($pm=='03'){$sfm01="";$sfm02="";$sfm03="selected='selected'";$sfm04="";$sfm05="";$sfm06="";$sfm07="";$sfm08="";$sfm09="";$sfm10="";$sfm11="";$sfm12="";$stm01="";$stm02="";$stm03="selected='selected'";$stm04="";$stm05="";$stm06="";$stm07="";$stm08="";$stm09="";$stm10="";$stm11="";$stm12="";}
else if($pm=='04'){$sfm01="";$sfm02="";$sfm03="";$sfm04="selected='selected'";$sfm05="";$sfm06="";$sfm07="";$sfm08="";$sfm09="";$sfm10="";$sfm11="";$sfm12="";$stm01="";$stm02="";$stm03="";$stm04="selected='selected'";$stm05="";$stm06="";$stm07="";$stm08="";$stm09="";$stm10="";$stm11="";$stm12="";}
else if($pm=='05'){$sfm01="";$sfm02="";$sfm03="";$sfm04="";$sfm05="selected='selected'";$sfm06="";$sfm07="";$sfm08="";$sfm09="";$sfm10="";$sfm11="";$sfm12="";$stm01="";$stm02="";$stm03="";$stm04="";$stm05="selected='selected'";$stm06="";$stm07="";$stm08="";$stm09="";$stm10="";$stm11="";$stm12="";}
else if($pm=='06'){$sfm01="";$sfm02="";$sfm03="";$sfm04="";$sfm05="";$sfm06="selected='selected'";$sfm07="";$sfm08="";$sfm09="";$sfm10="";$sfm11="";$sfm12="";$stm01="";$stm02="";$stm03="";$stm04="";$stm05="";$stm06="selected='selected'";$stm07="";$stm08="";$stm09="";$stm10="";$stm11="";$stm12="";}
else if($pm=='07'){$sfm01="";$sfm02="";$sfm03="";$sfm04="";$sfm05="";$sfm06="";$sfm07="selected='selected'";$sfm08="";$sfm09="";$sfm10="";$sfm11="";$sfm12="";$stm01="";$stm02="";$stm03="";$stm04="";$stm05="";$stm06="";$stm07="selected='selected'";$stm08="";$stm09="";$stm10="";$stm11="";$stm12="";}
else if($pm=='08'){$sfm01="";$sfm02="";$sfm03="";$sfm04="";$sfm05="";$sfm06="";$sfm07="";$sfm08="selected='selected'";$sfm09="";$sfm10="";$sfm11="";$sfm12="";$stm01="";$stm02="";$stm03="";$stm04="";$stm05="";$stm06="";$stm07="";$stm08="selected='selected'";$stm09="";$stm10="";$stm11="";$stm12="";}
else if($pm=='09'){$sfm01="";$sfm02="";$sfm03="";$sfm04="";$sfm05="";$sfm06="";$sfm07="";$sfm08="";$sfm09="selected='selected'";$sfm10="";$sfm11="";$sfm12="";$stm01="";$stm02="";$stm03="";$stm04="";$stm05="";$stm06="";$stm07="";$stm08="";$stm09="selected='selected'";$stm10="";$stm11="";$stm12="";}
else if($pm=='10'){$sfm01="";$sfm02="";$sfm03="";$sfm04="";$sfm05="";$sfm06="";$sfm07="";$sfm08="";$sfm09="";$sfm10="selected='selected'";$sfm11="";$sfm12="";$stm01="";$stm02="";$stm03="";$stm04="";$stm05="";$stm06="";$stm07="";$stm08="";$stm09="";$stm10="selected='selected'";$stm11="";$stm12="";}
else if($pm=='11'){$sfm01="";$sfm02="";$sfm03="";$sfm04="";$sfm05="";$sfm06="";$sfm07="";$sfm08="";$sfm09="";$sfm10="";$sfm11="selected='selected'";$sfm12="";$stm01="";$stm02="";$stm03="";$stm04="";$stm05="";$stm06="";$stm07="";$stm08="";$stm09="";$stm10="";$stm11="selected='selected'";$stm12="";}
else if($pm=='12'){$sfm01="";$sfm02="";$sfm03="";$sfm04="";$sfm05="";$sfm06="";$sfm07="";$sfm08="";$sfm09="";$sfm10="";$sfm11="";$sfm12="selected='selected'";$stm01="";$stm02="";$stm03="";$stm04="";$stm05="";$stm06="";$stm07="";$stm08="";$stm09="";$stm10="";$stm11="";$stm12="selected='selected'";}

echo "
<div align='center'>
<style type='text/css'>
<!--
.style1 {font-family: Arial;font-size: 16px;color: #000000;font-weight: bold;}
.style2 {font-family: 'Times New Roman';font-size: 16px;color: #FF0000;font-weight: bold;}
.style3 {text-decoration: none;font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
.style4 {font-family: Arial;font-size: 12px;color: #FFFFFF;font-weight: bold;}
.style5 {font-family: Arial;font-size: 14px;color: #000000;}
.style6 {font-family: Arial;font-size: 10px;color: #FFFFFF;}
.style7 {font-family: Arial;font-size: 14px;color: #000000;font-weight: bold;}
.style8 {font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
.table1Left {border-left: 1px solid #000000;}
.table1Right {border-right: 1px solid #000000;}
.table1Left1Right {border-left: 1px solid #000000;border-right: 1px solid #000000;}
.table1Bottom {border-bottom: 1px solid #000000;}
.table1Bottom1Left {border-bottom: 1px solid #000000;border-left: 1px solid #000000;}
.table1Bottom1Right {border-bottom: 1px solid #000000;border-right: 1px solid #000000;}
.table1Bottom1Left1Right {border-bottom: 1px solid #000000;border-left: 1px solid #000000;border-right: 1px solid #000000;}
.table1Top {border-top: 1px solid #000000;}
.table1Top2Bottom {border-top: 1px solid #000000;border-bottom: 2px solid #000000;}
.table2Top2Bottom {border-top: 2px solid #000000;border-bottom: 2px solid #000000;}
.table1Top1Bottom1Left {border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-left: 1px solid #000000;}
.table1Top1Bottom1Right {border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-right: 1px solid #000000;}
.table1Top1Bottom1Left1Right {border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-left: 1px solid #000000;border-right: 1px solid #000000;}
.textfield1 {font-family: Arial;font-size: 14px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 2px solid #000000;height: 25px;}
.textfield2 {font-family: Arial;font-size: 14px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 2px solid #000000;height: 31px;}
.button1 {font-family: Arial;font-size: 12px;font-weight: bold;color: #FFFFFF;background-color: #0033FF;border: 1px solid #000000;height: 31px;}
.doubleUnderline {text-decoration:underline;border-bottom: 1px solid #000;font-family: Arial;font-size: 14px;color: #000000;}
tr:hover { background-color:#66FF00;}
-->
</style>


<div align='left'>
<br />
<br />
<table border='0' cellpadding='0' cellspacing='0'>
  <form name='Search' method='get' action='SearchORDR.php'>
  <tr>
    <td bgcolor='#FFFFFF'><div align='left' class='style7'>&nbsp;From&nbsp;</td>
    <td bgcolor='#FFFFFF'>
      <select name='fmonth' class='textfield1'>
        <option value='01' $sfm01>Jan</option>
        <option value='02' $sfm02>Feb</option>
        <option value='03' $sfm03>Mar</option>
        <option value='04' $sfm04>Apr</option>
        <option value='05' $sfm05>May</option>
        <option value='06' $sfm06>Jun</option>
        <option value='07' $sfm07>Jul</option>
        <option value='08' $sfm08>Aug</option>
        <option value='09' $sfm09>Sep</option>
        <option value='10' $sfm10>Oct</option>
        <option value='11' $sfm11>Nov</option>
        <option value='12' $sfm12>Dec</option>
      </select>
      <select name='fday' class='textfield1'>
";

for($a=1;$a<=31;$a++){
if($a<10){$ra="0".$a;}else{$ra=$a;}

if($pd==$ra){$sfd="selected='selected'";}
echo "
        <option $sfd>$ra</option>
";
}

echo "
      </select>
      <select name='fyear' class='textfield1'>
";

for($b=1970;$b<$py;$b++){
echo "
        <option>$b</option>
";
}

echo "
        <option selected='selected'>$py</option>
";

for($c=($py+1);$c<=($py+10);$c++){
echo "
        <option>$c</option>
";
}

echo "
        <option></option>
      </select>
    </td>
    <td bgcolor='#FFFFFF'><div align='center' class='style7'>&nbsp;To&nbsp;</td>
    <td bgcolor='#FFFFFF'>
      <select name='tmonth' class='textfield1'>
        <option value='01' $stm01>Jan</option>
        <option value='02' $stm02>Feb</option>
        <option value='03' $stm03>Mar</option>
        <option value='04' $stm04>Apr</option>
        <option value='05' $stm05>May</option>
        <option value='06' $stm06>Jun</option>
        <option value='07' $stm07>Jul</option>
        <option value='08' $stm08>Aug</option>
        <option value='09' $stm09>Sep</option>
        <option value='10' $stm10>Oct</option>
        <option value='11' $stm11>Nov</option>
        <option value='12' $stm12>Dec</option>
      </select>
      <select name='tday' class='textfield1'>
";

for($d=1;$d<=31;$d++){
if($d<10){$rd="0".$d;}else{$rd=$d;}

if($pd==$rd){$std="selected='selected'";}else{$std="";}
echo "
        <option $std>$rd</option>
";
}

echo "
      </select>
      <select name='tyear' class='textfield1'>
";

for($e=1970;$e<$py;$e++){
echo "
        <option>$e</option>
";
}

echo "
        <option selected='selected'>$py</option>
";

for($f=($py+1);$f<=($py+10);$f++){
echo "
        <option>$f</option>
";
}

echo "
        <option></option>
      </select>
    </td>
    <td bgcolor='#FFFFFF'><input type='submit' name='Submit' class='button1' value=' SEARCH ' /></td>
  </tr>
  <input name='username' type='hidden' value='$username' />
  </form>
</table>
</div>
";
?>
</body>
</html>
