<?php
include("../../../myDatabase2.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];


$ro = new database2();
$ro->getPatientProfile($registrationNo);

$cashz=0;
$phicz=0;
$company=0;
$gt=0;


$hospitalBill_cash=0;
$hospitalBill_phic=0;
$hospitalBill_company=0;
$hospitalBill_gt=0;

$pf_cash=0;
$pf_phic=0;
$pf_company=0;
$pf_gt=0;

$room = preg_split ("/\-/", $ro->getRegistrationDetails_room()); 
$room1 = preg_split ("/\_/",$room[0]); 
$roomRate = $ro->selectNow("room","rate","Description",$ro->getRegistrationDetails_room());

?>

<script type="text/javascript">
function printF(printData)
{
	var a = window.open ('',  '',"status=1,scrollbars=1, width=auto,height=auto");
	a.document.write(document.getElementById(printData).innerHTML.replace(/<a\/?[^>]+>/gi, ''));
	a.document.close();
	a.focus();
	a.print();
	a.close();
}
</script>

<a href="#" onClick="printF('printData')" style="text-decoration:none; color:black;">PRINT</a>
<div id='printData' class='style1'>
<style type="text/css">
<!--
.txtSize {font-family: "Times New Roman";font-size: 13px;color: #000000;}
.Arial11White {font-family: Arial;font-size: 0px;color: #FFFFFF; display:none; }
.Arial11Black {font-family: Arial;font-size: 11px;color: #000000;}
.Arial11BlackBold {font-family: Arial;font-size: 11px;font-weight: bold;color: #000000;}
.Arial11BlackBoldNoDeco {font-family: Arial;font-size: 11px;font-weight: bold;color: #000000;}
.Arial12White {font-family: Arial;font-size: 12px;color: #FFFFFF;}
.Arial12Black {font-family: Arial;font-size: 12px;color: #000000;}
.Arial12BlackBold {font-family: Arial;font-size: 12px;font-weight: bold;color: #000000;}
.Arial12BlackBoldNoDeco {font-family: Arial;font-size: 12px;font-weight: bold;color: #000000;}
.Arial14Black {font-family: Arial;font-size: 14px;color: #000000;}
.Arial14BlackBold {font-family: Arial;font-size: 14px;font-weight: bold;color: #000000;}
-->
</style>
<?

echo "<center><a href='http://".$ro->getMyUrl()."/COCONUT/patientProfile/SOAoption/summary_short.php?registrationNo=$registrationNo&username=$username' target='_blank'><img src='http://".$ro->getMyUrl()."/COCONUT/myImages/mendero.png' width='45%' height='12%'></a></center>";

//echo "<center><div style='border:0px solid #000000; width:700px; height:auto; border-color:black black black black;'>";
echo "";
//echo "<center><font size=5><b><a href='#' style='color:#000; text-decoration:none;'>".$ro->getReportInformation("hmoSOA_name")."</a></b></font>";
//echo "<br><font size=2>".$ro->getReportInformation("hmoSOA_address")."</font>";
echo "<center>";
echo "<table border=0>";
echo "<tr>";
echo "<td><span class='Arial11Black'>Patient#:</span>&nbsp;</td><td><span class='Arial11BlackBold'>".$ro->getRegistrationDetails_patientNo()."</span></td>";
echo "<td><span class='Arial11Black'>&nbsp;&nbsp;Registration#:&nbsp;</span></td><td><span class='Arial11BlackBold'>&nbsp;".$ro->getRegistrationDetails_registrationNo()."</span></td>";

echo "<td><span class='Arial11Black'>&nbsp;Room:&nbsp;</span><span class='Arial11BlackBold'>".$room1[0]."</span></td>";

echo "</tr>";
echo "<tr>";
echo "<td><span class='Arial11Black'>Name:</span>&nbsp;</td><td>&nbsp;<span class='Arial11BlackBold'>".$ro->getPatientRecord_lastName().", ".$ro->getPatientRecord_firstName()."</span></td>";
echo "<td align='left'>&nbsp;&nbsp;<span class='Arial11Black'>Physician:</span> </td><td>&nbsp;<span class='Arial11BlackBold'>".$ro->getAttendingDoc($registrationNo,"Attending")."</span></td>";
echo "<td>&nbsp;<span class='Arial11Black'>Case: </span><span class='Arial11BlackBold'>".$ro->selectNow("registrationDetails","privateORhouse_case","registrationNo",$registrationNo)."</span></td>";
echo "</tr>";

echo "<tr>";
echo "<Td><span class='Arial11Black'>Admitted:</span>&nbsp;</td><td>&nbsp;<span class='Arial11BlackBold'>".$ro->getRegistrationDetails_dateRegistered()."@".$ro->getRegistrationDetails_timeRegistered()."</span></td>";

//echo "<td>CaseType:</td><TD>".$ro->getRegistrationDetails_caseType()."</tD>";
echo "<Td align='left'>&nbsp;&nbsp;<span class='Arial11Black'>Discharged:</span>&nbsp;</td><td>&nbsp;<span class='Arial11BlackBold'>".$ro->getRegistrationDetails_dateUnregistered()."@".$ro->getRegistrationDetails_timeUnregistered()."</span></td>";
echo "</tr>";


if( $ro->selectNow("registrationDetails","LimitHMO","registrationNo",$registrationNo) != "" ) {
$hmoLimit = number_format($ro->selectNow("registrationDetails","LimitHMO","registrationNo",$registrationNo),2);
}else {

if( $ro->selectNow("Company","type","companyName",$ro->getRegistrationDetails_company()) == "insurance" ) {//check kung insurance..
$hmoLimit=number_format(2000,2);
}else {
$hmoLimit="";
}

}



if( $ro->selectNow("registrationDetails","company","registrationNo",$registrationNo) != "" ) {
echo "<tr>";
echo "<td><span class='Arial11Black'>Company:</span></td>";
echo "<td><span class='Arial11BlackBold'>".$ro->getRegistrationDetails_company()." - $hmoLimit</span> </td>";
echo "<td>&nbsp;</td>";
echo "<td></td>";
echo "<td></td>";
echo "</tr>";
}else {
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "</tr>";
}


if( $ro->selectNow("registrationDetails","package","registrationNo",$registrationNo) != "" ) {
 $package = $ro->selectNow("registrationDetails","package","registrationNo",$registrationNo); 
 $splitPackage = preg_split ("/\_/", $package); 

echo "<tr>";
if( $ro->getPatientRecord_phic() == "NO" ) {
echo "<Td><span class='Arial11Black'>Package:</span></td><td>&nbsp;<span class='Arial11BlackBold'>".$splitPackage[1]." - ".$splitPackage[2]."</span></td>";
}else {
echo "<Td><span class='Arial11Black'>Package:</span></td><td>&nbsp;<span class'Arial11BlackBold'>".$splitPackage[1]." - ".$splitPackage[2]."</span></td>";
}
echo "</tr>";
}else { }


//echo "<tr>";
//echo "<Td>".$ro->coconutText("Company").":&nbsp;</td><td>&nbsp;".$ro->getRegistrationDetails_company()."</td>";
//echo "<td>&nbsp;</tD>";
//echo "<Td>".$ro->coconutText("Fx Diagnosis:").":&nbsp;</td><td>&nbsp;".$ro->getRegistrationDetails_finalDiagnosis()."</td>";
//echo "</tr>";

//echo "<tr>";
//echo "<Td>".$ro->coconutText("Room").":&nbsp;</td>";
//echo $ro->getPatientRoom($registrationNo);
//echo "<Td>".$ro->coconutText("Discharged").":&nbsp;</td><td>&nbsp;".$ro->getRegistrationDetails_dateUnregistered()."</td>";
//echo "</tr>";

/*
echo "<tr>";
echo "<Td>".$ro->coconutText("Age")."</tD><td>&nbsp;".$ro->getPatientRecord_age()."</tD>";
echo "<tD>&nbsp;</tD>";
echo "<Td>".$ro->coconutText("Room:")."</tD><td>".$ro->getRegistrationDetails_room()."</tD>";
echo "<td>Case:</td>";
echo "<td>".$ro->selectNow("registrationDetails","privateORhouse_case","registrationNo",$registrationNo)."</td>";
echo "</tr>";
*/
//echo "<tr>";
//echo "<td>".$ro->coconutText("Att.Doctor")."</tD><td>&nbsp;<font size=2>".$ro->getAttendingDoc($registrationNo,"Attending")."</font></td>";
//echo "<td></td>";
//echo "<td>".$ro->coconutText("Admitting Doc")."</td><tD>&nbsp;<font size=2>".$ro->getAttendingDoc($registrationNo,"Admitting")."</font></tD>";
//echo "</tr>";


echo "<tr>";
echo "<td><span class='Arial11Black'>Address:</span>&nbsp;</tD>";
echo "<tD><span class='Arial11BlackBold'>".$ro->getPatientRecord_address()."</span></tD>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='6'><div align='center'><span class='Arial11BlackBold'>".date("M d, Y")." ".date("H:i:s")."</span></div></tD>";
echo "</tr>";
echo "</table>";

/*
echo "<table border=0>";
echo "<td><span class='txtSize'>Address:</span>&nbsp;</tD>";
echo "<tD><span class='txtSize'>".$ro->getPatientRecord_address()."</span></tD>";
echo "</table>";
*/

echo "".$ro->checkAllReturns_notification($registrationNo)."<br>".$ro->checkForDispense_notification($registrationNo);
echo "<table border=1 cellpadding=1 cellspacing=0 rules=all>";
echo "<tr>";
echo "<td><div align='center' class='Arial11BlackBold'>&nbsp;PARTICULARS&nbsp;</di></td>";
echo "<td><div align='center' class='Arial11BlackBold'>&nbsp;ACTUAL&nbsp;</div></td>";
echo "<td><div align='center' class='Arial11BlackBold'>&nbsp;PHILHEALTH&nbsp;</div></td>";
echo "<td><div align='center' class='Arial11BlackBold'>&nbsp;COMPANY&nbsp;</div></td>";
echo "<td><div align='center' class='Arial11BlackBold'>&nbsp;CASH&nbsp;</div></td>";
echo "</tr>";


echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;Room&nbsp;</div></td>";
if( $ro->getTotal("total","Room And Board",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","Room And Board",$registrationNo),2); echo"&nbsp;</div></td>";
$gt+=$ro->getTotal("total","Room And Board",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","Room And Board",$registrationNo);
}else {
echo "<Td></td>";
}



  ////////////// PHIC ROOM
if( $ro->getTotal("phic","Room And Board",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11White'>&nbsp;"; echo number_format($ro->getTotal("phic","Room And Board",$registrationNo),2); echo"&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","Room And Board",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","Room And Board",$registrationNo);
}else {
echo "<Td></td>";
}


 ////////COMPANY ROOM
if( $ro->getTotal("company","Room And Board",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;".number_format($ro->getTotal("company","Room And Board",$registrationNo),2)."&nbsp;</div></td>";
$company+=$ro->getTotal("company","Room And Board",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","Room And Board",$registrationNo);
}else {
echo "<tD></tD>";
}



/*******************************************
  ////////////// PHIC ROOM
if( $ro->getTotal("phic","Room And Board",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","Room And Board",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","Room And Board",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","Room And Board",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}
******************************************/



if( $ro->getTotal("cashUnpaid","Room And Board",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","Room And Board",$registrationNo),2); echo"&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","Room And Board",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","Room And Board",$registrationNo);
}else {
echo "<td></tD>";
}
echo "</tr>";



echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;Medicines&nbsp;</div></td>";

if( $ro->getTotal("total","MEDICINE",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","MEDICINE",$registrationNo),2); echo"&nbsp;</div></td>";
$gt+=$ro->getTotal("total","MEDICINE",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","MEDICINE",$registrationNo);
}else {
echo "<td></tD>";
}


   /////// PHIC MEDICINE
if( $ro->getTotal("phic","MEDICINE",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11White'>&nbsp;"; echo number_format($ro->getTotal("phic","MEDICINE",$registrationNo),2); echo"&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","MEDICINE",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","MEDICINE",$registrationNo);
}else {
echo "<Td></td>";
}


    ////// COMPANY MEDICINE
if( $ro->getTotal("company","MEDICINE",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("company","MEDICINE",$registrationNo),2); echo"&nbsp;</div></td>";
$company+=$ro->getTotal("company","MEDICINE",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","MEDICINE",$registrationNo);
}else {
echo "<Td></tD>";
}

/********************************
   /////// PHIC MEDICINE
if( $ro->getTotal("phic","MEDICINE",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","MEDICINE",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","MEDICINE",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","MEDICINE",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}

*********************************/



if( $ro->getTotal("cashUnpaid","MEDICINE",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","MEDICINE",$registrationNo),2); echo"&nbsp;</div></td>";
$cashz+=$ro->getTotal("cashUnpaid","MEDICINE",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","MEDICINE",$registrationNo);
}else {
echo "<td></tD>";
}
echo "</tr>";

echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;Supplies&nbsp;</div></td>";
if( $ro->getTotal("total","SUPPLIES",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","SUPPLIES",$registrationNo),2); echo"&nbsp;</div></td>";
$gt+=$ro->getTotal("total","SUPPLIES",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","SUPPLIES",$registrationNo);
}else {
echo "<td></td>";
}


      ////// PHIC SUPPLIES
if( $ro->getTotal("phic","SUPPLIES",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11White'>&nbsp;"; echo number_format($ro->getTotal("phic","SUPPLIES",$registrationNo),2); echo"&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","SUPPLIES",$registrationNo); //stiop
$hospitalBill_phic += $ro->getTotal("phic","SUPPLIES",$registrationNo);
}else {
echo "<tD></td>";
}


    ////// COMPANY SUPPLIES
if( $ro->getTotal("company","SUPPLIES",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("company","SUPPLIES",$registrationNo),2); echo"&nbsp;</div></td>";
$company+=$ro->getTotal("company","SUPPLIES",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","SUPPLIES",$registrationNo);
}else {
echo "<tD></td>";
}


/*********************************
      ////// PHIC SUPPLIES
if( $ro->getTotal("phic","SUPPLIES",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","SUPPLIES",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","SUPPLIES",$registrationNo); //stiop
$hospitalBill_phic += $ro->getTotal("phic","SUPPLIES",$registrationNo);
}else {
echo "<tD>&nbsp;</td>";
}
********************************/


if( $ro->getTotal("cashUnpaid","SUPPLIES",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","SUPPLIES",$registrationNo),2); echo"&nbsp;</div></td>";
$cashz+=$ro->getTotal("cashUnpaid","SUPPLIES",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","SUPPLIES",$registrationNo);
}else {
echo "<td></tD>";
}
echo "</tr>";

echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;Laboratory&nbsp;</div></td>";
if( $ro->getTotal("total","LABORATORY",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","LABORATORY",$registrationNo),2); echo "&nbsp;</div></td>";
$gt+=$ro->getTotal("total","LABORATORY",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","LABORATORY",$registrationNo);
}else {
echo "<tD></tD>";
}



        /////// PHIC LABORATORY
if( $ro->getTotal("phic","LABORATORY",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11White'>&nbsp;"; echo number_format($ro->getTotal("phic","LABORATORY",$registrationNo),2); echo "&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","LABORATORY",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","LABORATORY",$registrationNo);
}else {
echo "<Td></td>";
}



          ///// COMPANY LABORATORY
if( $ro->getTotal("company","LABORATORY",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("company","LABORATORY",$registrationNo),2); echo "&nbsp;</div></td>";
$company+=$ro->getTotal("company","LABORATORY",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","LABORATORY",$registrationNo);
}else {
echo "<Td></tD>";
}



/****************************************
        /////// PHIC LABORATORY
if( $ro->getTotal("phic","LABORATORY",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","LABORATORY",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","LABORATORY",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","LABORATORY",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}
****************************************/



if( $ro->getTotal("cashUnpaid","LABORATORY",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","LABORATORY",$registrationNo),2); echo "&nbsp;</div></td>";
$cashz+=$ro->getTotal("cashUnpaid","LABORATORY",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","LABORATORY",$registrationNo);
}else {
echo "<td></td>";
}
echo "</tr>";


echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;Radiology&nbsp;</div></td>";
if( $ro->getTotal("total","RADIOLOGY",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","RADIOLOGY",$registrationNo),2); echo"&nbsp;</div></td>";
$gt+=$ro->getTotal("total","RADIOLOGY",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","RADIOLOGY",$registrationNo);
}else {
echo "<td></tD>";
}



   ///////////////// PHIC RADIOLOGY
if( $ro->getTotal("phic","RADIOLOGY",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11White'>&nbsp;"; echo number_format($ro->getTotal("phic","RADIOLOGY",$registrationNo),2); echo"&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","RADIOLOGY",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","RADIOLOGY",$registrationNo);
}else {
echo "<td></td>";
}



  //////// COMPANY RADIOLOGY
if( $ro->getTotal("company","RADIOLOGY",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("company","RADIOLOGY",$registrationNo),2); echo "&nbsp;</div></td>";
$company+=$ro->getTotal("company","RADIOLOGY",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","RADIOLOGY",$registrationNo);
}else {
echo "<td></tD>";
}


/****************************************
   ///////////////// PHIC RADIOLOGY
if( $ro->getTotal("phic","RADIOLOGY",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","RADIOLOGY",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","RADIOLOGY",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","RADIOLOGY",$registrationNo);
}else {
echo "<td>&nbsp;</td>";
}
****************************************/


if( $ro->getTotal("cashUnpaid","RADIOLOGY",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","RADIOLOGY",$registrationNo),2); echo "&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","RADIOLOGY",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","RADIOLOGY",$registrationNo);
}else {
echo "<td></tD>";
}
echo "</tr>";



/************ECG************************/
if( $ro->checkIfTitleExist($registrationNo,"ECG") > 0 ) {
echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;ECG&nbsp;</div></td>";
if( $ro->getTotal("total","ECG",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","ECG",$registrationNo),2); echo "&nbsp;</span></td>";
$gt+=$ro->getTotal("total","ECG",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","ECG",$registrationNo);
}else {
echo "<td></tD>";
}



   ///////////////// PHIC ECG
if( $ro->getTotal("phic","ECG",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11White'>&nbsp;"; echo number_format($ro->getTotal("phic","ECG",$registrationNo),2); echo "&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","ECG",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","ECG",$registrationNo);
}else {
echo "<td></td>";
}



  //////// COMPANY ECG
if( $ro->getTotal("company","ECG",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("company","ECG",$registrationNo),2); echo "&nbsp;</div></td>";
$company+=$ro->getTotal("company","ECG",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","ECG",$registrationNo);
}else {
echo "<td></tD>";
}


//CASH ECG
if( $ro->getTotal("cashUnpaid","ECG",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","ECG",$registrationNo),2); echo "</div></td>";
$cashz += $ro->getTotal("cashUnpaid","ECG",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","ECG",$registrationNo);
}else {
echo "<td></tD>";
}
echo "</tr>";


}else { }

/**************************************/





/************ENDOSCOPY************************/
if( $ro->checkIfTitleExist($registrationNo,"ENDOSCOPY") > 0 ) {
echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;Endoscopy&nbsp;</div></td>";
if( $ro->getTotal("total","ENDOSCOPY",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","ENDOSCOPY",$registrationNo),2); echo "&nbsp;</div></td>";
$gt+=$ro->getTotal("total","ENDOSCOPY",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","ENDOSCOPY",$registrationNo);
}else {
echo "<td></tD>";
}



   ///////////////// PHIC ENDOSCOPY
if( $ro->getTotal("phic","ENDOSCOPY",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11White'>&nbsp;"; echo number_format($ro->getTotal("phic","ENDOSCOPY",$registrationNo),2); echo "&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","ENDOSCOPY",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","ENDOSCOPY",$registrationNo);
}else {
echo "<td></td>";
}



  //////// COMPANY ENDOSCOPY
if( $ro->getTotal("company","ENDOSCOPY",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("company","ENDOSCOPY",$registrationNo),2); echo "&nbsp;</div></td>";
$company+=$ro->getTotal("company","ENDOSCOPY",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","ENDOSCOPY",$registrationNo);
}else {
echo "<td></tD>";
}


//CASH ENDOSCOPY
if( $ro->getTotal("cashUnpaid","ENDOSCOPY",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","ENDOSCOPY",$registrationNo),2); echo "&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","ENDOSCOPY",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","ENDOSCOPY",$registrationNo);
}else {
echo "<td></tD>";
}
echo "</tr>";


}else { }

/**************************************/






/************CARDIOLOGY************************/
if( $ro->checkIfTitleExist($registrationNo,"CARDIOLOGY") > 0 ) {
echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;Cardiology&nbsp;</div></td>";
if( $ro->getTotal("total","CARDIOLOGY",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","CARDIOLOGY",$registrationNo),2); echo "&nbsp;</div></td>";
$gt+=$ro->getTotal("total","CARDIOLOGY",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","CARDIOLOGY",$registrationNo);
}else {
echo "<td></tD>";
}



   ///////////////// PHIC CARDIOLOGY
if( $ro->getTotal("phic","CARDIOLOGY",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11White'>&nbsp;"; echo number_format($ro->getTotal("phic","CARDIOLOGY",$registrationNo),2); echo "&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","CARDIOLOGY",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","CARDIOLOGY",$registrationNo);
}else {
echo "<td></td>";
}



  //////// COMPANY CARDIOLOGY
if( $ro->getTotal("company","CARDIOLOGY",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("company","CARDIOLOGY",$registrationNo),2); echo "&nbsp;</div></td>";
$company+=$ro->getTotal("company","CARDIOLOGY",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","CARDIOLOGY",$registrationNo);
}else {
echo "<td></tD>";
}


/****************************************
   ///////////////// PHIC RADIOLOGY
if( $ro->getTotal("phic","RADIOLOGY",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","RADIOLOGY",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","RADIOLOGY",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","RADIOLOGY",$registrationNo);
}else {
echo "<td>&nbsp;</td>";
}
****************************************/

//CASH ECG
if( $ro->getTotal("cashUnpaid","CARDIOLOGY",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","CARDIOLOGY",$registrationNo),2); echo "&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","CARDIOLOGY",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","CARDIOLOGY",$registrationNo);
}else {
echo "<td></tD>";
}
echo "</tr>";


}else { }

/**************CARDIOLOGY************************/










echo "<tr>";
echo "<td align='left' class='Arial11BlackBold'>&nbsp;Nursing Care&nbsp;</td>";
if( $ro->getTotal("total","Nursing Care",$registrationNo) > 0 ) {
echo "<td align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","Nursing Care",$registrationNo),2); echo"&nbsp;</td>";
$gt+=$ro->getTotal("total","Nursing Care",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","Nursing Care",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}



   /////////// PHIC NURSING-CHARGES
if( $ro->getTotal("phic","Nursing Care",$registrationNo) > 0 ) {
echo "<td align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("phic","Nursing Care",$registrationNo),2); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","Nursing Care",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","Nursing Care",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}



    ////////// COMPANY NURSING-CHARGES
if( $ro->getTotal("company","Nursing Care",$registrationNo) > 0 ) {
echo "<td align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("company","Nursing Care",$registrationNo),2); echo"&nbsp;</td>";
$company+=$ro->getTotal("company","Nursing Care",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","Nursing Care",$registrationNo);
}else {
echo "<tD>&nbsp;</tD>";
}


/********************************************

   /////////// PHIC NURSING-CHARGES
if( $ro->getTotal("phic","NURSING-CHARGES",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","NURSING-CHARGES",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","NURSING-CHARGES",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","NURSING-CHARGES",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}
*******************************************/


if( $ro->getTotal("cashUnpaid","Nursing Care",$registrationNo) > 0 ) {
echo "<td align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","Nursing Care",$registrationNo),2); echo"&nbsp;</td>";
$cashz += $ro->getTotal("cashUnpaid","Nursing Care",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","Nursing Care",$registrationNo);
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";



echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;Miscellaneous&nbsp;</div></td>";
if( $ro->getTotal("total","MISCELLANEOUS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","MISCELLANEOUS",$registrationNo),2); echo "&nbsp;</div></td>";
$gt+=$ro->getTotal("total","MISCELLANEOUS",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","MISCELLANEOUS",$registrationNo);
}else {
echo "<Td></td>";
}



    ///////// PHIC MISCELLANEOUS
if( $ro->getTotal("phic","MISCELLANEOUS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11White'>&nbsp;"; echo number_format($ro->getTotal("phic","MISCELLANEOUS",$registrationNo),2); echo"&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","MISCELLANEOUS",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","MISCELLANEOUS",$registrationNo);
}else {
echo "<Td></td>";
}


      ////// COMPANY MISCELLANEOUS
if( $ro->getTotal("company","MISCELLANEOUS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("company","MISCELLANEOUS",$registrationNo),2); echo "&nbsp;</div></td>";
$company+=$ro->getTotal("company","MISCELLANEOUS",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","MISCELLANEOUS",$registrationNo);
}else {
echo "<tD></tD>";
}


/****************************************
    ///////// PHIC MISCELLANEOUS
if( $ro->getTotal("phic","MISCELLANEOUS",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","MISCELLANEOUS",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","MISCELLANEOUS",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","MISCELLANEOUS",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}
***************************************/



if( $ro->getTotal("cashUnpaid","MISCELLANEOUS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","MISCELLANEOUS",$registrationNo),2); echo "&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","MISCELLANEOUS",$registrationNo);
$hospitalBill_cash +=  $ro->getTotal("cashUnpaid","MISCELLANEOUS",$registrationNo);
}else {
echo "<td></tD>";
}
echo "</tr>";




echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;Others&nbsp;</div></td>";
if( $ro->getTotal("total","OTHERS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","OTHERS",$registrationNo),2); echo"&nbsp;</div></td>";
$gt+=$ro->getTotal("total","OTHERS",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","OTHERS",$registrationNo);
}else {
echo "<Td></td>";
}


   /////////// PHIC OTHERS
if( $ro->getTotal("phic","OTHERS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("phic","OTHERS",$registrationNo),2); echo"&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","OTHERS",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","OTHERS",$registrationNo);
}else {
echo "<Td></td>";
}


   ////// COMPANY OTHERS
if( $ro->getTotal("company","OTHERS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("company","OTHERS",$registrationNo),2); echo"&nbsp;</div></td>";
$company+=$ro->getTotal("company","OTHERS",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","OTHERS",$registrationNo);
}else {
echo "<tD></tD>";
}


/****************************************************
   /////////// PHIC OTHERS
if( $ro->getTotal("phic","OTHERS",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","OTHERS",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","OTHERS",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","OTHERS",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}
***************************************************/


if( $ro->getTotal("cashUnpaid","OTHERS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","OTHERS",$registrationNo),2); echo"&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","OTHERS",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","OTHERS",$registrationNo);
}else {
echo "<td></tD>";
}
echo "</tr>";




///////////////OR/DR/ER FEE

if( $ro->checkIfTitleExist($registrationNo,"OR/DR/ER FEE") ) {

echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;OR/DR/ER/ICU Fee&nbsp;</div></td>";
if( $ro->getTotal("total","OR/DR/ER FEE",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","OR/DR/ER FEE",$registrationNo),2); echo "</div></td>";
$gt+=$ro->getTotal("total","OR/DR/ER FEE",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","OR/DR/ER FEE",$registrationNo);
}else {
echo "<Td></td>";
}


  //////// PHIC OR/DR/ER
if( $ro->getTotal("phic","OR/DR/ER FEE",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11White'>&nbsp;"; echo number_format($ro->getTotal("phic","OR/DR/ER FEE",$registrationNo),2); echo "&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","OR/DR/ER Fee",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","OR/DR/ER FEE",$registrationNo);
}else {
echo "<Td></td>";
}


   ////// COMPANY OR/DR/ER 
if( $ro->getTotal("company","OR/DR/ER FEE",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("company","OR/DR/ER FEE",$registrationNo),2); echo "&nbsp;</div></td>";
$company+=$ro->getTotal("company","OR/DR/ER FEE",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","OR/DR/ER FEE",$registrationNo);
}else {
echo "<tD></tD>";
}


/*******************************************
  //////// PHIC OR/DR/ER
if( $ro->getTotal("phic","OR/DR/ER Fee",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","OR/DR/ER Fee",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","OR/DR/ER Fee",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","OR/DR/ER Fee",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}
*******************************************/


if( $ro->getTotal("cashUnpaid","OR/DR/ER FEE",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","OR/DR/ER FEE",$registrationNo),2); echo "&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","OR/DR/ER FEE",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","OR/DR/ER FEE",$registrationNo);
}else {
echo "<td></tD>";
}
echo "</tr>";

}else { }

///////////OR/DR/ER FEEE




if( $ro->selectNow("reportHeading","information","reportName","rehab") == "Activate" ) {


/////REHAB START

if( $ro->checkIfTitleExist($registrationNo,"REHAB") ) {

echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;Rehab&nbsp;</div></td>";
if( $ro->getTotal("total","REHAB",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","REHAB",$registrationNo),2); echo"&nbsp;</div></td>";
$gt+=$ro->getTotal("total","REHAB",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","REHAB",$registrationNo);
}else {
echo "<Td></td>";
}



   ///////////////// PHIC REHAB
if( $ro->getTotal("phic","REHAB",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11White'>&nbsp;"; echo number_format($ro->getTotal("phic","REHAB",$registrationNo),2); echo "&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","REHAB",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","REHAB",$registrationNo);
}else {
echo "<Td></td>";
}


    ///////////// COMPANY REHAB
if( $ro->getTotal("company","REHAB",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>"; echo number_format($ro->getTotal("company","REHAB",$registrationNo),2); echo "&nbsp;</div></td>";

$company+=$ro->getTotal("company","REHAB",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","REHAB",$registrationNo);
}else {
echo "<tD></tD>";
}


/**********************************************
   ///////////////// PHIC REHAB
if( $ro->getTotal("phic","REHAB",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","REHAB",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","REHAB",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","REHAB",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}
*********************************************/


if( $ro->getTotal("cashUnpaid","REHAB",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","REHAB",$registrationNo),2); echo "&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","REHAB",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","REHAB",$registrationNo);
}else {
echo "<td></tD>";
}
echo "</tr>";



/////REHAB END

}else { }

}else {

}





if( $ro->checkIfTitleExist($registrationNo,"OXYGEN") > 0  ) {

echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;Oxygen&nbsp;</div></td>";
if( $ro->getTotal("total","OXYGEN",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","OXYGEN",$registrationNo),2); echo "&nbsp;</div></td>";
$gt+=$ro->getTotal("total","OXYGEN",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","OXYGEN",$registrationNo);
}else {
echo "<Td></td>";
}



   ///////////////// PHIC OXYGEN
if( $ro->getTotal("phic","OXYGEN",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11White'>"; echo number_format($ro->getTotal("phic","OXYGEN",$registrationNo),2); echo "&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","OXYGEN",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","OXYGEN",$registrationNo);
}else {
echo "<Td></td>";
}


    ///////////// COMPANY OXYGEN
if( $ro->getTotal("company","OXYGEN",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("company","OXYGEN",$registrationNo),2); echo "&nbsp;</div></td>";

$company+=$ro->getTotal("company","OXYGEN",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","OXYGEN",$registrationNo);
}else {
echo "<tD></tD>";
}


/**********************************************
   ///////////////// PHIC REHAB
if( $ro->getTotal("phic","REHAB",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","REHAB",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","REHAB",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","REHAB",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}
*********************************************/


if( $ro->getTotal("cashUnpaid","OXYGEN",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","OXYGEN",$registrationNo),2); echo "&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","OXYGEN",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","OXYGEN",$registrationNo);
}else {
echo "<td></tD>";
}
echo "</tr>";

}else { }






if( $ro->checkIfTitleExist($registrationNo,"NITROUS") > 0  ) {

echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;Nitrous&nbsp;</div></td>";
if( $ro->getTotal("total","NITROUS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","NITROUS",$registrationNo),2); echo"&nbsp;</div></td>";
$gt+=$ro->getTotal("total","NITROUS",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","NITROUS",$registrationNo);
}else {
echo "<Td></td>";
}



   ///////////////// PHIC OXYGEN
if( $ro->getTotal("phic","NITROUS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11White'>"; echo number_format($ro->getTotal("phic","NITROUS",$registrationNo),2); echo "&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","NITROUS",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","NITROUS",$registrationNo);
}else {
echo "<Td></td>";
}


    ///////////// COMPANY OXYGEN
if( $ro->getTotal("company","NITROUS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("company","NITROUS",$registrationNo),2); echo "&nbsp;</div></td>";
$company+=$ro->getTotal("company","NITROUS",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","NITROUS",$registrationNo);
}else {
echo "<tD></tD>";
}


/**********************************************
   ///////////////// PHIC REHAB
if( $ro->getTotal("phic","REHAB",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","REHAB",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","REHAB",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","REHAB",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}
*********************************************/


if( $ro->getTotal("cashUnpaid","NITROUS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","NITROUS",$registrationNo),2); echo "</span>&nbsp;</td>";
$cashz += $ro->getTotal("cashUnpaid","NITROUS",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","NITROUS",$registrationNo);
}else {
echo "<td></tD>";
}
echo "</tr>";

}else { }






/////////  GENERATOR CHARGE  /////////


//if( $ro->checkIfTitleExist($registrationNo,"GENERATOR_CHARGE") > 0  ) {

/*
echo "<tr>";
echo "<td>&nbsp;<a href='http://".$ro->getMyUrl()."/COCONUT/systemBiller/generatorCharge/checkGenerator.php?registrationNo=$registrationNo&username=$username' style='text-decoration:none; color:black;'>Generator</a>&nbsp;</td>";
if( $ro->getTotal("total","GENERATOR_CHARGE",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("total","GENERATOR_CHARGE",$registrationNo),2); echo"&nbsp;</td>";
$gt+=$ro->getTotal("total","GENERATOR_CHARGE",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","GENERATOR_CHARGE",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}

*/

/*   
///////////////// PHIC GENERATOR
if( $ro->getTotal("phic","GENERATOR_CHARGE",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","GENERATOR_CHARGE",$registrationNo),2); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","GENERATOR_CHARGE",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","GENERATOR_CHARGE",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}

*/
/*
    ///////////// COMPANY GENERATOR
if( $ro->getTotal("company","GENERATOR_CHARGE",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("company","GENERATOR_CHARGE",$registrationNo),2); echo"&nbsp;</td>";

$company+=$ro->getTotal("company","GENERATOR_CHARGE",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","GENERATOR_CHARGE",$registrationNo);
}else {
echo "<tD>&nbsp;</tD>";
}
*/

/**********************************************
   ///////////////// PHIC REHAB
if( $ro->getTotal("phic","REHAB",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","REHAB",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","REHAB",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","REHAB",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}
*********************************************/

/*
if( $ro->getTotal("cashUnpaid","GENERATOR_CHARGE",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","GENERATOR_CHARGE",$registrationNo),2); echo"&nbsp;</td>";
$cashz += $ro->getTotal("cashUnpaid","GENERATOR_CHARGE",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","GENERATOR_CHARGE",$registrationNo);
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";
*/
//}else { }


//////// GENERATOR CHARGE //////







if( $ro->selectNow("reportHeading","information","reportName","dialysis") == "Activate" ) {

echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;Dialysis&nbsp;</div></td>";
if( $ro->getTotal("total","DIALYSIS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","DIALYSIS",$registrationNo),2); echo "&nbsp;</div></td>";
$gt+=$ro->getTotal("total","DIALYSIS",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","DIALYSIS",$registrationNo);
}else {
echo "<Td></td>";
}



   ///////////////// PHIC DIALYSIS
if( $ro->getTotal("phic","DIALYSIS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11White'>&nbsp;"; echo number_format($ro->getTotal("phic","DIALYSIS",$registrationNo),2); echo "&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","DIALYSIS",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","DIALYSIS",$registrationNo);
}else {
echo "<Td></td>";
}


    ///////////// COMPANY DIALYSIS
if( $ro->getTotal("company","DIALYSIS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("company","DIALYSIS",$registrationNo),2); echo"&nbsp;</div></td>";

$company+=$ro->getTotal("company","DIALYSIS",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","DIALYSIS",$registrationNo);
}else {
echo "<tD></tD>";
}


/**********************************************
   ///////////////// PHIC REHAB
if( $ro->getTotal("phic","REHAB",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","REHAB",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","REHAB",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","REHAB",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}
*********************************************/


if( $ro->getTotal("cashUnpaid","DIALYSIS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","DIALYSIS",$registrationNo),2); echo"&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","DIALYSIS",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","DIALYSIS",$registrationNo);
}else {
echo "<td></tD>";
}
echo "</tr>";

}else {

}



if( $ro->selectNow("reportHeading","information","reportName","nbs") == "Activate" ) {



////////////NBS START

if( $ro->checkIfTitleExist($registrationNo,"NBS") > 0 ) {

echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;NBS/HEPA B/BCG&nbsp;</div></td>";
if( $ro->getTotal("total","NBS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","NBS",$registrationNo),2); echo"&nbsp;</div></td>";
$gt+=$ro->getTotal("total","NBS",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","NBS",$registrationNo);
}else {
echo "<Td></td>";
}



   ///////////////// PHIC NBS
if( $ro->getTotal("phic","NBS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11White'>&nbsp;"; echo number_format($ro->getTotal("phic","NBS",$registrationNo),2); echo "&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","NBS",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","NBS",$registrationNo);
}else {
echo "<Td></td>";
}


    ///////////// COMPANY NBS
if( $ro->getTotal("company","NBS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("company","NBS",$registrationNo),2); echo"&nbsp;</div></td>";

$company+=$ro->getTotal("company","NBS",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","NBS",$registrationNo);
}else {
echo "<tD></tD>";
}


/**********************************************
   ///////////////// PHIC REHAB
if( $ro->getTotal("phic","REHAB",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","REHAB",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","REHAB",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","REHAB",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}
*********************************************/


if( $ro->getTotal("cashUnpaid","NBS",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>"; echo number_format($ro->getTotal("cashUnpaid","NBS",$registrationNo),2); echo"&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","NBS",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","NBS",$registrationNo);
}else {
echo "<td></tD>";
}
echo "</tr>";

}else { }


/////////////NBS END





}else {

}




//////////////CARDIAC

if( $ro->checkIfTitleExist($registrationNo,"CARDIAC") > 0 ) {

echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;Cardiac&nbsp;</div></td>";
if( $ro->getTotal("total","CARDIAC",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","CARDIAC",$registrationNo),2); echo "&nbsp;</div></td>";
$gt+=$ro->getTotal("total","CARDIAC",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","CARDIAC",$registrationNo);
}else {
echo "<Td></td>";
}



   ///////////////// PHIC NBS
if( $ro->getTotal("phic","CARDIAC",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11White'>&nbsp;"; echo number_format($ro->getTotal("phic","CARDIAC",$registrationNo),2); echo "&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","CARDIAC",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","CARDIAC",$registrationNo);
}else {
echo "<Td></td>";
}


    ///////////// COMPANY NBS
if( $ro->getTotal("company","CARDIAC",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>"; echo number_format($ro->getTotal("company","CARDIAC",$registrationNo),2); echo"&nbsp;</div></td>";

$company+=$ro->getTotal("company","CARDIAC",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","CARDIAC",$registrationNo);
}else {
echo "<tD></tD>";
}


/**********************************************
   ///////////////// PHIC REHAB
if( $ro->getTotal("phic","REHAB",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","REHAB",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","REHAB",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","REHAB",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}
*********************************************/


if( $ro->getTotal("cashUnpaid","CARDIAC",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","CARDIAC",$registrationNo),2); echo "&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","CARDIAC",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","CARDIAC",$registrationNo);
}else {
echo "<td></tD>";
}
echo "</tr>";

}else { }

/////////////CARDIAC














//////////////BLOODBANK

if( $ro->checkIfTitleExist($registrationNo,"BLOODBANK") > 0  ) {
echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;Blood Bank&nbsp;</div></td>";
if( $ro->getTotal("total","BLOODBANK",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>"; echo number_format($ro->getTotal("total","BLOODBANK",$registrationNo),2); echo "&nbsp;</div></td>";
$gt+=$ro->getTotal("total","BLOODBANK",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","BLOODBANK",$registrationNo);
}else {
echo "<Td></td>";
}



   ///////////////// PHIC NBS
if( $ro->getTotal("phic","BLOODBANK",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11White'>&nbsp;"; echo number_format($ro->getTotal("phic","BLOODBANK",$registrationNo),2); echo "&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","BLOODBANK",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","BLOODBANK",$registrationNo);
}else {
echo "<Td></td>";
}


    ///////////// COMPANY NBS
if( $ro->getTotal("company","BLOODBANK",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("company","BLOODBANK",$registrationNo),2); echo "&nbsp;</div></td>";

$company+=$ro->getTotal("company","BLOODBANK",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","BLOODBANK",$registrationNo);
}else {
echo "<tD></tD>";
}


/**********************************************
   ///////////////// PHIC REHAB
if( $ro->getTotal("phic","REHAB",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","REHAB",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","REHAB",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","REHAB",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}
*********************************************/


if( $ro->getTotal("cashUnpaid","BLOODBANK",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","BLOODBANK",$registrationNo),2); echo "&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","BLOODBANK",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","BLOODBANK",$registrationNo);
}else {
echo "<td></tD>";
}
echo "</tr>";

}else {  }

/////////////BLOOD BANK











//////////////VENTILATOR

if( $ro->checkIfTitleExist($registrationNo,"VENTILATOR") > 0  ) {
echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;Ventilator&nbsp;</div></td>";
if( $ro->getTotal("total","VENTILATOR",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","VENTILATOR",$registrationNo),2); echo"&nbsp;</div></td>";
$gt+=$ro->getTotal("total","VENTILATOR",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","VENTILATOR",$registrationNo);
}else {
echo "<Td></td>";
}



   ///////////////// PHIC VENTILATOR
if( $ro->getTotal("phic","VENTILATOR",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11White'>&nbsp;"; echo number_format($ro->getTotal("phic","VENTILATOR",$registrationNo),2); echo "&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","VENTILATOR",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","VENTILATOR",$registrationNo);
}else {
echo "<Td></td>";
}


    ///////////// COMPANY VENTILATOR
if( $ro->getTotal("company","VENTILATOR",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("company","VENTILATOR",$registrationNo),2); echo "&nbsp;</div></td>";

$company+=$ro->getTotal("company","VENTILATOR",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","VENTILATOR",$registrationNo);
}else {
echo "<tD></tD>";
}


/**********************************************
   ///////////////// PHIC REHAB
if( $ro->getTotal("phic","REHAB",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","REHAB",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","REHAB",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","REHAB",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}
*********************************************/


if( $ro->getTotal("cashUnpaid","VENTILATOR",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","VENTILATOR",$registrationNo),2); echo "&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","VENTILATOR",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","VENTILATOR",$registrationNo);
}else {
echo "<td></tD>";
}
echo "</tr>";

}else {  }

/////////////VENTILATOR



//////////////PULSE OXIMETER

if( $ro->checkIfTitleExist($registrationNo,"PULSE_OXIMETER") > 0  ) {
echo "<tr>";
echo "<td><div align='left' class='Arial11BlackBold'>&nbsp;Pulse Oximeter&nbsp;</div></td>";
if( $ro->getTotal("total","PULSE_OXIMETER",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("total","PULSE_OXIMETER",$registrationNo),2); echo"&nbsp;</div></td>";
$gt+=$ro->getTotal("total","PULSE_OXIMETER",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","PULSE_OXIMETER",$registrationNo);
}else {
echo "<Td></td>";
}



   ///////////////// PHIC PULSE_OXIMETER
if( $ro->getTotal("phic","PULSE_OXIMETER",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11White'>&nbsp;"; echo number_format($ro->getTotal("phic","PULSE_OXIMETER",$registrationNo),2); echo "&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","PULSE_OXIMETER",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","PULSE_OXIMETER",$registrationNo);
}else {
echo "<Td></td>";
}


    ///////////// COMPANY PULSE_OXIMETER
if( $ro->getTotal("company","PULSE_OXIMETER",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("company","PULSE_OXIMETER",$registrationNo),2); echo "&nbsp;</div></td>";

$company+=$ro->getTotal("company","PULSE_OXIMETER",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","PULSE_OXIMETER",$registrationNo);
}else {
echo "<tD></tD>";
}


/**********************************************
   ///////////////// PHIC REHAB
if( $ro->getTotal("phic","REHAB",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","REHAB",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","REHAB",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","REHAB",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}
*********************************************/


if( $ro->getTotal("cashUnpaid","PULSE_OXIMETER",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial11Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","PULSE_OXIMETER",$registrationNo),2); echo "&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","PULSE_OXIMETER",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","PULSE_OXIMETER",$registrationNo);
}else {
echo "<td></tD>";
}
echo "</tr>";

}else {  }

/////////////VENTILATOR



if($ro->selectNow("registrationDetails","interest","registrationNo",$registrationNo) > 0) {
echo "<tr>";
echo "<td><div align='left' class='Arial12BlackBold'>&nbsp;Interest</div></tD>";
echo "<td></td>";
echo "<td></td>";
echo "<td><div align='right' class='Arial12Black'>&nbsp;".$ro->selectNow("registrationDetails","interest","registrationNo",$registrationNo)."&nbsp;</div></tD>";
echo "<td></td>";
echo "</tr>";
}else { }








/*
echo "<tr>";
echo "<td>&nbsp;<font size=2>Room @ ".$ro->getQTY_room($registrationNo)." day(s)</font> &nbsp;</td>";
if( $ro->getTotal("total","Room And Board",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("total","Room And Board",$registrationNo),2); echo"&nbsp;</td>";
$gt+=$ro->getTotal("total","Room And Board",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","Room And Board",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}



  ////////////// PHIC ROOM
if( $ro->getTotal("phic","Room And Board",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","Room And Board",$registrationNo),2); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","Room And Board",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","Room And Board",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}


 ////////COMPANY ROOM
if( $ro->getTotal("company","Room And Board",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("company","Room And Board",$registrationNo),2); echo"&nbsp;</td>";
$company+=$ro->getTotal("company","Room And Board",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","Room And Board",$registrationNo);
}else {
echo "<tD>&nbsp;</tD>";
}



/*******************************************
  ////////////// PHIC ROOM
if( $ro->getTotal("phic","Room And Board",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","Room And Board",$registrationNo),0); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","Room And Board",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","Room And Board",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}
******************************************/


/*
if( $ro->getTotal("cashUnpaid","Room And Board",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","Room And Board",$registrationNo),2); echo"&nbsp;</td>";
$cashz += $ro->getTotal("cashUnpaid","Room And Board",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","Room And Board",$registrationNo);


}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";
*/
echo "<tr>";
echo "<td colspan='5' height='10'></tD>";
echo "</tr>";

echo "<tr>";
echo "<td><div align='left' class='Arial12BlackBold'>&nbsp;HOSPITAL BILL&nbsp;</div></td>";
echo "<td><div align='right' class='Arial12BlackBold'>&nbsp;".number_format($hospitalBill_gt,2)."&nbsp;</div></tD>";
echo "<td><div align='right' class='Arial12BlackBold'>&nbsp;".number_format($hospitalBill_phic,2)."&nbsp;</div></tD>";
echo "<tD><div align='right' class='Arial12BlackBold'>&nbsp;".number_format($hospitalBill_company,2)."&nbsp;</div></tD>";
echo "<td><div align='right' class='Arial12BlackBold'>&nbsp;".number_format($hospitalBill_cash,2)."&nbsp;</div></tD>";
echo "</tr>";

$ro->getPatientDoc_setter($registrationNo);



if( $ro->getTotal("total","PROFESSIONAL FEE",$registrationNo) > 0 ) {
//echo "<td>&nbsp;"; echo number_format($ro->getTotal("total","PROFESSIONAL FEE",$registrationNo),0); echo"&nbsp;</td>";

$pf_gt+=$ro->getPatient_total();
}else {

}





   ///////// COMPANY PROFESSIONAL FEE
if( $ro->getTotal("company","PROFESSIONAL FEE",$registrationNo) > 0 ) {
//echo "<td>&nbsp;"; echo number_format($ro->getTotal("company","PROFESSIONAL FEE",$registrationNo),0); echo"&nbsp;</td>";
$pf_company+=$ro->getPatient_company();
}else {

}



    /////////////// PHIC PROFESSIONAL FEE
if( $ro->getTotal("phic","PROFESSIONAL FEE",$registrationNo) > 0 ) {
//echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","PROFESSIONAL FEE",$registrationNo),0); echo"&nbsp;</td>";
$pf_phic+=$ro->getPatient_phic();
}else {

}



if( $ro->getTotal("cashUnpaid","PROFESSIONAL FEE",$registrationNo) > 0 ) {
//echo "<td>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","PROFESSIONAL FEE",$registrationNo),0); echo"&nbsp;</td>";
$pf_cash += $ro->getPatient_cashUnpaid();
}else {

}






//$ro->getPatientDoc($registrationNo);
//$gross = (  $cashz - $ro->getPaymentHistory_showUp_returnPaid() );
//$disc = $ro->getRegistrationDetails_discount() * $gross;
echo "<tr>";
echo "<td colspan='5' height='10'></tD>";
echo "</tr>";

echo "<tr>";
echo "<td colspan='5'><div align='left' class='Arial12BlackBold'>&nbsp;PROFESSIONAL FEE</div></tD>";
echo "</tr>";



$ro->getPatientDoc($registrationNo);



echo "<tr>";
echo "<td><b></b></tD>";
echo "<td><div align='right' class='Arial12BlackBold'>".number_format($pf_gt,2)."&nbsp;</div></tD>";
echo "<td><div align='right' class='Arial12BlackBold'>".number_format($pf_phic,2)."&nbsp;</div></tD>";
echo "<td><div align='right' class='Arial12BlackBold'>".number_format($pf_company,2)."&nbsp;</div></tD>";
//echo "<td>&nbsp;<b>".$pf_phic."</b></tD>";
echo "<td><div align='right' class='Arial12BlackBold'>".number_format($pf_cash,2)."&nbsp;</div></tD>";
echo "</tr>";

echo "<tr>";
echo "<td colspan='5' height='10'></tD>";
echo "</tr>";


if( $ro->selectNow("registrationDetails","package","registrationNo",$registrationNo) != "" ) {
$package = $ro->selectNow("registrationDetails","package","registrationNo",$registrationNo); 
$splitPackage = preg_split ("/\_/", $package); 
}else {
$package = "0_0_0"; 
$splitPackage = preg_split ("/\_/", $package); 
}
echo "<Tr>";
echo "<td><div align='left' class='Arial12BlackBold'>&nbsp;TOTAL</div></tD>";
echo "<td><div align='right' class='Arial12BlackBold'>&nbsp;".number_format($hospitalBill_gt + $pf_gt,2)."&nbsp;</div></tD>";
echo "<td><div align='right' class='Arial12BlackBold'>&nbsp;".number_format($hospitalBill_phic + $pf_phic,2)."&nbsp;</div></tD>";

echo "<td><div align='right' class='Arial12BlackBold'>&nbsp;".number_format($hospitalBill_company + $pf_company ,2)."&nbsp;</div></tD>";
echo "<td><div align='right' class='Arial12BlackBold'>&nbsp;".number_format($hospitalBill_cash + $pf_cash ,2)."&nbsp;</div></tD>";
echo "</tr>";

$companyDiscount = $ro->selectNow("registrationDetails","companyDiscount","registrationNo",$registrationNo);
$x=$ro->getRegistrationDetails_discount();

if(( $companyDiscount == "" )&&( $ro->getRegistrationDetails_discount() == "" )){
}
else {
echo "<Tr>";
if($ro->selectNow("registrationDetails","discountType","registrationNo",$registrationNo) == "") {
echo "<td><div align='left' class='Arial12BlackBold'>&nbsp;DISCOUNT&nbsp;</div> </tD>";
}else {
echo "<td><div align='left' class='Arial12BlackBold'>&nbsp;".$ro->selectNow("registrationDetails","discountType","registrationNo",$registrationNo)."&nbsp;</div> </tD>";
}
echo "<td></tD>";
echo "<td></tD>";

if( $companyDiscount != "" ) {
echo "<td><div align='right' class='Arial12Black'>&nbsp;".number_format($companyDiscount,2)."&nbsp;</div></tD>";
}else {
echo "<td></tD>";
}

if( $ro->getRegistrationDetails_discount() != "" ) {
echo "<td><div align='right' class='Arial12Black'>&nbsp;".number_format(( $ro->getRegistrationDetails_discount()),2)."&nbsp;</span></tD>";
}else {
echo "<td><div align='right' class='Arial12Black'>&nbsp;0.00&nbsp;</div></tD>";
}
echo "</tr>";
}

/*
if($ro->selectNow("registrationDetails","interest","registrationNo",$registrationNo) > 0) {
echo "<tr>";
echo "<td><div align='left' class='Arial12BlackBold'>&nbsp;Interest</div></tD>";
echo "<td></td>";
echo "<td></td>";
echo "<td><div align='right' class='Arial12Black'>&nbsp;".$ro->selectNow("registrationDetails","interest","registrationNo",$registrationNo)."&nbsp;</div></tD>";
echo "<td></td>";
echo "</tr>";
}else { }
*/
$gross = (  $cashz - $ro->getPaymentHistory_showUp_returnPaid() );
$disc = $ro->getRegistrationDetails_discount() * $gross;

$grandTotalCompany = ($hospitalBill_company + $pf_company);
$grandTotalCompany1 = ($grandTotalCompany - $companyDiscount);
$grandTotalPHIC = ($hospitalBill_phic + $pf_phic);
echo "<tr>";
echo "<td colspan='5' height='10'></tD>";
echo "</tr>";

echo "<Tr>";
echo "<td><div align='left' class='Arial12BlackBold'>&nbsp;GRAND TOTAL&nbsp;</div></tD>";
echo "<td></tD>";

if( $grandTotalPHIC !='' ){
echo "<td><div align='right' class='Arial12BlackBold'>&nbsp;".number_format($grandTotalPHIC,2)."&nbsp;</div></tD>";
}else {
echo "<td></tD>";
}

if( $grandTotalCompany1 != "" ) {
echo "<td><div align='right' class='Arial12BlackBold'>&nbsp;".number_format($grandTotalCompany1,2)."&nbsp;</div></tD>";
}else {
echo "<td></tD>";
}

echo "<td><div align='right' class='Arial12BlackBold'>&nbsp;".number_format(($gross - $ro->getRegistrationDetails_discount()  ) + $pf_cash,2)."&nbsp;</div></tD>";
echo "</tr>";



$grandTotalz = ($gross - $ro->getRegistrationDetails_discount()  ) + $pf_cash;

//$ro->getPaymentHistory_showUp_returnPaid_setter($registrationNo);
//$netTotal = (  ( ($gross - $ro->getRegistrationDetails_discount()   ) - $ro->getPaymentHistory_showUp_returnPaid() ) -  $ro->sumPartial($registrationNo) );
//if( $netTotal < 0 ) $netTotal=0; 

//echo "<Tr>";
//echo "<td>&nbsp;<b>Payment's</b></tD>";
//echo "<td>&nbsp;</tD>";
//echo "<td>&nbsp;</tD>";
//echo "<td>&nbsp;</tD>";
//echo "<td>&nbsp;<b>".number_format( $ro->getPaymentHistory_showUp_returnPaid() ,2)."</b>&nbsp;</tD>";
//echo "</tr>";

//$paidz1 = (( $ro->sumPartial_new($registrationNo,"amountPaid") + $ro->sumPartial_new($registrationNo,"pf")) + $ro->sumPartial_new($registrationNo,"admitting") );
echo "<tr>";
echo "<td colspan='5' height='10'></tD>";
echo "</tr>";

$ro->descPartialPayment($registrationNo,$username); //ipakita ung payment ng px na cash
$ro->getCompanyPayment($registrationNo,$ro->getRegistrationDetails_company()); //ipakita ung payment ng px s company
$ro->getPHICPayment($registrationNo); //ipakita ung payment ng px sa phic


echo "<tr>";
echo "<td colspan='5' height='10'></tD>";
echo "</tr>";

$refund = $ro->doubleSelectNow("patientPayment","amountPaid","registrationNo",$registrationNo,"paymentFor","REFUND");
echo "<tr>";
echo "<Td><div align='left' class='Arial12BlackBold'>&nbsp;REFUND&nbsp;</span></td>";
echo "<TD></tD>";
echo "<td></td>";
echo "<td></td>";
echo "<TD><div align='right' class='Arial12BlackBold'>".number_format($refund,2)."&nbsp;</div></tD>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='5' height='10'></tD>";
echo "</tr>";
$totalCompanyPayment = ( ($ro->getCompanyPayment_total + $ro->getCompanyPayment_discount) + $ro->getCompanyPayment_tax() );

echo "<Tr>";
echo "<td><div align='left' class='Arial12BlackBold'>&nbsp;BALANCE&nbsp;</div></tD>";
echo "<td></tD>";
$asd=$ro->getPHICPayment_total();
$finaltotalphic=$grandTotalPHIC-$asd;

$x=number_format($finaltotalphic,2);
if($x=="-0.00"){
echo "<td><div align='right' class='Arial12BlackBold'>&nbsp;0.00&nbsp;</div></tD>";
}
else{
//if($finaltotalphic<0.00001){
echo "<td><div align='right' class='Arial12BlackBold'>&nbsp;".number_format($finaltotalphic,2)."&nbsp;</div></tD>";
//}
//else{
//echo "<td>&nbsp;<span class='txtSize'><b>".number_format($finaltotalphic,2)."</b></span></tD>";
}

$y=number_format($grandTotalCompany1 - $totalCompanyPayment,2);

if($y=="-0.00"){
echo "<td><div align='right' class='Arial12BlackBold'>&nbsp;0.00&nbsp;</div></tD>";
}
else{
if( ( $grandTotalCompany1 - $totalCompanyPayment ) > 0 ) {
echo "<td><div align='right' class='Arial12BlackBold'>&nbsp;".number_format($grandTotalCompany1 - $totalCompanyPayment,2)."&nbsp;</div></tD>";
}else {
echo "<td><div align='right' class='Arial12BlackBold'>&nbsp;".number_format($grandTotalCompany1 - $totalCompanyPayment,2)."&nbsp;</div></tD>";
//echo "<td>&nbsp;<span class='txtSize'><b>0.00</b></span></tD>";
}
}

$paidz = ( $ro->sumPartial_new($registrationNo,"amountPaid"));

//$remainBalance = ( $grandTotalz - $ro->sumPartial_new($registrationNo) );
$remainBalance = ( $grandTotalz - $ro->descPartialPayment_total() );

if( $remainBalance > 0 ) {
echo "<td><div align='right' class='Arial12BlackBold'>&nbsp;".number_format( $remainBalance,2)."&nbsp;</div></tD>";
}else {
echo "<td><div align='right' class='Arial12BlackBold'>&nbsp;".number_format( $remainBalance + $refund ,2)."&nbsp;</div></tD>";
}

echo "</tr>";


echo "</table>";
//echo "<font size=2>Payment's</font>";
//$ro->getPaymentHistory_showUp($registrationNo);

$logusername=$ro->selectNow("registeredUser","completeName","username",$username);

echo "
<Table border='0' cellspacing='0' cellpadding='0' width='100%'>
</tr>
<td height='10'></td>
</tr>
<tr>
<td width='60%'><div align='left' class='Arial12BlackBold'>______________________________<br>Signature over Printed Name<br>Informant & Relationship:___________________________</div></tD>
<tD width='40%'></tD>
</tr>
</table>
<Br>
<Table border='0' cellspacing='0' cellpadding='0' width='100%'>
<tr>
<tD><div align='left' class='Arial12BlackBold'><u>".strtoupper($logusername)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><Br><b>Billing Section</u></di></tD>
<tD><div align='right' class='Arial12BlackBold'><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u><Br>Cashier</div></tD>
</tr>
</table>
";
$ro->coconutBoxStop();
?>
</div>
