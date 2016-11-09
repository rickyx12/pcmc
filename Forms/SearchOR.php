<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Search O. R.</title>
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
$search=mysql_real_escape_string($_GET['search']);

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
.textfield1 {font-family: Arial;font-size: 14px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 2px solid #000000;height: 25px;width: 200px;}
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
  <form name='Search' method='get' action='SearchOR.php'>
  <tr>
    <td bgcolor='#FFFFFF'><input type='text' name='search' class='textfield1' placeholder=' Search OR Number' /></td>
    <td bgcolor='#FFFFFF'>&nbsp;</td>
    <td bgcolor='#FFFFFF'>
    </td>
    <td bgcolor='#FFFFFF'>&nbsp;</td>
    <td bgcolor='#FFFFFF'><input type='submit' name='Submit' class='button1' value=' SEARCH ' /></td>
  </tr>
  <input name='username' type='hidden' value='$username' />
  </form>
</table>
<br />
<br />
";

echo "
<table width='100%' border='0' cellpadding='0' cellspacing='0'>
  <tr>
    <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;#&nbsp;</div></td>
    <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Px ID&nbsp;</div></td>
    <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Patient's Name&nbsp;</div></td>
    <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Date-Time Paid&nbsp;</div></td>
    <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Particulars&nbsp;</div></td>
    <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Amount&nbsp;</div></td>
    <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Paid Via&nbsp;</div></td>
    <td height='20' bgcolor='#0066FF' class='table2Top2Bottom'><div align='center' class='style4'>&nbsp;Log In User&nbsp;</div></td>
  </tr>
";

$a=0;
if($search!=''){
$asql=mysql_query("SELECT registrationNo, amountPaid, datePaid, timePaid, paidBy, paymentFor, paidVia FROM patientPayment WHERE orNo='$search'");
$acount=mysql_num_rows($asql);

if($acount!=0){
while($afetch=mysql_fetch_array($asql)){
$a++;
$apatientNo=$cuz->selectNow("registrationDetails","patientNo","registrationNo",$afetch['registrationNo']);
$acompleteName=$cuz->selectNow("patientRecord","completeName","patientNo",$apatientNo);

echo "
  <tr>
    <td height='20' class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;$a&nbsp;</div></td>
    <td height='20' class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".$afetch['registrationNo']."&nbsp;</div></td>
    <td height='20' class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($acompleteName)."&nbsp;</div></td>
    <td height='20' class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;".$afetch['datePaid']."-".$afetch['timePaid']."&nbsp;</div></td>
    <td height='20' class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($afetch['paymentFor'])."&nbsp;</div></td>
    <td height='20' class='table1Bottom1Left'><div align='right' class='style5'>&nbsp;".number_format($afetch['amountPaid'],2)."&nbsp;</div></td>
    <td height='20' class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;".strtoupper($afetch['paidVia'])."&nbsp;</div></td>
    <td height='20' class='table1Bottom1Left1Right'><div align='center' class='style5'>&nbsp;".strtoupper($afetch['paidBy'])."&nbsp;</div></td>
  </tr>
";
}
}

$bsql=mysql_query("SELECT registrationNo, cashPaid, datePaid, timePaid, paidBy, description, paidVia FROM patientCharges WHERE orNo='$search'");
$bcount=mysql_num_rows($bsql);

if($bcount!=0){
while($bfetch=mysql_fetch_array($bsql)){
$b++;
$bpatientNo=$cuz->selectNow("registrationDetails","patientNo","registrationNo",$bfetch['registrationNo']);
$bcompleteName=$cuz->selectNow("patientRecord","completeName","patientNo",$bpatientNo);

echo "
  <tr>
    <td height='20' class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;".$b+$a."&nbsp;</div></td>
    <td height='20' class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".$bfetch['registrationNo']."&nbsp;</div></td>
    <td height='20' class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($bcompleteName)."&nbsp;</div></td>
    <td height='20' class='table1Bottom1Left'><div align='center' class='style5'>&nbsp;".$bfetch['datePaid']."-".$bfetch['timePaid']."&nbsp;</div></td>
    <td height='20' class='table1Bottom1Left'><div align='left' class='style5'>&nbsp;".strtoupper($bfetch['description'])."&nbsp;</div></td>
    <td height='20' class='table1Bottom1Left'><div align='right' class='style5'>&nbsp;".number_format($bfetch['cashPaid'],2)."&nbsp;</div></td>
    <td height='20' class='table1Bottom1Left1Right'><div align='center' class='style5'>&nbsp;".strtoupper($bfetch['paidVia'])."&nbsp;</div></td>
    <td height='20' class='table1Bottom1Left1Right'><div align='center' class='style5'>&nbsp;".strtoupper($bfetch['paidBy'])."&nbsp;</div></td>
  </tr>
";


}
}

}

echo "
</table>
</div>
";
?>
</body>
</html>
