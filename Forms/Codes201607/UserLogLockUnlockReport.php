<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Log Lock/Unlock</title>
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
include("../../myDatabase2.php");
$cuz = new database();

mysql_connect($cuz->myHost(),$cuz->getUser(),$cuz->getPass());
mysql_select_db($cuz->getDB());

$username=mysql_real_escape_string($_GET['username']);
$registrationNo=mysql_real_escape_string($_GET['registrationNo']);

$fday=mysql_real_escape_string($_GET['fday']);
$fmonth=mysql_real_escape_string($_GET['fmonth']);
$fyear=mysql_real_escape_string($_GET['fyear']);

$tday=mysql_real_escape_string($_GET['tday']);
$tmonth=mysql_real_escape_string($_GET['tmonth']);
$tyear=mysql_real_escape_string($_GET['tyear']);

$fdate=$fyear.$fmonth.$fday."000000";
$tdate=$tyear.$tmonth.$tday."235959";

echo "
<a href='#' onClick=printF('printData') style=text-decoration:none; color:black;>PRINT</a>
<div align='center' id='printData'>
<style type='text/css'>
<!--
.Arial10Black {font-family: Arial;font-size: 10px;color: #000000;}
.Arial10BlackBold {font-family: Arial;font-size: 10px;color: #000000;font-weight: bold;}
.Arial11Black {font-family: Arial;font-size: 11px;color: #000000;}
.Arial11BlackBold {font-family: Arial;font-size: 11px;color: #000000;font-weight: bold;}
.Arial12Black {font-family: Arial;font-size: 12px;color: #000000;}
.Arial12BlackBold {font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
.Arial13Black {font-family: Arial;font-size: 13px;color: #000000;}
.Arial13BlackBold {font-family: Arial;font-size: 13px;color: #000000;font-weight: bold;}
.Arial14Black {font-family: Arial;font-size: 14px;color: #000000;}
.Arial14BlackBold {font-family: Arial;font-size: 14px;color: #000000;font-weight: bold;}
.Arial10White {font-family: Arial;font-size: 10px;color: #FFFFFF;}
.Arial10WhiteBold {font-family: Arial;font-size: 10px;color: #FFFFFF;font-weight: bold;}
.Arial11White {font-family: Arial;font-size: 11px;color: #FFFFFF;}
.Arial11WhiteBold {font-family: Arial;font-size: 11px;color: #FFFFFF;font-weight: bold;}
.Arial12White {font-family: Arial;font-size: 12px;color: #FFFFFF;}
.Arial12WhiteBold {font-family: Arial;font-size: 12px;color: #FFFFFF;font-weight: bold;}
.CourierNew10Blue {font-family: 'Courier New';font-size: 10px;color: #0066FF;}
.CourierNew10Black {font-family: 'Courier New';font-size: 10px;color: #000000;}
.CourierNew10BlackBold {font-family: 'Courier New';font-size: 10px;color: #000000;font-weight: bold;}
.CourierNew11Black {font-family: 'Courier New';font-size: 11px;color: #000000;}
.CourierNew11BlackBold {font-family: 'Courier New';font-size: 11px;color: #000000;font-weight: bold;}
.CourierNew12Black {font-family: 'Courier New';font-size: 12px;color: #000000;}
.CourierNew12BlackBold {font-family: 'Courier New';font-size: 12px;color: #000000;font-weight: bold;}
.CourierNew13Black {font-family: 'Courier New';font-size: 13px;color: #000000;}
.CourierNew13BlackBold {font-family: 'Courier New';font-size: 13px;color: #000000;font-weight: bold;}
.CourierNew14Black {font-family: 'Courier New';font-size: 14px;color: #000000;}
.CourierNew14BlackBold {font-family: 'Courier New';font-size: 14px;color: #000000;font-weight: bold;}
.CourierNew15Black {font-family: 'Courier New';font-size: 15px;color: #000000;}
.CourierNew15BlackBold {font-family: 'Courier New';font-size: 15px;color: #000000;font-weight: bold;}
.CourierNew14Red {font-family: 'Courier New';font-size: 14px;color: #FF0000;}
.table1Left {border-left: 1px solid #000000;}
.table1Right {border-right: 1px solid #000000;}
.table1Left1Right {border-left: 1px solid #000000;border-right: 1px solid #000000;}
.table1Bottom {border-bottom: 1px solid #000000;}
.table1Bottom1Left {border-bottom: 1px solid #000000;border-left: 1px solid #000000;}
.table1Bottom1Right {border-bottom: 1px solid #000000;border-right: 1px solid #000000;}
.table1Bottom1Left1Right {border-bottom: 1px solid #000000;border-left: 1px solid #000000;border-right: 1px solid #000000;}
.table1Top {border-top: 1px solid #000000;}
.table2Top {border-top: 2px solid #000000;}
.table2Top1Left {border-top: 2px solid #000000;border-left: 1px solid #000000;}
.table1Top1Bottom {border-top: 1px solid #000000;border-bottom: 1px solid #000000;}
.table2Top2Bottom {border-top: 2px solid #000000;border-bottom: 2px solid #000000;}
.table2Bottom {border-bottom: 2px solid #000000;}
.table2Bottom1Left {border-bottom: 2px solid #000000;border-left: 1px solid #000000;}
.table2Top2Bottom1Left {border-top: 2px solid #000000;border-bottom: 2px solid #000000;border-left: 1px solid #000000;}
.table1Top1Bottom1Left {border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-left: 1px solid #000000;}
.table1Top1Bottom1Right {border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-right: 1px solid #000000;}
.table1Top1Bottom1Left1Right {border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-left: 1px solid #000000;border-right: 1px solid #000000;}
.button01 {font-family: Arial;font-size: 12px;font-weight: bold;color: #0066FF;background-color: #FFFFFF;border: 1px solid #0066FF;}
.doubleUnderline {text-decoration:underline;border-bottom: 1px solid #000;font-family: Arial;font-size: 14px;color: #000000;}
-->
</style>

<table border='0' width='100%' cellspacing='0' cellpadding='0'>
  <tr>
    <td bgcolor='#FFFFFF'><div align='center' class='Arial14BlackBold'>PAGADIAN CITY MEDICAL CENTER</div></td>
  </tr>
  <tr>
    <td height='10'></td>
  </tr>
  <tr>
    <td class='table2Bottom'><div align='center' class='CourierNew12BlackBold'>User Log(Lock/Unlock) Report</div></td>
  </tr>
  <tr>
    <td height='10'></td>
  </tr>
  <tr>
    <td><div align='center'><table border='0' cellpadding='0' cellspacing='0'>
      <tr>
        <td bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='Arial12WhiteBold'>&nbsp;User&nbsp;</div></td>
        <td bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='Arial12WhiteBold'>&nbsp;Registrattion No.&nbsp;</div></td>
        <td bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='Arial12WhiteBold'>&nbsp;Patient&nbsp;</div></td>
        <td bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='Arial12WhiteBold'>&nbsp;Action Performed&nbsp;</div></td>
        <td bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='Arial12WhiteBold'>&nbsp;Log Date/Time&nbsp;</div></td>
      </tr>
";

if($registrationNo==""){
$ulpsql=mysql_query("SELECT registrationNo, username, action, dateadded FROM userLogLockUnLock WHERE dateadded BETWEEN '$fdate' AND '$tdate' ORDER BY dateadded");
}
else{
$ulpsql=mysql_query("SELECT registrationNo, username, action, dateadded FROM userLogLockUnLock WHERE registrationNo='$registrationNo' AND (dateadded BETWEEN '$fdate' AND '$tdate') ORDER BY dateadded");
}

while($ulpfetch=mysql_fetch_array($ulpsql)){
$patientNo=$cuz->selectNow("registrationDetails","patientNo","registrationNo",$ulpfetch['registrationNo']);
$completename=$cuz->selectNow("patientRecord","completeName","patientNo",$patientNo);

$user=$cuz->selectNow("registeredUser","completeName","username",$ulpfetch['username']);

if($user==''){
$dispuser=$ulpfetch['username'];
}
else{
$dispuser=$user;
}

echo "
      <tr>
        <td><div align='left' class='Arial13Black'>&nbsp;".strtoupper($dispuser)."&nbsp;</div></td>
        <td><div align='center' class='Arial13Black'>&nbsp;".$ulpfetch['registrationNo']."&nbsp;</div></td>
        <td><div align='left' class='Arial13Black'>&nbsp;".strtoupper($completename)."&nbsp;</div></td>
        <td><div align='center' class='Arial13Black'>&nbsp;".$ulpfetch['action']."&nbsp;</div></td>
        <td><div align='center' class='Arial13Black'>&nbsp;".date("M d, Y H:i:s",strtotime($ulpfetch['dateadded']))."&nbsp;</div></td>
      </tr>
";
}

echo "
      <tr>
        <td bgcolor='#0066FF' class='table2Top2Bottom' height='6'></td>
        <td bgcolor='#0066FF' class='table2Top2Bottom' height='6'></td>
        <td bgcolor='#0066FF' class='table2Top2Bottom' height='6'></td>
        <td bgcolor='#0066FF' class='table2Top2Bottom' height='6'></td>
        <td bgcolor='#0066FF' class='table2Top2Bottom' height='6'></td>
      </tr>
    </table></div></td>
  </tr>
</table>
</div>
";
?>
</body>
</html>
