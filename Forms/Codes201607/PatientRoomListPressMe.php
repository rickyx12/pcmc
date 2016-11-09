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

<div align='center'>
<br />
<table border='0' cellpadding='0' cellspacing='0'>
  <tr>
    <form method='post' name='room' target='_blank' action='PatientRoomList.php'>
    <td><input name='PressMe' type='submit' class='button01' value='Patients Room List' /></td>
    </form>
  </tr>
</table>
</div>
";
?>
</body>
</html>
