<?php
include("../../../myDatabase1.php");
$hospital = $_GET['hospital'];
$report = $_GET['report'];
$doctor = $_GET['doctor'];
$registrationNo = $_GET['registrationNo'];
$itemNo = $_GET['itemNo'];
$description = $_GET['description'];
$username = $_GET['username'];


$ro = new database1();

?>


<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>

<?php

echo "
<style type='text/css'>

.txtArea {
	border: 1px solid #000;
	color: #000;
	height: auto;
	width:900px;
	padding:4px 4px 4px 5px;
	font-size:20px;
}

</style>
";

echo "<br>";
echo "<center><font size=6>".$hospital."</font></center>";
echo "<center><font size=3>".$ro->selectNow("radioHeading","address","hospital",$hospital)."</font></center>";


echo "<br><br>";
echo "<center><font size=4><b>Radiology Report</b></font>";
echo "<br><br>";

$ro->coconutFormStart("get","radioReport_update.php");
$ro->coconutHidden("registrationNo",$registrationNo);
$ro->coconutHidden("itemNo",$itemNo);
$ro->coconutHidden("physician",$doctor);
$ro->coconutHidden("hospitalName",$hospital);
$ro->coconutHidden("hospitalAddress",$ro->selectNow("radioHeading","address","hospital",$hospital));
$ro->coconutHidden("username",$username);


echo "<table border=0 width='160%'>";
echo "<tr>";
echo "<td>Last Name:&nbsp;<b>Dela Cruz</b>  </td>";
echo "<td>Date:&nbsp;<b>Nov 13, 2012</b></td>";
echo "</tr>";

echo "<tr>";
echo "<td>First Name:&nbsp;<b>Juan</b></td>";
echo "<td>Physician:&nbsp;<b>Dr. $doctor</b></td>";
echo "</tr>";

echo "<tr>";
echo "<td>Age:&nbsp;<b>20</b></td>";
echo "<td>Examination:&nbsp;<b>$description</b></td>";
echo "</tr>";

echo "<tr>";
echo "<td>Sex:&nbsp;<b>Male</b></td>";

echo "</tr>";

echo "<tr>";
echo "<td>Room:&nbsp;<b>OPD</b></td>";

echo "</tr>";

echo "</table>";

echo "<br><br><br>";


echo "<textarea id='report' name='radioReport' class='txtArea'>"; 
echo $ro->doubleSelectNow("radioSavedReport","radioReport","registrationNo",$registrationNo,"itemNo",$itemNo);
echo"</textarea>";

echo "<br><br>";
$ro->coconutButton("edit");
$ro->coconutFormStop();

?>


<script type="text/javascript">
			
			CKEDITOR.replace( 'report',
	{
		enterMode : CKEDITOR.ENTER_BR,
		skin : 'office2003'
	});
		

</script>

