<?php
include("../../../myDatabase1.php");
$year = $_GET['year'];
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
	 * Multiple line chart demonstration.
	 *
	 */

	include "../../../COCONUT/libchart/libchart/classes/libchart.php";

	$chart = new revenueLineChart("1500","500");
	$ro = new database1();
	$serie1 = new XYDataSet();
	$serie1->addPoint(new Point("Jan $year",$ro->getPHICReceivablesAnnual("01",$year) / 1000 ));
	$serie1->addPoint(new Point("Feb $year",$ro->getPHICReceivablesAnnual("02",$year) / 1000 ));
	$serie1->addPoint(new Point("Mar $year",$ro->getPHICReceivablesAnnual("03",$year) / 1000 ));
	$serie1->addPoint(new Point("Apr $year",$ro->getPHICReceivablesAnnual("04",$year) / 1000 ));
	$serie1->addPoint(new Point("May $year",$ro->getPHICReceivablesAnnual("05",$year) / 1000 ));
	$serie1->addPoint(new Point("Jun $year",$ro->getPHICReceivablesAnnual("06",$year) / 1000 ));
	$serie1->addPoint(new Point("Jul $year",$ro->getPHICReceivablesAnnual("07",$year) / 1000 ));
	$serie1->addPoint(new Point("Aug $year",$ro->getPHICReceivablesAnnual("08",$year) / 1000 ));
	$serie1->addPoint(new Point("Sep $year",$ro->getPHICReceivablesAnnual("09",$year) / 1000 ));
	$serie1->addPoint(new Point("Oct $year",$ro->getPHICReceivablesAnnual("10",$year) / 1000 ));
	$serie1->addPoint(new Point("Nov $year",$ro->getPHICReceivablesAnnual("11",$year) / 1000 ));
	$serie1->addPoint(new Point("Dec $year",$ro->getPHICReceivablesAnnual("12",$year) / 1000 ));


	$serie2 = new XYDataSet();
	$serie2->addPoint(new Point("Jan $year",$ro->getPHICReceivablesAnnual_package("01",$year) / 1000 ));
	$serie2->addPoint(new Point("Feb $year",$ro->getPHICReceivablesAnnual_package("02",$year) / 1000 ));
	$serie2->addPoint(new Point("Mar $year",$ro->getPHICReceivablesAnnual_package("03",$year) / 1000 ));
	$serie2->addPoint(new Point("Apr $year",$ro->getPHICReceivablesAnnual_package("04",$year) / 1000 ));
	$serie2->addPoint(new Point("May $year",$ro->getPHICReceivablesAnnual_package("05",$year) / 1000 ));
	$serie2->addPoint(new Point("Jun $year",$ro->getPHICReceivablesAnnual_package("06",$year) / 1000 ));
	$serie2->addPoint(new Point("Jul $year",$ro->getPHICReceivablesAnnual_package("07",$year) / 1000 ));
	$serie2->addPoint(new Point("Aug $year",$ro->getPHICReceivablesAnnual_package("08",$year) / 1000 ));
	$serie2->addPoint(new Point("Sep $year",$ro->getPHICReceivablesAnnual_package("09",$year) / 1000 ));
	$serie2->addPoint(new Point("Oct $year",$ro->getPHICReceivablesAnnual_package("10",$year) / 1000 ));
	$serie2->addPoint(new Point("Nov $year",$ro->getPHICReceivablesAnnual_package("11",$year) / 1000 ));
	$serie2->addPoint(new Point("Dec $year",$ro->getPHICReceivablesAnnual_package("12",$year) / 1000 ));
		
	
	$dataSet = new XYSeriesDataSet();
	$dataSet->addSerie("PhilHealth Non-Package", $serie1);
	$dataSet->addSerie("PhilHealth Package", $serie2);

	$chart->setDataSet($dataSet);

	$chart->setTitle("PhilHealth Receivables for $year");
	$chart->getPlot()->setGraphCaptionRatio(0.62);
	$chart->render("../../../COCONUT/graphicalReport/chartList/monthlyRegistrationBreakdown.png");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Libchart line demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
	<img alt="Line chart" src="/COCONUT/graphicalReport/chartList/monthlyRegistrationBreakdown.png" style="border: 1px solid gray;"/>
</body>
</html>
