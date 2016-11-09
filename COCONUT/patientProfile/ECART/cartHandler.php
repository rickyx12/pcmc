<?php
include("../../../myDatabase.php");
$batchNo = $_GET['batchNo'];
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];
$room = $_GET['room'];


$ro = new database();

/*
$ro->getBatchNo();
$myFile = "/opt/lampp/htdocs/COCONUT/trackingNo/batchNo.dat";
$fh = fopen($myFile, 'r');
$batchNo = fread($fh, 100);
fclose($fh);
*/


echo "
<frameset rows='25%,185%,85%' framespacing='0' border='1'>
   <frame src='cartSelection.php?registrationNo=$registrationNo&username=$username&room=$room&batchNo=$batchNo'  scrolling=no frameborder=1 framespacing=1 name='selection' />
   <frame src='#' frameborder=1 framespacing=1 name='selectedFrame' />
   <frame src='showCart_update.php?registrationNo=$registrationNo&batchNo=$batchNo&username=$username' frameborder=1 framespacing=1 />
</frameset>

";




?>
