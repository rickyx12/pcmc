<?php
include("../../../myDatabase2.php");
$ro = new database2();


$ro->listLaboratory_done(date("M"),date("d"),date("Y"));

?>
