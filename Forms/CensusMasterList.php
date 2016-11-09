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

$username=$_GET['username'];

$fmonth=$_GET['fmonth'];
$fday=$_GET['fday'];
$fyear=$_GET['fyear'];

$fdate=$fyear."-".$fmonth."-".$fday;
$fdatestr=strtotime($fdate);
$fdatefmt=date("M d, Y",$fdatestr);


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
.style4 {font-family: Arial;font-size: 10px;color: #000000;font-weight: bold;}
.style5 {font-family: Arial;font-size: 10px;color: #000000;}
.style6 {font-family: Arial;font-size: 10px;color: #FFFFFF;}
.style7 {font-family: Arial;font-size: 11px;color: #000000;}
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
.table1Top1Bottom1Left {border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-left: 1px solid #000000;}
.table1Top1Bottom1Right {border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-right: 1px solid #000000;}
.table1Top1Bottom1Left1Right {border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-left: 1px solid #000000;border-right: 1px solid #000000;}
.doubleUnderline {text-decoration:underline;border-bottom: 1px solid #000;font-family: Arial;font-size: 14px;color: #000000;}
tr:hover { background-color:#66FF00;}
-->
</style>
  <table width='100%' border='0' cellspacing='0' cellpadding='0'>
    <tr>
      <td colspan='11' bgcolor='#FFFFFF'><div align='center'><img src='../COCONUT/myImages/mendero.png' height='120' width='auto' /></di></td>
    </tr>
    <tr>
      <td colspan='11' height='50' valign='top' bgcolor='#FFFFFF'><div align='center'><span class='style1'>Patient's Census Masterlist</span><br /><span class='style4'>$fdatefmt</span></di></td>
    </tr>
    <tr>
      <td width='auto' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>&nbsp;No.&nbsp;</di></td>
      <td width='auto' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>Case No.</di></td>
      <td width='150' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>Admission Date-Time</di></td>
      <td width='auto' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>Room</di></td>
      <td width='260' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>Patient's Name</di></td>
      <td width='100' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>Date of Birth</di></td>
      <td width='auto' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>Gender</di></td>
      <td width='35' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>Age</di></td>
      <td width='auto' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>Complaint</di></td>
      <td width='auto' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>Admitting Diagnosis</di></td>
      <td width='100' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>Infection Control<br />Precaution</di></td>
    </tr>
";

$tomdate=date("Y-m-d",strtotime($fdate.'+ 1 day'));
$presdate=date("Y-m-d");
$num=0;
$asql=mysql_query("SELECT pr.lastName, pr.firstName, pr.middleName, pr.Birthdate, pr.Gender, rd.registrationNo, rd.initialDiagnosis, rd.IxDx, rd.dateRegistered, rd.dateUnregistered, rd.timeRegistered, rd.timeUnregistered, rd.infectionControl FROM patientRecord pr, registrationDetails rd WHERE rd.patientNo=pr.patientNo AND (rd.dateRegistered BETWEEN '2010-01-01' AND '$fdate') AND ((rd.dateUnregistered BETWEEN '$tomdate' AND '$presdate') OR rd.dateUnregistered='') AND type='IPD' ORDER BY rd.dateRegistered");
while($afetch=mysql_fetch_array($asql)){
$lastName=$afetch['lastName'];
$firstName=$afetch['firstName'];
$middleName=$afetch['middleName'];
$Birthdate=$afetch['Birthdate'];
$Gender=$afetch['Gender'];
$registrationNo=$afetch['registrationNo'];
$initialDiagnosis=$afetch['initialDiagnosis'];
$IxDx=$afetch['IxDx'];
$dateRegistered=$afetch['dateRegistered'];
$dateUnregistered=$afetch['dateUnregistered'];
$timeRegistered=$afetch['timeRegistered'];
$precautionControl=$afetch['infectionControl'];

$patientname=$lastName.", ".$firstName." ".$middleName;

$dateRegisteredstr=strtotime($dateRegistered);
$dateRegisteredfmt=date("M d, Y",$dateRegisteredstr);

$Birthdatestr=strtotime($Birthdate);
$Birthdatefmt=date("M d, Y",$Birthdatestr);

$agedatefmt=date("m/d/Y", $Birthdatestr);
$birthDate = explode("/", $agedatefmt);

$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));

$bsql=mysql_query("SELECT description FROM patientCharges WHERE registrationNo='$registrationNo' AND (status NOT LIKE 'Discharged' OR status NOT LIKE 'DELETED_%%%%') AND title='Room And Board' ORDER BY dateCharge");
$bcount=mysql_num_rows($bsql);
if($bcount==0){
$room="No Room Assigned";
}
else{
while($bfetch=mysql_fetch_array($bsql)){$room=$bfetch['description'];}
}

$num++;

if($num<10){$numfmt="0".$num;}else{$numfmt=$num;};

echo "
    <tr>
      <td class='table1Bottom'><div align='center' class='style5'>&nbsp;$numfmt&nbsp;</di></td>
      <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;$registrationNo&nbsp;</di></td>
      <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;$dateRegisteredfmt - $timeRegistered&nbsp;</di></td>
      <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;$room&nbsp;</di></td>
      <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($patientname)."</di></td>
      <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;$Birthdatefmt&nbsp;</di></td>
      <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;".strtoupper($Gender)."&nbsp;</di></td>
      <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;$age&nbsp;</di></td>
      <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($initialDiagnosis)."&nbsp;</di></td>
      <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($IxDx)."&nbsp;</di></td>
      <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;$precautionControl&nbsp;</di></td>
    </tr>
";
}

echo "
  </table>
</div>
";
?>
</body>
</html>
