<?php
include("../myDatabase.php");
$description = $_GET['description'];
$services = $_GET['services'];
$category = $_GET['category'];
$opdprice = $_GET['opdprice'];
$wardprice = $_GET['wardprice'];
$solowardprice = $_GET['solowardprice'];
$semiprivateprice = $_GET['semiprivateprice'];
$privateprice = $_GET['privateprice'];
$username = $_GET['username'];
$subCategory = $_GET['subCategory'];
$hmo = $_GET['hmo'];


$ro = new database();

$ro->addNewCharges($description,$services,$category,$opdprice,$wardprice,$solowardprice,$semiprivateprice,$privateprice,$username,$subCategory,$hmo);


?>
