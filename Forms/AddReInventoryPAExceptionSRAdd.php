<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Add Medicine/Supplies Price Adjustment Exception</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function MM_changeProp(objName,x,theProp,theValue) { //v6.0
  var obj = MM_findObj(objName);
  if (obj && (theProp.indexOf("style.")==-1 || obj.style)){
    if (theValue == true || theValue == false)
      eval("obj."+theProp+"="+theValue);
    else eval("obj."+theProp+"='"+theValue+"'");
  }
}

function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function placeFocus() {
if (document.forms.length > 0) {
var field = document.forms[0];
for (i = 0; i < field.length; i++) {
if ((field.elements[i].type == "text") || (field.elements[i].type == "textarea") || (field.elements[i].type.toString().charAt(0) == "s")) {
document.forms[8].elements[i].focus();
break;
         }
      }
   }
}

function showResult() {
if (document.addCharge.availableCharges.value.length==0) {
document.getElementById("livesearch").innerHTML="";
document.getElementById("livesearch").style.border="0px";
return;
}
if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else {// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function() {
if (xmlhttp.readyState==4 && xmlhttp.status==200) {
document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
document.getElementById("livesearch").style.border="0px solid #A5ACB2";
  }
}
xmlhttp.open("GET","AddReInventoryPAExceptionSR.php?searchcharges="+document.addCharge.availableCharges.value+"&username="+document.addCharge.username.value,true);
xmlhttp.send();
}

var charges = ' Input Search Here';
function SetMsg (txt,active) {
if (txt == null) return;
if (active) {
if (txt.value == charges) txt.value = '';                     
  }
else {
if (txt.value == '') txt.value = charges;
  }
}

window.onload=function() { SetMsg(document.getElementById('charges', false)); }
//-->
</script>
<style type="text/css">
<!--
body {
	background-image: url(../Resources/Logo/02.png);
}
-->
</style></head>

<body onload="RefreshTable()">

<?php
include("../myDatabase.php");
$cuz = new database();
mysql_connect($cuz->myHost(),$cuz->getUser(),$cuz->getPass());
mysql_select_db($cuz->getDB());

$username=mysql_real_escape_string($_GET['username']);
$description=mysql_real_escape_string($_GET['description']);
$type=mysql_real_escape_string($_GET['type']);

echo "
<table width='100%' border='0' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='10'></td>
    <td><div align='left' class='arial14bluebold'>Adding item...</div></td>
  </tr>
</table>
";

mysql_query("INSERT INTO `inventorypaexception` (`description`, `type`, `status`, `dateadded`, `addedby`) VALUES ('$description', '$type', 'Active', '".date("YmdHis")."', '$username')");

echo "<META HTTP-EQUIV='Refresh'CONTENT='0;URL=MedsSupPAExceptionList.php?username=$username'>";
?>
</body>
</html>
