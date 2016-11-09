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
include("../../myDatabase2.php");
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
          <td bgcolor='#FFFFFF'><div align='center'><img src='../../COCONUT/myImages/mendero.png' height='100' width='auto' /></div></td>
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
          <td bgcolor='#FFFFFF'><table border='0' width='100%' cellpadding='0' cellspacing='0'>
            <tr>
              <td width='110' class='table2Top2Bottom'><div align='center' class='CourierNew12BlackBold'>&nbsp;DATE&nbsp;</div></td>
              <td width='auto' class='table2Top2Bottom'><div align='center' class='CourierNew12BlackBold'>&nbsp;TITLE&nbsp;</div></td>
              <td width='auto' class='table2Top2Bottom'><div align='center' class='CourierNew12BlackBold'>&nbsp;PARTICULARS&nbsp;</div></td>
              <td width='30' class='table2Top2Bottom'><div align='center' class='CourierNew12BlackBold'>&nbsp;QTY&nbsp;</div></td>
              <td width='100' class='table2Top2Bottom'><div align='center' class='CourierNew12BlackBold'>&nbsp;CHARGES&nbsp;</div></td>
              <td width='100' class='table2Top2Bottom'><div align='center' class='CourierNew12BlackBold'>&nbsp;CREDIT&nbsp;</div></td>
              <td width='100' class='table2Top2Bottom'><div align='center' class='CourierNew12BlackBold'>&nbsp;BALANCE&nbsp;</div></td>
            </tr>
";

$bal=0;

echo "
            <tr>
              <td colspan='6'><div align='right' class='CourierNew13BlackBold'>&nbsp;TOTAL CHARGES &#8658;</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;".number_format($bal,2)."</div></td>
            </tr>
";

$pcsql=mysql_query("SELECT itemNo, status, description, sellingPrice, quantity, discount, total, cashUnpaid, phic, company, dateCharge, title, cashPaid FROM patientCharges WHERE registrationNo='$registrationNo' ORDER BY dateCharge,timeCharge");


while($pcfetch=mysql_fetch_array($pcsql)){
if($pcfetch['title']=="PROFESSIONAL FEE"){
$pfsp=preg_split('[/]',$pcfetch['sellingPrice']);
$sq=$pfsp[0]*$pcfetch['quantity'];
}
else{
$sq=$pcfetch['sellingPrice']*$pcfetch['quantity'];
}


if(($pcfetch['status']=="PAID")||($pcfetch['status']=="UNPAID")||($pcfetch['status']=="Return")||($pcfetch['status']=="Discharged")){

$baltotal=$bal+$sq;

$baldisc=$baltotal-$pcfetch['discount'];

$balphic=$baldisc-$pcfetch['phic'];

$balcomp=$balphic-$pcfetch['company'];

$balcp=$balcomp-$pcfetch['cashPaid'];

$bal+=($sq-($pcfetch['discount']+$pcfetch['phic']+$pcfetch['company']));
echo "
            <tr>
              <td><div align='center' class='CourierNew13Black'>".date("M d, Y",strtotime($pcfetch['dateCharge']))."</div></td>
              <td><div align='left' class='CourierNew13Black'>&nbsp;".strtoupper($pcfetch['title'])."&nbsp;</div></td>
              <td><div align='left' class='CourierNew13Black'>&nbsp;".strtoupper($pcfetch['description'])."&nbsp;</div></td>
              <td><div align='center' class='CourierNew13Black'>&nbsp;".$pcfetch['quantity']."&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;".number_format($sq,2)."</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;".number_format($baltotal,2)."</div></td>
            </tr>
";

$disc=$pcfetch['discount']*1;

if($disc!=0){
echo "
            <tr>
              <td><div align='center' class='CourierNew13Black'>".date("M d, Y",strtotime($pcfetch['dateCharge']))."</div></td>
              <td><div align='left' class='CourierNew13Black'>&nbsp;".strtoupper($pcfetch['title'])."&nbsp;</div></td>
              <td><div align='left' class='CourierNew13Black'>&nbsp;".strtoupper($pcfetch['description'])."(DISCOUNT)&nbsp;</div></td>
              <td><div align='center' class='CourierNew13Black'>&nbsp;".$pcfetch['quantity']."&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;(".number_format($disc,2).")</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;".number_format($baldisc,2)."</div></td>
            </tr>
";
}

$phic=$pcfetch['phic']*1;

if($phic!=0){
echo "
            <tr>
              <td><div align='center' class='CourierNew13Black'>".date("M d, Y",strtotime($pcfetch['dateCharge']))."</div></td>
              <td><div align='left' class='CourierNew13Black'>&nbsp;".strtoupper($pcfetch['title'])."&nbsp;</div></td>
              <td><div align='left' class='CourierNew13Black'>&nbsp;".strtoupper($pcfetch['description'])."(C/O PHIC)&nbsp;</div></td>
              <td><div align='center' class='CourierNew13Black'>&nbsp;".$pcfetch['quantity']."&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;(".number_format($phic,2).")</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;".number_format($balphic,2)."</div></td>
            </tr>
";
}

$comp=$pcfetch['company']*1;

if($comp!=0){
echo "
            <tr>
              <td><div align='center' class='CourierNew13Black'>".date("M d, Y",strtotime($pcfetch['dateCharge']))."</div></td>
              <td><div align='left' class='CourierNew13Black'>&nbsp;".strtoupper($pcfetch['title'])."&nbsp;</div></td>
              <td><div align='left' class='CourierNew13Black'>&nbsp;".strtoupper($pcfetch['description'])."(C/O INS/COM)&nbsp;</div></td>
              <td><div align='center' class='CourierNew13Black'>&nbsp;".$pcfetch['quantity']."&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;(".number_format($comp,2).")</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;".number_format($balcomp,2)."</div></td>
            </tr>
";
}

$cp=$pcfetch['cashPaid']*1;

if($cp!=0){
echo "
            <tr>
              <td><div align='center' class='CourierNew13Black'>".date("M d, Y",strtotime($pcfetch['dateCharge']))."</div></td>
              <td><div align='left' class='CourierNew13Black'>&nbsp;".strtoupper($pcfetch['title'])."&nbsp;</div></td>
              <td><div align='left' class='CourierNew13Black'>&nbsp;".strtoupper($pcfetch['description'])."(PAID)&nbsp;</div></td>
              <td><div align='center' class='CourierNew13Black'>&nbsp;".$pcfetch['quantity']."&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;(".number_format($cp,2).")</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;".number_format($balcp,2)."</div></td>
            </tr>
";
}

}
else{
$bal+=(-$sq);
echo "
            <tr>
              <td><div align='center' class='CourierNew13Black'>".date("M d, Y",strtotime($pcfetch['dateCharge']))."</div></td>
              <td><div align='left' class='CourierNew13Black'>&nbsp;".strtoupper($pcfetch['title'])."&nbsp;</div></td>
              <td><div align='left' class='CourierNew13Black'>&nbsp;".strtoupper($pcfetch['description'])."&nbsp;</div></td>
              <td><div align='center' class='CourierNew13Black'>&nbsp;(".$pcfetch['quantity'].")&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;(".number_format($sq,2).")</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;".number_format($bal,2)."</div></td>
            </tr>
";
}

}


echo "
            <tr>
              <td colspan='7' height='6'></td>
            </tr>
";



echo "
            <tr>
              <td><div align='center' class='CourierNew13Black'>".date("M d, Y",strtotime($pcfetch['dateCharge']))."</div></td>
              <td><div align='left' class='CourierNew13Black'>&nbsp;".strtoupper($pcfetch['title'])."&nbsp;</div></td>
              <td><div align='left' class='CourierNew13Black'>&nbsp;".strtoupper($pcfetch['description'])."&nbsp;</div></td>
              <td><div align='center' class='CourierNew13Black'>&nbsp;(".$pcfetch['quantity'].")&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;(".number_format($sq,2).")</div></td>
              <td><div align='right' class='CourierNew13Black'>&nbsp;".number_format($bal,2)."</div></td>
            </tr>
";


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
