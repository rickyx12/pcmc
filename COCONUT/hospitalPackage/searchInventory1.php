<?php
include("packageControl.php");
$desc = $_GET['desc'];
$packageName = $_GET['packageName'];
$packagePrice = $_GET['packagePrice'];

$package = new hospitalPackage();

$package->searchInventory($desc,$packageName,$packagePrice);


?>
