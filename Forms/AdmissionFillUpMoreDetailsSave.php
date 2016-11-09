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
$registrationNo=$_GET['registrationNo'];
$birthPlace=$_GET['birthPlace'];
$nationality=$_GET['nationality'];
$pxOccupation=$_GET['pxOccupation'];
$fathersName=$_GET['fathersName'];
$fatherAddress=$_GET['fatherAddress'];
$fatherContactNo=$_GET['fatherContactNo'];
$mothersName=$_GET['mothersName'];
$motherAddress=$_GET['motherAddress'];
$motherContactNo=$_GET['motherContactNo'];
$spouseName=$_GET['spouseName'];
$spouseAddress=$_GET['spouseAddress'];
$spouseContactNo=$_GET['spouseContactNo'];

echo "
<style type='text/css'>
<!--
.style1 {font-family: Arial;font-size: 16px;color: #000000;font-weight: bold;}
.style2 {font-family: Arial;font-size: 14px;color: #000000;font-weight: bold;}
.style3 {text-decoration: none;font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
.style4 {font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
.style5 {font-family: Arial;font-size: 14px;color: #000000;}
.style6 {font-family: Arial;font-size: 12px;color: #FFFFFF;}
.style7 {font-family: Arial;font-size: 12px;color: #000000;}
.style8 {font-family: Arial;font-size: 12px;color: #FFFFFF;font-weight: bold;}
.table1Left {border-left: 1px solid #000000;}
.table1Right {border-right: 1px solid #000000;}
.table1Left1Right {border-left: 1px solid #000000;border-right: 1px solid #000000;}
.table1Bottom {border-bottom: 1px solid #000000;}
.table1Bottom1Left {border-bottom: 1px solid #000000;border-left: 1px solid #000000;}
.table1Bottom1Right {border-bottom: 1px solid #000000;border-right: 1px solid #000000;}
.table1Bottom1Left1Right {border-bottom: 1px solid #000000;border-left: 1px solid #000000;border-right: 1px solid #000000;}
.table1Top {border-top: 1px solid #000000;}
.table1Top1Bottom {border-top: 1px solid #000000;border-bottom: 1px solid #000000;}
.table1Top1Bottom1Left {border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-left: 1px solid #000000;}
.table1Top1Bottom1Right {border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-right: 1px solid #000000;}
.table1Top1Bottom1Left1Right {border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-left: 1px solid #000000;border-right: 1px solid #000000;}
.textfield1 {font-family: Arial;font-size: 12px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 1px solid #000000;height: 20px;width: 200px;}
.button1 {font-family: Arial;font-size: 12px;font-weight: bold;color: #FFFFFF;background-color: #0066FF;border: 1px solid #000000;height: 30px;}
.doubleUnderline {text-decoration:underline;border-bottom: 1px solid #000;font-family: Arial;font-size: 14px;color: #000000;}
-->
</style>

<div align='center'>
  <table width='100%' border='0' cellspacing='0' cellpadding='0'>
    <tr>
      <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
        <tr>
          <td width='60%' height='50' class='table1Top1Bottom1Left'><div align='center'><img src='../COCONUT/myImages/mendero.png' width='70%' height='100%' /></div></td>
          <td width='40%' height='50' class='table1Top1Bottom1Left1Right'><div align='center' class='style1'>ADMISSION AND DISCHARGE<br />RECORD</div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height='10'></td>
    </tr>
";

$patientNo=$cuz->selectNow("registrationDetails","patientNo","registrationNo",$registrationNo);

echo "
    <tr>
      <td height='20'></td>
    </tr>
    <tr>
      <td><div align='center' class='style1'>Saving data...</div></td>
    </tr>
";

$dateAdded=date("YmdHis");

mysql_query("UPDATE patientRecordAddInfo SET birthPlace='".strtoupper($birthPlace)."',  nationality='".strtoupper($nationality)."', pxOccupation='".strtoupper($pxOccupation)."', fathersName='".strtoupper($fathersName)."', fatherAddress='".strtoupper($fatherAddress)."', fatherContactNo='$fatherContactNo', mothersName='".strtoupper($mothersName)."', motherAddress='".strtoupper($motherAddress)."', motherContactNo='$motherContactNo', spouseName='".strtoupper($spouseName)."', spouseAddress='".strtoupper($spouseAddress)."', spouseContactNo='$spouseContactNo', dateAdded='$dateAdded', addedBy='$username' WHERE patientNo='$patientNo'");


echo "
  </table>
</div>
";
echo "<META HTTP-EQUIV='Refresh'CONTENT='1;URL=AdmissionFillUpMoreDetails.php?username=$username&registrationNo=$registrationNo'>";
?>
</body>
</html>
