<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Aging of Accounts</title>
<style type="text/css">
<!--
.style1 {font-family: Arial;font-size: 15px;font-weight: bold;color: #000000;}
.style2 {font-family: Arial;font-size: 13px;font-weight: bold;color: #000000;}
.style3 {font-family: Arial;font-size: 11px;font-weight: bold;color: #000000;}
.style4 {font-family: Arial;font-size: 11px;color: #000000;}
.style5 {font-family: Arial;font-size: 15px;font-weight: bold;color: #FF6600;}
.style6 {font-family: Arial;font-size: 11px;color: #FF0000;}
.style7 {font-family: Arial;font-size: 11px;font-weight: bold;color: #FF0000;}
.textfield01 {font-family: Arial;font-size: 14px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 1px solid #000000;}
.button01 {font-family: Arial;font-size: 16px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 1px solid #000000;}
.button02 {font-family: Arial;font-size: 12px;font-weight: bold;color: #FF0000;background-color: #FFFFFF;border: 1px solid #000000;}
.button03 {font-family: Arial;font-size: 11px;border: 0;padding: 0;display: inline;background: none;color: #000000;}
button:hover {cursor: pointer;}
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
include("../../myDatabase.php");
$cuz = new database();

mysql_connect($cuz->myHost(),$cuz->getUser(),$cuz->getPass());
mysql_select_db($cuz->getDB());

$username=$_GET['username'];
$companyName=$_GET['companyName'];
$type=$_GET['type'];

if($companyName=='-Select HMO/Company-'){
echo "<div align='center'><span class='style5'>PLEASE SELECT AN HMO/COMPANY. TRY AGAIN!!!</span></div>";
echo "<META HTTP-EQUIV='Refresh'CONTENT='3;URL=HMOComAAByHMOComSelectHMOCom.php'>";
}
else{
echo "
<div align='center'><img src='Heading.jpg' width='60%' height='20%' /></div>
<div align='center'><span class='style1'>$companyName</span>
<br />
<div align='center'><span class='style1'>$type</span>
<br />
<br />
<table width='98%' border='0' cellpadding='0' cellspacing='0' bordercolor='#000000'>
  <tr>
    <td height='1' colspan='8' bgcolor='#000000'></td>
  </tr>
  <tr>
    <td width='10%' height='30' class='style2'><div align='left'>Reg. No. </div></td>
    <td width='24%' class='style2'><div align='left'>Patient Name </div></td>
    <td width='11%' class='style2'><div align='right'>Current</div></td>
    <td width='11%' class='style2'><div align='right'>30 Days </div></td>
    <td width='11%' class='style2'><div align='right'>60 Days </div></td>
    <td width='11%' class='style2'><div align='right'>90 Days </div></td>
    <td width='11%' class='style2'><div align='right'>120 Days &amp; Over </div></td>
    <td width='11%' class='style2'><div align='right'>PF</div></td>
  </tr>
  <tr>
    <td height='1' colspan='8' bgcolor='#000000'></td>
  </tr>
  <tr>
    <td height='6' colspan='8'></td>
  </tr>
";

$num=0;
$grandhba=0;
$grandhbb=0;
$grandhbc=0;
$grandhbd=0;
$grandhbe=0;
$grandpf=0;
if($type=="IPD"){
$asql=mysql_query("SELECT rd.patientNo, rd.registrationNo, rd.Company, rd.dateRegistered, rd.dateUnregistered, rd.type, pr.lastName, pr.firstName, pr.middleName FROM registrationDetails rd, patientRecord pr WHERE rd.patientNo=pr.patientNo AND rd.company='$companyName' AND rd.dateUnregistered NOT LIKE '' AND rd.type='$type' ORDER BY rd.dateUnregistered");
}
else if($type=="OPD"){
$asql=mysql_query("SELECT rd.patientNo, rd.registrationNo, rd.Company, rd.dateRegistered, rd.dateUnregistered, rd.type, pr.lastName, pr.firstName, pr.middleName FROM registrationDetails rd, patientRecord pr WHERE rd.patientNo=pr.patientNo AND rd.company='$companyName' AND rd.type='$type' ORDER BY rd.dateRegistered");
}
while($afetch=mysql_fetch_array($asql)){
$registrationNo=$afetch['registrationNo'];

//$bsql=mysql_query("SELECT registrationNo FROM companyPayment WHERE registrationNO='$registrationNo' AND paymentFor='HOSPITAL BILL' AND status LIKE ''");
//$bcount=mysql_num_rows($bsql);


//if($bcount>0){
$num++;
$patientNo=$afetch['patientNo'];
$Company=$afetch['Company'];
$dateRegistered=$afetch['dateRegistered'];
$dateUnregistered=$afetch['dateUnregistered'];
$lastName=$afetch['lastName'];
$firstName=$afetch['firstName'];
$middleName=$afetch['middleName'];

$patient=$lastName.", ".$firstName." ".$middleName;
$patientfmt=strtoupper($patient);
$dateUnregisteredstr=strtotime($dateUnregistered);
$dateUnregisteredfmt=date("M. d, Y",$dateUnregisteredstr);

$now=time();
if($type=="IPD"){
$your_date=strtotime($dateUnregistered);
}
else if($type=="OPD"){
$your_date=strtotime($dateRegistered);
}
$datediff=$now-$your_date;
$daysaged=floor($datediff/(60*60*24));

$csql=mysql_query("SELECT SUM(company) AS totcomd,registrationNo FROM patientCharges WHERE registrationNo='$registrationNo' AND status NOT LIKE 'DELETED_%%%%' AND title NOT LIKE 'PROFESSIONAL FEE'");
while($cfetch=mysql_fetch_array($csql)){$totcomd=$cfetch['totcomd']; $registrationNo1 = $cfetch['registrationNo']; }

$cp=0;
$cpsql=mysql_query("SELECT SUM(company) AS totcom,registrationNo FROM patientCharges WHERE registrationNo='$registrationNo' AND company NOT LIKE '0' AND status='PAID' AND title='MISCELLANEOUS'");
while($cpfetch=mysql_fetch_array($cpsql)){$totcomp=$cpfetch['totcom'];}

$capsql=mysql_query("SELECT SUM(company) AS totalundis,registrationNo FROM patientCharges WHERE registrationNo='$registrationNo' AND (title='MEDICINE' OR title='SUPPLIES') AND status NOT LIKE 'DELETED_%%%%' AND departmentStatus=''");
while($capfetch=mysql_fetch_array($capsql)){$totalundis=$capfetch['totalundis'];}


$totcom=($totcomd-$totcomp-$totalundis);

$totcomfmt=number_format($totcom,2,'.',',');

$dsql=mysql_query("SELECT SUM(company) AS totpf FROM patientCharges WHERE registrationNo='$registrationNo' AND status NOT LIKE 'DELETED%%' AND title='PROFESSIONAL FEE'");
while($dfetch=mysql_fetch_array($dsql)){$totpf=$dfetch['totpf'];}

$totpffmt=number_format($totpf,2,'.',',');

$esql=mysql_query("SELECT SUM(cashUnpaid) AS totcu FROM patientCharges WHERE registrationNo='$registrationNo' AND status NOT LIKE 'DELETED%%'");
while($efetch=mysql_fetch_array($esql)){$totcu=$efetch['totcu'];}

$totcufmt=number_format($totcu,2,'.',',');


$fsql=mysql_query("SELECT SUM(amountPaid+pf+admitting) AS totap FROM patientPayment WHERE registrationNo='$registrationNo'");
while($ffetch=mysql_fetch_array($fsql)){$totap=$ffetch['totap'];}
$hsql=mysql_query("SELECT discount, companyDiscount FROM registrationDetails WHERE registrationNo='$registrationNo'");
while($hfetch=mysql_fetch_array($hsql)){$patdiscount=$hfetch['discount'];$patcompanyDiscount=$hfetch['companyDiscount'];}
if($patdiscount==''){$truepatdiscount=0;}else{$truepatdiscount=$patdiscount;}
if($patcompanyDiscount==''){$truepatcompanyDiscount=0;}else{$truepatcompanyDiscount=$patcompanyDiscount;}

$truebalance=$totcu-$totap-$truepatcompanyDiscount-$truepatdiscount;
$truebalancefmt=number_format($truebalance,2,'.',',');


$gsql=mysql_query("SELECT SUM(amountPaid) AS totcpap, SUM(tax) AS totcptax, SUM(discount) AS totcpdisc FROM companyPayment WHERE registrationNo='$registrationNo' AND status NOT LIKE 'DELETED%%' AND paymentFor='HOSPITAL BILL'");
while($gfetch=mysql_fetch_array($gsql)){$totcpap=$gfetch['totcpap'];$totcptax=$gfetch['totcptax'];$totcpdisc=$gfetch['totcpdisc']; }

if($totcptax==''){$totcptaxrel=0;}else{$totcptaxrel=$totcptax;}

if($totcpdisc==''){$totcpdiscrel=0;}else{$totcpdiscrel=$totcpdisc;}

$isql=mysql_query("SELECT SUM(amountPaid) AS totcppf, SUM(tax) AS totcppftax, SUM(discount) AS totcppfdisc FROM companyPayment WHERE registrationNo='$registrationNo' AND status NOT LIKE 'DELETED%%' AND paymentFor='PROFESSIONAL FEE'");
while($ifetch=mysql_fetch_array($isql)){$totcppf=$ifetch['totcppf'];$totcppftax=$ifetch['totcppftax'];$totcppfdisc=$gfetch['totcppfdisc']; }

if($totcppftax==''){$totcppftaxrel=0;}else{$totcppftaxrel=$totcppftax;}

if($totcppfdisc==''){$totcppfdiscrel=0;}else{$totcppfdiscrel=$totcppfdisc;}

$totcomfmt2=number_format($totcom,2,'.','');

$qcombal=($totcom+$totpf)-(($totcpap+$totcptaxrel+$totcpdiscrel)+($totcppf+$totcppftaxrel+$totcppfdiscrel))-($truepatcompanyDiscount);


if($truebalance<0.09){$class1="style3";$class2="style4";}else{$class1="style7";$class2="style6";}

if(($totpf==0)&&($totcom==0)&&($totcu==0)){
}
else {
if(($qcombal==0)||($qcombal<0.09)){
}
else{
$totcomlesspay=($totcom-($totcpap+$totcptaxrel+$totcpdiscrel));
$totcomlesspayfmt=number_format($totcomlesspay,2);

if($daysaged<30){$a=$totcomlesspayfmt; $b=''; $c=''; $d=''; $e=''; $grandhba+=$totcomlesspay; $grandhbb+=0; $grandhbc+=0; $grandhbd+=0; $grandhbe+=0;}
else if(($daysaged>=30)&&($daysaged<60)){$a=''; $b=$totcomlesspayfmt; $c=''; $d=''; $e=''; $grandhba+=0; $grandhbb+=$totcomlesspay; $grandhbc+=0; $grandhbd+=0; $grandhbe+=0;}
else if(($daysaged>=60)&&($daysaged<90)){ $a=''; $b=''; $c=$totcomlesspayfmt; $d=''; $e=''; $grandhba+=0; $grandhbb+=0; $grandhbc+=$totcomlesspay; $grandhbd+=0; $grandhbe+=0; }
else if(($daysaged>=90)&&($daysaged<120)){$a=''; $b=''; $c=''; $d=$totcomlesspayfmt; $e=''; $grandhba+=0; $grandhbb+=0; $grandhbc+=0; $grandhbd+=$totcomlesspay; $grandhbe+=0;  }
else if($daysaged>=120){$a=''; $b=''; $c=''; $d=''; $e=$totcomlesspayfmt; $grandhba+=0; $grandhbb+=0; $grandhbc+=0; $grandhbd+=0; $grandhbe+=$totcomlesspay; }

$totpflesspay=$totpf-($totcppf+$totcppftaxrel+$totcppfdiscrel);

$grandpf+=$totpflesspay;

echo "
  <tr>
    <td class='$class1'><div align='left'>$registrationNo</div></td>
    <form name='Submit' method='get' action='../currentPatient/patientInterface1.php' target='_blank'>
    <input type='hidden' name='username' value='$username' />
    <input type='hidden' name='registrationNo' value='$registrationNo' />
    <td><div align='left'><input type='submit' name='Submit' class='button03' value='$patientfmt' /></div></td>
    </form>
    <td class='$class1'><div align='right'>$a</div></td>
    <td class='$class1'><div align='right'>$b</div></td>
    <td class='$class1'><div align='right'>$c</div></td>
    <td class='$class1'><div align='right'>$d</div></td>
    <td class='$class1'><div align='right'>$e</div></td>
    <td class='$class1'><div align='right'>".number_format($totpflesspay,2)."</div></td>
  </tr>
";

if($truebalance<0.09){$bal="";}else{$bal="| Cash Balance: ".$truebalancefmt;}

if($dateUnregistered==""){$dateCovered=$dateRegistered." to ".$dateRegistered;}else{$dateCovered=$dateRegistered." to ".$dateUnregistered;}

$qcombalfmt=number_format($qcombal,2,'.',',');

echo "
  <tr>
    <td>&nbsp;</td>
    <td colspan='7'><span class='$class2'>$dateCovered | $daysaged Day/s $bal | Company Balance: ".number_format($qcombal,2,'.',',')."</span></td>
  </tr>
  <tr>
    <td height='6' colspan='8'></td>
  </tr>
";
}
}

}

echo "
  <tr>
    <td height='2' colspan='8' bgcolor='#000000'></td>
  </tr>
";

$grandhbafmt=number_format($grandhba,2,'.',',');
$grandhbbfmt=number_format($grandhbb,2,'.',',');
$grandhbcfmt=number_format($grandhbc,2,'.',',');
$grandhbdfmt=number_format($grandhbd,2,'.',',');
$grandhbefmt=number_format($grandhbe,2,'.',',');

$grandpffmt=number_format($grandpf,2,'.',',');

echo "
  <tr>
    <td colspan='2' height='30'><div align='right' class='style2'> 
      <div align='left'>GRAND TOTAL ----------------&gt; </div>
    </div></td>
    <td class='style2'><div align='right'>$grandhbafmt</div></td>
    <td class='style3'><div align='right'>$grandhbbfmt</div></td>
    <td class='style3'><div align='right'>$grandhbcfmt</div></td>
    <td class='style3'><div align='right'>$grandhbdfmt</div></td>
    <td class='style3'><div align='right'>$grandhbefmt</div></td>
    <td class='style3'><div align='right'>$grandpffmt</div></td>
  </tr>
  <tr>
    <td height='2' colspan='8' bgcolor='#000000'></td>
  </tr>
";

$overall=$grandhba+$grandhbb+$grandhbc+$grandhbd+$grandhbe+$grandpf;
$overallfmt=number_format($overall,2,'.',',');

echo "
  <tr>
    <td colspan='2' height='35'><div align='right' class='style2'>
      <div align='left'>OVERALL TOTAL ------------&gt; </div>
    </div></td>
    <td><div align='right' class='style2'>$overallfmt</div></td>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height='2' colspan='2' bgcolor='#000000'></td>
    <td height='2' bgcolor='#000000'></td>
    <td height='2' colspan='5'></td>
  </tr>
";


echo "
</table>
</div>
";
}

?>
</body>
</html>
