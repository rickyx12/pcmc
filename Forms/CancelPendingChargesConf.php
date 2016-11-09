<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Delete Pending Charges</title>
<style type="text/css">
<!--
.style1 {font-family: Arial;font-size: 14px;font-weight: bold;color: #FF0000;}
.style2 {font-family: Arial;font-size: 16px;font-weight: bold;color: #FF6600;}
.style3 {font-family: Arial;font-size: 12px;font-weight: bold;color: #FFFFFF;}
.style4 {font-family: Arial;font-size: 12px;font-weight: bold;color: #0033FF;}
.style5 {font-family: Arial;font-size: 14px;font-weight: bold;color: #FF6600;}
.textfield01 {font-family: Arial;font-size: 14px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 1px solid #000000;}
.button01 {font-family: Arial;font-size: 12px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 1px solid #000000;}
.button02 {font-family: Arial;font-size: 12px;font-weight: bold;color: #FF0000;background-color: #FFFFFF;border: 1px solid #000000;}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_changeProp(objName,x,theProp,theValue) { //v6.0
  var obj = MM_findObj(objName);
  if (obj && (theProp.indexOf("style.")==-1 || obj.style)){
    if (theValue == true || theValue == false)
      eval("obj."+theProp+"="+theValue);
    else eval("obj."+theProp+"='"+theValue+"'");
  }
}
//-->
</script>
</head>

<body>
<?php
include("../myDatabase.php");
$cuz = new database();
mysql_connect($cuz->myHost(),$cuz->getUser(),$cuz->getPass());
mysql_select_db($cuz->getDB());

$username=$_GET['username'];
$registrationNo=$_GET['registrationNo'];
$itemNo=$_GET['itemNo'];

$day=date("d");
$month=date("m");
$year=date("Y");

$description=$cuz->selectNow("patientCharges","description","itemNo",$itemNo);

echo "
<br />
<br />
<div align='center'><table border='1' bordercolor='#000000' width='500' cellspacing='0' cellpadding='0'>
  <tr>
    <td><table border='0' width='500' cellspacing='0' cellpadding='0'>
      <tr>
        <td height='30' width='20'></td>
        <td height='30'></td>
        <td height='30' width='20'></td>
      </tr>
      <tr>
        <td width='20'></td>
        <td height='30'><div align='center' class='style1'>Cancel delete of<br />$description?</div></td>
        <td width='20'></td>
      </tr>
      <tr>
        <td width='20'></td>
        <td height='30'><div align='center' class='style1'><table border='0' width='100%' cellspacing
          <tr>
            <form name='Cancel' method='get' action='../COCONUT/ADMIN/pendingDelete_update.php'>
            <input type='hidden' name='username' value='$username' />
            <input type='hidden' name='registrationNo' value='$registrationNo' />
            <td width='50%'><div align='right'><input type='submit' name='Submit' class='button02' value='  No? ' /></div></td>
            </form>
            <form name='Cancel' method='post' action='CancelPendingCharges.php'>
            <input type='hidden' name='username' value='$username' />
            <input type='hidden' name='registrationNo' value='$registrationNo' />
            <input type='hidden' name='itemNo' value='$itemNo' />
            <td width='50%'><div align='left'><input type='submit' name='Submit' class='button01' value=' Yes? ' /></div></td>
            </form>
          </tr>
        </div></td>
        <td width='20'></td>
      </tr>
      <tr>
        <td height='30' width='20'></td>
        <td height='30'></td>
        <td height='30' width='20'></td>
      </tr>
    </table></td>
  </tr>
</table></div>
";
?>
</body>
</html>
