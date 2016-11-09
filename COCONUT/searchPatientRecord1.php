<?php
include("../myDatabase.php");
$name = $_GET['name'];
$username = $_GET['username'];
$ro = new database();

$ro->verifyRecord_alt($name,$username);

?>
