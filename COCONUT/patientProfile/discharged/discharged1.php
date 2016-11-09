<?php
include("../../../myDatabase.php");
$registrationNo = $_GET['registrationNo'];
$protoType = $_GET['protoType'];
$room = $_GET['room'];
$username = $_GET['username'];
$ro = new database();


if($protoType == "Discharged") {
$ro->EditNow("room","Description",$room,"Status","Vacant");
$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"dateUnregistered",date("Y-m-d"));
$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"timeUnregistered",$ro->getSynapseTime());



$ro->lockedAccountItems($registrationNo,date('Y-m-d H:i:s'),$username);
$ro->editNow("registrationDetails","registrationNo",$registrationNo,"mgh","yes_".$username);
$ro->editNow("registrationDetails","registrationNo",$registrationNo,"mgh_date",date("M_d_Y"));


}else {
$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"dateUnregistered","");
$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"timeUnregistered","");
$ro->EditNow("registrationDetails","registrationNo",$registrationNo,"room","");

mysql_connect($ro->myHost(),$ro->getUser(),$ro->getPass());
mysql_select_db($ro->getDB());

mysql_query("INSERT INTO `userLogLockUnLock` (`registrationNo`, `username`, `action`, `dateadded`) VALUES ('$registrationNo', '$username', 'Undischarged', '".date("YmdHis")."')");

}
echo "
<script type='text/javascript'>";

if($protoType == "Discharged") {
echo "alert('Patient is now Discharged');";
}else {
echo "alert('Patient is now Active');";
}
echo " window.location='http://".$ro->getMyUrl()."/COCONUT/patientProfile/patientProfile_right.php?registrationNo=$registrationNo&username=$username'
</script>

";

?>
