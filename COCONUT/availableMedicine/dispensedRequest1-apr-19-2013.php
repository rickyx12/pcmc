<?php
include("../../myDatabase.php");

$description = $_GET['description'];
$requestingDepartment = $_GET['requestingDepartment'];
$requestingBranch = $_GET['requestingBranch'];
$verificationNo = $_GET['verificationNo'];
$quantityIssued = $_GET['quantityIssued'];
$username = $_GET['username'];

$ro = new database();
$timezone = "Asia/Manila";
date_default_timezone_set ($timezone);
$ro->editNow("inventoryManager","verificationNo",$verificationNo,"dateIssued",date("M_d_Y"));
$ro->editNow("inventoryManager","verificationNo",$verificationNo,"timeIssued",date("H:i:s"));
$ro->editNow("inventoryManager","verificationNo",$verificationNo,"issuedBy",$username);
$ro->editNow("inventoryManager","verificationNo",$verificationNo,"status","forReceiving");
$ro->editNow("inventoryManager","verificationNo",$verificationNo,"quantityIssued",$quantityIssued);

//window.parent.location.reload();   refresh parent frame

echo "
<script type='text/javascript'>
alert('$description is now for receiving on $requestingDepartment in $requestingBranch ');
window.reload();
</script>

";

?>
