<?php
include("../myDatabase.php");
$patientNo = $_GET['patientNo'];
$lastname = $_GET['lastname'];
$firstname = $_GET['firstname'];
$middlename = $_GET['middlename'];
$patientContact = $_GET['patientContact'];
$month = $_GET['month'];
$day = $_GET['day'];
$birthYear = $_GET['birthYear'];
$gender = $_GET['gender'];
$seniorCitizen = $_GET['seniorCitizen'];
$philHealth = $_GET['philHealth'];
$phicType = $_GET['phicType'];
$address = $_GET['Address'];
$diagnosis = $_GET['diagnosis'];
$civilStatus = $_GET['civilStatus'];
$room = $_GET['room'];
$registrationNo = $_GET['registrationNo'];
$bloodpressure = $_GET['bloodpressure'];
$patientTemperature = $_GET['patientTemperature'];
$weight = $_GET['weight'];
$height = $_GET['height'];
$company = $_GET['company'];
$serverTime = $_GET['serverTime'];
$registrationStatus = $_GET['registrationStatus'];
$casetype = $_GET['casetype'];
$dateRegistered = $_GET['dateRegistered'];
$attendingDoctor = $_GET['attendingDoctor'];
$admittingDoctor = $_GET['admittingDoctor'];


$birthPlace = $_GET['birthPlace'];
$nationality = $_GET['nationality'];
$pxOccupation = $_GET['pxOccupation'];
$fathersName = $_GET['fathersName'];
$fatherAddress = $_GET['fatherAddress'];
$fatherContactNo = $_GET['fatherContactNo'];
$mothersName = $_GET['mothersName'];
$motherAddress = $_GET['motherAddress'];
$motherContactNo = $_GET['motherContactNo'];
$spouseName = $_GET['spouseName'];
$spouseAddress = $_GET['spouseAddress'];
$spouseContactNo = $_GET['spouseContactNo'];

$informant = $_GET['informant'];
$relationtopatient = $_GET['relationtopatient'];
$informantaddress = $_GET['informantaddress'];
$informantcontactno = $_GET['informantcontactno'];

$bday=$month."_".$day."_".$birthYear;

$ro = new database();

?>

<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/flow/rickyCSS1.css" />

<script type='text/javascript'>
$("#breadcrumbs a").hover(
    function () {
        $(this).addClass("hover").children().addClass("hover");
        $(this).parent().prev().find("span.arrow:first").addClass("pre_hover");
    },
    function () {
        $(this).removeClass("hover").children().removeClass("hover");
        $(this).parent().prev().find("span.arrow:first").removeClass("pre_hover");
    }
);
</script>

<ol id="breadcrumbs">
   <li><a href="http://<?php echo $ro->getMyUrl(); ?>/LOGINPAGE/module.php"><font color=white>Home</font><span class="arrow"></span></a></li>
    <li><a href="#" class="odd"><font color=white>Registration</font><span class="arrow"></span></a></li>
    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/opdRegistration.php?module=REGISTRATION"><font color=white>Verify Patient Record</font><span class="arrow"></span></a></li>
<?php 
 echo "<li><a onClick='javascript:history.go(-1)' class='odd'><font color=white><b>Registration Form</b></font><span class='arrow'></span></a></li>";
?>
    <li><a href="#"><font color="yellow">Verify Registration</font><span class="arrow"></span></a></li>
   <li><a href="#" class="odd">Patient<span class="arrow"></span></a></li>
    <li>&nbsp;&nbsp;</li>
</ol>


<?php

$ro->coconutUpperMenuStart();
$ro->coconutUpperMenuStop();

echo "
<style type='text/css'>
.txtBox {
	border: 1px solid #CCC;
	color: #999;
	height:30px;
	width: 300px;
	padding:4px 4px 4px 5px;
}
</style>
";

echo "<script type='text/javascript'>

var password = 'Password';
function SetPassword (txt,active) {
    if (txt == null) return;
    
 
    if (active) {
        if (txt.value == password) txt.value = '';                     
    } else {
        if (txt.value == '') txt.value = password;
    }
}

window.onload=function() { SetLastName(document.getElementById('password', false)); }
</script>
";


mysql_connect($ro->myHost(),$ro->getUser(),$ro->getPass());
mysql_select_db($ro->getDB());

$lnametrim=trim($lastname);
$fnametrim=trim($firstname);
$mnametrim=trim($middlename);

$lname=strtoupper($lnametrim);
$fname=strtoupper($fnametrim);
$mname=strtoupper($mnametrim);

$asql=mysql_query("SELECT rd.registrationNo FROM patientRecord pr, registrationDetails rd WHERE pr.patientNo=rd.patientNo AND pr.lastName LIKE '$lname' AND pr.firstName LIKE '$fname' AND pr.middleName LIKE '$mname' AND pr.Birthdate='$bday' AND rd.dateRegistered='".date("Y-m-d")."' AND rd.dateUnregistered=''");

$acount=mysql_num_rows($asql);

if($acount!=0){

$patientSearch=$lname." ".$fname." ".$mname."_".$patientNo;


echo "
<br /><br /><br />
<div align='center'>
<font face='arial' color='red' size='4'>Patient has already been registered today! Search patient transaction.</font>
<form name='Patient' method='get' action='../COCONUT/currentPatient/patientInterface.php'>
<input type='submit' name='submit' value='Proceed' />
<input type='hidden' name='completeName' value='$patientSearch' />
</form>
</div>
";


}
else if($acount==0){


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

/*if($middlename == "") {
echo "<script type='text/javascript'>";
echo "alert('Pls Enter a Middle name');";
echo "history.back();";
echo "</script>";

}*/

if($birthYear == "Year") {
echo "<script type='text/javascript'>";
echo "alert('Pls Enter a Birth Year');";
echo "history.back();";
echo "</script>";

}


echo "<Br><Br><center><div style='border:1px solid #000000; width:500px; height:120px; border-color:black black black black;'>";
echo "<form method='post' action='registrationPassword.php'>";
echo "<br><br>";
echo "<font size=3>Password:</font>&nbsp;";
echo "<input type=password name='password' class='txtBox' id='Password' 
 >";
echo "<br><br><input type=submit value='Verify' style='border:1px solid #000000; background:#3b5998 no-repeat 4px 4px; color:white;'>";
echo "</div></center>";
echo "<input type=hidden name='patientNo' value='$patientNo'>";
echo "<input type=hidden name='lastname' value='".trim($lastname)."'>";
echo "<input type=hidden name='firstname' value='".trim($firstname)."'>";
echo "<input type=hidden name='middlename' value='".trim($middlename)."'>";
echo "<input type=hidden name='patientContact' value='".trim($patientContact)."'>";
echo "<input type=hidden name='month' value='$month'>";
echo "<input type=hidden name='day' value='$day'>";
echo "<input type=hidden name='birthYear' value='".trim($birthYear)."'>";
echo "<input type=hidden name='gender' value='$gender'>";
echo "<input type=hidden name='seniorCitizen' value='$seniorCitizen'>";
echo "<input type=hidden name='philHealth' value='$philHealth'>";
echo "<input type=hidden name='Address' value='$address'>";
echo "<input type=hidden name='diagnosis' value='$diagnosis'>";
echo "<input type=hidden name='registrationNo' value='$registrationNo'>";
echo "<input type=hidden name='bloodpressure' value='$bloodpressure'>";
echo "<input type=hidden name='patientTemperature' value='$patientTemperature'>";
echo "<input type=hidden name='weight' value='$weight'>";
echo "<input type=hidden name='height' value='$height'>";
echo "<input type=hidden name='company' value='$company'>";
echo "<input type=hidden name='serverTime' value='$serverTime'>";
echo "<input type=hidden name='civilStatus' value='$civilStatus'>";
echo "<input type=hidden name='registrationStatus' value='$registrationStatus'>";
echo "<input type=hidden name='room' value='$room'>";
echo "<input type=hidden name='phicType' value='$phicType'>";
echo "<input type=hidden name='casetype' value='$casetype'>";
echo "<input type=hidden name='dateRegistered' value='$dateRegistered'>";
echo "<input type=hidden name='admittingDoctor' value='$admittingDoctor'>";
echo "<input type=hidden name='attendingDoctor' value='$attendingDoctor'>";

echo "<input type=hidden name='birthPlace' value='$birthPlace' >";
echo "<input type=hidden name='nationality' value='$nationality' >";
echo "<input type=hidden name='pxOccupation' value='$pxOccupation' >";
echo "<input type=hidden name='fathersName' value='$fathersName' >";
echo "<input type=hidden name='fatherAddress' value='$fatherAddress' >";
echo "<input type=hidden name='fatherContactNo' value='$fatherContactNo' >";
echo "<input type=hidden name='mothersName' value='$mothersName' >";
echo "<input type=hidden name='motherAddress' value='$motherAddress' >";
echo "<input type=hidden name='motherContactNo' value='$motherContactNo' >";
echo "<input type=hidden name='spouseName' value='$spouseName' >";
echo "<input type=hidden name='spouseAddress' value='$spouseAddress' >";
echo "<input type=hidden name='spouseContactNo' value='$spouseContactNo' >";
echo "<input type=hidden name='informant' value='$informant' >";
echo "<input type=hidden name='relationtopatient' value='$relationtopatient' >";
echo "<input type=hidden name='informantaddress' value='$informantaddress' >";
echo "<input type=hidden name='informantcontactno' value='$informantcontactno' >";

echo "</form>";

}

?>
