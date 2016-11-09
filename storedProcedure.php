<?php
include("myDatabase.php");

class storedProcedure extends database {

public function getTransactionPatient($m,$d,$y,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$module,$branch,$username) {

$dateSelected = $m."_".$d."_".$y;
$fromTime = $fromTime_hour.":".$fromTime_minutes.":".$fromTime_seconds;
$toTime = $toTime_hour.":".$toTime_minutes.":".$toTime_seconds;

echo "
<style type='text/css'>
tr:hover { background-color:yellow; color:black;}
a { text-decoration:none; color:black; }
</style>";

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      


if( $module == "PHARMACY" ) {
$result = mysqli_query($connection, "CALL transactionPatient_pharmacy1('$dateSelected','$fromTime','$toTime','$module','$branch') ") or die("Query fail: " . mysqli_error()); 
}else if( $module == "LABORATORY" ) {
$result = mysqli_query($connection, "CALL transactionPatient_laboratory('$dateSelected','$fromTime','$toTime','$module','$branch') ") or die("Query fail: " . mysqli_error()); 
}else {
$result = mysqli_query($connection, "CALL transactionPatient_others('$dateSelected','$fromTime','$toTime','$module','$branch') ") or die("Query fail: " . mysqli_error()); 
}


while($row = mysqli_fetch_array($result))
  {

echo "<tr>";

if($row['type'] == "IPD") {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/Department/patientDepartmentProfile.php?registrationNo=$row[registrationNo]&module=$module&month=$m&day=$d&year=$y&fromTime_hour=$fromTime_hour&fromTime_minutes=$fromTime_minutes&fromTime_seconds=$fromTime_seconds&toTime_hour=$toTime_hour&toTime_minutes=$toTime_minutes&toTime_seconds=$toTime_seconds&username=$username&module=$module' target='patientCharges'><font size='2' color=blue>".$row['lastName']." ".$row['firstName']."</font></a>&nbsp;</td>";
}else if( $row['type'] == "ER" ) {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/Department/patientDepartmentProfile.php?registrationNo=$row[registrationNo]&module=$module&month=$m&day=$d&year=$y&fromTime_hour=$fromTime_hour&fromTime_minutes=$fromTime_minutes&fromTime_seconds=$fromTime_seconds&toTime_hour=$toTime_hour&toTime_minutes=$toTime_minutes&toTime_seconds=$toTime_seconds&username=$username&module=$module' target='patientCharges'><font size='2' color=red>".$row['lastName']." ".$row['firstName']."</font></a>&nbsp;</td>";
}
else {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/Department/patientDepartmentProfile.php?registrationNo=$row[registrationNo]&module=$module&month=$m&day=$d&year=$y&fromTime_hour=$fromTime_hour&fromTime_minutes=$fromTime_minutes&fromTime_seconds=$fromTime_seconds&toTime_hour=$toTime_hour&toTime_minutes=$toTime_minutes&toTime_seconds=$toTime_seconds&username=$username&module=$module' target='patientCharges'><font size='2'>".$row['lastName']." ".$row['firstName']."</font></a>&nbsp;</td>";
}


if($row['grandTotal'] > 0) {

if( $module == "RADIOLOGY" ) {
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/Reports/radiologyReport/radioReportSettings.php?description=$row[description]&itemNo=$row[itemNo]&registrationNo=$row[registrationNo]&branch=Pagadian' target='patientCharges'>".number_format($row['grandTotal'],2)."</a>&nbsp;</td>";
}else {
echo "<td>&nbsp;".number_format($row['grandTotal'],2)."&nbsp;</td>";
}
}else {
echo "<td>&nbsp;</td>";
}
echo "</tr>";

}




}




public function searchTransactionPatient($patientName,$month,$day,$year,$fromTime_hour,$fromTime_minutes,$fromTime_seconds,$toTime_hour,$toTime_minutes,$toTime_seconds,$username) {

$fromTime = $fromTime_hour.":".$fromTime_minutes.":".$fromTime_seconds;
$toTime = $toTime_hour.":".$toTime_minutes.":".$toTime_seconds;

echo "
<style type='text/css'>
tr:hover { background-color:yellow; color:black;}
a { text-decoration:none; color:black; }
</style>";

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      

$dateCharge = $month."_".$day."_".$year;

$result = mysqli_query($connection, " SELECT rd.type,rd.registrationNo,upper(pr.lastName) as lastName,upper(pr.firstName) as firstName,sum(pc.cashUnpaid) as grandTotal FROM patientRecord pr,registrationDetails rd,patientCharges pc WHERE pr.patientNo = rd.patientNo and rd.registrationNo = pc.registrationNo and pr.lastName like '$patientName%%%%%' and pc.dateCharge = '$dateCharge' and (pc.timeCharge between '$fromTime' and '$toTime') and pc.inventoryFrom='PHARMACY' and pc.departmentStatus not like 'dispensedBy%%%%' and rd.mgh_date = '' and pc.status not like 'DELETED_%%%%%%' group by rd.registrationNo order by pr.lastName asc ") or die("Query fail: " . mysqli_error()); 

echo "<table border=1 cellspacing=0>";
echo "<tr>";
echo "<th><font size=2>Name</font></th>";
echo "<th><font size=2>Amount</font></th>";
echo "</tr>";
while($row = mysqli_fetch_array($result))
  {
$this->getPatientProfile($row['registrationNo']);
echo "<tr>";
echo "<td>&nbsp;<a href='/Department/patientDepartmentProfile.php?registrationNo=$row[registrationNo]&module=PHARMACY&month=$month&day=$day&year=$year&fromTime_hour=$fromTime_hour&fromTime_minutes=$fromTime_minutes&fromTime_seconds=$fromTime_seconds&toTime_hour=$toTime_hour&toTime_minutes=$toTime_minutes&toTime_seconds=$toTime_seconds&username=$username' target='patientCharges'><font size=2>".$this->getPatientRecord_completeName()."</font></a></td>";
echo "<td><font size=2>".$row['grandTotal']."</font></td>";
echo "</tr>";
}
echo "</table>";
}




public function lockedAccountItems($registrationNo,$details,$username) {

/* make your connection */
$sql = new mysqli($this->myHost,$this->username,$this->password,$this->database);
 
/* we will just create an insert query here, and use it,
normally this would be done by form submission or other means */
$query = "insert into patientCharges_locked(itemNo,status,registrationNo,chargesCode,description,sellingPrice,quantity,discount,total,cashUnpaid,phic,company,timeCharge,dateCharge,chargeBy,service,title,paidVia,cashPaid,orNO,batchNo,inventoryFrom,departmentStatus,departmentStatus_time,datePaid,timePaid,paidBy,branch,hmoPrice,dispensedNo,control_dateCharge,control_datePaid,remarks,details,lockedBy) select itemNo,status,registrationNo,chargesCode,description,sellingPrice,quantity,discount,total,cashUnpaid,phic,company,timeCharge,dateCharge,chargeBy,service,title,paidVia,cashPaid,orNO,batchNo,inventoryFrom,departmentStatus,departmentStatus_time,datePaid,timePaid,paidBy,branch,hmoPrice,dispensedNo,control_dateCharge,control_datePaid,remarks,'$details','$username' from patientCharges where registrationNo = $registrationNo";
 
if ( $sql->query($query) ) {
    echo "A new entry has been added with the `id` of {$sql->insert_id}.";
} else {
    echo "There was a problem:<br />$query<br />{$sql->error}";
}
 
/* close our connection */
$sql->close();


}




public function request2admin($description,$qty,$price,$total,$requestBy,$ip,$time,$date) {

/* make your connection */
$sql = new mysqli($this->myHost,$this->username,$this->password,$this->database);
 
/* we will just create an insert query here, and use it,
normally this would be done by form submission or other means */
$query = "insert into admin2request(description,qty,price,total,requestBy,encodedIn,time,date) values('$description','$qty','$price','$total','$requestBy','$ip','$time','$date')";
 
if ( $sql->query($query) ) {
  // echo "A new entry has been added with the `id`";
} else {
  //  echo "There was a problem:<br />$query<br />{$sql->error}";
}
 

/* close our connection */
$sql->close();
}




/*
affected files
table.php - /COCONUT/ADMIN/request/
getTable.php - /COCONUT/ADMIN/request/
*/
public function getTable_admin($date,$username) {


echo "
<style type='text/css'>
tr:hover { background-color:yellow; color:black;}
a { text-decoration:none; color:black; }
</style>


";



$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      



$result = mysqli_query($connection, " select requestNo,description,qty,price,total,requestBy from admin2request where date='$date' and status = '' ") or die("Query fail: " . mysqli_error()); 


$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Description");
$this->coconutTableHeader("QTY");
$this->coconutTableHeader("Price");
$this->coconutTableHeader("Total");
$this->coconutTableHeader("Request");
$this->coconutTableHeader("");
$this->coconutTableHeader("");
$this->coconutTableRowStop();
while($row = mysqli_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData($row['description']);
$this->coconutTableData($row['qty']);
$this->coconutTableData(number_format($row['price'],2));
$this->coconutTableData(number_format($row['total'],2));
$this->coconutTableData($row['requestBy']);
//$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/ADMIN/request/approved.php?username=jun&requestNo=$row[requestNo]&date=$date'><font color=blue>Approved</font> | <font color=red>Cancel</font></a>");
echo "<td>";
echo "<form method='post' id='#myForm' action='http://".$this->getMyUrl()."/COCONUT/ADMIN/request/table.php'>";
echo "<input type='submit' id='submitButton' style='border:1px solid blue; height:10%;' value='Approved'>";
echo "<input type='hidden' id='username' name='username' value='$username'>";
echo "<input type='hidden' id='requestNo' name='requestNo' value='$row[requestNo]'>";
echo "<input type='hidden' id='date' name='date' value='$date'>";
echo "<input type='hidden' id='status' name='status' value='APPROVED'>";
echo "<input type='hidden' id='makeDo' name='makeDo' value='putStatus'>";
echo "</form>";
echo "</td>";

echo "<td>";
echo "<form method='post' action='http://".$this->getMyUrl()."/COCONUT/ADMIN/request/table.php'>";
echo "<input type='submit' style='border:1px solid blue; height:10%;' value='  Cancel  '>";
echo "<input type='hidden' name='username' value='$username'>";
echo "<input type='hidden' name='requestNo' value='$row[requestNo]'>";
echo "<input type='hidden' name='date' value='$date'>";
echo "<input type='hidden' name='status' value='CANCEL'>";
echo "<input type='hidden' id='makeDo' name='makeDo' value='putStatus'>";
echo "</form>";
echo "</td>";

$this->coconutTableRowStop();
}
$this->coconutTableRowStop();

}




public $requestLog_username;
public $requestLog_password;

public function requestLog_username() {
return $this->requestLog_username;
}
public function requestLog_password() {
return $this->requestLog_password;
}
public function requestLog($username,$password) {

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      

$result = mysqli_query($connection, " select username,password from registeredUser where username = '$username' and password = '$password' ") or die("Query fail: " . mysqli_error()); 


while($row = mysqli_fetch_array($result))
  {
$this->requestLog_username = $row['username'];
$this->requestLog_password = $row['password'];
}


}



/*
affected files
totalApproved.php - /COCONUT/ADMIN/request/
*/
/*
public function adminApproved($date) {

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      

$result = mysqli_query($connection, " select count(requestNo) as totalApproved from admin2request where status like 'APPROVED_%%%%%%%%%' and status_date = '$date' and releasedBy = '' ") or die("Query fail: " . mysqli_error()); 

while($row = mysqli_fetch_array($result))
  {
if( $row['totalApproved'] > 0 ) {
echo "<font color=red>(".$row['totalApproved'].")</font>";
}else {
echo "";
}
}
}

*/
/*
affected files
viewApprovedRequest.php - /COCONUT/ADMIN/request/
*/
public function showApprovedRequest($date,$username) {

echo "
<style type='text/css'>
tr:hover { background-color:yellow; color:black;}
a { text-decoration:none; color:black; }
</style>";

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      

$result = mysqli_query($connection, " select requestNo,description,qty,price,total,requestBy,status from admin2request where status like 'APPROVED_%%%%' and status_date = '$date' and releasedBy = '' ") or die("Query fail: " . mysqli_error()); 

echo "<Center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Description");
$this->coconutTableHeader("QTY");
$this->coconutTableHeader("Price");
$this->coconutTableHeader("Total");
$this->coconutTableHeader("Request By");
$this->coconutTableHeader("Status");
$this->coconutTableHeader("");
while($row = mysqli_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData($row['description']);
$this->coconutTableData($row['qty']);
$this->coconutTableData($row['price']);
$this->coconutTableData("<font color=red>".$row['total']."</font>");
$this->coconutTableData($row['requestBy']);
$this->coconutTableData($row['status']);
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/ADMIN/request/released.php?requestNo=$row[requestNo]&username=$username&date=$date'><font color='blue'>Released</font></a>");
$this->coconutTableRowStop();
}
$this->coconutTableStop();
}


/*
affected files
getTable.php
*/
public function totalRequest($date) {

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      

$result = mysqli_query($connection, " select count(requestNo) as totalRequest from admin2request where status = '' and date = '$date'  ") or die("Query fail: " . mysqli_error()); 

while($row = mysqli_fetch_array($result))
  {
return $row['totalRequest'];
}
}



/*
affected files
requestStatus.php - /COCONUT/ADMIN/request/
*/
public function requestStatusReport($date,$status) {

echo "
<style type='text/css'>
tr:hover { background-color:yellow; color:black;}
a { text-decoration:none; color:black; }
</style>";

$connection = mysqli_connect($this->myHost,$this->username,$this->password,$this->database);      

if($status == "waiting") {
$result = mysqli_query($connection, " select requestNo,description,qty,price,total,requestBy,status,releasedBy,releaseTo,releasedAmount from admin2request where date = '".mysql_real_escape_string(strip_tags($date))."' and status = ''  ") or die("Query fail: " . mysqli_error()); 
}else {
$result = mysqli_query($connection, " select requestNo,description,qty,price,total,requestBy,status,releasedBy,releaseTo,releasedAmount from admin2request where date = '".mysql_real_escape_string(strip_tags($date))."' and status like '$status%%'  ") or die("Query fail: " . mysqli_error()); 
}

while($row = mysqli_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/ADMIN/request/releasedCopy.php?requestNo=$row[requestNo]'>".$row['description']."</a>");
$this->coconutTableData($row['qty']);
$this->coconutTableData($row['price']);
$this->coconutTableData(number_format($row['total'],2));
$this->coconutTableData($row['requestBy']);
$this->coconutTableData($row['status']);
$this->coconutTableData($row['releasedBy']);
$this->coconutTableData($row['releaseTo']);
$this->coconutTableData(number_format($row['releasedAmount'],2));
$this->coconutTableRowStop();
}

}






}



?>
