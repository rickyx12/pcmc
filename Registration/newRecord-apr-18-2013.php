<?php
include("../myDatabase.php");

$ro = new database();

echo "<title>Registration Form (New Patient)</title>";
echo "<script type='text/javascript'>

var lastname = 'LAST NAME';
function SetLastName (txt,active) {
    if (txt == null) return;
    
 
    if (active) {
        if (txt.value == lastname) txt.value = '';                     
    } else {
        if (txt.value == '') txt.value = lastname;
    }
}

window.onload=function() { SetLastName(document.getElementById('lastname', false)); }


var firstname = 'FIRST NAME';
function SetFirstName (txt,active) {
    if (txt == null) return;
    
 
    if (active) {
        if (txt.value == firstname) txt.value = '';                     
    } else {
        if (txt.value == '') txt.value = firstname;
    }
}

window.onload=function() { SetFirstName(document.getElementById('firstname', false)); }


var middlename = 'MIDDLE NAME';
function SetMiddleName (txt,active) {
    if (txt == null) return;
    
 
    if (active) {
        if (txt.value == middlename) txt.value = '';                     
    } else {
        if (txt.value == '') txt.value = middlename;
    }
}

window.onload=function() { SetMiddleName(document.getElementById('middlename', false)); }


var birthyear = 'Year';
function SetBirthYear (txt,active) {
    if (txt == null) return;
    
 
    if (active) {
        if (txt.value == birthyear) txt.value = '';                     
    } else {
        if (txt.value == '') txt.value = birthyear;
    }
}

window.onload=function() { SetBirthYear(document.getElementById('birthyear', false)); }


var patientAddress = 'ADDRESS';
function SetAddress (txt,active) {
    if (txt == null) return;
    
 
    if (active) {
        if (txt.value == patientAddress) txt.value = '';                     
    } else {
        if (txt.value == '') txt.value = patientAddress;
    }
}

window.onload=function() { SetAddress(document.getElementById('patientAddress', false)); }


var contactNo = 'Contact No#';
function SetContact (txt,active) {
    if (txt == null) return;
    
 
    if (active) {
        if (txt.value == contactNo) txt.value = '';                     
    } else {
        if (txt.value == '') txt.value = contactNo;
    }
}

window.onload=function() { SetContact(document.getElementById('patientContact', false)); }


var bp = 'BLOOD PRESSURE';
function SetBP (txt,active) {
    if (txt == null) return;
    
 
    if (active) {
        if (txt.value == bp) txt.value = '';                     
    } else {
        if (txt.value == '') txt.value = bp;
    }
}

window.onload=function() { SetBP(document.getElementById('bloodPressure', false)); }


var temp = 'TEMPERATURE';
function SetTemp (txt,active) {
    if (txt == null) return;
    
 
    if (active) {
        if (txt.value == temp) txt.value = '';                     
    } else {
        if (txt.value == '') txt.value = temp;
    }
}

window.onload=function() { SetBP(document.getElementById('patientTemperature', false)); }

var height = 'HEIGHT';
function SetHeight (txt,active) {
    if (txt == null) return;
    
 
    if (active) {
        if (txt.value == height) txt.value = '';                     
    } else {
        if (txt.value == '') txt.value = height;
    }
}

window.onload=function() { SetHeight(document.getElementById('height', false)); }


var weight = 'WEIGHT';
function SetWeight (txt,active) {
    if (txt == null) return;
    
 
    if (active) {
        if (txt.value == weight) txt.value = '';                     
    } else {
        if (txt.value == '') txt.value = weight;
    }
}

window.onload=function() { SetHeight(document.getElementById('weight', false)); }



var diagnosis = 'INITIAL DIAGNOSIS';
function SetInitialDiagnosis (txt,active) {
    if (txt == null) return;
    
 
    if (active) {
        if (txt.value == diagnosis) txt.value = '';                     
    } else {
        if (txt.value == '') txt.value = diagnosis;
    }
}

window.onload=function() { SetInitialDiagnosis(document.getElementById('diagnosis', false)); }


</script>";

echo "<style type='text/css'>";

echo ".txtBox {
	border: 1px solid #CCC;
	color: #999;
	height:30px;
	width: 300px;
	padding:4px 4px 4px 2px;
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

$ro->coconutUpperMenuStart();
$ro->coconutUpperMenuStop();

$ro->getRegistrationNo();
$myFile = $ro->getReportInformation("homeRoot")."/COCONUT/trackingNo/registrationNo.dat";
$fh = fopen($myFile, 'r');
$registrationNo = fread($fh, 100);
fclose($fh);


$ro->getPatientID();
$myFile = $ro->getReportInformation("homeRoot")."/COCONUT/trackingNo/patientID.dat";
$fh = fopen($myFile, 'r');
$patientNo = fread($fh, 100);
fclose($fh);


//newRecord_insert.php
echo "<br><br>";
echo "<body onload='DisplayTime();'>";
echo "<center><div style='border:1px solid #000000; width:500px; height:727px; border-color:black black black black;'>";
echo "<form method='get' action='verifyRegistration.php'>";

echo "	<br>";
echo "<input type=text name='lastname' class='myInformation' id='firstname' value='LAST NAME' 
onfocus='SetLastName(this, true);'
onblur='SetLastName(this,false);'
 >";

echo "";
echo "<input type=text name='firstname' class='myInformation' id='firstname' value='FIRST NAME' 
onfocus='SetFirstName(this, true);'
onblur='SetFirstName(this,false);'
 >";


echo "";
echo "<input type=text name='middlename' class='myInformation' id='middlename' value='MIDDLE NAME' 
onfocus='SetMiddleName(this, true);'
onblur='SetMiddleName(this,false);'
 >";

echo "";
echo "<input type=text name='patientContact' class='myInformation' id='patientContact' value='Contact No#' 
onfocus='SetContact(this, true);'
onblur='SetContact(this,false);'
 >";


echo "<br><Br>&nbsp;<font size=3>Birth Date:</font>&nbsp;
<select class='comboBox' name='month'>
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
for($x=1;$x<=31;$x++) {
echo "<option value='$x'>$x</option>";
}
echo "</select>";

echo "&nbsp;&nbsp;<input type=text name='birthYear' class='birthYear' id='birthyear' value='Year' 
onfocus='SetBirthYear(this, true);'
onblur='SetBirthYear(this,false);'
>";
echo "<br><font size=3>Gender:</font>&nbsp;";
echo "&nbsp;&nbsp;&nbsp;<font size=2 color=red>Male</font>&nbsp;<input type=radio name='gender' value='male' checked>";
echo "&nbsp;&nbsp;&nbsp;<font size=2 color=red>Female</font>&nbsp;<input type=radio name='gender' value='female'>";

echo "<br><font size=3>Senior:</font>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;<font size=2 color='blue'>Yes</font>&nbsp;<input type='radio' name='seniorCitizen' value='YES'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<font size=2 color='blue'>No</font> <input type='radio' name='seniorCitizen' value='NO' checked>&nbsp;&nbsp;&nbsp;&nbsp;";


echo "<br><font size=3>PHIC:</font>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;<font size=2 color='blue'>Yes</font>&nbsp;<input type=radio name='philHealth' value='YES'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<font size=2 color='blue'>No</font> <input type=radio name='philHealth' value='NO' checked>&nbsp;&nbsp;&nbsp;&nbsp;";

echo "<br><font size=3>Type:</font>";
echo "&nbsp;&nbsp;<select name='phicType' class='comboBox'>";
echo "<option value=''></option>";
$ro->showOption("phicType","type");
echo "</select>";

echo "<br><select class='company' name='civilStatus'>
<option value='Single'>Single</option>
<option value='Married'>Married</option>
<option value='Seperated'>Seperated</option>
<option value='Widow'>Widow</option>
</select><br>";

echo "<br><textarea class='patientAddress'
id='patientAddress'
name='Address'
onfocus='SetAddress(this, true);'
onblur='SetAddress(this,false);'
>ADDRESS</textarea>";



echo "<br><br><input type=text name='bloodpressure' id='bloodPressure' class='myInformation' value='BLOOD PRESSURE'
onfocus='SetBP(this, true);'
onblur='SetBP(this,false);'
>";

echo "<br><input type=text name='patientTemperature' id='patientTemperature' class='myInformation' value='TEMPERATURE'
onfocus='SetTemp(this, true);'
onblur='SetTemp(this,false);'
>";


echo "<br><input type=text name='height' id='height' class='myInformation' value='HEIGHT'
onfocus='SetHeight(this, true);'
onblur='SetHeight(this,false);'
>";

echo "<br><input type=text name='weight' id='weight' class='myInformation' value='WEIGHT'
onfocus='SetWeight(this, true);'
onblur='SetWeight(this,false);'
>";


echo "<br><br><textarea class='diagnosis'
id='diagnosis'
name='diagnosis'
onfocus='SetInitialDiagnosis(this, true);'
onblur='SetInitialDiagnosis(this,false);'
>Chief Complaint</textarea>";



echo "<Br><br><select name='company' class='company'>";
echo "<option>Select Company</option>";
$ro->getAllCompany();
echo "</select>";

echo "<Br><br><select name='casetype' class='company'>";
echo "<option value='Standard_PHIC_Medicine'>Standard_PHIC_Medicine</option>";
$ro->showOption("phicLimit","casetype");
echo "</select>";

echo "<Br><br><select name='room' class='company'>";
echo "<option value='OPD'>OPD</option>";
echo "<option value='ER'>ER</option>";
echo "<option value='OR/DR'>OR/DR</option>";
$ro->showOptionRoom("room","Description","status");
echo "</select>";


echo "<p id='curTime'></p>";
echo "<input type=hidden name='registrationNo' value='$registrationNo'>";
echo "<input type=hidden name='patientNo' value='$patientNo'>";
echo "<input type=hidden name='registrationStatus' value='new'>";
echo "<input type=hidden name='serverTime' value='".$ro->getSynapseTime()."'>";
echo "<input type=hidden name='dateRegistered' value='".date("M_d_Y")."'>";

echo "<br><br><input type=submit value='Register' style='border:1px solid #000000; background:#3b5998 no-repeat 4px 4px; color:white;'><br>";

echo "</form>";

echo "</div>

</center>";
echo "</body>";
?>
