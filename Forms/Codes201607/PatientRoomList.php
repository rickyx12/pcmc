<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Patient Room List</title>
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
include("../../myDatabase2.php");
$cuz = new database();

mysql_connect($cuz->myHost(),$cuz->getUser(),$cuz->getPass());
mysql_select_db($cuz->getDB());


echo "
<a href='#' onClick=printF('printData') style='font-family: Arial; text-decoration:none; color:black;'>PRINT</a>
<br />
<br />
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
.CourierNew10Blue {font-family: 'Courier New';font-size: 10px;color: #0066FF;}
.CourierNew10Black {font-family: 'Courier New';font-size: 10px;color: #000000;}
.CourierNew10BlackBold {font-family: 'Courier New';font-size: 10px;color: #000000;font-weight: bold;}
.CourierNew10Red {font-family: 'Courier New';font-size: 10px;color: #FF0000;}
.CourierNew10RedBold {font-family: 'Courier New';font-size: 10px;color: #FF0000;font-weight: bold;}
.CourierNew11Black {font-family: 'Courier New';font-size: 11px;color: #000000;}
.CourierNew11BlackBold {font-family: 'Courier New';font-size: 11px;color: #000000;font-weight: bold;}
.CourierNew11Red {font-family: 'Courier New';font-size: 11px;color: #FF0000;}
.CourierNew11RedBold {font-family: 'Courier New';font-size: 11px;color: #FF0000;font-weight: bold;}
.CourierNew12Black {font-family: 'Courier New';font-size: 12px;color: #000000;}
.CourierNew12BlackBold {font-family: 'Courier New';font-size: 12px;color: #000000;font-weight: bold;}
.CourierNew12Blue {font-family: 'Courier New';font-size: 12px;color: #0066FF;}
.CourierNew12BlueBold {font-family: 'Courier New';font-size: 12px;color: #0066FF;font-weight: bold;}
.CourierNew13Black {font-family: 'Courier New';font-size: 13px;color: #000000;}
.CourierNew13BlackBold {font-family: 'Courier New';font-size: 13px;color: #000000;font-weight: bold;}
.CourierNew14Black {font-family: 'Courier New';font-size: 14px;color: #000000;}
.CourierNew14BlackBold {font-family: 'Courier New';font-size: 14px;color: #000000;font-weight: bold;}
.CourierNew14Blue {font-family: 'Courier New';font-size: 14px;color: #0066FF;}
.CourierNew14BlueBold {font-family: 'Courier New';font-size: 14px;color: #0066FF;font-weight: bold;}
.CourierNew14Red {font-family: 'Courier New';font-size: 14px;color: #FF0000;}
.CourierNew14RedBold {font-family: 'Courier New';font-size: 14px;color: #FF0000;font-weight: bold;}
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
tr:hover { background-color:#E5C133;}
-->
</style>

  <table border='0' width='100%' cellpadding='0' cellspacing='0'>
";

/*echo "
    <tr>
      <td colspan='14' bgcolor='#FFFFFF'><div align='center'><img src='../../COCONUT/myImages/mendero.png' height='120' width='auto' /></div></td>
    </tr>
";*/

echo "
    <tr>
      <td height='20'></td>
    </tr>
    <tr>
      <td><div align='center' class='Arial14BlackBold'>DAILY PATIENT CENSUS</div></td>
    </tr>
    <tr>
      <td><div align='center' class='Arial11BlackBold'>".date("M d, Y")."</div></td>
    </tr>
    <tr>
      <td height='20'></td>
    </tr>
  </table>
  <table border='1' bordercolor='#000000' cellpadding='0' cellspacing='0'>
    <tr>
      <td><div align='center' class='CourierNew12BlackBold'>&nbsp;Beds&nbsp;</td>
      <td><div align='center' class='CourierNew12BlackBold'>&nbsp;Registration No.&nbsp;</td>
      <td><div align='center' class='CourierNew12BlackBold'>&nbsp;Patient&nbsp;</td>
      <td><div align='center' class='CourierNew12BlackBold'>&nbsp;Date Admitted&nbsp;</td>
    </tr>
";
$numpat=0;
$rmfsql=mysql_query("SELECT floor FROM room WHERE floor NOT LIKE 'Ground Floor' GROUP BY floor ORDER BY floor DESC");
while($rmffetch=mysql_fetch_array($rmfsql)){
echo "
    <tr>
      <td height='30' colspan='4'><div align='left' class='CourierNew12BlueBold'>&nbsp;".$rmffetch['floor']."&nbsp;</td>
    </tr>
";


$rmsql=mysql_query("SELECT Description, status FROM room WHERE floor='".$rmffetch['floor']."' ORDER BY description");
while($rmfetch=mysql_fetch_array($rmsql)){
$room=preg_split ("/_/", $rmfetch['Description']);

$patsql=mysql_query("SELECT pr.lastName, pr.firstName, pr.middleName, rd.dateRegistered, rd.dateRegistered, rd.registrationNo, rd.type FROM patientRecord pr, registrationDetails rd WHERE rd.room='".$rmfetch['Description']."' AND rd.dateRegistered NOT LIKE 'DELETED%%%%' AND rd.dateUnregistered='' AND pr.patientNo=rd.patientNo");
$patcount=mysql_num_rows($patsql);
if($patcount!=0){
while($patfetch=mysql_fetch_array($patsql)){$lastName=$patfetch['lastName']; $firstName=$patfetch['firstName']; $middleName=$patfetch['middleName']; $dateRegistered=$patfetch['dateRegistered']; $registrationNo=$patfetch['registrationNo']; $type=$patfetch['type'];}
$name=$lastName.", ".$firstName."  ".$middleName;
$numpat+=1;
}
else{
$name="";
$dateRegistered="";
$registrationNo="";
$type="";
}

echo "
    <tr>
      <td><div align='left'><span class='CourierNew14Blue'>&nbsp;".strtoupper($room[0])."</span>&nbsp;</td>
      <td><div align='left'><span class='CourierNew14Black'>&nbsp;$registrationNo&nbsp;</span>&nbsp;</td>
";

if(($type=="IPD")||($type=="OB-Package")||($type=="")){
echo "
      <td><div align='left'><span class='CourierNew14Black'>&nbsp;".strtoupper($name)."&nbsp;</span></td>
";
}
else {
echo "
      <td><div align='left'><span class='CourierNew14Red'>&nbsp;".strtoupper($name)."&nbsp;</span><br /><span class='CourierNew10Red'>&nbsp;This patient is Registered as Out-Patient. Remove the room assigned to this patient.&nbsp;</span></td>
";
}

echo "
      <td><div align='center'><span class='CourierNew14Black'>&nbsp;$dateRegistered&nbsp;</span></td>
    </tr>
";
}

}

$numpat1=0;
$rmf2sql=mysql_query("SELECT floor FROM room WHERE floor='Ground Floor' GROUP BY floor ORDER BY floor DESC");
while($rmf2fetch=mysql_fetch_array($rmf2sql)){
echo "
    <tr>
      <td height='30' colspan='4'><div align='left' class='CourierNew12BlueBold'>&nbsp;".$rmf2fetch['floor']."&nbsp;</td>
    </tr>
";

$rm2sql=mysql_query("SELECT Description, status FROM room WHERE floor='".$rmf2fetch['floor']."' ORDER BY description");
while($rm2fetch=mysql_fetch_array($rm2sql)){
$room2=preg_split ("/_/", $rm2fetch['Description']);

$pat2sql=mysql_query("SELECT pr.lastName, pr.firstName, pr.middleName, rd.dateRegistered, rd.registrationNo, rd.type FROM patientRecord pr, registrationDetails rd WHERE rd.room='".$rm2fetch['Description']."' AND rd.dateRegistered NOT LIKE 'DELETED%%%%' AND rd.dateUnregistered='' AND pr.patientNo=rd.patientNo");
$pat2count=mysql_num_rows($pat2sql);
if($pat2count!=0){
while($pat2fetch=mysql_fetch_array($pat2sql)){$lastName2=$pat2fetch['lastName']; $firstName2=$pat2fetch['firstName']; $middleName2=$pat2fetch['middleName']; $dateRegistered2=$pat2fetch['dateRegistered']; $registrationNo2=$pat2fetch['registrationNo']; $type2=$pat2fetch['type'];}
$name2=$lastName2.", ".$firstName2." ".$middleName2;
$numpat1+=1;
}
else{
$name2="";
$dateRegistered2="";
$registrationNo2="";
$type2="";
}

echo "
    <tr>
      <td><div align='left'><span class='CourierNew14Blue'>&nbsp;".strtoupper($room2[0])."</span>&nbsp;</td>
      <td><div align='left'><span class='CourierNew14Black'>&nbsp;$registrationNo2&nbsp;</span>&nbsp;</td>
";

if(($type2=="IPD")||($type2=="OB-Package")||($type2=="")){
echo "
      <td><div align='left'><span class='CourierNew14Black'>&nbsp;".strtoupper($name2)."&nbsp;</span></td>
";
}
else {
echo "
      <td><div align='left'><span class='CourierNew14Red'>&nbsp;".strtoupper($name2)."&nbsp;</span><br /><span class='CourierNew10Red'>&nbsp;This patient is Registered as Out-Patient. Remove the room assigned to this patient or discharge this patient.&nbsp;</span></td>
";
}

echo "
      <td><div align='center'><span class='CourierNew14Black'>&nbsp;$dateRegistered2&nbsp;</span>&nbsp;</td>
    </tr>
";
}

}

echo "
    <tr>
      <td colspan='3'><div align='right'><span class='CourierNew14BlackBold'>TOTAL&nbsp;</span>&nbsp;</td>
      <td height='30'><div align='right'><span class='CourierNew14BlueBold'>".($numpat+$numpat1)."&nbsp;</span>&nbsp;</td>
    </tr>
  </table>
</div>
";
?>
</body>
</html>
