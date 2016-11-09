<?php
include("../../myDatabase.php");

class core2 extends database {

public $myHost = 'localhost';
public $username = 'root';
public $password = 'test';
public $database = 'Coconut';



public function getBilledPx() {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT pp.paidVia,upper(pr.completeName) as completeName,pp.paymentFor,pp.paidBy,pp.datePaid,pp.amountPaid FROM patientPayment pp,patientRecord pr,registrationDetails rd,patientCharges pc WHERE pr.patientNo = rd.patientNo and pp.registrationNo = rd.registrationNo and rd.registrationNo = pc.registrationNo and pp.paymentFor = 'BILLED' group by paymentNo order by completeName asc ");


while($row = mysql_fetch_array($result))
  {
echo "<tr>";
echo "<td>&nbsp;<font color=red>".$row['completeName']."</font>&nbsp;</td>";
echo "<td>&nbsp;".$row['paymentFor']."&nbsp;</td>";
echo "<td>&nbsp;".$row['amountPaid']."&nbsp;</td>";
echo "<td>&nbsp;".number_format("1",2)."&nbsp;</td>";
echo "<td>&nbsp;".number_format("0",2)."&nbsp;</td>";
echo "<td>&nbsp;".$row['amountPaid']."&nbsp;</td>";
echo "<td>&nbsp;".number_format("0",2)."&nbsp;</td>";
echo "<td>&nbsp;".$row['amountPaid']." - (".$row['paidVia'].")&nbsp;</td>";
echo "<td>&nbsp;".$row['paidBy']."&nbsp;</td>";
//$this->collection_salesTotal+=$row['total'];
//$this->collection_salesUnpaid+=$row['cashUnpaid'];
//$this->collection_salesPaid+=$row['cashPaid'];
/*
if($row['paidVia'] == "Cash") {
$this->collection_cash += $row['cashPaid'];
}else {
$this->collection_creditCard += $row['cashPaid'];
}
*/
echo "</tr>";
  }

}



public function getLabForm($type,$registrationNo,$itemNo,$username) { //check kung meron pang pde Lagay sa phic 

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


$result = mysql_query("SELECT * from core2_laboratory where type = '$type' order by description asc ");

if( $type == "hematology" ) {
$phpFiles = "/COCONUT/core2_lab/addHematology.php";
}else if( $type == "urinalysis" ) {
$phpFiles = "/COCONUT/core2_lab/addUrinalysis.php";
}else if( $type == "fecalysis" ) {
$phpFiles = "/COCONUT/core2_lab/addFecalysis.php";
}else if( $type == "chemistry" ) {
$phpFiles = "/COCONUT/core2_lab/addChemistry.php";
}else if( $type == "serology" ) {
$phpFiles = "/COCONUT/core2_lab/addSerology.php";
}else if( $type == "crossMatching" ) {
$phpFiles = "/COCONUT/core2_lab/addCrossMatching.php";
}else if( $type == "electrolytes" ) {
$phpFiles = "/COCONUT/core2_lab/addElectrolytes.php";
}else if( $type == "miscellaneous" ) {
$phpFiles = "/COCONUT/core2_lab/addMiscellaneous.php";
}else if( $type == "miniVidas" ) {
$phpFiles = "/COCONUT/core2_lab/addMiniVidas.php";
}else if( $type == "typhoid" ) {
$phpFiles = "/COCONUT/core2_lab/addTyphoid.php";
}
else {
$phpFiles = "";
}


$this->coconutDesign();

$this->coconutFormStart("get",$phpFiles);
$this->coconutHidden("registrationNo",$registrationNo);
$this->coconutHidden("itemNo",$itemNo);
$this->coconutHidden("username",$username);
$this->coconutTableStart();
while($row = mysql_fetch_array($result))
  {
$this->coconutTableRowStart();
$this->coconutTableData($row['description']);
echo "<Td>";
$this->coconutTextBox($row['descriptionCode'],"");
echo "</td>";
echo "<Td>";
echo "<input type=text name='normalValues_$row[description]' style='border:0px; font-size:17px; width:100%;' value='".$row['normalValues']."' autocomplete='off'>";
echo "</td>";
$this->coconutTableRowStop();
  }
$this->coconutTableStop();
$this->coconutButton("Proceed");
$this->coconutFormStop();


}








public function addHematology($registrationNo,$itemNo,$medtech,$pathologist,$hemoglobinMass,$erythrocyteCount,$hematocrit,$leucocyteCount,$myelocyte,$neutrophils,$stabs,$segmenters,$lymphocytes,$monocytes,$eosinophils,$basophils,$plateletCount,$ESR,$bleedingTime,$clottingTime,$bloodGroup,$rhType,$dateResult) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO core2_laboratory_hematology (registrationNo,itemNo,medtech,pathologist,hemoglobinMass,erythrocyteCount,hematocrit,leucocyteCount,myelocyte,neutrophils,stabs,segmenters,lymphocytes,monocytes,eosinophils,basophils,plateletCount,ESR,bleedingTime,clottingTime,bloodGroup,rhType,dateResult)
VALUES
('$registrationNo','$itemNo','$medtech','$pathologist','$hemoglobinMass','$erythrocyteCount','$hematocrit','$leucocyteCount','$myelocyte','$neutrophils','$stabs','$segmenters','$lymphocytes','$monocytes','$eosinophils','$basophils','$plateletCount','$ESR','$bleedingTime','$clottingTime','$bloodGroup','$rhType','$dateResult')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

/*
echo "<script type='text/javascript' >";
echo "alert('$description was Successfully Added to the List of Charges in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addCharges.php?module=$category&username=$username '";
echo "</script>";
*/


mysql_close($con);

}






public function addUrinalysis($registrationNo,$itemNo,$pathologist,$medtech,$color,$appearance,$specificGravity,$reaction,$albumin,$sugar,$pusCells,$rbcMicroscopic,$hyalineCast,$fineGranular,$coarseGranular,$wbc,$rbcCast,$uricAcid,$calciumOxalate,$amorphousPhosphates,$epithelialCells,$mucusThreads,$bacteria,$remarks,$others,$dateResult) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO core2_laboratory_urinalysis (registrationNo,itemNo,pathologist,medtech,color,appearance,specificGravity,reaction,albumin,sugar,pusCells,rbcMicroscopic,hyalineCast,fineGranular,coarseGranular,wbc,rbcCast,uricAcid,calciumOxalate,amorphousPhosphates,epithelialCells,mucusThreads,bacteria,remarks,others,dateResult)
VALUES
('$registrationNo','$itemNo','$pathologist','$medtech','$color','$appearance','$specificGravity','$reaction','$albumin','$sugar','$pusCells','$rbcMicroscopic','$hyalineCast','$fineGranular','$coarseGranular','$wbc','$rbcCast','$uricAcid','$calciumOxalate','$amorphousPhosphates','$epithelialCells','$mucusThreads','$bacteria','$remarks','$others','$dateResult')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

/*
echo "<script type='text/javascript' >";
echo "alert('$description was Successfully Added to the List of Charges in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addCharges.php?module=$category&username=$username '";
echo "</script>";
*/


mysql_close($con);

}







public function addFecalysis($itemNo,$registrationNo,$pathologist,$medtech,$color,$consistency,$ascaris,$trichiuris,$hookWorm,$bistolycaCyst,$bistolycaTrophozite,$coliCyst,$coliTrophozite,$pusCells,$redBloodCells,$bacteria,$fatGlobules,$remarks,$dateResult) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO core2_laboratory_fecalysis (itemNo,registrationNo,pathologist,medtech,color,consistency,ascaris,trichiuris,hookWorm,bistolyticaCyst,bistolyticaTrophozite,coliCyst,coliTrophozite,pusCells,redBloodCells,bacteria,fatGlobules,remarks,dateResult)
VALUES
('$itemNo','$registrationNo','$pathologist','$medtech','$color','$consistency','$ascaris','$trichiuris','$hookWorm','$bistolycaCyst','$bistolycaTrophozite','$coliCyst','$coliTrophozite','$pusCells','$redBloodCells','$bacteria','$fatGlobules','$remarks','$dateResult')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

/*
echo "<script type='text/javascript' >";
echo "alert('$description was Successfully Added to the List of Charges in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addCharges.php?module=$category&username=$username '";
echo "</script>";
*/


mysql_close($con);

}




public function addChemistry($registrationNo,$itemNo,$pathologist,$medtech,$agRatio,$albumin,$alkalinePhosphatase,$alt_sgpt,$amylase,$ast_sgot,$bun,$creatinine,$directBilirubin,$ggt,$globulin,$glucose,$hdld,$indirectBilirubin,$ldl,$ldp,$mg,$phosphorus,$totalBilirubin,$totalCholesterol,$totalProtein,$triglycerides,$uricAcid) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO pagadian_chemistry (pathologist,medtech,registrationNo,itemNo,agRatio,albumin,alkalinePhosphatase,alt_sgpt,amylase,ast_sgot,bun,creatinine,directBilirubin,ggt,globulin,glucose,hdld,indirectBilirubin,ldl,ldp,mg,phosphorus,totalBilirubin,totalCholesterol,totalProtein,triglycerides,uricAcid)
VALUES
('$pathologist','$medtech','$registrationNo','$itemNo','$agRatio','$albumin','$alkalinePhosphatase','$alt_sgpt','$amylase','$ast_sgot','$bun','$creatinine','$directBilirubin','$ggt','$globulin','$glucose','$hdld','$indirectBilirubin','$ldl','$ldp','$mg','$phosphorus','$totalBilirubin','$totalCholesterol','$totalProtein','$triglycerides','$uricAcid')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

/*
echo "<script type='text/javascript' >";
echo "alert('$description was Successfully Added to the List of Charges in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addCharges.php?module=$category&username=$username '";
echo "</script>";
*/


mysql_close($con);

}



public function addSerology($registrationNo,$itemNo,$pathologist,$medtech,$hepab,$syphilis,$typhidot,$hpylori,$dateResult) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO core2_laboratory_serology (registrationNo,itemNo,pathologist,medtech,hepab,syphilis,typhidot,hpylori,dateResult)
VALUES
('$registrationNo','$itemNo','$pathologist','$medtech','$hepab','$syphilis','$typhidot','$hpylori','$dateResult')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

/*
echo "<script type='text/javascript' >";
echo "alert('$description was Successfully Added to the List of Charges in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addCharges.php?module=$category&username=$username '";
echo "</script>";
*/


mysql_close($con);

}




public function addCrossMatching($registrationNo,$itemNo,$pathologist,$medtech,$examinationDesired,$donor1,$dateCollected1,$expiryDate1,$retyping1,$crossMatching1,$donor2,$dateCollected2,$expiryDate2,$retyping2,$crossMatching2,$donor3,$dateCollected3,$expiryDate3,$retyping3,$crossMatching3,$donor4,$dateCollected4,$expiryDate4,$retyping4,$crossMatching4,$dateResult) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO core2_laboratory_crossMatching (registrationNo,itemNo,pathologist,medtech,examinationDesired,donor1,dateCollected1,expiryDate1,retyping1,crossMatching1,donor2,dateCollected2,expiryDate2,retyping2,crossMatching2,donor3,dateCollected3,expiryDate3,retyping3,crossMatching3,donor4,dateCollected4,expiryDate4,retyping4,crossMatching4,dateResult)
VALUES
('$registrationNo','$itemNo','$pathologist','$medtech','$examinationDesired','".mysql_real_escape_string($donor1)."','".mysql_real_escape_string($dateCollected1)."','".mysql_real_escape_string($expiryDate1)."','".mysql_real_escape_string($retyping1)."','".mysql_real_escape_string($crossMatching1)."','".mysql_real_escape_string($donor2)."','".mysql_real_escape_string($dateCollected2)."','".mysql_real_escape_string($expiryDate2)."','".mysql_real_escape_string($retyping2)."','".mysql_real_escape_string($crossMatching2)."','".mysql_real_escape_string($donor3)."','".mysql_real_escape_string($dateCollected3)."','".mysql_real_escape_string($expiryDate3)."','".mysql_real_escape_string($retyping3)."','".mysql_real_escape_string($crossMatching3)."','".mysql_real_escape_string($donor4)."','".mysql_real_escape_string($dateCollected4)."','".mysql_real_escape_string($expiryDate4)."','".mysql_real_escape_string($retyping4)."','".mysql_real_escape_string($crossMatching4)."','$dateResult')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

/*
echo "<script type='text/javascript' >";
echo "alert('$description was Successfully Added to the List of Charges in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addCharges.php?module=$category&username=$username '";
echo "</script>";
*/


mysql_close($con);

}



public function addLaboratoryResultChecker($registrationNo,$itemNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO core2_laboratoryResultChecker (registrationNo,itemNo)
VALUES
('$registrationNo','$itemNo')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

/*
echo "<script type='text/javascript' >";
echo "alert('$description was Successfully Added to the List of Charges in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addCharges.php?module=$category&username=$username '";
echo "</script>";
*/


mysql_close($con);

}



public $getHematologyResult_hemoglobinMass;
public $getHematologyResult_erythrocyteCount;
public $getHematologyResult_hematocrit;
public $getHematologyResult_leucocyteCount;
public $getHematologyResult_myelocyte;
public $getHematologyResult_neutrophils;
public $getHematologyResult_stabs;
public $getHematologyResult_segmenters;
public $getHematologyResult_lymphocytes;
public $getHematologyResult_monocytes;
public $getHematologyResult_eosinophils;
public $getHematologyResult_basophils;
public $getHematologyResult_plateletCount;
public $getHematologyResult_esr;
public $getHematologyResult_bleedingTime;
public $getHematologyResult_clottingTime;
public $getHematologyResult_bloodGroup;
public $getHematologyResult_rhType;
public $getHematologyResult_pathologist;
public $getHematologyResult_username;
public $getHematologyResult_dateResult;

public function getHematologyResult_hemoglobinMass() {
return $this->getHematologyResult_hemoglobinMass;
}
public function getHematologyResult_erythrocyteCount() {
return $this->getHematologyResult_erythrocyteCount;
}
public function getHematologyResult_hematocrit() {
return $this->getHematologyResult_hematocrit;
}
public function getHematologyResult_leucocyteCount() {
return $this->getHematologyResult_leucocyteCount;
}
public function getHematologyResult_myelocyte() {
return $this->getHematologyResult_myelocyte;
}
public function getHematologyResult_neutrophils() {
return $this->getHematologyResult_neutrophils;
}
public function getHematologyResult_stabs() {
return $this->getHematologyResult_stabs;
}
public function getHematologyResult_segmenters() {
return $this->getHematologyResult_segmenters;
}
public function getHematologyResult_lymphocytes() {
return $this->getHematologyResult_lymphocytes;
}
public function getHematologyResult_monocytes() {
return $this->getHematologyResult_monocytes;
}
public function getHematologyResult_eosinophils() {
return $this->getHematologyResult_eosinophils;
}
public function getHematologyResult_basophils() {
return $this->getHematologyResult_basophils;
}
public function getHematologyResult_plateletCount() {
return $this->getHematologyResult_plateletCount;
}
public function getHematologyResult_esr() {
return $this->getHematologyResult_esr;
}
public function getHematologyResult_bleedingTime() {
return $this->getHematologyResult_bleedingTime;
}
public function getHematologyResult_clottingTime() {
return $this->getHematologyResult_clottingTime;
}
public function getHematologyResult_bloodGroup() {
return $this->getHematologyResult_bloodGroup;
}
public function getHematologyResult_rhType() {
return $this->getHematologyResult_rhType;
}
public function getHematologyResult_pathologist() {
return $this->getHematologyResult_pathologist;
}
public function getHematologyResult_username() {
return $this->getHematologyResult_username;
}
public function getHematologyResult_dateResult() {
return $this->getHematologyResult_dateResult;
}

public function getHematologyResult($itemNo,$registrationNo) { //check kung meron pang pde Lagay sa phic 

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


$result = mysql_query("SELECT * from core2_laboratory_hematology where itemNo = '$itemNo' and registrationNo = '$registrationNo' ");

while($row = mysql_fetch_array($result))
  {
$this->getHematologyResult_hemoglobinMass = $row['hemoglobinMass'];
$this->getHematologyResult_erythrocyteCount = $row['erythrocyteCount'];
$this->getHematologyResult_hematocrit = $row['hematocrit'];
$this->getHematologyResult_leucocyteCount = $row['leucocyteCount'];
$this->getHematologyResult_myelocyte = $row['myelocyte'];
$this->getHematologyResult_neutrophils = $row['neutrophils'];
$this->getHematologyResult_stabs = $row['stabs'];
$this->getHematologyResult_segmenters = $row['segmenters'];
$this->getHematologyResult_lymphocytes = $row['lymphocytes'];
$this->getHematologyResult_monocytes = $row['monocytes'];
$this->getHematologyResult_eosinophils = $row['eosinophils'];
$this->getHematologyResult_basophils = $row['basophils'];
$this->getHematologyResult_plateletCount = $row['plateletCount'];
$this->getHematologyResult_esr = $row['ESR'];
$this->getHematologyResult_bleedingTime = $row['bleedingTime'];
$this->getHematologyResult_clottingTime = $row['clottingTime'];
$this->getHematologyResult_bloodGroup = $row['bloodGroup'];
$this->getHematologyResult_rhType = $row['rhType'];
$this->getHematologyResult_pathologist = $row['pathologist'];
$this->getHematologyResult_username = $row['medtech'];
$this->getHematologyResult_dateResult = $row['dateResult'];

  }


}













public $getUrinalysisResult_color;
public $getUrinalysisResult_appearance;
public $getUrinalysisResult_specificGravity;
public $getUrinalysisResult_reaction;
public $getUrinalysisResult_albumin;
public $getUrinalysisResult_sugar;
public $getUrinalysisResult_pusCells;
public $getUrinalysisResult_rbcMicroscopic;
public $getUrinalysisResult_hyalineCast;
public $getUrinalysisResult_fineGranular;
public $getUrinalysisResult_coarseGranular;
public $getUrinalysisResult_wbc;
public $getUrinalysisResult_rbcCast;
public $getUrinalysisResult_uricAcid;
public $getUrinalysisResult_calciumOxalate;
public $getUrinalysisResult_amorphousUrates;
public $getUrinalysisResult_amorphousPhosphates;
public $getUrinalysisResult_epithelialCells;
public $getUrinalysisResult_mucusThreads;
public $getUrinalysisResult_bacteria;
public $getUrinalysisResult_remarks;
public $getUrinalysisResult_pathologist;
public $getUrinalysisResult_username;
public $getUrinalysisResult_others;
public $getUrinalysisResult_dateResult;



public function getUrinalysisResult_color() {
return $this->getUrinalysisResult_color;
}
public function getUrinalysisResult_appearance() {
return $this->getUrinalysisResult_appearance;
}
public function getUrinalysisResult_specificGravity() {
return $this->getUrinalysisResult_specificGravity;
}
public function getUrinalysisResult_reaction() {
return $this->getUrinalysisResult_reaction;
}
public function getUrinalysisResult_albumin() {
return $this->getUrinalysisResult_albumin;
}
public function getUrinalysisResult_sugar() {
return $this->getUrinalysisResult_sugar;
}
public function getUrinalysisResult_pusCells() {
return $this->getUrinalysisResult_pusCells;
}
public function getUrinalysisResult_rbcMicroscopic() {
return $this->getUrinalysisResult_rbcMicroscopic;
}
public function getUrinalysisResult_hyalineCast() {
return $this->getUrinalysisResult_hyalineCast;
}
public function getUrinalysisResult_fineGranular() {
return $this->getUrinalysisResult_fineGranular;
}
public function getUrinalysisResult_coarseGranular() {
return $this->getUrinalysisResult_coarseGranular;
}
public function getUrinalysisResult_wbc() {
return $this->getUrinalysisResult_wbc;
}
public function getUrinalysisResult_rbcCast() {
return $this->getUrinalysisResult_rbcCast;
}
public function getUrinalysisResult_uricAcid() {
return $this->getUrinalysisResult_uricAcid;
}
public function getUrinalysisResult_calciumOxalate() {
return $this->getUrinalysisResult_calciumOxalate;
}
public function getUrinalysisResult_amorphousUrates() {
return $this->getUrinalysisResult_amorphousUrates;
}
public function getUrinalysisResult_amorphousPhosphates() {
return $this->getUrinalysisResult_amorphousPhosphates;
}
public function getUrinalysisResult_epithelialCells() {
return $this->getUrinalysisResult_epithelialCells;
}
public function getUrinalysisResult_mucusThreads() {
return $this->getUrinalysisResult_mucusThreads;
}
public function getUrinalysisResult_bacteria() {
return $this->getUrinalysisResult_bacteria;
}
public function getUrinalysisResult_remarks() {
return $this->getUrinalysisResult_remarks;
}
public function getUrinalysisResult_pathologist() {
return $this->getUrinalysisResult_pathologist;
}
public function getUrinalysisResult_username() {
return $this->getUrinalysisResult_username;
}
public function getUrinalysisResult_others() {
return $this->getUrinalysisResult_others;
}
public function getUrinalysisResult_dateResult() {
return $this->getUrinalysisResult_dateResult;
}



public function getUrinalysisResult($itemNo,$registrationNo) { //check kung meron pang pde Lagay sa phic 

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


$result = mysql_query("SELECT * from core2_laboratory_urinalysis where itemNo = '$itemNo' and registrationNo = '$registrationNo' ");

while($row = mysql_fetch_array($result))
  {
$this->getUrinalysisResult_color = $row['color'];
$this->getUrinalysisResult_appearance = $row['appearance'];
$this->getUrinalysisResult_specificGravity = $row['specificGravity'];
$this->getUrinalysisResult_reaction = $row['reaction'];
$this->getUrinalysisResult_albumin = $row['albumin'];
$this->getUrinalysisResult_sugar = $row['sugar'];
$this->getUrinalysisResult_pusCells = $row['pusCells'];
$this->getUrinalysisResult_rbcMicroscopic = $row['rbcMicroscopic'];
$this->getUrinalysisResult_hyalineCast = $row['hyalineCast'];
$this->getUrinalysisResult_fineGranular = $row['fineGranular'];
$this->getUrinalysisResult_coarseGranular = $row['coarseGranular'];
$this->getUrinalysisResult_wbc = $row['wbc'];
$this->getUrinalysisResult_rbcCast = $row['rbcCast'];
$this->getUrinalysisResult_uricAcid = $row['uricAcid'];
$this->getUrinalysisResult_calciumOxalate = $row['calciumOxalate'];
$this->getUrinalysisResult_amorphousUrates = $row['amorphousUrates'];
$this->getUrinalysisResult_amorphousPhosphates = $row['amorphousPhosphates'];
$this->getUrinalysisResult_epithelialCells = $row['epithelialCells'];
$this->getUrinalysisResult_mucusThreads = $row['mucusThreads'];
$this->getUrinalysisResult_bacteria = $row['bacteria'];
$this->getUrinalysisResult_remarks = $row['remarks'];
$this->getUrinalysisResult_pathologist = $row['pathologist'];
$this->getUrinalysisResult_username = $row['medtech']; 
$this->getUrinalysisResult_others = $row['others'];
$this->getUrinalysisResult_dateResult = $row['dateResult'];
 }


}





public $getFecalysisResult_color;
public $getFecalysisResult_consistency;
public $getFecalysisResult_ascaris;
public $getFecalysisResult_trichiuris;
public $getFecalysisResult_hookWorm;
public $getFecalysisResult_bistolyticaCyst;
public $getFecalysisResult_bistolyticaTrophozoite;
public $getFecalysisResult_coliCyst;
public $getFecalysisResult_coliTrophozoite;
public $getFecalysisResult_pussCells;
public $getFecalysisResult_redBloodCells;
public $getFecalysisResult_bacteria;
public $getFecalysisResult_fatGlobules;
public $getFecalysisResult_remarks;
public $getFecalysisResult_pathologist;
public $getFecalysisResult_username;
public $getFecalysisResult_dateResult;

public function getFecalysisResult_color() {
return $this->getFecalysisResult_color;
}
public function getFecalysisResult_consistency() {
return $this->getFecalysisResult_consistency;
}
public function getFecalysisResult_ascaris() {
return $this->getFecalysisResult_ascaris;
}
public function getFecalysisResult_trichiuris() {
return $this->getFecalysisResult_trichiuris;
}
public function getFecalysisResult_hookWorm() {
return $this->getFecalysisResult_hookWorm;
}
public function getFecalysisResult_bistolyticaCyst() {
return $this->getFecalysisResult_bistolyticaCyst;
}
public function getFecalysisResult_bistolyticaTrophozoite() {
return $this->getFecalysisResult_bistolyticaTrophozoite;
}
public function getFecalysisResult_coliCyst() {
return $this->getFecalysisResult_coliCyst;
}
public function getFecalysisResult_coliTrophozoite() {
return $this->getFecalysisResult_coliTrophozoite;
}
public function getFecalysisResult_pusCells() {
return $this->getFecalysisResult_pussCells;
}
public function getFecalysisResult_redBloodCells() {
return $this->getFecalysisResult_redBloodCells;
}
public function getFecalysisResult_bacteria() {
return $this->getFecalysisResult_bacteria;
}
public function getFecalysisResult_fatGlobules() {
return $this->getFecalysisResult_fatGlobules;
}
public function getFecalysisResult_remarks() {
return $this->getFecalysisResult_remarks;
}
public function getFecalysisResult_pathologist() {
return $this->getFecalysisResult_pathologist;
}
public function getFecalysisResult_username() {
return $this->getFecalysisResult_username;
}
public function getFecalysisResult_dateResult() {
return $this->getFecalysisResult_dateResult;
}

public function getFecalysisResult($itemNo,$registrationNo) { //check kung meron pang pde Lagay sa phic 

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


$result = mysql_query("SELECT * from core2_laboratory_fecalysis where itemNo = '$itemNo' and registrationNo = '$registrationNo' ");

while($row = mysql_fetch_array($result))
  {
$this->getFecalysisResult_color = $row['color'];
$this->getFecalysisResult_consistency = $row['consistency'];
$this->getFecalysisResult_ascaris = $row['ascaris'];
$this->getFecalysisResult_trichiuris = $row['trichiuris'];
$this->getFecalysisResult_hookWorm = $row['hookWorm'];
$this->getFecalysisResult_bistolyticaCyst = $row['bistolyticaCyst'];
$this->getFecalysisResult_bistolyticaTrophozoite = $row['bistolyticaTrophozite'];
$this->getFecalysisResult_coliCyst = $row['coliCyst'];
$this->getFecalysisResult_coliTrophozoite = $row['coliTrophozite'];
$this->getFecalysisResult_pussCells = $row['pusCells'];
$this->getFecalysisResult_redBloodCells = $row['redBloodCells'];
$this->getFecalysisResult_bacteria = $row['bacteria'];
$this->getFecalysisResult_fatGlobules = $row['fatGlobules'];
$this->getFecalysisResult_remarks = $row['remarks'];
$this->getFecalysisResult_pathologist = $row['pathologist'];
$this->getFecalysisResult_username = $row['medtech'];
$this->getFecalysisResult_dateResult = $row['dateResult'];
  }



}


public $getChemistryResult_fbs;
public $getChemistryResult_creatinine;
public $getChemistryResult_uricAcid;
public $getChemistryResult_cholesterol;
public $getChemistryResult_triglycerides;
public $getChemistryResult_hdl;
public $getChemistryResult_ldl;
public $getChemistryResult_sgpt;
public $getChemistryResult_sodium;
public $getChemistryResult_potassium;
public $getChemistryResult_calcium;
public $getChemistryResult_chloride;
public $getChemistryResult_pathologist;
public $getChemistryResult_username;
public $getChemistryResult_resultDate;
public $getChemistryResult_ionizedCalcium;


public function getChemistryResult_fbs() {
return $this->getChemistryResult_fbs;
}
public function getChemistryResult_creatinine() {
return $this->getChemistryResult_creatinine;
}
public function getChemistryResult_uricAcid() {
return $this->getChemistryResult_uricAcid;
}
public function getChemistryResult_cholesterol() {
return $this->getChemistryResult_cholesterol;
}
public function getChemistryResult_triglycerides() {
return $this->getChemistryResult_triglycerides;
}
public function getChemistryResult_hdl() {
return $this->getChemistryResult_hdl;
}
public function getChemistryResult_ldl() {
return $this->getChemistryResult_ldl;
}
public function getChemistryResult_sgpt() {
return $this->getChemistryResult_sgpt;
}
public function getChemistryResult_sodium() {
return $this->getChemistryResult_sodium;
}
public function getChemistryResult_potassium() {
return $this->getChemistryResult_potassium;
}
public function getChemistryResult_calcium() {
return $this->getChemistryResult_calcium;
}
public function getChemistryResult_chloride() {
return $this->getChemistryResult_chloride;
}
public function getChemistryResult_pathologist() {
return $this->getChemistryResult_pathologist;
}
public function getChemistryResult_username() {
return $this->getChemistryResult_username;
}
public function getChemistryResult_resultDate() {
return $this->getChemistryResult_resultDate;
}
public function getChemistryResult_ionizedCalcium() {
return $this->getChemistryResult_ionizedCalcium;
}


public function getChemistryResult($itemNo,$registrationNo) { //check kung meron pang pde Lagay sa phic 

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


$result = mysql_query("SELECT * from core2_laboratory_chemistry where itemNo = '$itemNo' and registrationNo = '$registrationNo' ");

while($row = mysql_fetch_array($result))
  {
$this->getChemistryResult_fbs = $row['fbs'];
$this->getChemistryResult_creatinine = $row['creatinine'];
$this->getChemistryResult_uricAcid = $row['uricAcid'];
$this->getChemistryResult_cholesterol = $row['cholesterol'];
$this->getChemistryResult_triglycerides = $row['triglycerides'];
$this->getChemistryResult_hdl = $row['hdl'];
$this->getChemistryResult_ldl = $row['ldl'];
$this->getChemistryResult_sgpt = $row['sgpt'];
$this->getChemistryResult_sodium = $row['sodium'];
$this->getChemistryResult_potassium = $row['potassium'];
$this->getChemistryResult_calcium = $row['calcium'];
$this->getChemistryResult_chloride = $row['chloride'];
$this->getChemistryResult_pathologist = $row['pathologist'];
$this->getChemistryResult_username = $row['medtech'];
$this->getChemistryResult_resultDate = $row['dateResult'];
$this->getChemistryResult_ionizedCalcium = $row['ionizedCalcium'];  
}



}



public $getSerologyResult_hepab;
public $getSerologyResult_syphilis;
public $getSerologyResult_typhidot;
public $getSerologyResult_hpylori;
public $getSerologyResult_pathologist;
public $getSerologyResult_username;
public $getSerologyResult_dateResult;

public function getSerologyResult_hepab() {
return $this->getSerologyResult_hepab;
}
public function getSerologyResult_syphilis() {
return $this->getSerologyResult_syphilis;
}
public function getSerologyResult_typhidot() {
return $this->getSerologyResult_typhidot;
}
public function getSerologyResult_hpylori() {
return $this->getSerologyResult_hpylori;
}
public function getSerologyResult_pathologist() {
return $this->getSerologyResult_pathologist;
}
public function getSerologyResult_username() {
return $this->getSerologyResult_username;
}
public function getSerologyResult_dateResult() {
return $this->getSerologyResult_dateResult;
}


public function getSerologyResult($itemNo,$registrationNo) { //check kung meron pang pde Lagay sa phic 

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


$result = mysql_query("SELECT * from core2_laboratory_serology where itemNo = '$itemNo' and registrationNo = '$registrationNo' ");

while($row = mysql_fetch_array($result))
  {
$this->getSerologyResult_hepab = $row['hepab'];
$this->getSerologyResult_syphilis = $row['syphilis'];
$this->getSerologyResult_typhidot = $row['typhidot'];
$this->getSerologyResult_hpylori = $row['hpylori'];  
$this->getSerologyResult_pathologist = $row['pathologist'];
$this->getSerologyResult_username = $row['medtech'];
$this->getSerologyResult_dateResult = $row['dateResult'];
}


}


public $getCrossMathchingResult_registrationNo;
public $getCrossMathchingResult_itemNo;
public $getCrossMathchingResult_pathologist;
public $getCrossMathchingResult_medtech;
public $getCrossMathchingResult_examinationDesired;
public $getCrossMathchingResult_donor1;
public $getCrossMathchingResult_dateCollected1;
public $getCrossMathchingResult_expiryDate1;
public $getCrossMathchingResult_retyping1;
public $getCrossMathchingResult_crossMatching1;
public $getCrossMathchingResult_donor2;
public $getCrossMathchingResult_dateCollected2;
public $getCrossMathchingResult_expiryDate2;
public $getCrossMathchingResult_retyping2;
public $getCrossMathchingResult_crossMatching2;
public $getCrossMathchingResult_donor3;
public $getCrossMathchingResult_dateCollected3;
public $getCrossMathchingResult_expiryDate3;
public $getCrossMathchingResult_retyping3;
public $getCrossMathchingResult_crossMatching3;
public $getCrossMathchingResult_donor4;
public $getCrossMathchingResult_dateCollected4;
public $getCrossMathchingResult_expiryDate4;
public $getCrossMathchingResult_retyping4;
public $getCrossMathchingResult_crossMatching4;
public $getCrossMathchingResult_dateResult;


public function getCrossMatchingResult_registrationNo() {
return $this->getCrossMathchingResult_registrationNo;
}
public function getCrossMathcingResult_itemNo() {
return $this->getCrossMathchingResult_itemNo;
}
public function getCrossMatchingResult_pathologist() {
return $this->getCrossMathchingResult_pathologist;
}
public function getCrossMatchingResult_medtech() {
return $this->getCrossMathchingResult_medtech;
}
public function getCrossMatchingResult_examinationDesired() {
return $this->getCrossMathchingResult_examinationDesired;
}
public function getCrossMatchingResult_donor1() {
return $this->getCrossMathchingResult_donor1;
}
public function getCrossMatchingResult_dateCollected1() {
return $this->getCrossMathchingResult_dateCollected1;
}
public function getCrossMatchingResult_expiryDate1() {
return $this->getCrossMathchingResult_expiryDate1;
}
public function getCrossMatchingResult_retyping1() {
return $this->getCrossMathchingResult_retyping1;
}
public function getCrossMatchingResult_crossMatching1() {
return $this->getCrossMathchingResult_crossMatching1;
}


public function getCrossMatchingResult_donor2() {
return $this->getCrossMathchingResult_donor2;
}
public function getCrossMatchingResult_dateCollected2() {
return $this->getCrossMathchingResult_dateCollected2;
}
public function getCrossMatchingResult_expiryDate2() {
return $this->getCrossMathchingResult_expiryDate2;
}
public function getCrossMatchingResult_retyping2() {
return $this->getCrossMathchingResult_retyping2;
}
public function getCrossMatchingResult_crossMatching2() {
return $this->getCrossMathchingResult_crossMatching2;
}

public function getCrossMatchingResult_donor3() {
return $this->getCrossMathchingResult_donor3;
}
public function getCrossMatchingResult_dateCollected3() {
return $this->getCrossMathchingResult_dateCollected3;
}
public function getCrossMatchingResult_expiryDate3() {
return $this->getCrossMathchingResult_expiryDate3;
}
public function getCrossMatchingResult_retyping3() {
return $this->getCrossMathchingResult_retyping3;
}
public function getCrossMatchingResult_crossMatching3() {
return $this->getCrossMathchingResult_crossMatching3;
}



public function getCrossMatchingResult_donor4() {
return $this->getCrossMathchingResult_donor4;
}
public function getCrossMatchingResult_dateCollected4() {
return $this->getCrossMathchingResult_dateCollected4;
}
public function getCrossMatchingResult_expiryDate4() {
return $this->getCrossMathchingResult_expiryDate4;
}
public function getCrossMatchingResult_retyping4() {
return $this->getCrossMathchingResult_retyping4;
}
public function getCrossMatchingResult_crossMatching4() {
return $this->getCrossMathchingResult_crossMatching4;
}

public function getCrossMatchingResult_dateResult() {
return $this->getCrossMathchingResult_dateResult;
}

public function getCrossMatchingResult($itemNo,$registrationNo) { //check kung meron pang pde Lagay sa phic 

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);


$result = mysql_query("SELECT * from core2_laboratory_crossMatching where itemNo = '$itemNo' and registrationNo = '$registrationNo' ");

while($row = mysql_fetch_array($result))
  {
$this->getCrossMatchingResult_registrationNo = $row['registrationNo'];
$this->getCrossMathchingResult_itemNo = $row['itemNo'];
$this->getCrossMathchingResult_pathologist = $row['pathologist'];
$this->getCrossMathchingResult_medtech = $row['medtech'];
$this->getCrossMathchingResult_examinationDesired = $row['examinationDesired'];


$this->getCrossMathchingResult_donor1 = $row['donor1'];
$this->getCrossMathchingResult_dateCollected1 = $row['dateCollected1'];
$this->getCrossMathchingResult_expiryDate1 = $row['expiryDate1'];
$this->getCrossMathchingResult_retyping1 = $row['retyping1'];
$this->getCrossMathchingResult_crossMatching1 = $row['crossMatching1'];

$this->getCrossMathchingResult_donor2 = $row['donor2'];
$this->getCrossMathchingResult_dateCollected2 = $row['dateCollected2'];
$this->getCrossMathchingResult_expiryDate2 = $row['expiryDate2'];
$this->getCrossMathchingResult_retyping2 = $row['retyping2'];
$this->getCrossMathchingResult_crossMatching2 = $row['crossMatching2'];

$this->getCrossMathchingResult_donor3 = $row['donor3'];
$this->getCrossMathchingResult_dateCollected3 = $row['dateCollected3'];
$this->getCrossMathchingResult_expiryDate3 = $row['expiryDate3'];
$this->getCrossMathchingResult_retyping3 = $row['retyping3'];
$this->getCrossMathchingResult_crossMatching3 = $row['crossMatching3'];

$this->getCrossMathchingResult_donor4 = $row['donor4'];
$this->getCrossMathchingResult_dateCollected4 = $row['dateCollected4'];
$this->getCrossMathchingResult_expiryDate4 = $row['expiryDate4'];
$this->getCrossMathchingResult_retyping4 = $row['retyping4'];
$this->getCrossMathchingResult_crossMatching4 = $row['crossMatching4'];

$this->getCrossMathchingResult_dateResult = $row['dateResult'];

}


}






public function addElectrolytes($registrationNo,$itemNo,$pathologist,$medtech,$sodium,$potassium,$chloride,$ionizedCalcium,$totalCalcium) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO pagadian_electrolytes (registrationNo,itemNo,pathologist,medtech,sodium,potassium,chloride,ionizedCalcium,totalCalcium)
VALUES
('$registrationNo','$itemNo','$pathologist','$medtech','$sodium','$potassium','$chloride','$ionizedCalcium','$totalCalcium')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

/*
echo "<script type='text/javascript' >";
echo "alert('$description was Successfully Added to the List of Charges in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addCharges.php?module=$category&username=$username '";
echo "</script>";
*/


mysql_close($con);

}







public function addMiscellaneous($registrationNo,$itemNo,$pathologist,$medtech,$examName,$examResult) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO pagadian_miscellaneous (registrationNo,itemNo,pathologist,medtech,examName,examResult)
VALUES
('$registrationNo','$itemNo','$pathologist','$medtech','$examName','".mysql_real_escape_string($examResult)."')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

/*
echo "<script type='text/javascript' >";
echo "alert('$description was Successfully Added to the List of Charges in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addCharges.php?module=$category&username=$username '";
echo "</script>";
*/


mysql_close($con);

}




public function addMiniVidas($registrationNo,$itemNo,$pathologist,$medtech,$t3,$t4,$ft3,$ft4,$tsh,$havIgm,$antiHbs,$hbcIgm,$hbeag,$antiHbeag,$tpsa) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO pagadian_miniVidas (registrationNo,itemNo,pathologist,medtech,t3,t4,ft3,ft4,tsh,havIgm,antiHBS,hbcIgm,HBeAg,antiHbeag,tpsa)
VALUES
('$registrationNo','$itemNo','$pathologist','$medtech','$t3','$t4','$ft3','$ft4','$tsh','$havIgm','$antiHbs','$hbcIgm','$hbeag','$antiHbeag','$tpsa')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

/*
echo "<script type='text/javascript' >";
echo "alert('$description was Successfully Added to the List of Charges in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addCharges.php?module=$category&username=$username '";
echo "</script>";
*/


mysql_close($con);

}




public function addTyphoid($registrationNo,$itemNo,$pathologist,$medtech,$result) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO pagadian_typhoid (registrationNo,itemNo,pathologist,medtech,result)
VALUES
('$registrationNo','$itemNo','$pathologist','$medtech','$result')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

/*
echo "<script type='text/javascript' >";
echo "alert('$description was Successfully Added to the List of Charges in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addCharges.php?module=$category&username=$username '";
echo "</script>";
*/


mysql_close($con);

}




public function addLaboratoryTemplate($title,$template) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$sql="INSERT INTO labResultList (title,template)
VALUES
('".mysql_real_escape_String($title)."','".mysql_real_escape_string($template)."')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

/*
echo "<script type='text/javascript' >";
echo "alert('$description was Successfully Added to the List of Charges in $category');";
echo  "window.location='http://".$this->getMyUrl()."/Maintenance/addCharges.php?module=$category&username=$username '";
echo "</script>";
*/


mysql_close($con);

}





}



?>
