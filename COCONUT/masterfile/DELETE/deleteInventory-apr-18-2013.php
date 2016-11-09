<?php
include("../../../myDatabase.php");
$inventoryCode = $_GET['inventoryCode'];
$username = $_GET['username'];
$description = $_GET['description'];

$ro = new database();

$ro->deleteNow("inventory","inventoryCode",$inventoryCode);

echo "
<script type='text/javascript'>
alert('$description is now deleted in the inventory');
</script>

";

?>
