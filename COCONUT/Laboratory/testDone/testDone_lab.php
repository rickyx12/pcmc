<?php
include("../../../myDatabase2.php");

$ro = new database2();


echo "|&nbsp;&nbsp;<a href='testDone.php'><font size=2 color=red>All Results</font></a>&nbsp;&nbsp;|&nbsp;<a href='testDone_lab.php'><font size=2 color=blue>Laboratory</font></a>";
echo "&nbsp;&nbsp;|&nbsp;&nbsp;";
echo "<a href='testDone_rad.php'><font size=2 color=red>Radiology</font></a>&nbsp;|&nbsp;&nbsp;";
echo "<a href='searchResult.php?search='><font size=2 color=red>Search Result</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;";
//echo "<a href='#'><font size=2 color=red>Set Alert</font></a>&nbsp;&nbsp;|";
echo "<br>";
echo "<table border=1 cellspacing=0 rules=all>";
echo "<tr>";
echo "<Th>Patient</th>";
echo "<Th>Result</th>";
echo "<th>Realesed</th>";
echo "</tr>";
$ro->listLaboratory_done(date("M"),date("d"),date("Y"));
echo "</table>";


?>
