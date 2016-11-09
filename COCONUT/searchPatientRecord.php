<?php
include("../myDatabase.php");
$name = $_GET['name'];
$ro = new database();

$ro->verifyRecord($name);

?>
