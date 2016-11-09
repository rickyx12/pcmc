<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Deleted Request</title>
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

$fmonth=mysql_real_escape_string($_GET['fmonth']);
$fday=mysql_real_escape_string($_GET['fday']);
$fyear=mysql_real_escape_string($_GET['fyear']);

$fdate=$fyear."-".$fmonth."-".$fday;
$fdatestr=strtotime($fdate);
$fdatefmt=date("F d, Y",$fdatestr);

echo "
<a href='#' onClick=printF('printData') style='font-family: Arial; text-decoration:none; color:black;'>PRINT</a>
<br />
<br />
<div align='center' id='printData'>
<style type='text/css'>
<!--
.style1 {font-family: Arial;font-size: 16px;color: #000000;font-weight: bold;}
.style2 {font-family: 'Times New Roman';font-size: 16px;color: #FF0000;font-weight: bold;}
.style3 {text-decoration: none;font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
.style4 {font-family: Arial;font-size: 12px;color: #FFFFFF;font-weight: bold;}
.style5 {font-family: Arial;font-size: 11px;color: #000000;}
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
.doubleUnderline {text-decoration:underline;border-bottom: 1px solid #000;font-family: Arial;font-size: 14px;color: #000000;}
tr:hover { background-color:#66FF00;}
-->
</style>

<table width='100%' border='0' cellpadding='0' cellspacing='0'>
  <tr>
    <td colspan='14' bgcolor='#FFFFFF'><div align='center'><img src='../COCONUT/myImages/mendero.png' height='120' width='auto' /></div></td>
  </tr>
  <tr>
    <td><div align='center' class='style1'>Deleted Request/s</div></td>
  </tr>
  <tr>
    <td><div align='center' class='style8'>Date of Request ($fdatefmt)</div></td>
  </tr>
  <tr>
    <td height='10'></td>
  </tr>
  <tr>
    <td bgcolor='#FFFFFF'><table width='100%' border='0' cellpadding='0' cellspacing='0'>
      <tr>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;#&nbsp;</div></td>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Time Requested&nbsp;</div></td>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Px ID&nbsp;</div></td>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Patient's Name&nbsp;</div></td>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Request/s&nbsp;</div></td>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Date-Time Deleted&nbsp;</div></td>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Deleted By&nbsp;</div></td>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Remarks&nbsp;</div></td>
      </tr>
";

$b=0;
$bsql=mysql_query("SELECT registrationNo, dateCharge, timeCharge, description, deleteRemarks, status FROM patientCharges WHERE title='LABORATORY' AND dateCharge='$fdate' AND status LIKE '%DELETED%' ORDER BY timeCharge");
$bcount=mysql_num_rows($bsql);

if($bcount!=0){
while($bfetch=mysql_fetch_array($bsql)){
$b++;

$status = preg_split ("/\_/",$bfetch['status']);
//$userdate = preg_split ("/\-/",$status[1]);

$timedel=substr($status[1], -9, 8);
$datedel=substr($status[1], -20, 10);
$userdel=substr($status[1], 0, -21);

$patientNo=$cuz->selectNow("registrationDetails","patientNo","registrationNo",$bfetch['registrationNo']);
$completeName=$cuz->selectNow("patientRecord","completeName","patientNo",$patientNo);

$db=$cuz->selectNow("registeredUser","completeName","username",$userdel);
if($db==''){$realdb=$userdel;}else{$realdb=$db;}

echo "
      <tr>
        <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;$b&nbsp;</div></td>
        <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;".$bfetch['timeCharge']."&nbsp;</div></td>
        <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;".$bfetch['registrationNo']."&nbsp;</div></td>
        <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($completeName)."&nbsp;</div></td>
        <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($bfetch['description'])."&nbsp;</div></td>
        <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;".$datedel." ".$timedel."&nbsp;</div></td>
        <td class='table1Bottom1Left1Right'><div align='left' class='style5'>&nbsp;".strtoupper($realdb)."&nbsp;</div></td>
        <td class='table1Bottom1Left1Right'><div align='left' class='style5'>&nbsp;".strtoupper($bfetch['deleteRemarks'])."&nbsp;</div></td>
      </tr>
";
}
}

echo "

    </table></td>
  </tr>
</table>

</div>
";
?>
</body>
</html>
