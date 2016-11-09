<?php
include("../../myDatabase.php");
$company = $_GET['company'];
$fromMonth = $_GET['fromMonth'];
$fromDay = $_GET['fromDay'];
$fromYear = $_GET['fromYear'];
$toMonth = $_GET['toMonth'];
$toDay = $_GET['toDay'];
$toYear = $_GET['toYear'];
$username = $_GET['username'];
$branch = $_GET['branch'];
$ro = new database();

echo "<center>".$ro->getReportInformation("hmoSOA_name")."</center>";
echo "<center><font size=2>($branch Branch)</font></center>";
echo "<center>".$ro->getReportInformation("hmoSOA_address")."</center>";
echo "<center><font size=5>Statement of Account</font><center>";
echo "<center>$company</center>";
echo "<center><font size=2>$fromYear-$fromMonth-$fromDay to $toYear-$toMonth-$toDay</font></center><br>";
echo "<font size=2>We are billing you the amount below representing the hospitalization charge incured by<br> your cardholders</font>";
$ro->getHmoSOA("OPD",$company,$fromMonth,$fromDay,$fromYear,$toMonth,$toDay,$toYear,$username,$branch);
echo "<br><br>";
echo "<table border=0 cellpadding=0 cellspacing=0>
<tr>
<td>Prepared By</td>
<td><font color=white>&nbsp&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
<td>Checked By</td>
<td><font color=white>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
<td>Noted By</td>
</tr>
<tr>
<td>______________________<br><font size=2>Billing<font></td>
<td><font color=white>&nbsp&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
<td>______________________<br><font size=2>Accountant</font></td>
<td><font color=white>&nbsp&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
<td>______________________<br><font size=2>Hospital Administrator</font></td>
</tr>
</table>";
?>
