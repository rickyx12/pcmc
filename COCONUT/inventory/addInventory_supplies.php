<?php
include("../../myDatabase.php");
$username = $_GET['username'];
$ro = new database();
?>


<script src="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/serverTime/serverTime.js"></script>
<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/flow/rickyCSS1.css" />



<style type='text/css'>
.txtBox {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 320px;
	padding:4px 4px 4px 5px;
}

.shortField {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 120px;
	padding:4px 4px 4px 5px;
}


.bdayField {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 90px;
	padding:4px 4px 4px 5px;
}

.comboBox {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 300px;
	padding:4px 4px 4px 5px;
}

.comboBoxShort {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 65px;
	padding:4px 4px 4px 5px;
}


.comboBoxDay {
	border: 1px solid #000;
	color: #000;
	height: 30px;
	width: 45px;
	padding:4px 4px 4px 5px;
}


.labelz {
color:#000;
font-size=10px;
}
</style>

<script type='text/javascript'>
$("#breadcrumbs a").hover(
    function () {
        $(this).addClass("hover").children().addClass("hover");
        $(this).parent().prev().find("span.arrow:first").addClass("pre_hover");
    },
    function () {
        $(this).removeClass("hover").children().removeClass("hover");
        $(this).parent().prev().find("span.arrow:first").removeClass("pre_hover");
    }
);
</script>

<?php

echo "<body onload='DisplayTime();'>";
echo "<form method='post' action='addInventory_insert.php'>";
echo "<br><center><div style='border:1px solid #000000; width:500px; height:430px; border-color:black black black black;'>";
echo "<br><table border=0 cellpadding=0 cellspacing=0>";
echo "<input type=hidden name='inventoryType' value='supplies'>";
echo "<input type=hidden name='generic' value=''>";
echo "<input type=hidden name='month' value=''>";
echo "<input type=hidden name='day' value=''>";
echo "<input type=hidden name='year' value=''>";
echo "<input type=hidden name='additional' value=''>";
echo "<input type=hidden name='pricing' value=''>";
echo "<input type=hidden name='year' value=''>";
echo "<input type=hidden name='addedBy' value='$username'>";
echo "<tr>";
echo "<td><font class='labelz'>Description&nbsp;</font></td>";
echo "<td><input type=text class='txtBox' name='description'></td>";
echo "</tr>";

echo "<tr>";
echo "<td><font class='labelz'>Unit Cost&nbsp;</font></td>";
echo "<td><input type=text class='shortField' name='suppliesUNITCOST'></td>";
echo "</tr>";

echo "<tr>";
echo "<td><font class='labelz'>Selling Price&nbsp;</font></td>";
echo "<td><input type=text class='shortField' name='unitcost'></td>";
echo "</tr>";

echo "<tr>";
echo "<td><font class='labelz'>Quantity&nbsp;</font></td>";
echo "<td><input type=text class='shortField' name='quantity'></td>";
echo "</tr>";


echo "<tr>";
echo "<td><font class='labelz'>Expiration&nbsp;</font></td>";
echo "<td>";
echo "
<select name='month' class='comboBoxShort'>
<option value='Jan'>Jan</option>
<option value='Feb'>Feb</option>
<option value='Mar'>Mar</option>
<option value='Apr'>Apr</option>
<option value='Mat'>May</option>
<option value='Jun'>Jun</option>
<option value='Jul'>Jul</option>
<option value='Aug'>Aug</option>
<option value='Sep'>Sep</option>
<option value='Oct'>Oct</option>
<option value='Nov'>Nov</option>
<option value='Dec'>Dec</option>
</select>";

echo "&nbsp;<select name='day' style='border:1px solid #000; width:60px; height:30px; padding:4px 4px 4px 5px; '>";
for($x=1;$x<=31;$x++) {
if($x < 9) {
echo "<option value='0$x'>0$x</option>";
}else {
echo "<option value='$x'>$x</option>";
}
}
echo "</select>";
echo "&nbsp;<input type=text name='year' class='bdayField'>";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td><font class='labelz'>Date&nbsp;</font></td>";
echo "<td><input type=text class='shortField' name='date' value=".date("M_d_Y")."></></td>";
echo "</tr>";
echo "<tr>";
echo "<td><font class='labelz'>Location&nbsp;</font></td>";
echo "<td>";
echo "<select class='comboBox' name='inventoryLocation'>";
echo "<option value='Dialysis'>Dialysis</option>";
echo "<option value='ICU'>ICU</option>";
echo "<option value='OR'>OR</option>";
echo "<option value='2D ECHO'>2D ECHO</option>";
echo "<option value='PT'>PT</option>";
echo "<option value='Laboratory'>Laboratory</option>";
echo "<option value='X-Ray'>X-Ray</option>";
$ro->showInventoryLocation();
echo "</select>";
echo "</td>";
echo "</tr>";
echo "<tr>
<td><font class='labelz'>Branch</font></td>
<td><select name='branch' class='txtBox'>"; 
$ro->showOption("branch","branch");
echo "</select></td>
</tr>";

echo "<tr>
<td><font class='labelz'>Transition</font></td>
<td><select name='transition' class='txtBox'>"; 
$ro->showOption("inventoryTransition","transition");
echo "</select></td>
</tr>";

echo "<tr>
<td><font class='labelz'>PhilHealth</font></td>
<td><select name='phic' class='txtBox'>"; 
echo "<option value='no'>No</option>";
echo "<option value='yes'>Yes</option>";
echo "</select></td>
</tr>";

echo "<tr>
<td><font class='labelz'>Critical Level</font></td>
<td><input type=text name='criticalLevel' class='txtBox'></td>
</tr>";

echo "<tr>
<td><font class='labelz'>Remarks</font></td>
<td><input type=text name='remarks' class='txtBox'></td>
</tr>";

echo "<tr>
<td><font class='labelz'>Supplier</font></td>
<td><select name='supplier' class='txtBox'>"; 
echo "<option value=''></option>";
$ro->showOption("supplier","supplierName");
echo "</select></td>
</tr>";

echo "</table>";
echo "<p id='curTime'>";
echo "</div>";
echo "<input type='submit' value='Proceed'>";
echo "<input type='hidden' name='preparation' value=''>";
echo "<input type='hidden' name='phicPrice' value=''>";
echo "<input type='hidden' name='companyPrice' value=''>";
echo "</form>";
echo "</body>";

?>
