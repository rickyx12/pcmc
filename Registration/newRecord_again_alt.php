<?php
include("../myDatabase.php");
$patientNo = $_GET['patientNo'];
$username = $_GET['username'];



$ro = new database();

$ro->setPatientRecord($patientNo);

echo "<title>Re-Admission Form</title>";

echo "<style type='text/css'>";

echo "
.txtBox {
	border: 1px solid #000;
	color: #000;
	height:30px;
	width: 300px;
	padding:4px 4px 4px 10px;
}

.myInformation {
	border: 1px solid #000;
	color: #000;
	height:30px;
	width: 300px;
	padding:4px 4px 4px 10px;
}

.company {
	border: 1px solid #000;
	color: #000;
	height: 24px;
	width: 350px;
}

.patientAddress {
	border: 1px solid #000;
	color: #000;
	height:60px;
	width: 350px;
	padding:4px 4px 4px 2px;
}


.diagnosis {
	border: 1px solid #000;
	color: #000;
	height:80px;
	width: 350px;
	padding:4px 4px 4px 2px;
}

.birthYear {
	border: 1px solid #000;
	color: #000;
	height:21px;
	width: 80px;
	padding:4px 4px 4px 2px;
}

.comboBox {
border: 1px solid #CCC;
}



";
echo "</style>";

?>
<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/flow/rickyCSS1.css" />
<script type='text/javascript'>
var record = 'Search Record';
function SetMsg (txt,active) {
    if (txt == null) return;
    
 
    if (active) {
        if (txt.value == record) txt.value = '';                     
    } else {
        if (txt.value == '') txt.value = record;
    }
}

window.onload=function() { SetMsg1(document.getElementById('searchRecord', false)); }

</script>



<style type='text/css'>
.txtBox {
	border: 1px solid #CCC;
	color: #999;
	height: 50px;
	width: 350px;
}
</style>

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
    <li><a href="#" class="odd"><font color=yellow><b>Registration Form</b></font><span class="arrow"></span></a></li>
    <li><a href="#">Verify Registration<span class="arrow"></span></a></li>
   <li><a href="#" class="odd">Patient<span class="arrow"></span></a></li>
    <li>&nbsp;&nbsp;</li>
</ol>


<?php

$ro->getRegistrationNo();
$myFile = $ro->getReportInformation("homeRoot")."/COCONUT/trackingNo/registrationNo.dat";
$fh = fopen($myFile, 'r');
$registrationNo = fread($fh, 100);
fclose($fh);

/*
$ro->getPatientID();
$myFile = "/opt/lampp/htdocs/COCONUT/trackingNo/patientID.dat";
$fh = fopen($myFile, 'r');
$patientNo = fread($fh, 100);
fclose($fh);
*/

//newRecord_insert.php
echo "<br><br>";
echo "<body>";
/****
if($ro->checkBalance($patientNo) != 0) {
echo "<Center><font size=2 color=red>This patient has a Balance Pls Proceed to Cashier to pay the unpaid amount</font>";
}
*/
$asql=mysql_query("SELECT status FROM mysettings WHERE feature='regaddinfo' AND status='on'");
$acount=mysql_num_rows($asql);


//newRecord_insert.php
echo "<br><br>";
echo "<body onload='DisplayTime();'>";
if($acount!=0){
echo "<center><div style='border:1px solid #000000; width:500px; height:1473px; border-color:black black black black;'>";
}
else{
echo "<center><div style='border:1px solid #000000; width:500px; height:898px; border-color:black black black black;'>";
}

echo "<form method='get' action='verifyRegistration_alt.php'>";


echo "	<br>";
echo "<input type=text name='lastname' class='myInformation' id='lastname' value='".$ro->getLastName_patientRecord()."' placeholder='LAST NAME' />";

echo "";
echo "<input type=text name='firstname' class='myInformation' id='firstname' value='".$ro->getFirstName_patientRecord()."' placeholder='FIRSTNAME' />";


echo "";
echo "<input type=text name='middlename' class='myInformation' id='middlename' value='".$ro->getMiddleName_patientRecord()."' placeholder='MIDDLE NAME' />";

echo "";
echo "<input type=text name='patientContact' class='myInformation' id='patientContact' value='".$ro->getContactNo_patientRecord()."' placeholder='CONTACT #' >";

$bday = preg_split ("/\_/",$ro->getBirthDate_patientRecord()); 

echo "<br><Br>&nbsp;<font size=3>Birth Date:</font>&nbsp;
<select class='comboBox' name='month'>
<option value=".$bday[0].">".$bday[0]."</option>
<option value='Jan'>Jan</option>
<option value='Feb'>Feb</option>
<option value='Mar'>Mar</option>
<option value='Apr'>Apr</option>
<option value='May'>May</option>
<option value='Jun'>Jun</option>
<option value='Jul'>Jul</option>
<option value='Aug'>Aug</option>
<option value='Sep'>Sep</option>
<option value='Oct'>Oct</option>
<option value='Nov'>Nov</option>
<option value='Dec'>Dec</option>
</select>&nbsp;&nbsp;&nbsp;";
echo "<select name='day' class='comboBox'>";
echo "<option value=".$bday[1].">".$bday[1]."</option>";
for($x=1;$x<=31;$x++) {
echo "<option value='$x'>$x</option>";
}
echo "</select>";

echo "&nbsp;&nbsp;<input type=text name='birthYear' class='birthYear' id='birthyear' value='".$bday[2]."' placeholder='YEAR' />";
echo "<br><font size=3>Gender:</font>&nbsp;";

if($ro->getGender_patientRecord() == "female") {
echo "&nbsp;&nbsp;&nbsp;<font size=2 color=red>Male</font>&nbsp;<input type=radio name='gender' value='male'>";
echo "&nbsp;&nbsp;&nbsp;<font size=2 color=red>Female</font>&nbsp;<input type=radio name='gender' value='female' checked>";
}else {
echo "&nbsp;&nbsp;&nbsp;<font size=2 color=red>Male</font>&nbsp;<input type=radio name='gender' value='male' checked >";
echo "&nbsp;&nbsp;&nbsp;<font size=2 color=red>Female</font>&nbsp;<input type=radio name='gender' value='female'>";
}

echo "<br><font size=3>Senior:</font>";

if($ro->getSenior_patientRecord() == "yes") {
echo "&nbsp;&nbsp;&nbsp;&nbsp;<font size=2 color='blue'>Yes</font>&nbsp;<input type='radio' name='seniorCitizen' value='YES' checked>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<font size=2 color='blue'>No</font> <input type='radio' name='seniorCitizen' value='NO'>&nbsp;&nbsp;&nbsp;&nbsp;";
}else {
echo "&nbsp;&nbsp;&nbsp;&nbsp;<font size=2 color='blue'>Yes</font>&nbsp;<input type='radio' name='seniorCitizen' value='YES'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<font size=2 color='blue'>No</font> <input type='radio' name='seniorCitizen' value='NO' checked>&nbsp;&nbsp;&nbsp;&nbsp;";
}

echo "<br><font size=3>PHIC:</font>";

if($ro->getPHIC_patientRecord() == "no") {
echo "&nbsp;&nbsp;&nbsp;&nbsp;<font size=2 color='blue'>Yes</font>&nbsp;<input type=radio name='philHealth' value='YES'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<font size=2 color='blue'>No</font> <input type=radio name='philHealth' value='NO' checked>&nbsp;&nbsp;&nbsp;&nbsp;";
}else {
echo "&nbsp;&nbsp;&nbsp;&nbsp;<font size=2 color='blue'>Yes</font>&nbsp;<input type=radio name='philHealth' value='YES' checked>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<font size=2 color='blue'>No</font> <input type=radio name='philHealth' value='NO'>&nbsp;&nbsp;&nbsp;&nbsp;";
}

echo "<br><font size=3>Type:</font>";
echo "&nbsp;&nbsp;<select name='phicType' class='comboBox'>";
echo "<option value='".$ro->getPHICtype_patientRecord()."'>".$ro->getPHICtype_patientRecord()."</option>";
$ro->showOption("phicType","type");
echo "</select>";

echo "<br><select class='company' name='civilStatus'>
<option value='".$ro->getCivilStatus_patientRecord()."'>".$ro->getCivilStatus_patientRecord()."</option>
<option value='Single'>Single</option>
<option value='Married'>Married</option>
<option value='Seperated'>Seperated</option>
<option value='Widow'>Widow</option>
</select><br>";

echo "<br><textarea class='patientAddress'
id='patientAddress'
name='Address' placeholder='ADDRESS'>".$ro->getAddress_patientRecord()."</textarea>";



$asql=mysql_query("SELECT status FROM mysettings WHERE feature='regaddinfo' AND status='on'");
$acount=mysql_num_rows($asql);
if($acount!=0){
echo "<br><br><input type=text name='birthPlace' id='birthPlace' class='myInformation' autocomplete='off' placeholder='BIRTH PLACE'>";
echo "<br><input type=text name='nationality' id='nationality' class='myInformation' placeholder='NATIONALITY'>";
echo "<br><input type=text name='pxOccupation' id='pxOccupation' class='myInformation' placeholder='PATIENT OCCUPATION'>";
echo "<br><br><input type=text name='fathersName' id='fathersName' class='myInformation' autocomplete='off' placeholder='FATHER&#39;S NAME'>";
echo "<br><input type=text name='fatherAddress' id='fatherAddress' class='myInformation' autocomplete='off' placeholder='FATHER&#39;S ADDRESS'>";
echo "<br><input type=text name='fatherContactNo' id='fatherContactNo' class='myInformation' autocomplete='off' placeholder='FATHER&#39;S CONTACT NO.'>";
echo "<br><br><input type=text name='mothersName' id='mothersName' class='myInformation' autocomplete='off' placeholder='MOTHER&#39;S NAME'>";
echo "<br><input type=text name='motherAddress' id='motherAddress' class='myInformation' autocomplete='off' placeholder='MOTHER&#39;S ADDRESS'>";
echo "<br><input type=text name='motherContactNo' id='motherContactNo' class='myInformation' autocomplete='off' placeholder='MOTHER&#39;S CONTACT NO.'>";
echo "<br><br><input type=text name='spouseName' id='spouseName' class='myInformation' autocomplete='off' placeholder='SPOUSE&#39;S NAME'>";
echo "<br><input type=text name='spouseAddress' id='spouseAddress' class='myInformation' autocomplete='off' placeholder='SPOUSE&#39;S ADDRESS'>";
echo "<br><input type=text name='spouseContactNo' id='spouseContactNo' class='myInformation' autocomplete='off' placeholder='SPOUSE&#39;S CONTACT NO.'>";

echo "<br><br><input type=text name='informant' id='informant' class='myInformation' autocomplete='off' placeholder='INFORMANT&#39;S NAME'>";
echo "<br><input type=text name='relationtopatient' id='relationtopatient' class='myInformation' placeholder='RELATION TO PATIENT'>";
echo "<br><input type=text name='informantaddress' id='informantaddress' class='myInformation' autocomplete='off' placeholder='INFORMANT&#39;S ADDRESS'>";
echo "<br><input type=text name='informantcontactno' id='informantcontactno' class='myInformation' autocomplete='off' placeholder='INFORMANT&#39;S CONTACT NO.'>";
}
else{
echo "<input type='hidden' name='birthPlace' value='' />";
echo "<input type='hidden' name='nationality' value='' />";
echo "<input type='hidden' name='pxOccupation' value='' />";
echo "<input type='hidden' name='fathersName' value='' />";
echo "<input type='hidden' name='fatherAddress' value='' />";
echo "<input type='hidden' name='fatherContactNo' value='' />";
echo "<input type='hidden' name='mothersName' value='' />";
echo "<input type='hidden' name='motherAddress' value='' />";
echo "<input type='hidden' name='motherContactNo' value='' />";
echo "<input type='hidden' name='spouseName' value='' />";
echo "<input type='hidden' name='spouseAddress' value='' />";
echo "<input type='hidden' name='spouseContactNo' value='' />";
echo "<input type='hidden' name='informant' value='' />";
echo "<input type='hidden' name='relationtopatient' value='' />";
echo "<input type='hidden' name='informantaddress' value='' />";
echo "<input type='hidden' name='informantcontactno' value='' />";
}



echo "<br><br><input type=text name='bloodpressure' id='bloodPressure' class='myInformation' placeholder='BLOOD PRESSURE' />";

echo "<br><input type=text name='patientTemperature' id='patientTemperature' class='myInformation' placeholder='TEMPERATURE' />";


echo "<br><input type=text name='height' id='height' class='myInformation' placeholder='HEIGHT' />";

echo "<br><input type=text name='weight' id='weight' class='myInformation' placeholder='WEIGHT' />";


echo "<br><br><textarea class='diagnosis' id='diagnosis' name='diagnosis' placeholder='Chief Complaint'></textarea>";


echo "<Br><br><select name='company' class='company'>";
echo "<option>Select Company</option>";
$ro->getAllCompany();
echo "</select>";

echo "<Br><br><select name='casetype' class='company'>";
echo "<option value='Standard_PHIC_Medicine'>Standard_PHIC_Medicine</option>";
$ro->showOption("phicLimit","casetype");
echo "</select>";


echo "<Br><Br>";

echo "<select name='admittingDoctor' class='company' >";
echo "<option value='admitting'>&nbsp;Admitting Doctor</option>";
$ro->showOption("Doctors","Name");
echo "</select>";


echo "<Br><Br>";

echo "<select name='attendingDoctor' class='company' >";
echo "<option value='attending'>&nbsp;Attending Doctor</option>";
$ro->showOption("Doctors","Name");
echo "</select>";




echo "<Br><br><select name='room' class='company'>";
echo "<option value='OPD'>OPD</option>";
echo "<option value='ER'>ER</option>";
echo "<option value='DIALYSIS'>DIALYSIS</option>";
echo "<option value='OR/DR'>OR/DR</option>";
$ro->showOptionRoom("room","Description","status");
echo "</select>";



echo "<p id='curTime'></p>";
echo "<input type=hidden name='registrationNo' value='$registrationNo'>";
echo "<input type=hidden name='patientNo' value='$patientNo'>";
echo "<input type=hidden name='registrationStatus' value='old'>";
echo "<input type=hidden name='serverTime' value='".$ro->getSynapseTime()."'>";
echo "<input type=hidden name='dateRegistered' value='".date("Y-m-d")."'>";


echo "<br><br><input type=submit value='Register' style='border:1px solid #000000; background:#3b5998 no-repeat 4px 4px; color:white;'><br>";
echo "<input name='username' type='hidden' value='$username' />";
echo "</form>";

echo "</div>

</center>";
echo "</body>";
?>
