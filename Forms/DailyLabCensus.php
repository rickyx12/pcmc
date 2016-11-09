<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>LABORATORY CENSUS</title>
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

$type=mysql_real_escape_string($_GET['type']);

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
.style4 {font-family: Arial;font-size: 11px;color: #FFFFFF;font-weight: bold;}
.style5 {font-family: Arial;font-size: 09px;color: #000000;}
.style6 {font-family: Arial;font-size: 10px;color: #FFFFFF;}
.style7 {font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
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
    <td><div align='center' class='style1'>Daily Laboratory Census for $type</div></td>
  </tr>
  <tr>
    <td><div align='center' class='style8'>$fdatefmt</div></td>
  </tr>
  <tr>
    <td height='10'></td>
  </tr>
  <tr>
    <td bgcolor='#FFFFFF'><table width='100%' border='0' cellpadding='0' cellspacing='0'>
      <tr>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Date&nbsp;</div></td>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Time&nbsp;</div></td>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Px ID&nbsp;</div></td>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Patient's Name&nbsp;</div></td>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Date of Birth&nbsp;</div></td>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Age&nbsp;</div></td>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Sex&nbsp;</div></td>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Room&nbsp;</div></td>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Request/s&nbsp;</div></td>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Remarks&nbsp;</div></td>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Requested By&nbsp;</div></td>
        <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Test Performed By&nbsp;</div></td>
      </tr>
";

$tottest=0;
$a=0;
$asql=mysql_query("SELECT pc.registrationNo, rd.patientNo, pr.completeName, pr.Birthdate, pr.Gender FROM patientCharges pc, registrationDetails rd, patientRecord pr WHERE pc.title='LABORATORY' AND pc.datecharge='$fdate' AND pc.registrationNo=rd.registrationNo AND rd.patientNo=pr.patientNo AND rd.type='$type' GROUP BY pc.registrationNo ORDER BY pr.completeName");
$acount=mysql_num_rows($asql);
while($afetch=mysql_fetch_array($asql)){
$registrationNo=$afetch['registrationNo'];
$completeName=$afetch['completeName'];
$Birthdate=$afetch['Birthdate'];
$Gender=$afetch['Gender'];

if($type=="IPD"){
$qrsql=mysql_query("SELECT description FROM patientCharges WHERE registrationNo='$registrationNo' AND title='Room And Board' ORDER BY dateCharge DESC");
while($qrfetch=mysql_fetch_array($qrsql)){$description=$qrfetch['description'];}

$room = preg_split ("/\_/",$description);
$realroom=$room[0];
}
else{
$realroom="";
}

if($Gender=='male'){$sex="M";}else if($Gender=='female'){$sex="F";}else{$sex="";}

$birthDatefmt=date("m/d/Y", strtotime($Birthdate));
$birthDate = explode("/", $birthDatefmt);

$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));


$b=0;
$bsql=mysql_query("SELECT itemNo, chargesCode, description, dateCharge, timeCharge, chargeBy, remarks FROM patientCharges WHERE registrationNo='$registrationNo' AND status NOT LIKE 'DELETED%%' AND title='LABORATORY' AND dateCHarge='$fdate' ORDER BY timeCharge");
$bcount=mysql_num_rows($bsql);
if($bcount!=0){$a++;}
while($bfetch=mysql_fetch_array($bsql)){
$itemNo=$bfetch['itemNo'];
$dateCharge=$bfetch['dateCharge'];
$description=$bfetch['description'];
$chargeBy=$bfetch['chargeBy'];
$remarks=$bfetch['remarks'];

$b++;


$c=0;
$csql=mysql_query("SELECT itemNo, chargesCode, medtech, date, time FROM labSavedResult WHERE itemNo='$itemNo' AND status='' ORDER BY time");
$ccount=mysql_num_rows($csql);
while($cfetch=mysql_fetch_array($csql)){
$c++;
$medtech=$cfetch['medtech'];
}

if($ccount!=0){$realm=$medtech;}else{$realm="";}

$realc=$chargeBy;

if($b==1){
echo "
      <tr>
        <td class='table1Bottom1Left' rowspan='$bcount'><div align='center' class='style5'>&nbsp;".$bfetch['dateCharge']."&nbsp;</div></td>
        <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;".$bfetch['timeCharge']."&nbsp;</div></td>
        <td class='table1Bottom1Left' rowspan='$bcount'><div align='center' class='style5'>&nbsp;$registrationNo&nbsp;</div></td>
        <td class='table1Bottom1Left' rowspan='$bcount'><div align='left' class='style5'>&nbsp;".strtoupper($completeName)."&nbsp;</div></td>
        <td class='table1Bottom1Left' rowspan='$bcount'><div align='center' class='style5'>&nbsp;".date("m/d/Y",strtotime($Birthdate))."&nbsp;</div></td>
        <td class='table1Bottom1Left' rowspan='$bcount'><div align='center' class='style5'>&nbsp;$age&nbsp;</div></td>
        <td class='table1Bottom1Left' rowspan='$bcount'><div align='center' class='style5'>&nbsp;$sex&nbsp;</div></td>
        <td class='table1Bottom1Left' rowspan='$bcount'><div align='center' class='style5'>&nbsp;$realroom&nbsp;</div></td>
        <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($description)."&nbsp;</div></td>
        <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($remarks)."&nbsp;</div></td>
        <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($realc)."&nbsp;</div></td>
        <td class='table1Bottom1Left1Right'><div align='left' class='style5'>&nbsp;".strtoupper($realm)."&nbsp;</div></td>
      </tr>
";
}
else if($b>1){
echo "
      <tr>
        <td class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;".$bfetch['timeCharge']."&nbsp;</div></td>
        <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($description)."&nbsp;</div></td>
        <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($remarks)."&nbsp;</div></td>
        <td class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($realc)."&nbsp;</div></td>
        <td class='table1Bottom1Left1Right'><div align='left' class='style5'>&nbsp;".strtoupper($realm)."&nbsp;</div></td>
      </tr>
";
}

}

$tottest+=$b;
}

echo "
      <tr>
        <td class='table1Top2Bottom' colspan='3' height='30'><div align='right' class='style7'>&nbsp;Number Of Patient/s&nbsp;</div></td>
        <td class='table1Top2Bottom' height='30'><div align='left' class='style7'>&nbsp;: $a&nbsp;</div></td>
        <td class='table1Top2Bottom' colspan='4' height='30'><div align='right' class='style7'>&nbsp;Number of Test/s&nbsp;</div></td>
        <td class='table1Top2Bottom' height='30'><div align='left' class='style7'>&nbsp;:$tottest&nbsp;</div></td>
        <td class='table1Top2Bottom' colspan='4' height='30'><div align='left' class='style5'>&nbsp;&nbsp;</div></td>
      </tr>
    </table></td>
  </tr>
</table>

</div>
";
?>
</body>
</html>
