<?php
include("../../../myDatabase1.php");
$month = $_POST['month'];
$year = $_POST['year'];
$description = $_POST['description'];
$type = $_POST['type'];
$chargesCode = $_POST['chargesCode'];

	/* Libchart - PHP chart library
	 * Copyright (C) 2005-2011 Jean-Marc Trémeaux (jm.tremeaux at gmail.com)
	 * 
	 * This program is free software: you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published by
	 * the Free Software Foundation, either version 3 of the License, or
	 * (at your option) any later version.
	 * 
	 * This program is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 * GNU General Public License for more details.
	 *
	 * You should have received a copy of the GNU General Public License
	 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
	 * 
	 */
	
	/**
	 * Multiple horizontal bar chart demonstration.
	 *
	 */

	include "../../../COCONUT/libchart/libchart/classes/libchart.php";

	$chart = new qtyBarChart(4000,1500);
	$ro = new database1();	

	$serie1 = new XYDataSet();

$d2=$year."-".$month."-01";
$mfmt=date("M",strtotime($d2));

$serie1->addPoint(new Point("$mfmt 31", number_format($ro->getFastMovingChart($month,"31",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 30", number_format($ro->getFastMovingChart($month,"30",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 29", number_format($ro->getFastMovingChart($month,"29",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 28", number_format($ro->getFastMovingChart($month,"28",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 27", number_format($ro->getFastMovingChart($month,"27",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 26", number_format($ro->getFastMovingChart($month,"26",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 25", number_format($ro->getFastMovingChart($month,"25",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 24", number_format($ro->getFastMovingChart($month,"24",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 23", number_format($ro->getFastMovingChart($month,"23",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 22", number_format($ro->getFastMovingChart($month,"22",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 21", number_format($ro->getFastMovingChart($month,"21",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 20", number_format($ro->getFastMovingChart($month,"20",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 19", number_format($ro->getFastMovingChart($month,"19",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 18", number_format($ro->getFastMovingChart($month,"18",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 17", number_format($ro->getFastMovingChart($month,"17",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 16", number_format($ro->getFastMovingChart($month,"16",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 15", number_format($ro->getFastMovingChart($month,"15",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 14", number_format($ro->getFastMovingChart($month,"14",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 13", number_format($ro->getFastMovingChart($month,"13",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 12", number_format($ro->getFastMovingChart($month,"12",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 11", number_format($ro->getFastMovingChart($month,"11",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 10", number_format($ro->getFastMovingChart($month,"10",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 9", number_format($ro->getFastMovingChart($month,"09",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 8", number_format($ro->getFastMovingChart($month,"08",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 7", number_format($ro->getFastMovingChart($month,"07",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 6", number_format($ro->getFastMovingChart($month,"06",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 5", number_format($ro->getFastMovingChart($month,"05",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 4", number_format($ro->getFastMovingChart($month,"04",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 3", number_format($ro->getFastMovingChart($month,"03",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 2", number_format($ro->getFastMovingChart($month,"02",$year,$description,$type,$chargesCode) / 100,2)));
$serie1->addPoint(new Point("$mfmt 1", number_format($ro->getFastMovingChart($month,"01",$year,$description,$type,$chargesCode) / 100,2)));
 
$totalDisp = ( $ro->getFastMovingChart($month,"01",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"02",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"03",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"04",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"05",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"06",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"07",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"08",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"09",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"10",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"11",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"12",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"13",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"14",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"15",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"16",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"17",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"18",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"19",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"20",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"21",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"22",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"23",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"24",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"25",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"26",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"27",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"28",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"29",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"30",$year,$description,$type,$chargesCode) + $ro->getFastMovingChart($month,"31",$year,$description,$type,$chargesCode) );


	$dataSet = new XYSeriesDataSet();
	$dataSet->addSerie("$description (".number_format($totalDisp,2).") ", $serie1);
	$chart->setDataSet($dataSet);
	$chart->getPlot()->setGraphCaptionRatio(0.35);

	$chart->setTitle("$description for ".date("F Y",strtotime($d2))."");
	$chart->render("../../../COCONUT/graphicalReport/chartList/dispensed.png");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Sales of <?php echo $description ?> for <?php echo $month; echo $year ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />

</head>
<body>
	<img alt="Line chart" src="/COCONUT/graphicalReport/chartList/dispensed.png" style="border: 1px solid gray;"/>
</body>
</html>
