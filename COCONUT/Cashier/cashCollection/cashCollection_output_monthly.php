<?php
include("../../../myDatabase2.php");
$month = $_GET['month'];
$day = $_GET['day'];
$year = $_GET['year'];
$month1 = $_GET['month1'];
$day1 = $_GET['day1'];
$year1 = $_GET['year1'];


$date = $year."-".$month."-".$day;
$datez = $year1."-".$month1."-".$day1;


$ro = new database2();

echo "<center><font size=4><b>PAGADIAN CITY MEDICAL CENTER</b></font></center>";
echo "<center><a href='cashCollection_output.php?month=$month&day=$day&year=$year' target='_blank' style='text-decoration:none; color:black;'><font size=3>CASH COLLECTION REPORT</font></a></center>";
echo "<center><font size=3>".$date." - ".$datez."</font></center>";

echo "<Br><bR><br>";
echo "<table border=0>";


echo "
<style type='text/css'>
.data{
font-size:11.5px;
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
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;<b>TOTAL</b></tD>";
echo "</tr>";
echo "<Tr>";
echo "<td>ULTRASOUND&nbsp;</td><td>".number_format( $ro->monthlyCashCollection("ULTRASOUND",$date,$datez) ,2)."</td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>".number_format( $ro->monthlyCashCollection("ULTRASOUND",$date,$datez) ,2)."</td>";
$ultrasound = $ro->monthlyCashCollection("ULTRASOUND",$date,$datez);
echo "</tr>";

echo "<tr>";
echo "<Td>DIALYSIS&nbsp;</td><td>".number_format( $ro->monthlyCashCollection("DIALYSIS",$date,$datez) ,2)."</td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>".number_format( $ro->monthlyCashCollection("DIALYSIS",$date,$datez) ,2)."</td>";
$dialysis = $ro->monthlyCashCollection("DIALYSIS",$date,$datez) ;
echo "</tr>";


echo "<tr>";
echo "<Td>ICU&nbsp;</td><td>".number_format( $ro->monthlyCashCollection("ICU",$date,$datez) ,2)."</td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>".number_format( $ro->monthlyCashCollection("ICU",$date,$datez) ,2)."</td>";
$icu = $ro->monthlyCashCollection("ICU",$date,$datez);

echo "</tr>";


echo "<tr>";
echo "<Td>CTSCAN&nbsp;</td><td>".number_format( $ro->monthlyCashCollection("CTSCAN",$date,$datez) ,2)."</td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>".number_format( $ro->monthlyCashCollection("CTSCAN",$date,$datez) ,2)."</td>";
$ctscan = $ro->monthlyCashCollection("CTSCAN",$date,$datez) ;
echo "</tr>";


echo "<tr>";
echo "<Td>ECG&nbsp;</td><td>".number_format( $ro->monthlyCashCollection("ECG",$date,$datez) ,2)."</td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>".number_format( $ro->monthlyCashCollection("ECG",$date,$datez) ,2)."</td>";
$ecg = $ro->monthlyCashCollection("ECG",$date,$datez) ;
echo "</tr>";








echo "<tr>";
echo "<Td>2D ECHO&nbsp;</td><td>".number_format( $ro->monthlyCashCollection("2D_ECHO",$date,$datez) ,2)."</td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>".number_format( $ro->monthlyCashCollection("2D_ECHO",$date,$datez) ,2)."</td>";
$decho = $ro->monthlyCashCollection("2D_ECHO",$date,$datez);
echo "</tr>";




echo "<tr>";
echo "<Td>PT REHAB&nbsp;</td><td>".number_format( $ro->monthlyCashCollection("PT_REHAB",$date,$datez) ,2)."</td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>".number_format( $ro->monthlyCashCollection("PT_REHAB",$date,$datez) ,2)."</td>";
$rehab = $ro->monthlyCashCollection("PT_REHAB",$date,$datez) ;
echo "</tr>";






echo "<tr>";
echo "<Td>YAG LASER&nbsp;</td><td>".number_format( $ro->monthlyCashCollection("YAG_LASER",$date,$datez) ,2)."</td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>".number_format( $ro->monthlyCashCollection("YAG_LASER",$date,$datez) ,2)."</td>";
$yagLaser = $ro->monthlyCashCollection("YAG_LASER",$date,$datez) ;
echo "</tr>";




echo "<tr>";
echo "<Td>RENTAL&nbsp;</td><td>".number_format( $ro->monthlyCashCollection("RENTAL",$date,$datez) ,2)."</td>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";

echo "<td>".number_format( $ro->monthlyCashCollection("RENTAL",$date,$datez) ,2)."</td>";
$rental = $ro->monthlyCashCollection("RENTAL",$date,$datez) ;
echo "</tr>";






echo "</table>";
echo "<Br><Br>";
echo "<Table border=0>";
echo "<tr>";
echo "<td><b>PROFESSIONAL FEES</b></td>";
echo "</tr>";
$pf_opd = preg_split ("/\_/", $ro->doubleSelectNow("cashCollection","amount","title","PF_INPATIENT","date",$date) ); 
echo "<tr>";
echo "<td>&nbsp;&nbsp;IN-PATIENT</td>";
echo "<tD>".number_format( $ro->monthlyCashCollection("PF_INPATIENT",$date,$datez) ,2)."</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
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






$totalPF = ( $ro->monthlyCashCollection("PF_INPATIENT",$date,$datez) + $ro->monthlyCashCollection("PF_OUTPATIENT",$date,$datez) );

echo "<tr>";
echo "<td>&nbsp;&nbsp;OUT-PATIENT</td>";
echo "<tD>".number_format( $ro->monthlyCashCollection("PF_OUTPATIENT",$date,$datez) ,2)."</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<tD>".number_format($totalPF,2)."</tD>";
echo "</tr>";


echo "</table>";


echo "<Br><Br>";
echo "<Table border=0>";
echo "<tr>";
echo "<td><b>HOSPITAL COLLECTION</b></td>";
echo "</tr>";
echo "<tr>";
echo "<td>&nbsp;&nbsp;LABORATORY <b>INPATIENT</b></td>";
//echo "<tD>".number_format($ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_LABORATORY_IPD","date",$date),2)."</tD>";
echo "<tD>".number_format( $ro->monthlyCashCollection("HOSPITAL_LABORATORY_IPD",$date,$datez) ,2)."</tD>";
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

$labTotal = ( $ro->monthlyCashCollection("HOSPITAL_LABORATORY_OPD",$date,$datez) + $ro->monthlyCashCollection("HOSPITAL_LABORATORY_IPD",$date,$datez) + $ro->monthlyCashCollection("LABORATORY_ADJUSTMENT",$date,$datez) );

echo "<tr>";
echo "<td>&nbsp;&nbsp;LABORATORY <b>OUTPATIENT</b></td>";
//echo "<tD>".number_format($ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_LABORATORY_OPD","date",$date),2)."</tD>";
echo "<tD>".number_format( $ro->monthlyCashCollection("HOSPITAL_LABORATORY_OPD",$date,$datez) ,2)."</tD>";
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
echo "<td>&nbsp;&nbsp;LABORATORY <b>ADJUSTMENT</b></td>";
//echo "<tD>".number_format($ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_LABORATORY_OPD","date",$date),2)."</tD>";
echo "<tD>".number_format( $ro->monthlyCashCollection("LABORATORY_ADJUSTMENT",$date,$datez) ,2)."</tD>";
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
echo "<tD>".number_format($labTotal,2)."</tD>";
echo "</tr>";






echo "<tr>";
echo "<td>&nbsp;&nbsp;BLOODBANK</td>";
//echo "<tD>".number_format($ro->doubleSelectNow("cashCollection","amount","title","BLOODBANK","date",$date),2)."</tD>";
echo "<tD>".number_format( $ro->monthlyCashCollection("BLOODBANK",$date,$datez) ,2)."</tD>";
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
echo "<tD>".number_format( $ro->monthlyCashCollection("BLOODBANK",$date,$datez) ,2)."</tD>";
$bloodbank = $ro->monthlyCashCollection("BLOODBANK",$date,$datez);
echo "</tr>";

echo "<tr>";
echo "<td>&nbsp;&nbsp;XRAY <b>INPATIENT</b></td>";
//echo "<tD>".number_format($ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_XRAY_IPD","date",$date),2)."</tD>";
echo "<tD>".number_format( $ro->monthlyCashCollection("HOSPITAL_XRAY_IPD",$date,$datez) ,2)."</tD>";
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

$xrayTotal = ( $ro->monthlyCashCollection("HOSPITAL_XRAY_IPD",$date,$datez) + $ro->monthlyCashCollection("HOSPITAL_XRAY_OPD",$date,$datez) + $ro->monthlyCashCollection("XRAY_ADJUSTMENT",$date,$datez) );

echo "<tr>";
echo "<td>&nbsp;&nbsp;XRAY <b>OUTPATIENT</b></td>";
echo "<tD>".number_format( $ro->monthlyCashCollection("HOSPITAL_XRAY_OPD",$date,$datez) ,2)."</tD>";
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
//echo "<tD>".number_format($xrayTotal,2)."</tD>";
echo "<Td>&nbsp;</td>";
echo "</tr>";





echo "<tr>";
echo "<td>&nbsp;&nbsp;XRAY <b>ADJUSTMENT</b></td>";
echo "<tD>".number_format( $ro->monthlyCashCollection("XRAY_ADJUSTMENT",$date,$datez) ,2)."</tD>";
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
echo "<tD>".number_format($xrayTotal,2)."</tD>";
echo "</tr>";






echo "<tr>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "</tr>";

echo "<tr>";
echo "<td>&nbsp;&nbsp;WARD</td>";
//echo "<tD>".number_format($ro->doubleSelectNow("cashCollection","amount","title","WARD","date",$date),2)."</tD>";
echo "<tD>".number_format( $ro->monthlyCashCollection("WARD",$date,$datez) ,2)."</tD>";
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
echo "<td>&nbsp;&nbsp;ACCOMODATION</td>";
echo "<tD>".number_format( $ro->monthlyCashCollection("ACCOMODATION",$date,$datez),2)."</tD>";
echo "</tr>";

$subTotal = ( $ro->monthlyCashCollection("WARD",$date,$datez) + $ro->monthlyCashCollection("ACCOMODATION",$date,$datez) );

echo "<tr>";
echo "<td>&nbsp;&nbsp;<b>SUB TOTAL</b></td>";
echo "<tD>".number_format($subTotal,2)."</tD>";
echo "</tr>";

//$subTotal_total = ( ( $subTotal + $ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_ADJUSTMENT","date",$date) ) - $ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_DISBURSEMENT","date",$date) );

$subTotal_total = ( ( $subTotal + $ro->monthlyCashCollection("HOSPITAL_ADJUSTMENT",$date,$datez) ) - $ro->monthlyCashCollection("HOSPITAL_DISBURSEMENT",$date,$datez) );


echo "<tr>";
echo "<td>&nbsp;ADD&nbsp;ADJUSTMENT</td>";
//echo "<tD>".number_format($ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_ADJUSTMENT","date",$date),2)."</tD>";
echo "<tD>".number_format( $ro->monthlyCashCollection("HOSPITAL_ADJUSTMENT",$date,$datez) ,2)."</tD>";
echo "</tr>";


echo "<tr>";
echo "<td>&nbsp;LESS&nbsp;DISBURSEMENT</td>";
//echo "<tD>".number_format($ro->doubleSelectNow("cashCollection","amount","title","HOSPITAL_DISBURSEMENT","date",$date),2)."</tD>";
echo "<tD>".number_format( $ro->monthlyCashCollection("HOSPITAL_DISBURSEMENT",$date,$datez) ,2)."</tD>";
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
echo "<tD>".number_format($subTotal_total,2)."</tD>";

echo "</tr>";






echo "</table>";

echo "<Br>";

//STOP HERE
echo "<table border=0>";
echo "<Tr>";
echo "<td><B>PHARMACY COLLECTION</B></td>";
echo "</tr>";

echo "<tr>";
echo "<td>INPATIENT</td>";
//echo "<tD>".number_format($ro->doubleSelectNow("cashCollection","amount","title","PHARMACY_INPATIENT","date",$date),2)."</tD>";
echo "<tD>".number_format( $ro->monthlyCashCollection("PHARMACY_INPATIENT",$date,$datez) ,2)."</tD>";
echo "</tr>";


echo "<tr>";
echo "<td>OUTPATIENT</td>";
//echo "<tD>".number_format($ro->doubleSelectNow("cashCollection","amount","title","PHARMACY_OUTPATIENT","date",$date),2)."</tD>";
echo "<tD>".number_format( $ro->monthlyCashCollection("PHARMACY_OUTPATIENT",$date,$datez) ,2)."</tD>";
echo "</tr>";

//$pharmaTotal = ( $ro->doubleSelectNow("cashCollection","amount","title","PHARMACY_INPATIENT","date",$date) + $ro->doubleSelectNow("cashCollection","amount","title","PHARMACY_OUTPATIENT","date",$date) );


$pharmaTotal = ( $ro->monthlyCashCollection("PHARMACY_INPATIENT",$date,$datez) + $ro->monthlyCashCollection("PHARMACY_OUTPATIENT",$date,$datez) );

echo "<tr>";
echo "<td><b>SUBTOTAL</b></td>";
echo "<tD>".number_format($pharmaTotal,2)."</tD>";
echo "</tr>";

//$pharmaTotal = ( ($pharmaTotal + $ro->doubleSelectNow("cashCollection","amount","title","PHARMACY_ADJUSTMENT","date",$date)) - $ro->doubleSelectNow("cashCollection","amount","title","PHARMACY_DISBURSEMENT","date",$date) );


$pharmaTotal = ( ($pharmaTotal + $ro->monthlyCashCollection("PHARMACY_ADJUSTMENT",$date,$datez)) - $ro->monthlyCashCollection("PHARMACY_DISBURSEMENT",$date,$datez) );

echo "<tr>";
echo "<td>ADD:&nbsp;ADJUSTMENT</td>";
//echo "<tD>".number_format($ro->doubleSelectNow("cashCollection","amount","title","PHARMACY_ADJUSTMENT","date",$date),2)."</tD>";
echo "<tD>".number_format( $ro->monthlyCashCollection("PHARMACY_ADJUSTMENT",$date,$datez) ,2)."</tD>";
echo "</tr>";

echo "<tr>";
echo "<td>LESS:&nbsp;DISBURSEMENT</td>";
//echo "<tD>".number_format($ro->doubleSelectNow("cashCollection","amount","title","PHARMACY_DISBURSEMENT","date",$date),2)."</tD>";
echo "<tD>".number_format( $ro->monthlyCashCollection("PHARMACY_DISBURSEMENT",$date,$datez) ,2)."</tD>";

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

echo "<br>";

echo "<Table border=0>";

echo "<tr>";
echo "<td>&nbsp;</tD>";
echo "</tr>";

echo "<tr>";
echo "<td>&nbsp;</tD>";
echo "</tr>";

$netCash = ( $ultrasound + $dialysis + $icu + $ctscan + $ecg + $totalPF + $labTotal + $bloodbank + $xrayTotal + $subTotal_total + $pharmaTotal + $decho + $rehab + $yagLaser + $rental  );

echo "<Tr>";
echo "<Td>NET CASH COLLECTION FOR THE DAY</tD>";
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
echo "<td><b>".number_format($netCash,2)."</b></tD>";
echo "</tr>";


echo "</table>";


echo "<Br><br>";

echo "PREPARED BY:&nbsp;MARICRIS P. ALABATA";

?>
