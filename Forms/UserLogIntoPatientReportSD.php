<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Deleted Test Results</title>
<style type="text/css">
<!--
.Arial10Black {font-family: Arial;font-size: 10px;color: #000000;}
.Arial10WhiteBold {font-family: Arial;font-size: 10px;color: #FFFFFF;font-weight: bold;}
.Arial11Black {font-family: Arial;font-size: 11px;color: #000000;}
.Arial11BlackBold {font-family: Arial;font-size: 11px;color: #000000;font-weight: bold;}
.Arial12Black {font-family: Arial;font-size: 12px;color: #000000;}
.Arial12BlackBold {font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
.Arial13Black {font-family: Arial;font-size: 13px;color: #000000;}
.Arial13BlackBold {font-family: Arial;font-size: 13px;color: #000000;font-weight: bold;}
.Arial14Black {font-family: Arial;font-size: 14px;color: #000000;}
.Arial14WhiteBold {font-family: Arial;font-size: 14px;color: #FFFFFF;font-weight: bold;}
.textfield1 {font-family: Arial;font-size: 12px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 1px solid #000000;height: 25px;}
.textfield2 {font-family: Arial;font-size: 12px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 1px solid #000000;height: 30px;}
.button1 {font-family: Arial;font-size: 12px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 1px solid #000000;height: 30px;}
.centered {position: fixed;top: 50%;left: 50%;margin-top: -46px;margin-left: -288px;}
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

function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
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

echo "
<div class='centered'>
<table border='1' bordercolor='#000000' bgcolor='#0066FF' cellpadding='0' cellspacing='0'>
  <tr>
    <td height='25'><div align='center' class='Arial14WhiteBold'>Select What to View</div></td>
  </tr>
  <tr>
    <td width='576' height='67'><div align='center'><table border='0' cellpadding='0' cellspacing='0'>
      <tr>
        <td><div align='center' class='Arial10WhiteBold'>Input Registration No.<br />Leave Blank to Show All</div></td>
        <td colspan='3'><div align='center' class='Arial10WhiteBold'>Select Date From</div></td>
        <td colspan='3'><div align='center' class='Arial10WhiteBold'>Select Date To</div></td>
        <td></td>
      </tr>
      <tr>
        <form name='Submit' method='get' action='UserLogIntoPatientReport.php'>
        <td><div align='center'>&nbsp;<input name='registrationNo' type='text' class='textfield1' placeholder='Registration No.' />&nbsp;</div></td>
        <td><div align='center'>&nbsp;
          <select name='fmonth' class='textfield1'>
";
$pmonth=date("m");

if($pmonth=='01'){$pmsf01="selected='selected'";$pmsf02="";$pmsf03="";$pmsf04="";$pmsf05="";$pmsf06="";$pmsf07="";$pmsf08="";$pmsf09="";$pmsf10="";$pmsf11="";$pmsf12="";}
else if($pmonth=='02'){$pmsf01="";$pmsf02="selected='selected'";$pmsf03="";$pmsf04="";$pmsf05="";$pmsf06="";$pmsf07="";$pmsf08="";$pmsf09="";$pmsf10="";$pmsf11="";$pmsf12="";}
else if($pmonth=='03'){$pmsf01="";$pmsf02="";$pmsf03="selected='selected'";$pmsf04="";$pmsf05="";$pmsf06="";$pmsf07="";$pmsf08="";$pmsf09="";$pmsf10="";$pmsf11="";$pmsf12="";}
else if($pmonth=='04'){$pmsf01="";$pmsf02="";$pmsf03="";$pmsf04="selected='selected'";$pmsf05="";$pmsf06="";$pmsf07="";$pmsf08="";$pmsf09="";$pmsf10="";$pmsf11="";$pmsf12="";}
else if($pmonth=='05'){$pmsf01="";$pmsf02="";$pmsf03="";$pmsf04="";$pmsf05="selected='selected'";$pmsf06="";$pmsf07="";$pmsf08="";$pmsf09="";$pmsf10="";$pmsf11="";$pmsf12="";}
else if($pmonth=='06'){$pmsf01="";$pmsf02="";$pmsf03="";$pmsf04="";$pmsf05="";$pmsf06="selected='selected'";$pmsf07="";$pmsf08="";$pmsf09="";$pmsf10="";$pmsf11="";$pmsf12="";}
else if($pmonth=='07'){$pmsf01="";$pmsf02="";$pmsf03="";$pmsf04="";$pmsf05="";$pmsf06="";$pmsf07="selected='selected'";$pmsf08="";$pmsf09="";$pmsf10="";$pmsf11="";$pmsf12="";}
else if($pmonth=='08'){$pmsf01="";$pmsf02="";$pmsf03="";$pmsf04="";$pmsf05="";$pmsf06="";$pmsf07="";$pmsf08="selected='selected'";$pmsf09="";$pmsf10="";$pmsf11="";$pmsf12="";}
else if($pmonth=='09'){$pmsf01="";$pmsf02="";$pmsf03="";$pmsf04="";$pmsf05="";$pmsf06="";$pmsf07="";$pmsf08="";$pmsf09="selected='selected'";$pmsf10="";$pmsf11="";$pmsf12="";}
else if($pmonth=='10'){$pmsf01="";$pmsf02="";$pmsf03="";$pmsf04="";$pmsf05="";$pmsf06="";$pmsf07="";$pmsf08="";$pmsf09="";$pmsf10="selected='selected'";$pmsf11="";$pmsf12="";}
else if($pmonth=='11'){$pmsf01="";$pmsf02="";$pmsf03="";$pmsf04="";$pmsf05="";$pmsf06="";$pmsf07="";$pmsf08="";$pmsf09="";$pmsf10="";$pmsf11="selected='selected'";$pmsf12="";}
else if($pmonth=='12'){$pmsf01="";$pmsf02="";$pmsf03="";$pmsf04="";$pmsf05="";$pmsf06="";$pmsf07="";$pmsf08="";$pmsf09="";$pmsf10="";$pmsf11="";$pmsf12="selected='selected'";}

echo "
            <option value='01' $pmsf01>Jan</option>
            <option value='02' $pmsf02>Feb</option>
            <option value='03' $pmsf03>Mar</option>
            <option value='04' $pmsf04>Apr</option>
            <option value='05' $pmsf05>May</option>
            <option value='06' $pmsf06>Jun</option>
            <option value='07' $pmsf07>Jul</option>
            <option value='08' $pmsf08>Aug</option>
            <option value='09' $pmsf09>Sep</option>
            <option value='10' $pmsf10>Oct</option>
            <option value='11' $pmsf11>Nov</option>
            <option value='12' $pmsf12>Dec</option>
";


echo "
          </select>
        </div></td>
        <td><div align='center'>
          <select name='fday' class='textfield1'>
";

$pday=date("d");

for($a=1;$a<=31;$a++){
if($a<10){$b="0".$a;}else{$b=$a;}
if($b==$pday){$pdsf="selected='selected'";}else{$pdsf="";}
echo "
            <option $pdsf>$b</option>
";
}


echo "
          </select>
        </div></td>
        <td><div align='center'>
          <select name='fyear' class='textfield1'>
";

$pyear=date("Y");

for($c=($pyear-50);$c<=($pyear-1);$c++){
echo "
            <option>$c</option>
";
}

echo "
            <option selected='selected'>$pyear</option>
";

for($d=($pyear+1);$d<=($pyear+50);$d++){
echo "
            <option>$d</option>
";
}

echo "
          </select>
        &nbsp;</div></td>

        <td><div align='center'>&nbsp;
          <select name='tmonth' class='textfield1'>
";

if($pmonth=='01'){$pmst01="selected='selected'";$pmst02="";$pmst03="";$pmst04="";$pmst05="";$pmst06="";$pmst07="";$pmst08="";$pmst09="";$pmst10="";$pmst11="";$pmst12="";}
else if($pmonth=='02'){$pmst01="";$pmst02="selected='selected'";$pmst03="";$pmst04="";$pmst05="";$pmst06="";$pmst07="";$pmst08="";$pmst09="";$pmst10="";$pmst11="";$pmst12="";}
else if($pmonth=='03'){$pmst01="";$pmst02="";$pmst03="selected='selected'";$pmst04="";$pmst05="";$pmst06="";$pmst07="";$pmst08="";$pmst09="";$pmst10="";$pmst11="";$pmst12="";}
else if($pmonth=='04'){$pmst01="";$pmst02="";$pmst03="";$pmst04="selected='selected'";$pmst05="";$pmst06="";$pmst07="";$pmst08="";$pmst09="";$pmst10="";$pmst11="";$pmst12="";}
else if($pmonth=='05'){$pmst01="";$pmst02="";$pmst03="";$pmst04="";$pmst05="selected='selected'";$pmst06="";$pmst07="";$pmst08="";$pmst09="";$pmst10="";$pmst11="";$pmst12="";}
else if($pmonth=='06'){$pmst01="";$pmst02="";$pmst03="";$pmst04="";$pmst05="";$pmst06="selected='selected'";$pmst07="";$pmst08="";$pmst09="";$pmst10="";$pmst11="";$pmst12="";}
else if($pmonth=='07'){$pmst01="";$pmst02="";$pmst03="";$pmst04="";$pmst05="";$pmst06="";$pmst07="selected='selected'";$pmst08="";$pmst09="";$pmst10="";$pmst11="";$pmst12="";}
else if($pmonth=='08'){$pmst01="";$pmst02="";$pmst03="";$pmst04="";$pmst05="";$pmst06="";$pmst07="";$pmst08="selected='selected'";$pmst09="";$pmst10="";$pmst11="";$pmst12="";}
else if($pmonth=='09'){$pmst01="";$pmst02="";$pmst03="";$pmst04="";$pmst05="";$pmst06="";$pmst07="";$pmst08="";$pmst09="selected='selected'";$pmst10="";$pmst11="";$pmst12="";}
else if($pmonth=='10'){$pmst01="";$pmst02="";$pmst03="";$pmst04="";$pmst05="";$pmst06="";$pmst07="";$pmst08="";$pmst09="";$pmst10="selected='selected'";$pmst11="";$pmst12="";}
else if($pmonth=='11'){$pmst01="";$pmst02="";$pmst03="";$pmst04="";$pmst05="";$pmst06="";$pmst07="";$pmst08="";$pmst09="";$pmst10="";$pmst11="selected='selected'";$pmst12="";}
else if($pmonth=='12'){$pmst01="";$pmst02="";$pmst03="";$pmst04="";$pmst05="";$pmst06="";$pmst07="";$pmst08="";$pmst09="";$pmst10="";$pmst11="";$pmst12="selected='selected'";}

echo "
            <option value='01' $pmst01>Jan</option>
            <option value='02' $pmst02>Feb</option>
            <option value='03' $pmst03>Mar</option>
            <option value='04' $pmst04>Apr</option>
            <option value='05' $pmst05>May</option>
            <option value='06' $pmst06>Jun</option>
            <option value='07' $pmst07>Jul</option>
            <option value='08' $pmst08>Aug</option>
            <option value='09' $pmst09>Sep</option>
            <option value='10' $pmst10>Oct</option>
            <option value='11' $pmst11>Nov</option>
            <option value='12' $pmst12>Dec</option>
";


echo "
          </select>
        </div></td>
        <td><div align='center'>
          <select name='tday' class='textfield1'>
";

for($e=1;$e<=31;$e++){
if($e<10){$f="0".$e;}else{$f=$e;}
if($f==$pday){$pdst="selected='selected'";}else{$pdst="";}
echo "
            <option $pdst>$f</option>
";
}


echo "
          </select>
        </div></td>
        <td><div align='center'>
          <select name='tyear' class='textfield1'>
";


for($g=($pyear-50);$g<=($pyear-1);$g++){
echo "
            <option>$g</option>
";
}

echo "
            <option selected='selected'>$pyear</option>
";

for($h=($pyear+1);$h<=($pyear+50);$h++){
echo "
            <option>$h</option>
";
}

echo "
          </select>
        &nbsp;</div></td>
        <td>&nbsp;<input name='Submit' type='submit' class='button1' value='Submit' />
        <input name='username' type='hidden' value='$username' />
        </form>
      </tr>
    </table></div></td>
  </tr>
</table>
</div>
";

?>
</body>
</html>
