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
$type=$_GET['type'];

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
<a href='#' onClick=printF('printData') style='font-family: Arial; text-decoration:none; color:black;'>PRINT</a>
<br />
<br />
<div align='center' id='printData'>
<style type='text/css'>
<!--
.style1 {font-family: Arial;font-size: 16px;color: #000000;font-weight: bold;}
.style2 {font-family: 'Times New Roman';font-size: 16px;color: #FF0000;font-weight: bold;}
.style3 {text-decoration: none;font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
.style4 {font-family: Arial;font-size: 10px;color: #FFFFFF;font-weight: bold;}
.style5 {font-family: Arial;font-size: 10px;color: #000000;}
.style6 {font-family: Arial;font-size: 10px;color: #FFFFFF;}
.style7 {font-family: Arial;font-size: 10px;color: #000000;}
.style8 {font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
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
-->
</style>
  <table width='100%' border='0' cellspacing='0' cellpadding='0'>
    <tr>
      <td colspan='8' height='50' valign='top'><div align='center'><span class='style1'>Deleted Charges Report ($type)</span><br /><span class='style8'>$fdatefmt to $tdatefmt</span></di></td>
    </tr>
    <tr>
      <td width='auto' class='table2Top2Bottom' bgcolor='#0066FF'><div align='center' class='style4'>&nbsp;Reg. No.&nbsp;</div></td>
      <td width='auto' class='table2Top2Bottom' bgcolor='#0066FF'><div align='center' class='style4'>&nbsp;Patient&nbsp;</div></td>
      <td width='auto' class='table2Top2Bottom' bgcolor='#0066FF'><div align='center' class='style4'>&nbsp;Description&nbsp;</div></td>
      <td width='auto' class='table2Top2Bottom' bgcolor='#0066FF'><div align='center' class='style4'>&nbsp;Date/Time Deleted&nbsp;</div></td>
      <td width='auto' class='table2Top2Bottom' bgcolor='#0066FF'><div align='center' class='style4'>&nbsp;Date Charged&nbsp;</div></td>
      <td width='auto' class='table2Top2Bottom' bgcolor='#0066FF'><div align='center' class='style4'>&nbsp;Deleted By&nbsp;</div></td>
      <td width='auto' class='table2Top2Bottom' bgcolor='#0066FF'><div align='center' class='style4'>&nbsp;Reason For Deletion&nbsp;</div></td>
      <td width='auto' class='table2Top2Bottom' bgcolor='#0066FF'><div align='center' class='style4'>&nbsp;Approve Delete&nbsp;</div></td>
    </tr>
";

echo "SELECT rd.type, rd.patientNo, pc.registrationNo, pc.status, pc.description, pc.dateCharge, pc.timeCharge, pc.title, pc.pendingDelete, pc.deleteRemarks FROM patientCharges pc, registrationDetails rd WHERE pc.registrationNo=rd.registrationNo AND pc.status LIKE 'DELETED_%%%' AND rd.type='$type' AND (pc.dateCharge BETWEEN '$fdate' AND '$tdate') ORDER by pc.dateCharge,pc.timeCharge";

$num=0;
$asql=mysql_query("SELECT rd.type, rd.patientNo, pc.registrationNo, pc.status, pc.description, pc.dateCharge, pc.timeCharge, pc.title, pc.pendingDelete, pc.deleteRemarks FROM patientCharges pc, registrationDetails rd WHERE pc.registrationNo=rd.registrationNo AND pc.status LIKE 'DELETED_%%%' AND rd.type='$type' AND (pc.dateCharge BETWEEN '$fdate' AND '$tdate') ORDER by pc.dateCharge,pc.timeCharge");
while($afetch=mysql_fetch_array($asql)){
$registrationNo=$afetch['registrationNo'];
$status=$afetch['status'];
$description=$afetch['description'];
$dateCharge=$afetch['dateCharge'];
$timeCharge=$afetch['timeCharge'];
$patientNo=$afetch['patientNo'];
$title=$afetch['title'];
$pendingDelete=$afetch['pendingDelete'];
$deleteRemarks=$afetch['deleteRemarks'];

$dateChargestr=strtotime($dateCharge);
$dateChargefmt=date("M d, Y",$dateChargestr);

$num++;

$bsql=mysql_query("SELECT lastName, firstName FROM patientRecord WHERE patientNo='$patientNo'");
while($bfetch=mysql_fetch_array($bsql)){$lastName=$bfetch['lastName'];$firstName=$bfetch['firstName'];}

$patient=$lastName.", ".$firstName;

$separate=preg_split('[_]',$status);

$find=substr($separate[1], -1);
$find2=substr($separate[1], -3,1);
$num++;

if($find=="]"){
$timedel=substr($separate[1], -9, 8);
$datedel=substr($separate[1], -20, 10);
$userdel=substr($separate[1], 0, -21);
}
else{
if($find2=="-"){
$timedel="";
$datedel=substr($separate[1], -10, 10);
$userdel=substr($separate[1], 0, -11);
}
else{
$timedel="";
$datedel="";
$userdel=$separate[1];
}
}

$csql=mysql_query("SELECT completeName FROM registeredUser WHERE username='$userdel'");
$ccount=mysql_num_rows($csql);
if($ccount==0){
$completeName[$num]="";
}
else{
while($cfetch=mysql_fetch_array($csql)){$completeName[$num]=$cfetch['completeName'];}
}

if($title=="LABORATORY" || $title=="RADIOLOGY"){
$pendingdel=preg_split('[_]',$pendingDelete);
$dsql=mysql_query("SELECT completeName FROM registeredUser WHERE username='".$pendingdel[1]."'");
while($dfetch=mysql_fetch_array($dsql)){$delrequest[$num]=$dfetch['completeName'];}

$approveddel[$num]=$completeName[$num];

}
else {
$delrequest[$num]=$completeName[$num];
$approveddel[$num]="";
}

echo "
    <tr>
      <td class='table1Bottom'><div align='center' class='style5'>&nbsp;$registrationNo&nbsp;</div></td>
      <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($patient)."&nbsp;</div></td>
      <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($description)."&nbsp;</div></td>
      <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;$datedel $timedel</div></td>
      <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;$dateChargefmt | $timeCharge&nbsp;</div></td>
      <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;".strtoupper($delrequest[$num])."&nbsp;</div></td>
      <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;$deleteRemarks&nbsp;</div></td>
      <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($approveddel[$num])."</div></td>
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
