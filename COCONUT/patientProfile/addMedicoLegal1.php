<?php
include("../../myDatabase2.php");
$registrationNo = $_GET['registrationNo'];
$incidenceDate = $_GET['incidenceDate'];
$incidenceTime = $_GET['incidenceTime'];
$incidencePlace = $_GET['incidencePlace'];
$examinationDate = $_GET['examinationDate'];
$examinationTime = $_GET['examinationTime'];
$examinationPlace = $_GET['examinationPlace'];
$nature = $_GET['nature'];
$pertinent = $_GET['pertinent'];

$ro = new database2();

$ro->addMedicoLegal($registrationNo,$incidenceDate,$incidenceTime,$incidencePlace,$examinationDate,$examinationTime,$examinationPlace,$nature,$pertinent);


?>

