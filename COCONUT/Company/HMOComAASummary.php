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
.textfield01 {font-family: Arial;font-size: 14px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 1px solid #000000;}
.button01 {font-family: Arial;font-size: 16px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 1px solid #000000;}
.button02 {font-family: Arial;font-size: 12px;font-weight: bold;color: #FF0000;background-color: #FFFFFF;border: 1px solid #000000;}
.button03 {font-family: Arial;font-size: 14px;font-weight: bold;border: 0;padding: 0;display: inline;background: none;color: #000000;}
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
$type=$_GET['type'];
$fday=$_GET['fday'];
$fmonth=$_GET['fmonth'];
$fyear=$_GET['fyear'];
$tday=$_GET['tday'];
$tmonth=$_GET['tmonth'];
$tyear=$_GET['tyear'];

$fdate=$fyear."-".$fmonth."-".$fday;
$tdate=$tyear."-".$tmonth."-".$tday;

$cfdate=$fyear.$fmonth.$fday;
$ctdate=$tyear.$tmonth.$tday;

$fdatestr=strtotime($fdate);
$fdatefmt=date("M d, Y",$fdatestr);
$tdatestr=strtotime($tdate);
$tdatefmt=date("M d, Y",$tdatestr);

if($cfdate>$ctdate){
echo "<div align='center'><span class='style5'>INVALID DATE RANGE. TRY AGAIN!!!</span></div>";
echo "<META HTTP-EQUIV='Refresh'CONTENT='3;URL=HMOComAAByHMOComSelectHMOComWDR.php'>";
}
else {
echo "
<div align='center'><img src='Heading.jpg' width='60%' height='20%' /></div>
<div align='center'><span class='style1'>$fdatefmt - $tdatefmt</span>
<br />
<div align='center'><span class='style1'>$type</span>
<br />
<br />
<div align='center'>
<table width='98%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td height='20' colspan='7'><span align='left' class='style2'>Report Generated: ".date("M d, Y - h:i A")."</span></td>
  </tr>
  <tr>
    <td height='1' colspan='7' bgcolor='#000000'></td>
  </tr>
  <tr>
    <td width='34%' height='30' class='style2'><div align='left'>HMO/Company</div></td>
    <td width='11%' class='style2'><div align='right'>Current</div></td>
    <td width='11%' class='style2'><div align='right'>30 Days</div></td>
    <td width='11%' class='style2'><div align='right'>60 Days</div></td>
    <td width='11%' class='style2'><div align='right'>90 Days</div></td>
    <td width='11%' class='style2'><div align='right'>120 Days</div></td>
    <td width='11%' class='style2'><div align='right'>PF</div></td>
  </tr>
  <tr>
    <td height='1' colspan='7' bgcolor='#000000'></td>
  </tr>
";

$totgrandhba=0;
$totgrandhbb=0;
$totgrandhbc=0;
$totgrandhbd=0;
$totgrandhbe=0;
$totgrandpf=0;
$zsql=mysql_query("SELECT Company FROM registrationDetails WHERE Company NOT LIKE '' AND (dateRegistered BETWEEN '$fdate' AND '$tdate') GROUP BY Company ORDER BY Company");
while($zfetch=mysql_fetch_array($zsql)){
$companyName=$zfetch['Company'];

if($type=="IPD"){
$asql=mysql_query("SELECT rd.patientNo, rd.registrationNo, rd.Company, rd.dateRegistered, rd.dateUnregistered, rd.type, pr.lastName, pr.firstName, pr.middleName FROM registrationDetails rd, patientRecord pr WHERE rd.patientNo=pr.patientNo AND rd.company='$companyName' AND (rd.dateUnregistered BETWEEN '$fdate' AND '$tdate')  AND rd.dateUnregistered NOT LIKE '' AND rd.type='$type' ORDER BY rd.dateUnregistered");
}
else if($type=="OPD"){
$asql=mysql_query("SELECT rd.patientNo, rd.registrationNo, rd.Company, rd.dateRegistered, rd.dateUnregistered, rd.type, pr.lastName, pr.firstName, pr.middleName FROM registrationDetails rd, patientRecord pr WHERE rd.patientNo=pr.patientNo AND rd.company='$companyName' AND (rd.dateRegistered BETWEEN '$fdate' AND '$tdate') AND rd.type='$type' ORDER BY rd.dateRegistered");
}

//Start Calculations Per Patient
$num=0;
$grandhba=0;
$grandhbb=0;
$grandhbc=0;
$grandhbd=0;
$grandhbe=0;
$grandpf=0;
$finaltotpf=0;
while($afetch=mysql_fetch_array($asql)){
$registrationNo=$afetch['registrationNo'];

$num++;
$dateRegistered=$afetch['dateRegistered'];
$dateUnregistered=$afetch['dateUnregistered'];

$now=time();
if($type=="IPD"){$your_date=strtotime($dateUnregistered);}
else if($type=="OPD"){$your_date=strtotime($dateRegistered);}

$datediff=$now-$your_date;
$daysaged=floor($datediff/(60*60*24));

$csql=mysql_query("SELECT SUM(company) AS totcomd,registrationNo FROM patientCharges WHERE registrationNo='$registrationNo' AND status NOT LIKE 'DELETED_%%%%' AND orNo='' AND title NOT LIKE 'PROFESSIONAL FEE'");
while($cfetch=mysql_fetch_array($csql)){$totcomd=$cfetch['totcomd']; $registrationNo1=$cfetch['registrationNo']; }

$cp=0;
$cpsql=mysql_query("SELECT SUM(company) AS totcom,registrationNo FROM patientCharges WHERE registrationNo='$registrationNo' AND company NOT LIKE '0' AND status='PAID' AND title='MISCELLANEOUS'");
while($cpfetch=mysql_fetch_array($cpsql)){$totcomp=$cpfetch['totcom'];}

$capsql=mysql_query("SELECT SUM(company) AS totalundis, registrationNo FROM patientCharges WHERE registrationNo='$registrationNo' AND (title='MEDICINE' OR title='SUPPLIES') AND status NOT LIKE 'DELETED_%%%%' AND departmentStatus=''");
while($capfetch=mysql_fetch_array($capsql)){$totalundis=$capfetch['totalundis'];}

$totcom=($totcomd-$totcomp-$totalundis);

$totcomfmt=number_format($totcom,2,'.',','); 

$dsql=mysql_query("SELECT SUM(company) AS totpf FROM patientCharges WHERE registrationNo='$registrationNo' AND status NOT LIKE 'DELETED%%' AND title='PROFESSIONAL FEE' AND orNo=''");
while($dfetch=mysql_fetch_array($dsql)){$totpf=$dfetch['totpf'];}

$totpffmt=number_format($totpf,2,'.',',');

$esql=mysql_query("SELECT SUM(cashUnpaid) AS totcu FROM patientCharges WHERE registrationNo='$registrationNo' AND status NOT LIKE 'DELETED%%'");
while($efetch=mysql_fetch_array($esql)){$totcu=$efetch['totcu'];}

$totcufmt=number_format($totcu,2,'.',',');

$fsql=mysql_query("SELECT SUM(amountPaid+pf) AS totap FROM patientPayment WHERE registrationNo='$registrationNo'");
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

if(($totpf==0)&&($totcom==0)&&($totcu==0)){
}
else {
if($qcombal<0.09){
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

}
}

}//End Calculations Per Patient

if(($grandhba>0)||($grandhbb>0)||($grandhbc>0)||($grandhbd>0)||($grandhbe>0)||($grandpf>0)){
echo "
  <tr>
    <form name='Submit' method='get' action='HMOComAAByHMOComWDR.php' target='_blank'>
    <input type='hidden' name='username' value='$username' />
    <input type='hidden' name='companyName' value='$companyName' />
    <input type='hidden' name='type' value='$type' />
    <input type='hidden' name='username' value='$username' />
    <input type='hidden' name='fday' value='$fday' />
    <input type='hidden' name='fmonth' value='$fmonth' />
    <input type='hidden' name='fyear' value='$fyear' />
    <input type='hidden' name='tday' value='$tday' />
    <input type='hidden' name='tmonth' value='$tmonth' />
    <input type='hidden' name='tyear' value='$tyear' />
    <td><div align='left'><input type='submit' name='Submit' class='button03' value='$companyName' /></div></td>
    </form>
    <td class='style3'><div align='right'>".number_format($grandhba,2)."</div></td>
    <td class='style3'><div align='right'>".number_format($grandhbb,2)."</div></td>
    <td class='style3'><div align='right'>".number_format($grandhbc,2)."</div></td>
    <td class='style3'><div align='right'>".number_format($grandhbd,2)."</div></td>
    <td class='style3'><div align='right'>".number_format($grandhbe,2)."</div></td>
    <td class='style3'><div align='right'>".number_format($grandpf)."</div></td>
  </tr>
  <tr>
    <td class='style3' height='30'>SUB TOTAL ===========&gt; </td>
    <td class='style3'><div align='right'>".number_format(($grandhba+$grandhbb+$grandhbc+$grandhbd+$grandhbe+$grandpf),2)."</div></td>
    <td class='style3'><div align='right'></div></td>
    <td class='style3'><div align='right'></div></td>
    <td class='style3'><div align='right'></div></td>
    <td class='style3'><div align='right'></div></td>
    <td class='style3'><div align='right'></div></td>
  </tr>
  <tr>
    <td height='1' colspan='7' bgcolor='#000000'></td>
  </tr>
";

$totgrandhba+=$grandhba;
$totgrandhbb+=$grandhbb;
$totgrandhbc+=$grandhbc;
$totgrandhbd+=$grandhbd;
$totgrandhbe+=$grandhbe;
$totgrandpf+=$grandpf;
}

}

echo "
  <tr>
    <td height='35' class='style2'><div align='left'>GRAND TOTAL ===========&gt; </div></td>
    <td class='style3'><div align='right'>".number_format($totgrandhba,2)."</div></td>
    <td class='style3'><div align='right'>".number_format($totgrandhbb,2)."</div></td>
    <td class='style3'><div align='right'>".number_format($totgrandhbc,2)."</div></td>
    <td class='style3'><div align='right'>".number_format($totgrandhbd,2)."</div></td>
    <td class='style3'><div align='right'>".number_format($totgrandhbe,2)."</div></td>
    <td class='style3'><div align='right'>".number_format($totgrandpf,2)."</div></td>
  </tr>
  <tr>
    <td height='1' colspan='7' bgcolor='#000000'></td>
  </tr>
";



echo "
  <tr>
    <td height='35' class='style2'><div align='left'>OVERALL TOTAL ===========&gt; </div></td>
    <td class='style3'><div align='right'>".number_format(($totgrandhba+$totgrandhbb+$totgrandhbc+$totgrandhbd+$totgrandhbe+$totgrandpf),2)."</div></td>
    <td class='style3'><div align='right'></div></td>
    <td class='style3'><div align='right'></div></td>
    <td class='style3'><div align='right'></div></td>
    <td class='style3'><div align='right'></div></td>
    <td class='style3'><div align='right'></div></td>
  </tr>
  <tr>
    <td height='2' bgcolor='#000000'></td>
    <td height='2' bgcolor='#000000'></td>
    <td height='2'></td>
    <td height='2'></td>
    <td height='2'></td>
    <td height='2'></td>
    <td height='2'></td>
  </tr>
</table>
</div>
";
}
?>
</body>
</html>
