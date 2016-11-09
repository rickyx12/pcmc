<?php
include("../../../myDatabase2.php");

$ro = new database2();


echo "|&nbsp;&nbsp;<a href='#'><font size=2 color=blue>All Results</font></a>&nbsp;&nbsp;|&nbsp;<a href='testDone_lab.php'><font size=2 color=red>Laboratory</font></a>";
echo "&nbsp;&nbsp;|&nbsp;&nbsp;";
echo "<a href='testDone_rad.php'><font size=2 color=red>Radiology</font></a>&nbsp;|&nbsp;&nbsp;";
echo "<a href='searchResult.php?search='><font size=2 color=red>Search Result</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;";
echo "<a href='http://192.168.1.22/WARDVIEW/'target='_blank'><font size=2 color=red>L.I.S Result View</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;";
//<a href="www.example.com/example.html" target="_blank">link text</a>
//echo "<a href='#'><font size=2 color=red>Set Alert</font></a>&nbsp;&nbsp;|";
echo "<br>";
echo "<table border=1 cellspacing=0 rules=all>";
echo "<tr>";
echo "<Th>Patient</th>";
echo "<Th>Result</th>";
echo "<th>Realesed</th>";
echo "</tr>";
$ro->listLaboratory_done(date("M"),date("d"),date("Y"));
$ro->listRadioResult(date("M"),date("d"),date("Y"));
echo "</table>";


?>
