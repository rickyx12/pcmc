<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>STATEMENT OF ACCOUNTS</title>
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

function printF(printData){
	var a = window.open ('',  '',"status=1,scrollbars=1, width=auto,height=auto");
	a.document.write(document.getElementById(printData).innerHTML.replace(/<a\/?[^>]+>/gi, ''));
	a.document.close();
	a.focus();
	a.print();
	a.close();
}
//-->
</script>
</head>

<body onload="placeFocus()">
<?php
include("../myDatabase2.php");
$cuz = new database();

mysql_connect($cuz->myHost(),$cuz->getUser(),$cuz->getPass());
mysql_select_db($cuz->getDB());

$username=$_GET['username'];
$patientNo=$_GET['patientNo'];
$registrationNo=$_GET['registrationNo'];

echo "
<a href='#' onClick=printF('printData') style=text-decoration:none; color:black;>PRINT</a>
<div align='center' id='printData'>
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
.CourierNew12Black {font-family: 'Courier New';font-size: 12px;color: #000000;}
.CourierNew12BlackBold {font-family: 'Courier New';font-size: 12px;color: #000000;font-weight: bold;}
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
tr:hover { background-color:#66FF00;}
-->
</style>

<table border='0' width='100%' cellpadding='0' cellspacing='0'>
  <tr>
    <td height='800' valign='top' bgcolor='#FFFFFF'>
      <table border='0' width='100%' cellspacing='0' cellpadding='0'>
        <tr>
          <td bgcolor='#FFFFFF'><div align='center'><img src='../COCONUT/myImages/mendero.png' height='100' width='auto' /></div></td>
        </tr>
        <tr>
          <td height='10'></td>
        </tr>
";

$rsql=mysql_query("SELECT itemNo FROM patientCharges WHERE status='Return' AND registrationNo='$registrationNo'");
$rcount=mysql_num_rows($rsql);

if($rcount>0){
echo "
        <tr>
          <td><div align='center' class='CourierNew14Red'>PATIENT HAS PENDING RETURNS!!!</div></td>
        </tr>
";
}

$ssql=mysql_query("SELECT itemNo FROM patientCharges WHERE status='UNPAID' AND departmentStatus='' AND registrationNo='$registrationNo' AND (title='MEDICINE' OR title='SUPPLIES')");
$scount=mysql_num_rows($ssql);

if($scount>0){
echo "
        <tr>
          <td><div align='center' class='CourierNew14Red'>PATIENT HAS PENDING MEDICINES/SUPPLIES TO DISPENSE!!!</div></td>
        </tr>
";
}

echo "
        <tr>
          <td class='table2Bottom'><div align='center' class='CourierNew12BlackBold'>STATEMENT OF ACCOUNT</div></td>
        </tr>
";

$asql=mysql_query("SELECT lastName, firstName, middleName, Address FROM patientRecord WHERE patientNo='$patientNo'");
while($afetch=mysql_fetch_array($asql)){$lastName=$afetch['lastName'];$firstName=$afetch['firstName'];$middleName=$afetch['middleName'];$Address=$afetch['Address'];}

$bsql=mysql_query("SELECT Company, dateRegistered, dateUnregistered, timeRegistered, timeUnregistered, type, privateORhouse_case, remarks FROM registrationDetails WHERE registrationNo='$registrationNo'");
while($bfetch=mysql_fetch_array($bsql)){$Company=$bfetch['Company'];$dateRegistered=$bfetch['dateRegistered'];$dateUnregistered=$bfetch['dateUnregistered'];$timeRegistered=$bfetch['timeRegistered'];$timeUnregistered=$bfetch['timeUnregistered'];$type=$bfetch['type'];$privateORhouse_case=$bfetch['privateORhouse_case'];$remarks=$bfetch['remarks'];}

if($type=='IPD'){$reltype="In-Patient";}else if($type='OPD'){$reltype="Out-Patient";}else{$reltype=$type;}

if($dateUnregistered==''){$dateUnreg='';}else{$dateUnreg=date("M d, Y",strtotime($dateUnregistered));}

if($Company==''){$relcompany="No HMO/Company";}else{$relcompany=$Company;}

$csql=mysql_query("SELECT description FROM patientCharges WHERE registrationNo='$registrationNo' AND status NOT LIKE 'DELETED_%%%%' AND title='Room And Board' ORDER BY dateCharge,timeCharge");
$ccount=mysql_num_rows($csql);
if($ccount==0){$room="No Room";}
else{while($cfetch=mysql_fetch_array($csql)){$room=$cfetch['description'];}}

$dsql=mysql_query("SELECT description FROM patientCharges WHERE registrationNo='$registrationNo' AND status NOT LIKE 'DELETED_%%%%' AND service='ATTENDING' AND title='PROFESSIONAL FEE' ORDER BY dateCharge,timeCharge");
$dcount=mysql_num_rows($dsql);
if($dcount==0){
$esql=mysql_query("SELECT description FROM patientCharges WHERE registrationNo='$registrationNo' AND status NOT LIKE 'DELETED_%%%%' AND service='Consultation' AND title='PROFESSIONAL FEE' ORDER BY dateCharge,timeCharge");
$ecount=mysql_num_rows($esql);
if($ecount==0){
$doctor="No Doctor";
}
else{
while($dfetch=mysql_fetch_array($dsql)){$doctor=$dfetch['description'];}
}
}
else{
while($dfetch=mysql_fetch_array($dsql)){$doctor=$dfetch['description'];}
}

echo "
        <tr>
          <td bgcolor='#FFFFFF'><div align='center'><table border='0' width='100%' cellpadding='0' cellspacing='0'>
            <tr>
              <td><div align='left' class='CourierNew11Black'>Patient</div></td>
              <td><div align='center' class='CourierNew11Black'>:</div></td>
              <td colspan='4'><div align='left' class='CourierNew11BlackBold'>$patientNo-".strtoupper($lastName).", ".strtoupper($firstName)." ".strtoupper($middleName)."</div></td>
              <td><div align='right' class='CourierNew11Black'>Room</div></td>
              <td><div align='center' class='CourierNew11Black'>:</div></td>
              <td><div align='right' class='CourierNew11BlackBold'>$room</div></td>
            </tr>
            <tr>
              <td width='60'><div align='left' class='CourierNew11Black'>Physician</div></td>
              <td width='10'><div align='center' class='CourierNew11Black'>:</div></td>
              <td width='auto'><div align='left' class='CourierNew11BlackBold'>$doctor&nbsp;</div></td>
              <td width='85'><div align='left' class='CourierNew11Black'>Reg. No.</div></td>
              <td width='10'><div align='center' class='CourierNew11Black'>:</div></td>
              <td width='auto'><div align='left' class='CourierNew11BlackBold'>$registrationNo&nbsp;</div></td>
              <td width='88'><div align='right' class='CourierNew11Black'>Admitted</div></td>
              <td width='10'><div align='center' class='CourierNew11Black'>:</div></td>
              <td width='150'><div align='right' class='CourierNew11BlackBold'>".date("M d, Y",strtotime($dateRegistered))." ".$timeRegistered."</div></td>
            </tr>
            <tr>
              <td><div align='left' class='CourierNew11Black'>HMO/Comp</div></td>
              <td><div align='center' class='CourierNew11Black'>:</div></td>
              <td><div align='left' class='CourierNew11BlackBold'>$relcompany&nbsp;</div></td>
              <td><div align='left' class='CourierNew11Black'>Case Type</div></td>
              <td><div align='center' class='CourierNew11Black'>:</div></td>
              <td><div align='left' class='CourierNew11BlackBold'>$privateORhouse_case&nbsp;</div></td>
              <td><div align='right' class='CourierNew11Black'>Discharged</div></td>
              <td><div align='center' class='CourierNew11Black'>:</div></td>
              <td><div align='right' class='CourierNew11BlackBold'>".$dateUnreg." ".$timeUnregistered."</div></td>
            </tr>
            <tr>
              <td><div align='left' class='CourierNew11Black'>Credit L.</div></td>
              <td><div align='center' class='CourierNew11Black'>:</div></td>
              <td><div align='left' class='CourierNew11BlackBold'>&nbsp;</div></td>
              <td><div align='left' class='CourierNew11Black'>Patient Type</div></td>
              <td><div align='center' class='CourierNew11Black'>:</div></td>
              <td><div align='left' class='CourierNew11BlackBold'>$reltype&nbsp;</div></td>
              <td><div align='right' class='CourierNew11Black'>Date Printed</div></td>
              <td><div align='center' class='CourierNew11Black'>:</div></td>
              <td><div align='right' class='CourierNew11BlackBold'>".date("M d, Y H:i:s")."</div></td>
            </tr>
            <tr>
              <td><div align='left' class='CourierNew11Black'>Address</div></td>
              <td><div align='center' class='CourierNew11Black'>:</div></td>
              <td colspan='7'><div align='left' class='CourierNew11BlackBold'>".strtoupper($Address)."&nbsp;</div></td>
            </tr>
          </table></div></td>
        </tr>
        <tr>
          <td height='10' class='table2Top'></td>
        </tr>
        <tr>
          <td><div align='center' class='CourierNew14BlackBold'>SUMMARY</div></td>
        </tr>
        <tr>
          <td height='10'></td>
        </tr>
        <tr>
          <td bgcolor='#FFFFFF'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td width='auto' colspan='5'><div align='left' class='CourierNew14BlackBold'>DESCRIPTION</div></td>
            </tr>
";

$totactual=0;
$totdiscount=0;
$totcashUnpaid=0;
$totphic=0;
$totcomp=0;
$totdiscphic=0;
$totdisccashUnpaid=0;
$totdisccomp=0;
$fsql=mysql_query("SELECT title FROM patientCharges WHERE registrationNo='$registrationNo' AND status NOT LIKE 'DELETED_%%%%' AND title NOT LIKE 'PROFESSIONAL FEE' AND paidBy='' GROUP BY title ORDER BY title");
while($ffetch=mysql_fetch_array($fsql)){
$title=$ffetch['title'];

$sumactual=0;
$sumdiscount=0;
$sumcashUnpaid=0;
$sumphic=0;
$sumcomp=0;
$sumdiscphic=0;
$sumdisccashUnpaid=0;
$sumdisccomp=0;
if(($title=="MEDICINE")||($title=="SUPPLIES")){
$gsql=mysql_query("SELECT itemNo, description, sellingPrice, quantity, discount, cashUnpaid, phic, company FROM patientCharges WHERE registrationNo='$registrationNo' AND status NOT LIKE 'DELETED_%%%%' AND title='$title' AND departmentStatus LIKE 'dispensedBy_%%%%' AND paidBy='' ORDER BY dateCharge, timeCharge");
}
else{
$gsql=mysql_query("SELECT description, sellingPrice, quantity, discount, cashUnpaid, phic, company FROM patientCharges WHERE registrationNo='$registrationNo' AND status NOT LIKE 'DELETED_%%%%' AND title='$title' AND paidBy=''");
}

while($gfetch=mysql_fetch_array($gsql)){
$description=$gfetch['description'];
$sellingPrice=$gfetch['sellingPrice'];
$quantity=$gfetch['quantity'];
$discount=$gfetch['discount'];
$cashUnpaid=$gfetch['cashUnpaid'];
$phic=$gfetch['phic'];
$comp=$gfetch['company'];

$sumdiscount+=$discount;
$sumactual+=($sellingPrice*$quantity);

if($discount!=0){
if(($cashUnpaid!=0)&&($phic==0)&&($comp==0)){
$b="1-1";
$sumcashUnpaid+=($cashUnpaid+$discount);
$sumphic+=$phic;
$sumcomp+=$comp;

$sumdisccashUnpaid+=$discount;
$sumdiscphic+=0;
$sumdisccomp+=0;
}
else if(($cashUnpaid==0)&&($phic!=0)&&($comp==0)){
$b="1-2";
$sumcashUnpaid+=$cashUnpaid;
$sumphic+=($phic+$discount);
$sumcomp+=$comp;

$sumdisccashUnpaid+=0;
$sumdiscphic+=$discount;
$sumdisccomp+=0;
}
else if(($cashUnpaid==0)&&($phic==0)&&($comp!=0)){
$b="1-3";
$sumcashUnpaid+=$cashUnpaid;
$sumphic+=$phic;
$sumcomp+=($comp+$discount);

$sumdisccashUnpaid+=0;
$sumdiscphic+=0;
$sumdisccomp+=$discount;
}
else if(($cashUnpaid!=0)&&($phic!=0)&&($comp==0)){
$b="1-4";
$a=($sellingPrice*$quantity)-$discount;
$x=($discount*($cashUnpaid/$a))+$cashUnpaid;
$y=($discount*($phic/$a))+$phic;
$z=$comp;

$sumcashUnpaid+=$x;
$sumphic+=$y;
$sumcomp+=$z;

$sumdisccashUnpaid+=($discount*($cashUnpaid/$a));
$sumdiscphic+=($discount*($phic/$a));
$sumdisccomp+=0;
}
else if(($cashUnpaid!=0)&&($phic==0)&&($comp!=0)){
$b="1-5";
$a=($sellingPrice*$quantity)-$discount;
$x=($discount*($cashUnpaid/$a))+$cashUnpaid;
$y=$phic;
$z=($discount*($comp/$a))+$comp;

$sumcashUnpaid+=$x;
$sumphic+=$y;
$sumcomp+=$z;

$sumdisccashUnpaid+=($discount*($cashUnpaid/$a));
$sumdiscphic+=0;
$sumdisccomp+=($discount*($comp/$a));
}
else if(($cashUnpaid==0)&&($phic!=0)&&($comp!=0)){
$b="1-6";
$a=($sellingPrice*$quantity)-$discount;
$x=$cashUnpaid;
$y=($discount*($phic/$a))+$phic;
$z=($discount*($comp/$a))+$comp;

$sumcashUnpaid+=$x;
$sumphic+=$y;
$sumcomp+=$z;

$sumdisccashUnpaid+=0;
$sumdiscphic+=($discount*($phic/$a));
$sumdisccomp+=($discount*($comp/$a));
}
else if(($cashUnpaid!=0)&&($phic!=0)&&($comp!=0)){
$b="1-7";
$a=($sellingPrice*$quantity)-$discount;
$x=($discount*($cashUnpaid/$a))+$cashUnpaid;
$y=($discount*($phic/$a))+$phic;
$z=($discount*($comp/$a))+$comp;

$sumcashUnpaid+=$x;
$sumphic+=$y;
$sumcomp+=$z;

$sumdisccashUnpaid+=($discount*($cashUnpaid/$a));
$sumdiscphic+=($discount*($phic/$a));
$sumdisccomp+=($discount*($comp/$a));
}
}
else{
$b="2-1";

$x=$cashUnpaid;
$y=$phic;
$z=$comp;

$sumcashUnpaid+=$cashUnpaid;
$sumphic+=$phic;
$sumcomp+=$comp;

$sumdisccashUnpaid+=0;
$sumdiscphic+=0;
$sumdisccomp+=0;
}


}

echo "
            <tr>
              <td width='20'></td>
              <td width='auto'><div align='left' class='CourierNew13Black'>".strtoupper($title)."</div></td>
              <td width='120'><div align='right' class='CourierNew13Black'></div></td>
              <td width='120'><div align='right' class='CourierNew13Black'>".number_format($sumactual,2)."&nbsp;</div></td>
              <td width='120'><div align='right' class='CourierNew13Black'></div></td>
            </tr>
";

$totactual+=$sumactual;
$totdiscount+=$sumdiscount;
$totcashUnpaid+=$sumcashUnpaid;
$totphic+=$sumphic;
$totcomp+=$sumcomp;

$totdiscphic+=$sumdiscphic;
$totdisccashUnpaid+=$sumdisccashUnpaid;
$totdisccomp+=$sumdisccomp;
}

echo "
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td class='table2Top'></td>
              <td></td>
            </tr>
            <tr>
              <td height='5' colspan='5'></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><div align='right' class='CourierNew13BlackBold'>".number_format($totactual,2)."&nbsp;</div></td>
            </tr>
            <tr>
              <td height='5' colspan='5'></td>
            </tr>
            <tr>
              <td width='auto' colspan='5'><div align='left' class='CourierNew14BlackBold'>LESS</div></td>
            </tr>
";

$jsql=mysql_query("SELECT SUM(amountPaid) AS totAP, SUM(pf) AS totPPF FROM patientPayment WHERE registrationNo='$registrationNo' AND paymentFor='DEPOSIT'");
$jcount=mysql_num_rows($jsql);

if($jsql!=0){
while($jfetch=mysql_fetch_array($jsql)){$totAP=$jfetch['totAP'];$totPPF=$jfetch['totPPF'];}
}
else{
$totAP=0;
$totPPF=0;
}

if($totAP>0){
echo "
            <tr>
              <td width='20'></td>
              <td width='auto'><div align='left' class='CourierNew13Black'>DEPOSIT</div></td>
              <td width='120'><div align='right' class='CourierNew13Black'></div></td>
              <td width='120'><div align='right' class='CourierNew13Black'>(".number_format($totAP,2).")&nbsp;</div></td>
              <td width='120'><div align='right' class='CourierNew13Black'></div></td>
            </tr>
";
}


$ksql=mysql_query("SELECT SUM(amountPaid) AS totAAP, SUM(pf) AS totAPPF FROM patientPayment WHERE registrationNo='$registrationNo' AND paymentFor  NOT LIKE 'DEPOSIT' AND paymentFor NOT LIKE 'REFUND'");
$kcount=mysql_num_rows($ksql);

if($kcount!=0){
while($kfetch=mysql_fetch_array($ksql)){$totAAP=$kfetch['totAAP'];$totAPPF=$kfetch['totAPPF'];}
}
else{
$totAAP=0;
$totAPPF=0;
}

if($totAAP>0){
echo "
            <tr>
              <td width='20'></td>
              <td width='auto'><div align='left' class='CourierNew13Black'>PAYMENTS</div></td>
              <td width='120'><div align='right' class='CourierNew13Black'></div></td>
              <td width='120'><div align='right' class='CourierNew13Black'>(".number_format($totAAP,2).")&nbsp;</div></td>
              <td width='120'><div align='right' class='CourierNew13Black'></div></td>
            </tr>
";
}

if($totdiscount!=0){
echo "
            <tr>
              <td width='20'></td>
              <td width='auto'><div align='left' class='CourierNew13Black'>OTHER DISCOUNT/S</div></td>
              <td width='120'><div align='right' class='CourierNew13Black'></div></td>
              <td width='120'><div align='right' class='CourierNew13Black'>(".number_format($totdiscount,2).")&nbsp;</div></td>
              <td width='120'><div align='right' class='CourierNew13Black'></div></td>
            </tr>
";
}

$hsql=mysql_query("SELECT discount, companyDiscount, discountType FROM registrationDetails WHERE registrationNo='$registrationNo'");
while($hfetch=mysql_fetch_array($hsql)){$regdiscount=$hfetch['discount'];$regcompdiscount=$hfetch['companyDiscount'];$disctype=$hfetch['discountType'];}

if(!is_numeric($regcompdiscount)){$relregcompdiscount=0;}else{$relregcompdiscount=$regcompdiscount;}

if(is_numeric($regdiscount)){$relregdiscount=$regdiscount;}else{$relregdiscount=0;}

if(($relregcompdiscount==0)&&($relregdiscount==0)){
}
else{
if($disctype==""){$dtype="Other Discount";}else{$dtype=$disctype;}

echo "
            <tr>
              <td width='20'></td>
              <td width='auto'><div align='left' class='CourierNew13Black'>".strtoupper($dtype)."</div></td>
              <td width='120'><div align='right' class='CourierNew13Black'></div></td>
              <td width='120'><div align='right' class='CourierNew13Black'>(".number_format($relregdiscount,2).")&nbsp;</div></td>
              <td width='120'><div align='right' class='CourierNew13Black'></div></td>
            </tr>
";
}


echo "
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td class='table2Top'></td>
              <td></td>
            </tr>
            <tr>
              <td height='5' colspan='5'></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><div align='right' class='CourierNew13BlackBold'>(".number_format(($totAAP+$totAP+$relregdiscount+$totdiscount),2).")&nbsp;</div></td>
            </tr>
            <tr>
              <td height='5' colspan='5'></td>
            </tr>
";

if($totphic>0){
echo "
            <tr>
              <td width='20'></td>
              <td width='auto'><div align='left' class='CourierNew13Black'>PHIC</div></td>
              <td width='120'><div align='right' class='CourierNew13Black'></div></td>
              <td width='120'><div align='right' class='CourierNew13Black'></div></td>
              <td width='120'><div align='right' class='CourierNew13Black'>(".number_format($totphic,2).")&nbsp;</div></td>
            </tr>
";
}

if($totcomp>0){
echo "
            <tr>
              <td width='20'></td>
              <td width='auto'><div align='left' class='CourierNew13Black'>INSURANCE/COMPANY</div></td>
              <td width='120'><div align='right' class='CourierNew13Black'></div></td>
              <td width='120'><div align='right' class='CourierNew13Black'></div></td>
              <td width='120'><div align='right' class='CourierNew13Black'>(".number_format($totcomp,2).")&nbsp;</div></td>
            </tr>
";
}

/*
echo "
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td class='table1Top'></td>
            </tr>
            <tr>
              <td height='5' colspan='5'></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><div align='right' class='CourierNew13BlackBold'>(".number_format(($totcomp+$totphic),2).")&nbsp;</div></td>
            </tr>
";
*/

echo "
            <tr>
              <td height='10' colspan='5'></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td class='table2Top'></td>
            </tr>
            <tr>
              <td height='3' colspan='5'></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><div align='right' class='CourierNew14BlackBold'>".number_format(($totactual-($totAAP+$totAP+$relregdiscount+$totdiscount+$totcomp+$totphic)),2)."&nbsp;</div></td>
            </tr>
            <tr>
              <td height='3' colspan='5'></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td class='table2Top'></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height='15'></td>
        </tr>
        <tr>
          <td><div align='center' class='CourierNew14BlackBold'>PROFESSIONAL FEE/S</div></td>
        </tr>
        <tr>
          <td height='10'></td>
        </tr>
        <tr>
          <td bgcolor='#FFFFFF'><table width='100%' border='0' cellpadding='0' cellspacing='0'>
            <tr>
              <td width='auto' colspan='7'><div align='left' class='CourierNew14BlackBold'>PARTICULARS</div></td>
            </tr>
            <tr>
              <td width='20'></td>
              <td width='auto'><div align='left' class='CourierNew11BlackBold'>DOCTOR</div></td>
              <td width='90'><div align='right' class='CourierNew11BlackBold'>ACTUAL&nbsp;</div></td>
              <td width='90'><div align='right' class='CourierNew11BlackBold'>DISC&nbsp;</div></td>
              <td width='90'><div align='right' class='CourierNew11BlackBold'>PHIC&nbsp;</div></td>
              <td width='90'><div align='right' class='CourierNew11BlackBold'>INS/COM&nbsp;</div></td>
              <td width='120'><div align='right' class='CourierNew11BlackBold'>BALANCE&nbsp;</div></td>
            </tr>
";

$lsql=mysql_query("SELECT company FROM companyPayment WHERE registrationNo='$registrationNo' AND paymentFor='HOSPITAL BILL' AND status NOT LIKE 'DELETED%%%%%%%%' GROUP BY company ORDER BY company");
$lcount=mysql_num_rows($lsql);

//------------------------------------------------------------------------------------------------------------------------------------------------
if($lcount!=0){
while($lfetch=mysql_fetch_array($lsql)){
$msql=mysql_query("SELECT SUM(amountPaid) AS mamtpaid, SUM(tax) AS mtax, SUM(discount) AS mdiscount FROM companyPayment WHERE registrationNo='$registrationNo' AND company='".$lfetch['company']."' AND paymentFor='HOSPITAL BILL' AND status NOT LIKE 'DELETED%%%%%%%%'");
while($mfetch=mysql_fetch_array($msql)){$mamtpaid=$mfetch['mamtpaid'];$mtax=$mfetch['mtax'];$mdiscount=$mfetch['mdiscount'];}

echo "

";

}
}
else{
$mamtpaid=0;
$mtax=0;
$mdiscount=0;
}

$psql=mysql_query("SELECT SUM(amountPaid) AS pamtpaid, SUM(tax) AS ptax FROM phicPayment WHERE registrationNo='$registrationNo' AND paymentFor='HOSPITAL BILL' AND status NOT LIKE 'DELETED%%%%%%%%'");
$pcount=mysql_num_rows($psql);
if($pcount!=0){
while($pfetch=mysql_fetch_array($psql)){$pamtpaid=$pfetch['pamtpaid'];$ptax=$pfetch['ptax'];}
}
else{
$pamtpaid=0;
$ptax=0;
}
//------------------------------------------------------------------------------------------------------------------------------------------------


$totisp=0;
$toticashUnpaid=0;
$totiphic=0;
$toticompany=0;
$totidiscount=0;
$isql=mysql_query("SELECT description, sellingPrice, discount, cashUnpaid, phic, company FROM patientCharges WHERE registrationNo='$registrationNo' AND status NOT LIKE 'DELETED_%%%%' AND title='PROFESSIONAL FEE' ORDER BY service");
while($ifetch=mysql_fetch_array($isql)){
$doctor=$ifetch['description'];
$isellinPrice=$ifetch['sellingPrice'];
$idiscount=$ifetch['discount'];
$icashUnpaid=$ifetch['cashUnpaid'];
$iphic=$ifetch['phic'];
$icompany=$ifetch['company'];

$isp=preg_split('[/]',$isellinPrice);

echo "
            <tr>
              <td></td>
              <td><div align='left' class='CourierNew12Black'>".strtoupper($doctor)."&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>".number_format($isp[0],2)."&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>(".number_format($idiscount,2).")&nbsp;</div></td>
              <td><div align='right' class='CourierNew12Black'>(".number_format($iphic,2).")&nbsp;</div></td>
              <td><div align='right' class='CourierNew12Black'>(".number_format($icompany,2).")&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>".number_format($icashUnpaid,2)."&nbsp;</div></td>
            </tr>
";

$totidiscount+=$idiscount;
$totisp+=$isp[0];
$toticashUnpaid+=$icashUnpaid;
$totiphic+=$iphic;
$toticompany+=$icompany;
}

echo "
            <tr>
              <td></td>
              <td></td>
              <td class='table2Top'></td>
              <td class='table2Top'></td>
              <td class='table2Top'></td>
              <td class='table2Top'></td>
              <td class='table2Top'></td>
            </tr>
            <tr>
              <td height='5' colspan='7'></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td><div align='right' class='CourierNew13Black'>".number_format($totisp,2)."&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>(".number_format($totidiscount,2).")&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>(".number_format($totiphic,2).")&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>(".number_format($toticompany,2).")&nbsp;</div></td>
              <td><div align='right' class='CourierNew13BlackBold'>".number_format($toticashUnpaid,2)."&nbsp;</div></td>
            </tr>
            <tr>
              <td height='5' colspan='7'></td>
            </tr>
            <tr>
              <td width='auto' colspan='7'><div align='left' class='CourierNew14BlackBold'>LESS</div></td>
            </tr>
";

if($totAPPF>0){
echo "
            <tr>
              <td></td>
              <td><div align='left' class='CourierNew13Black'>PF PAYMENTS</div></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><div align='right' class='CourierNew13Black'>(".number_format($totAPPF,2).")&nbsp;</div></div></td>
            </tr>
";
}

echo "
            <tr>
              <td height='5' colspan='7'></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td class='table2Top'></td>
            </tr>
            <tr>
              <td height='3' colspan='7'></td>
            </tr>
            <tr>
              <td></td>
              <td colspan='5'><di align='right' class=''></div></td>
              <td><div align='right' class='CourierNew14BlackBold'>".number_format(($toticashUnpaid-$totAPPF),2)."&nbsp;</div></td>
            </tr>
            <tr>
              <td height='3' colspan='7'></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td class='table2Top'></td>
            </tr>
            <tr>
              <td height='10' colspan='7'></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td class='table2Top'></td>
            </tr>
            <tr>
              <td height='5' colspan='7'></td>
            </tr>
            <tr>
              <td></td>
              <td colspan='5'><div align='right' class='CourierNew15BlackBold'>PLEASE PAY THIS AMOUNT =============>&nbsp;</div></td>
              <td><div align='right' class='CourierNew15BlackBold'>(".number_format((($toticashUnpaid-$totAPPF)+($totactual-($totAAP+$totAP+$relregdiscount+$totdiscount+$totcomp+$totphic))),2).")&nbsp;</div></td>
            </tr>
            <tr>
              <td height='5' colspan='7'></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td class='table2Top'></td>
            </tr>
";

//------------------------------------------------------------------------------------------------------------------------------------------------
$nsql=mysql_query("SELECT company FROM companyPayment WHERE registrationNo='$registrationNo' AND paymentFor='PROFESSIONAL FEE' AND status NOT LIKE 'DELETED%%%%%%%%' GROUP BY company ORDER BY company");
$ncount=mysql_num_rows($nsql);

if($ncount!=0){
while($nfetch=mysql_fetch_array($nsql)){
$osql=mysql_query("SELECT SUM(amountPaid) AS oamtpaid, SUM(tax) AS otax, SUM(discount) AS odiscount FROM companyPayment WHERE registrationNo='$registrationNo' AND company='".$nfetch['company']."' AND paymentFor='PROFESSIONAL FEE' AND status NOT LIKE 'DELETED%%%%%%%%'");
while($ofetch=mysql_fetch_array($osql)){$oamtpaid=$ofetch['oamtpaid'];$otax=$ofetch['otax'];$odiscount=$ofetch['odiscount'];}

echo "

";

}
}
else{
$oamtpaid=0;
$otax=0;
$odiscount=0;
}

$qsql=mysql_query("SELECT SUM(amountPaid) AS qamtpaid, SUM(tax) AS qtax FROM phicPayment WHERE registrationNo='$registrationNo' AND paymentFor='PROFESSIONAL FEE' AND status NOT LIKE 'DELETED%%%%%%%%'");
$qcount=mysql_num_rows($qsql);
if($qcount!=0){
while($qfetch=mysql_fetch_array($qsql)){$qamtpaid=$qfetch['qamtpaid'];$qtax=$qfetch['qtax'];}
}
else{
$pamtpaid=0;
$ptax=0;
}
//------------------------------------------------------------------------------------------------------------------------------------------------

echo "
          </table></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td height='100' valign='bottom' bgcolor='#FFFFFF'>
      <table width='100%' border='0' cellpadding='0' cellspacing='0'>
        <tr>
          <td><div align='left'><table border='0' cellpadding='0' cellspacing='0'>
            <tr>
              <td height='10'></td>
            </tr>
            <tr>
              <td width='200' class='table1Bottom'></td>
            </tr>
            <tr>
              <td height='20'><div align='left' class='CourierNew12BlackBold'>SIGNATURE OVER PRINTED NAME</div></td>
            </tr>
            <tr>
              <td height='5'></td>
            </tr>
          </table></div></td>
        </tr>
        <tr>
          <td><div align='left'><table border='0' cellpadding='0' cellspacing='0'>
            <tr>
              <td width='auto'><div align='left' class='CourierNew12BlackBold'>INFORMANT & RELATIONSHIP:&nbsp;</div></td>
              <td width='200' class='table1Bottom'></td>
            </tr>
            <tr>
              <td colspan='2' height='30'></td>
            </tr>
          </table></div></td>
        </tr>
        <tr>
          <td><table width='100%' border='0' cellpadding='0' cellspacing='0'>
            <tr>
              <td width='50%'><div align='left'><table border='0' cellpadding='0' cellspacing='0'>
                <tr>
                  <td width='200' class='table1Bottom'><div align='left' class='CourierNew14Black'>".strtoupper($cuz->selectNow("registeredUser","completeName","username",$username))."</div></td>
                </tr>
                <tr>
                  <td><div align='left' class='CourierNew12BlackBold'>BILLING SECTION</div></td>
                </tr>
              </table></div></td>
              <td width='50%'><div align='right'><table border='0' cellpadding='0' cellspacing='0'>
                <tr>
                  <td width='200' class='table1Bottom'>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align='right' class='CourierNew12BlackBold'>CASHIER</div></td>
                </tr>
              </table></div></td>
            </tr>
          </table></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</div>
<br /><br />
<table width='100%' border='0' cellpadding='0' cellspacing='0'>
  <tr>
    <td><div align='left' class='CourierNew12BlackBold'>REMARKS:</div></td>
  </tr>
  <tr>
    <td><div align='left' class='CourierNew13Black'>&nbsp;&nbsp;$remarks</div></td>
  </tr>
</table>
<br />
<br />
";
?>
</body>
</html>
