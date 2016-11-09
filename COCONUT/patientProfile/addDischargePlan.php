<html>
<head>
<?php
include("../../myDatabase2.php");
$registrationNo = $_GET['registrationNo'];
$ro = new database2();
echo "
<style type='text/css'>
#dischargedPan {
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
$ro->coconutFormStart("get","addDischargePlan1.php");
$ro->coconutHidden("registrationNo",$registrationNo);
echo "<textarea id='dischargedPan' name='plan'>"; 
echo "<b>Brief Clinical History and Pertinent R.D</b>";
echo "<br><br><br><br><br><br>";
echo "<b>Laboratory Findings (Including ECG,X-RAY and other Diagnostic Procedure)</b>";
echo "<Br>";
$ro->getItemizedLaboratory($registrationNo);
echo "<br><br>";
echo "<b>Course in the Ward(Including Medication)</b>";
echo "<br><br><br><br><br><br>";
echo "<b>Disposition: (Indicate Home Medication/s,Special Instruction and Follow up)</b>";
echo "<Br>";
echo "</textarea>";
$ro->coconutFormStop();

?>

<script type="text/javascript" src="http://<?php echo $ro->getMyUrl(); ?>/jquery.js"></script>
<script type="text/javascript" src="http://<?php echo $ro->getMyUrl(); ?>/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/jquery.autocomplete.css" />
<link href="adico.css" rel="stylesheet" type="text/css">


<script type="text/javascript">

			
			CKEDITOR.replace( 'dischargedPan',
	{
		enterMode : CKEDITOR.ENTER_BR,
		skin : 'office2003',
		height: '450px'
	});
	


</script>


</body>
</html>
