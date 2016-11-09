<?php
include("../../../myDatabase2.php");
$registrationNo = $_GET['registrationNo'];

$itemNo = $_GET['itemNo'];
$count = count($itemNo);

$ro = new database2();

for( $x=0;$x<$count;$x++ ) {
$sellingPrice = ( $ro->selectNow("patientCharges","sellingPrice","itemNo",$itemNo[$x]) - ($ro->selectNow("patientCharges","sellingPrice","itemNo",$itemNo[$x]) * 0.20 )  ) ;
$qty = $ro->selectNow("patientCharges","quantity","itemNo",$itemNo[$x]);
$total = $sellingPrice*$qty;
$ro->doubleEditNow("patientCharges","itemNo",$itemNo[$x],"registrationNo",$registrationNo,"sellingPrice",$sellingPrice);
$ro->doubleEditNow("patientCharges","itemNo",$itemNo[$x],"registrationNo",$registrationNo,"total",$total);
$ro->doubleEditNow("patientCharges","itemNo",$itemNo[$x],"registrationNo",$registrationNo,"cashUnpaid",$total);
}

echo "<font color=red>Discount Applied.!</font>";

?>
