<?php
include("../../../myDatabase2.php");
$search = $_GET['search'];
$ro = new database2();

echo "|&nbsp;&nbsp;<a href='testDone.php' style='text-decoration:none;'><font size=2 color=red>All Results</font></a>&nbsp;&nbsp;|&nbsp;<a href='testDone_lab.php' style='text-decoration:none;'><font size=2 color=red>Laboratory</font></a>";
echo "&nbsp;&nbsp;|&nbsp;&nbsp;";
echo "<a href='testDone_rad.php' style='text-decoration:none;'><font size=2 color=red>Radiology</font></a>&nbsp;|&nbsp;&nbsp;";
echo "<a href='#' style='text-decoration:none;'><font size=2 color=blue>Search Result</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;";
//echo "<a href='#'><font size=2 color=red>Set Alert</font></a>&nbsp;&nbsp;|";
echo "<br>";
echo "<br>";
$ro->coconutFormStart("get","searchResult.php");
echo "<font size=2>Patient Name:&nbsp;</font>";
echo "<input type=text name='search' autocomplete='off' value='' style=' border:1px solid #000; height:25px; '>";
echo "<br><br>";

echo "<table border=1 cellspacing=0 rules=all>";
echo "<tr>";
echo "<Th>Patient</th>";
echo "<Th>Result</th>";
echo "<th>Realesed</th>";
echo "</tr>";
if( $search == "" ) {

}else {
$ro->listLaboratory_done_search(date("M"),date("d"),date("Y"),$search);
$ro->searchRadioResult(date("M"),date("d"),date("Y"),$search);
}
echo "</table>";
$ro->coconutFormStop();


?>
