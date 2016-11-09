<?php
include("homeDatabase.php");
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$module = $_POST['module'];

$logCheck = new synapse();

$logCheck->logIn($username,$password,$module);

?>


<?php

if($module == 'MAINTENANCE' || $module == 'REGISTRATION' || $module == 'PATIENT' || $module == 'CASHIER' || $module == 'ADMIN' || $module == 'DOCTOR' || $module=='PHILHEALTH' || $module == 'HMO' || $module == 'RECORDS' ) { //IF 1

if($logCheck->getUserName() == $username && $logCheck->getUserPassword() == $password && $logCheck->getUserModule() == $module) { //IF 2

if($module == "MAINTENANCE") { //IF (MAINTENANCE)

$_SESSION['username'] = $username;
$_SESSION['module'] = $module;
header("Location:/COCONUT/maintenance/initializeMaintenance.php");
/*
echo "
<script type=text/javascript>
window.location='http://".$logCheck->getMyUrl()."/COCONUT/maintenance/maintenanceHeading.php?username=$username&module=Maintenance'
</script>";
*/
}//IF (MAINTENANCE)

else if( $module == "PATIENT" ) { //IF (PATIENT)

$_SESSION['username'] = $username;
$_SESSION['module'] = $module;
header("Location:/COCONUT/currentPatient/initializePatient.php?username=$username");

/*
echo "
<script type=text/javascript>
window.location='http://".$logCheck->getMyUrl()."/COCONUT/currentPatient/patientInterface.php?username=$username&completeName='
</script>";
*/
} //IF (PATIENT)


else if( $module == "RECORDS") { //IF (RECORDS)
$_SESSION['username'] = $username;
$_SESSION['module'] = $module;
header("Location:/COCONUT/currentPatient/initializePatient.php?username=$username");

} //IF (RECORDS)


else if( $module == "PHILHEALTH" ) { //IF (PHILHEALTH)

$_SESSION['username'] = $username;
$_SESSION['module'] = $module;
header("Location:/COCONUT/currentPatient/initializePatient.php?username=$username");

/*
echo "
<script type=text/javascript>
window.location='http://".$logCheck->getMyUrl()."/COCONUT/currentPatient/patientInterface.php?username=$username&completeName='
</script>";
*/
} //IF (PHILHEALTH)


else if( $module == "HMO" ) { //IF (HMO)

$_SESSION['username'] = $username;
$_SESSION['module'] = $module;
header("Location:/COCONUT/currentPatient/initializePatient.php?username=$username");

/*
echo "
<script type=text/javascript>
window.location='http://".$logCheck->getMyUrl()."/COCONUT/currentPatient/patientInterface.php?username=$username&completeName='
</script>";
*/
} //IF (HMO)



else if($module == "CASHIER") { //IF (CASHIER)

$_SESSION['username'] = $username;
$_SESSION['module'] = $module;
header("Location:/COCONUT/Cashier/initializeCashier.php");
/*
echo "
<script type=text/javascript>
window.location='http://".$logCheck->getMyUrl()."/COCONUT/Cashier/cashierMainpage.php?username=$username&module=$module'
</script>";
*/
} //IF (CASHIER)


else if($module == "ADMIN") { //IF (ADMIN)

$_SESSION['username'] = $username;
$_SESSION['module'] = $module;
header("Location:/COCONUT/ADMIN/initializeAdmin.php");
/*
echo "
<script type=text/javascript>
window.location='http://".$logCheck->getMyUrl()."/COCONUT/ADMIN/adminHeading.php?username=$username&module=$module'
</script>";
*/

} //IF (ADMIN)

else if($module == "DOCTOR") { //IF (DOCTOR)

$_SESSION['username'] = $username;
$_SESSION['module'] = $module;
header("Location:/COCONUT/Doctor/initializeDoctor.php");

/*
echo "
<script type=text/javascript>
window.location='http://".$logCheck->getMyUrl()."/COCONUT/Doctor/doctorModule/doctorInterface.php?username=$username&module=$module'
</script>";
*/

} //IF (DOCTOR)


}/* IF 2 */ 
else { //ELSE 1

echo "<script type='text/javascript'>";
echo "alert('Authentication error!!! Try again!!!');";
echo "window.back(-1)";
echo "</script>";

echo "
<script type='text/javascript'>
window.location='http://".$logCheck->getMyUrl()."/LOGINPAGE/loginpage.php?module=$module';
</script>
";

//header("Location:/LOGINPAGE/loginpage.php?module=$module");
/*
echo "<table id='headz' border=0 bgcolor='#3b5998' width='100%'>
<td>&nbsp;&nbsp;<font size=5 color=white><b>$module</b></font></td></table>";
echo "<br><br><Br>";

echo "<center><div style='border:1px solid #ff0000; width:400px; height:50px;	'>";
echo "<br><center><font size=2 color=red>Authentication Error</font></center>";
echo "</div></center>";
*/

} // ELSE 1

} /* IF 1 */


else { // ELSE

if($logCheck->getUserName() == $username && $logCheck->getUserPassword() == $password && $logCheck->getUserModule() == $module) {

$_SESSION['username'] = $username;
$_SESSION['module'] = $module;
header("Location:/Department/initializeDepartment.php");

/*
echo "
<script type=text/javascript>
window.location='http://".$logCheck->getMyUrl()."/Department/departmentHeading.php?module=$module&username=$username'
</script>
";
*/
}else {

echo "<script type='text/javascript'>";
echo "alert('Authentication error!!! Try again!!!');";
echo "window.back(-1)";
echo "</script>";


echo "
<script type='text/javascript'>
window.location='http://".$logCheck->getMyUrl()."/LOGINPAGE/loginpage.php?module=$module';
</script>
";
//header("Location:/LOGINPAGE/loginpage.php?module=$module");
/*
echo "<table id='headz' border=0 bgcolor='#3b5998' width='100%'>
<td>&nbsp;&nbsp;<font size=5 color=white><b>$module</b></font></td></table>";
echo "<br><br><Br>";

echo "<center><div style='border:1px solid #ff0000; width:400px; height:50px;	'>";
echo "<br><center><font size=2 color=red>Authentication Error</font></center>";
echo "</div></center>";
*/

}
 }//END OF ELSE


?>
