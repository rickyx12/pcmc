<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Aging of Accounts</title>
<style type="text/css">
<!--
.style1 {font-family: Arial;font-size: 14px;font-weight: bold;color: #000000;}
.style2 {font-family: Arial;font-size: 16px;font-weight: bold;color: #FF6600;}
.style3 {font-family: Arial;font-size: 12px;font-weight: bold;color: #FFFFFF;}
.style4 {font-family: Arial;font-size: 12px;font-weight: bold;color: #0033FF;}
.style5 {font-family: Arial;font-size: 14px;font-weight: bold;color: #FF6600;}
.textfield01 {font-family: Arial;font-size: 14px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 1px solid #000000;}
.button01 {font-family: Arial;font-size: 16px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 1px solid #000000;}
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
include("../../myDatabase.php");
$cuz = new database();

mysql_connect($cuz->myHost(),$cuz->getUser(),$cuz->getPass());
mysql_select_db($cuz->getDB());

$username=$_GET['username'];

$day=date("d");
$month=date("m");
$year=date("Y");

echo "
<div align='center'>
  <table width='700' border='1' cellpadding='0' cellspacing='0' bordercolor='#000000'>
    <tr>
      <form id='Select' name='Select' method='get' action='PHICCreditBalance.php'>
      <td bgcolor='#FFCC33'><div align='center'>
        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
          <tr>
            <td height='20' align='center' valign='middle'><div align='center'>
            </div></td>
          </tr>
          <tr>
            <td align='center' valign='middle'><div align='center'>
              <select name='type' class='textfield01'>
                <option>IPD</option>
                <option>OPD</option>
              </select>
            </div></td>
          </tr>
";

if($month=='01'){$fm01="selected='selected'"; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($month=='02'){$fm01=""; $fm02="selected='selected'"; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($month=='03'){$fm01=""; $fm02=""; $fm03="selected='selected'"; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($month=='04'){$fm01=""; $fm02=""; $fm03=""; $fm04="selected='selected'"; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($month=='05'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05="selected='selected'"; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($month=='06'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06="selected='selected'"; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($month=='07'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07="selected='selected'"; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($month=='08'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08="selected='selected'"; $fm09=""; $fm10=""; $fm11=""; $fm12="";}
else if($month=='09'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09="selected='selected'"; $fm10=""; $fm11=""; $fm12="";}
else if($month=='10'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10="selected='selected'"; $fm11=""; $fm12="";}
else if($month=='11'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11="selected='selected'"; $fm12="";}
else if($month=='12'){$fm01=""; $fm02=""; $fm03=""; $fm04=""; $fm05=""; $fm06=""; $fm07=""; $fm08=""; $fm09=""; $fm10=""; $fm11=""; $fm12="selected='selected'";}


echo "
          <tr>
            <td align='center' valign='middle'><div align='center' class='style1'>
              From
              <select name='fmonth' class='textfield01'>
                <option value='01' $fm01>Jan</option>
                <option value='02' $fm02>Feb</option>
                <option value='03' $fm03>Mar</option>
                <option value='04' $fm04>Apr</option>
                <option value='05' $fm05>May</option>
                <option value='06' $fm06>Jun</option>
                <option value='07' $fm07>Jul</option>
                <option value='08' $fm08>Aug</option>
                <option value='09' $fm09>Sep</option>
                <option value='10' $fm10>Oct</option>
                <option value='11' $fm11>Nov</option>
                <option value='12' $fm12>Dec</option>
              </select>
              <select name='fday' class='textfield01'>
";

for($z=1;$z<=31;$z++){
if($z<10){$y="0".$z;}else{$y=$z;}
if($y==$day){$fd="selected='selected'";}else{$fd="";}

echo "
                <option $fd>$y</option>
";
}

echo "
              </select>
              <select name='fyear' class='textfield01'>
";

for($a=2000;$a<$year;$a++){
echo "
                <option>$a</option>
";
}

echo "
                <option selected='selected'>$year</option>
";

for($b=($year+1);$b<=($year+10);$b++){
echo "
                <option>$b</option>
";
}

echo "
              </select>
            </div></td>
          </tr>
";

if($month=='01'){$tm01="selected='selected'"; $tm02=""; $tm03=""; $tm04=""; $tm05=""; $tm06=""; $tm07=""; $tm08=""; $tm09=""; $tm10=""; $tm11=""; $tm12="";}
else if($month=='02'){$tm01=""; $tm02="selected='selected'"; $tm03=""; $tm04=""; $tm05=""; $tm06=""; $tm07=""; $tm08=""; $tm09=""; $tm10=""; $tm11=""; $tm12="";}
else if($month=='03'){$tm01=""; $tm02=""; $tm03="selected='selected'"; $tm04=""; $tm05=""; $tm06=""; $tm07=""; $tm08=""; $tm09=""; $tm10=""; $tm11=""; $tm12="";}
else if($month=='04'){$tm01=""; $tm02=""; $tm03=""; $tm04="selected='selected'"; $tm05=""; $tm06=""; $tm07=""; $tm08=""; $tm09=""; $tm10=""; $tm11=""; $tm12="";}
else if($month=='05'){$tm01=""; $tm02=""; $tm03=""; $tm04=""; $tm05="selected='selected'"; $tm06=""; $tm07=""; $tm08=""; $tm09=""; $tm10=""; $tm11=""; $tm12="";}
else if($month=='06'){$tm01=""; $tm02=""; $tm03=""; $tm04=""; $tm05=""; $tm06="selected='selected'"; $tm07=""; $tm08=""; $tm09=""; $tm10=""; $tm11=""; $tm12="";}
else if($month=='07'){$tm01=""; $tm02=""; $tm03=""; $tm04=""; $tm05=""; $tm06=""; $tm07="selected='selected'"; $tm08=""; $tm09=""; $tm10=""; $tm11=""; $tm12="";}
else if($month=='08'){$tm01=""; $tm02=""; $tm03=""; $tm04=""; $tm05=""; $tm06=""; $tm07=""; $tm08="selected='selected'"; $tm09=""; $tm10=""; $tm11=""; $tm12="";}
else if($month=='09'){$tm01=""; $tm02=""; $tm03=""; $tm04=""; $tm05=""; $tm06=""; $tm07=""; $tm08=""; $tm09="selected='selected'"; $tm10=""; $tm11=""; $tm12="";}
else if($month=='10'){$tm01=""; $tm02=""; $tm03=""; $tm04=""; $tm05=""; $tm06=""; $tm07=""; $tm08=""; $tm09=""; $tm10="selected='selected'"; $tm11=""; $tm12="";}
else if($month=='11'){$tm01=""; $tm02=""; $tm03=""; $tm04=""; $tm05=""; $tm06=""; $tm07=""; $tm08=""; $tm09=""; $tm10=""; $tm11="selected='selected'"; $tm12="";}
else if($month=='12'){$tm01=""; $tm02=""; $tm03=""; $tm04=""; $tm05=""; $tm06=""; $tm07=""; $tm08=""; $tm09=""; $tm10=""; $tm11=""; $tm12="selected='selected'";}


echo "
          <tr>
            <td align='center' valign='middle'><div align='center' class='style1'>
              To&nbsp;&nbsp;&nbsp;&nbsp;
              <select name='tmonth' class='textfield01'>
                <option value='01' $tm01>Jan</option>
                <option value='02' $tm02>Feb</option>
                <option value='03' $tm03>Mar</option>
                <option value='04' $tm04>Apr</option>
                <option value='05' $tm05>May</option>
                <option value='06' $tm06>Jun</option>
                <option value='07' $tm07>Jul</option>
                <option value='08' $tm08>Aug</option>
                <option value='09' $tm09>Sep</option>
                <option value='10' $tm10>Oct</option>
                <option value='11' $tm11>Nov</option>
                <option value='12' $tm12>Dec</option>
              </select>
              <select name='tday' class='textfield01'>
";

for($x=1;$x<=31;$x++){
if($x<10){$w="0".$x;}else{$w=$x;}
if($w==$day){$td="selected='selected'";}else{$td="";}

echo "
                <option $td>$w</option>
";
}

echo "
              </select>
              <select name='tyear' class='textfield01'>
";

for($c=2000;$c<$year;$c++){
echo "
                <option>$c</option>
";
}

echo "
                <option selected='selected'>$year</option>
";

for($d=($year+1);$d<=($year+10);$d++){
echo "
                <option>$d</option>
";
}

echo "
              </select>
            </div></td>
          </tr>
          <tr>
            <td align='center' height='30' valign='middle'><div align='center'>
              <input name='Submit' type='submit' class='button01' value='Submit' />
            </div></td>
          </tr>
          <tr>
            <td height='20' align='center' valign='middle'><div align='center'>
            </div></td>
          </tr>
        </table>
	  </div></td>
        <input type='hidden' name='username' value='$username' />
      </form>
    </tr>
  </table>
</div>
";
?>
</body>
</html>
