<html>
<head>
<?php
include("../../../myDatabase1.php");
$hospital = $_GET['hospital'];
$report = $_GET['report'];
$doctor = $_GET['doctor'];
$registrationNo = $_GET['registrationNo'];
$itemNo = $_GET['itemNo'];
$description = $_GET['description'];


$ro = new database1();

$ro->getPatientProfile($registrationNo);

echo "

<style type='text/css'>

#reportx {
	border: 1px solid #000;
	color: #000;
	height:900px;
	width:900px;
	padding:4px 4px 4px 5px;
	font-size:20px;
}

</style>



";

?>

	<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>


</head>
<body>
<?php
echo "<br>";
echo "<center><font size=6>".$hospital."</font></center>";
echo "<center><font size=3>".$ro->selectNow("radioHeading","address","hospital",$hospital)."</font></center>";


echo "<br><br>";
echo "<center><font size=4><b>Radiology Report</b></font>";
echo "<br><br>";

$ro->coconutFormStart("get","radioReport_insert.php");
$ro->coconutHidden("registrationNo",$registrationNo);
$ro->coconutHidden("itemNo",$itemNo);
$ro->coconutHidden("physician",$doctor);
$ro->coconutHidden("hospitalName",$hospital);
$ro->coconutHidden("hospitalAddress",$ro->selectNow("radioHeading","address","hospital",$hospital));
echo " <div class='shadow' id='shadow'> <div class='output' id='output'> ";
echo "<table border=0 width='160%'>";
echo "<tr>";
echo "<td>Last Name:&nbsp;<b>".$ro->getPatientRecord_lastName()."</b>  </td>";
echo "<td>Date:&nbsp;<b>".date("M d, Y")."</b></td>";
echo "</tr>";

echo "<tr>";
echo "<td>First Name:&nbsp;<b>".$ro->getPatientRecord_firstName()."</b></td>";
echo "<td>Physician:&nbsp;<b>Dr. $doctor</b></td>";
echo "</tr>";

echo "<tr>";
echo "<td>Age:&nbsp;<b>".$ro->getPatientRecord_age()."</b></td>";
echo "<td>Examination:&nbsp;<b>$description</b></td>";
echo "</tr>";

echo "<tr>";
echo "<td>Sex:&nbsp;<b>".$ro->getPatientRecord_gender()."</b></td>";

echo "</tr>";

echo "<tr>";
echo "<td>Room:&nbsp;<b>".$ro->getRegistrationDetails_type()."</b></td>";

echo "</tr>";

echo "</table>";

echo "<br><br><br>";

$text = $ro->selectNow("radioReportList","report","title",$report);
//$breaks = array("<br>","<br/>","<b>","</b>");  
//$text1 = str_ireplace($breaks, "\r\n",$text);  

echo "<textarea id='report' name='radioReport'>"; 
echo $text;
echo"</textarea>";

echo "<br><br>";

$ro->coconutButton("Proceed");
$ro->coconutFormStop();

echo "</div></div>";

?>

<script type="text/javascript" src="http://<?php echo $ro->getMyUrl(); ?>/jquery.js"></script>
<script type="text/javascript" src="http://<?php echo $ro->getMyUrl(); ?>/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/jquery.autocomplete.css" />
<link href="adico.css" rel="stylesheet" type="text/css">


<script type="text/javascript">

			
			CKEDITOR.replace( 'report',
	{
		enterMode : CKEDITOR.ENTER_BR,
		skin : 'office2003'
	});
	


</script>



</body>
</html>

