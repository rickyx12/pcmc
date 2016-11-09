<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="icon" href="../Resources/Favicon/favicon.png" type="image/png" />
<link rel="shortcut icon" href="../Resources/Favicon/favicon.png" type="image/png" />
<title>Add Medicine/Supplies Price Adjustment Exception</title>
<link href="../Resources/CSS/style.css" rel="stylesheet" type="text/css" />
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
<style type="text/css">
<!--
body {
	background-image: url(../Resources/Logo/02.png);
}
-->
</style></head>

<body>
<?php
include("../myDatabase.php");
$cuz = new database();
mysql_connect($cuz->myHost(),$cuz->getUser(),$cuz->getPass());
mysql_select_db($cuz->getDB());

$username=mysql_real_escape_string($_GET['username']);
$searchcharges=mysql_real_escape_string($_GET['searchcharges']);

echo "
<table border='0' width='100%' cellpadding='0' cellspacing='0'>
  <tr>
    <td height='15'></td>
  </tr>
  <tr>
    <td valign='top'><div align='left'><table border='0' cellpadding='0' cellspacing='0'>
      <tr bgcolor='#000000'>
        <td><table border='1' bordercolor='#000000' cellpadding='0' cellspacing='0'>
          <tr>
            <td bgcolor='#0066FF'><div align='center' class='arial12whitebold'>&nbsp;Description&nbsp;</div></td>
            <td bgcolor='#0066FF'><div align='center' class='arial12whitebold'>&nbsp;Type&nbsp;</div></td>
          </tr>
";

$ipaesql=mysql_query("SELECT description, inventoryType FROM inventory WHERE description LIKE '%$searchcharges%' AND quantity > '0' GROUP BY description ORDER BY description");
$ipaecount=mysql_num_rows($ipaesql);
if($ipaecount!=0){
$num=0;
while($ipaefetch=mysql_fetch_array($ipaesql)){
$num++;
echo "
          <tr>
            <td bgcolor='#FFFFFF'><div align='left' id='desc$num' onmouseover=MM_changeProp('desc$num','','style.backgroundColor','#B90DE3','DIV') onmouseout=MM_changeProp('desc$num','','style.backgroundColor','#FFFFFF','DIV')><a href='AddReInventoryPAExceptionSRAdd.php?username=$username&description=".$ipaefetch['description']."&type=".strtoupper($ipaefetch['inventoryType'])."' class='astylearial12blackbold'>&nbsp;".$ipaefetch['description']."&nbsp;</a></div></td>
            <td bgcolor='#FFFFFF'><div align='center' class='arial14black'>&nbsp;".strtoupper($ipaefetch['inventoryType'])."&nbsp;</div></td>
          </tr>
";
}
}
else{
}

echo "
          <tr>
            <td height='6' bgcolor='#0066FF'></td>
            <td height='6' bgcolor='#0066FF'></td>
          </tr>
        </table></td>
      </tr>
    </table></div></td>
  </tr>
</table>
";

?>
</body>
