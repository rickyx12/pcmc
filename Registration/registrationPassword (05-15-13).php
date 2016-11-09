<?php

include("../myDatabase.php");
$patientNo = $_POST['patientNo'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$patientContact = $_POST['patientContact'];
$month = $_POST['month'];
$day = $_POST['day'];
$birthYear = $_POST['birthYear'];
$gender = $_POST['gender'];
$seniorCitizen = $_POST['seniorCitizen'];
$philHealth = $_POST['philHealth'];
$address = $_POST['Address'];
$diagnosis = $_POST['diagnosis'];
$civilStatus = $_POST['civilStatus'];

$registrationNo = $_POST['registrationNo'];
$bloodpressure = $_POST['bloodpressure'];
$patientTemperature = $_POST['patientTemperature'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$company = $_POST['company'];
$serverTime = $_POST['serverTime'];
$registrationStatus = $_POST['registrationStatus'];
$room = $_POST['room'];
$casetype = $_POST['casetype'];
$attendingDoctor = $_POST['attendingDoctor'];
$admittingDoctor = $_POST['admittingDoctor'];
$phicType = $_POST['phicType'];
$password = $_POST['password'];

$dateRegistered = $_POST['dateRegistered'];

$ro = new database();

$ro->getAuthorizedRegistrar($password);

if($ro->getUserRegistrar() == "REGISTRATION" || $ro->getUserRegistrar() == "PHARMACY" || $ro->getUserRegistrar() == "CASHIER" || $ro->getUserRegistrar() == "BILLING" || $ro->getUserRegistrar() == "LABORATORY" ) { //IF 1

if($lastname == "") {
echo "<script type='text/javascript'>";
echo "alert('Pls Enter a Last name');";
echo "history.back();";
echo "</script>";

}

if($firstname == "") {
echo "<script type='text/javascript'>";
echo "alert('Pls Enter a First name');";
echo "history.back();";
echo "</script>";

}

if($middlename == "") {
echo "<script type='text/javascript'>";
echo "alert('Pls Enter a Middle name');";
echo "history.back();";
echo "</script>";

}

if($birthYear == "Year") {
echo "<script type='text/javascript'>";
echo "alert('Pls Enter a Birth Year');";
echo "history.back();";
echo "</script>";

}

if($company == "Select Company") {
$company = "";
}

$completeName = $lastname." ".$firstname." ".$middlename;
$x=0;
$year = date("Y");
$x = (int)$year;
$birthDate = $month."_".$day."_".$birthYear;
try {


if($registrationStatus == "new") { // Registration Status [new]

$ro->addNewPatientRecord($patientNo,$lastname,$firstname,$middlename,$completeName,($x - $birthYear),$patientContact,$birthDate,$gender,$seniorCitizen,$address,$philHealth,$civilStatus,$phicType);

if($room == "OPD") {
$ro->addNewRegistration($patientNo,$registrationNo,$bloodpressure,$patientTemperature,$height,$weight,$company,$diagnosis,$dateRegistered,$serverTime,$ro->getUserBranch($password),"OPD","OPD_OPD",$ro->getUserRegistered(),$casetype,"2000");
}else if($room == "ER") {
$ro->addNewRegistration($patientNo,$registrationNo,$bloodpressure,$patientTemperature,$height,$weight,$company,$diagnosis,$dateRegistered,$serverTime,$ro->getUserBranch($password),"ER","ER_ER",$ro->getUserRegistered(),$casetype,"2000");
}else if($room == "OR/DR") {
$ro->addNewRegistration($patientNo,$registrationNo,$bloodpressure,$patientTemperature,$height,$weight,$company,$diagnosis,$dateRegistered,$serverTime,$ro->getUserBranch($password),"OR/DR","OR/DR_OR/DR",$ro->getUserRegistered(),$casetype,"2000");
}else {
$ro->addNewRegistration($patientNo,$registrationNo,$bloodpressure,$patientTemperature,$height,$weight,$company,$diagnosis,$dateRegistered,$serverTime,$ro->getUserBranch($password),"IPD",$room,$ro->getUserRegistered(),$casetype,"2000");

$timezone = "Asia/Manila";
date_default_timezone_set ($timezone);

//ADD ROOM
$ro->EditNow("room","Description",$room,"status","Occupied");//GWEN OCCUPIED ANG STATUS NG ROOM
$ro->getRoom($room); 
$ro->addCharges_cash("UNPAID",$registrationNo,$room,$room,$ro->room_rate(),0,$ro->room_rate(),$ro->room_rate(),0,0,$serverTime,$dateRegistered,$ro->getUserRegistered(),"Confinement","Room And Board","Cash",0,"",1,"",$ro->getUserBranch($password),"");

//ADD ATTENDING AND ADMITTING DOCTOR

//ATTENDING & ADMITTING

if( $attendingDoctor == "attending" && $admittingDoctor == "admitting" ) { }
else if( $attendingDoctor != "attending" && $admittingDoctor == "admitting" ) {
$ro->addCharges_cash_registration("UNPAID",$registrationNo,$ro->selectNow("Doctors","doctorCode","Name",$attendingDoctor),$attendingDoctor,"0/0",0,0,0,0,0,$serverTime,$dateRegistered,$ro->getUserRegistered(),"Attending","PROFESSIONAL FEE","Cash",0,"",1,"",$ro->getUserBranch($password),"");
}else if( $attendingDoctor == "attending" && $admittingDoctor != "admitting" ) {
$ro->addCharges_cash_registration("UNPAID",$registrationNo,$ro->selectNow("Doctors","doctorCode","Name",$admittingDoctor),$admittingDoctor,"0/0",0,0,0,0,0,$serverTime,$dateRegistered,$ro->getUserRegistered(),"ADMITTING","PROFESSIONAL FEE","Cash",0,"",1,"",$ro->getUserBranch($password),"");
}else if( $attendingDoctor != "attending" && $admittingDoctor != "admitting" ) {
$ro->addCharges_cash_registration("UNPAID",$registrationNo,$ro->selectNow("Doctors","doctorCode","Name",$admittingDoctor),$admittingDoctor,"0/0",0,0,0,0,0,$serverTime,$dateRegistered,$ro->getUserRegistered(),"ADMITTING","PROFESSIONAL FEE","Cash",0,"",1,"",$ro->getUserBranch($password),"");

$ro->addCharges_cash_registration("UNPAID",$registrationNo,$ro->selectNow("Doctors","doctorCode","Name",$attendingDoctor),$attendingDoctor,"0/0",0,0,0,0,0,$serverTime,$dateRegistered,$ro->getUserRegistered(),"Attending","PROFESSIONAL FEE","Cash",0,"",1,"",$ro->getUserBranch($password),"");
}else {
//
}





}

} // Registration Status [new]
else {  // Registration Status [old]

if($room == "OPD") {
$ro->addNewRegistration($patientNo,$registrationNo,$bloodpressure,$patientTemperature,$height,$weight,$company,$diagnosis,$dateRegistered,$serverTime,$ro->getUserBranch($password),"OPD","OPD_OPD",$ro->getUserRegistered(),$casetype,"2000");
}else if($room == "ER") {
$ro->addNewRegistration($patientNo,$registrationNo,$bloodpressure,$patientTemperature,$height,$weight,$company,$diagnosis,$dateRegistered,$serverTime,$ro->getUserBranch($password),"ER","ER_ER",$ro->getUserRegistered(),$casetype,"2000");
}else if($room == "OR/DR") {
$ro->addNewRegistration($patientNo,$registrationNo,$bloodpressure,$patientTemperature,$height,$weight,$company,$diagnosis,$dateRegistered,$serverTime,$ro->getUserBranch($password),"OR/DR","OR/DR_OR/DR",$ro->getUserRegistered(),$casetype,"2000");
}else {
$ro->addNewRegistration($patientNo,$registrationNo,$bloodpressure,$patientTemperature,$height,$weight,$company,$diagnosis,$dateRegistered,$serverTime,$ro->getUserBranch($password),"IPD",$room,$ro->getUserRegistered(),$casetype,"2000");

$timezone = "Asia/Manila";
date_default_timezone_set ($timezone);

//ADD ROOM
$ro->EditNow("room","Description",$room,"status","Occupied");//GWEN OCCUPIED ANG STATUS NG ROOM
$ro->getRoom($room); 
$ro->addCharges_cash("UNPAID",$registrationNo,$room,$room,$ro->room_rate(),0,$ro->room_rate(),$ro->room_rate(),0,0,$serverTime,$dateRegistered,$ro->getUserRegistered(),"Confinement","Room And Board","Cash",0,"",1,"",$ro->getUserBranch($password),"");


//ADD ATTENDING AND ADMITTING DOCTOR

//ATTENDING & ADMITTING

if( $attendingDoctor == "attending" && $admittingDoctor == "admitting" ) { }
else if( $attendingDoctor != "attending" && $admittingDoctor == "admitting" ) {
$ro->addCharges_cash_registration("UNPAID",$registrationNo,$ro->selectNow("Doctors","doctorCode","Name",$attendingDoctor),$attendingDoctor,"0/0",0,0,0,0,0,$serverTime,$dateRegistered,$ro->getUserRegistered(),"Attending","PROFESSIONAL FEE","Cash",0,"",1,"",$ro->getUserBranch($password),"");
}else if( $attendingDoctor == "attending" && $admittingDoctor != "admitting" ) {
$ro->addCharges_cash_registration("UNPAID",$registrationNo,$ro->selectNow("Doctors","doctorCode","Name",$admittingDoctor),$admittingDoctor,"0/0",0,0,0,0,0,$serverTime,$dateRegistered,$ro->getUserRegistered(),"ADMITTING","PROFESSIONAL FEE","Cash",0,"",1,"",$ro->getUserBranch($password),"");
}else if( $attendingDoctor != "attending" && $admittingDoctor != "admitting" ) {
$ro->addCharges_cash_registration("UNPAID",$registrationNo,$ro->selectNow("Doctors","doctorCode","Name",$admittingDoctor),$admittingDoctor,"0/0",0,0,0,0,0,$serverTime,$dateRegistered,$ro->getUserRegistered(),"ADMITTING","PROFESSIONAL FEE","Cash",0,"",1,"",$ro->getUserBranch($password),"");

$ro->addCharges_cash_registration("UNPAID",$registrationNo,$ro->selectNow("Doctors","doctorCode","Name",$attendingDoctor),$attendingDoctor,"0/0",0,0,0,0,0,$serverTime,$dateRegistered,$ro->getUserRegistered(),"Attending","PROFESSIONAL FEE","Cash",0,"",1,"",$ro->getUserBranch($password),"");
}else {
//
}


}

$ro->editNow("patientRecord","patientNo",$patientNo,"lastName",$lastname);
$ro->editNow("patientRecord","patientNo",$patientNo,"firstName",$firstname);
$ro->editNow("patientRecord","patientNo",$patientNo,"middleName",$middlename);
$ro->editNow("patientRecord","patientNo",$patientNo,"contactNo",$patientContact);
$ro->editNow("patientRecord","patientNo",$patientNo,"Birthdate",$birthDate);
$ro->editNow("patientRecord","patientNo",$patientNo,"Gender",$gender);
$ro->editNow("patientRecord","patientNo",$patientNo,"Senior",$seniorCitizen);
$ro->editNow("patientRecord","patientNo",$patientNo,"Address",$address);
$ro->editNow("patientRecord","patientNo",$patientNo,"PHIC",$philHealth);
$ro->editNow("patientRecord","patientNo",$patientNo,"civilStatus",$civilStatus);
$ro->editNow("patientRecord","patientNo",$patientNo,"phicType",$phicType);
$ro->editNow("patientRecord","patientNo",$patientNo,"completeName",$completeName);
} // Registration Status [old]



echo "
<script type='text/javascript'>
window.location='http://".$ro->getMyUrl()."/Registration/patient.php?registrationNo=$registrationNo&username=".$ro->getUserRegistered()."';
</script>
";

}catch(Exception $e) {
echo "
<script type='text/javascript'>
window.back();
</script>

";
}



} //IF 1
else { //ELSE 1
echo "
<script type='text/javascript'>
alert('WRONG AUTHENTICATION');
history.back();
</script>

";
} //ELSE 1




?>
