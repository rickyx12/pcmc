<?php
include("../../myDatabase.php");
$status = $_GET['status'];
$registrationNo = $_GET['registrationNo'];
$chargesCode = $_GET['chargesCode'];
$description = $_GET['description'];
$sellingPrice = $_GET['sellingPrice'];
$discount = $_GET['discount'];
$timeCharge = $_GET['timeCharge'];

$chargeBy = $_GET['chargeBy'];
$service = $_GET['service'];
$title = $_GET['title'];
$paidVia = $_GET['paidVia'];
$cashPaid = $_GET['cashPaid'];
$batchNo = $_GET['batchNo'];
$username = $_GET['username'];
$quantity = $_GET['quantity'];
$inventoryFrom = $_GET['inventoryFrom'];
$room = $_GET['room'];


$ro = new database();

$cashUnpaid = 0;
$phic=0;
$company=0;
$ro->getPatientProfile($registrationNo);

if( $description == "TWICE A WEEK (MONDARTE)" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"2400","0","2400","500","1900",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"45","MONDARTE EMERSON M.D.","900","0","900","400","500",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}else if( $description == "TWICE A WEEK (DIMAANO)" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"2400","0","2400","1065","1335",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"47","DIMAANO MARITES M.D","900","0","900","400","500",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}

else if( $description == "ONCE A WEEK (DIMAANO)" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"2400","0","2400","200","2200",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"47","DIMAANO MARITES M.D","900","0","900","400","500",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}

else if( $description == "ONCE A WEEK (MONDARTE)" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"2400","0","2400","200","2200",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"45","MONDARTE EMERSON M.D.","900","0","900","400","500",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}



else if( $description == "THREE TIMES A WEEK" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"2400","0","2400","1100","1300",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"47","MONDARTE EMERSON M.D","900","0","900","400","500",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}











else if( $description == "F8HPS NEW TWICE A WEEK" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"2680","0","2680","730","1950",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"45","MONDARTE EMERSON M.D.","700","0","700","350","350",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}

else if( $description == "F8HPS RE-USE TWICE A WEEK" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"2680","0","2680","730","1950",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"45","MONDARTE EMERSON M.D.","700","0","700","350","350",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}

else if( $description == "F8HPS NEW THREE TIMES A WEEK" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"3280","0","3280","1330","1950",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"45","MONDARTE EMERSON M.D.","700","0","700","350","350",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}

else if( $description == "F8HPS RE-USE THREE TIMES A WEEK" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"3280","0","3280","1330","1950",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"45","MONDARTE EMERSON M.D.","700","0","700","350","350",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}













else if( $description == "HF80S NEW TWICE A WEEK" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"2850","0","2850","900","1950",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"45","MONDARTE EMERSON M.D.","700","0","700","350","350",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}
else if( $description == "HF80S RE-USE TWICE A WEEK" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"2850","0","2850","900","1950",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"45","MONDARTE EMERSON M.D.","700","0","700","350","350",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}
else if( $description == "HF80S NEW THREE TIMES A WEEK" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"3450","0","3450","1500","1950",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"45","MONDARTE EMERSON M.D.","700","0","700","350","350",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}
else if( $description == "HF80S RE-USE THREE TIMES A WEEK" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"3450","0","3450","1500","1950",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"45","MONDARTE EMERSON M.D.","700","0","700","350","350",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}



























else if( $description == "NON MED F8HPS NEW DIALYZER" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"3656","0","3656","3656","0",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"45","MONDARTE EMERSON M.D.","350","0","350","350","0",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}

else if( $description == "NON MED F8HPS RE-USE DIALYZER" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"2400","0","2400","2400","0",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"45","MONDARTE EMERSON M.D.","350","0","350","350","0",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}







else if( $description == "NON MED HF80S NEW DIALYZER" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"5030","0","5030","5030","0",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"45","MONDARTE EMERSON M.D.","350","0","350","350","0",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}

else if( $description == "NON MED HF80S RE-USE DIALYZER" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"2410","0","2410","2410","0",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"45","MONDARTE EMERSON M.D.","350","0","350","350","0",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}























else if( $description == "PACKAGE C DIALYSIS F8HPS NEW" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"3656","0","3656","1406","2250",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"45","MONDARTE EMERSON M.D.","700","0","700","350","350",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}

else if( $description == "PACKAGE C DIALYSIS F8HPS RE-USE" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"2400","0","2400","150","2250",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"45","MONDARTE EMERSON M.D.","700","0","700","350","350",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}

















else if( $description == "PACKAGE C DIALYSIS HF80S NEW" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"5030","0","5030","2780","2250",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"45","MONDARTE EMERSON M.D.","700","0","700","350","350",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}

else if( $description == "PACKAGE C DIALYSIS HF80S RE-USE" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"2410","0","2410","160","2250",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"45","MONDARTE EMERSON M.D.","700","0","700","350","350",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}
















else if( $description == "EVERY FIVE DAYS" ) {

$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,"2400","0","2400","600","1800",0,$timeCharge,date("Y-m-d"),$username,"Examination",$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

$ro->addCharges_cash($status,$registrationNo,"45","MONDARTE EMERSON M.D.","400","0","400","400","400",0,$timeCharge,date("Y-m-d"),$username,"Attending","PROFESSIONAL FEE",$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);

}


else {

if( $title == "MISCELLANEOUS" ) {
$ro->gotoPage("http://".$ro->getMyUrl()."/COCONUT/availableCharges/quantityMisc.php?status=$status&registrationNo=$registrationNo&chargesCode=$chargesCode&description=$description&sellingPrice=$sellingPrice&discount=$discount&timeCharge=$timeCharge&room=$room&chargeBy=$chargeBy&service=$service&title=$title&paidVia=$paidVia&cashPaid=$cashPaid&batchNo=$batchNo&username=$username&inventoryFrom=$inventoryFrom");
}else if( $title == "NURSING-CHARGES" ) {
$ro->gotoPage("http://".$ro->getMyUrl()."/COCONUT/availableCharges/quantityMisc.php?status=$status&registrationNo=$registrationNo&chargesCode=$chargesCode&description=$description&sellingPrice=$sellingPrice&discount=$discount&timeCharge=$timeCharge&room=$room&chargeBy=$chargeBy&service=$service&title=$title&paidVia=$paidVia&cashPaid=$cashPaid&batchNo=$batchNo&username=$username&inventoryFrom=$inventoryFrom");
}else if( $title == "MEDICINE" ) {
$ro->gotoPage("http://".$ro->getMyUrl()."/COCONUT/availableCharges/quantityMisc.php?status=$status&registrationNo=$registrationNo&chargesCode=$chargesCode&description=$description&sellingPrice=$sellingPrice&discount=$discount&timeCharge=$timeCharge&room=$room&chargeBy=$chargeBy&service=$service&title=$title&paidVia=$paidVia&cashPaid=$cashPaid&batchNo=$batchNo&username=$username&inventoryFrom=$inventoryFrom");
}else if( $title == "GENERATOR_CHARGE" ) {
$ro->gotoPage("http://".$ro->getMyUrl()."/COCONUT/availableCharges/quantityMisc.php?status=$status&registrationNo=$registrationNo&chargesCode=$chargesCode&description=$description&sellingPrice=$sellingPrice&discount=$discount&timeCharge=$timeCharge&room=$room&chargeBy=$chargeBy&service=$service&title=$title&paidVia=$paidVia&cashPaid=$cashPaid&batchNo=$batchNo&username=$username&inventoryFrom=$inventoryFrom");
}

else {

$dateCharge = date("Y-m-d");

if($title == "PROFESSIONAL FEE") {
$price = preg_split ("/\//", $sellingPrice ); 
$currentTotal = $quantity * $price[0];
}else {
$currentTotal = $quantity * $sellingPrice;
}

$totalDiscount = $quantity * $discount;
$grandTotal = $currentTotal - $totalDiscount;
$ro->getPatientProfile($registrationNo);
$ro->getPHIClimit_setter($ro->getRegistrationDetails_caseType());

$currentSupplies = $ro->getCurrentPHIC_check($registrationNo,"SUPPLIES") - $ro->getPHIClimit_supplies();
$currentMedicine = $ro->getCurrentPHIC_check($registrationNo,"MEDICINE") - $ro->getPHIClimit_medicine();


//check autoDispense????
if( $ro->selectNow("inventory","autoDispense","inventoryCode",$chargesCode) == "yes" ) {
$currentQTY = $ro->selectNow("inventory","quantity","inventoryCode",$chargesCode); // current qty ng meds/sup sa inventory
$newQTY = ($currentQTY - $quantity); // less sa inventory as in qty after ibawas ung desired qty ng user
$ro->editNow("inventory","inventoryCode",$chargesCode,"quantity",$newQTY); // update qty sa database
$ro->addCharges_cash_autoDispense($status,$registrationNo,$chargesCode,$description,$sellingPrice,$totalDiscount,$grandTotal,$grandTotal,0,0,$timeCharge,$dateCharge,$username,$service,$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room,"dispensedBy_".$username,$ro->getSynapseTime());
}else {
$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,$sellingPrice,$totalDiscount,$grandTotal,$grandTotal,0,0,$timeCharge,$dateCharge,$username,$service,$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);
}

//ORIGINAL
//$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,$sellingPrice,$totalDiscount,$grandTotal,$grandTotal,0,0,$timeCharge,$dateCharge,$username,$service,$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);








}

}




/*
else if($ro->getRegistrationDetails_company() != "" && $ro->getPatientRecord_phic() == "YES" && $ro->getRegistrationDetails_limitHMO() > $ro->getTotal("company","",$registrationNo)) { //for cashs


if($grandTotal > $ro->getRegistrationDetails_limitHMO()) {
$currentHMO = $ro->getRegistrationDetails_limitHMO() - $ro->getTotal("company","",$registrationNo);
$hmo = $grandTotal - $ro->getPHIClimit_supplies();
$cash = $hmo - $ro->getRegistrationDetails_limitHMO();
$phic =  $grandTotal - $hmo ;
$hmo1 = $hmo - $cash;

$hmo_med = $grandTotal - $ro->getPHIClimit_medicine();
$cash_med = $hmo_med - $ro->getRegistrationDetails_limitHMO();
$phic_med =  $grandTotal - $hmo_med ;
$hmo1_med = $hmo_med - $cash_med;
$cash1_med = $cash_med ;
}else {
$currentHMO = $ro->getRegistrationDetails_limitHMO() - $ro->getTotal("company","",$registrationNo);
$hmo = $grandTotal - $ro->getPHIClimit_supplies();
$cash =$hmo - $ro->getRegistrationDetails_limitHMO();
if($cash < 0) $cash=0;
$phic =  $grandTotal - $hmo ;
$hmo1 = $hmo;

$hmo_med = $grandTotal - $ro->getPHIClimit_medicine();
$cash_med = $hmo_med - $ro->getRegistrationDetails_limitHMO();
$phic_med =  $grandTotal - $hmo_med ;
$hmo1_med = $hmo_med ; 
$cash1_med = $cash_med ; if($cash1_med < 0) $cash1_med=0;

}



//$hmo1 = $ro->getRegistrationDetails_limitHMO() - $hmo;
//$cash = $ro->getTotal("company","",$registrationNo) - $hmo;

//$myCash = $ro->getTotal("company","",$registrationNo) - $currentSupplies;

//$cash_med = $grandTotal - $ro->getPHIClimit_medicine();
//$currentMed =  $grandTotal - $cash_med ;

/*
if($title == "SUPPLIES" && $ro->getPHIClimit_supplies() > $ro->getCurrentPHIC_check($registrationNo,"SUPPLIES")  ) {
$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,$sellingPrice,$totalDiscount,$grandTotal,$cash,$phic,$hmo1,$timeCharge,$dateCharge,$username,$service,$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);
}else if($title == "MEDICINE" && $ro->getPHIClimit_medicine() > $ro->getCurrentPHIC_check($registrationNo,"MEDICINE") ) {
$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,$sellingPrice,$totalDiscount,$grandTotal,$cash1_med,$phic_med,$hmo1_med,$timeCharge,$dateCharge,$username,$service,$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);
}
}

else if($ro->getPHIClimit_medicine() > $ro->getCurrentPHIC_check($registrationNo,"MEDICINE")) {
$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,$sellingPrice,$totalDiscount,$grandTotal,$grandTotal,232,0,$timeCharge,$dateCharge,$username,$service,$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);
}



else if($ro->getRegistrationDetails_limitHMO() > $ro->getTotal("company","",$registrationNo) ) {

$currentHMO = $ro->getRegistrationDetails_limitHMO() - $ro->getTotal("company","",$registrationNo);
if($grandTotal > $currentHMO) {
$newCash = $ro->getTotal("company","",$registrationNo) - $currentSupplies;
$company = $grandTotal - $ro->getTotal("company","",$registrationNo);
$hmo = $ro->getRegistrationDetails_limitHMO() - $ro->getTotal("company","",$registrationNo);
$myCash = $grandTotal - $hmo;
}else {
$newCash = $ro->getTotal("company","",$registrationNo) - $currentSupplies;
$company = $grandTotal - $ro->getTotal("company","",$registrationNo);
$hmo = $ro->getRegistrationDetails_limitHMO() - $ro->getTotal("company","",$registrationNo);
$myCash = $grandTotal - $hmo;
}


$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,$sellingPrice,$totalDiscount,$grandTotal,0,0,$grandTotal,$timeCharge,$dateCharge,$username,$service,$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);


}else {
$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,$sellingPrice,$totalDiscount,$grandTotal,$cashUnpaid,0,0,$timeCharge,$dateCharge,$username,$service,$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);
}






/* ORIGINAL CHARGING START HERE
if($paidVia == "Company") { //IF ($paidVia == "Company")

if($ro->getRegistrationDetails_company() != "") { //IF ($ro->getRegistrationDetails_company != "")
$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,$sellingPrice,$totalDiscount,$grandTotal,0,$phic,$grandTotal,$timeCharge,$dateCharge,$username,$service,$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);
}//IF ($ro->getRegistrationDetails_company != "")
else {
echo "<script type='text/javascript'>";
echo "alert('".$ro->getPatientRecord_completeName()." has no Company');";
echo "history.back();";
echo "</script>";
}


}//IF ($paidVia == "Company")
else { //ELSE ($paidVia == "Cash")
$ro->addCharges_cash($status,$registrationNo,$chargesCode,$description,$sellingPrice,$totalDiscount,$grandTotal,$grandTotal,$phic,$company,$timeCharge,$dateCharge,$username,$service,$title,$paidVia,$cashPaid,$batchNo,$quantity,$inventoryFrom,$ro->getRegistrationDetails_branch(),$room);
}//ELSE ($paidVia == "Cash")

*/



?>
