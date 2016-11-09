<?php
include("../../myDatabase.php");
$requestingDepartment = $_GET['requestingDepartment'];
$requestingBranch = $_GET['requestingBranch'];
$requestTo_department = $_GET['requestTo_department'];
$requestTo_branch = $_GET['requestTo_branch'];
$username = $_GET['username'];
$ro = new database();


$ro->showRequestList($requestingDepartment,$requestingBranch,$requestTo_department,$requestTo_branch,$username);

?>
