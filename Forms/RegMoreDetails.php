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
.textfield2 {font-family: Arial;font-size: 12px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 1px solid #000000;width: 200px;}
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

$lastName=$cuz->selectNow("patientRecord","lastName","patientNo",$patientNo);
$firstName=$cuz->selectNow("patientRecord","firstName","patientNo",$patientNo);
$middleName=$cuz->selectNow("patientRecord","middleName","patientNo",$patientNo);

$name=$lastName.", ".$firstName." ".$middleName;

echo "
    <tr>
      <td><div align='center' class='style1'>ADDITIONAL INFORMATION FOR ".strtoupper($name)."</div></td>
    </tr>
    <tr>
      <td height='20'></td>
    </tr>
";

$asql=mysql_query("SELECT * FROM registrationDetailsAddInfo WHERE registrationNo='$registrationNo'");
while($afetch=mysql_fetch_array($asql)){
$informant=$afetch['informant'];
$informantaddress=$afetch['informantaddress'];
$relationtopatient=$afetch['relationtopatient'];
$informantcontactno=$afetch['informantcontactno'];
}

echo "
    <form name='Submit' method='get' action='RegMoreDetailsSave.php'>
    <tr>
      <td class='table1Top1Bottom1Left1Right'><table width='100%' border='0' bordercolor='#000000' cellspacing='0' cellpadding='0'>
        <tr>
          <td><div align='center' class='style2'>Informant's Name</div></td>
          <td class='table1Left'><div align='center' class='style2'>Informants's Address</div></td>
        </tr>
        <tr>
          <td width='33%' height='30'><div align='center' class='style2'><input type='text' name='informant' class='textfield1' value='$informant' /></div></td>
          <td width='34%' height='30' class='table1Left'><div align='center' class='style2'><textarea name='informantaddress' class='textfield2'>$informantaddress</textarea></div></div></td>
        </tr>
      </table></td>
    </tr>
";


echo "
    <tr>
      <td class='table1Top1Bottom1Left1Right'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
        <tr>
          <td width='33%'><div align='center' class='style2'>Informant's Relation<br />to Patient</div></td>
          <td width='34%' class='table1Left'><div align='center' class='style2'>Informants's Contact No.</div></td>
        </tr>
        <tr>
          <td width='33%' height='30'><div align='center' class='style2'><input type='text' name='relationtopatient' class='textfield1' value='$relationtopatient' /></div></td>
          <td width='34%' height='30' class='table1Left'><div align='center' class='style2'><input type='text' name='informantcontactno' class='textfield1' value='$informantcontactno' /></div></div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height='20'></td>
    </tr>
    <tr>
      <td><div align='center'><input type='submit' name='Submit' class='button1' value='Update Details' /></div></td>
    </tr>
    <input type='hidden' name='username' value='$username' />
    <input type='hidden' name='registrationNo' value='$registrationNo' />
";

echo "
  </table>
</div>
";
?>
</body>
</html>
