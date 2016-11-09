<?php
include("../../../myDatabase2.php");

$ro = new database2();


echo "|&nbsp;&nbsp;<a href='testDone.php' style='text-decoration:none;'><font size=2 color=red>All Results</font></a>&nbsp;&nbsp;|&nbsp;<a href='testDone_lab.php' style='text-decoration:none;'><font size=2 color=red>Laboratory</font></a>";
echo "&nbsp;&nbsp;|&nbsp;&nbsp;";
echo "<a href='testDone_rad.php' style='text-decoration:none;'><font size=2 color=blue>Radiology</font></a>&nbsp;|&nbsp;&nbsp;";
echo "<a href='searchResult.php?search=' style='text-decoration:none;'><font size=2 color=red>Search Result</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;";
//echo "<a href='#'><font size=2 color=red>Set Alert</font></a>&nbsp;&nbsp;|";
echo "<br>";
echo "<table border=1 cellspacing=0 rules=all>";
echo "<tr>";
echo "<Th>Patient</th>";
echo "<Th>Result</th>";
echo "<th>Realesed</th>";
echo "</tr>";
$ro->listRadioResult(date("M"),date("d"),date("Y"));
echo "</table>";


?>
