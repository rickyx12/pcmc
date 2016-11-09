<?php
include("../../../myDatabase2.php");
$month = $_GET['month'];
$day = $_GET['day'];
$year = $_GET['year'];


$date = $year."-".$month."-".$day;

$ro = new database2();

echo "<center><font size=4><b>PAGADIAN CITY MEDICAL CENTER</b></font></center>";
echo "<center><a href='cashCollection_output.php?month=$month&day=$day&year=$year' target='_blank' style='text-decoration:none; color:black;'><font size=3>CASH COLLECTION REPORT</font></a></center>";
echo "<center><font size=3>".date("M d, Y",strtotime($date))."</font></center>";

echo "<Br>";
echo "<table border=0>";


echo "
<style type='text/css'>
.data{
font-size:19px;
font-family:'Times New Roman';

}

tr:hover{ background-color:yellow; color:black; }

</style>

";

echo "<Tr>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;<b><font class='data'>TOTAL</font></b></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "</tr>";
echo "<Tr>";
echo "<td><font class='data'>ULTRASOUND</font>&nbsp;</td><td></td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</tD>";


echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","ULTRASOUND","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","ULTRASOUND","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</td>";
$ultrasound = $ro->doubleSelectNow("cashCollection","amount","title","ULTRASOUND","date",$date);
echo "</tr>";

echo "<tr>";
echo "<Td><font class='data'>DIALYSIS</font>&nbsp;</td><td></td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</tD>";




echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","DIALYSIS","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","DIALYSIS","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</td>";
$dialysis = $ro->doubleSelectNow("cashCollection","amount","title","DIALYSIS","date",$date);
echo "</tr>";


echo "<tr>";
echo "<Td><font class='data'>ICU</font>&nbsp;</td><td>&nbsp;</td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</tD>";




echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","ICU","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","ICU","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</td>";
$icu = $ro->doubleSelectNow("cashCollection","amount","title","ICU","date",$date);

echo "</tr>";


echo "<tr>";
echo "<Td><font class='data'>CTSCAN</font>&nbsp;</td><td>&nbsp;</td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</tD>";




echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","CTSCAN","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","CTSCAN","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</td>";
$ctscan = $ro->doubleSelectNow("cashCollection","amount","title","CTSCAN","date",$date);
echo "</tr>";


echo "<tr>";
echo "<Td><font class='data'>ECG</font>&nbsp;</td><td>&nbsp;</td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</tD>";




echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","ECG","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
//echo "<td>&nbsp;</tD>";
//echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","ECG","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</td>";
$ecg = $ro->doubleSelectNow("cashCollection","amount","title","ECG","date",$date);
echo "</tr>";








echo "<tr>";
echo "<Td><font class='data'>2D ECHO</font>&nbsp;</td><td>&nbsp;</td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</tD>";




echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","2D_ECHO","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
//echo "<td>&nbsp;</tD>";
//echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","2D_ECHO","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</td>";
$decho = $ro->doubleSelectNow("cashCollection","amount","title","2D_ECHO","date",$date);
echo "</tr>";




echo "<tr>";
echo "<Td><font class='data'>PT REHAB</font>&nbsp;</td><td></td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</tD>";




echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","PT_REHAB","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
//echo "<td>&nbsp;</tD>";
//echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","PT_REHAB","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</td>";
$rehab = $ro->doubleSelectNow("cashCollection","amount","title","PT_REHAB","date",$date);
echo "</tr>";




echo "<tr>";
echo "<Td><font class='data'>YAG LASER</font>&nbsp;</td><td></td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</tD>";




echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","YAG_LASER","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
//echo "<td>&nbsp;</tD>";
//echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","YAG_LASER","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</td>";
$yagLaser = $ro->doubleSelectNow("cashCollection","amount","title","YAG_LASER","date",$date);
echo "</tr>";








echo "<tr>";
echo "<Td><font class='data'>RENTAL</font>&nbsp;</td><td></td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</tD>";




echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","RENTAL","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
//echo "<td>&nbsp;</tD>";
//echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","RENTAL","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>&nbsp;</td>";
$rental = $ro->doubleSelectNow("cashCollection","amount","title","RENTAL","date",$date);
echo "</tr>";







echo "</table>";
echo "<Br><Br>";
echo "<Table border=0>";
echo "<tr>";
echo "<td><b><font class='data'>PROFESSIONAL FEES</font></b></td>";
echo "</tr>";
$pf_opd = preg_split ("/\_/", $ro->doubleSelectNow("cashCollection","amount","title","PF_INPATIENT","date",$date) ); 
echo "<tr>";
echo "<td>&nbsp;&nbsp;<font class='data'>IN-PATIENT</font></td>";
echo "<tD>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","PF_INPATIENT","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<tD></tD>";
echo "</tr>";

$totalPF = ( $ro->doubleSelectNow("cashCollection","amount","title","PF_INPATIENT","date",$date) + $ro->doubleSelectNow("cashCollection","amount","title","PF_OUTPATIENT","date",$date) );

echo "<tr>";
echo "<td>&nbsp;&nbsp;<font class='data'>OUT-PATIENT</font></td>";
echo "<tD>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;<font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","PF_OUTPATIENT","date",$date),2)."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<tD><font class='data'>".number_format($totalPF,2)."</font></tD>";
echo "</tr>";


echo "</table>";


echo "<Br><Br>";
echo "<Table border=0>";
echo "<tr>";
echo "<td><b><font class='data'>HOSPITAL COLLECTION</font></b></td>";
echo "</tr>";
echo "<tr>";
echo "<td>&nbsp;&nbsp;<font class='data'>LABORATORY <b>INPATIENT</font></b></td>";
echo "<tD>".number_format($ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_LABORATORY_IPD","date",$date),2)."</tD>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<tD>&nbsp;</tD>";
echo "</tr>";

$labTotal = ( $ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_LABORATORY_IPD","date",$date) + $ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_LABORATORY_OPD","date",$date) + $ro->doubleSelectNow("cashCollection","amount","title","LABORATORY_ADJUSTMENT","date",$date) );

//$gtLab = ( $ro->doubleSelectNow("cashCollection","amount","title","LABORATORY_ADJUSTMENT","date",$date) + $labTotal  );

echo "<tr>";
echo "<td>&nbsp;&nbsp;<font class='data'>LABORATORY <b>OUTPATIENT</b></font></td>";
echo "<tD><font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_LABORATORY_OPD","date",$date),2)."</font></tD>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
//echo "<tD>".number_format($labTotal,2)."</tD>";
echo "<Td>&nbsp;</td>";
echo "</tr>";




echo "<tr>";
echo "<td>&nbsp;&nbsp;<font class='data'>LABORATORY <b>ADJUSTMENT</b></font></td>";
echo "<tD><font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","LABORATORY_ADJUSTMENT","date",$date),2)."</font></tD>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<tD>".number_format( $labTotal ,2)."</tD>";
echo "</tr>";






echo "<tr>";
echo "<td>&nbsp;&nbsp;<font class='data'>BLOODBANK</font></td>";
echo "<tD><font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","BLOODBANK","date",$date),2)."</font></tD>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<tD><font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","BLOODBANK","date",$date),2)."</font></tD>";
$bloodbank = $ro->doubleSelectNow("cashCollection","amount","title","BLOODBANK","date",$date);
echo "</tr>";

echo "<tr>";
echo "<td>&nbsp;&nbsp;<font class='data'>XRAY <b>INPATIENT</b></font></td>";
echo "<tD><font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_XRAY_IPD","date",$date),2)."</font></tD>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<tD>&nbsp;</tD>";
echo "</tr>";

$xrayTotal = ( $ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_XRAY_OPD","date",$date) + $ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_XRAY_IPD","date",$date) + $ro->doubleSelectNow("cashCollection","amount","title","XRAY_ADJUSTMENT","date",$date) );

echo "<tr>";
echo "<td>&nbsp;&nbsp;<font class='data'>XRAY <b>OUTPATIENT</b></font></td>";
echo "<tD><font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_XRAY_OPD","date",$date),2)."</font></tD>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
//echo "<tD><font class='data'>".number_format($xrayTotal,2)."</font></tD>";
echo "<Td>&nbsp;</td>";
echo "</tr>";





echo "<tr>";
echo "<td>&nbsp;&nbsp;<font class='data'>XRAY <b>ADJUSTMENT</b></font></td>";
echo "<tD><font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","XRAY_ADJUSTMENT","date",$date),2)."</font></tD>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<tD><font class='data'>".number_format($xrayTotal,2)."</font></tD>";
echo "</tr>";





echo "<tr>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "</tr>";

echo "<tr>";
echo "<td>&nbsp;&nbsp;<font class='data'>WARD</font></td>";
echo "<tD><font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","WARD","date",$date),2)."</font></tD>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<tD></tD>";


echo "</tr>";


echo "<tr>";
echo "<td>&nbsp;&nbsp;<font class='data'>ACCOMODATION</font></td>";
echo "<tD><font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","ACCOMODATION","date",$date),2)."</font></tD>";
echo "</tr>";

$subTotal = ( $ro->doubleSelectNow("cashCollection","amount","title","WARD","date",$date) + $ro->doubleSelectNow("cashCollection","amount","title","ACCOMODATION","date",$date) );

echo "<tr>";
echo "<td>&nbsp;&nbsp;<b><font class='data'>SUB TOTAL</font></b></td>";
echo "<tD><font class='data'>".number_format($subTotal,2)."</font></tD>";
echo "</tr>";

$subTotal_total = ( ( $subTotal + $ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_ADJUSTMENT","date",$date) ) - $ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_DISBURSEMENT","date",$date) );

echo "<tr>";
echo "<td>&nbsp;<font class='data'>ADD&nbsp;ADJUSTMENT</font></td>";
echo "<tD><font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_ADJUSTMENT","date",$date),2)."</font></tD>";
echo "</tr>";


echo "<tr>";
echo "<td>&nbsp;<font class='data'>LESS&nbsp;DISBURSEMENT</font></td>";
echo "<tD><font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_DISBURSEMENT","date",$date),2)."</font></tD>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<tD><font class='data'>".number_format($subTotal_total,2)."</font></tD>";

echo "</tr>";






echo "</table>";

echo "<br><Br><Br>";


echo "<table border=0>";
echo "<Tr>";
echo "<td><B><font class='data'>PHARMACY COLLECTION</font></B></td>";
echo "</tr>";

echo "<tr>";
echo "<td><font class='data'>INPATIENT</font></td>";
echo "<tD><font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","PHARMACY_INPATIENT","date",$date),2)."</font></tD>";
echo "</tr>";


echo "<tr>";
echo "<td><font class='data'>OUTPATIENT</font></td>";
echo "<tD><font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","PHARMACY_OUTPATIENT","date",$date),2)."</font></tD>";
echo "</tr>";

$pharmaTotal = ( $ro->doubleSelectNow("cashCollection","amount","title","PHARMACY_INPATIENT","date",$date) + $ro->doubleSelectNow("cashCollection","amount","title","PHARMACY_OUTPATIENT","date",$date) );

echo "<tr>";
echo "<td><b><font class='data'>SUBTOTAL</font></b></td>";
echo "<tD><font class='data'>".number_format($pharmaTotal,2)."</font></tD>";
echo "</tr>";

$pharmaTotal = ( ($pharmaTotal + $ro->doubleSelectNow("cashCollection","amount","title","PHARMACY_ADJUSTMENT","date",$date)) - $ro->doubleSelectNow("cashCollection","amount","title","PHARMACY_DISBURSEMENT","date",$date) );

echo "<tr>";
echo "<td><font class='data'>ADD:&nbsp;ADJUSTMENT</font></td>";
echo "<tD><font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","PHARMACY_ADJUSTMENT","date",$date),2)."</font></tD>";
echo "</tr>";

echo "<tr>";
echo "<td><font class='data'>LESS:&nbsp;DISBURSEMENT</font></td>";
echo "<tD><font class='data'>".number_format($ro->doubleSelectNow("cashCollection","amount","title","PHARMACY_DISBURSEMENT","date",$date),2)."</font></tD>";


echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<Td>&nbsp;</td>";
echo "<tD>".number_format($pharmaTotal,2)."</tD>";



echo "</tr>";


echo "</table>";

//echo "<br>";

echo "<Table border=0>";



echo "<tr>";
echo "<td>&nbsp;</tD>";
echo "</tr>";

$netCash = ( $ultrasound + $dialysis + $icu + $ctscan + $ecg + $totalPF + $labTotal + $bloodbank + $xrayTotal + $subTotal_total + $pharmaTotal + $decho + $rehab + $yagLaser + $rental  );

echo "<Tr>";
echo "<Td><font class='data'>NET CASH COLLECTION FOR THE DAY</font></tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<Td>&nbsp;</tD>";
echo "<td><b><font class='data'>".number_format($netCash,2)."</font></b></tD>";
echo "</tr>";


echo "</table>";


echo "<Br>";

echo "<font class='data'>PREPARED BY:&nbsp;MARICRIS P. ALABATA</font>";

?>
