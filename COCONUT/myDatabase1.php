<?php
include("myDatabase.php");

class database1 extends database  {




public function getTotalPx($month,$day,$year,$month1,$day1,$year1,$type) {


$date = $month."_".$day."_".$year;
$date1 = $month1."_".$day1."_".$year1;

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT count(registrationNo) as regNo FROM registrationDetails WHERE (dateRegistered between '$date' and '$date1') and type = '$type'  ");

while($row = mysql_fetch_array($result))
  {
return $row['regNo'];
  }

}




public function showPieGraph() {

$myImage = ImageCreate(300,300);

$white = ImageColorAllocate ($myImage, 255, 255, 255);
$red  = ImageColorAllocate ($myImage, 255, 0, 0);
$green = ImageColorAllocate ($myImage, 0, 255, 0);
$blue = ImageColorAllocate ($myImage, 0, 0, 255);
$lt_red = ImageColorAllocate($myImage, 255, 150, 150);
$lt_green = ImageColorAllocate($myImage, 150, 255, 150);
$lt_blue = ImageColorAllocate($myImage, 150, 150, 255);

for ($i = 120;$i > 100;$i--) {
    ImageFilledArc ($myImage, 100, $i, 200, 150, 0, 90, $lt_red, IMG_ARC_PIE);
    ImageFilledArc ($myImage, 100, $i, 200, 150, 90, 360, $lt_blue, IMG_ARC_PIE);
  //  ImageFilledArc ($myImage, 100, $i, 200, 150, 180, 360, $lt_blue, IMG_ARC_PIE);
}

ImageFilledArc($myImage, 100, 100, 200, 150, 0, 90, $red, IMG_ARC_PIE);
ImageFilledArc($myImage, 100, 100, 200, 150, 90, 360 , $blue, IMG_ARC_PIE);
//ImageFilledArc($myImage, 100, 100, 200, 150, 180, 360 , $blue, IMG_ARC_PIE);

header ("Content-type: image/png");
ImagePNG($myImage);

ImageDestroy($myImage);



}




public function phicTransmit($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO phicTransmit (registrationNo)
VALUES
('$registrationNo')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

echo "<script type='text/javascript' >";
echo "alert('$service was Successfully Added to the List of Service in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addService.php?username=$username'";
echo "</script>";
mysql_close($con);

}


//// Aug 6 ,2012

public function addVoucher($voucherNo,$paymentMode,$description,$amount,$payee,$date,$time,$accountTitle,$user) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO vouchers (voucherNo,paymentMode,description,amount,payee,date,time,accountTitle,user)
VALUES
('".mysql_real_escape_string($voucherNo)."','".mysql_real_escape_string($paymentMode)."','".mysql_real_escape_string($description)."','".mysql_real_escape_string($amount)."','".mysql_real_escape_string($payee)."','".mysql_real_escape_string($date)."','".mysql_real_escape_string($time)."','".mysql_real_escape_string($accountTitle)."','".mysql_real_escape_string($user)."')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

echo "<script type='text/javascript' >";
echo "alert('Voucher Added');";
echo  "window.location='http://".$this->getMyUrl()."/COCONUT/accounting/voucher/addVoucher.php?username=$user'";
echo "</script>";

mysql_close($con);

}

// Aug 6 2012


public $cashDisbursement_total;

public function cashDisbursement($month,$day,$year,$month1,$day1,$year1,$user,$payee) {

echo "
<style type='text/css'>
tr:hover { background-color:yellow;color:black;}

a { text-decoration:none; color:black; }
</style>";

$date = $month."_".$day."_".$year;
$date1 = $month1."_".$day1."_".$year1;

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

if( $payee == "" ) {
$result = mysql_query("SELECT * FROM vouchers WHERE (date between '$date' and '$date1') order by date desc  ");
}else {
$result = mysql_query("SELECT * FROM vouchers WHERE (date between '$date' and '$date1') and payee = '$payee' order by date desc  ");
}

echo "<centeR><br>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Voucher#");
$this->coconutTableHeader("Type");
$this->coconutTableHeader("Description");
$this->coconutTableHeader("Amount");
$this->coconutTableHeader("Payee");
$this->coconutTableHeader("Date");
$this->coconutTableHeader("Time");
$this->coconutTableHeader("<font size=2>Account Title</font>");
$this->coconutTableHeader("User");
$this->coconutTableRowStop();
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->cashDisbursement_total += $row['amount'];
$this->coconutTableData($row['voucherNo']);
$this->coconutTableData($row['paymentMode']);
$this->coconutTableData($row['description']);
$this->coconutTableData(number_format($row['amount'],2));
$this->coconutTableData($row['payee']);
$this->coconutTableData($row['date']);
$this->coconutTableData($row['time']);
$this->coconutTableData($row['accountTitle']);
$this->coconutTableData($row['user']);
$this->coconutTableRowStop();
  }
$this->coconutTableRowStart();
$this->coconutTableData("<b>Grand Total</b>");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("".number_format($this->cashDisbursement_total,2));
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableRowStop();
$this->coconutTableStop();

}

//Aug 6
public function AddSupplier($supplierName,$address,$contactPerson,$contactNo,$description) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO supplier (supplierName,address,description,contactPerson,contactNo)
VALUES
('".mysql_real_escape_string($supplierName)."','".mysql_real_escape_string($address)."','".mysql_real_escape_string($contactPerson)."','".mysql_real_escape_string($contactNo)."','".mysql_real_escape_string($description)."')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

echo "<script type='text/javascript' >";
echo "alert('Supplier Added');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addSupplier.php'";
echo "</script>";
mysql_close($con);

}


//aug 6
public $getMasterListSupplier_total;

public function getMasterListSupplier($username) {

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

$result = mysql_query("SELECT * FROM supplier order by supplierName asc  ");

echo "<centeR><br>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Supplier Name");
$this->coconutTableHeader("Address");
$this->coconutTableHeader("Contact Person");
$this->coconutTableHeader("Contact No");
$this->coconutTableHeader("Description");
$this->coconutTableHeader("");
$this->coconutTableHeader("");
$this->coconutTableRowStop();
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->getMasterListSupplier_total++;
$this->coconutTableData($row['supplierName']);
$this->coconutTableData($row['address']);
$this->coconutTableData($row['contactPerson']);
$this->coconutTableData($row['contactNo']);
$this->coconutTableData($row['description']);

echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/EDIT/editSupplier.php?supplierName=$row[supplierName]&address=$row[address]&contactPerson=$row[contactPerson]&contactNo=$row[contactNo]&description=$row[description]&supplierCode=$row[supplierCode]&username=$username'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/pencil.jpeg'></a>&nbsp;</td>";
echo "<td>&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/masterfile/DELETE/deleteSupplier.php?supplierName=$row[supplierName]&supplierCode=$row[supplierCode]&username=$username'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/delete.jpeg'></a>&nbsp;</td>";

$this->coconutTableRowStop();
  }
$this->coconutTableRowStart();
$this->coconutTableData("<b><font size=2>Supplier&nbsp;  ".$this->getMasterListSupplier_total."</font></b>");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableRowStop();
$this->coconutTableStop();

}




public function chargesAlready($desc,$date,$registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT description FROM patientCharges WHERE description = '$desc' and dateCharge = '$date' and registrationNo = '$registrationNo'");

return mysql_num_rows($result);

}

/******************TRIAL BALANCE**********************************/

public function sumAccountTitle($accountTitle,$month,$year) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(amount) as amount FROM vouchers WHERE date like '$month%%%%$year' and accountTitle = '$accountTitle'  ");

while($row = mysql_fetch_array($result))
  {
return $row['amount'];
}

}

public function sumPaymentMode($month,$year,$paymentMode) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(amount) as amount FROM vouchers WHERE date like '$month%%%%$year' and paymentMode = '$paymentMode'  ");

while($row = mysql_fetch_array($result))
  {
return $row['amount'];
}

}


public $trialBalance_debit;
public $trialBalance_credit;

public function trialBalance($month,$year) {

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


$result = mysql_query("SELECT * FROM vouchers WHERE date like '$month%%%%$year' group by accountTitle order by accountTitle asc  ");

echo "<centeR>";
$this->coconutTableStart();
$this->coconutTableRowStart();
echo "<Br>";
echo "<th>&nbsp;Account Title&nbsp;</th>";
echo "<th>&nbsp;Debit&nbsp;</th>";
echo "<th>&nbsp;Credit&nbsp;</th>";
$this->coconutTableRowStop();
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->trialBalance_debit += $this->sumAccountTitle($row['accountTitle'],$month,$year);

$this->coconutTableData("&nbsp;".$row['accountTitle']."&nbsp;");
$this->coconutTableData("&nbsp;".number_format($this->sumAccountTitle($row['accountTitle'],$month,$year),2)."&nbsp;");
$this->coconutTableData("");
$this->coconutTableRowStop();
  }
$this->coconutTableRowStart();
$this->coconutTableData("Cash");
$this->coconutTableData("");
$this->coconutTableData("".number_format($this->sumPaymentMode($month,$year,"cash"),2));
$this->coconutTableRowStop();

$this->coconutTableRowStart();
$this->coconutTableData("Check");
$this->coconutTableData("");
$this->coconutTableData("".number_format($this->sumPaymentMode($month,$year,"check"),2));
$this->coconutTableRowStop();

$this->coconutTableRowStart();
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableData("");
$this->coconutTableRowStop();


$this->coconutTableRowStart();
$this->coconutTableData("<b>Total</b>");
$this->coconutTableData("".number_format($this->trialBalance_debit,2));
$this->coconutTableData("".number_format($this->sumPaymentMode($month,$year,"cash") + $this->sumPaymentMode($month,$year,"check"),2));
$this->coconutTableRowStop();
$this->coconutTableStop();

}



/******MONTH REGISTRATION CENSUS*******************/
public function getPxCensusMonth($month,$day,$year,$type) {


$date = $month."_".$day."_".$year;

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT count(registrationNo) as regNo FROM registrationDetails WHERE dateRegistered IN ('$date') and type = '$type'  ");

while($row = mysql_fetch_array($result))
  {
return $row['regNo'];
  }

}

/***************MONTH REGISTRATION CENSUS*********************/



/****************ANNUAL REGISTRATION CENSUS*********************/

public function getPxCensusAnnual($month,$year,$type) {


$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT count(registrationNo) as regNo FROM registrationDetails WHERE dateRegistered like '$month%%%%$year' and type = '$type'  ");

while($row = mysql_fetch_array($result))
  {
return $row['regNo'];
  }

}
/***************************ANNUAL REGISTRATION CENSUS**********/



/******************DAILY REVENUE OPD**************************/
public function getPxRevenueDaily_opd($month,$day,$year) {

$date = $month."_".$day."_".$year;

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(cashPaid) as cashPaid FROM registrationDetails rd,patientCharges pc WHERE rd.registrationNo = pc.registrationNo and rd.type = 'OPD' and pc.datePaid = '$date'   ");

while($row = mysql_fetch_array($result))
  {
return $row['cashPaid'];
  }

}

/*****************DAILY REVENUE OPD***********************/



/******************DAILY REVENUE IPD**************************/
public function getPxRevenueDaily_ipd($month,$day,$year) {

$date = $month."_".$day."_".$year;

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(amountPaid) as amountPaid FROM registrationDetails rd,patientPayment pp WHERE rd.registrationNo = pp.registrationNo and rd.type = 'IPD' and pp.datePaid = '$date'  ");

while($row = mysql_fetch_array($result))
  {
return $row['amountPaid'];
  }

}

/*****************DAILY REVENUE IPD***********************/



/**********ANNUAL REVENUE/COLLECTION***************/
public function getAnnualRevenue_opd($month,$year) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(cashPaid) as cashPaid FROM registrationDetails rd,patientCharges pc WHERE rd.registrationNo = pc.registrationNo and rd.type = 'OPD' and pc.datePaid like '$month%%%%$year'   ");

while($row = mysql_fetch_array($result))
  {
return $row['cashPaid'] / 1000;
  }

}
/**********************************************/



/**********ANNUAL REVENUE/COLLECTION**********************/
public function getAnnualRevenue_ipd($month,$year) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(amountPaid) as amountPaid FROM registrationDetails rd,patientPayment pp WHERE rd.registrationNo = pp.registrationNo and rd.type = 'IPD' and pp.datePaid like '$month%%%%$year'  ");

while($row = mysql_fetch_array($result))
  {
return $row['amountPaid'] / 1000;
  }

}
/*******************************************************/


public function getGenderDaily($month,$day,$year,$gender,$type) {


$date = $month."_".$day."_".$year;

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT count(rd.registrationNo) as regNo FROM registrationDetails rd,patientRecord pr WHERE pr.patientNo = rd.patientNo and rd.dateRegistered IN ('$date') and rd.type = '$type' and pr.Gender = '$gender' ");

while($row = mysql_fetch_array($result))
  {
return $row['regNo'];
  }

}

/******************************************************/



public function getGenderAnnual($month,$year,$gender,$type) {


$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT count(rd.registrationNo) as regNo FROM registrationDetails rd,patientRecord pr WHERE pr.patientNo = rd.patientNo and rd.dateRegistered like '$month%%%%$year' and rd.type = '$type' and pr.Gender = '$gender' ");

while($row = mysql_fetch_array($result))
  {
return $row['regNo'];
  }

}

/********************************************************/



/********PHIC RECEIVABLE NON-PACKAGE**********************/
public function getPHICReceivablesMonthly($month,$day,$year) { //BASED ON TRANSMITTED NA

$date = $month."_".$day."_".$year;

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


$result = mysql_query("SELECT sum(pc.phic) as totalPHIC FROM registrationDetails rd,patientCharges pc,phicTransmit pt WHERE rd.registrationNo = pc.registrationNo and rd.dateUnregistered IN ('$date') and rd.registrationNo = pt.registrationNo and pt.package = 0   ");



while($row = mysql_fetch_array($result))
  {
 return $row['totalPHIC']; 
}
}

/*********************************************************/



/********PHIC RECEIVABLE PACKAGE**********************/
public function getPHICReceivablesMonthly_package($month,$day,$year) { //BASED ON TRANSMITTED NA

$date = $month."_".$day."_".$year;

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


$result = mysql_query("SELECT sum(pt.package) as totalPackage FROM registrationDetails rd,phicTransmit pt WHERE rd.dateUnregistered IN ('$date') and rd.registrationNo = pt.registrationNo and pt.package > 0   ");


while($row = mysql_fetch_array($result))
  {
 return $row['totalPackage']; 
}
}

/*********************************************************/


/********PHIC RECEIVABLE NON-PACKAGE Annual**********************/
public function getPHICReceivablesAnnual($month,$year) { //BASED ON TRANSMITTED NA

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


$result = mysql_query("SELECT sum(pc.phic) as totalPHIC FROM registrationDetails rd,patientCharges pc,phicTransmit pt WHERE rd.registrationNo = pc.registrationNo and rd.dateUnregistered like '$month%%%%$year' and rd.registrationNo = pt.registrationNo and pt.package = 0   ");



while($row = mysql_fetch_array($result))
  {
 return $row['totalPHIC']; 
}
}

/*********************************************************/




/********PHIC RECEIVABLE PACKAGE**********************/
public function getPHICReceivablesAnnual_package($month,$year) { //BASED ON TRANSMITTED NA


$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


$result = mysql_query("SELECT sum(pt.package) as totalPackage FROM registrationDetails rd,phicTransmit pt WHERE rd.dateUnregistered like '$month%%%%$year' and rd.registrationNo = pt.registrationNo and pt.package > 0   ");


while($row = mysql_fetch_array($result))
  {
 return $row['totalPackage']; 
}
}

/*********************************************************/



/*************MONTHLY EXPENSES*****************************/
public function getMonthlyExpenses($month,$day,$year) {

$date = $month."_".$day."_".$year;

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(amount) as amount FROM vouchers WHERE date IN ('$date')   ");

while($row = mysql_fetch_array($result))
  {
return $row['amount'] / 1000;
  }

}

/**********************************************************/


/*************ANNUAL EXPENSES*****************************/
public function getAnnualExpenses($month,$year) {


$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(amount) as amount FROM vouchers WHERE date like '$month%%%%$year'   ");

while($row = mysql_fetch_array($result))
  {
return $row['amount'] / 1000;
  }

}

/**********************************************************/




/*************MONTHLY DISCOUNT GIVEN*****************************/
public function getMonthlyDiscount_ipd($month,$day,$year) {

$date = $month."_".$day."_".$year;

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(discount) as discount FROM registrationDetails WHERE dateUnregistered IN ('$date') and discount NOT IN('',0) and type = 'IPD'   ");

while($row = mysql_fetch_array($result))
  {
return $row['discount'];
  }

}

/**********************************************************/




/*************MONTHLY DISCOUNT GIVEN*****************************/
public function getMonthlyDiscount_opd($month,$day,$year) {

$date = $month."_".$day."_".$year;

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(pc.discount) as discountz FROM registrationDetails rd,patientCharges pc WHERE rd.registrationNo = pc.registrationNo and pc.dateCharge IN ('$date') and pc.discount NOT IN('',0) and rd.type = 'OPD'   ");

while($row = mysql_fetch_array($result))
  {
return $row['discountz'];
  }

}

/**********************************************************/



/*************ANNUAL DISCOUNT GIVEN*****************************/
public function getAnnualDiscount_ipd($month,$year) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(discount) as discount FROM registrationDetails WHERE dateUnregistered like '$month%%%%$year' and discount NOT IN('',0) and type = 'IPD'   ");

while($row = mysql_fetch_array($result))
  {
return $row['discount'] / 1000;
  }

}

/**********************************************************/



/*************MONTHLY DISCOUNT GIVEN*****************************/
public function getAnnualDiscount_opd($month,$year) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(pc.discount) as discountz FROM registrationDetails rd,patientCharges pc WHERE rd.registrationNo = pc.registrationNo and pc.dateCharge like '$month%%%%$year' and pc.discount NOT IN('',0) and rd.type = 'OPD'   ");

while($row = mysql_fetch_array($result))
  {
return $row['discountz'] / 1000;
  }

}

/**********************************************************/


/*************MONTHLY SENIOR*****************************/
public function getMonthlySenior($month,$day,$year,$type) {

$date = $month."_".$day."_".$year;

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT count(registrationNo) as regNo FROM registrationDetails WHERE dateRegistered IN ('$date') and type = '$type'   ");

while($row = mysql_fetch_array($result))
  {
return $row['regNo'];
  }

}

/**********************************************************/


/*************ANNUAL SENIOR*****************************/
public function getAnnualSenior($month,$year,$type) {


$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT count(registrationNo) as regNo FROM registrationDetails WHERE dateRegistered like '$month%%%%$year' and type = '$type'   ");

while($row = mysql_fetch_array($result))
  {
return $row['regNo'];
  }

}

/**********************************************************/



/*************BEST SELLING*****************************/
public $getBestSelling_opd_total;
public function getBestSelling_opd($month,$year,$title) {

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

$result = mysql_query("select pc.description,sum(pc.cashPaid) as totalPaid from patientCharges pc,registrationDetails rd WHERE pc.registrationNo = rd.registrationNo and type ='OPD' and pc.datePaid  like '$month%%%%$year' and pc.title = '$title' and pc.status='PAID' group by pc.description order by totalPaid desc limit 20 ");

echo "<Center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Top");
$this->coconutTableHeader("Description");
$this->coconutTableHeader("Sale's");
$this->coconutTableHeader("");
$this->coconutTableRowStop();
$x=1;
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->getBestSelling_opd_total += $row['totalPaid'];
$this->coconutTableData("".$x++);
$this->coconutTableData($row['description']);
$this->coconutTableData(number_format($row['totalPaid'],2));
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/graphicalReport/bestSelling/redirect.php?month=$month&year=$year&description=$row[description]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/arrow1.jpeg'></a>");
$this->coconutTableRowStop();
  }
$this->coconutTableRowStart();
$this->coconutTableStop();

}

/**********************************************************/


/*************BEST SELLING*****************************/
public $getBestSelling_ipd_total;
public function getBestSelling_ipd($month,$year,$title) {

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

$result = mysql_query("select pc.description,sum(pc.total) as totalPaid from patientCharges pc,registrationDetails rd,patientPayment pp WHERE pc.registrationNo = rd.registrationNo and pc.registrationNo = pp.registrationNo and rd.type ='IPD' and pp.datePaid like '$month%%%%$year' and pc.title = '$title' group by pc.description order by totalPaid desc limit 20");

echo "<Center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Top");
$this->coconutTableHeader("Description");
$this->coconutTableHeader("Sale's");
$this->coconutTableHeader("");
$this->coconutTableRowStop();
$x=1;
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->getBestSelling_ipd_total += $row['totalPaid'];
$this->coconutTableData("".$x++);
$this->coconutTableData($row['description']);
$this->coconutTableData(number_format($row['totalPaid'],2));
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/graphicalReport/bestSelling/redirect_ipd.php?month=$month&year=$year&description=$row[description]'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/arrow1.jpeg'></a>");
$this->coconutTableRowStop();
  }
$this->coconutTableStop();

}

/**********************************************************/


/*************FAST MOVING ITEMS*****************************/
public function getFastMovingItems($month,$year,$title,$type) {

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

if( $type == "All" ) {
$result = mysql_query("select pc.description,sum(pc.quantity) as qtyDispensed from patientCharges pc,registrationDetails rd WHERE pc.registrationNo = rd.registrationNo and pc.dateCharge like '$month%%%%$year' and pc.title = '$title' and pc.departmentStatus like 'dispensedBy%%%%' group by pc.description order by qtyDispensed desc ");
}else {
$result = mysql_query("select pc.description,sum(pc.quantity) as qtyDispensed from patientCharges pc,registrationDetails rd WHERE pc.registrationNo = rd.registrationNo and rd.type ='$type' and pc.dateCharge like '$month%%%%$year' and pc.title = '$title' and pc.departmentStatus like 'dispensedBy%%%%' group by pc.description order by qtyDispensed desc ");
}

echo "<Center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("Top");
$this->coconutTableHeader("Description");
$this->coconutTableHeader("QTY Dispensed");
$this->coconutTableHeader("");
$this->coconutTableRowStop();
$x=1;
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData("".$x++);
$this->coconutTableData($row['description']);
$this->coconutTableData("&nbsp;&nbsp;".number_format($row['qtyDispensed'])."");
$this->coconutTableData("<a href='http://".$this->getMyUrl()."/COCONUT/graphicalReport/bestSelling/redirect_fastMoving.php?month=$month&year=$year&description=$row[description]&type=$type'><img src='http://".$this->getMyUrl()."/COCONUT/myImages/arrow1.jpeg'></a>");
$this->coconutTableRowStop();
  }
$this->coconutTableStop();

}

/**********************************************************/


/*************BEST SELLING CHART*****************************/
public function getBestSellingChart_opd($month,$day,$year,$description) {

$date = $month."_".$day."_".$year;

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

$result = mysql_query("select sum(pc.cashPaid) as totalPaid from patientCharges pc,registrationDetails rd WHERE pc.registrationNo = rd.registrationNo and type ='OPD' and pc.datePaid IN ('$date') and pc.description = '$description' and pc.status='PAID' ");


while($row = mysql_fetch_array($result))
  {
return $row['totalPaid'];
  }

}

/**********************************************************/


/*************BEST SELLING CHART*****************************/
public function getBestSellingChart_ipd($month,$day,$year,$description) {

$date = $month."_".$day."_".$year;

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

$result = mysql_query("select sum(pc.total) as totalPaid from patientCharges pc,registrationDetails rd,patientPayment pp WHERE pc.registrationNo = rd.registrationNo and pc.registrationNo = pp.registrationNo and rd.type ='IPD' and pp.datePaid = '$date' and pc.description='$description' ");


while($row = mysql_fetch_array($result))
  {
return $row['totalPaid'];
  }

}

/**********************************************************/

/*************FAST MOVING ITEMS*****************************/
public function getFastMovingChart($month,$day,$year,$description,$type) {

$date = $month."_".$day."_".$year;

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

if( $type == "All" ) {
$result = mysql_query("select sum(pc.quantity) as qtyDispensed from patientCharges pc,registrationDetails rd WHERE pc.registrationNo = rd.registrationNo and pc.dateCharge = '$date' and pc.description = '$description' and pc.departmentStatus like 'dispensedBy%%%%'  ");
}else {
$result = mysql_query("select sum(pc.quantity) as qtyDispensed from patientCharges pc,registrationDetails rd WHERE pc.registrationNo = rd.registrationNo and rd.type ='$type' and pc.dateCharge  = '$date' and pc.description = '$description' and pc.departmentStatus like 'dispensedBy%%%%' ");
}

while($row = mysql_fetch_array($result))
  {
return $row['qtyDispensed'];
  }


}

/**********************************************************/



public function voidOPD_payment($registrationNo,$user) {

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


$result = mysql_query("select itemNo,pc.description,pc.total from patientCharges pc,registrationDetails rd WHERE pc.registrationNo = rd.registrationNo and pc.registrationNo = '$registrationNo' and pc.status = 'PAID' and cashPaid > 0 ");

$this->coconutFormStart("get","http://".$this->getMyUrl()."/COCONUT/patientProfile/voidPayment/voidNow.php");
echo "<Center>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("");
$this->coconutTableHeader("Description");
$this->coconutTableRowStop();
$x=1;
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutHidden("registrationNo",$registrationNo);
$this->coconutHidden("username",$user);
$this->coconutTableData("<input type='checkbox' name='itemNo[]' value='".$row['itemNo']."_".$row['total']."' checked>");
$this->coconutTableData($row['description']);
$this->coconutTableRowStop();
  }
$this->coconutTableStop();
echo "<Br>";
$this->coconutButton("Void Payment");
$this->coconutFormStop();

}

/**********************************************************/



public function AddVoidPayment($patientName,$item,$amount,$time,$date,$user) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO voidPayment (patientName,item,amount,timeVoid,dateVoid,voidBy)
VALUES
('".mysql_real_escape_string($patientName)."','".mysql_real_escape_string($item)."','".mysql_real_escape_string($amount)."','".mysql_real_escape_string($time)."','".mysql_real_escape_string($date)."','".mysql_real_escape_string($user)."')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
/*
echo "<script type='text/javascript' >";
echo "alert('Supplier Added');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addSupplier.php'";
echo "</script>";
*/
mysql_close($con);

}





/****************** SHOW MGH *******************************/

public function showMGH($month,$day,$year) {

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

$datez = $month."_".$day."_".$year;

if( $day == "All" ) {
$result = mysql_query("select pr.lastName,pr.firstName,pr.middleName,rd.mgh,rd.registrationNo from patientRecord pr,registrationDetails rd WHERE pr.patientNo = rd.patientNo and rd.mgh_date like '%%%$month%%%%' order by pr.lastName asc ");
}else {
$result = mysql_query("select pr.lastName,pr.firstName,pr.middleName,rd.mgh,rd.registrationNo from patientRecord pr,registrationDetails rd WHERE pr.patientNo = rd.patientNo and rd.mgh_date = '$datez' order by pr.lastName asc ");
}


$this->coconutFormStart("get","http://".$this->getMyUrl()."/COCONUT/patientProfile/MGH/disable_MGH.php");
$this->coconutHidden("month",$month);
$this->coconutHidden("day",$day);
$this->coconutHidden("year",$year);
echo "<Center><Br><Br>";
$this->coconutTableStart();
$this->coconutTableRowStart();
$this->coconutTableHeader("");
$this->coconutTableHeader("Last Name");
$this->coconutTableHeader("First Name");
$this->coconutTableHeader("Middle Name");
$this->coconutTableHeader("MGH by");
$this->coconutTableHeader("");
$this->coconutTableRowStop();
$x=1;
while($row = mysql_fetch_array($result))
  {
echo "<tr>";
$mgh = preg_split ("/\_/", $row['mgh']); 
$this->coconutTableData("&nbsp;<input type=checkbox name='registrationNo[]' value='$row[registrationNo]'>&nbsp;");
$this->coconutTableData("&nbsp;".$row['lastName']."&nbsp;");
$this->coconutTableData("&nbsp;".$row['firstName']."&nbsp;");
$this->coconutTableData("&nbsp;".$row['middleName']."&nbsp;");
$this->coconutTableData("&nbsp;".$mgh[1]."&nbsp;");
$this->coconutTableData("&nbsp;<a href='http://".$this->getMyUrl()."/COCONUT/patientProfile/soaOption.php?registrationNo=$row[registrationNo]&username=' target='_blank'><font size=2 color=red>View S.O.A</font></a>&nbsp;");
$this->coconutTableRowStop();
  }
$this->coconutTableStop();
echo "<Br>";
$this->coconutButton("Disable MGH");
$this->coconutFormStop();

}

/**********************************************************/

//kuhain Lahat ng naibayad ng patient at i-sum 
public function getAllPatientPayment($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(pp.amountPaid) as amountPaid  FROM patientPayment pp WHERE pp.registrationNo = '$registrationNo'  ");

while($row = mysql_fetch_array($result))
  {
return $row['amountPaid'];
  }

}


//get and sum all cashUnpaid of the patient
public function getCashUnpaid($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(pc.cashUnpaid) as cashUnpaid  FROM patientCharges pc WHERE pc.registrationNo = '$registrationNo'  ");

while($row = mysql_fetch_array($result))
  {
return $row['cashUnpaid'];
  }

}


public function may_naibayad_naba_ang_patient($registrationNo) {

if( $this->selectNow("patientPayment","amountPaid","registrationNo",$registrationNo) != "" ) {
$patientBalance = ($this->getCashUnpaid($registrationNo) - $this->getAllPatientPayment($registrationNo));
}else {
$patientBalance = $this->getCashUnpaid($registrationNo);
}
return $patientBalance;
}






public function checkingStop($patientNo,$dateRegister) {


//$date = $month."_".$day."_".$year;
//$date1 = $month1."_".$day1."_".$year1;

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT registrationNo FROM registrationDetails WHERE patientNo = '$patientNo' and dateRegistered = '$dateRegister' ");


while($row = mysql_fetch_array($result))
  {
return $row['registrationNo'];
  }  

}


public function searchRecord($name,$username) {

echo "
<style type='text/css'>
a { text-decoration:none; color:black; }
tr:hover{ background-color:yellow; color:black; }
</style>
";

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT pr.patientNo,(pr.completeName) as completeName,pr.Birthdate,pr.Gender,pr.lastName,pr.firstName,pr.middleName,pr.contactNo,pr.Birthdate,pr.Gender,pr.Senior,pr.PHIC,pr.civilStatus,pr.Address,pr.phicType,rd.registrationNo,rd.dateRegistered FROM patientRecord pr,registrationDetails rd where pr.patientNo = rd.patientNo and pr.completeName like '$name%%%%%%%' order by rd.registrationNo desc ");

echo "<br>&nbsp;  <table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";
echo  "<th bgcolor='#3b5998'>&nbsp;<font color=white>Reg#</font>&nbsp;</th>";
echo  "<th bgcolor='#3b5998'>&nbsp;<font color=white>Patient's Name</font>&nbsp;</th>";
echo  "<th bgcolor='#3b5998'>&nbsp;<font color=white>Date Registered</font>&nbsp;</th>";
echo "</tr>";
while($row = mysql_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;".$row['registrationNo']."&nbsp;</td>";
echo "<td>&nbsp;<a href='/Department/redirect.php?username=$username&registrationNo=$row[registrationNo]'>".$row['completeName']."</a>&nbsp;</td>";
echo "<td>&nbsp;".$row['dateRegistered']."&nbsp;</td>";
echo "</tr>";
  }
echo "</table>";

}





}


?>
