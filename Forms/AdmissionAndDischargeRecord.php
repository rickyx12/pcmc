<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ADMISSION AND DISCHARGE RECORD</title>
<script type="text/JavaScript">
<!--
function placeFocus() {
if (document.forms.length > 0) {
var field = document.forms[0];
for (i = 0; i < field.length; i++) {
if ((field.elements[i].type == "text") || (field.elements[i].type == "textarea") || (field.elements[i].type.toString().charAt(0) == "s")) {
document.forms[0].elements[i].focus();
break;
         }
      }
   }
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function printF(printData)
{
	var a = window.open ('',  '',"status=1,scrollbars=1, width=auto,height=auto");
	a.document.write(document.getElementById(printData).innerHTML.replace(/<a\/?[^>]+>/gi, ''));
	a.document.close();
	a.focus();
	a.print();
	a.close();
}
//-->
</script>
</head>

<body onload="placeFocus()">
<?php
include("../myDatabase.php");
$cuz = new database();

mysql_connect($cuz->myHost(),$cuz->getUser(),$cuz->getPass());
mysql_select_db($cuz->getDB());

$username=$_GET['username'];
$registrationNo=$_GET['registrationNo'];

$patientNo=$cuz->selectNow("registrationDetails","patientNo","registrationNo",$registrationNo);

$dateAdded=date("YmdHis");

$xsql=mysql_query("SELECT * FROM patientRecordAddInfo WHERE patientNo='$patientNo'");
$xc=mysql_num_rows($xsql);
if($xc==0){
mysql_query("INSERT INTO `patientRecordAddInfo` (`patientNo`, `dateAdded`, `addedBy`) VALUES ('$patientNo', '$dateAdded', '$username')");
}

$ysql=mysql_query("SELECT * FROM registrationDetailsAddInfo WHERE registrationNo='$registrationNo'");
$yc=mysql_num_rows($ysql);
if($yc==0){
mysql_query("INSERT INTO `registrationDetailsAddInfo` (`registrationNo`, `dateAdded`, `addedBy`) VALUES ('$registrationNo', '$dateAdded', '$username')");
}


echo "
<a href='#' onClick=printF('printData') style=text-decoration:none; color:black;>PRINT</a>
<div align='center' id='printData'>
<style type='text/css'>
<!--
.style1 {font-family: Arial;font-size: 16px;color: #000000;font-weight: bold;}
.style2 {font-family: 'Times New Roman';font-size: 16px;color: #FF0000;font-weight: bold;}
.style3 {text-decoration: none;font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
.style4 {font-family: Arial;font-size: 12px;color: #000000;font-weight: bold;}
.style5 {font-family: Arial;font-size: 12px;color: #000000;}
.style6 {font-family: Arial;font-size: 12px;color: #FFFFFF;}
.style7 {font-family: Arial;font-size: 11px;color: #000000;}
.style8 {font-family: Arial;font-size: 11px;color: #000000;font-weight: bold;}
.table1Left {border-left: 1px solid #000000;}
.table1Right {border-right: 1px solid #000000;}
.table1Left1Right {border-left: 1px solid #000000;border-right: 1px solid #000000;}
.table1Bottom {border-bottom: 1px solid #000000;}
.table1Bottom1Left {border-bottom: 1px solid #000000;border-left: 1px solid #000000;}
.table1Bottom1Right {border-bottom: 1px solid #000000;border-right: 1px solid #000000;}
.table1Bottom1Left1Right {border-bottom: 1px solid #000000;border-left: 1px solid #000000;border-right: 1px solid #000000;}
.table1Top {border-top: 1px solid #000000;}
.table1Top1Bottom {border-top: 1px solid #000000;border-bottom: 1px solid #000000;}
.table1Top1Bottom1Left {border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-left: 1px solid #000000;}
.table1Top1Bottom1Right {border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-right: 1px solid #000000;}
.table1Top1Bottom1Left1Right {border-top: 1px solid #000000;border-bottom: 1px solid #000000;border-left: 1px solid #000000;border-right: 1px solid #000000;}
.doubleUnderline {text-decoration:underline;border-bottom: 1px solid #000;font-family: Arial;font-size: 14px;color: #000000;}
-->
</style>


  <table width='100%' border='0' cellspacing='0' cellpadding='0'>
    <tr>
      <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
        <tr>
          <td width='60%' height='50' class='table1Top1Bottom1Left'><div align='center'>PAGADIAN CITY MEDICAL CENTER</div></td>
          <td width='40%' height='50' class='table1Top1Bottom1Left1Right'><div align='center' class='style1'>ADMISSION AND DISCHARGE<br />RECORD</div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height='10'></td>
    </tr>
    <tr>
      <td><table border='0' width='100%' cellspacing='0' cellpadding='0'>

        <tr>
          <td class='table1Top1Bottom1Left1Right' bgcolor='#000000'><div align='center' class='style6'>PATIENT'S INFORMATION (IN-PATIENT)</div></td>
        </tr>
";

echo "
        <tr>
          <td><table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td width='50%' height='20' class='table1Bottom1Left'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='100'><div align='left' class='style3'>&nbsp;Patient's ID No.:</div></td>
                  <td width='auto'><div align='left' class='style5'>$patientNo</div></td>
                </tr>
              </table></td>
              <td width='50%' class='table1Bottom1Left1Right'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='70'><div align='left' class='style3'>&nbsp;Case No.:</div></td>
                  <td width='auto'><div align='left' class='style5'>$registrationNo</div></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
";

$lastName=$cuz->selectNow("patientRecord","lastName","patientNo",$patientNo);
$firstName=$cuz->selectNow("patientRecord","firstName","patientNo",$patientNo);
$middleName=$cuz->selectNow("patientRecord","middleName","patientNo",$patientNo);

echo "
        <tr>
          <td><table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td class='table1Left' width='100'><div align='left' class='style3'>&nbsp;Patient's Name:</div></td>
              <td width='auto'><div align='center' class='style3'>(Last)</div></td>
              <td width='auto'><div align='center' class='style3'>(Given)</div></td>
              <td class='table1Right' width='auto'><div align='center' class='style3'>(Middle)</div></td>
            </tr>
            <tr>
              <td class='table1Bottom1Left' height='30'></td>
              <td class='table1Bottom'><div align='center' class='style5'>".strtoupper($lastName)."</div></td>
              <td class='table1Bottom'><div align='center' class='style5'>".strtoupper($firstName)."</div></td>
              <td class='table1Bottom1Right'><div align='center' class='style5'>".strtoupper($middleName)."</div></td>
            </tr>
          </table></td>
        </tr>
";

$Address=$cuz->selectNow("patientRecord","Address","patientNo",$patientNo);
$contactNo=$cuz->selectNow("patientRecord","contactNo","patientNo",$patientNo);
$Gender=$cuz->selectNow("patientRecord","Gender","patientNo",$patientNo);
$civilStatus=$cuz->selectNow("patientRecord","civilStatus","patientNo",$patientNo);

echo "
        <tr>
          <td><table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td width='50%' class='table1Bottom1Left'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td><div align='left' class='style3'>&nbsp;Address:</div></td>
                </tr>
                <tr>
                  <td height='20'><div align='left' class='style5'>&nbsp;$Address</div></td>
                </tr>
              </table></td>
              <td width='50%' class='table1Bottom1Left1Right'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='auto'><div align='left' class='style3'>&nbsp;Contact No.:</div></td>
                  <td class='table1Left' width='auto'><div align='left' class='style3'>&nbsp;Sex:</div></td>
                  <td class='table1Left' width='auto'><div align='left' class='style3'>&nbsp;Civil Status:</div></td>
                </tr>
                <tr>
                  <td height='20'><div align='center' class='style5'>$contactNo</div></td>
                  <td class='table1Left'><div align='center' class='style5'>".strtoupper($Gender)."</div></td>
                  <td class='table1Left'><div align='center' class='style5'>$civilStatus</div></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
";

$PTBirthdate=$cuz->selectNow("patientRecord","Birthdate","patientNo",$patientNo);
$PTBirtdatestr=strtotime($PTBirthdate);
$PTBirthdatefmt=date("M d, Y",$PTBirtdatestr);

$birthDatefmt=date("m/d/Y", $PTBirtdatestr);
$birthDate = explode("/", $birthDatefmt);

$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));

$religion=$cuz->selectNow("patientRecord","religion","patientNo",$patientNo);

$birthPlace=$cuz->selectNow("patientRecordAddInfo","birthPlace","patientNo",$patientNo);
$nationality=$cuz->selectNow("patientRecordAddInfo","nationality","patientNo",$patientNo);
$pxOccupation=$cuz->selectNow("patientRecordAddInfo","pxOccupation","patientNo",$patientNo);
$fathersName=$cuz->selectNow("patientRecordAddInfo","fathersName","patientNo",$patientNo);
$fatherAddress=$cuz->selectNow("patientRecordAddInfo","fatherAddress","patientNo",$patientNo);
$fatherContactNo=$cuz->selectNow("patientRecordAddInfo","fatherContactNo","patientNo",$patientNo);
$mothersName=$cuz->selectNow("patientRecordAddInfo","mothersName","patientNo",$patientNo);
$motherAddress=$cuz->selectNow("patientRecordAddInfo","motherAddress","patientNo",$patientNo);
$motherContactNo=$cuz->selectNow("patientRecordAddInfo","motherContactNo","patientNo",$patientNo);
$spouseName=$cuz->selectNow("patientRecordAddInfo","spouseName","patientNo",$patientNo);
$spouseAddress=$cuz->selectNow("patientRecordAddInfo","spouseAddress","patientNo",$patientNo);
$spouseContactNo=$cuz->selectNow("patientRecordAddInfo","spouseContactNo","patientNo",$patientNo);

echo "
        <tr>
          <td><table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td width='50%'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td class='table1Left' width='auto'><div align='left' class='style3'>&nbsp;Date of Birth:</div></td>
                  <td class='table1Left' width='auto'><div align='left' class='style3'>&nbsp;Age:</div></td>
                  <td class='table1Left' width='auto'><div align='left' class='style3'><a href='AdmissionFillUpMoreDetails.php?username=$username&registrationNo=$registrationNo' class='style3' target='_blank'>&nbsp;Place of Birth:</a></div></td>
                </tr>
                <tr>
                  <td class='table1Bottom1Left' height='20'><div align='center' class='style5'>$PTBirthdatefmt</div></td>
                  <td class='table1Bottom1Left'><div align='center' class='style5'>$age</div></td>
                  <td class='table1Bottom1Left'><div align='center' class='style5'>".strtoupper($birthPlace)."</div></td>
                </tr>
              </table></td>
              <td width='50%'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td class='table1Left' width='auto'><div align='left' class='style3'><a href='AdmissionFillUpMoreDetails.php?username=$username&registrationNo=$registrationNo' class='style3' target='_blank'>&nbsp;Citizenship:</a></div></td>
                  <td class='table1Left' width='auto'><div align='left' class='style3'>&nbsp;Religion:</div></td>
                  <td class='table1Left1Right' width='auto'><div align='left' class='style3'><a href='AdmissionFillUpMoreDetails.php?username=$username&registrationNo=$registrationNo' class='style3' target='_blank'>&nbsp;Occupation:</a></div></td>
                </tr>
                <tr>
                  <td class='table1Bottom1Left' height='20'><div align='center' class='style5'>".strtoupper($nationality)."</div></td>
                  <td class='table1Bottom1Left'><div align='center' class='style5'>$religion</div></td>
                  <td class='table1Bottom1Left1Right'><div align='center' class='style5'>".strtoupper($pxOccupation)."</div></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
";

echo "
        <tr>
          <td><table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td width='50%' height='20' class='table1Bottom1Left'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='100'><div align='left' class='style3'><a href='AdmissionFillUpMoreDetails.php?username=$username&registrationNo=$registrationNo' class='style3' target='_blank'>&nbsp;Fathers's Name</a></div></td>
                  <td width='auto'><div align='left' class='style5'>&nbsp;:&nbsp;".strtoupper($fathersName)."</div></td>
                </tr>
              </table></td>
              <td width='50%' height='20' class='table1Bottom1Left1Right'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='60' height='20'><div align='left' class='style3'><a href='AdmissionFillUpMoreDetails.php?username=$username&registrationNo=$registrationNo' class='style3' target='_blank'>&nbsp;Address:</a></div></td>
                  <td width='auto' height='20'><div align='left' class='style7'>&nbsp;".strtoupper($fatherAddress)."&nbsp;</div></td>
                  <td class='table1Left' width='80' height='20'><div align='left' class='style3'><a href='AdmissionFillUpMoreDetails.php?username=$username&registrationNo=$registrationNo' class='style3' target='_blank'>&nbsp;Contact No.:</a></div></td>
                  <td width='auto' height='20'><div align='left' class='style7'>&nbsp;".strtoupper($fatherContactNo)."&nbsp;</div></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td width='50%' height='20' class='table1Bottom1Left'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='100'><div align='left' class='style3'><a href='AdmissionFillUpMoreDetails.php?username=$username&registrationNo=$registrationNo' class='style3' target='_blank'>&nbsp;Mothers's Name</a></div></td>
                  <td width='auto'><div align='left' class='style5'>&nbsp;:&nbsp;".strtoupper($mothersName)."</div></td>
                </tr>
              </table></td>
              <td width='50%' height='20' class='table1Bottom1Left1Right'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='60' height='20'><div align='left' class='style3'><a href='AdmissionFillUpMoreDetails.php?username=$username&registrationNo=$registrationNo' class='style3' target='_blank'>&nbsp;Address:</a></div></td>
                  <td width='auto' height='20'><div align='left' class='style7'>&nbsp;".strtoupper($motherAddress)."&nbsp;</div></td>
                  <td class='table1Left' width='80' height='20'><div align='left' class='style3'><a href='AdmissionFillUpMoreDetails.php?username=$username&registrationNo=$registrationNo' class='style3' target='_blank'>&nbsp;Contact No.:</a></div></td>
                  <td width='auto' height='20'><div align='left' class='style7'>&nbsp;".strtoupper($motherContactNo)."&nbsp;</div></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td width='50%' height='20' class='table1Bottom1Left'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='100'><div align='left' class='style3'><a href='AdmissionFillUpMoreDetails.php?username=$username&registrationNo=$registrationNo' class='style3' target='_blank'>&nbsp;Spouse Name</a></div></td>
                  <td width='auto'><div align='left' class='style5'>&nbsp;:&nbsp;".strtoupper($spouseName)."</div></td>
                </tr>
              </table></td>
              <td width='50%' height='20' class='table1Bottom1Left1Right'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='60' height='20'><div align='left' class='style3'><a href='AdmissionFillUpMoreDetails.php?username=$username&registrationNo=$registrationNo' class='style3' target='_blank'>&nbsp;Address:</a></div></td>
                  <td width='auto' height='20'><div align='left' class='style7'>&nbsp;".strtoupper($spouseAddress)."&nbsp;</div></td>
                  <td class='table1Left' width='80' height='20'><div align='left' class='style3'><a href='AdmissionFillUpMoreDetails.php?username=$username&registrationNo=$registrationNo' class='style3' target='_blank'>&nbsp;Contact No.:</a></div></td>
                  <td width='auto' height='20'><div align='left' class='style7'>&nbsp;".strtoupper($spouseContactNo)."&nbsp;</div></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td class='table1Bottom1Left1Right' bgcolor='#000000'><div align='center' class='style6'>ADMISSION INFORMATION</div></td>
        </tr>
";

$asql=mysql_query("SELECT description FROM patientCharges WHERE registrationNo='$registrationNo' AND status NOT LIKE 'DELETED_%%%%' AND service='ADMITTING' AND title='PROFESSIONAL FEE'");
$acount=mysql_num_rows($asql);
if($acount==0){$addmittingdoctor="";}
else{while($afetch=mysql_fetch_array($asql)){$addmittingdoctor=$afetch['description'];}}

$dateRegistered=$cuz->selectNow("registrationDetails","dateRegistered","registrationNo",$registrationNo);
$dateRegisteredstr=strtotime($dateRegistered);
$dateRegisteredfmt=date("M d, Y",$dateRegisteredstr);
$timeRegistered=$cuz->selectNow("registrationDetails","timeRegistered","registrationNo",$registrationNo);

$room=$cuz->selectNow("registrationDetails","room","registrationNo",$registrationNo);

echo "
        <tr>
          <td><table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td width='50%' height='20' class='table1Bottom1Left'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='100'><div align='left' class='style3'>&nbsp;Admitted by:</div></td>
                </tr>
                <tr>
                  <td height='20'><div align='left' class='style5'>&nbsp;".strtoupper($addmittingdoctor)."</div></td>
                </tr>
              </table></td>
              <td width='50%' height='20' class='table1Bottom1Left1Right'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='auto' height='20'><div align='left' class='style3'>&nbsp;Date/Time Admitted:</div></td>
                  <td class='table1Left' width='auto' height='20'><div align='left' class='style3'>&nbsp;Room No.:</div></td>
                </tr>
                <tr>
                  <td height='20' width='auto' ><div align='left' class='style5'>&nbsp;$dateRegisteredfmt - $timeRegistered</div></td>
                  <td class='table1Left' width='auto' height='20'><div align='left' class='style5'>&nbsp;$room</div></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
";

$PHIC=$cuz->selectNow("patientRecord","PHIC","patientNo",$patientNo);
$company=$cuz->selectNow("registrationDetails","company","registrationNo",$registrationNo);
$companytype=$cuz->selectNow("Company","type","companyName",$company);
if(($PHIC=="YES")&&($company!="")){
$checked1="<img src='CheckBox-UnChecked.png' width='10' height='10' />";
$checked2="<img src='CheckBox-Checked.png' width='10' height='10' />";
$checked3="<img src='CheckBox-Checked.png' width='10' height='10' />";
}
else if(($PHIC=="YES")&&($company=="")){
$checked1="<img src='CheckBox-UnChecked.png' width='10' height='10' />";
$checked2="<img src='CheckBox-UnChecked.png' width='10' height='10' />";
$checked3="<img src='CheckBox-Checked.png' width='10' height='10' />";
}
else if(($PHIC!="YES")&&($company!="")){
$checked1="<img src='CheckBox-UnChecked.png' width='10' height='10' />";
$checked2="<img src='CheckBox-Checked.png' width='10' height='10' />";
$checked3="<img src='CheckBox-UnChecked.png' width='10' height='10' />";
}
else{
$checked1="<img src='CheckBox-Checked.png' width='10' height='10' />";
$checked2="<img src='CheckBox-UnChecked.png' width='10' height='10' />";
$checked3="<img src='CheckBox-UnChecked.png' width='10' height='10' />";
}

$bsql=mysql_query("SELECT description FROM patientCharges WHERE registrationNo='$registrationNo' AND status NOT LIKE 'DELETED_%%%%' AND service='ATTENDING' AND title='PROFESSIONAL FEE'");
$bcount=mysql_num_rows($bsql);
if($bcount==0){$attendingdoctor="";}
else{while($bfetch=mysql_fetch_array($bsql)){$attendingdoctor=$bfetch['description'];}}

echo "
        <tr>
          <td><table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td width='37%' valign='top' height='20' class='table1Bottom1Left'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td><div align='left' class='style3'>&nbsp;Type of Admission:</div></td>
                </tr>
                <tr>
                  <td height='20'><div align='left' class='style7'>&nbsp;$checked1 Personal&nbsp;$checked2 Insurance&nbsp;$checked3 PhilHealth</div></td>
                </tr>
              </table></td>
              <td width='30%' valign='top' height='20' class='table1Bottom1Left'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td height='20'><div align='left' class='style3'><a href='RegMoreDetails.php?username=$username&registrationNo=$registrationNo' class='style3' target='_blank'>&nbsp;Social Service Classification:</a></div></td>
                </tr>
                <tr>
                  <td height='20'><div align='left' class='style7'>&nbsp;</div></td>
                </tr>
              </table></td>
              <td width='33%' valign='top' height='20' class='table1Bottom1Left1Right'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td height='20'><div align='left' class='style3'>&nbsp;Attending Physician:</div></td>
                </tr>
                <tr>
                  <td =height='20'><div align='left' class='style7'>&nbsp;".strtoupper($attendingdoctor)."</div></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
";

$IxDx=$cuz->selectNow("registrationDetails","IxDx","registrationNo",$registrationNo);

echo "
        <tr>
          <td class='table1Bottom1Left1Right'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td><div align='left' class='style3'>&nbsp;Admitting Diagnosis:</div></td>
            </tr>
            <tr>
              <td height='50' valign='top'><div align='left' class='style5'>&nbsp;$IxDx</div></td>
            </tr>
          </table></td>
        </tr>
";

$PIN=$cuz->selectNow("registrationDetails","PIN","registrationNo",$registrationNo);
if($companytype=='insurance'){$showcompany1=$company;$showcompany2="";}else if($companytype=='company'){$showcompany1="";$showcompany2=$company;}else{$showcompany1="";$showcompany2="";}

echo "
        <tr>
          <td><table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td width='37%' valign='top' height='20' class='table1Bottom1Left'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='100'><div align='left' class='style3' target='_blank'>&nbsp;Company's Name:</div></td>
                </tr>
                <tr>
                  <td height='20'><div align='left' class='style5'>&nbsp;$showcompany2</div></td>
                </tr>
              </table></td>
              <td width='30%' valign='top' height='20' class='table1Bottom1Left'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='60' height='20'><div align='left' class='style3'>&nbsp;Health Insurance:</div></td>
                </tr>
                <tr>
                  <td width='60' height='20'><div align='left' class='style5'>&nbsp;$showcompany1</div></td>
                </tr>
              </table></td>
              <td width='33%' valign='top' height='20' class='table1Bottom1Left1Right'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='60' height='20'><div align='left' class='style3'>&nbsp;PhilHealth No.:</div></td>
                </tr>
";

echo "
                <tr>
                  <td width='60' height='20'><div align='left' class='style5'>&nbsp;$PIN</div></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
";

$informant=$cuz->selectNow("registrationDetailsAddInfo","informant","registrationNo",$registrationNo);
$informantaddress=$cuz->selectNow("registrationDetailsAddInfo","informantaddress","registrationNo",$registrationNo);
$relationtopatient=$cuz->selectNow("registrationDetailsAddInfo","relationtopatient","registrationNo",$registrationNo);
$informantcontactno=$cuz->selectNow("registrationDetailsAddInfo","informantcontactno","registrationNo",$registrationNo);

echo "
        <tr>
          <td><table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td width='50%' height='20' class='table1Bottom1Left'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='115'><div align='left' class='style3'><a href='RegMoreDetails.php?username=$username&registrationNo=$registrationNo' class='style3' target='_blank'>&nbsp;Informant's Name:</a></div></td>
                  <td><div align='left' class='style5'>&nbsp;$informant</div></td>
                </tr>
              </table></td>
              <td width='50%' class='table1Bottom1Left1Right'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='130'><div align='left' class='style3'><a href='RegMoreDetails.php?username=$username&registrationNo=$registrationNo' class='style3' target='_blank'>&nbsp;Address of Informant:</a></div></td>
                  <td><div align='left' class='style5'>&nbsp;$informantaddress</div></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
";

echo "
        <tr>
          <td><table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td width='50%' height='20' class='table1Bottom1Left'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='118'><div align='left' class='style3'><a href='RegMoreDetails.php?username=$username&registrationNo=$registrationNo' class='style3' target='_blank'>&nbsp;Relation to Patient:</a></div></td>
                  <td><div align='left' class='style5'>&nbsp;$relationtopatient</div></td>
                </tr>
              </table></td>
              <td width='50%' class='table1Bottom1Left1Right'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td width='80'><div align='left' class='style3'><a href='RegMoreDetails.php?username=$username&registrationNo=$registrationNo' class='style3' target='_blank'>&nbsp;Contact No.:</a></div></td>
                  <td><div align='left' class='style5'>&nbsp;$informantcontactno</div></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
";

echo "
        <tr>
          <td><table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td width='100%' class='table1Bottom1Left1Right'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td height='20' valign='top' width='115'><div align='left' class='style3'>&nbsp;I certify that the facts I have given are true to the best of my knowledge.</div></td>
                </tr>
                <tr>
                  <td height='30' valign='bottom'><div align='right' class='style3'>Name of Informant/Signature:&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></div></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td class='table1Bottom1Left1Right' bgcolor='#000000'><div align='center' class='style6'>DISCHARGE INFORMATION</div></td>
        </tr>
";

echo "
        <tr>
          <td><table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td width='50%' class='table1Bottom1Left'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td><div align='left' class='style3'>&nbsp;Date and Time of Discharge:</div></td>
                </tr>
                <tr>
                  <td height='20'><div align='left' class='style5'>&nbsp;</div></td>
                </tr>
              </table></td>
              <td width='50%' class='table1Bottom1Left1Right'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td><div align='left' class='style3'>&nbsp;Total No. of Days:</div></td>
                </tr>
                <tr>
                  <td height='20'><div align='left' class='style5'>&nbsp;</div></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
";

echo "
        <tr>
          <td><table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td valign='top' width='70%' class='table1Bottom1Left'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td><div align='left' class='style3'>&nbsp;Final Diagnosis:</div></td>
                </tr>
                <tr>
                  <td height='50'><div align='left' class='style5'>&nbsp;</div></td>
                </tr>
              </table></td>
              <td width='30%' class='table1Bottom1Left1Right'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td valign='top'><div align='left' class='style3'>&nbsp;ICD Code No.:</div></td>
                </tr>
                <tr>
                  <td height='50'><div align='left' class='style5'>&nbsp;</div></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
";

echo "
        <tr>
          <td><table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td valign='top' width='70%' class='table1Bottom1Left'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td><div align='left' class='style3'>&nbsp;Operation/Procedure Performed:</div></td>
                </tr>
                <tr>
                  <td height='50'><div align='left' class='style5'>&nbsp;</div></td>
                </tr>
              </table></td>
              <td width='30%' class='table1Bottom1Left1Right'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td valign='top'><div align='left' class='style3'>&nbsp;Date/TIme Performed:</div></td>
                </tr>
                <tr>
                  <td height='50'><div align='left' class='style5'>&nbsp;</div></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
";

$dischargeCondition=$cuz->selectNow("registrationDetailsAddInfo","dischargeCondition","registrationNo",$registrationNo);

if($dischargeCondition=="Recovered"){
$dc1="<img src='CheckBox-Checked.png' width='7' height='7' />";
$dc2="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc3="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc4="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc5="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc6="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc7="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
}
else if($dischargeCondition=="Improved"){
$dc1="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc2="<img src='CheckBox-Checked.png' width='7' height='7' />";
$dc3="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc4="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc5="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc6="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc7="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
}
else if($dischargeCondition=="Controlled"){
$dc1="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc2="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc3="<img src='CheckBox-Checked.png' width='7' height='7' />";
$dc4="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc5="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc6="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc7="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
}
else if($dischargeCondition=="Unresolved"){
$dc1="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc2="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc3="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc4="<img src='CheckBox-Checked.png' width='7' height='7' />";
$dc5="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc6="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc7="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
}
else if($dischargeCondition=="Expired"){
$dc1="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc2="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc3="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc4="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc5="<img src='CheckBox-Checked.png' width='7' height='7' />";
$dc6="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc7="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
}
else if($dischargeCondition=="Well Baby"){
$dc1="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc2="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc3="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc4="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc5="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc6="<img src='CheckBox-Checked.png' width='7' height='7' />";
$dc7="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
}
else{
$dc1="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc2="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc3="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc4="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc5="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc6="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$dc7="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
}

$disposition=$cuz->selectNow("registrationDetailsAddInfo","disposition","registrationNo",$registrationNo);

if($disposition=="Discharge as advised"){
$disp1="<img src='CheckBox-Checked.png' width='7' height='7' />";
$disp2="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp3="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp4="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp5="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
}
else if($disposition=="Transfered"){
$disp1="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp2="<img src='CheckBox-Checked.png' width='7' height='7' />";
$disp3="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp4="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp5="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
}
else if($disposition=="Against Advise (DAMA/HAMA)"){
$disp1="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp2="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp3="<img src='CheckBox-Checked.png' width='7' height='7' />";
$disp4="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp5="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
}
else if($disposition=="Absconded"){
$disp1="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp2="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp3="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp4="<img src='CheckBox-Checked.png' width='7' height='7' />";
$disp5="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
}
else if($disposition=="Expired"){
$disp1="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp2="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp3="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp4="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp5="<img src='CheckBox-Checked.png' width='7' height='7' />";
}
else{
$disp1="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp2="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp3="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp4="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
$disp5="<img src='CheckBox-UnChecked.png' width='7' height='7' />";
}

echo "
        <tr>
          <td><table border='0' width='100%' cellspacing='0' cellpadding='0'>
            <tr>
              <td width='40%' valign='top' height='20' class='table1Bottom1Left'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td><div align='left' class='style3'><a href='RegMoreDetails.php?username=$username&registrationNo=$registrationNo' class='style3' target='_blank'>&nbsp;Discharge Condition:</a></div></td>
                </tr>
                <tr>
                  <td><div align='left' class='style7'>&nbsp;$dc1 Recovered<br />&nbsp;$dc2 Improved<br />&nbsp;$dc3 Controlled<br />&nbsp;$dc4 Unresolved<br />&nbsp;$dc5 Expired <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>Autopsy <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>No Autopsy<br />&nbsp;$dc6 Well Baby<br />&nbsp;$dc7 Other: <u>$dischargeCondition</u></div></td>
                </tr>
              </table></td>
              <td width='25%' valign='top' height='20' class='table1Bottom1Left'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td height='20'><div align='left' class='style3'><a href='RegMoreDetails.php?username=$username&registrationNo=$registrationNo' class='style3' target='_blank'>&nbsp;Disposition:</a></div></td>
                </tr>
                <tr>
                  <td><div align='left' class='style7'>&nbsp;$disp1 Discharge as advised<br />&nbsp;$disp2 Transfered<br />&nbsp;$disp3 Against Advise (DAMA/HAMA)<br />&nbsp;$disp4 Absconded<br />&nbsp;$disp5 Expired</div></td>
                </tr>
              </table></td>
              <td width='35%' valign='top' height='20' class='table1Bottom1Left1Right'><table border='0' width='100%' cellspacing='0' cellpadding='0'>
                <tr>
                  <td height='20'><div align='center' class='style3'>ATTENDING PHYSICIAN</div></td>
                </tr>
                <tr>
                  <td valign='bottom'><br /><br /><table width='100%' border='0' cellspacing='0' celpadding='0'>
                    <tr>
                      <td><div align='center' class='style5'><u>&nbsp;&nbsp;&nbsp;".strtoupper($attendingdoctor).", MD.&nbsp;&nbsp;&nbsp;</u></div></td>
                    </tr>
                    <tr>
                      <td valign='top'><div align='center' class='style8'>Signature over Printed Name</div></td>
                    </tr>
                    <tr>
                      <td valign='top'><div align='center' class='style8'>Lic. No.:&nbsp;<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></div></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
";

echo "
      </table></td>
    </tr>
  </table>
</div>
";
?>
</body>
</html>
