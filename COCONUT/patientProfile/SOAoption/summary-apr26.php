<?php
include("../../../myDatabase2.php");
include("../../../soaGenerator.php");
$registrationNo = $_GET['registrationNo'];
$username = $_GET['username'];


$ro = new database2();
$soa = new soaGenerator();
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
<div id='printData'>
<center>
<style type="text/css">
<!--
.txtSize {font-family: "Times New Roman";font-size: 13px;color: #000000;}
.Arial10Red {font-family: Arial;font-size: 10px;color: #FF0000;}
.Arial10Blue {font-family: Arial;font-size: 10px;color: #0066FF;}
.Arial11White {font-family: Arial;font-size: 11px;color: #FFFFFF;}
.Arial11Black {font-family: Arial;font-size: 11px;color: #000000;}
.Arial11BlackBold {font-family: Arial;font-size: 11px;font-weight: bold;color: #000000;}
.Arial11red {font-family: Arial;font-size: 11px;color: #FF0000;}
.Arial11RedBold {font-family: Arial;font-size: 11px;font-weight: bold;color: #FF0000;}
.Arial11BlackBoldNoDeco {font-family: Arial;font-size: 11px;font-weight: bold;color: #000000;}
.Arial12White {font-family: Arial;font-size: 12px;color: #FFFFFF;}
.Arial12Black {font-family: Arial;font-size: 12px;color: #000000;}
.Arial12BlackBold {font-family: Arial;font-size: 12px;font-weight: bold;color: #000000;}
.Arial12BlackBoldNoDeco {font-family: Arial;font-size: 12px;font-weight: bold;color: #000000;}
.Arial13Black {font-family: Arial;font-size: 13px;color: #000000;}
.Arial13BlackBold {font-family: Arial;font-size: 13px;font-weight: bold;color: #000000;}
.Arial14Black {font-family: Arial;font-size: 14px;color: #000000;}
.Arial14BlackBold {font-family: Arial;font-size: 14px;font-weight: bold;color: #000000;}
.Arial15Black {font-family: Arial;font-size: 15px;color: #000000;}
.Arial15BlackBold {font-family: Arial;font-size: 15px;font-weight: bold;color: #000000;}
.Arial16Black {font-family: Arial;font-size: 16px;color: #000000;}
.Arial16BlackBold {font-family: Arial;font-size: 16px;font-weight: bold;color: #000000;}
.Arial24BlackBold {font-family: Arial;font-size: 24px;font-weight: bold;color: #000000;}
-->
</style>
<?
echo "<b><a href='http://".$ro->getMyUrl()."/COCONUT/patientProfile/updateSOA.php?registrationNo=$registrationNo&username=$username' style='text-decoration:none;' class='Arial24BlackBold'><span >".$ro->getReportInformation("hmoSOA_name")."</a></b>";
echo "<br><span class='Arial16Black'>".$ro->getReportInformation("hmoSOA_address")."</span>";
echo "<br><br>";
echo "<table border='0'>";
echo "<tr>";
echo "<td><div align='left' class='Arial14Black'>Name:</div></td><td><div align='left'><span class='Arial14BlackBold'>&nbsp;".$ro->getPatientRecord_lastName().", ".$ro->getPatientRecord_firstName()."</span><span class='Arial14Black'>&nbsp;&nbsp;&nbsp;Age:</span><span class='Arial14BlackBold'>&nbsp;".$ro->getPatientRecord_age()."</span></div></td>";
echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><div align='left' class='Arial14Black'>".$ro->coconutText("Doctor")."</div></td><td><div align='left' class='Arial13BlackBold'>&nbsp;".$ro->getAttendingDoc($registrationNo,"Attending")."</div></td>";
echo "</tr>";

echo "<tr>";
echo "<Td><div align='left' class='Arial14Black'>Admitted:</div></td><td><div align='left' class='Arial13BlackBold'>&nbsp;".date("M d, Y",strtotime($ro->getRegistrationDetails_dateRegistered()))."</div></td>";
echo "<td>&nbsp;</td>";
//echo "<td>CaseType:</td><TD>".$ro->getRegistrationDetails_caseType()."</tD>";

if($ro->getRegistrationDetails_dateUnregistered()!=''){
echo "<Td><div align='left' class='Arial14Black'>Discharged:</div></td><td><div align='left' class='Arial13BlackBold'>&nbsp;".date("M d, Y",strtotime($ro->getRegistrationDetails_dateUnregistered()))."</div></td>";
}
else{
echo "<Td><div align='left' class='Arial14Black'>Discharged:</div></td><td><div align='left' class='Arial13BlackBold'>&nbsp;</div></td>";
}
echo "</tr>";


//echo "<tr>";
//echo "<Td>".$ro->coconutText("Company").":&nbsp;</td><td>&nbsp;".$ro->getRegistrationDetails_company()."</td>";
//echo "<td>&nbsp;</tD>";
//echo "<Td>".$ro->coconutText("Fx Diagnosis:").":&nbsp;</td><td>&nbsp;".$ro->getRegistrationDetails_finalDiagnosis()."</td>";
//echo "</tr>";
$room = preg_split ("/\-/", $ro->getRegistrationDetails_room()); 
$roomRate = $ro->selectNow("room","rate","Description",$ro->getRegistrationDetails_room());
echo "<tr>";
echo "<Td><div align='left' class='Arial14Black'>Room:</div></td>";
echo $ro->getPatientRoom($registrationNo);
echo "<td></td><td></td><td></td>";

//echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Age:&nbsp;".$ro->getPatientRecord_age()."</tD>";


//echo "<Td>".$ro->coconutText("Discharged").":&nbsp;</td><td>&nbsp;".$ro->getRegistrationDetails_dateUnregistered()."</td>";
echo "</tr>";

/*
echo "<tr>";
echo "<Td>".$ro->coconutText("Age")."</tD><td>&nbsp;".$ro->getPatientRecord_age()."</tD>";
echo "<tD>&nbsp;</tD>";
echo "<Td>".$ro->coconutText("Room:")."</tD><td>".$ro->getRegistrationDetails_room()."</tD>";
echo "</tr>";
*/
//echo "<tr>";
//echo "<td>".$ro->coconutText("Att.Doctor")."</tD><td>&nbsp;<font size=2>".$ro->getAttendingDoc($registrationNo,"Attending")."</font></td>";
//echo "<td></td>";
//echo "<td>".$ro->coconutText("Admitting Doc")."</td><tD>&nbsp;<font size=2>".$ro->getAttendingDoc($registrationNo,"Admitting")."</font></tD>";
//echo "</tr>";
echo "</table>";
//echo "<table border=0>";
//echo "<td>Address:&nbsp;</tD>";
//echo "<tD>".$ro->getPatientRecord_address()."</tD>";
//echo "</table>";

echo "<br>";
echo "<table border='1' cellpadding='0' cellspacing='0' bordercolor='#000000' rules='all' >";
echo "<tr>";
echo "<td><div align='center' class='Arial11BlackBold'>&nbsp;PARTICULAR&nbsp;</div></td>";
echo "<td><div align='center' class='Arial11BlackBold'>&nbsp;ACTUAL&nbsp;</div></td>";
echo "<td><div align='center' class='Arial11BlackBold'>&nbsp;PHILHEALTH&nbsp;</div></td>";
echo "<td><div align='center' class='Arial11BlackBold'>&nbsp;HMO/COMPANY&nbsp;</div></td>";
echo "<td><div align='center' class='Arial11BlackBold'>&nbsp;EXCESS&nbsp;</div></td>";
echo "</tr>";

////**** SETTER ******///

$soa->medicine($registrationNo);
$soa->supplies($registrationNo);
$soa->laboratory($registrationNo);
$soa->radiology($registrationNo);
$soa->ecg($registrationNo);
$soa->echo2d($registrationNo);
$soa->nursingCharges($registrationNo);
$soa->misc($registrationNo);
$soa->or_dr($registrationNo);
$soa->room($registrationNo);
$soa->rehab($registrationNo);
$soa->oxygen($registrationNo);
$soa->nbs($registrationNo);
$soa->cardiac($registrationNo);
$soa->bloodBank($registrationNo);
$soa->ventilator($registrationNo);
$soa->PF($registrationNo);
//////////////////////////

echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;ROOM&nbsp;</div></td>";
if( $soa->room_actual() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->room_actual() ,2); echo"&nbsp;</div></td>";
$gt+= $soa->room_actual() ;
$hospitalBill_gt += $soa->room_actual();
}else {
echo "<Td>&nbsp;</td>";
}



  ////////////// PHIC ROOM
if( $soa->room_phic() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->room_phic() ,2); echo"&nbsp;</div></td>";
$phicz+= $soa->room_phic() ;
$hospitalBill_phic += $soa->room_phic();
}else {
echo "<Td>&nbsp;</td>";
}


 ////////COMPANY ROOM
if( $soa->room_company() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->room_company() ,2); echo"&nbsp;</div></td>";
$company+= $soa->room_company();
$hospitalBill_company += $soa->room_company();
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



if( $soa->room_excess() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->room_excess() ,2); echo"&nbsp;</div></td>";
$cashz += $soa->room_excess();
$hospitalBill_cash += $soa->room_excess();


}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";



echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;MEDICINE&nbsp;</div></td>";

if( $soa->medicine_actual() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->medicine_actual(),2); echo"&nbsp;</div></td>";
$gt+=$soa->medicine_actual();
$hospitalBill_gt += $soa->medicine_actual();
}else {
echo "<td>&nbsp;</tD>";
}


   /////// PHIC MEDICINE
if( $soa->medicine_phic() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->medicine_phic() ,2); echo"&nbsp;</div></td>";
$phicz+= $soa->medicine_phic();
$hospitalBill_phic += $soa->medicine_phic();
}else {
echo "<Td>&nbsp;</td>";
}


    ////// COMPANY MEDICINE
if( $soa->medicine_company() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->medicine_company() ,2); echo"&nbsp;</div></td>";
$company+=$soa->medicine_company();
$hospitalBill_company += $soa->medicine_company();
}else {
echo "<Td>&nbsp;</tD>";
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



if( $soa->medicine_excess() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format(abs( $soa->medicine_excess()),2); echo"&nbsp;</div></td>";
$cashz+= $soa->medicine_excess();
$hospitalBill_cash += $soa->medicine_excess();
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";






echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;MEDICAL SUPPLIES&nbsp;</div></td>";
if( $soa->supplies_actual() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->supplies_actual() ,2); echo"&nbsp;</div></td>";
$gt+= $soa->supplies_actual() ;
$hospitalBill_gt += $soa->supplies_actual() ;
}else {
echo "<td>&nbsp;</td>";
}


      ////// PHIC SUPPLIES
if( $soa->supplies_phic() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->supplies_phic() ,2); echo"&nbsp;</div></td>";
$phicz+=$soa->supplies_phic(); //stiop
$hospitalBill_phic += $soa->supplies_phic();
}else {
echo "<tD>&nbsp;</td>";
}


    ////// COMPANY SUPPLIES
if( $soa->supplies_company() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->supplies_company() ,2); echo"&nbsp;</div></td>";
$company+=$soa->supplies_company();
$hospitalBill_company += $soa->supplies_company();
}else {
echo "<tD>&nbsp;</td>";
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


if( $soa->supplies_excess() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->supplies_excess() ,2); echo"&nbsp;</div></td>";
$cashz+=$soa->supplies_excess();
$hospitalBill_cash += $soa->supplies_excess();
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";

echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;LABORATORY&nbsp;</div></td>";
if( $soa->laboratory_actual() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->laboratory_actual() ,2); echo"&nbsp;</div></td>";
$gt+= $soa->laboratory_actual() ;
$hospitalBill_gt += $soa->laboratory_actual();
}else {
echo "<tD>&nbsp;</tD>";
}



        /////// PHIC LABORATORY
if( $soa->laboratory_phic() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->laboratory_phic() ,2); echo"&nbsp;</div></td>";
$phicz+= $soa->laboratory_phic() ;
$hospitalBill_phic += $soa->laboratory_phic();
}else {
echo "<Td>&nbsp;</td>";
}



          ///// COMPANY LABORATORY
if( $soa->laboratory_company() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($soa->laboratory_company(),2); echo"&nbsp;</div></td>";
$company+=$soa->laboratory_company();
$hospitalBill_company += $soa->laboratory_company();
}else {
echo "<Td>&nbsp;</tD>";
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



if( $soa->laboratory_excess() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->laboratory_excess() ,2); echo"&nbsp;</div></td>";
$cashz+=$soa->laboratory_excess();
$hospitalBill_cash += $soa->laboratory_excess();
}else {
echo "<td>&nbsp;</td>";
}
echo "</tr>";


echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;RADIOLOGY&nbsp;</div></td>";
if( $soa->radiology_actual() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->radiology_actual() ,2); echo"&nbsp;</div></td>";
$gt+=$soa->radiology_actual();
$hospitalBill_gt += $soa->radiology_actual();
}else {
echo "<td>&nbsp;</tD>";
}



   ///////////////// PHIC RADIOLOGY
if( $soa->radiology_phic() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($soa->radiology_phic(),2); echo"&nbsp;</div></td>";
$phicz+=$soa->radiology_phic();
$hospitalBill_phic += $soa->radiology_phic();
}else {
echo "<td>&nbsp;</td>";
}



  //////// COMPANY RADIOLOGY
if( $soa->radiology_company() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($soa->radiology_company(),2); echo"&nbsp;</div></td>";
$company+=$soa->radiology_company();
$hospitalBill_company += $soa->radiology_company();
}else {
echo "<td>&nbsp;</tD>";
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


if( $soa->radiology_excess() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->radiology_excess() ,2); echo"&nbsp;</div></td>";
$cashz +=$soa->radiology_excess();
$hospitalBill_cash += $soa->radiology_excess();
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";



/************ECG************************/
if( $soa->ecg_actual() > 0 ) {
echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;ECG&nbsp;</div></td>";
if( $soa->ecg_actual() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->ecg_actual() ,2); echo"&nbsp;</div></td>";
$gt+=$soa->ecg_actual();
$hospitalBill_gt += $soa->ecg_actual();
}else {
echo "<td>&nbsp;</tD>";
}



   ///////////////// PHIC ECG
if( $soa->ecg_phic() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($soa->ecg_phic(),2); echo"&nbsp;</div></td>";
$phicz+=$soa->ecg_phic();
$hospitalBill_phic += $soa->ecg_phic();
}else {
echo "<td>&nbsp;</td>";
}



  //////// COMPANY ECG
if( $soa->ecg_company() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->ecg_company() ,2); echo"&nbsp;</div></td>";
$company+= $soa->ecg_company() ;
$hospitalBill_company +=$soa->ecg_company() ;
}else {
echo "<td>&nbsp;</tD>";
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
if( $soa->ecg_excess() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->ecg_excess() ,2); echo"&nbsp;</div></td>";
$cashz += $soa->ecg_excess();
$hospitalBill_cash += $soa->ecg_excess();
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";


}else { }

/**************************************/








/************2D ECHO************************/
if( $soa->echo2d_actual() > 0 ) {
echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;2D ECHO&nbsp;</div></td>";
if( $soa->echo2d_actual() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->echo2d_actual() ,2); echo"&nbsp;</div></td>";
$gt+= $soa->echo2d_actual() ;
$hospitalBill_gt += $soa->echo2d_actual() ;
}else {
echo "<td>&nbsp;</tD>";
}



   ///////////////// PHIC 2D ECHO
if( $soa->echo2d_phic() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->echo2d_phic() ,2); echo"&nbsp;</div></td>";
$phicz+= $soa->echo2d_phic() ;
$hospitalBill_phic += $soa->echo2d_phic();
}else {
echo "<td>&nbsp;</td>";
}



  //////// COMPANY 2D ECHO
if( $soa->echo2d_company() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->echo2d_company() ,2); echo"&nbsp;</div></td>";
$company+= $soa->echo2d_company() ;
$hospitalBill_company += $soa->echo2d_company() ;
}else {
echo "<td>&nbsp;</tD>";
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
if( $soa->echo2d_excess() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->echo2d_excess() ,2); echo"&nbsp;</div></td>";
$cashz += $soa->echo2d_excess() ;
$hospitalBill_cash += $soa->echo2d_excess() ;
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";


}else { }

/**************2D ECHO************************/










echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;NURSING CHARGES&nbsp;</div></td>";
if( $soa->nursingCharges_actual($registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->nursingCharges_actual() ,2); echo"&nbsp;</div></td>";
$gt+=$soa->nursingCharges_actual();
$hospitalBill_gt += $soa->nursingCharges_actual();
}else {
echo "<Td>&nbsp;</td>";
}



   /////////// PHIC NURSING-CHARGES
if( $soa->nursingCharges_phic($registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->nursingCharges_phic($registrationNo) ,2); echo"&nbsp;</div></td>";
$phicz+= $soa->nursingCharges_phic($registrationNo) ;
$hospitalBill_phic += $soa->nursingCharges_phic($registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}



    ////////// COMPANY NURSING-CHARGES
if( $soa->nursingCharges_company() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($soa->nursingCharges_company(),2); echo"&nbsp;</div></td>";
$company+=$soa->nursingCharges_company();
$hospitalBill_company += $soa->nursingCharges_company();
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


if( $soa->nursingCharges_excess() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($soa->nursingCharges_excess(),2); echo"&nbsp;</div></td>";
$cashz += $soa->nursingCharges_excess();
$hospitalBill_cash += $soa->nursingCharges_excess();
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";



echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;MISCELLANEOUS&nbsp;</div></td>";
if( $soa->misc_actual() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->misc_actual() ,2); echo"&nbsp;</div></td>";
$gt+=$soa->misc_actual();
$hospitalBill_gt += $soa->misc_actual();
}else {
echo "<Td>&nbsp;</td>";
}



    ///////// PHIC MISCELLANEOUS
if( $soa->misc_phic() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->misc_phic() ,2); echo"&nbsp;</div></td>";
$phicz+=$soa->misc_phic();
$hospitalBill_phic += $soa->misc_phic();
}else {
echo "<Td>&nbsp;</td>";
}


      ////// COMPANY MISCELLANEOUS
if( $soa->misc_company() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->misc_company() ,2); echo"&nbsp;</div></td>";
$company+=$soa->misc_company();
$hospitalBill_company += $soa->misc_company();
}else {
echo "<tD>&nbsp;</tD>";
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



if( $soa->misc_excess() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->misc_excess() ,2); echo"&nbsp;</div></td>";
$cashz += $soa->misc_excess();
$hospitalBill_cash +=  $soa->misc_excess();
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";









/*

echo "<tr>";
echo "<td>&nbsp;Others&nbsp;</td>";
if( $ro->getTotal("total","OTHERS",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("total","OTHERS",$registrationNo),2); echo"&nbsp;</td>";
$gt+=$ro->getTotal("total","OTHERS",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","OTHERS",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}


   /////////// PHIC OTHERS
if( $ro->getTotal("phic","OTHERS",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","OTHERS",$registrationNo),2); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","OTHERS",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","OTHERS",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}


   ////// COMPANY OTHERS
if( $ro->getTotal("company","OTHERS",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("company","OTHERS",$registrationNo),2); echo"&nbsp;</td>";
$company+=$ro->getTotal("company","OTHERS",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","OTHERS",$registrationNo);
}else {
echo "<tD>&nbsp;</tD>";
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


/*
if( $ro->getTotal("cashUnpaid","OTHERS",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","OTHERS",$registrationNo),2); echo"&nbsp;</td>";
$cashz += $ro->getTotal("cashUnpaid","OTHERS",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","OTHERS",$registrationNo);
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";

*/


///////////////OR/DR/ER FEE

if( $soa->or_actual() > 0 ) {

echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;OR/DR/ER FEE&nbsp;</div></td>";
if( $soa->or_actual() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->or_actual() ,2); echo"&nbsp;</div></td>";
$gt+= $soa->or_actual() ;
$hospitalBill_gt += $soa->or_actual();
}else {
echo "<Td>&nbsp;</td>";
}


  //////// PHIC OR/DR/ER
if( $soa->or_phic() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->or_phic() ,2); echo"&nbsp;</div></td>";
$phicz+= $soa->or_phic();
$hospitalBill_phic += $soa->or_phic();
}else {
echo "<Td>&nbsp;</td>";
}


   ////// COMPANY OR/DR/ER 
if( $soa->or_company() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($soa->or_company(),2); echo"&nbsp;</div></td>";
$company+=$soa->or_company();
$hospitalBill_company += $soa->or_company();
}else {
echo "<tD>&nbsp;</tD>";
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


if( $soa->or_excess() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->or_excess() ,2); echo"&nbsp;</div></td>";
$cashz += $soa->or_excess();
$hospitalBill_cash += $soa->or_excess();
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";

}else { }

///////////OR/DR/ER FEEE







if( $ro->selectNow("reportHeading","information","reportName","rehab") == "Activate" ) {


/////REHAB START

if( $soa->rehab_actual() > 0 ) {

echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;REHAB&nbsp;</div></td>";
if( $soa->rehab_actual() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->rehab_actual() ,2); echo"&nbsp;</div></td>";
$gt+=$soa->rehab_actual();
$hospitalBill_gt += $soa->rehab_actual();
}else {
echo "<Td>&nbsp;</td>";
}



   ///////////////// PHIC REHAB
if( $soa->rehab_phic() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->rehab_phic() ,2); echo"&nbsp;</div></td>";
$phicz+= $soa->rehab_phic() ;
$hospitalBill_phic += $soa->rehab_phic() ;
}else {
echo "<Td>&nbsp;</td>";
}


    ///////////// COMPANY REHAB
if( $soa->rehab_company() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->rehab_company() ,2); echo"&nbsp;</div></td>";

$company+= $soa->rehab_company() ;
$hospitalBill_company += $soa->rehab_company() ;
}else {
echo "<tD>&nbsp;</tD>";
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


if( $soa->rehab_excess() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->rehab_excess() ,2); echo"&nbsp;</div></td>";
$cashz += $soa->rehab_excess() ;
$hospitalBill_cash += $soa->rehab_excess() ;
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";



/////REHAB END

}else { }

}else {

}





if( $soa->oxygen_actual() > 0  ) {

echo "<tr>";
echo "<td><div align='right' class='Arial13Black'>&nbsp;OXYGEN&nbsp;</div></td>";
if( $soa->oxygen_actual() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->oxygen_actual() ,2); echo"&nbsp;</div></td>";
$gt+= $soa->oxygen_actual() ;
$hospitalBill_gt += $soa->oxygen_actual();
}else {
echo "<Td>&nbsp;</td>";
}



   ///////////////// PHIC OXYGEN
if( $soa->oxygen_phic() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->oxygen_phic() ,2); echo"&nbsp;</div></td>";
$phicz+= $soa->oxygen_phic() ;
$hospitalBill_phic += $soa->oxygen_phic();
}else {
echo "<Td>&nbsp;</td>";
}


    ///////////// COMPANY OXYGEN
if( $soa->oxygen_company() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->oxygen_company() ,2); echo"&nbsp;</div></td>";

$company+= $soa->oxygen_company() ;
$hospitalBill_company += $soa->oxygen_company();
}else {
echo "<tD>&nbsp;</tD>";
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


if( $soa->oxygen_excess() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->oxygen_excess() ,2); echo"&nbsp;</div></td>";
$cashz += $soa->oxygen_excess();
$hospitalBill_cash += $soa->oxygen_excess();
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";

}else { }






///////OXYGEN OR USED/////////

if( $ro->checkIfTitleExist($registrationNo,"O2") > 0  ) {
echo "<tr>";
echo "<td><div align='right' class='Arial13Black'>&nbsp;OXYGEN OR USED&nbsp;</div></td>";
if( $ro->getTotal("total","O2",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("total","O2",$registrationNo),2); echo"&nbsp;</div></td>";
$gt+=$ro->getTotal("total","O2",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","O2",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}



   ///////////////// OXYGEN OR USED
if( $ro->getTotal("phic","O2",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("phic","O2",$registrationNo),2); echo"&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","O2",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","O2",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}


    ///////////// COMPANY OXYGEN OR USED
if( $ro->getTotal("company","O2",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("company","O2",$registrationNo),2); echo"&nbsp;</div></td>";

$company+=$ro->getTotal("company","O2",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","O2",$registrationNo);
}else {
echo "<tD>&nbsp;</tD>";
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


if( $ro->getTotal("cashUnpaid","O2",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","O2",$registrationNo),2); echo"&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","O2",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","O2",$registrationNo);
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";

}else {  }










///////////////////////////////C-Arm



///////C-Arm/////////

if( $ro->checkIfTitleExist($registrationNo,"C-Arm") > 0  ) {
echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;C-ARM&nbsp;</div></td>";
if( $ro->getTotal("total","C-Arm",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("total","C-Arm",$registrationNo),2); echo"&nbsp;</div></td>";
$gt+=$ro->getTotal("total","C-Arm",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","C-Arm",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}



   ///////////////// C-Arm
if( $ro->getTotal("phic","C-Arm",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("phic","C-Arm",$registrationNo),2); echo"&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","C-Arm",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","C-Arm",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}


    ///////////// C-Arm
if( $ro->getTotal("company","C-Arm",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("company","C-Arm",$registrationNo),2); echo"&nbsp;</div></td>";

$company+=$ro->getTotal("company","C-Arm",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","C-Arm",$registrationNo);
}else {
echo "<tD>&nbsp;</tD>";
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


if( $ro->getTotal("cashUnpaid","C-Arm",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","C-Arm",$registrationNo),2); echo"&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","C-Arm",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","C-Arm",$registrationNo);
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";

}else {  }




/////////////////////////////////C-Arm








//////start


//////////////AMBULANCE FEE

if( $ro->checkIfTitleExist($registrationNo,"AMBULANCE") > 0  ) {
echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;AMBULANCE FEE&nbsp;</div></td>";
if( $ro->getTotal("total","AMBULANCE",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("total","AMBULANCE",$registrationNo),2); echo"&nbsp;</div></td>";
$gt+=$ro->getTotal("total","AMBULANCE",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","AMBULANCE",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}



   ///////////////// AMBULANCE
if( $ro->getTotal("phic","AMBULANCE",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("phic","AMBULANCE",$registrationNo),2); echo"&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","AMBULANCE",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","AMBULANCE",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}


    ///////////// COMPANY AMBULANCE
if( $ro->getTotal("company","AMBULANCE",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("company","AMBULANCE",$registrationNo),2); echo"&nbsp;</div></td>";

$company+=$ro->getTotal("company","AMBULANCE",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","AMBULANCE",$registrationNo);
}else {
echo "<tD>&nbsp;</tD>";
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


if( $ro->getTotal("cashUnpaid","AMBULANCE",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","AMBULANCE",$registrationNo),2); echo"&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","AMBULANCE",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","AMBULANCE",$registrationNo);
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";

}else {  }

/////////////VENTILATOR















////////////////////////////////////



//////start


//////////////DIALYSISCHARGE

if( $ro->checkIfTitleExist($registrationNo,"DIALYSISCHARGE") > 0  ) {
echo "<tr>";
echo "<td><div align='left' class='Arial14BlackBlackBold'>&nbsp;DIALYSIS&nbsp;</div></td>";
if( $ro->getTotal("total","DIALYSISCHARGE",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("total","DIALYSISCHARGE",$registrationNo),2); echo"&nbsp;</div></td>";
$gt+=$ro->getTotal("total","DIALYSISCHARGE",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","DIALYSISCHARGE",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}



   ///////////////// DIALYSISCHARGE
if( $ro->getTotal("phic","DIALYSISCHARGE",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("phic","DIALYSISCHARGE",$registrationNo),2); echo"&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","DIALYSISCHARGE",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","DIALYSISCHARGE",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}


    ///////////// COMPANY DIALYSISCHARGE
if( $ro->getTotal("company","DIALYSISCHARGE",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("company","DIALYSISCHARGE",$registrationNo),2); echo"&nbsp;</div></td>";

$company+=$ro->getTotal("company","DIALYSISCHARGE",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","DIALYSISCHARGE",$registrationNo);
}else {
echo "<tD>&nbsp;</tD>";
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


if( $ro->getTotal("cashUnpaid","DIALYSISCHARGE",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","DIALYSISCHARGE",$registrationNo),2); echo"&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","DIALYSISCHARGE",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","DIALYSISCHARGE",$registrationNo);
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";

}else {  }

/////////////DIALYSISCHARGE






////////////////////////////////////



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



   ///////////////// PHIC GENERATOR
if( $ro->getTotal("phic","GENERATOR_CHARGE",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","GENERATOR_CHARGE",$registrationNo),2); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","GENERATOR_CHARGE",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","GENERATOR_CHARGE",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}


    ///////////// COMPANY GENERATOR
if( $ro->getTotal("company","GENERATOR_CHARGE",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("company","GENERATOR_CHARGE",$registrationNo),2); echo"&nbsp;</td>";

$company+=$ro->getTotal("company","GENERATOR_CHARGE",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","GENERATOR_CHARGE",$registrationNo);
}else {
echo "<tD>&nbsp;</tD>";
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

/*
if( $ro->getTotal("cashUnpaid","GENERATOR_CHARGE",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","GENERATOR_CHARGE",$registrationNo),2); echo"&nbsp;</td>";
$cashz += $ro->getTotal("cashUnpaid","GENERATOR_CHARGE",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","GENERATOR_CHARGE",$registrationNo);
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";

//}else { }


//////// GENERATOR CHARGE //////






/*
if( $ro->selectNow("reportHeading","information","reportName","dialysis") == "Activate" ) {

echo "<tr>";
echo "<td>&nbsp;DIALYSIS&nbsp;</td>";
if( $ro->getTotal("total","DIALYSIS",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("total","DIALYSIS",$registrationNo),2); echo"&nbsp;</td>";
$gt+=$ro->getTotal("total","DIALYSIS",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","DIALYSIS",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}



   ///////////////// PHIC DIALYSIS
if( $ro->getTotal("phic","DIALYSIS",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","DIALYSIS",$registrationNo),2); echo"&nbsp;</td>";
$phicz+=$ro->getTotal("phic","DIALYSIS",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","DIALYSIS",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}


    ///////////// COMPANY DIALYSIS
if( $ro->getTotal("company","DIALYSIS",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("company","DIALYSIS",$registrationNo),2); echo"&nbsp;</td>";

$company+=$ro->getTotal("company","DIALYSIS",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","DIALYSIS",$registrationNo);
}else {
echo "<tD>&nbsp;</tD>";
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

/*
if( $ro->getTotal("cashUnpaid","DIALYSIS",$registrationNo) > 0 ) {
echo "<td>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","DIALYSIS",$registrationNo),2); echo"&nbsp;</td>";
$cashz += $ro->getTotal("cashUnpaid","DIALYSIS",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","DIALYSIS",$registrationNo);
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";

}else {

}
*/


if( $ro->selectNow("reportHeading","information","reportName","nbs") == "Activate" ) {



////////////NBS START

if( $soa->nbs_actual() > 0 ) {

echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;NBS/HEPA B/BCG&nbsp;</div></td>";
if( $soa->nbs_actual() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->nbs_actual() ,2); echo"&nbsp;</div></td>";
$gt+=$soa->nbs_actual();
$hospitalBill_gt += $soa->nbs_actual();
}else {
echo "<Td>&nbsp;</td>";
}



   ///////////////// PHIC NBS
if( $soa->nbs_phic() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->nbs_phic() ,2); echo"&nbsp;</div></td>";
$phicz+=$soa->nbs_phic();
$hospitalBill_phic += $soa->nbs_phic();
}else {
echo "<Td>&nbsp;</td>";
}


    ///////////// COMPANY NBS
if( $soa->nbs_company() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->nbs_company() ,2); echo"&nbsp;</div></td>";

$company+= $soa->nbs_company() ;
$hospitalBill_company += $soa->nbs_company();
}else {
echo "<tD>&nbsp;</tD>";
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


if( $soa->nbs_excess() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->nbs_excess() ,2); echo"&nbsp;</div></td>";
$cashz += $soa->nbs_excess();
$hospitalBill_cash += $soa->nbs_excess() ;
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";

}else { }


/////////////NBS END





}else {

}




//////////////CARDIAC

if( $soa->cardiac_actual() > 0 ) {

echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;CARDIAC&nbsp;</div></td>";
if( $soa->cardiac_actual() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->cardiac_actual() ,2); echo"&nbsp;</div></td>";
$gt+= $soa->cardiac_actual() ;
$hospitalBill_gt += $soa->cardiac_actual();
}else {
echo "<Td>&nbsp;</td>";
}



   ///////////////// PHIC CARDIAC
if( $soa->cardiac_phic() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->cardiac_phic() ,2); echo"&nbsp;</div></td>";
$phicz+= $soa->cardiac_phic() ;
$hospitalBill_phic += $soa->cardiac_phic();
}else {
echo "<Td>&nbsp;</td>";
}


    ///////////// COMPANY CARDIAC
if( $soa->cardiac_company() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($soa->cardiac_company(),2); echo"&nbsp;</div></td>";

$company+=$soa->cardiac_company();
$hospitalBill_company += $soa->cardiac_company();
}else {
echo "<tD>&nbsp;</tD>";
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


if( $soa->cardiac_excess() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($soa->cardiac_excess(),2); echo"&nbsp;</div></td>";
$cashz += $soa->cardiac_excess();
$hospitalBill_cash += $soa->cardiac_excess();
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";

}else { }

/////////////CARDIAC














//////////////BLOODBANK

if( $soa->bloodBank_actual() > 0  ) {
echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;BLOOD BANK&nbsp;</div></td>";
if( $soa->bloodBank_actual() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->bloodBank_actual() ,2); echo"&nbsp;</div></td>";
$gt+=$soa->bloodBank_actual();
$hospitalBill_gt += $soa->bloodBank_actual() ;
}else {
echo "<Td>&nbsp;</td>";
}



   ///////////////// PHIC BLOODBANK
if( $soa->bloodBank_phic() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->bloodBank_phic() ,2); echo"&nbsp;</div></td>";
$phicz+= $soa->bloodBank_phic() ;
$hospitalBill_phic += $soa->bloodBank_phic();
}else {
echo "<Td>&nbsp;</td>";
}


    ///////////// COMPANY BLOODBANK
if( $soa->bloodBank_company() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->bloodBank_company() ,2); echo"&nbsp;</div></td>";

$company+=$soa->bloodBank_company();
$hospitalBill_company += $soa->bloodBank_company() ;
}else {
echo "<tD>&nbsp;</tD>";
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


if( $soa->bloodBank_excess() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->bloodBank_excess() ,2); echo"&nbsp;</div></td>";
$cashz +=  $soa->bloodBank_excess() ;
$hospitalBill_cash += $soa->bloodBank_excess();
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";

}else {  }

/////////////BLOOD BANK















//////////////VENTILATOR

if( $soa->ventilator_actual() > 0  ) {
echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;VENTILATOR&nbsp;</div></td>";
if( $soa->ventilator_actual() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->ventilator_actual() ,2); echo"&nbsp;</div></td>";
$gt+=$soa->ventilator_actual();
$hospitalBill_gt += $soa->ventilator_actual();
}else {
echo "<Td>&nbsp;</td>";
}



   ///////////////// PHIC VENTILATOR
if( $soa->ventilator_phic() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->ventilator_phic() ,2); echo"&nbsp;</div></td>";
$phicz+= $soa->ventilator_phic() ;
$hospitalBill_phic += $soa->ventilator_phic();
}else {
echo "<Td>&nbsp;</td>";
}


    ///////////// COMPANY VENTILATOR
if( $soa->ventilator_company() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->ventilator_company() ,2); echo"&nbsp;</div></td>";

$company+= $soa->ventilator_company() ;
$hospitalBill_company += $soa->ventilator_company() ;
}else {
echo "<tD>&nbsp;</tD>";
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


if( $soa->ventilator_excess() > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format( $soa->ventilator_excess() ,2); echo"&nbsp;</div></td>";
$cashz += $soa->ventilator_excess();
$hospitalBill_cash += $soa->ventilator_excess();
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";

}else {  }

/////////////VENTILATOR


//////start


//////////////INCUBATOR

if( $ro->checkIfTitleExist($registrationNo,"INCUBATOR") > 0  ) {
echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;INCUBATOR&nbsp;</div></td>";
if( $ro->getTotal("total","INCUBATOR",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("total","INCUBATOR",$registrationNo),2); echo"&nbsp;</div></td>";
$gt+=$ro->getTotal("total","INCUBATOR",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","INCUBATOR",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}



   ///////////////// INCUBATOR
if( $ro->getTotal("phic","INCUBATOR",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("phic","INCUBATOR",$registrationNo),2); echo"&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","INCUBATOR",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","INCUBATOR",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}


    ///////////// COMPANY INCUBATOR
if( $ro->getTotal("company","INCUBATOR",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("company","INCUBATOR",$registrationNo),2); echo"&nbsp;</div></td>";

$company+=$ro->getTotal("company","INCUBATOR",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","INCUBATOR",$registrationNo);
}else {
echo "<tD>&nbsp;</tD>";
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


if( $ro->getTotal("cashUnpaid","INCUBATOR",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","INCUBATOR",$registrationNo),2); echo"&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","INCUBATOR",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","INCUBATOR",$registrationNo);
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";

}else {  }

/////////////INCUBATOR







///////end











//////start


//////////////BCG

if( $ro->checkIfTitleExist($registrationNo,"BCG") > 0  ) {
echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;BCG&nbsp;</div></td>";
if( $ro->getTotal("total","BCG",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("total","BCG",$registrationNo),2); echo"&nbsp;</div></td>";
$gt+=$ro->getTotal("total","INCUBATOR",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","BCG",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}



   ///////////////// BCG
if( $ro->getTotal("phic","BCG",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("phic","BCG",$registrationNo),2); echo"&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","BCG",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","BCG",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}


    ///////////// COMPANY BCG
if( $ro->getTotal("company","BCG",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("company","BCG",$registrationNo),2); echo"&nbsp;</div></td>";

$company+=$ro->getTotal("company","BCG",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","BCG",$registrationNo);
}else {
echo "<tD>&nbsp;</tD>";
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


if( $ro->getTotal("cashUnpaid","BCG",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","BCG",$registrationNo),2); echo"&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","BCG",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","BCG",$registrationNo);
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";

}else {  }

/////////////VENTILATOR







///////end


















///////end




//////////////PULSE OXIMETER

if( $ro->checkIfTitleExist($registrationNo,"PULSE_OXIMETER") > 0  ) {
echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;PULSE OXIMETER&nbsp;</div></td>";
if( $ro->getTotal("total","PULSE_OXIMETER",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("total","PULSE_OXIMETER",$registrationNo),2); echo"&nbsp;</div></td>";
$gt+=$ro->getTotal("total","PULSE_OXIMETER",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","PULSE_OXIMETER",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}



   ///////////////// PHIC PULSE_OXIMETER
if( $ro->getTotal("phic","PULSE_OXIMETER",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("phic","PULSE_OXIMETER",$registrationNo),2); echo"&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","PULSE_OXIMETER",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","PULSE_OXIMETER",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}


    ///////////// COMPANY PULSE_OXIMETER
if( $ro->getTotal("company","PULSE_OXIMETER",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("company","PULSE_OXIMETER",$registrationNo),2); echo"&nbsp;</div></td>";

$company+=$ro->getTotal("company","PULSE_OXIMETER",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","PULSE_OXIMETER",$registrationNo);
}else {
echo "<tD>&nbsp;</tD>";
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
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","PULSE_OXIMETER",$registrationNo),2); echo"&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","PULSE_OXIMETER",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","PULSE_OXIMETER",$registrationNo);
}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";

}else {  }

/////////////VENTILATOR












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
echo "<td><div align='left' class='Arial15BlackBold'>&nbsp;HOSPITAL BILL&nbsp;</div></td>";
echo "<td><div align='right' class='Arial15BlackBold'>&nbsp;".number_format($hospitalBill_gt,2)."&nbsp;</td>";
echo "<td><div align='right' class='Arial15BlackBold'>&nbsp;".number_format($hospitalBill_phic,2)."&nbsp;</tdD>";
echo "<tD><div align='right' class='Arial15BlackBold'>&nbsp;".number_format($hospitalBill_company,2)."&nbsp;</td>";
//echo "<td>&nbsp;<font size=3><b>".number_format($hospitalBill_phic,2)."</b></font></tD>";
echo "<td><div align='right' class='Arial15BlackBold'>&nbsp;".number_format($hospitalBill_cash,2)."&nbsp;</td>";
echo "</tr>";


echo "<tr>";
echo "<td height='15' colspan='5'></td>";
echo "</tr>";

$ro->getPatientDoc_setter($registrationNo);

//echo "<tr>";
//echo "<td>&nbsp;&nbsp;<br></td>";
if( $soa->pf_actual() > 0 ) {
//echo "<td>&nbsp;"; echo number_format($ro->getTotal("total","PROFESSIONAL FEE",$registrationNo),0); echo"&nbsp;</td>";
//echo "<td>&nbsp;</tD>";
$pf_gt+=$ro->getPatient_total();
}else {
//echo "<td>&nbsp;</td>";
}





   ///////// COMPANY PROFESSIONAL FEE
if( $soa->pf_company() > 0 ) {
//echo "<td>&nbsp;"; echo number_format($ro->getTotal("company","PROFESSIONAL FEE",$registrationNo),0); echo"&nbsp;</td>";
$pf_company+=$ro->getPatient_company();
}else {
//echo "<tD>&nbsp;</tD>";
}



    /////////////// PHIC PROFESSIONAL FEE
if( $soa->pf_phic() > 0 ) {
//echo "<td>&nbsp;"; echo number_format($ro->getTotal("phic","PROFESSIONAL FEE",$registrationNo),0); echo"&nbsp;</td>";
$pf_phic+=$ro->getPatient_phic();
}else {
//echo "<Td>&nbsp;</td>";
}



if( $soa->pf_excess() > 0 ) {
//echo "<td>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","PROFESSIONAL FEE",$registrationNo),0); echo"&nbsp;</td>";
$pf_cash += $ro->getPatient_cashUnpaid();
}else {
//echo "<td>&nbsp;</tD>";
}
//echo "</tr>";



//$ro->getPatientDoc($registrationNo);
//$gross = (  $cashz - $ro->getPaymentHistory_showUp_returnPaid() );
//$disc = $ro->getRegistrationDetails_discount() * $gross;


echo "<tr>";
echo "<td colspan='5'><div align='left' class='Arial14BlackBold'>&nbsp;PROFESSIONAL FEE&nbsp;</div></tD>";
//echo "<td>&nbsp;<b>".$pf_phic."</b></tD>";

echo "<tr>";



$ro->getPatientDoc($registrationNo);



echo "<tr>";
//echo "<td><b></b></tD>";
echo "<td><div align='left' class='Arial15BlackBold'>&nbsp;SUB TOTAL&nbsp;</div></tD>";
echo "<td><div align='right' class='Arial15BlackBold'>&nbsp;".number_format($pf_gt,2)."&nbsp;</div></tD>";
echo "<td><div align='right' class='Arial15BlackBold'>&nbsp;".number_format($pf_phic,2)."&nbsp;</div></tD>";
echo "<td><div align='right' class='Arial15BlackBold'>&nbsp;".number_format($pf_company,2)."&nbsp;</div></tD>";
//echo "<td>&nbsp;<b>".$pf_phic."</b></tD>";
echo "<td><div align='right' class='Arial15BlackBold'>&nbsp;".number_format($pf_cash,2)."&nbsp;</div></tD>";
echo "<tr>";


echo "<tr>";
echo "<td height='15' colspan='5'>&nbsp;</td>";
echo "<tr>";



echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;OVERTIME&nbsp;</div></td>";
if( $ro->getTotal("total","OVERTIME",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("total","OVERTIME",$registrationNo),2); echo"&nbsp;</div></td>";
$gt+=$ro->getTotal("total","OVERTIME",$registrationNo);
$hospitalBill_gt += $ro->getTotal("total","OVERTIME",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}



  ////////////// PHIC ROOM
if( $ro->getTotal("phic","OVERTIME",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("phic","OVERTIME",$registrationNo),2); echo"&nbsp;</div></td>";
$phicz+=$ro->getTotal("phic","OVERTIME",$registrationNo);
$hospitalBill_phic += $ro->getTotal("phic","OVERTIME",$registrationNo);
}else {
echo "<Td>&nbsp;</td>";
}


 ////////COMPANY ROOM
if( $ro->getTotal("company","OVERTIME",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("company","OVERTIME",$registrationNo),2); echo"&nbsp;</div></td>";
$company+=$ro->getTotal("company","OVERTIME",$registrationNo);
$hospitalBill_company += $ro->getTotal("company","OVERTIME",$registrationNo);
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



if( $ro->getTotal("cashUnpaid","OVERTIME",$registrationNo) > 0 ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;"; echo number_format($ro->getTotal("cashUnpaid","OVERTIME",$registrationNo),2)."&nbsp;</div></td>";
$cashz += $ro->getTotal("cashUnpaid","OVERTIME",$registrationNo);
$hospitalBill_cash += $ro->getTotal("cashUnpaid","OVERTIME",$registrationNo);


}else {
echo "<td>&nbsp;</tD>";
}
echo "</tr>";


/*
echo "<tr>";
echo "<td>&nbsp;<b>Hospital Bill</b></tD>";
echo "<td>&nbsp;<font size=3>".number_format($hospitalBill_gt,2)."</font></tD>";
echo "<td>&nbsp;<font size=3>".$hospitalBill_company."</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<tr>";
*/




$ro->getPackageNow($registrationNo);
if($ro->checkIfPackageExist($registrationNo) > 0 ) {

echo "<tr>";
echo "<td><div align='left' class='Arial13BlackBold'>&nbsp;".$ro->getPackageNow_desc()."&nbsp;</div></td>";
echo "<td>&nbsp;</td>";
echo "<td><div align='right' class='Arial13Black'>&nbsp;".$ro->getPackageNow_company()."&nbsp;</div></td>";
echo "<td><div align='right' class='Arial13Black'>&nbsp;".$ro->getPackageNow_phic()."&nbsp;</div></td>";
echo "<td><div align='right' class='Arial13Black'>&nbsp;".$ro->getPackageNow_total()."&nbsp;</div></td>";
echo "</tr>";

}

echo "<tr>";
echo "<td colspan='5'>&nbsp;</tD>";
echo "<tr>";


if($ro->checkIfPackageExist($registrationNo) > 0) {
echo "<Tr>";
echo "<td><div align='left' class='Arial16BlackBold'>&nbsp;TOTAL&nbsp;</div></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td><div align='right' class='Arial16BlackBold'>&nbsp;".$ro->sumPackageNow($registrationNo)."&nbsp;</div></td>";
echo "</tr>";
}else {
echo "<Tr>";
echo "<td><div align='left' class='Arial16BlackBold'>&nbsp;TOTAL&nbsp;</div></td>";
echo "<td><div align='right' class='Arial16BlackBold'>&nbsp;".number_format($hospitalBill_gt + $pf_gt,2)."&nbsp;</div></td>";
echo "<td><div align='right' class='Arial16BlackBold'>&nbsp;".number_format($hospitalBill_phic + $pf_phic,2)."&nbsp;</div></tD>";

echo "<td><div align='right' class='Arial16BlackBold'>&nbsp;".number_format($hospitalBill_company + $pf_company ,2)."&nbsp;</div></tD>";
//echo "<td>&nbsp;<b>".number_format($hospitalBill_phic + $pf_phic,2)."</b>&nbsp;</tD>";
echo "<td><div align='right' class='Arial16BlackBold'>&nbsp;".number_format($hospitalBill_cash + $pf_cash ,2)."&nbsp;</div></tD>";
echo "</tr>";
}

/*
if($ro->getRegistrationDetails_discount() < .30 )  {
echo "<Tr>";
echo "<td>&nbsp;Discount <font size=2>(".substr($ro->getRegistrationDetails_discount(),2,2)."%)</font></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;".number_format(( $disc),2)."&nbsp;</tD>";
echo "</tr>";
}else {*/


echo "<tr>";
echo "<td colspan='5'>&nbsp;</tD>";
echo "<tr>";

$companyDiscount = $ro->selectNow("registrationDetails","companyDiscount","registrationNo",$registrationNo);
$x=$ro->getRegistrationDetails_discount();

if( $ro->getRegistrationDetails_discount() == "" ){
}
else {
echo "<tr>";
$discountType = $ro->selectNow("registrationDetails","discountType","registrationNo",$registrationNo);
if($discountType!=''){
echo "<td><div align='left' class='Arial12BlackBold'>&nbsp;".strtoupper($discountType)."&nbsp;</div></td>";
}else {
echo "<td><div align='left' class='Arial12BlackBold'>&nbsp;DISCOUNT&nbsp;</div></td>";
}
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";

if( $ro->getRegistrationDetails_discount() != "" ) {

echo "<td><div align='right' class='Arial13Black'>&nbsp;".number_format(( $ro->getRegistrationDetails_discount()),2)."&nbsp;</span></td>";
}else {
echo "<td><div align='right' class='Arial13Black'>&nbsp;0.00&nbsp;</div></td>";
}
echo "</tr>";
}



if( $companyDiscount == "" ){
}
else {
echo "<tr>";
echo "<td><div align='left' class='Arial12BlackBold'>&nbsp;HMO/COMPANY DISCOUNT&nbsp;</div></td>";
echo "<td></td>";
echo "<td></td>";

if( $companyDiscount != "" ) {
echo "<td><div align='right' class='Arial13Black'>&nbsp;".number_format($companyDiscount,2)."&nbsp;</div></td>";
}else {
echo "<td></tD>";
}

echo "<td></td>";
echo "</tr>";
}

//}


echo "<tr>";
echo "<td colspan='5'>&nbsp;</td>";
echo "<tr>";

$gross = (  $cashz - $ro->getPaymentHistory_showUp_returnPaid() );
$disc = $ro->getRegistrationDetails_discount() * $gross;

if($ro->checkIfPackageExist($registrationNo) > 0  ) {
echo "<tr>";
echo "<td colspan='4'><div align='left' class='Arial16BlackBold'>&nbsp;GRAND TOTALl&nbsp;</div></td>";
echo "<td><div align='right' class='Arial16BlackBold'>&nbsp;".number_format($ro->sumPackageNow($registrationNo),2)."&nbsp;</div></td>";
echo "</tr>";
}else {
echo "<Tr>";
echo "<td><div align='left' class='Arial16BlackBold'>&nbsp;GRAND TOTAL&nbsp;</div></td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td><div align='right' class='Arial16BlackBold'>&nbsp;".number_format(($hospitalBill_company + $pf_company - $companyDiscount),2)."&nbsp;</td>";
echo "<td><div align='right' class='Arial16BlackBold'>&nbsp;".number_format(($gross - $ro->getRegistrationDetails_discount()  ) + $pf_cash ,2)."&nbsp;</div></td>";
echo "</tr>";
}


$grandTotalz = ($gross - $ro->getRegistrationDetails_discount()  ) + $pf_cash;

$ro->getPaymentHistory_showUp_returnPaid_setter($registrationNo);
$netTotal = (  ( ($gross - $ro->getRegistrationDetails_discount()   ) - $ro->getPaymentHistory_showUp_returnPaid() ) -  $ro->sumPartial($registrationNo) );
if( $netTotal < 0 ) $netTotal=0; 

//echo "<Tr>";
//echo "<td>&nbsp;<b>Payment's</b></tD>";
//echo "<td>&nbsp;</tD>";
//echo "<td>&nbsp;</tD>";
//echo "<td>&nbsp;</tD>";
//echo "<td>&nbsp;<b>".number_format( $ro->getPaymentHistory_showUp_returnPaid() ,2)."</b>&nbsp;</tD>";
//echo "</tr>";

$paidz1 = (( $ro->sumPartial_new($registrationNo,"amountPaid") + $ro->sumPartial_new($registrationNo,"pf")) + $ro->sumPartial_new($registrationNo,"admitting") );
echo "<Tr>";
echo "<td>&nbsp;<b>".$ro->descPartialPayment($registrationNo)."</b></tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
echo "<td>&nbsp;</tD>";
//echo "<td>&nbsp;<b>".number_format( $ro->sumPartial_new($registrationNo) ,2)."</b>&nbsp;</tD>";
echo "</tr>";

$ro->getCompanyPayment($registrationNo,$ro->getRegistrationDetails_company()); //ipakita ung payment ng px s company

//$ro->getPaymentHistory_showUp_returnPaid_setter($registrationNo);
//$netTotal = (  ($gross - $disc) - $ro->getPaymentHistory_showUp_returnPaid() );
//if( $netTotal < 0 ) $netTotal=0; 

if($ro->checkIfPackageExist($registrationNo) > 0 ) {
echo "<tr>";
echo "<td>&nbsp;BALANCE</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td><div align='right'>&nbsp;0.00&nbsp;</div></td>";
echo "</tr>";
}else {
echo "<tr>";
echo "<td>&nbsp;BALANCE&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
echo "<td>&nbsp;</td>";
$paidz = (( $ro->sumPartial_new($registrationNo,"amountPaid") + $ro->sumPartial_new($registrationNo,"pf")) + $ro->sumPartial_new($registrationNo,"admitting") );

//$remainBalance = ( $grandTotalz - $ro->sumPartial_new($registrationNo) );
$remainBalance = ( $grandTotalz - $ro->descPartialPayment_total() );

if( $remainBalance > 0 ) {
echo "<td><div align='right'>&nbsp;".number_format( $remainBalance ,2)."&nbsp;</div></td>";
}else {
echo "<td><div align='right'>&nbsp;0.00&nbsp;</div></td>";
}

echo "</tr>";
}

echo "</table>";
echo "<br>";
//echo "<font size=2>Payment's</font>";
//$ro->getPaymentHistory_showUp($registrationNo);
echo "<br>
<table border=0>
<td>
__________________________<br><font size='2'>Signature over Printed Name</font><br><font size=3>Relationship to Member:___________________________</font><br><font size=3>Contact Number:___________________________</font></font>
</tD>
<td width='40%'>&nbsp;</td>


</table>
<br>
<table width='100%'>
<tD>
<font size=2><u>Maricris.P. Alabata/Monilyn.B. Banguis</u><Br><b>Billing Section / Cashier</b></font>
</tD>


<tD>





<br>";
$ro->coconutBoxStop();

?>
</center>
</div>
