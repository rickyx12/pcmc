<?php
include("myDatabase1.php");

class database2 extends database1 {


public function listLaboratory_done($month,$day,$year) {

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

</style>";

$date = $month."_".$day."_".$year;


$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT referred,savedNo,registrationNo,itemNo,chargesCode,medtech,date,time FROM labSavedResult WHERE date = '$date' and (chargesCode != 129 and chargesCode != 127 and chargesCode != 125 and chargesCode != 126 and chargesCode != 296)  order by time desc ");
//echo "<table border=1 cellspacing=0 rules=all>";
//echo "<tr>";
//echo "<Th>Patient</th>";
//echo "<Th>Result</th>";
//echo "<th>Realesed</th>";
//echo "</tr>";
while($row = mysql_fetch_array($result))
  {
$this->getPatientProfile($row['registrationNo']);
echo "<tr>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Laboratory/testDone/referredUser.php?savedNo=$row[savedNo]'><font size=2>".$this->getPatientRecord_lastName().", ".$this->getPatientRecord_firstName()."</font></a></td>";

if($row['referred'] != "") {
echo "<td>&nbsp;<font size=2>".$this->selectNow("patientCharges","description","itemNo",$row['itemNo'])."</font><br>&nbsp;<Font size=1 color=red>(Referred)</font></td>";
}else {
echo "<td>&nbsp;<font size=2>".$this->selectNow("patientCharges","description","itemNo",$row['itemNo'])."</font></td>";
}

echo "<td>&nbsp;<font size=2>".$row['time']."</font></td>";
echo "<Td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Laboratory/resultList/resultForm_output.php?registrationNo=$row[registrationNo]&itemNo=$row[itemNo]' target='_blank'><font size=2 color=red>View</font></a>&nbsp;</td>";
echo "</tr>";

  }
//echo "</table>";

}





public function getPatientCharges_status($registrationNo,$username,$show,$desc,$status) {

$this->getPatientProfile($registrationNo);

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

.data {
font-size:12px;
}
</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

if($show == "All") {
$result = mysql_query("SELECT * FROM patientCharges where registrationNo = '$registrationNo' and status = '$status' order by dateCharge,timeCharge asc ");
}else {
$result = mysql_query("SELECT * FROM patientCharges where registrationNo = '$registrationNo' and status = '$status' and description like '$desc%%%%%%' order by description asc ");
}


while($row = mysql_fetch_array($result))
  {
//$this->getMyResults($this->getResult_labNo($row['itemNo']),$username);
//$price = preg_split ("/\//", $row['sellingPrice']); 
$deptStatus = preg_split ("/\_/", $row['departmentStatus']); 
echo "<tr>";

/*********STRPOS*************/
if (strpos($row['sellingPrice'],'/') !== false) {
$price = preg_split ("/\//", $row['sellingPrice']); 
}else { 
$price[0] = $row['sellingPrice'];
$price[1] = "0.00";
} 
/***************************/

$this->patientChargez_cashUnpaid+=$row['cashUnpaid'];
$this->patientChargez_company+=$row['company'];
$this->patientChargez_phic+=$row['phic'];
$this->patientChargez_disc+=$row['discount'];
$this->patientChargez_total+=$row['total'];
$this->patientChargez_paid+=$row['cashPaid'];

$myDesc = $this->getPatientRecord_lastName().", ".$this->getPatientRecord_firstName()." - ".$row['description'];


if( $row['status'] != "PAID" ) {

if( $this->selectNow("forDeletion","itemNo","itemNo",$row['itemNo']) > 0 ) {
echo "<Td>&nbsp;<img src='http://".$this->getMyUrl()."/COCONUT/myImages/locked1.jpeg' />&nbsp;</tD>";
}else if( $row['title'] == "Room And Board" ) {
echo "<Td>&nbsp;<img src='http://".$this->getMyUrl()."/COCONUT/myImages/locked1.jpeg' />&nbsp;</tD>";
}else if( $row['batchNo'] == "package" ) {
echo "<Td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/verifyDelete_pass_checkAllow.php?registrationNo=$registrationNo&itemNo=$row[itemNo]&description=$myDesc&quantity=$row[quantity]&username=$username&show=$show&desc=$desc'><font size=2 color=red>Px</font></a>&nbsp;</tD>";
}else if( $this->selectNow("registrationDetails","mgh","registrationNo",$row['registrationNo']) != "") {
echo "<Td>&nbsp;<font size=2 color=red>MGH</font>&nbsp;</tD>";
}else if( $row['status'] == "Return" ) {
echo "<Td>&nbsp;<img src='http://".$this->getMyUrl()."/COCONUT/myImages/locked1.jpeg' />&nbsp;</tD>";
}
else {
//$myDesc = $this->getPatientRecord_lastName().", ".$this->getPatientRecord_firstName()." - ".$row['description'];

echo "<td><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/verifyDelete_pass_checkAllow.php?registrationNo=$registrationNo&itemNo=$row[itemNo]&description=$myDesc&quantity=$row[quantity]&username=$username&show=$show&desc=$desc'>
<img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg' />
</a></td>";

}

}else {

echo "<Td>&nbsp;<img src='http://".$this->getMyUrl()."/COCONUT/myImages/locked1.jpeg' />&nbsp;</tD>";
}


if($deptStatus[0] == "dispensedBy") {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']." &nbsp;(<font size=1 color=red>Dispensed @ $row[departmentStatus_time] by $deptStatus[1] </font>)</a></font>&nbsp;</td>";
}else if($this->checkIfLabResultExist($row['itemNo']) > 0 && $row['title'] == "LABORATORY" ) {

if($this->checkIfLabResultExist($row['itemNo']) > 0) {

echo "<td>&nbsp;<font class='data'><a href='#'>".$row['description']."</a><br>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Laboratory/resultList/resultForm_output.php?registrationNo=$row[registrationNo]&itemNo=$row[itemNo]'>(<font color=red size=1>Test Done</font>)</font></a>&nbsp;</td>";


}else {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/Laboratory/resultList/resultList.php?registrationNo=$row[registrationNo]&username=$username&chargesCode=$row[chargesCode]&itemNo=$row[itemNo]'>".$row['description']."</a></font>&nbsp;</td>";
}

}else if($this->checkIfRadResultExist($row['itemNo']) > 0 && $row['title'] == "RADIOLOGY" ) {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a><br>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Reports/radiologyReport/radioReport_output.php?itemNo=$row[itemNo]&registrationNo=$row[registrationNo]&description=$row[description]'>(<font color=red size=1>Test Done</font>)</font></a>&nbsp;</td>";
}else if($this->checkIfSoapExist($row['itemNo']) > 0 && $row['title'] == "PROFESSIONAL FEE" ) {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a><br>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Doctor/doctorModule/soapView.php?itemNo=$row[itemNo]&registrationNo=$row[registrationNo]&username=$username'>(<font color=red size=1>S.O.A.P</font>)</font></a>&nbsp;</td>";
}

else if( $this->selectNow("registrationDetails","mgh","registrationNo",$row['registrationNo']) != "") {
echo "<td>&nbsp;<font class='data'><a href='#'>".$row['description']."</a></font>&nbsp;</td>";
}

else  {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a></font>&nbsp;</td>";
}


if($row['title']=="PROFESSIONAL FEE") {
echo "<td><font class='data'>".number_format($price[0],2)."</font>/<font class='data'>".$price[1]."</font>&nbsp;</td>";
}else if( $row['title'] == "MEDICINE" || $row['title'] == "SUPPLIES"  ) {

if( $this->selectNow("registeredUser","module","username",$username) == "PHILHEALTH" || $this->selectNow("registeredUser","module","username",$username) == "HMO" || $this->selectNow("registeredUser","module","username",$username) == "PHARMACY" || $this->selectNow("registeredUser","module","username",$username) == "BILLING" || $this->selectNow("registeredUser","module","username",$username) == "CASHIER" ) { //allowed to view the price
echo "<td><font class='data'>".number_format($row['sellingPrice'],2)."</font>&nbsp;</td>";
}else { // not allowed to view the price
echo "<td><font size=2 color=red>Confidential</font></td>";
}

}
else {
echo "<td><font class='data'>".number_format($row['sellingPrice'],2)."</font>&nbsp;</td>";
}

echo "<td>&nbsp;<font class='data'>".$row['quantity']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['discount']."</font>&nbsp;</td>";


if( $row['title'] == "MEDICINE" || $row['title'] == "SUPPLIES" ) {

if( $this->selectNow("registeredUser","module","username",$username) == "PHILHEALTH" || $this->selectNow("registeredUser","module","username",$username) == "HMO" || $this->selectNow("registeredUser","module","username",$username) == "BILLING" || $this->selectNow("registeredUser","module","username",$username) == "CASHIER" || $this->selectNow("registeredUser","module","username",$username) == "PHARMACY" ) { //allowed to view the price
echo "<td>&nbsp;<font class='data'>".number_format($row['total'],2)."</font>&nbsp;</td>";
}else { //not allowed to view the price
echo "<td><font size=2 color=red>Confidential</font></td>";
}

}else {
echo "<td>&nbsp;<font class='data'>".number_format($row['total'],2)."</font>&nbsp;</td>";
}

echo "<td>&nbsp;<font class='data'>".$row['timeCharge']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['dateCharge']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['chargeBy']."</font>&nbsp;</td>";

if($row['inventoryFrom'] != "none") {
echo "<td>&nbsp;<font class='data'>".$row['service']."</font><br><font class='data'>".$row['inventoryFrom']."</font>&nbsp;</td>";
}else if($row['inventoryFrom'] == "") {
echo "<td>&nbsp;<font class='data'>".$row['service']."</font>&nbsp;</td>";
}else if($row['title'] == "LABORATORY") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/addResults.php?description=$row[description]&registrationNo=$registrationNo&itemNo=$row[itemNo]&branch=$row[branch]'><font class='data'>".$row['service']."</font></a>&nbsp;</td>";
}else if($row['title'] == "RADIOLOGY") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Reports/radiologyReport/radioReportSettings.php?description=$row[description]&registrationNo=$registrationNo&itemNo=$row[itemNo]&branch=$row[branch]'><font class='data'>".$row['service']."</font></a>&nbsp;</td>";
}else if($row['title'] == "PROFESSIONAL FEE") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Doctor/doctorModule/soap.php?registrationNo=$registrationNo&itemNo=$row[itemNo]&username=$username'><font class='data'>".$row['service']."</font></a>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data'>".$row['service']."</font>&nbsp;</td>";
}

if($row['status']=="PAID" ) {
echo "<td>&nbsp;<font class='data' color=blue>".$row['status']."</font>&nbsp;</td>";
}
else if($row['status']=="BALANCE" || $row['status']=="APPROVED") {
echo "<td>&nbsp;<font class='data' color=red>".$row['status']."</font>&nbsp;</td>";
}
else {
echo "<td>&nbsp;<font class='data'>".$row['status']."</font>&nbsp;</td>";
}
if($row['paidVia']=="Company") {
echo "<td>&nbsp;<font class='data' color=red>".$row['paidVia']."</font>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data' color=blue>".$row['paidVia']."</font>&nbsp;</td>";
}


if($row['title'] == "PROFESSIONAL FEE") {
echo "<td>&nbsp;<center><font class='data'>".number_format($row['cashUnpaid'],2)."</font></centeR>&nbsp;</td>";
}else if( $row['title'] == "MEDICINE" || $row['title'] == "SUPPLIES" ) {

if( $this->selectNow("registeredUser","module","username",$username) == "PHILHEALTH" || $this->selectNow("registeredUser","module","username",$username) == "HMO" || $this->selectNow("registeredUser","module","username",$username) == "BILLING" || $this->selectNow("registeredUser","module","username",$username) == "CASHIER" || $this->selectNow("registeredUser","module","username",$username) == "PHARMACY"  ) { //allowed to view the price
echo "<td>&nbsp;<center><font class='data'>".number_format($row['cashUnpaid'],2)."</font></centeR>&nbsp;</td>";
}else { // not allowed to view the price
echo "<td> <font size=2 color=red>Confidential</font></td>";
}

}else {
echo "<td>&nbsp;<center><font class='data'>".number_format($row['cashUnpaid'],2)."</font></centeR>&nbsp;</td>";
}


if( $row['title'] == "MEDICINE" || $row['title'] == "SUPPLIES" ) {

if( $this->selectNow("registeredUser","module","username",$username) == "PHILHEALTH" || $this->selectNow("registeredUser","module","username",$username) == "HMO" || $this->selectNow("registeredUser","module","username",$username) == "PHARMACY" || $this->selectNow("registeredUser","module","username",$username) == "CASHIER" || $this->selectNow("registeredUser","module","username",$username) == "BILLING" ) {
echo "<td>&nbsp;<center><font class='data'>".number_format($row['company'],2)."</font></center>&nbsp;</td>";
echo "<td>&nbsp;<center><font class='data'>".number_format($row['phic'],2)."</font></center>&nbsp;</td>";
}else {
echo "<td><font size=2 color=red>Confidential</font></td>";
echo "<td><font size=2 color=red>Confidential</font></td>";
}
}else {

echo "<td>&nbsp;<center><font class='data'>".number_format($row['company'],2)."</font></center>&nbsp;</td>";
echo "<td>&nbsp;<center><font class='data'>".number_format($row['phic'],2)."</font></center>&nbsp;</td>";

}

if($this->checkBalanceItem($row['itemNo']) > 0 ) {
echo "<td>&nbsp;<font class='data'>".number_format(($row['cashPaid'] + $this->getBalancePaid($row['itemNo'])),2)."</font>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data'>".$row['cashPaid']."</font>&nbsp;</td>";
}
echo "<td>&nbsp;<font class='data'>".$row['branch']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['title']."</font>&nbsp;</td>";
echo "</tr>";
  }


//row after looping d2 ippkta ung total ng "balance","Company","hmo"
echo "<tr>";
echo "<td>&nbsp;</td>";
echo "<td><center><b>TOTAL</b></center></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";

if( $this->selectNow("registeredUser","module","username",$username) == "PHILHEALTH" || $this->selectNow("registeredUser","module","username",$username) == "HMO" || $this->selectNow("registeredUser","module","username",$username) == "PHARMACY" || $this->selectNow("registeredUser","module","username",$username) == "CASHIER" || $this->selectNow("registeredUser","module","username",$username) == "BILLING" ) {
echo "<td><center><font class='data' color=red>".number_format($this->patientChargez_disc,2)."</center></td>";
echo "<td><center><font class='data' color=red>".number_format($this->patientChargez_total,2)."</center></td>";
}else {
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
}

echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";

if( $this->selectNow("registeredUser","module","username",$username) == "PHILHEALTH" || $this->selectNow("registeredUser","module","username",$username) == "HMO" || $this->selectNow("registeredUser","module","username",$username) == "PHARMACY" || $this->selectNow("registeredUser","module","username",$username) == "CASHIER" || $this->selectNow("registeredUser","module","username",$username) == "BILLING" ) {

echo "<td><center><font class='data' color=red>".number_format($this->patientChargez_cashUnpaid,2)."</center></td>";
echo "<td><center><font class='data' color=red>".number_format($this->patientChargez_company,2)."</center></td>";
echo "<td><center><font class='data' color=red>".number_format($this->patientChargez_phic,2)."</center></td>";
echo "<td><center><font class='data' color=red>".number_format($this->patientChargez_paid,2)."</center></td>";
}else {
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";

}

echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "</tr>";


}


/**************************************************************************************/

public function getPatientCharges_noDialysis($registrationNo,$username,$show,$desc) {

$this->getPatientProfile($registrationNo);

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

.data {
font-size:12px;
}
</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


$result = mysql_query("SELECT * FROM patientCharges where registrationNo = '$registrationNo' and (title = 'MEDICINE' or title = 'SUPPLIES' or title = 'LABORATORY' or title = 'RADIOLOGY' or title = 'ECG' or title = 'NURSING-CHARGES' or title = 'MISCELLANEOUS' or title = 'OR/DR/ER FEE' or title = 'REHAB' or title = 'OXYGEN' or title='NBS') order by dateCharge,timeCharge asc ");



while($row = mysql_fetch_array($result))
  {
//$this->getMyResults($this->getResult_labNo($row['itemNo']),$username);
//$price = preg_split ("/\//", $row['sellingPrice']); 
$deptStatus = preg_split ("/\_/", $row['departmentStatus']); 
echo "<tr>";

/*********STRPOS*************/
if (strpos($row['sellingPrice'],'/') !== false) {
$price = preg_split ("/\//", $row['sellingPrice']); 
}else { 
$price[0] = $row['sellingPrice'];
$price[1] = "0.00";
} 
/***************************/

$this->patientChargez_cashUnpaid+=$row['cashUnpaid'];
$this->patientChargez_company+=$row['company'];
$this->patientChargez_phic+=$row['phic'];
$this->patientChargez_disc+=$row['discount'];
$this->patientChargez_total+=$row['total'];
$this->patientChargez_paid+=$row['cashPaid'];

$myDesc = $this->getPatientRecord_lastName().", ".$this->getPatientRecord_firstName()." - ".$row['description'];
if( $this->selectNow("forDeletion","itemNo","itemNo",$row['itemNo']) > 0 ) {
echo "<Td>&nbsp;<img src='http://".$this->getMyUrl()."/COCONUT/myImages/locked1.jpeg' />&nbsp;</tD>";
}else if( $row['title'] == "Room And Board" ) {
echo "<Td>&nbsp;<img src='http://".$this->getMyUrl()."/COCONUT/myImages/locked1.jpeg' />&nbsp;</tD>";
}else if( $row['batchNo'] == "package" ) {
echo "<Td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/verifyDelete_pass.php?registrationNo=$registrationNo&itemNo=$row[itemNo]&description=$myDesc&quantity=$row[quantity]&username=$username&show=$show&desc=$desc'><font size=2 color=red>Px</font></a>&nbsp;</tD>";
}else if( $this->selectNow("registrationDetails","mgh","registrationNo",$row['registrationNo']) != "") {
echo "<Td>&nbsp;<font size=2 color=red>MGH</font>&nbsp;</tD>";
}else if( $row['status'] == "Return" ) {
echo "<Td>&nbsp;<img src='http://".$this->getMyUrl()."/COCONUT/myImages/locked1.jpeg' />&nbsp;</tD>";
}
else {
//$myDesc = $this->getPatientRecord_lastName().", ".$this->getPatientRecord_firstName()." - ".$row['description'];
echo "<td><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/verifyDelete_pass.php?registrationNo=$registrationNo&itemNo=$row[itemNo]&description=$myDesc&quantity=$row[quantity]&username=$username&show=$show&desc=$desc'>
<img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg' />
</a></td>";
}


if($deptStatus[0] == "dispensedBy") {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']." &nbsp;(<font size=1 color=red>Dispensed @ $row[departmentStatus_time] by $deptStatus[1] </font>)</a></font>&nbsp;</td>";
}else if($this->checkIfLabResultExist($row['itemNo']) > 0 && $row['title'] == "LABORATORY" ) {

if($this->checkIfLabResultExist($row['itemNo']) > 0) {

echo "<td>&nbsp;<font class='data'><a href='#'>".$row['description']."</a><br>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Laboratory/resultList/resultForm_output.php?registrationNo=$row[registrationNo]&itemNo=$row[itemNo]'>(<font color=red size=1>Test Done</font>)</font></a>&nbsp;</td>";


}else {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/Laboratory/resultList/resultList.php?registrationNo=$row[registrationNo]&username=$username&chargesCode=$row[chargesCode]&itemNo=$row[itemNo]'>".$row['description']."</a></font>&nbsp;</td>";
}

}else if($this->checkIfRadResultExist($row['itemNo']) > 0 && $row['title'] == "RADIOLOGY" ) {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a><br>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Reports/radiologyReport/radioReport_output.php?itemNo=$row[itemNo]&registrationNo=$row[registrationNo]&description=$row[description]'>(<font color=red size=1>Test Done</font>)</font></a>&nbsp;</td>";
}else if($this->checkIfSoapExist($row['itemNo']) > 0 && $row['title'] == "PROFESSIONAL FEE" ) {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a><br>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Doctor/doctorModule/soapView.php?itemNo=$row[itemNo]&registrationNo=$row[registrationNo]&username=$username'>(<font color=red size=1>S.O.A.P</font>)</font></a>&nbsp;</td>";
}

else if( $this->selectNow("registrationDetails","mgh","registrationNo",$row['registrationNo']) != "") {
echo "<td>&nbsp;<font class='data'><a href='#'>".$row['description']."</a></font>&nbsp;</td>";
}

else  {
echo "<td>&nbsp;<font class='data'><a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/editCharges.php?itemNo=$row[itemNo]&username=$username&show=$show&desc=$desc'>".$row['description']."</a></font>&nbsp;</td>";
}


if($row['title']=="PROFESSIONAL FEE") {
echo "<td><font class='data'>".number_format($price[0],2)."</font>/<font class='data'>".$price[1]."</font>&nbsp;</td>";
}else if( $row['title'] == "MEDICINE" || $row['title'] == "SUPPLIES"  ) {

if( $this->selectNow("registeredUser","module","username",$username) == "PHILHEALTH" || $this->selectNow("registeredUser","module","username",$username) == "HMO" || $this->selectNow("registeredUser","module","username",$username) == "PHARMACY" || $this->selectNow("registeredUser","module","username",$username) == "BILLING" || $this->selectNow("registeredUser","module","username",$username) == "CASHIER" ) { //allowed to view the price
echo "<td><font class='data'>".number_format($row['sellingPrice'],2)."</font>&nbsp;</td>";
}else { // not allowed to view the price
echo "<td><font size=2 color=red>Confidential</font></td>";
}

}
else {
echo "<td><font class='data'>".number_format($row['sellingPrice'],2)."</font>&nbsp;</td>";
}

echo "<td>&nbsp;<font class='data'>".$row['quantity']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['discount']."</font>&nbsp;</td>";


if( $row['title'] == "MEDICINE" || $row['title'] == "SUPPLIES" ) {

if( $this->selectNow("registeredUser","module","username",$username) == "PHILHEALTH" || $this->selectNow("registeredUser","module","username",$username) == "HMO" || $this->selectNow("registeredUser","module","username",$username) == "BILLING" || $this->selectNow("registeredUser","module","username",$username) == "CASHIER" || $this->selectNow("registeredUser","module","username",$username) == "PHARMACY" ) { //allowed to view the price
echo "<td>&nbsp;<font class='data'>".number_format($row['total'],2)."</font>&nbsp;</td>";
}else { //not allowed to view the price
echo "<td><font size=2 color=red>Confidential</font></td>";
}

}else {
echo "<td>&nbsp;<font class='data'>".number_format($row['total'],2)."</font>&nbsp;</td>";
}

echo "<td>&nbsp;<font class='data'>".$row['timeCharge']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['dateCharge']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['chargeBy']."</font>&nbsp;</td>";

if($row['inventoryFrom'] != "none") {
echo "<td>&nbsp;<font class='data'>".$row['service']."</font><br><font class='data'>".$row['inventoryFrom']."</font>&nbsp;</td>";
}else if($row['inventoryFrom'] == "") {
echo "<td>&nbsp;<font class='data'>".$row['service']."</font>&nbsp;</td>";
}else if($row['title'] == "LABORATORY") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Results/addResults.php?description=$row[description]&registrationNo=$registrationNo&itemNo=$row[itemNo]&branch=$row[branch]'><font class='data'>".$row['service']."</font></a>&nbsp;</td>";
}else if($row['title'] == "RADIOLOGY") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Reports/radiologyReport/radioReportSettings.php?description=$row[description]&registrationNo=$registrationNo&itemNo=$row[itemNo]&branch=$row[branch]'><font class='data'>".$row['service']."</font></a>&nbsp;</td>";
}else if($row['title'] == "PROFESSIONAL FEE") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Doctor/doctorModule/soap.php?registrationNo=$registrationNo&itemNo=$row[itemNo]&username=$username'><font class='data'>".$row['service']."</font></a>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data'>".$row['service']."</font>&nbsp;</td>";
}

if($row['status']=="PAID" ) {
echo "<td>&nbsp;<font class='data' color=blue>".$row['status']."</font>&nbsp;</td>";
}
else if($row['status']=="BALANCE" || $row['status']=="APPROVED") {
echo "<td>&nbsp;<font class='data' color=red>".$row['status']."</font>&nbsp;</td>";
}
else {
echo "<td>&nbsp;<font class='data'>".$row['status']."</font>&nbsp;</td>";
}
if($row['paidVia']=="Company") {
echo "<td>&nbsp;<font class='data' color=red>".$row['paidVia']."</font>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data' color=blue>".$row['paidVia']."</font>&nbsp;</td>";
}


if($row['title'] == "PROFESSIONAL FEE") {
echo "<td>&nbsp;<center><font class='data'>".number_format($row['cashUnpaid'],2)."</font></centeR>&nbsp;</td>";
}else if( $row['title'] == "MEDICINE" || $row['title'] == "SUPPLIES" ) {

if( $this->selectNow("registeredUser","module","username",$username) == "PHILHEALTH" || $this->selectNow("registeredUser","module","username",$username) == "HMO" || $this->selectNow("registeredUser","module","username",$username) == "BILLING" || $this->selectNow("registeredUser","module","username",$username) == "CASHIER" || $this->selectNow("registeredUser","module","username",$username) == "PHARMACY"  ) { //allowed to view the price
echo "<td>&nbsp;<center><font class='data'>".number_format($row['cashUnpaid'],2)."</font></centeR>&nbsp;</td>";
}else { // not allowed to view the price
echo "<td> <font size=2 color=red>Confidential</font></td>";
}

}else {
echo "<td>&nbsp;<center><font class='data'>".number_format($row['cashUnpaid'],2)."</font></centeR>&nbsp;</td>";
}


if( $row['title'] == "MEDICINE" || $row['title'] == "SUPPLIES" ) {

if( $this->selectNow("registeredUser","module","username",$username) == "PHILHEALTH" || $this->selectNow("registeredUser","module","username",$username) == "HMO" || $this->selectNow("registeredUser","module","username",$username) == "PHARMACY" || $this->selectNow("registeredUser","module","username",$username) == "CASHIER" || $this->selectNow("registeredUser","module","username",$username) == "BILLING" ) {
echo "<td>&nbsp;<center><font class='data'>".number_format($row['company'],2)."</font></center>&nbsp;</td>";
echo "<td>&nbsp;<center><font class='data'>".number_format($row['phic'],2)."</font></center>&nbsp;</td>";
}else {
echo "<td><font size=2 color=red>Confidential</font></td>";
echo "<td><font size=2 color=red>Confidential</font></td>";
}
}else {

echo "<td>&nbsp;<center><font class='data'>".number_format($row['company'],2)."</font></center>&nbsp;</td>";
echo "<td>&nbsp;<center><font class='data'>".number_format($row['phic'],2)."</font></center>&nbsp;</td>";

}

if($this->checkBalanceItem($row['itemNo']) > 0 ) {
echo "<td>&nbsp;<font class='data'>".number_format(($row['cashPaid'] + $this->getBalancePaid($row['itemNo'])),2)."</font>&nbsp;</td>";
}else {
echo "<td>&nbsp;<font class='data'>".$row['cashPaid']."</font>&nbsp;</td>";
}
echo "<td>&nbsp;<font class='data'>".$row['branch']."</font>&nbsp;</td>";
echo "<td>&nbsp;<font class='data'>".$row['title']."</font>&nbsp;</td>";
echo "</tr>";
  }


//row after looping d2 ippkta ung total ng "balance","Company","hmo"
echo "<tr>";
echo "<td>&nbsp;</td>";
echo "<td><center><b>TOTAL</b></center></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";

if( $this->selectNow("registeredUser","module","username",$username) == "PHILHEALTH" || $this->selectNow("registeredUser","module","username",$username) == "HMO" || $this->selectNow("registeredUser","module","username",$username) == "PHARMACY" || $this->selectNow("registeredUser","module","username",$username) == "CASHIER" || $this->selectNow("registeredUser","module","username",$username) == "BILLING" ) {
echo "<td><center><font class='data' color=red>".number_format($this->patientChargez_disc,2)."</center></td>";
echo "<td><center><font class='data' color=red>".number_format($this->patientChargez_total,2)."</center></td>";
}else {
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
}

echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";

if( $this->selectNow("registeredUser","module","username",$username) == "PHILHEALTH" || $this->selectNow("registeredUser","module","username",$username) == "HMO" || $this->selectNow("registeredUser","module","username",$username) == "PHARMACY" || $this->selectNow("registeredUser","module","username",$username) == "CASHIER" || $this->selectNow("registeredUser","module","username",$username) == "BILLING" ) {

echo "<td><center><font class='data' color=red>".number_format($this->patientChargez_cashUnpaid,2)."</center></td>";
echo "<td><center><font class='data' color=red>".number_format($this->patientChargez_company,2)."</center></td>";
echo "<td><center><font class='data' color=red>".number_format($this->patientChargez_phic,2)."</center></td>";
echo "<td><center><font class='data' color=red>".number_format($this->patientChargez_paid,2)."</center></td>";
}else {
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";

}

echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "</tr>";


}

/*************************************************************************************/









public $getDoctorsFee_atteding_total;
public $getDoctorsFee_atteding_cashUnpaid;
public $getDoctorsFee_atteding_phic;
public $getDoctorsFee_atteding_company;
public $getDoctorsFee_atteding_cashPaid;

public function getDoctorsFee_atteding_total() {
return $this->getDoctorsFee_atteding_total;
}
public function getDoctorsFee_atteding_cashUnpaid() {
return $this->getDoctorsFee_atteding_cashUnpaid;
}
public function getDoctorsFee_atteding_phic() {
return $this->getDoctorsFee_atteding_phic;
}
public function getDoctorsFee_atteding_company() {
return $this->getDoctorsFee_atteding_company;
}
public function getDoctorsFee_atteding_cashPaid() {
return $this->getDoctorsFee_atteding_cashPaid;
}

public function getDoctorsFee_attending($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(cashPaid) as cashPaid,status,sum(total) as total,sum(cashUnpaid) as cashUnpaid,sum(phic) as phic,sum(company) as company FROM patientCharges WHERE registrationNo='$registrationNo' and service='ATTENDING' and title = 'PROFESSIONAL FEE' and status not like 'DELETED_%%%%%%%%%' ");

while($row = mysql_fetch_array($result))
  {
$this->getDoctorsFee_atteding_total = $row['total'];
if( $row['status'] == "UNPAID" ) {
$this->getDoctorsFee_atteding_cashUnpaid = $row['cashUnpaid'];
}else {
$this->getDoctorsFee_atteding_cashUnpaid = $row['cashPaid'];
}

$this->getDoctorsFee_atteding_phic = $row['phic'];
$this->getDoctorsFee_atteding_company = $row['company'];
$this->getDoctorsFee_atteding_cashPaid = $row['cashPaid'];
  }

}


public $getDoctorsFee_anesth_total;
public $getDoctorsFee_anesth_phic;
public $getDoctorsFee_anesth_company;
public $getDoctorsFee_anesth_cashUnpaid;
public $getDoctorsFee_anesth_cashPaid;

public function getDoctorsFee_anesth_total() {
return $this->getDoctorsFee_anesth_total;
}
public function getDoctorsFee_anesth_phic() {
return $this->getDoctorsFee_anesth_phic;
}
public function getDoctorsFee_anesth_company() {
return $this->getDoctorsFee_anesth_company;
}
public function getDoctorsFee_anesth_cashUnpaid() {
return $this->getDoctorsFee_anesth_cashUnpaid;
}
public function getDoctorsFee_anesth_cashPaid() {
return $this->getDoctorsFee_anesth_cashPaid;
}

public function getDoctorsFee_anesth($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT status,cashPaid,total,cashUnpaid,phic,company FROM patientCharges pc,Doctors d WHERE pc.chargesCode = d.doctorCode and pc.registrationNo='$registrationNo' and d.Specialization1 = 'ANESTHESIOLOGIST' and pc.title = 'PROFESSIONAL FEE' ");

while($row = mysql_fetch_array($result))
  {
$this->getDoctorsFee_anesth_total = $row['total'];
if( $row['status'] == "UNPAID" ) {
$this->getDoctorsFee_anesth_cashUnpaid = $row['cashUnpaid'];
}else {
$this->getDoctorsFee_anesth_cashUnpaid = $row['cashPaid'];
}
$this->getDoctorsFee_anesth_phic = $row['phic'];
$this->getDoctorsFee_anesth_company = $row['company']; 
$this->getDoctorsFee_anesth_cashPaid = $row['cashPaid'];   
}

}


public function addPayment_new($registrationNo,$amountPaid,$datePaid,$timePaid,$paidBy,$paymentFor,$orNo,$paidVia,$pf,$admitting,$control_datePaid) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO patientPayment (registrationNo,amountPaid,datePaid,timePaid,paidBy,paymentFor,orNo,paidVia,pf,admitting,control_datePaid)
VALUES
('$registrationNo','$amountPaid','$datePaid','$timePaid','$paidBy','$paymentFor','$orNo','$paidVia','$pf','$admitting','$control_datePaid')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


/*
echo "<script type='text/javascript' >";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/patientProfile/patientProfile_handler.php?username=$paidBy&registrationNo=$registrationNo '";
echo "</script>";
*/
mysql_close($con);

}





public function getPF_notAdmitting($registrationNo) { 

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


$result = mysql_query("SELECT sum(cashUnpaid) as total from patientCharges where registrationNo = '$registrationNo' and title = 'PROFESSIONAL FEE' and status = 'UNPAID' and service != 'ADMITTING' ");


while($row = mysql_fetch_array($result))
  {
return $row['total'];
}


}



public function getPF_Admitting($registrationNo) { 

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


$result = mysql_query("SELECT sum(cashUnpaid) as total from patientCharges where registrationNo = '$registrationNo' and title = 'PROFESSIONAL FEE' and status = 'UNPAID' and service = 'ADMITTING' ");


while($row = mysql_fetch_array($result))
  {
return $row['total'];
}


}


public function deleteRoom_new($registrationNo,$itemNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

mysql_query("DELETE FROM patientCharges WHERE itemNo='$itemNo' and registrationNo='$registrationNo' ");

mysql_close($con);

}



public function getPatientRoom($registrationNo) { 

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


$result = mysql_query("SELECT description,sellingPrice,quantity from patientCharges where registrationNo = '$registrationNo' and title = 'Room And Board' and  status not like 'DELETED_%%%%%' ");


while($row = mysql_fetch_array($result))
  {
$room = preg_split ("/\-/", $row['description']); 
echo "<td><div align='left' class='Arial14BlackBold'>".$room[0]." @ ".$row['sellingPrice']."/day x ".$row['quantity']."</div></td>";
}


}


public function deleteUnclearCharges($registrationNo,$title) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

mysql_query("DELETE FROM patientCharges WHERE registrationNo = '$registrationNo' and title = '$title' and departmentStatus = '' and status ='UNPAID'  ");

mysql_close($con);

}




public function sumPartial_new($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT (amountPaid + pf + admitting) as total FROM patientPayment WHERE registrationNo = '$registrationNo' ");

while($row = mysql_fetch_array($result))
  {
return $row['total'];
  }

}



public function discharged_inventory($registrationNo,$title,$x) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum($x) as totalPHIC FROM patientCharges WHERE registrationNo = '$registrationNo' and title='$title' ");

while($row = mysql_fetch_array($result))
  {
return $row['totalPHIC'];
  }


}


public $discharged_name_medicine;
public $discharged_name_supplies;

public function discharged_name_medicine() {
return $this->discharged_name_medicine;
}
public function discharged_name_supplies() {
return $this->discharged_name_supplies;
}

public function discharged_name($month,$day,$year,$month1,$day1,$year1) {

echo "<style type='text/css'>";
echo "tr:hover { background-color:yellow;color:black;}";
echo "</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$discharged = $year."-".$month."-".$day;
$discharged1 = $year1."-".$month1."-".$day1;

$result = mysql_query("SELECT rd.type,pr.lastName,pr.firstName,rd.registrationNo,rd.dateUnregistered FROM patientRecord pr,registrationDetails rd WHERE pr.patientNo = rd.patientNo and (rd.dateUnregistered between '$discharged' and '$discharged1') order by dateUnregistered asc  ");

while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->discharged_name_medicine += $this->discharged_inventory($row['registrationNo'],"MEDICINE","phic");
$this->discharged_name_supplies += $this->discharged_inventory($row['registrationNo'],"SUPPLIES","phic");


$this->coconutTableData($row['dateUnregistered']);
$this->coconutTableData($row['lastName'].", ".$row['firstName']);
$this->coconutTableData(  number_format($this->discharged_inventory($row['registrationNo'],"MEDICINE","phic"),2)  );
$this->coconutTableData(  number_format($this->discharged_inventory($row['registrationNo'],"SUPPLIES","phic"),2)  );
$this->coconutTableRowStop();
  }


}




public function printLabRequest($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT description,remarks from patientCharges WHERE registrationNo = '$registrationNo' and departmentStatus = '' and title = 'LABORATORY' ");

echo "<table border=0>";
echo "<tr>";
echo "<th></th>";
echo "</tr>";
while($row = mysql_fetch_array($result))
  {
echo "<tr>";
echo "<td>".$row['description']." - ".$row['remarks']."</tD>";
echo "</tr>";
  }
echo "</table>";


}


public $cashCollection_name_laboratory;
public $cashCollection_name_radiology;
public $cashCollection_name_medicine;
public $cashCollection_name_supplies;
public $cashCollection_name_bloodBank;
public $cashCollection_name_nbs;
public $cashCollection_name_misc;
public $cashCollection_name_nursingCare;
public $cashCollection_name_ecg;

public function cashCollection_name_laboratory() {
return $this->cashCollection_name_laboratory;
}
public function cashCollection_name_radiology() {
return $this->cashCollection_name_radiology;
}
public function cashCollection_name_medicine() {
return $this->cashCollection_name_medicine;
}
public function cashCollection_name_supplies() {
return $this->cashCollection_name_supplies;
}
public function cashCollection_name_bloodBank() {
return $this->cashCollection_name_bloodBank;
}
public function cashCollection_name_nbs() {
return $this->cashCollection_name_nbs;
}
public function cashCollection_name_misc() {
return $this->cashCollection_name_misc;
}
public function cashCollection_name_nursingCare() {
return $this->cashCollection_name_nursingCare;
}
public function cashCollection_name_ecg() {
return $this->cashCollection_name_ecg;
}

public function cashCollection_name($month,$day,$year,$month1,$day1,$year1,$type,$control,$username) {

echo "<style type='text/css'>";
echo "tr:hover { background-color:yellow;color:black;}";
echo "</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$discharged = $year."-".$month."-".$day;
$discharged1 = $year1."-".$month1."-".$day1;

if( $control != "All" ) {
$result = mysql_query("SELECT pr.lastName,pr.firstName,rd.registrationNo,rd.dateUnregistered FROM patientRecord pr,registrationDetails rd,patientPayment pp WHERE pr.patientNo = rd.patientNo and pp.registrationNo = rd.registrationNo and (rd.dateUnregistered between '$discharged' and '$discharged1') and rd.type='$type' and pp.paidBy = '$username' order by dateUnregistered asc  ");
}else {
$result = mysql_query("SELECT pr.lastName,pr.firstName,rd.registrationNo,rd.dateUnregistered FROM patientRecord pr,registrationDetails rd,patientPayment pp WHERE pr.patientNo = rd.patientNo and pp.registrationNo = rd.registrationNo and (rd.dateUnregistered between '$discharged' and '$discharged1') and rd.type='$type' order by dateUnregistered asc  ");
}


while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->discharged_name_medicine += $this->discharged_inventory($row['registrationNo'],"MEDICINE","cashUnpaid");
$this->discharged_name_supplies += $this->discharged_inventory($row['registrationNo'],"SUPPLIES","cashUnpaid");

$this->cashCollection_name_laboratory += $this->getTotal("cashUnpaid","LABORATORY",$row['registrationNo']);
$this->cashCollection_name_radiology  += $this->getTotal("cashUnpaid","RADIOLOGY",$row['registrationNo']);
$this->cashCollection_name_medicine +=  $this->getTotal("cashUnpaid","MEDICINE",$row['registrationNo']);
$this->cashCollection_name_supplies +=  $this->getTotal("cashUnpaid","SUPPLIES",$row['registrationNo']);
$this->cashCollection_name_bloodBank +=  $this->getTotal("cashUnpaid","BLOODBANK",$row['registrationNo']);
$this->cashCollection_name_nbs +=  $this->getTotal("cashUnpaid","NBS",$row['registrationNo']);
$this->cashCollection_name_misc +=  $this->getTotal("cashUnpaid","MISCELLANEOUS",$row['registrationNo']);
$this->cashCollection_name_nursingCare +=  $this->getTotal("cashUnpaid","NURSING-CHARGES",$row['registrationNo']);
$this->cashCollection_name_ecg += $this->getTotal("cashUnpaid","ECG",$row['registrationNo']);

$this->coconutTableData($row['dateUnregistered']);
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/currentPatient/patientInterface1.php?username=&registrationNo=$row[registrationNo]' style='text-decoration:none; color:black;' target='_blank'><font size=2>".$row['lastName'].", ".$row['firstName']."</font></a>");
$this->coconutTableData("&nbsp;".number_format($this->getTotal("cashUnpaid","LABORATORY",$row['registrationNo']),2 ));
$this->coconutTableData("&nbsp;".number_format($this->getTotal("cashUnpaid","RADIOLOGY",$row['registrationNo']),2 ));
$this->coconutTableData("&nbsp;".number_format($this->getTotal("cashUnpaid","MEDICINE",$row['registrationNo']),2 ));
$this->coconutTableData("&nbsp;".number_format($this->getTotal("cashUnpaid","SUPPLIES",$row['registrationNo']),2 ));
$this->coconutTableData("&nbsp;".number_format($this->getTotal("cashUnpaid","BLOODBANK",$row['registrationNo']),2 ));
$this->coconutTableData("&nbsp;".number_format($this->getTotal("cashUnpaid","NBS",$row['registrationNo']),2 ));
$this->coconutTableData("&nbsp;".number_format($this->getTotal("cashUnpaid","MISCELLANEOUS",$row['registrationNo']),2 ));
$this->coconutTableData("&nbsp;".number_format($this->getTotal("cashUnpaid","NURSING-CHARGES",$row['registrationNo']),2 ));
$this->coconutTableData("&nbsp;".number_format($this->getTotal("cashUnpaid","ECG",$row['registrationNo']),2 ));
$this->coconutTableRowStop();
  }


}





public function cashCollection_paid($registrationNo,$title,$datePaid) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(cashPaid) as cashPaid from patientCharges WHERE registrationNo = '$registrationNo' and datePaid = '$datePaid' and title='$title' ");


while($row = mysql_fetch_array($result))
  {
return $row['cashPaid'];
  }

}

public $cashCollection_name1_laboratory;
public $cashCollection_name1_radiology;
public $cashCollection_name1_medicine;
public $cashCollection_name1_supplies;
public $cashCollection_name1_bloodBank;
public $cashCollection_name1_nbs;
public $cashCollection_name1_misc;
public $cashCollection_name1_nursingCare;
public $cashCollection_name1_ecg;

public function cashCollection_name1_laboratory() {
return $this->cashCollection_name1_laboratory;
}
public function cashCollection_name1_radiology() {
return $this->cashCollection_name1_radiology;
}
public function cashCollection_name1_medicine() {
return $this->cashCollection_name1_medicine;
}
public function cashCollection_name1_supplies() {
return $this->cashCollection_name1_supplies;
}
public function cashCollection_name1_bloodBank() {
return $this->cashCollection_name1_bloodBank;
}
public function cashCollection_name1_nbs() {
return $this->cashCollection_name1_nbs;
}
public function cashCollection_name1_misc() {
return $this->cashCollection_name1_misc;
}
public function cashCollection_name1_nursingCare() {
return $this->cashCollection_name1_nursingCare;
}
public function cashCollection_name1_ecg() {
return $this->cashCollection_name1_ecg;
}

public function cashCollection_name1($month,$day,$year,$month1,$day1,$year1,$type,$control,$username) {

echo "<style type='text/css'>";
echo "tr:hover { background-color:yellow;color:black;}";
echo "</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$discharged = $year."-".$month."-".$day;
$discharged1 = $year1."-".$month1."-".$day1;


if( $control != "All" ) {
$result = mysql_query("SELECT pr.lastName,pr.firstName,rd.registrationNo,pc.datePaid FROM patientCharges pc,patientRecord pr,registrationDetails rd WHERE pr.patientNo=rd.patientNo and rd.registrationNo=pc.registrationNo and (pc.datePaid between '$discharged' and '$discharged1') group by rd.registrationNo and pc.paidBy = '$username' order by pc.datePaid asc  ");
}else {
$result = mysql_query("SELECT pr.lastName,pr.firstName,rd.registrationNo,pc.datePaid FROM patientCharges pc,patientRecord pr,registrationDetails rd WHERE pr.patientNo=rd.patientNo and rd.registrationNo=pc.registrationNo and (pc.datePaid between '$discharged' and '$discharged1') group by rd.registrationNo order by pc.datePaid asc  ");
}


while($row = mysql_fetch_array($result))
  {

$this->coconutTableRowStart();

$this->cashCollection_name1_laboratory += $this->cashCollection_paid($row['registrationNo'],"LABORATORY",$row['datePaid']);
$this->cashCollection_name1_radiology  += $this->cashCollection_paid($row['registrationNo'],"RADIOLOGY",$row['datePaid']);
$this->cashCollection_name1_medicine += $this->cashCollection_paid($row['registrationNo'],"MEDICINE",$row['datePaid']);
$this->cashCollection_name1_supplies += $this->cashCollection_paid($row['registrationNo'],"SUPPLIES",$row['datePaid']);
$this->cashCollection_name1_bloodBank += $this->cashCollection_paid($row['registrationNo'],"BLOODBANK",$row['datePaid']);
$this->cashCollection_name1_nbs += $this->cashCollection_paid($row['registrationNo'],"NBS",$row['datePaid']);
$this->cashCollection_name1_misc += $this->cashCollection_paid($row['registrationNo'],"MISCELLANEOUS",$row['datePaid']);
$this->cashCollection_name1_nursingCare += $this->cashCollection_paid($row['registrationNo'],"NURSING-CHARGES",$row['datePaid']);
$this->cashCollection_name1_ecg += $this->cashCollection_paid($row['registrationNo'],"ECG",$row['datePaid']);


$this->coconutTableData($row['datePaid']);
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/currentPatient/patientInterface1.php?username=&registrationNo=$row[registrationNo]' style='text-decoration:none; color:black;' target='_blank'><font size=2>".$row['lastName'].", ".$row['firstName']."</font></a>");
$this->coconutTableData("&nbsp;".number_format($this->cashCollection_paid($row['registrationNo'],"LABORATORY",$row['datePaid']),2 ));
$this->coconutTableData("&nbsp;".number_format($this->cashCollection_paid($row['registrationNo'],"RADIOLOGY",$row['datePaid']),2 ));
$this->coconutTableData("&nbsp;".number_format($this->cashCollection_paid($row['registrationNo'],"MEDICINE",$row['datePaid']),2 ));
$this->coconutTableData("&nbsp;".number_format($this->cashCollection_paid($row['registrationNo'],"SUPPLIES",$row['datePaid']),2 ));

$this->coconutTableData("&nbsp;".number_format($this->cashCollection_paid($row['registrationNo'],"BLOODBANK",$row['datePaid']),2 ));

$this->coconutTableData("&nbsp;".number_format($this->cashCollection_paid($row['registrationNo'],"NBS",$row['datePaid']),2 ));

$this->coconutTableData("&nbsp;".number_format($this->cashCollection_paid($row['registrationNo'],"MISCELLANEOUS",$row['datePaid']),2 ));

$this->coconutTableData("&nbsp;".number_format($this->cashCollection_paid($row['registrationNo'],"NURSING-CHARGES",$row['datePaid']),2 ));
$this->coconutTableData("&nbsp;".number_format($this->cashCollection_paid($row['registrationNo'],"ECG",$row['datePaid']),2 ));

$this->coconutTableRowStop();
  }


}


public function requestCart($batchNo,$username) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT description,quantity,verificationNo FROM inventoryManager where batchNo='$batchNo' and requestingUser='$username' ");

$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Description");
$this->coconutTableHeader("QTY");
$this->coconutTableHeader("");
$this->coconutTableRowStop();
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData("&nbsp;".$row['description']);
$this->coconutTableData("&nbsp;".$row['quantity']);
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/requestition/batchRequest/deleteRequest.php?verificationNo=$row[verificationNo]&batchNo=$batchNo&username=$username'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg' /></a>");
$this->coconutTableRowStop();
  }
$this->coconutTableStop();

}





public function getTransmitted_selected($transmitNo) {
$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);



$result = mysql_query("SELECT pr.phicType,rd.registrationNo,rd.PIN,pr.lastName,pr.firstName,pr.age,pr.gender,rd.dateRegistered,rd.dateUnregistered,pt.registrationNo from registrationDetails rd,patientRecord pr,phicTransmit pt where pr.patientNo = rd.patientNo and pt.registrationNo = rd.registrationNo and pt.transmitNo = '$transmitNo' group by pt.registrationNo order by pr.lastName asc ");


while($row = mysql_fetch_array($result))
  {
echo "<tr>";
echo "<td><font size=3>".$row['PIN']."</font></tD>"; // header [ PHIC NUMBER ]
echo "<Td><font size=3>".$row['lastName'].", ".$row['firstName']."</font></td>"; // header [ NAME/RELATIONSHIP ] 
echo "<td><font size=3>".$row['dateRegistered']." - ".$row['dateUnregistered']."</font></tD>"; // header [ Confinement Period ]
if( $this->getPatientICD_diagnosis_transmittal_check($row['registrationNo']) > 0 ) {
$this->getPatientICD_diagnosis_transmittal($row['registrationNo']); // header [ ICD - FINAL DIAGNOSIS ] 
}else {
echo "<td>&nbsp;</td>";
}
echo "</tr>";  
}

}




public function availableForDiscount($registrationNo) {

echo "<style type='text/css'>
tr:hover { background-color:yellow; color:black; }
.data{
font-size:14px;
}
</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT itemNo,description,sellingPrice FROM patientCharges WHERE registrationNo = '$registrationNo' and status = 'UNPAID' and (title = 'LABORATORY' or title = 'MEDICINE' or title = 'SUPPLIES') order by title,description asc ");

echo "<center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("");
$this->coconutTableHeader("Description");
$this->coconutTableHeader("Price");
$this->coconutTableRowStop();
$this->coconutFormStart("get","http://".$this->getMyUrl()."/COCONUT/patientProfile/discount/discount1.php");
$this->coconutHidden("registrationNo",$registrationNo);
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData("<input type=checkbox name='itemNo[]' value='$row[itemNo]'>");
$this->coconutTableData("&nbsp;".$row['description']);
$this->coconutTableData("&nbsp;".$row['sellingPrice']);
$this->coconutTableRowStop();
  }
$this->coconutButton("Proceed");
$this->coconutFormStop();
$this->coconutTableStop();
}




public function getPatient_in_the_room($room) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT pr.lastName,pr.firstName,rd.dateRegistered from patientRecord pr,registrationDetails rd WHERE rd.room = '$room' and rd.dateUnregistered = '' and pr.patientNo = rd.patientNo ");


while($row = mysql_fetch_array($result))
  {
return "&nbsp;<font size=1 color=black>".$row['lastName'].", ".$row['firstName']." </font>";
  }

}

public $listRoom_total;

public function listRoom_total() {
return $this->listRoom_total;
}

public function listRoom($floor) {

echo "<style type='text/css'>
tr:hover { background-color:yellow; color:black; }
.data{
font-size:14px;
}
</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT * FROM room WHERE floor = '$floor' order by Description asc ");
/*
echo "<center>";
echo "<table border=1 cellspacing=0 rules=all width='15%'>";
echo "<tr>";
echo "<th><b>Beds</b></th>";
echo "</tr>";
*/
while($row = mysql_fetch_array($result))
  {
$descz = preg_split ("/_/", $row['Description']); 
echo "<tr>";

if( $row['status'] == "Occupied" ) {
echo "<td>&nbsp;<font size=1 color=red>".$descz[0]."</font><br>
".$this->getPatient_in_the_room($row['Description'])."
</td>";
$this->listRoom_total++;
}else {
echo "<td>&nbsp;<font size=1 color=blue>".$descz[0]."</font></tD>";
}

/*
if( $row['status'] == "Vacant" ) {
$this->coconutTableData("&nbsp;<font color=green size=1>".$row['status']."</font>");
}else {
$this->coconutTableData("&nbsp;<font color=red size=1>".$row['status']."</font>");
}
*/
//$this->coconutTableData("&nbsp;".$this->getPatient_in_the_room($row['Description'])."");
echo "</tr>";
  }
/*
echo "<Tr>";
echo "<td>&nbsp;<font size=2><b>".$this->listRoom_total." Patients</b></font></tD>";
echo "</tr>";
$this->coconutTableStop();
*/
}






public $dispensedMonitor_qty;

public function dispensedMonitor_qty() {
return $this->dispensedMonitor_qty;
}

public function dispensedMonitor($chargesCode,$month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds) {

echo "<style type='text/css'>
tr:hover { background-color:yellow; color:black; }
.data{
font-size:14px;
}
</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$date = $month."_".$day."_".$year;
$from = $fromTime_hour.":".$fromTime_minutes.":".$fromTime_seconds;
$to = $toTime_hour.":".$toTime_minutes.":".$toTime_seconds;

$result = mysql_query("SELECT pr.lastName,pr.firstName,pc.quantity,pc.departmentStatus_time,rd.registrationNo,pc.dispensedNo FROM patientCharges pc,registrationDetails rd,patientRecord pr WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and pc.dateCharge = '$date' and (pc.departmentStatus_time between '$from' and '$to') and pc.chargesCode = '$chargesCode' and pc.status not like 'DELETED%%%%%%%' ");

echo "<Br><center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Patient");
$this->coconutTableHeader("QTY");
$this->coconutTableHeader("Dispensed");
$this->coconutTableHeader("Reg#");
$this->coconutTableHeader("Batch#");
$this->coconutTableHeader("Attending");
echo "</tr>";
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->dispensedMonitor_qty += $row['quantity'];
$this->coconutTableData("&nbsp;".$row['lastName'].", ".$row['firstName']);
$this->coconutTableData("&nbsp;".$row['quantity']);
$this->coconutTableData("&nbsp;".$row['departmentStatus_time']);
$this->coconutTableData("&nbsp;".$row['registrationNo']);
$this->coconutTableData("&nbsp;".$row['dispensedNo']);
$this->coconutTableData("&nbsp;".$this->getAttendingDoc($row['registrationNo'],"Attending"));
$this->coconutTableRowStop();
  }
$this->coconutTableRowStart();
$this->coconutTableData("&nbsp;<b>TOTAL</b>");
$this->coconutTableData("&nbsp;".$this->dispensedMonitor_qty);
$this->coconutTableData("&nbsp;");
$this->coconutTableData("&nbsp;");
$this->coconutTableData("&nbsp;");
$this->coconutTableRowStop();
$this->coconutTableStop();
}






public $showExpenses_total;

public function showExpenses_total() {
return $this->showExpenses_total;
}

public function showExpenses($month,$day,$year,$username) {

echo "<style type='text/css'>
tr:hover { background-color:yellow; color:black; }
.data{
font-size:14px;
}
</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$date = $year."-".$month."-".$day;

if( $this->selectNow("registeredUser","module","username",$username) == "ADMIN" ) {
$result = mysql_query("SELECT amount,payee,date,user,description FROM vouchers WHERE date = '$date' ");
}else {
$result = mysql_query("SELECT amount,payee,date,user,description FROM vouchers WHERE date = '$date' and user = '$username' ");
}

while($row = mysql_fetch_array($result))
  {
echo "<tr>";
$this->showExpenses_total += $row['amount'];
echo "<td>&nbsp; ".$row['payee']." </td>";
echo "<td>&nbsp; ".$row['description']."</td>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<td>&nbsp; ".$row['user']."</td>";
echo "<td>&nbsp; ".number_format($row['amount'],2)."</td>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "</tr>";
  }
echo "<Tr>";
echo "<td><center><b>Total</b></center></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;<b>".number_format($this->showExpenses_total)."</b></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "</tr>";

}









public function getPatient_OR($registrationNo) {

echo "
<style type='text/css'>
tr:hover { background-color:yellow;color:black;}

a { text-decoration:none; color:black; }
</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT orNO,description,quantity,cashPaid,paidBy,datePaid FROM patientCharges WHERE registrationNo='$registrationNo' and orNO != '' ");

echo "<br><Center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("OR#");
$this->coconutTableHeader("Particulars");
$this->coconutTableHeader("QTY");
$this->coconutTableHeader("Paid");
$this->coconutTableHeader("Date Paid");
$this->coconutTableHeader("paidBy");
$this->coconutTableRowStop();
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData("&nbsp;".$row['orNO']);
$this->coconutTableData("&nbsp;".$row['description']);
$this->coconutTableData("&nbsp;".$row['quantity']);
$this->coconutTableData("&nbsp;".$row['cashPaid']);
$this->coconutTableData("&nbsp;".$row['datePaid']);
$this->coconutTableData("&nbsp;".$row['paidBy']);
$this->coconutTableRowStop();
  }
$this->coconutTableStop();

}






///////////  CUTOFF REPORT   //////////////////////////////



public $partial_cutoff;
public $getPartialReport_hb_cutoff;
public $getPartialReport_pf_cutoff;
public $getPartialReport_admitting_cutoff;

public function partial_cutoff() {
return $this->partial_cutoff;
}
public function getPartialReport_hb_cutoff() {
return $this->getPartialReport_hb_cutoff;
}
public function getPartialReport_pf_cutoff() {
return $this->getPartialReport_pf_cutoff;
}
public function getPartialReport_admitting_cutoff() {
return $this->getPartialReport_admitting_cutoff;
}

public function getPartialReport_cutoff($month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$username,$status) {

echo "
<style type='text/css'>
tr:hover { background-color:yellow; color:black;}
a { text-decoration:none; color:black; }
</style>";

$dateSelected = $month."_".$day."_".$year;
$fromTimez = $fromTime_hour.":".$fromTime_minutes.":".$fromTime_seconds;
$toTimez = $toTime_hour.":".$toTime_minutes.":".$toTime_seconds;


$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

if( $this->selectNow("registeredUser","module","username",$username) == "ADMIN" ) {
$result = mysql_query("SELECT rd.registrationNo,pp.paidVia,upper(pr.completeName) as completeName,pp.paymentFor,pp.paidBy,pp.datePaid,pp.amountPaid,pp.pf,pp.admitting FROM patientPayment pp,patientRecord pr,registrationDetails rd,patientCharges pc WHERE pr.patientNo = rd.patientNo and pp.registrationNo = rd.registrationNo and rd.registrationNo = pc.registrationNo and pp.datePaid = '$dateSelected' and (pp.timePaid between '$fromTimez' and '$toTimez') and paymentFor in ('CUT-OFF HOSPITAL BILL') group by paymentNo order by completeName asc ");
}else {
$result = mysql_query("SELECT rd.registrationNo,pp.paidVia,upper(pr.completeName) as completeName,pp.paymentFor,pp.paidBy,pp.datePaid,pp.amountPaid,pp.pf,pp.admitting FROM patientPayment pp,patientRecord pr,registrationDetails rd,patientCharges pc WHERE pr.patientNo = rd.patientNo and pp.registrationNo = rd.registrationNo and rd.registrationNo = pc.registrationNo and pp.datePaid = '$dateSelected' and (pp.timePaid between '$fromTimez' and '$toTimez') and paymentFor in ('CUT-OFF HOSPITAL BILL') and pp.paidBy='$username' group by paymentNo order by completeName asc ");
}

//$this->collection_salesTotal=0;
//$this->collection_salesUnpaid=0;
//$this->collection_salesPaid=0;
while($row = mysql_fetch_array($result))
  {
$this->partial_cutoff +=$row['amountPaid'];
$this->getPartialReport_hb_cutoff += $row['amountPaid'];
$this->getPartialReport_pf_cutoff += $row['pf'];
$this->getPartialReport_admitting_cutoff += $row['admitting'];
//$price = preg_split ("/\//", $row['sellingPrice']); 


echo "<tr>";
echo "<td>&nbsp;<font color=red>".$row['completeName']."</font>&nbsp;</td>";
echo "<td>&nbsp;".$row['paymentFor']."&nbsp;</td>";
echo "<td>&nbsp;".number_format(($row['amountPaid'] + $row['pf']) + $row['admitting'],2)."&nbsp;</td>";
//echo "<td>&nbsp;".number_format("1",2)."&nbsp;</td>";// header [QTY]
//echo "<td>&nbsp;".number_format("0",2)."&nbsp;</td>";// header [DISC]
echo "<td>&nbsp;".number_format(($row['amountPaid'] + $row['pf']) + $row['admitting'],2)."&nbsp;</td>";
//echo "<td>&nbsp;".number_format("0",2)."&nbsp;</td>"; //header [Balance]
echo "<td>&nbsp;".(($row['amountPaid']+$row['pf'])+$row['admitting'])." - (".$row['paidVia'].")&nbsp;</td>";
echo "<td>&nbsp;".$row['paidBy']."&nbsp;</td>";
echo "<tD>&nbsp;".number_format($row['amountPaid'],2)."&nbsp;</tD>";
echo "<tD>&nbsp;".number_format($row['pf'],2)."&nbsp;</tD>";
echo "<tD>&nbsp;".$this->getAttendingDoc($row['registrationNo'],"Attending")."&nbsp;</tD>";
echo "<tD>&nbsp;".number_format($row['admitting'],2)."&nbsp;</tD>";
//$this->collection_salesTotal+=$row['total'];
//$this->collection_salesUnpaid+=$row['cashUnpaid'];
//$this->collection_salesPaid+=$row['cashPaid'];
/*
if($row['paidVia'] == "Cash") {
$this->collection_cash += $row['cashPaid'];
}else {
$this->collection_creditCard += $row['cashPaid'];
}
*/
echo "</tr>";
  }


					
}




//////////  CUTOFF REPORT   //////////////////////////////







//check kung mei laboratory result n?
public function checkIfTitleExist($registrationNo,$title) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT title from patientCharges where registrationNo = '$registrationNo' and title = '$title'  ");

while($row = mysql_fetch_array($result))
  {
return mysql_num_rows($result);
  }

}






public function checkBalance($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


$result = mysql_query("SELECT sum(cashUnpaid) as balance FROM patientCharges where registrationNo = '$registrationNo' ");



while($row = mysql_fetch_array($result))
  {
return $row['balance'];
  }

mysql_close($con);


}





public function addCashCollection($title,$amount,$date) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO cashCollection (title,amount,date,control_date)
VALUES
('$title','$amount','$date','".date("Y-m-d")."')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

//echo "<script type='text/javascript' >";
//echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addUser.php?username=$addedBy '";
//echo "</script>";

mysql_close($con);

}




public function cashCollectionDetails($month,$day,$year) {

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$date = $year."-".$month."-".$day;
$result = mysql_query("SELECT title,amount,collectionNo FROM cashCollection where date = '$date' order by title asc ");


$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Title");
$this->coconutTableHeader("Amount");
$this->coconutTableHeader("&nbsp;");
$this->coconutTableRowStop();
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData($row['title']);
$this->coconutTableData($row['amount']);
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/Cashier/cashCollection/cashCollectionDetails_delete.php?collectionNo=$row[collectionNo]&month=$month&day=$day&year=$year'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg' /></a>");
$this->coconutTableRowStop();
  }
$this->coconutTableStop();

mysql_close($con);


}


public $hmo_meds_qty;
public $hmo_meds_actualCharges;
public $hmo_meds_cover;

public function hmo_meds_qty() {
return $this->hmo_meds_qty;
}
public function hmo_meds_actualCharges() {
return $this->hmo_meds_actualCharges;
}
public function hmo_meds_cover() {
return $this->hmo_meds_cover;
}




public function hmo_meds_group($registrationNo,$chargesCode) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(pc.quantity) as qty,sum(pc.total) as total,sum(pc.company) as totalCover from patientCharges pc WHERE pc.registrationNo='$registrationNo' and pc.chargesCode = '$chargesCode' and pc.title = 'MEDICINE' and pc. status = 'UNPAID'   "); 

while($row = mysql_fetch_array($result))
  {
$this->hmo_meds_qty = $row['qty'];
$this->hmo_meds_actualCharges = $row['total'];
$this->hmo_meds_cover = $row['totalCover'];
  }


}




/*********HMO OTHERS********************/

public $hmo_others_qty;
public $hmo_others_actualCharges;
public $hmo_others_cover;

public function hmo_others_qty() {
return $this->hmo_others_qty;
}
public function hmo_others_actualCharges() {
return $this->hmo_others_actualCharges;
}
public function hmo_others_cover() {
return $this->hmo_others_cover;
}




public function hmo_others_group($registrationNo,$chargesCode) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(pc.quantity) as qty,sum(pc.total) as total,sum(pc.company) as totalCover from patientCharges pc WHERE pc.registrationNo='$registrationNo' and pc.chargesCode = '$chargesCode' and pc.title IN ('LABORATORY','RADIOLOGY','SUPPLIES') and pc. status = 'UNPAID'   "); 

while($row = mysql_fetch_array($result))
  {
$this->hmo_others_qty = $row['qty'];
$this->hmo_others_actualCharges = $row['total'];
$this->hmo_others_cover = $row['totalCover'];
  }


}

/*********HMO OTHERS*******************/



public $hmo_meds_total;
public $hmo_meds_excess;

public function hmo_meds_total() {
return $this->hmo_meds_total;
}




public function hmo_meds($registrationNo) {

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}


.editable{
	border: 1px solid #000;
	color: #000;
	height: 25px;
	width: 80px;
	border-color:white white white white;
	font-size:16px;
	text-align:center;
}


</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


$result = mysql_query("SELECT company,phic,hmoPrice,description,chargesCode,sellingPrice FROM patientCharges where registrationNo = '$registrationNo' and title = 'MEDICINE' and status = 'UNPAID' and hmoPrice > 0 group by description order by description asc ");



while($row = mysql_fetch_array($result))
  {
$this->hmo_meds_group($registrationNo,$row['chargesCode']);
$this->hmo_meds_total += ( $row['hmoPrice'] * $this->hmo_meds_qty() );
echo "<tr>";
echo "<td>&nbsp;".$row['description']."</td>";
echo "<td>&nbsp;<input type='text' class='editable' value='".$this->hmo_meds_qty()."'>&nbsp;</tD>";
echo "<td>&nbsp;<input type='text' class='editable' value='".$row['hmoPrice']."'>&nbsp;</tD>";
echo "<td>&nbsp;<input type='text' class='editable' value='".number_format( ( $row['hmoPrice'] * $this->hmo_meds_qty() ) ,2)."'></tD>";
echo "<td>&nbsp;&nbsp;</tD>";
echo "<td>&nbsp;&nbsp;</tD>";
echo "</tr>";
  }


mysql_close($con);


}


public $hmo_others_total;

public function hmo_others_total() {
return $this->hmo_others_total;
}

public function hmo_others($registrationNo) {

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


$result = mysql_query("SELECT hmoPrice,description,chargesCode,sellingPrice FROM patientCharges where registrationNo = '$registrationNo' and title IN ('LABORATORY','RADIOLOGY','SUPPLIES') and status ='UNPAID' and hmoPrice > 0 group by description order by description asc ");



while($row = mysql_fetch_array($result))
  {
$this->hmo_others_group($registrationNo,$row['chargesCode']);
$this->hmo_others_total += ( $row['hmoPrice'] * $this->hmo_others_qty() );
echo "<tr>";
echo "<td>&nbsp;".$row['description']."</td>";
echo "<td>&nbsp;".$this->hmo_others_qty()."&nbsp;</tD>";
echo "<td>&nbsp;".$row['hmoPrice']."&nbsp;</tD>";
echo "<td>&nbsp;&nbsp;".number_format( ( $row['hmoPrice'] * $this->hmo_others_qty() ) ,2)."</tD>";
echo "<td>&nbsp;&nbsp;</tD>";
echo "<td>&nbsp;&nbsp;</tD>";
echo "</tr>";
  }


mysql_close($con);


}










/**********************TRANSMITAL RECONCILE*******************************/




public function getTransmitted_reconcile($dateDischarged,$dateDischarged1,$package,$type,$switch) {

echo "<style type='text/css'>";

echo "

.member{
	border: 1px solid #000;
	color: #000;
	height: 28px;
	width: 130px;
	border-color:white white white white;
	font-size:13px;

}

";

echo "</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


if( $type == "All"  ) {
$result = mysql_query("SELECT pr.phicType,rd.registrationNo,rd.PIN,UPPER(pr.lastName) as lastName,UPPER(pr.firstName) as firstName,pr.age,pr.gender,rd.dateRegistered,rd.dateUnregistered,pt.transmitNo from registrationDetails rd,patientRecord pr,phicTransmit pt where pr.patientNo = rd.patientNo and (rd.dateUnregistered between '$dateDischarged' and '$dateDischarged1') and pr.PHIC = 'YES' and pt.reconciled != 'yes' and pt.registrationNo = rd.registrationNo group by pt.registrationNo order by pr.lastName asc ");
}else {
$result = mysql_query("SELECT pr.phicType,rd.registrationNo,rd.PIN,pr.lastName,pr.firstName,pr.age,pr.gender,rd.dateRegistered,rd.dateUnregistered,pt.transmitNo from registrationDetails rd,patientRecord pr,phicTransmit pt where pr.patientNo = rd.patientNo and (rd.dateUnregistered between '$dateDischarged' and '$dateDischarged1') and pr.phicType like '$type%' and pt.reconciled != 'yes' and pt.registrationNo = rd.registrationNo group by pt.registrationNo order by pr.lastName asc ");
}

$this->coconutFormStart("get","reconcile.php");

echo "<br>";
echo "<center>";
echo "Date Reconcile&nbsp;";
$this->coconutComboBoxStart_short("month");
echo "<option value='".date("m")."'>".date("M")."</option>";
echo "<option value='01'>Jan</option>";
echo "<option value='02'>Feb</option>";
echo "<option value='03'>Mar</option>";
echo "<option value='04'>Apr</option>";
echo "<option value='05'>May</option>";
echo "<option value='06'>Jun</option>";
echo "<option value='07'>Jul</option>";
echo "<option value='08'>Aug</option>";
echo "<option value='09'>Sep</option>";
echo "<option value='10'>Oct</option>";
echo "<option value='11'>Nov</option>";
echo "<option value='12'>Dec</option>";
$this->coconutComboBoxStop();
echo "-";
$this->coconutComboBoxStart_short("day");

for( $x=1;$x<32;$x++ ) {
echo "<option value='".date("d")."'>".date("d")."</option>";
if( $x < 10 ) {
echo "<option value='0$x'>0$x</option>";
}else {
echo "<option value='$x'>$x</option>";
}

}
$this->coconutComboBoxStop();

echo "-";

$this->coconutTextBox_short("year",date("Y"));
echo "<center>";


echo "<br>";
echo "<center>";
echo "Checked No.";
$this->coconutTextBox("checkedNo","");
echo "</centeR>";
echo "<br>";

while($row = mysql_fetch_array($result))
  {
echo "<tr>";
echo "<td><font size=3>".$row['PIN']."</font></tD>"; // header [ PHIC NUMBER ]
echo "<Td><font size=3>".$row['lastName'].", ".$row['firstName']."</font></td>"; // header [ NAME/RELATIONSHIP ] 
echo "<td><input type='checkbox' name='registrationNo[]' value='$row[registrationNo]'></tD>";
echo "</tr>";
}
echo "<center>";
$this->coconutButton("Reconcile");
echo "</center>";
$this->coconutFormStop();


}


/**********************TRANSMITAL RECONCILE*******************************/




public function getReconciled($month,$day,$year) { 

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$date = $month."_".$day."_".$year;
$result = mysql_query("SELECT pt.checkedNo,rd.registrationNo,pr.lastName,pr.firstName,pr.middleName from patientRecord pr,registrationDetails rd,phicTransmit pt where pr.patientNo = rd.patientNo and rd.registrationNo = pt.registrationNo and pt.date = '$date' order by pr.lastName asc ");

echo "<center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Reg#");
$this->coconutTableHeader("Patient");
$this->coconutTableHeader("Checked#");
$this->coconutTableHeader("");
$this->coconutTableRowStop();
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData($row['registrationNo']);
$this->coconutTableData($row['lastName'].", ".$row['firstName']);
$this->coconutTableData($row['checkedNo']);
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/SOAoption/summary.php?registrationNo=$row[registrationNo]' target='_blank'><font size=2 color=red>View S.O.A</font></a>");
$this->coconutTableRowStop();
}
$this->coconutTableStop();


}




public function addVoucher_acct($voucherNo,$checkedNo,$paymentMode,$description,$amount,$payee,$date,$time,$accountTitle,$user) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO vouchers (voucherNo,checkedNo,paymentMode,description,amount,payee,date,time,accountTitle,user)
VALUES
('".mysql_real_escape_string($voucherNo)."','".mysql_real_escape_string($checkedNo)."','".mysql_real_escape_string($paymentMode)."','".mysql_real_escape_string($description)."','".mysql_real_escape_string($amount)."','".mysql_real_escape_string($payee)."','".mysql_real_escape_string($date)."','".mysql_real_escape_string($time)."','".mysql_real_escape_string($accountTitle)."','".mysql_real_escape_string($user)."')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

echo "<script type='text/javascript' >";
echo "alert('Voucher Added');";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/accounting/voucher/addVoucher_acct.php?username=$user'";
echo "</script>";

mysql_close($con);

}






/************NUMBER TO WORDS****************************/


public function convert_number_to_words($number) {
   
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Forty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Qintillion'
    );
   
    if (!is_numeric($number)) {
        return false;
    }
   
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
   
    $string = $fraction = null;
   
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
   
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . $this->convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= $this->convert_number_to_words($remainder);
            }
            break;
    }
   
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
   
    return $string;
}


/************NUMBER TO WORDS*****************************/








public function listVoucher($checkedNo) { 

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

if( $checkedNo == "" ) {
$result = mysql_query("SELECT controlNo,checkedNo,date,payee from vouchers limit 0,0 ");
}else if( $checkedNo == "all" ) {
$result = mysql_query("SELECT controlNo,checkedNo,date,payee from vouchers order by checkedNo asc ");
}else {
$result = mysql_query("SELECT controlNo,checkedNo,date,payee from vouchers WHERE checkedNo like '$checkedNo%%%%%' order by checkedNo asc ");
}

echo "<center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Check No#");
$this->coconutTableHeader("Date");
$this->coconutTableHeader("Payee");
$this->coconutTableHeader("");
$this->coconutTableHeader("");
$this->coconutTableRowStop();
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/accounting/voucher/printableVoucher.php?checkedNo=$row[checkedNo]' target='_blank'>".$row['checkedNo']."</a>");
$this->coconutTableData($row['payee']);
$this->coconutTableData($row['date']);
$this->coconutTableData(" <a href='http://".$this->getMyUrl()."/COCONUT/accounting/voucher/editVoucher.php?controlNo=$row[controlNo]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a> ");
$this->coconutTableData(" <a href='http://".$this->getMyUrl()."/COCONUT/accounting/voucher/deleteVoucher.php?controlNo=$row[controlNo]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a> ");
$this->coconutTableRowStop();
}
$this->coconutTableStop();


}











public function phic_reconcillation_acct($month,$day,$year,$month1,$day1,$year1,$type) { 

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$date = $month."_".$day."_".$year;
$date1 = $month1."_".$day1."_".$year1;

if( $type == "All" ) {
$result = mysql_query("SELECT pr.lastName,pr.firstName,rd.registrationNo,rd.dateUnregistered FROM registrationDetails rd,patientCharges pc,patientRecord pr WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and (rd.dateUnregistered between '$date' and '$date1') group by rd.registrationNo order by pr.lastName asc ");
}else {
$result = mysql_query("SELECT pr.lastName,pr.firstName,rd.registrationNo,rd.dateUnregistered FROM registrationDetails rd,patientCharges pc,patientRecord pr WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and (rd.dateUnregistered between '$date' and '$date1') and rd.type = '$type' group by rd.registrationNo order by pr.lastName asc ");
}

echo "<center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Discharged");
$this->coconutTableHeader("Patient");
$this->coconutTableHeader("Amount");
$this->coconutTableHeader("Ref#");
$this->coconutTableHeader("Date");
$this->coconutTableHeader("Remarks");
$this->coconutTableHeader("");
$this->coconutTableHeader("");
$this->coconutTableRowStop();
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData($row['dateUnregistered']);
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/philhealth/reconciled/reconcileDetails.php?registrationNo=$row[registrationNo]' target='_blank'>".$row['lastName'].", ".$row['firstName']."</a>");
echo "<Td>&nbsp;".$this->selectNow("phicReconcile","amount","registrationNo",$row['registrationNo'])."</tD>";
echo "<Td>&nbsp;".$this->selectNow("phicReconcile","refno","registrationNo",$row['registrationNo'])."</tD>";
echo "<Td>&nbsp;".$this->selectNow("phicReconcile","date","registrationNo",$row['registrationNo'])."</tD>";
echo "<Td>&nbsp;".$this->selectNow("phicReconcile","remarks","registrationNo",$row['registrationNo'])."</tD>";
$this->coconutTableData(" <a href='http://".$this->getMyUrl()."/COCONUT/philhealth/reconciled/reconcileDetails_edit.php?reconcileNo=".$this->selectNow("phicReconcile","reconcileNo","registrationNo",$row['registrationNo'])."&registrationNo=$row[registrationNo]' target='_blank'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a> ");
$this->coconutTableData(" <a href='http://".$this->getMyUrl()."/COCONUT/philhealth/reconciled/reconcileDetails_delete.php?reconcileNo=".$this->selectNow("phicReconcile","reconcileNo","registrationNo",$row['registrationNo'])."&registrationNo=$row[registrationNo]' target='_blank'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a> ");
$this->coconutTableRowStop();
}
$this->coconutTableStop();


}








public function phicReconcile($registrationNo,$refno,$amount,$remarks,$date) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO phicReconcile (registrationNo,refno,amount,remarks,date)
VALUES
('$registrationNo','$refno','$amount','$remarks','$date')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


/*
echo "<script type='text/javascript' >";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/patientProfile/patientProfile_handler.php?username=$paidBy&registrationNo=$registrationNo '";
echo "</script>";
*/
mysql_close($con);

}




public function monthlyCashCollection($title,$date,$date1) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(amount) as amountCols FROM cashCollection WHERE title = '$title' and ( date between '$date' and '$date1' ) ");

while($row = mysql_fetch_array($result))
  {
return $row['amountCols'];
  }

}



public $getMonthlySalesReport_laboratoryz;
public $getMonthlySalesReport_radiology;
public $getMonthlySalesReport_ecg;
public $getMonthlySalesReport_medicine;
public $getMonthlySalesReport_supplies;
public $getMonthlySalesReport_miscellaneous;
public $getMonthlySalesReport_nursingCharges;
public $getMonthlySalesReport_room;
public $getMonthlySalesReport_nbs;
public $getMonthlySalesReport_2decho;
public $getMonthlySalesReport_bloodBank;
public $getMonthlySalesReport_cardiac;
public $getMonthlySalesReport_dialysis;
public $getMonthlySalesReport_oxygen;
public $getMonthlySalesReport_rehab;
public $getMonthlySalesReport_rFee;
public $getMonthlySalesReport_others;
public $getMonthlySalesReport_pulseOximeter;
public $getMonthlySalesReport_overtime;
public $getMonthlySalesReport_emergencyFee;
public $getMonthlySalesReport_hps;
public $getMonthlySalesReport_additionalCharges;
public $getMonthlySalesReport_ventilator;
public $getMonthlySalesReport_yagLaser;
public $getMonthlySalesReport_generator;
public $getMonthlySalesReport_totalPerPx;
public $getMonthlySalesReport_totalAllPx;

public function monthlySalesReport($month,$day,$year,$month1,$day1,$year1,$type,$paidVia) {


echo "

<script type='text/javascript' src='http://".$this->getMyUrl()."/jquery.js'></script>
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

</style>";


$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$date = $year."-".$month."-".$day;
$date1 = $year1."-".$month1."-".$day1;

$result = mysql_query("SELECT pr.lastName,pr.firstName,rd.registrationNo,rd.dateUnregistered FROM patientRecord pr,registrationDetails rd WHERE pr.patientNo = rd.patientNo and (dateUnregistered between '$date' and '$date1') and rd.type='$type' order by rd.dateUnregistered,pr.lastName asc ");

?>

<script type="text/javascript">
$(function(){	   


	$("#exportToExcel").click(function() {									   
		var data='<table>'+$("#ReportTable").html().replace(/<a\/?[^>]+>/gi, '')+'</table>';
		$('body').prepend("<form method='post' action='/export-to-excel/exporttoexcel.php' style='display:none' id='ReportTableData'><input type='text' name='tableData' value='"+data+"' ></form>");
		 $('#ReportTableData').submit().remove();
		 return false;
	});

});
</script>
<a href="#" id="exportToExcel">Export</a>
<?
//echo "<a href='#' id='exportToExcel'>Export to Excel</a>";
echo "<Table border=1 cellpadding=0 rules=all cellspacing=0 id='ReportTable' >";
$this->coconutTableRowStart();
echo "<th>Discharged</th>";
echo "<th>Patient</th>";
echo "<th>Laboratory</th>";
echo "<th>Radiology</th>";
echo "<th>ECG</th>";
echo "<th>Medicine</th>";
echo "<th>Supplies</th>";
echo "<th>Miscellaneous</th>";
echo "<th>Nursing Care</th>";
echo "<th>Room</th>";
echo "<th>NBS</th>";
echo "<th>2D ECHO</th>";
echo "<th>BloodBank</th>";
echo "<th>Cardiac</th>";
echo "<th>Dialysis</th>";
echo "<th>Oxygen</th>";
echo "<th>Rehab</th>";
echo "<th>OR/DR/ER Fee</th>";
echo "<th>Others</th>";
echo "<th>Pulse Oximeter</th>";
echo "<th>Overtime</th>";
echo "<th>Emergency Fee</th>";
echo "<th>HPS</th>";
echo "<th>Additional-Charges</th>";
echo "<th>Ventilator</th>";
echo "<th>Yag Laser</th>";
echo "<th>Generator</th>";
echo "<th>TOTAL</th>";
$this->coconutTableRowStop();
while($row = mysql_fetch_array($result))
  {

$this->getMonthlySalesReport_laboratoryz += $this->getTotal($paidVia,"LABORATORY",$row['registrationNo']);
$this->getMonthlySalesReport_radiology += $this->getTotal($paidVia,"RADIOLOGY",$row['registrationNo']);
$this->getMonthlySalesReport_ecg += $this->getTotal($paidVia,"ECG",$row['registrationNo']);
$this->getMonthlySalesReport_medicine += $this->getTotal($paidVia,"MEDICINE",$row['registrationNo']);
$this->getMonthlySalesReport_supplies += $this->getTotal($paidVia,"SUPPLIES",$row['registrationNo']);
$this->getMonthlySalesReport_miscellaneous += $this->getTotal($paidVia,"MISCELLANEOUS",$row['registrationNo']);
$this->getMonthlySalesReport_nursingCharges += $this->getTotal($paidVia,"NURSING-CHARGES",$row['registrationNo']);
$this->getMonthlySalesReport_room += $this->getTotal($paidVia,"Room And Board",$row['registrationNo']);
$this->getMonthlySalesReport_nbs += $this->getTotal($paidVia,"NBS",$row['registrationNo']);
$this->getMonthlySalesReport_2decho += $this->getTotal($paidVia,"2D_ECHO",$row['registrationNo']);
$this->getMonthlySalesReport_bloodBank += $this->getTotal($paidVia,"BLOODBANK",$row['registrationNo']);
$this->getMonthlySalesReport_cardiac += $this->getTotal($paidVia,"CARDIAC",$row['registrationNo']);
$this->getMonthlySalesReport_dialysis += $this->getTotal($paidVia,"DIALYSIS",$row['registrationNo']);
$this->getMonthlySalesReport_oxygen += $this->getTotal($paidVia,"OXYGEN",$row['registrationNo']);
$this->getMonthlySalesReport_rehab += $this->getTotal($paidVia,"REHAB",$row['registrationNo']);
$this->getMonthlySalesReport_rFee += $this->getTotal($paidVia,"OR/DR/ER Fee",$row['registrationNo']);
$this->getMonthlySalesReport_others += $this->getTotal($paidVia,"OTHERS",$row['registrationNo']);
$this->getMonthlySalesReport_pulseOximeter += $this->getTotal($paidVia,"PULSE_OXIMETER",$row['registrationNo']);
$this->getMonthlySalesReport_overtime += $this->getTotal($paidVia,"OVERTIME",$row['registrationNo']);
$this->getMonthlySalesReport_emergencyFee += $this->getTotal($paidVia,"EMERGENCY FEE",$row['registrationNo']);
$this->getMonthlySalesReport_hps += $this->getTotal($paidVia,"HPS",$row['registrationNo']);
$this->getMonthlySalesReport_additionalCharges += $this->getTotal($paidVia,"ADDITIONAL-CHARGES",$row['registrationNo']);
$this->getMonthlySalesReport_ventilator += $this->getTotal($paidVia,"VENTILATOR",$row['registrationNo']);
$this->getMonthlySalesReport_yagLaser += $this->getTotal($paidVia,"YAG_LASER",$row['registrationNo']);
$this->getMonthlySalesReport_generator += $this->getTotal($paidVia,"GENERATOR_CHARGE",$row['registrationNo']);

$this->getMonthlySalesReport_totalPerPx = ( 

$this->getMonthlySalesReport_laboratoryz +
$this->getMonthlySalesReport_radiology +
$this->getMonthlySalesReport_ecg +
$this->getMonthlySalesReport_medicine +
$this->getMonthlySalesReport_supplies +
$this->getMonthlySalesReport_miscellaneous +
$this->getMonthlySalesReport_nursingCharges +
$this->getMonthlySalesReport_room +
$this->getMonthlySalesReport_nbs +
$this->getMonthlySalesReport_2decho +
$this->getMonthlySalesReport_bloodBank +
$this->getMonthlySalesReport_cardiac +
$this->getMonthlySalesReport_dialysis +
$this->getMonthlySalesReport_oxygen +
$this->getMonthlySalesReport_rehab +
$this->getMonthlySalesReport_rFee +
$this->getMonthlySalesReport_others +
$this->getMonthlySalesReport_pulseOximeter +
$this->getMonthlySalesReport_overtime +
$this->getMonthlySalesReport_emergencyFee +
$this->getMonthlySalesReport_hps +
$this->getMonthlySalesReport_additionalCharges +
$this->getMonthlySalesReport_ventilator +
$this->getMonthlySalesReport_yagLaser +
$this->getMonthlySalesReport_generator

  );


$this->getMonthlySalesReport_totalAllPx += ( 

$this->getTotal($paidVia,"LABORATORY",$row['registrationNo']) +
$this->getTotal($paidVia,"RADIOLOGY",$row['registrationNo']) +
$this->getTotal($paidVia,"ECG",$row['registrationNo']) +
$this->getTotal($paidVia,"MEDICINE",$row['registrationNo']) +
$this->getTotal($paidVia,"SUPPLIES",$row['registrationNo']) +
$this->getTotal($paidVia,"MISCELLANEOUS",$row['registrationNo']) + 
$this->getTotal($paidVia,"NURSING-CHARGES",$row['registrationNo']) +
$this->getTotal($paidVia,"Room And Board",$row['registrationNo']) +
$this->getTotal($paidVia,"NBS",$row['registrationNo']) +
$this->getTotal($paidVia,"2D_ECHO",$row['registrationNo']) +
$this->getTotal($paidVia,"BLOODBANK",$row['registrationNo']) +
$this->getTotal($paidVia,"CARDIAC",$row['registrationNo']) +
$this->getTotal($paidVia,"DIALYSIS",$row['registrationNo']) +
$this->getTotal($paidVia,"OXYGEN",$row['registrationNo']) +
$this->getTotal($paidVia,"REHAB",$row['registrationNo']) +
$this->getTotal($paidVia,"OR/DR/ER Fee",$row['registrationNo']) +
$this->getTotal($paidVia,"OTHERS",$row['registrationNo']) +
$this->getTotal($paidVia,"PULSE_OXIMETER",$row['registrationNo']) +
$this->getTotal($paidVia,"OVERTIME",$row['registrationNo']) +
$this->getTotal($paidVia,"EMERGENCY FEE",$row['registrationNo']) +
$this->getTotal($paidVia,"HPS",$row['registrationNo']) +
$this->getTotal($paidVia,"ADDITIONAL-CHARGES",$row['registrationNo']) +
$this->getTotal($paidVia,"VENTILATOR",$row['registrationNo']) +
$this->getTotal($paidVia,"YAG_LASER",$row['registrationNo']) +
$this->getTotal($paidVia,"GENERATOR_CHARGE",$row['registrationNo']) 
  ) ;


$this->coconutTableRowStart();
$this->coconutTableData("&nbsp;".$row['dateUnregistered']);
$this->coconutTableData($row['lastName'].", ".$row['firstName']);
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"LABORATORY",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"RADIOLOGY",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"ECG",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"MEDICINE",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"SUPPLIES",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"MISCELLANEOUS",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"NURSING-CHARGES",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"Room And Board",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"NBS",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"2D_ECHO",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"BLOODBANK",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"CARDIAC",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"DIALYSIS",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"OXYGEN",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"REHAB",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"OR/DR/ER Fee",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"OTHERS",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"PULSE_OXIMETER",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"OVERTIME",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"EMERGENCY FEE",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"HPS",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"ADDITIONAL-CHARGES",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"VENTILATOR",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"YAG_LASER",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;".number_format($this->getTotal($paidVia,"GENERATOR_CHARGE",$row['registrationNo']),2));
$this->coconutTableData("&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/SOAoption/summary.php?registrationNo=$row[registrationNo]' target='_blank'>".number_format( ( 

$this->getTotal($paidVia,"LABORATORY",$row['registrationNo']) +
$this->getTotal($paidVia,"RADIOLOGY",$row['registrationNo']) +
$this->getTotal($paidVia,"ECG",$row['registrationNo']) +
$this->getTotal($paidVia,"MEDICINE",$row['registrationNo']) +
$this->getTotal($paidVia,"SUPPLIES",$row['registrationNo']) +
$this->getTotal($paidVia,"MISCELLANEOUS",$row['registrationNo']) + 
$this->getTotal($paidVia,"NURSING-CHARGES",$row['registrationNo']) +
$this->getTotal($paidVia,"Room And Board",$row['registrationNo']) +
$this->getTotal($paidVia,"NBS",$row['registrationNo']) +
$this->getTotal($paidVia,"2D_ECHO",$row['registrationNo']) +
$this->getTotal($paidVia,"BLOODBANK",$row['registrationNo']) +
$this->getTotal($paidVia,"CARDIAC",$row['registrationNo']) +
$this->getTotal($paidVia,"DIALYSIS",$row['registrationNo']) +
$this->getTotal($paidVia,"OXYGEN",$row['registrationNo']) +
$this->getTotal($paidVia,"REHAB",$row['registrationNo']) +
$this->getTotal($paidVia,"OR/DR/ER Fee",$row['registrationNo']) +
$this->getTotal($paidVia,"OTHERS",$row['registrationNo']) +
$this->getTotal($paidVia,"PULSE_OXIMETER",$row['registrationNo']) +
$this->getTotal($paidVia,"OVERTIME",$row['registrationNo']) +
$this->getTotal($paidVia,"EMERGENCY FEE",$row['registrationNo']) +
$this->getTotal($paidVia,"HPS",$row['registrationNo']) +
$this->getTotal($paidVia,"ADDITIONAL-CHARGES",$row['registrationNo']) +
$this->getTotal($paidVia,"VENTILATOR",$row['registrationNo']) +
$this->getTotal($paidVia,"YAG_LASER",$row['registrationNo']) + 
$this->getTotal($paidVia,"GENERATOR_CHARGE",$row['registrationNo']) 
  ) ,2)."</a>");
$this->coconutTableRowStop();
  }
$this->coconutTableRowStart();
$this->coconutTableData("&nbsp;");
$this->coconutTableData("&nbsp;<b>TOTAL</b>");
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_laboratoryz),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_radiology),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_ecg),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_medicine),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_supplies),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_miscellaneous),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_nursingCharges),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_room),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_nbs),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_2decho),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_bloodBank),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_cardiac),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_dialysis),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_oxygen),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_rehab),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_rFee),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_others),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_pulseOximeter),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_overtime),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_emergencyFee),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_hps),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_additionalCharges),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_ventilator),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_yagLaser),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_generator),2);
$this->coconutTableData("&nbsp;".number_format($this->getMonthlySalesReport_totalAllPx,2));
$this->coconutTableRowStop();
$this->coconutTableStop();

}






public $getOPD_title_total;

public function getOPD_title($month,$day,$year,$title,$user) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);
$datez = $year."-".$month."-".$day;
$result = mysql_query("SELECT pr.lastName,pr.firstName,pc.description,pc.datePaid,pc.control_datePaid,pc.cashPaid FROM patientRecord pr,registrationDetails rd,patientCharges pc WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and (rd.type='OPD' or rd.type='DIALYSIS') and pc.title = '$title' and pc.control_datePaid = '$datez' and paidBy = '$user' order by lastName asc  ");
echo "<center>";

echo "<font face='Arial' size='3' color='black'><b>CASH COLLECTION REPORT (OPD)</b></font><br />";
echo "<font face='Arial' size='3' color='black'><b>".strtoupper($title)."</b></font><br />";
echo "<font face='Arial' size='2' color='black'>".date("M d, Y",strtotime($datez))."</font><br /><br />";

$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Patient");
$this->coconutTableHeader("Particulars");
$this->coconutTableHeader("Paid");
$this->coconutTableRowStop();
while($row = mysql_fetch_array($result))
  {
$this->getOPD_title_total += $row['cashPaid'];
$this->coconutTableRowStart();
$this->coconutTableData($row['lastName'].", ".$row['firstName']);
$this->coconutTableData($row['description']);
$this->coconutTableData(number_format($row['cashPaid'],2));
$this->coconutTableRowStop();
}
$this->coconutTableRowStart();
$this->coconutTableData("<b>TOTAL</b>");
$this->coconutTableData("&nbsp;");
$this->coconutTableData("&nbsp;".number_format($this->getOPD_title_total,2));
$this->coconutTableRowStop();
$this->coconutTableStop();

echo "</center>";

}







public function insertGeneratorLog($dateStart,$timeStart,$dateStop,$timeStop,$status,$user) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO generatorCharge (dateStart,timeStart,dateStop,timeStop,status,user)
VALUES
('$dateStart','$timeStart','$dateStop','$timeStop','$status','$user')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


/*
echo "<script type='text/javascript' >";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/patientProfile/patientProfile_handler.php?username=$paidBy&registrationNo=$registrationNo '";
echo "</script>";
*/
mysql_close($con);

}



public function insertGeneratorLog_new($dateStart,$timeStart,$dateStop,$timeStop,$status,$user,$hrs) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO generatorCharge (dateStart,timeStart,dateStop,timeStop,status,user,hours)
VALUES
('$dateStart','$timeStart','$dateStop','$timeStop','$status','$user','$hrs')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


/*
echo "<script type='text/javascript' >";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/patientProfile/patientProfile_handler.php?username=$paidBy&registrationNo=$registrationNo '";
echo "</script>";
*/
mysql_close($con);

}




public $checkGenerator_total;
public function checkGenerator($month,$day,$year,$month1,$day1,$year1,$registrationNo,$username) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);
$date = $year."-".$month."-".$day;
$date1 = $year1."-".$month1."-".$day1;
$result = mysql_query("SELECT * from generatorCharge WHERE (dateStart between '$date' and '$date1' )  ");

echo "<Br><Br><br><Center>";
$this->coconutFormStart("get","http://".$this->getMyUrl()."/COCONUT/systemBiller/generatorCharge/addGeneratorCharges.php");
$this->coconutHidden("registrationNo",$registrationNo);
$this->coconutHidden("username",$username);
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("");
$this->coconutTableHeader("Date");
$this->coconutTableHeader("Mins");
$this->coconutTableRowStop();
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->checkGenerator_total += $row['hours'];
$this->coconutTableData("<input type=checkbox name='chargeNo[]' value='$row[chargeNo]' checked>");
$this->coconutTableData($row['dateStart']);
$this->coconutTableData($row['hours']);
$this->coconutTableRowStop();
}
$this->coconutTableRowStart();
$this->coconutTableData("");
$this->coconutTableData("<b>TOTAL</b>");
$this->coconutTableData("".$this->checkGenerator_total);
$this->coconutTableRowStop();
$this->coconutTableStop();
echo "<Br>";
$this->coconutButton("Proceed");
$this->coconutFormStop();

}



public function showGeneratorList($month,$day,$year,$username) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);
$date = $year."-".$month."-".$day;
$result = mysql_query("SELECT dateStart,timeStart,chargeNo from generatorCharge WHERE dateStart  = '$date' ");

echo "<Br><Br><br><Center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("");
$this->coconutTableHeader("Date");
$this->coconutTableHeader("Time Start");
$this->coconutTableRowStop();
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/systemBiller/generatorCharge/generatorSummary1.php?chargeNo=$row[chargeNo]&username=ricky' style='text-decoration:none; color:red;'>View</a>");
$this->coconutTableData($row['dateStart']);
$this->coconutTableData($row['timeStart']);
$this->coconutTableRowStop();
}
$this->coconutTableRowStart();
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableRowStop();
$this->coconutTableStop();
echo "<Br>";

}





public function addOrder($description,$sellingPrice,$unitCost,$batchNo,$dateOrder,$username,$qty,$supplier) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO orderForm (description,sellingPrice,unitcost,batchNo,dateOrder,orderBy,qty,supplier)
VALUES
('$description','$sellingPrice','$unitCost','$batchNo','$dateOrder','$username','$qty','$supplier')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


/*
echo "<script type='text/javascript' >";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/patientProfile/patientProfile_handler.php?username=$paidBy&registrationNo=$registrationNo '";
echo "</script>";
*/
mysql_close($con);

}



public function listRadioResult($m,$d,$y) {

echo "<style type='text/css'>

a {
text-decoration:none;
}

</style>";


$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$datez = $m."_".$d."_".$y;

$result = mysql_query("SELECT rsr.refer,rsr.radioSavedNo,pr.lastName,pr.firstName,pc.description,rsr.time,rsr.itemNo,rsr.registrationNo from patientRecord pr,registrationDetails rd,patientCharges pc,radioSavedReport rsr where pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and pc.itemNo = rsr.itemNo and rsr.date = '$datez'  ");

while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();

if( $row['refer'] != "" ) {
$this->coconutTableData("&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Laboratory/testDone/referredUser_radio.php?radioSavedNo=$row[radioSavedNo]'><font size=2 color=blue>".$row['lastName'].", ".$row['firstName']."</font></a><br><font size=1 color=red>(Referred)</font>");
}else {
$this->coconutTableData("&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Laboratory/testDone/referredUser_radio.php?radioSavedNo=$row[radioSavedNo]'><font size=2 color=blue>".$row['lastName'].", ".$row['firstName']."</font></a>");
}
$this->coconutTableData("&nbsp;<font size=2 color=black>".$row['description']."</font>");
$this->coconutTableData("&nbsp;<font size=2 color=black>".$row['time']."</font>");
$this->coconutTableData("&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Reports/radiologyReport/radioReport_output.php?itemNo=$row[itemNo]&registrationNo=$row[registrationNo]&description=$row[description]' target='_blank'><font size=2 color=red>View</font></a>");
$this->coconutTableRowStop();
  }

}



public function listLaboratory_done_search($month,$day,$year,$name) {

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

</style>";

$date = $month."_".$day."_".$year;


$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT lsr.referred,lsr.savedNo,lsr.registrationNo,lsr.itemNo,lsr.chargesCode,lsr.medtech,lsr.date,lsr.time FROM labSavedResult lsr,patientRecord pr,registrationDetails rd,patientCharges pc WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and pc.itemNo = lsr.itemNo and lsr.date = '$date' and pr.completeName like '".mysql_real_escape_string($name)."%%%%%' order by lsr.time desc ");
//echo "<table border=1 cellspacing=0 rules=all>";
//echo "<tr>";
//echo "<Th>Patient</th>";
//echo "<Th>Result</th>";
//echo "<th>Realesed</th>";
//echo "</tr>";
while($row = mysql_fetch_array($result))
  {
$this->getPatientProfile($row['registrationNo']);
echo "<tr>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Laboratory/testDone/referredUser.php?savedNo=$row[savedNo]'><font size=2>".$this->getPatientRecord_lastName().", ".$this->getPatientRecord_firstName()."</font></a></td>";

if($row['referred'] != "") {
echo "<td>&nbsp;<font size=2>".$this->selectNow("patientCharges","description","itemNo",$row['itemNo'])."</font><br>&nbsp;<Font size=1 color=red>(Referred)</font></td>";
}else {
echo "<td>&nbsp;<font size=2>".$this->selectNow("patientCharges","description","itemNo",$row['itemNo'])."</font></td>";
}

echo "<td>&nbsp;<font size=2>".$row['time']."</font></td>";
echo "<Td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Laboratory/resultList/resultForm_output.php?registrationNo=$row[registrationNo]&itemNo=$row[itemNo]' target='_blank'><font size=2 color=red>View</font></a>&nbsp;</td>";
echo "</tr>";

  }
//echo "</table>";

}




public function searchRadioResult($m,$d,$y,$name) {

echo "<style type='text/css'>

a {
text-decoration:none;
}

</style>";


$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$datez = $m."_".$d."_".$y;

$result = mysql_query("SELECT pr.lastName,pr.firstName,pc.description,rsr.time,rsr.itemNo,rsr.registrationNo from patientRecord pr,registrationDetails rd,patientCharges pc,radioSavedReport rsr where pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and pc.itemNo = rsr.itemNo and rsr.date = '$datez' and pr.lastName like '".mysql_real_escape_string($name)."%%%%%%%%'  ");

while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData("&nbsp;<font size=2 color=blue>".$row['lastName'].", ".$row['firstName']."</font>");
$this->coconutTableData("&nbsp;<font size=2 color=black>".$row['description']."</font>");
$this->coconutTableData("&nbsp;<font size=2 color=black>".$row['time']."</font>");
$this->coconutTableData("&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Reports/radiologyReport/radioReport_output.php?itemNo=$row[itemNo]&registrationNo=$row[registrationNo]&description=$row[description]' target='_blank'><font size=2 color=red>View</font></a>");
$this->coconutTableRowStop();
  }

}



public function searchReOrder($search,$searchType,$batchNo,$username) {

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


if( $searchType == "brand" ) {
$result = mysql_query("SELECT description,genericName,unitcost,Added,supplier from inventory WHERE description like '".$search."%%%%%%%%' and inventoryLocation = 'PHARMACY' ");
}else {
$result = mysql_query("SELECT description,genericName,unitcost,Added,supplier from inventory WHERE genericName like '$search%%%%%%%%' and inventoryLocation = 'PHARMACY' ");
}


echo "<Br><Br>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("<Font size=2>Brand</font>");
$this->coconutTableHeader("<font size=2>Generic</font>");
$this->coconutTableHeader("<font size=2>Unit Cost</font>");
$this->coconutTableHeader("<font size=2>Price</font>");
$this->coconutTableHeader("<font size=2>Supplier</font>");
$this->coconutTableRowStop();
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$sp = preg_split ("/\_/", $row['Added']); 
$this->coconutTableData("&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/availableMedicine/reOrder/reOrder_qty.php?description=$row[description]&genericName=$row[genericName]&unitcost=$row[unitcost]&sp=$sp[1]&supplier=$row[supplier]&batchNo=$batchNo&username=$username' style='text-decoration:none; color:black;'><font size=2>".$row['description']."</font></a>&nbsp;");
$this->coconutTableData("&nbsp;<font size=2>".$row['genericName']."</font>&nbsp;");
$this->coconutTableData("&nbsp;<font size=2>".$row['unitcost']."</font>&nbsp;");
$this->coconutTableData("&nbsp;<font size=2>".number_format($sp[1],2)."</font>&nbsp;");
$this->coconutTableData("&nbsp;<font size=2>".$row['supplier']."</font>&nbsp;");
$this->coconutTableRowStop();
}
$this->coconutTableStop();
echo "<Br>";

}



public function reOrderNo() {
$myFile = $this->getReportInformation("homeRoot")."/COCONUT/trackingNo/reOrder.dat";
$fh = fopen($myFile, 'r');
$theData = fread($fh, 1000);
fclose($fh);

    

$myFile = $this->getReportInformation("homeRoot")."/COCONUT/trackingNo/reOrder.dat";
$fh = fopen($myFile, 'w') or die("can't open file"); 
fwrite($fh, $theData+1);
fclose($fh);
}



/*
public function addOrder($description,$sellingPrice,$unitCost,$batchNo,$dateOrder,$username,$qty,$supplier) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO orderForm (description,sellingPrice,unitcost,batchNo,dateOrder,orderBy,qty,supplier)
VALUES
('$description','$sellingPrice','$unitCost','$batchNo','$dateOrder','$username','$qty','$supplier')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


/*
echo "<script type='text/javascript' >";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/patientProfile/patientProfile_handler.php?username=$paidBy&registrationNo=$registrationNo '";
echo "</script>";
*/
//mysql_close($con);

//}





public function showOrderForm($batchNo) {

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);



$result = mysql_query("SELECT batchNo,orderNo,description,unitcost,supplier,qty FROM orderForm WHERE batchNo = '$batchNo' ");



echo "<Br><Br>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("<Font size=2>Particulars</font>");
$this->coconutTableHeader("<font size=2>QTY</font>");
$this->coconutTableHeader("<font size=2>Unit Cost</font>");
$this->coconutTableHeader("<font size=2>Supplier</font>");
$this->coconutTableRowStop();
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData("&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/availableMedicine/reOrder/delete.php?orderNo=$row[orderNo]&batchNo=$row[batchNo]' style='text-decoration:none; color:black;'>".$row['description']."</a>");
$this->coconutTableData("&nbsp;".$row['qty']);
$this->coconutTableData("&nbsp;".$row['unitcost']);
$this->coconutTableData("&nbsp;".$row['supplier']);
$this->coconutTableRowStop();
}
$this->coconutTableStop();


}




public function radioResult_onPatient($registrationNo,$username) {

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

</style>";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);



$result = mysql_query("SELECT rsr.radioSavedNo,rsr.date,pc.description,rsr.itemNo FROM radioSavedReport rsr,patientCharges pc WHERE pc.registrationNo = '$registrationNo' and pc.registrationNo = rsr.registrationNo and pc.itemNo = rsr.itemNo order by pc.description asc ");



while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData("&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Reports/radiologyReport/radioReport_output.php?itemNo=$row[itemNo]&registrationNo=$registrationNo&description=$row[description]' target='_blank' style='text-decoration:none; color:black;'>".$row['radioSavedNo']."</a>");
$this->coconutTableData("&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Reports/radiologyReport/radioReport_output.php?itemNo=$row[itemNo]&registrationNo=$registrationNo&description=$row[description]' target='_blank' style='text-decoration:none; color:black;'>".$row['description']."</a>");
$this->coconutTableData("&nbsp;".$row['date']);

if( $this->selectNow("registeredUser","module","username",$username) == "RADIOLOGY" ) {
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/DELETE/deleteRadio.php?radioSavedNo=$row[radioSavedNo]&registrationNo=$registrationNo&username=$username'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a>");
}else {
$this->coconutTableData("&nbsp;");
}
$this->coconutTableRowStop();
}



}






public function addBabyNow($mother,$baby) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO nbs (motherRegistrationNo,babyRegistrationNo)
VALUES
('$mother','$baby')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }


/*
echo "<script type='text/javascript' >";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/patientProfile/patientProfile_handler.php?username=$paidBy&registrationNo=$registrationNo '";
echo "</script>";
*/
mysql_close($con);

}






public function getQTY_dispensed($inventoryCode) { 


$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


$result = mysql_query("SELECT sum(quantity) as qtyDispensed from patientCharges WHERE chargesCode = '$inventoryCode' and (title = 'MEDICINE' or title = 'SUPPLIES') and departmentStatus like 'dispensedBy_%%%%%%%%' ");

while($row = mysql_fetch_array($result))
  {
return $row['qtyDispensed'];
}

}




public $laboratoryCensus_count;
public $laboratoryCensus_count_opd;
public $laboratoryCensus_count_ipd;
public $laboratoryCensus_count_undefined;


public function laboratoryCensus($dateFrom,$dateTo,$chargesCode) {


echo "
<style type='text/css'>
tr:hover { background-color:yellow; color:black;}
a { text-decoration:none; color:black; }
</style>";

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      

$this->laboratoryCensus_count=0;

$result = mysqli_query($connection, " select upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,lsr.date,lsr.time,pc.description,rd.type from patientRecord pr 
inner join registrationDetails rd on pr.patientNo=rd.patientNo 
inner join patientCharges pc on rd.registrationNo=pc.registrationNo 
inner join labSavedResult lsr on pc.itemNo = lsr.itemNo
WHERE (lsr.control_date between '$dateFrom' and '$dateTo') and pc.chargesCode = $chargesCode  ") or die("Query fail: " . mysqli_error()); 

echo "<br><br>";
echo "<center>";
echo "<table border=1 cellspacing=0>";
echo "<tr>";
echo "<th><font size=2>Name</font></th>";
echo "<th><font size=2>Type</font></th>";
echo "<th><font size=2>Examination</font></th>";
echo "<th><font size=2>Released</font></th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
echo "<tr>";
if( $row['type'] == "IPD" ) {
$this->laboratoryCensus_count_ipd++;
}else if( $row['type'] == "OPD" ) {
$this->laboratoryCensus_count_opd++;
}else {
$this->laboratoryCensus_count_undefined ++;
}
$this->laboratoryCensus_count++;
echo "<tD>&nbsp;".$row['lastName'].", ".$row['firstName']."</tD>";
echo "<td>&nbsp;".$row['type']."</tD>";
echo "<td>&nbsp;".$row['description']."</tD>";
echo "<td>&nbsp;".$row['time']." @ ".$row['date']."</tD>";
echo "</tr>";
}
echo "<tr>";
echo "<Td>&nbsp;<b>IPD</b></tD>";
echo "<Td>&nbsp;<b>".$this->laboratoryCensus_count_ipd."</b></tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "</tr>";

echo "<tr>";
echo "<Td>&nbsp;<b>OPD</b></tD>";
echo "<Td>&nbsp;<b>".$this->laboratoryCensus_count_opd."</b></tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "</tr>";

echo "<tr>";
echo "<Td>&nbsp;<b>DIALYSIS</b></tD>";
echo "<Td>&nbsp;<b>".$this->laboratoryCensus_count_undefined."</b></tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "</tr>";

echo "<tr>";
echo "<Td>&nbsp;<b>TOTAL</b></tD>";
echo "<Td>&nbsp;<b>".$this->laboratoryCensus_count."</b></tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "</tr>";
echo "</table>";
}




public function showExam() {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT Description,chargesCode FROM availableCharges order by Description asc ");

while($row = mysql_fetch_array($result))
  {
echo "<option value='".$row['chargesCode']."'>".$row['Description']."</option>";
  }

}



public $getBabies_no=1;
public function getBabies($registrationNo) {

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      

$this->laboratoryCensus_count=0;

$result = mysqli_query($connection, "select babyRegistrationNo from nbs where motherRegistrationNo = '$registrationNo' ") or die("Query fail: " . mysqli_error()); 

while($row = mysqli_fetch_array($result))
{
$this->getPatientProfile($row['babyRegistrationNo']);
echo "<font color=red>[".$this->getBabies_no++.".</font>".$this->getPatientRecord_lastName().", ".$this->getPatientRecord_firstName()."<font color=red>]</font>  ";
}

}




/*****************START*****************************/


public function getTotalPF($registrationNo,$columns) {

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      

$this->laboratoryCensus_count=0;

$result = mysqli_query($connection, "select sum($columns) as total from patientCharges where registrationNo='$registrationNo' and title = 'PROFESSIONAL FEE' ") or die("Query fail: " . mysqli_error()); 

while($row = mysqli_fetch_array($result))
{
return $row['total'];
}

}



public function getRoomPHIC_unpaid($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(cashUnpaid) as unpaid from patientCharges where registrationNo = '$registrationNo' and title = 'Room And Board'  ");


while($row = mysql_fetch_array($result))
  {
return $row['unpaid'];

}


}



/*********************END**************/









/******************NEW CF2**************************/

public function getDiagnosisForNewCF2($registrationNo) {

echo "<style type='text/css'>
.diagnosis{
	border: 1px solid #000;
	color: #000;
	height: 28px;
	width: 200px;
	border-color:white white black white;
	font-size:15px;

}

.icd{
	border: 1px solid #000;
	color: #000;
	height: 28px;
	width: 80px;
	border-color:white white black white;
	font-size:15px;

}

.relatedProcedure{
	border: 1px solid #000;
	color: #000;
	height: 28px;
	width: 150px;
	border-color:white white black white;
	font-size:15px;

}


.date{
	border: 1px solid #000;
	color: #000;
	height: 28px;
	width: 130px;
	border-color:white white black white;
	font-size:15px;

}

</style>";

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      

$this->laboratoryCensus_count=0;

$result = mysqli_query($connection, "select icdCode,diagnosis from patientICD where registrationNo='$registrationNo' ") or die("Query fail: " . mysqli_error()); 

echo "<center><table width='840px' border='0px;'>";
echo "<tr>";
echo "<th><font size=2>Diagnosis</font></th>";
echo "<th><font size=1>ICD 10 Code/s</font></th>";
echo "<th><font size=1>Related Procedure/s (is there's any)</font></th>";
echo "<th><font size=1>RVS Code</font></th>";
echo "<th><font size=1>Date of Operation</font></th>";
echo "<th><font size=1>Laterality (check applicable boxes)</font></th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
//echo "<td style='vertical-align:top;'> <input type='text' class='diagnosis' value='$row[diagnosis]'></td>";
echo "<td style='vertical-align:top; width:10%' > <div contenteditable='true' style='border-top:0px; border-left:0px; border-bottom:1px solid #000; font-size:15px;'> $row[diagnosis] </div> </td>";
//echo "<td style='vertical-align:top;'> <input type='text' class='icd' value='$row[icdCode]'> </td>";
echo "<td style='vertical-align:top;'><div contenteditable='true' style='border-top:0px; border-left:0px; border-bottom:1px solid #000;'> $row[icdCode] </div> </td>";
echo "<td> <font size=2>i.</font><input type='text' class='relatedProcedure'>
<br>
<font size=2>ii.</font><input type='text' class='relatedProcedure'>
<br>
<font size=2>iii.</font> <input type='text' class='relatedProcedure'>
<br>
<font size=2>iv.</font><input type='text' class='relatedProcedure'>
</td>";
echo "<td style='vertical-align:top;'> <input type='text' class='icd' > </td>";
echo "<td style='vertical-align:top;'> <input type='text' class='date' > </td>";
echo "<td style='vertical-align:top;'> <input type='checkbox'><font size=1>Left</font>
<input type='checkbox'><font size=1>Right</font>
<input type='checkbox'><font size=1>Both</font> </td>
</tr>";
}
echo "</table></center>";
}




public function getChargesAndPFinNewCF2($registrationNo) {

echo "
<style type='text/css'>
.box{
	border: 1px solid #000;
	color: #000;
	height: 18px;
	width: 20px;
	border-color:white black black black;
	font-size:15px;
	text-align:center;
}

.box1{
	border: 1px solid #000;
	color: #000;
	height: 18px;
	width: 20px;
	border-color:white black black white;
	font-size:15px;
	text-align:center;
}

.signature{
	border: 1px solid #000;
	color: #000;
	height: 28px;
	width: 250px;
	border-color:white white black white;
	font-size:15px;
	text-align:center;
}


.amountz{
	border: 1px solid #000;
	color: #000;
	height: 28px;
	width: 100px;
	border-color:white white black white;
	font-size:15px;
	text-align:center;
}


</style>

";

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      

$this->laboratoryCensus_count=0;

$result = mysqli_query($connection, "select pc.chargesCode,pc.description,pc.phic from patientCharges pc where pc.registrationNo = '$registrationNo' and pc.title = 'PROFESSIONAL FEE' ") or die("Query fail: " . mysqli_error()); 

echo "<table style='width:860px;' border=1px; cellspacing=0px; cellpadding=10px;  >";
echo "<tr>";
echo "<th><font size=2>Accreditation Number/Name of Accredited Health Care Professional/Date Signed</font></th>";
echo "<th><font size=2>Details</font></th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
{


$phicPin0 = substr($this->selectNow("Doctors","PhilHealth_AccreditationNo","doctorCode",$row['chargesCode']),0,1);
$phicPin1 = substr($this->selectNow("Doctors","PhilHealth_AccreditationNo","doctorCode",$row['chargesCode']),1,1);
$phicPin2 = substr($this->selectNow("Doctors","PhilHealth_AccreditationNo","doctorCode",$row['chargesCode']),2,1);
$phicPin3 = substr($this->selectNow("Doctors","PhilHealth_AccreditationNo","doctorCode",$row['chargesCode']),3,1);
//-
$phicPin4 = substr($this->selectNow("Doctors","PhilHealth_AccreditationNo","doctorCode",$row['chargesCode']),5,1);
$phicPin5 = substr($this->selectNow("Doctors","PhilHealth_AccreditationNo","doctorCode",$row['chargesCode']),6,1);
$phicPin6 = substr($this->selectNow("Doctors","PhilHealth_AccreditationNo","doctorCode",$row['chargesCode']),7,1);
$phicPin7 = substr($this->selectNow("Doctors","PhilHealth_AccreditationNo","doctorCode",$row['chargesCode']),8,1);
$phicPin8 = substr($this->selectNow("Doctors","PhilHealth_AccreditationNo","doctorCode",$row['chargesCode']),9,1);
$phicPin9 = substr($this->selectNow("Doctors","PhilHealth_AccreditationNo","doctorCode",$row['chargesCode']),10,1);
$phicPin10 = substr($this->selectNow("Doctors","PhilHealth_AccreditationNo","doctorCode",$row['chargesCode']),11,1);
//-
$phicPin11 = substr($this->selectNow("Doctors","PhilHealth_AccreditationNo","doctorCode",$row['chargesCode']),13,1);

echo "<tr>";
echo "<td width='50%'>";
echo "<center><br><font size=1><b>Accreditation No:</b> <input type='text' class='box' value='$phicPin0'><input type='text' class='box1' value='$phicPin1' ><input type='text' class='box1' value='$phicPin2' ><input type='text' class='box1' value='$phicPin3' >-<input type='text' class='box' value='$phicPin4' ><input type='text' class='box1' value='$phicPin5' ><input type='text' class='box1' value='$phicPin6' ><input type='text' class='box1' value='$phicPin7' ><input type='text' class='box1' value='$phicPin8' ><input type='text' class='box1' value='$phicPin9' ><input type='text' class='box1' value='$phicPin10' >-<input type='text' class='box' value='$phicPin11' >  </font>";
echo "<br><Br>";
echo "<input type='text' class='signature' value='$row[description]'><br><font size=1>Signature Over Printed Name</font><br>";
echo "<br>";
echo "<font size=1>Date Signed:</font> <input type='text' class='box'><input type='text' class='box1'>-<input type='text' class='box'><input type='text' class='box1'>-<input type='text' class='box'><input type='text' class='box1'><input type='text' class='box1'><input type='text' class='box1'>";
echo "</td>";
echo "<td width='120%;'>
<input type='checkbox'><font size=2>No Co-pay on top of PhilHealth Benefit</font>
<Br>
<input type='checkbox'><font size=2>With Co-pay on top of PhilHealth Benefit</font>&nbsp;&nbsp;&nbsp;&nbsp;
<font size=2>Php.</font><input type='text' class='amountz' value='".number_format($row['phic'],2)."'>
</td>";
echo "</tr>";
}
echo "</table>";

}


/*****************NEW CF2**************************/



public function getRoomForDischarged($registrationNo,$username) {

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      


$result = mysqli_query($connection, " select itemNo,description from patientCharges where registrationNo='$registrationNo' and title = 'Room And Board' and status = 'UNPAID' ") or die("Query fail: " . mysqli_error()); 

mysql_connect($this->myHost(),$this->getUser(),$this->getPass());
mysql_select_db($this->getDB());

$asql=mysql_query("select itemNo,description from patientCharges where registrationNo='$registrationNo' and title = 'Room And Board' and status = 'UNPAID' ");
$acount = mysql_num_rows($asql);

if ($acount==0){
$this->coconutFormStart("get","discharge_new1.php");
$this->coconutHidden("registrationNo",$registrationNo);
$this->coconutHidden("username",$username);
$this->coconutHidden("roompresent","no");
echo "<br /><br /><div align='center'>";
$this->coconutButton("Discharged");
echo "</div>";
$this->coconutFormStop();
}
else{

echo "<br><br><Center>";
$this->coconutFormStart("get","discharge_new1.php");
$this->coconutHidden("registrationNo",$registrationNo);
$this->coconutHidden("username",$username);
$this->coconutHidden("roompresent","yes");
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("");
$this->coconutTableHeader("Description");
$this->coconutTableRowStop();
while($row = mysqli_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData("<input type='checkbox' name='itemNo[]' value='$row[itemNo]' checked>");
$this->coconutTableData($row['description']);
$this->coconutTableRowStop();
}
$this->coconutTableStop();
echo "<br><br>";
$this->coconutButton("Discharged");
$this->coconutFormStop();

}
}



public function addDischargedPlan($registrationNo,$dischargedPan) {

/* make your connection */
$sql = new mysqli($this->myHost,$this->username,$this->password,$this->database);
 
/* we will just create an insert query here, and use it,
normally this would be done by form submission or other means */
$query = "insert into dischargedPlan(registrationNo,dischargedPlan) values('$registrationNo','$dischargedPan')";

 
if ( $sql->query($query) ) {
   //echo "A new entry has been added with the `id`";
echo "Added";
} else {
    echo "There was a problem:<br />$query<br />{$sql->error}";
}
 
/* close our connection */
$sql->close();
}





public function getItemizedLaboratory($registrationNo) {

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      

$this->laboratoryCensus_count=0;

$result = mysqli_query($connection, "select description from patientCharges where registrationNo = '$registrationNo' and (title = 'LABORATORY' or title = 'RADIOLOGY') ") or die("Query fail: " . mysqli_error()); 

while($row = mysqli_fetch_array($result))
{
echo "<font size=2>,".$row['description']."&nbsp;</font>";
}

}




public function addMedicoLegal($registrationNo,$dateOfIncidence,$timeOfIncidence,$dateOfExamination,$timeOfExamination,$placeOfExamination,$placeOfExamination1,$nature,$pertinentPhysicalExamination,$dateAdded) {

/* make your connection */
$sql = new mysqli($this->myHost,$this->username,$this->password,$this->database);
 
/* we will just create an insert query here, and use it,
normally this would be done by form submission or other means */
$query = "insert into medicoLegal(registrationNo,dateOfIncidence,timeOfIncidence,dateOfExamination,timeOfExamination,placeOfExamination,placeOfExamination1,nature,pertinentPhysicalExamination,dateAdded) values('$registrationNo','$dateOfIncidence','$timeOfIncidence','$dateOfExamination','$timeOfExamination','$placeOfExamination','$placeOfExamination1','$nature','$pertinentPhysicalExamination','$dateAdded')";

 
if ( $sql->query($query) ) {
   //echo "A new entry has been added with the `id`";
} else {
    echo "There was a problem:<br />$query<br />{$sql->error}";
}
 
/* close our connection */
$sql->close();
}




public function medicoLegalList($registrationNo) {

echo "
<style type='text/css'>
a { text-decoration:none; color:white; }
tr:hover { background-color:yellow;}
</style>";

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      

$result = mysqli_query($connection, " select dateAdded from medicoLegal where registrationNo = '$registrationNo' order by dateAdded asc ") or die("Query fail: " . mysqli_error()); 

$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Date");
$this->coconutTableHeader("&nbsp;");
$this->coconutTableHeader("&nbsp;");
$this->coconutTableRowStop();
while($row = mysqli_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData("&nbsp;".$row['dateAdded']);
$this->coconutTableData("&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/medicoLegal_view.php?registrationNo=$registrationNo' target='patientX' style='text-decoration:none; color:red;'>View</a>");
$this->coconutTableData("&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/medicoLegal_edit.php?registrationNo=$registrationNo' target='patientX' style='text-decoration:none; color:red;'>Edit</a>");
$this->coconutTableRowStop();
}
$this->coconutTableStop();
}




public function getRequestedDept($inventoryCode,$date,$date1) {

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      


$result = mysqli_query($connection, " select description,quantityIssued,requestingDepartment,requestingUser,issuedBy,dateRequested,dateIssued from inventoryManager where inventoryCode = '$inventoryCode' and (dateIssued between '$date' and '$date1') and status = 'Received' ") or die("Query fail: " . mysqli_error()); 

echo "<br><br><Center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Description");
$this->coconutTableHeader("QTY");
$this->coconutTableHeader("Dept");
$this->coconutTableHeader("Requested By");
$this->coconutTableHeader("Issued By");
$this->coconutTableHeader("dateRequested");
$this->coconutTableHeader("dateIssued");
$this->coconutTableRowStop();
while($row = mysqli_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData($row['description']);
$this->coconutTableData($row['quantityIssued']);
$this->coconutTableData($row['requestingDepartment']);
$this->coconutTableData($row['requestingUser']);
$this->coconutTableData($row['issuedBy']);
$this->coconutTableData($row['dateRequested']);
$this->coconutTableData($row['dateIssued']);
$this->coconutTableRowStop();
}
$this->coconutTableStop();
}




public $roomCensus_totalPx_list_total;
public function roomCensus_totalPx_list($room,$date1,$date2) {

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      



$result = mysqli_query($connection, " select pr.lastName,pr.firstName,rd.dateRegistered,rd.dateUnregistered from patientRecord pr,registrationDetails rd where pr.patientNo = rd.patientNo and rd.room = '$room' and (rd.control_dateRegistered between '$date1' and '$date2') and rd.type = 'IPD' order by rd.dateUnregistered asc ") or die("Query fail: " . mysqli_error()); 

$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("#");
$this->coconutTableHeader("Patient");
$this->coconutTableHeader("In");
$this->coconutTableHeader("Out");
$this->coconutTableRowStop();
$this->roomCensus_totalPx_list_total = 1;
while($row = mysqli_fetch_array($result))
{
$this->coconutTableRowStart();
$this->coconutTableData($this->roomCensus_totalPx_list_total++);
$this->coconutTableData(strtoupper($row['lastName']).", ".strtoupper($row['firstName']));
$this->coconutTableData($row['dateRegistered']);
$this->coconutTableData($row['dateUnregistered']);
$this->coconutTableRowStop();
}
$this->coconutTableStop();
}


public function roomCensus_totalPx($room,$date1,$date2) {

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      



$result = mysqli_query($connection, " select count(rd.registrationNo) as totalPx from patientRecord pr,registrationDetails rd where pr.patientNo = rd.patientNo and rd.room = '$room' and (rd.control_dateRegistered between '$date1' and '$date2') and rd.type = 'IPD' ") or die("Query fail: " . mysqli_error()); 

while($row = mysqli_fetch_array($result))
{
return $row['totalPx'];
}

}




public $getCompanyPayment_total;
public $getCompanyPayment_discount;
public $getCompanyPayment_tax;

public function getCompanyPayment_total() {
return $this->getCompanyPayment_total;
}
public function getCompanyPayment_discount() {
return $this->getCompanyPayment_discount;
}
public function getCompanyPayment_tax() {
return $this->getCompanyPayment_tax;
}

public function getCompanyPayment($registrationNo,$company) {

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

.txtSize {
	font-family: 'Times New Roman';
	font-size: 13px;
	color: #000000;
.Arial10Red {font-family: Arial;font-size: 10px;color: #FF0000;}
.Arial10Blue {font-family: Arial;font-size: 10px;color: #0066FF;}
.Arial11White {font-family: Arial;font-size: 11px;color: #FFFFFF;}
.Arial11Black {font-family: Arial;font-size: 11px;color: #000000;}
.Arial11BlackBold {font-family: Arial;font-size: 11px;color: #000000;}
.Arial11BlackBoldNoDeco {font-family: Arial;font-size: 11px;font-weight: bold;color: #000000;}
.Arial14Black {font-family: Arial;font-size: 14px;color: #000000;}
.Arial14BlackBold {font-family: Arial;font-size: 14px;font-weight: bold;color: #000000;}
}

</style>";

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      

//$result = mysqli_query($connection, " SELECT refNo,amountPaid,tax,discount,company,datePaid,postBy,paymentFor,doctor,itemNo from companyPayment where registrationNo = '$registrationNo' and company = '$company' and status not like 'DELETED%%%%%%%%' ") or die("Query fail: " . mysqli_error()); 

$result = mysqli_query($connection, " SELECT refNo,amountPaid,tax,discount,company,datePaid,postBy,paymentFor,doctor,itemNo from companyPayment where registrationNo = '$registrationNo' and status not like 'DELETED%%%%%%%%' ") or die("Query fail: " . mysqli_error()); 

while($row = mysqli_fetch_array($result))
  {

$this->getCompanyPayment_total += $row['amountPaid'];
$this->getCompanyPayment_discount += $row['discount'];
$this->getCompanyPayment_tax += $row['tax'];

echo "<tr>";
if( $row['paymentFor'] == "HOSPITAL BILL" ) {
echo "<td><div align='left'><span class='Arial11BlackBold'>&nbsp;".$row['company']."&nbsp;<br>&nbsp;".$row['paymentFor']."&nbsp;</span><br><span class='Arial10Blue'>&nbsp;REF#".$row['refNo']." w/ tax=$row[tax]&nbsp;</span><br><span class='Arial10Blue'>&nbsp;Disc=$row[discount]&nbsp;</span></div></td>";
}else {
echo "<td><div align='left'><span class='Arial11BlackBold'>&nbsp;".$row['company']."&nbsp;<br>&nbsp;".$row['doctor']."&nbsp;<br>&nbsp;".$row['paymentFor']."&nbsp;</span><br><span class='Arial10Blue'>&nbsp;REF#".$row['refNo']." w/ tax=$row[tax]&nbsp;</span><br><span class='Arial10Blue'>&nbsp;Disc=$row[discount]&nbsp;</span></div></td>";
}

echo "<td></td>";
echo "<td></td>";
echo "<td><div align='right'><span class='Arial11Black'>".number_format(($row['amountPaid']),2)."&nbsp;</span></div></td>";
echo "<td></td>";
echo "</tr>";
}

}




public function summaryCompanyPayment_hospitalBill($registrationNo) {

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      


$result = mysqli_query($connection, " select sum(amountPaid+tax) as paid from companyPayment where registrationNo = '$registrationNo' and paymentFor = 'HOSPITAL BILL' and status not like 'DELETED%%%%%%%%%' ") or die("Query fail: " . mysqli_error()); 

while($row = mysqli_fetch_array($result))
  {

return $row['paid'];

}

}

public function summaryCompany_hospitalBill($registrationNo,$cols) {

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      


$result = mysqli_query($connection, " select sum($cols) as company from patientCharges where registrationNo = '$registrationNo' and status not like 'DELETED%%%%%%%' and title != 'PROFESSIONAL FEE' ") or die("Query fail: " . mysqli_error()); 

while($row = mysqli_fetch_array($result))
  {
return $row['company'];
}

}


public function summaryCompanyPayment_professionalFee($registrationNo,$itemNo) { //payment pf

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      


$result = mysqli_query($connection, " select sum(cp.amountPaid) as paidPF from companyPayment cp,patientCharges pc where cp.registrationNo = '$registrationNo' and pc.registrationNo = '$registrationNo' and pc.itemNo = '$itemNo' and pc.itemNo = cp.itemNo and cp.paymentFor = 'PROFESSIONAL FEE' and cp.status not like 'DELETED%%%%%%%%%' ") or die("Query fail: " . mysqli_error()); 

while($row = mysqli_fetch_array($result))
  {
return $row['paidPF'];
}

}


public function summaryCompany_professionalFee($registrationNo,$itemNo,$cols) { //payables pf

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      


$result = mysqli_query($connection, " select sum($cols) as company from patientCharges where registrationNo = '$registrationNo' and status not like 'DELETED%%%%%%%' and title = 'PROFESSIONAL FEE' and itemNo = '$itemNo' ") or die("Query fail: " . mysqli_error()); 

while($row = mysqli_fetch_array($result))
  {
return $row['company'];
}

}




public function addCompanyPayment($refNo,$checkNo,$registrationNo,$amount,$tax,$discount,$company,$date,$postBy,$paymentFor,$doctor,$itemNo,$companyName,$columnToGet) {

/* make your connection */
$sql = new mysqli($this->myHost,$this->username,$this->password,$this->database);
 
/* we will just create an insert query here, and use it,
normally this would be done by form submission or other means */
$query = "insert into companyPayment(refNo,checkNo,registrationNo,amountPaid,tax,discount,company,datePaid,postBy,dateEncoded,paymentFor,doctor,itemNo,companyName,columnToGet) values('$refNo','$checkNo','$registrationNo','$amount','$tax','$discount','$company','$date','$postBy','".date("Y-m-d")."','$paymentFor','$doctor','$itemNo','$companyName','$columnToGet')";

 
if ( $sql->query($query) ) {
   //echo "A new entry has been added with the `id`";
} else {
    echo "There was a problem:<br />$query<br />{$sql->error}";
}
 
/* close our connection */
$sql->close();
}



public $viewCompanyPayment_total;

public function viewCompanyPayment($registrationNo,$username) {

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

.txtSize1 {
	font-family: 'Arial';
	font-size: 13px;
	color: #FFFFFF;
}

.txtSize2 {
	font-family: 'Arial';
	font-size: 13px;
	color: 000000;
}

</style>";

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      

$result = mysqli_query($connection, " SELECT paymentNo,refNo,checkNo,amountPaid,tax,discount,company,datePaid,postBy,paymentFor,doctor,itemNo,columnToGet from companyPayment where registrationNo = '$registrationNo' and status = '' order by paymentFor,datePaid asc ") or die("Query fail: " . mysqli_error()); 

echo "<br><br><br><center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("<span class='txtSize1'>Ref#</span>");
$this->coconutTableHeader("<span class='txtSize1'>Check#</span>");
$this->coconutTableHeader("<span class='txtSize1'>Payment For</span>");
$this->coconutTableHeader("<span class='txtSize1'>Payables</span>");
$this->coconutTableHeader("<span class='txtSize1'>Amount Paid</span>");
$this->coconutTableHeader("<span class='txtSize1'>Tax</span>");
$this->coconutTableHeader("<span class='txtSize1'>Discount</span>");
$this->coconutTableHeader("<span class='txtSize1'>Balance</span>");
$this->coconutTableHeader("<span class='txtSize1'>Company</span>");
$this->coconutTableHeader("<span class='txtSize1'>Date Paid</span>");
$this->coconutTableHeader("Post By");
$this->coconutTableHeader("");
$this->coconutTableRowStop();
while($row = mysqli_fetch_array($result))
  {

$this->viewCompanyPayment_total += $row['amountPaid'];

echo "<tr>";
$this->coconutTableData("<span class='txtSize2'>".$row['refNo']."</span>");
$this->coconutTableData("<span class='txtSize2'>".$row['checkNo']."</span>");

if( $row['paymentFor'] == "HOSPITAL BILL" ) {
$this->coconutTableData("<span class='txtSize2'>".$row['paymentFor']."</span>");
$this->coconutTableData("&nbsp;<span class='txtSize2'>".number_format($this->summaryCompany_hospitalBill($registrationNo,$row['columnToGet']),2)."</span>");
}else {
$this->coconutTableData("<span class='txtSize2'>".$this->selectNow("patientCharges","description","itemNo",$row['itemNo'])."</span>");
$this->coconutTableData("&nbsp;<span class='txtSize2'>".number_format($this->summaryCompany_professionalFee($registrationNo,$row['itemNo'],$row['columnToGet']),2)."</span>");
}


$this->coconutTableData("<span class='txtSize2'>".number_format($row['amountPaid'],2)."</span>");
$this->coconutTableData("<span class='txtSize2'>".$row['tax']."</span>");
$this->coconutTableData("<span class='txtSize2'>".$row['discount']."</span>");

$val=$row['tax'] + $row['discount'];

if( $row['paymentFor'] == "HOSPITAL BILL" ) {
$this->coconutTableData("&nbsp;<span class='txtSize2'>".number_format((( $this->summaryCompany_hospitalBill($registrationNo,$row['columnToGet']) - $this->summaryCompanyPayment_hospitalBill($registrationNo) )* (-0)),2)."</span>");
}else {
$this->coconutTableData("&nbsp;<span class='txtSize2'>".number_format(( $this->summaryCompany_professionalFee($registrationNo,$row['itemNo'],$row['columnToGet']) - $this->summaryCompanyPayment_professionalFee($registrationNo,$row['itemNo']) ),2)."</span>");
}



$this->coconutTableData("<span class='txtSize2'>".$row['company']."</span>");
$this->coconutTableData("<span class='txtSize2'>".$row['datePaid']."</span>");
$this->coconutTableData("<span class='txtSize2'>".$row['postBy']."</span>");
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/Payments/deleteCompanyPayment.php?paymentNo=$row[paymentNo]&registrationNo=$registrationNo&refNo=$row[refNo]&amountPaid=$row[amountPaid]&datePaid=$row[datePaid]&username=$username'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a> ");
echo "</tr>";
}

echo "<tr>";
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
echo "</tr>";


$this->coconutTableStop();
}


public function addPHICPayment($refNo,$checkNo,$registrationNo,$amount,$tax,$date,$postBy,$paymentFor,$itemNo) {

/* make your connection */
$sql = new mysqli($this->myHost,$this->username,$this->password,$this->database);
 
/* we will just create an insert query here, and use it,
normally this would be done by form submission or other means */
$query = "insert into phicPayment(refNo,checkNo,registrationNo,amountPaid,tax,datePaid,postBy,dateEncoded,paymentFor,itemNo) values('$refNo','$checkNo','$registrationNo','$amount','$tax','$date','$postBy','".date("Y-m-d")."','".$paymentFor."','".$itemNo."')";

 
if ( $sql->query($query) ) {
   //echo "A new entry has been added with the `id`";
} else {
    echo "There was a problem:<br />$query<br />{$sql->error}";
}
 
/* close our connection */
$sql->close();
}




public $viewPHICPayment_total;

public function viewPHICPayment($registrationNo,$username) {

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover { background-color:yellow;color:black;}

</style>";

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      

$result = mysqli_query($connection, " SELECT phicPaymentNo,refNo,checkNo,amountPaid,tax,datePaid,postBy,paymentFor,itemNo from phicPayment where registrationNo = '$registrationNo' and status = '' ") or die("Query fail: " . mysqli_error()); 

echo "<br><br><br><center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Ref#");
$this->coconutTableHeader("Check#");
$this->coconutTableHeader("Payment For");
$this->coconutTableHeader("Amount Paid");
$this->coconutTableHeader("Tax");
$this->coconutTableHeader("Date Paid");
$this->coconutTableHeader("Post By");
$this->coconutTableHeader("");
$this->coconutTableRowStop();
while($row = mysqli_fetch_array($result))
  {

$this->viewPHICPayment_total += $row['amountPaid'];

echo "<tr>";
$this->coconutTableData($row['refNo']);
$this->coconutTableData($row['checkNo']);

if( $row['paymentFor'] == "HOSPITAL BILL" ) {
$this->coconutTableData($row['paymentFor']);
}else {
$this->coconutTableData($this->selectNow("patientCharges","description","itemNo",$this->selectNow("phicPayment","itemNo","phicPaymentNo",$row['phicPaymentNo'])));
}
$this->coconutTableData(number_format($row['amountPaid'],2));
$this->coconutTableData($row['tax']);
$this->coconutTableData($row['datePaid']);
$this->coconutTableData($row['postBy']);
$this->coconutTableData(" <a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/Payments/deletePHICPayment.php?phicPaymentNo=$row[phicPaymentNo]&registrationNo=$registrationNo&refNo=$row[refNo]&amountPaid=$row[amountPaid]&datePaid=$row[datePaid]&username=$username'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a> ");
echo "</tr>";
}

echo "<tr>";
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
echo "</tr>";

echo "<tr>";
$this->coconutTableData("<b>TOTAL</b>");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("&nbsp;<b>".number_format($this->viewPHICPayment_total,2)."</b>");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
echo "</tr>";

$this->coconutTableStop();
}


public $getPHICPayment_total;

public function getPHICPayment_total() {
return $this->getPHICPayment_total;
}



public function companyPaymentSelection($registrationNo,$username,$companyName,$columnToGet) {

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      


$result = mysqli_query($connection, " select description,itemNo,chargesCode,sellingPrice,company from patientCharges where registrationNo='$registrationNo' and title = 'PROFESSIONAL FEE' and status = 'UNPAID' ") or die("Query fail: " . mysqli_error()); 

while($row = mysqli_fetch_array($result))
  {

echo "<form method='post' action='http://".$this->getMyUrl()."/COCONUT/patientProfile/Payments/companyPayment_pf.php'>";
$this->coconutHidden("registrationNo",$registrationNo);
$this->coconutHidden("username",$username);
$this->coconutHidden("amount",$row['company']);
$this->coconutHidden("doctorName",$row['description']);
$this->coconutHidden("itemNo",$row['itemNo']);
$this->coconutHidden("companyName",$companyName);
$this->coconutHidden("columnToGet",$columnToGet);
echo "<input type=submit value='$row[description]' class='button'>
</form>";

}

}


public function phicPaymentSelection($registrationNo,$username) {

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      


$result = mysqli_query($connection, " select description,itemNo,chargesCode,sellingPrice,phic from patientCharges where registrationNo='$registrationNo' and title = 'PROFESSIONAL FEE' and status = 'UNPAID' ") or die("Query fail: " . mysqli_error()); 

while($row = mysqli_fetch_array($result))
  {

echo "<form method='post' action='http://".$this->getMyUrl()."/COCONUT/patientProfile/Payments/phicPayment_pf.php'>";
$this->coconutHidden("registrationNo",$registrationNo);
$this->coconutHidden("username",$username);
$this->coconutHidden("amount",$row['phic']);
$this->coconutHidden("itemNo",$row['itemNo']);
echo "<input type=submit value='$row[description]' class='button'>
</form>";

}

}


public function roomCensus_room($date1,$date2) {

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      



$result = mysqli_query($connection, " select roomNo,Description from room ") or die("Query fail: " . mysqli_error()); 

$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Room");
$this->coconutTableHeader("");
$this->coconutTableRowStop();
while($row = mysqli_fetch_array($result))
{
$this->coconutTableRowStart();
$this->coconutTableData("<a href='/COCONUT/room/roomCensus1.php?room=$row[Description]&date1=$date1&date2=$date2' style='text-decoration:none; color:black;'>".$row['Description']."</a>");
$this->coconutTableData($this->roomCensus_totalPx($row['Description'],$date1,$date2));
$this->coconutTableRowStop();
}
$this->coconutTableStop();
}




}


?>
