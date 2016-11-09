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
.button01 {font-family: Arial;font-size: 10px;border: 0;padding: 0;display: inline;background: none;color: #000000;}
tr:hover { background-color:#66FF00;}
-->
</style>
  <table width='100%' border='0' cellspacing='0' cellpadding='0'>
    <tr>
      <td colspan='14' bgcolor='#FFFFFF'><div align='center'><img src='../COCONUT/myImages/mendero.png' height='120' width='auto' /></di></td>
    </tr>
    <tr>
      <td colspan='14' height='50' valign='top' bgcolor='#FFFFFF'><div align='center'><span class='style1'>Daily Discharged Patient List</span><br /><span class='style4'>$fdatefmt</span></di></td>
    </tr>
    <tr>
      <td width='auto' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>Case No.</di></td>
      <td width='auto' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>&nbsp;Date of Admission&nbsp;</di></td>
      <td width='auto' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>&nbsp;Time of Admission&nbsp;</di></td>
      <td width='260' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>Patient's Name</di></td>
      <td width='80' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>Date of Birth</di></td>
      <td width='35' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>&nbsp;Age&nbsp;</di></td>
      <td width='auto' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>&nbsp;Gender&nbsp;</di></td>
      <td width='auto' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>&nbsp;Address&nbsp;</di></td>
      <td width='auto' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>&nbsp;PHIC&nbsp;</di></td>
      <td width='auto' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>Complaint</di></td>
      <td width='auto' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>Final Diagnosis</di></td>
      <td width='auto' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>Doctor</di></td>
      <td width='auto' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>Discharged Condition</di></td>
      <td width='100' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style6'>Date-Time of Discharge</di></td>
    </tr>
";

$tomdate=date("Y-m-d",strtotime($fdate.'+ 1 day'));
$presdate=date("Y-m-d");
$num=0;
$asql=mysql_query("SELECT pr.lastName, pr.firstName, pr.middleName, pr.Birthdate, pr.Gender, pr.Address, pr.phic, rd.registrationNo, rd.initialDiagnosis, rd.IxDx, rd.finalDiagnosis, rd.dateRegistered, rd.dateUnregistered, rd.timeRegistered, rd.timeUnregistered, rd.infectionControl FROM patientRecord pr, registrationDetails rd WHERE rd.patientNo=pr.patientNo AND rd.dateUnregistered='$fdate' AND type='IPD' ORDER BY rd.dateUnregistered, rd.timeUnregistered");
while($afetch=mysql_fetch_array($asql)){
$lastName=$afetch['lastName'];
$firstName=$afetch['firstName'];
$middleName=$afetch['middleName'];
$Birthdate=$afetch['Birthdate'];
$Gender=$afetch['Gender'];
$Address=$afetch['Address'];
$phic=$afetch['phic'];
$registrationNo=$afetch['registrationNo'];
$initialDiagnosis=$afetch['initialDiagnosis'];
$IxDx=$afetch['IxDx'];
$finalDiagnosis=$afetch['finalDiagnosis'];
$dateRegistered=$afetch['dateRegistered'];
$dateUnregistered=$afetch['dateUnregistered'];
$timeRegistered=$afetch['timeRegistered'];
$timeUnregistered=$afetch['timeUnregistered'];
$precautionControl=$afetch['infectionControl'];

if($Gender=="male"){$sex="M";}else if($Gender=="female"){$sex="F";}
if( $phic=="YES"){$phicfmt="NH";}else{$phicfmt="NN";}

$patientname=$lastName.", ".$firstName." ".$middleName;

$dateRegisteredstr=strtotime($dateRegistered);
$dateRegisteredfmt=date("m/d/Y",$dateRegisteredstr);

if($dateUnregistered==''){
$dateUnregisteredfmt="";
}
else{
$dateUnregisteredstr=strtotime($dateUnregistered);
$dateUnregisteredfmt=date("m/d/Y",$dateUnregisteredstr)."-";
}

$Birthdatestr=strtotime($Birthdate);
$Birthdatefmt=date("m/d/Y",$Birthdatestr);

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
      <form name='Submit' method='post' action='../COCONUT/currentPatient/patientInterface1.php' target='_blank'>
      <input type='hidden' name='username' value='$username' />
      <input type='hidden' name='registrationNo' value='$registrationNo' />
      <td class='table1Bottom'><div align='left' class='style5'><input name='rno' type='submit' class='button01' value='$registrationNo' /></di></td>
      </form>
      <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;$dateRegisteredfmt&nbsp;</di></td>
      <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;$timeRegistered&nbsp;</di></td>
      <form name='Submit' method='post' action='../COCONUT/currentPatient/patientInterface1.php' target='_blank'>
      <input type='hidden' name='username' value='$username' />
      <input type='hidden' name='registrationNo' value='$registrationNo' />
      <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;<input type='submit' name='name' class='button01' value='".strtoupper($patientname)."' /></di></td>
      </form>
      <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;$Birthdatefmt&nbsp;</di></td>
      <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;$age&nbsp;</di></td>
      <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;$sex&nbsp;</di></td>
      <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($Address)."&nbsp;</di></td>
      <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;$phicfmt&nbsp;</di></td>
      <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($initialDiagnosis)."&nbsp;</di></td>
      <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($cuz->selectNow("patientICD","diagnosis","registrationNo",$registrationNo))."&nbsp;</di></td>
      <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($cuz->getAttendingDoc($registrationNo,"ATTENDING"))."&nbsp;</di></td>
      <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;".strtoupper($cuz->selectNow("registrationDetails","dischargedCondition","registrationNo",$registrationNo))."&nbsp;</di></td>
      <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;$dateUnregisteredfmt".$timeUnregistered."&nbsp;</di></td>
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
