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
$fday=$_GET['fday'];
$fyear=$_GET['fyear'];
$fyear=$_GET['fyear'];
$tday=$_GET['tday'];
$tmonth=$_GET['tmonth'];
$tyear=$_GET['tyear'];

$fdate=$fyear."-".$fmonth."-".$fday;
$tdate=$tyear."-".$tmonth."-".$tday;

$cfdate=$fyear.$fmonth.$fday;
$ctdate=$tyear.$tmonth.$tday;

$fdatestr=strtotime($fdate);
$fdatefmt=date("M d, Y",$fdatestr);
$tdatestr=strtotime($tdate);
$tdatefmt=date("M d, Y",$tdatestr);

echo "
<a href='#' onClick=printF('printData') style=text-decoration:none; color:black;>PRINT</a>
<div align='center' id='printData'>
<style type='text/css'>
<!--
.style1 {font-family: Arial;font-size: 14px;color: #000000;font-weight: bold;}
.style2 {font-family: Arial;font-size: 14px;color: #FF0000;font-weight: bold;}
.style3 {text-decoration: none;font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
.style4 {font-family: Arial;font-size: 10px;color: #000000;font-weight: bold;}
.style5 {font-family: Arial;font-size: 10px;color: #000000;}
.style6 {font-family: Arial;font-size: 10px;color: #FFFFFF;}
.style7 {font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
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
.doubleUnderline {text-decoration:underline;border-bottom: 1px solid #000;font-family: Arial;font-size: 14px;color: #000000;}
tr:hover { background-color:#66FF00;}
-->
</style>

<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td bgcolor='#FFFFFF' colspan='6'><div align='center'><img src='../COCONUT/myImages/mendero.png' width='50%' height='auto' /></div></td>
  </tr>
  <tr>
    <td bgcolor='#FFFFFF' height='50' colspan='6'><div align='center'><span class='style1'>Doctor's Compensation Report</span><br /><span class='style7'>$fdatefmt - $tdatefmt</span></div></td>
  </tr>
";

$asql=mysql_query("SELECT pc.description FROM patientCharges pc, registrationDetails rd WHERE pc.registrationNo=rd.registrationNo AND rd.type='OPD' AND pc.service='ATTENDING' AND pc.title='PROFESSIONAL FEE' AND (rd.dateRegistered BETWEEN '$fdate' AND '$tdate') GROUP BY pc.description ORDER BY pc.description");
while($afetch=mysql_fetch_array($asql)){
$description=$afetch['description'];

$bsql=mysql_query("SELECT rd.patientNo, pc.registrationNo FROM patientCharges pc, registrationDetails rd WHERE pc.registrationNo=rd.registrationNo AND pc.description='$description' AND rd.type='OPD' AND (pc.dateCharge BETWEEN '$fdate' AND '$tdate') AND pc.status NOT LIKE 'DELETED_%%%%' AND pc.service='ATTENDING' AND pc.title='PROFESSIONAL FEE' ORDER BY rd.dateRegistered");
$bcount=mysql_num_rows($bsql);

if($bcount!=0){
echo "
  <tr>
    <td class='table2Top2Bottom' colspan='6' height='25'><div align='left' class='style2'>&nbsp;".strtoupper($description)."</div></td>
  </tr>
  <tr>
";

/*
echo "
  <tr> 
    <td width='auto' bgcolor='#0066FF' class='table2Bottom'><div align='center' class='style6'>&nbsp;Case No.&nbsp;</di></td>
    <td width='280' bgcolor='#0066FF' class='table2Bottom'><div align='center' class='style6'>Patient Name</di></td>
    <td width='auto' bgcolor='#0066FF' class='table2Bottom'><div align='center' class='style6'>Date</di></td>
    <td width='auto' bgcolor='#0066FF' class='table2Bottom'><div align='center' class='style6'>Examinations</di></td>
    <td width='auto' bgcolor='#0066FF' class='table2Bottom'><div align='center' class='style6'>Total</di></td>
    <td width='auto' bgcolor='#0066FF' class='table2Bottom'><div align='center' class='style6'>Rebate</di></td>
  </tr>
";
*/
$totcharges=0;
$totrebate=0;
while($bfetch=mysql_fetch_array($bsql)){
$patientNo=$bfetch['patientNo'];
$registrationNo=$bfetch['registrationNo'];

$dateRegistered=$cuz->selectNow("registrationDetails","dateRegistered","registrationNo",$registrationNo);

$dateRegisteredstr=strtotime($dateRegistered);
$dateRegisteredfmt=date("M d, Y",$dateRegisteredstr);

$completeName=$cuz->selectNow("patientRecord","completeName","patientNo",$patientNo);

$csql=mysql_query("SELECT description, total FROM patientCharges WHERE registrationNo='$registrationNo' AND title='LABORATORY' AND status NOT LIKE 'DELETED_%%%%' AND (dateCharge BETWEEN '$fdate' AND '$tdate') ORDER BY description");
$ccount=mysql_num_rows($csql);

if($ccount!=0){
echo "
  <tr>
    <td class='table1Bottom' valign='top'><div align='left' class='style5'>&nbsp;$registrationNo&nbsp;</di></td>
    <td class='table1Bottom1Left' valign='top'><div align='left' class='style5'>&nbsp;".strtoupper($completeName)."&nbsp;</di></td>
    <td class='table1Bottom1Left' valign='top'><div align='left' class='style5'>&nbsp;$dateRegisteredfmt&nbsp;</di></td>
    <td class='table1Bottom1Left' valign='top'><div align='left' class='style5'>
";

$tottotal=0;
$num=0;
while($cfetch=mysql_fetch_array($csql)){
$labdesc=$cfetch['description'];
$labtotal=$cfetch['total'];
$num++;

if($num==$ccount){$nl="";}else{$nl="<br />";}

echo "
        &nbsp;*$labdesc&nbsp;->&nbsp;".number_format($labtotal)."$nl
";

$tottotal+=$labtotal;
}

$rebate=($tottotal/100)*5;

echo "
    &nbsp;</di></td>
    <td class='table1Bottom1Left' valign='top'><div align='right' class='style5'>&nbsp;".number_format($tottotal,2)."&nbsp;</di></td>
    <td class='table1Bottom1Left' valign='top'><div align='right' class='style5'>&nbsp;".number_format($rebate,2)."&nbsp;</di></td>
  </tr>
";
$totcharges+=$tottotal;
$totrebate+=$rebate;
}
}

echo "
  <tr>
    <td class='table1Bottom' colspan='4' valign='top'><div align='right' class='style8'>&nbsp;TOTAL&nbsp;</di></td>
    <td class='table1Bottom1Left' valign='top'><div align='right' class='style8'>&nbsp;".number_format($totcharges,2)."&nbsp;</di></td>
    <td class='table1Bottom1Left' valign='top'><div align='right' class='style8'>&nbsp;".number_format($totrebate,2)."&nbsp;</di></td>
  </tr>
";

}
}


echo "
</table>
</div>
";
?>
</body>
</html>
