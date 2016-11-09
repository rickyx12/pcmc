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

$username=$_GET['username'];
$fmonth=$_GET['fmonth'];
$fyear=$_GET['fyear'];
$fyear=$_GET['fyear'];
$ddate=$fmonth."-01-".$fyear;
echo "
<a href='#' onClick=printF('printData') style=text-decoration:none; color:black;>PRINT</a>
<div align='center' id='printData'>
<style type='text/css'>
<!--
.style1 {font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
.style2 {font-family: Arial;font-size: 16px;color: #000000;font-weight: bold;}
.style3 {text-decoration: none;font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
.style4 {font-family: Arial;font-size: 12px;color: #FFFFFF;font-weight: bold;}
.style5 {font-family: Arial;font-size: 14px;color: #000000;}
.style6 {font-family: Arial;font-size: 10px;color: #FFFFFF;}
.style7 {font-family: Arial;font-size: 12px;color: #FFFFFF;font-weight: bold;}
.style8 {font-family: Arial;font-size: 10px;color: #000000;font-weight: bold;}
.table2Top2Bottom {border-top: 2px solid #000000;border-bottom: 2px solid #000000;}
.table1Bottom1Left {border-bottom: 1px solid #000000;border-left: 1px solid #000000;}
.table1Bottom1Left1Right {border-bottom: 1px solid #000000;border-left: 1px solid #000000;border-right: 1px solid #000000;}
.textfield02 {font-family: Arial;font-size: 12px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 1px solid #000000;height: 25px;}
.doubleUnderline {text-decoration:underline;border-bottom: 1px solid #000;font-family: Arial;font-size: 14px;color: #000000;}
tr:hover { background-color:#66FF00;}
-->
</style>
<br />
<br />
<span class='style2'>LABORATORY TEST SUMMARY</span><br /><span class='style1'>".date("F Y",strtotime($ddate))."</span>
<br />
<br />
<table border='0' width='100%' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='auto' height='25' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;LABORATORY TEST&nbsp;</div></td>
    <td width='auto' height='25' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;IPD&nbsp;</div></td>
    <td width='auto' height='25' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;OPD&nbsp;</div></td>
    <td width='auto' height='25' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Dialysis&nbsp;</div></td>
  </tr>
";


$asql=mysql_query("SELECT description, chargesCode FROM patientCharges WHERE status NOT LIKE 'DELETED_%%%%' AND title='LABORATORY' AND (dateCharge BETWEEN '".$fyear."-".$fmonth."-01' AND '".$fyear."-".$fmonth."-31') GROUP BY description ORDER BY description");
while($afetch=mysql_fetch_array($asql)){
$description=$afetch['description'];

$bsql=mysql_query("SELECT SUM(pc.quantity) AS numipd FROM patientCharges pc, registrationDetails rd WHERE pc.status NOT LIKE 'DELETED_%%%%' AND pc.description='$description' AND (pc.dateCharge BETWEEN '".$fyear."-".$fmonth."-01' AND '".$fyear."-".$fmonth."-31') AND pc.registrationNo=rd.registrationNo AND rd.type='IPD'");
while($bfetch=mysql_fetch_array($bsql)){$numipd=$bfetch['numipd'];}

if(!is_numeric($numipd)){$realnumipd=0;}else{$realnumipd=$numipd;}

$csql=mysql_query("SELECT SUM(pc.quantity) AS numopd FROM patientCharges pc, registrationDetails rd WHERE pc.status NOT LIKE 'DELETED_%%%%' AND pc.description='$description' AND (pc.dateCharge BETWEEN '".$fyear."-".$fmonth."-01' AND '".$fyear."-".$fmonth."-31') AND pc.registrationNo=rd.registrationNo AND rd.type='OPD'");
while($cfetch=mysql_fetch_array($csql)){$numopd=$cfetch['numopd'];}

if(!is_numeric($numopd)){$realnumopd=0;}else{$realnumopd=$numopd;}

$dsql=mysql_query("SELECT SUM(pc.quantity) AS numdialysis FROM patientCharges pc, registrationDetails rd WHERE pc.status NOT LIKE 'DELETED_%%%%' AND pc.description='$description' AND (pc.dateCharge BETWEEN '".$fyear."-".$fmonth."-01' AND '".$fyear."-".$fmonth."-31') AND pc.registrationNo=rd.registrationNo AND rd.type='DIALYSIS'");
while($dfetch=mysql_fetch_array($dsql)){$numdialysis=$dfetch['numdialysis'];}

if(!is_numeric($numdialysis)){$realnumdialysis=0;}else{$realnumdialysis=$numdialysis;}

echo "
  <tr>
    <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;$description&nbsp;</div></td>
    <td class='table1Bottom1Left'><div align='right' class='style5'>&nbsp;$realnumipd&nbsp;</div></td>
    <td class='table1Bottom1Left'><div align='right' class='style5'>&nbsp;$realnumopd&nbsp;</div></td>
    <td class='table1Bottom1Left1Right'><div align='right' class='style5'>&nbsp;$realnumdialysis&nbsp;</div></td>
  </tr>
";
}

echo "
</taable>
</div>
";
?>
</body>
</html>
