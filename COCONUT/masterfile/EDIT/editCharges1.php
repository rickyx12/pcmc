<?php
include("../../../myDatabase.php");
$chargesCode = $_GET['chargesCode'];
$description = $_GET['description'];
$service = $_GET['services'];
$category = $_GET['category'];
$opd = $_GET['opdprice'];
$ward = $_GET['wardprice'];
$soloward = $_GET['solowardprice'];
$semiprivate = $_GET['semiprivateprice'];
$private = $_GET['privateprice'];
$subCategory = $_GET['subCategory'];
$hmo = $_GET['hmo'];
$unitCost = $_GET['unitCost'];


$ro = new database();

$ro->editNow("availableCharges","chargesCode",$chargesCode,"Description",$description);
$ro->editNow("availableCharges","chargesCode",$chargesCode,"Service",$service);
$ro->editNow("availableCharges","chargesCode",$chargesCode,"Category",$category);
$ro->editNow("availableCharges","chargesCode",$chargesCode,"OPD",$opd);
$ro->editNow("availableCharges","chargesCode",$chargesCode,"HMO",$hmo);
$ro->editNow("availableCharges","chargesCode",$chargesCode,"WARD",$ward);
$ro->editNow("availableCharges","chargesCode",$chargesCode,"SOLOWARD",$soloward);
$ro->editNow("availableCharges","chargesCode",$chargesCode,"SEMIPRIVATE",$semiprivate);
$ro->editNow("availableCharges","chargesCode",$chargesCode,"PRIVATE",$private);
$ro->editNow("availableCharges","chargesCode",$chargesCode,"subCategory",$subCategory);
$ro->editNow("availableCharges","chargesCode",$chargesCode,"unitCost",$unitCost);

?>

