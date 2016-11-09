<?php

class soaGenerator extends database {

public $myHost = 'localhost';
public $username = 'root';
public $password = 'october112016';
public $database = 'Coconut';



//********** MEDICINE ********************//


public $medicine_actual;
public $medicine_excess;
public $medicine_phic;
public $medicine_company;

public function medicine_actual() {
return $this->medicine_actual;
}
public function medicine_excess() {
return $this->medicine_excess;
}
public function medicine_phic() {
return $this->medicine_phic;
}
public function medicine_company() {
return $this->medicine_company;
}

public function medicine($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(total) as actualMed,sum(phic) as phicMed,sum(company) as companyMed,sum(cashUnpaid) as excessMed FROM patientCharges where (registrationNo = '$registrationNo' and title='MEDICINE' and status = 'UNPAID' and departmentStatus like 'dispensedBy_%%%%' and chargesCode != 'MEDICINE') or ( registrationNo = '$registrationNo' and title='MEDICINE' and status = 'UNPAID' and chargesCode = 'MEDICINE' )  ");

while($row = mysql_fetch_array($result))
  {
$this->medicine_actual = $row['actualMed'];
$this->medicine_excess = $row['excessMed'];
$this->medicine_phic = $row['phicMed'];
$this->medicine_company = $row['companyMed'];
  }

mysql_close($con);


}


//*************** END OF MEDICINE ***********************//




//************** SUPPLIES ***********************//

public $supplies_actual;
public $supplies_excess;
public $supplies_phic;
public $supplies_company;

public function supplies_actual() {
return $this->supplies_actual;
}
public function supplies_excess() {
return $this->supplies_excess;
}
public function supplies_phic() {
return $this->supplies_phic;
}
public function supplies_company() {
return $this->supplies_company;
}

public function supplies($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(total) as actualSup,sum(cashUnpaid) as excessSup,sum(phic) as phicSup,sum(company) as companySup FROM patientCharges where registrationNo = '$registrationNo' and title='SUPPLIES' and status = 'UNPAID' and departmentStatus like 'dispensedBy_%%%%%' ");

while($row = mysql_fetch_array($result))
  {
$this->supplies_actual = $row['actualSup'];
$this->supplies_excess = $row['excessSup'];
$this->supplies_phic = $row['phicSup'];
$this->supplies_company = $row['companySup'];
  }

mysql_close($con);


}

//************** END OF SUPPLIES **********************//






//************ LABORATORY **********************//


public $laboratory_actual;
public $laboratory_excess;
public $laboratory_phic;
public $laboratory_company;

public function laboratory_actual() {
return $this->laboratory_actual;
}
public function laboratory_excess() {
return $this->laboratory_excess;
}
public function laboratory_phic() {
return $this->laboratory_phic;
}
public function laboratory_company() {
return $this->laboratory_company;
}

public function laboratory($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(total) as actualLab,sum(cashUnpaid) as excessLab,sum(phic) as phicLab,sum(company) as companyLab FROM patientCharges where registrationNo = '$registrationNo' and title='LABORATORY' and status = 'UNPAID' ");

while($row = mysql_fetch_array($result))
  {
$this->laboratory_actual = $row['actualLab'];
$this->laboratory_excess = $row['excessLab'];
$this->laboratory_phic = $row['phicLab'];
$this->laboratory_company = $row['companyLab'];
  }

mysql_close($con);


}


//*********** END OF LABORATORY *********************//





//***************** RADIOLOGY *********************//


public $radiology_actual;
public $radiology_excess;
public $radiology_phic;
public $radiology_company;

public function radiology_actual() {
return $this->radiology_actual;
}
public function radiology_excess() {
return $this->radiology_excess;
}
public function radiology_phic() {
return $this->radiology_phic;
}
public function radiology_company() {
return $this->radiology_company;
}


public function radiology($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(total) as actualRad,sum(cashUnpaid) as excessRad,sum(phic) as phicRad,sum(company) as companyRad FROM patientCharges where registrationNo = '$registrationNo' and title='RADIOLOGY' and status = 'UNPAID' ");

while($row = mysql_fetch_array($result))
  {
$this->radiology_actual = $row['actualRad'];
$this->radiology_excess = $row['excessRad'];
$this->radiology_phic = $row['phicRad'];
$this->radiology_company = $row['companyRad'];
  }

mysql_close($con);


}





//*************** END OF RADIOLOGY *********************//








//***************** ECG *********************//


public $ecg_actual;
public $ecg_excess;
public $ecg_phic;
public $ecg_company;

public function ecg_actual() {
return $this->ecg_actual;
}
public function ecg_excess() {
return $this->ecg_excess;
}
public function ecg_phic() {
return $this->ecg_phic;
}
public function ecg_company() {
return $this->ecg_company;
}


public function ecg($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(total) as actualECG,sum(cashUnpaid) as excessECG,sum(phic) as phicECG,sum(company) as companyECG FROM patientCharges where registrationNo = '$registrationNo' and title='ECG' and status = 'UNPAID' ");

while($row = mysql_fetch_array($result))
  {
$this->ecg_actual = $row['actualECG'];
$this->ecg_excess = $row['excessECG'];
$this->ecg_phic = $row['phicECG'];
$this->ecg_company = $row['companyECG'];
  }

mysql_close($con);


}





//*************** END OF ECG *********************//




//***************** 2D ECHO *********************//


public $echo2d_actual;
public $echo2d_excess;
public $echo2d_phic;
public $echo2d_company;

public function echo2d_actual() {
return $this->echo2d_actual;
}
public function echo2d_excess() {
return $this->echo2d_excess;
}
public function echo2d_phic() {
return $this->echo2d_phic;
}
public function echo2d_company() {
return $this->echo2d_company;
}


public function echo2d($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(total) as actual2d,sum(cashUnpaid) as excess2d,sum(phic) as phic2d,sum(company) as company2d FROM patientCharges where registrationNo = '$registrationNo' and title='2D_ECHO' and status = 'UNPAID' ");

while($row = mysql_fetch_array($result))
  {
$this->echo2d_actual = $row['actual2d'];
$this->echo2d_excess = $row['excess2d'];
$this->echo2d_phic = $row['phic2d'];
$this->echo2d_company = $row['company2d'];
  }

mysql_close($con);


}





//*************** END OF 2D ECHO *********************//




//******************* NURSING-CHARGES ********************//


public $nursingCharges_actual;
public $nursingCharges_excess;
public $nursingCharges_phic;
public $nursingCharges_company;

public function nursingCharges_actual() {
return $this->nursingCharges_actual;
}
public function nursingCharges_excess() {
return $this->nursingCharges_excess;
}
public function nursingCharges_phic() {
return $this->nursingCharges_phic;
}
public function nursingCharges_company() {
return $this->nursingCharges_company;
}

public function nursingCharges($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(total) as actualNS,sum(cashUnpaid) as excessNS,sum(phic) as phicNS,sum(company) as companyNS FROM patientCharges where registrationNo = '$registrationNo' and title='NURSING-CHARGES' and status = 'UNPAID' ");

while($row = mysql_fetch_array($result))
  {
$this->nursingCharges_actual = $row['actualNS'];
$this->nursingCharges_excess = $row['excessNS'];
$this->nursingCharges_phic = $row['phicNS'];
$this->nursingCharges_company = $row['companyNS'];
  }

mysql_close($con);


}



//************** END OF NURSING-CHARGES *********************//





// ****************** MISCELLANEOUS *******************//

public $misc_actual;
public $misc_excess;
public $misc_phic;
public $misc_company;

public function misc_actual() {
return $this->misc_actual;
}
public function misc_excess() {
return $this->misc_excess;
}
public function misc_phic() {
return $this->misc_phic;
}
public function misc_company() {
return $this->misc_company;
}


public function misc($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(total) as actualMisc,sum(cashUnpaid) as excessMisc,sum(phic) as phicMisc,sum(company) as companyMisc FROM patientCharges where registrationNo = '$registrationNo' and title='MISCELLANEOUS' and status = 'UNPAID' ");

while($row = mysql_fetch_array($result))
  {
$this->misc_actual = $row['actualMisc'];
$this->misc_excess = $row['excessMisc'];
$this->misc_phic = $row['phicMisc'];
$this->misc_company = $row['companyMisc'];
  }

mysql_close($con);


}

//**************** END OF MISCELLANEOUS *********************//



///*************** OTHERS *********************** ///

public $others_actual;
public $others_excess;
public $others_phic;
public $others_company;

public function others_actual() {
return $this->others_actual;
}
public function others_excess() {
return $this->others_excess;
}
public function others_phic() {
return $this->others_phic;
}
public function others_company() {
return $this->others_company;
}


public function others($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(total) as actualOthers,sum(cashUnpaid) as excessOthers,sum(phic) as phicOthers,sum(company) as companyOthers FROM patientCharges where registrationNo = '$registrationNo' and title='OTHERS' and status ='UNPAID' ");

while($row = mysql_fetch_array($result))
  {
$this->others_actual = $row['actualOthers'];
$this->others_excess = $row['excessOthers'];
$this->others_phic = $row['phicOthers'];
$this->others_company = $row['companyOthers'];
  }

mysql_close($con);


}


//********* END OF OTHERS ***********************//




//************** OR/DR/ER FEE *********************//

public $or_actual;
public $or_excess;
public $or_phic;
public $or_company;

public function or_actual() {
return $this->or_actual;
}
public function or_excess() {
return $this->or_excess;
}
public function or_phic() {
return $this->or_phic;
}
public function or_company() {
return $this->or_company;
}

public function or_dr($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(total) as actualOR,sum(cashUnpaid) as excessOR,sum(phic) as phicOR,sum(company) as companyOR FROM patientCharges where registrationNo = '$registrationNo' and title='OR/DR/ER FEE' and status = 'UNPAID' ");

while($row = mysql_fetch_array($result))
  {
$this->or_actual = $row['actualOR'];
$this->or_excess = $row['excessOR'];
$this->or_phic = $row['phicOR'];
$this->or_company = $row['companyOR'];
  }

mysql_close($con);


}

//*********** END OF OR/DR/ER FEE **********************//



//**************** ROOM **************************//


public $room_actual;
public $room_excess;
public $room_phic;
public $room_company;

public function room_actual() {
return $this->room_actual;
}
public function room_excess() {
return $this->room_excess;
}
public function room_phic() {
return $this->room_phic;
}
public function room_company() {
return $this->room_company;
}


public function room($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(total) as actualRoom,sum(cashUnpaid) as excessRoom,sum(phic) as phicRoom,sum(company) as companyRoom FROM patientCharges where registrationNo = '$registrationNo' and title='Room And Board' and (status = 'UNPAID' or status = 'Discharged') ");

while($row = mysql_fetch_array($result))
  {
$this->room_actual = $row['actualRoom'];
$this->room_excess = $row['excessRoom'];
$this->room_phic = $row['phicRoom'];
$this->room_company = $row['companyRoom'];
  }

mysql_close($con);


}


//***************** END OF ROOM *********************//




//************** PF **********************//

public $pf_actual;
public $pf_excess;
public $pf_phic;
public $pf_company;

public function pf_actual() {
return $this->pf_actual;
}
public function pf_excess() {
return $this->pf_excess;
}
public function pf_phic() {
return $this->pf_phic;
}
public function pf_company() {
return $this->pf_company;
}

public function PF($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(total) as actualPF,sum(cashUnpaid) as excessPF,sum(company) as companyPF,sum(phic) as phicPF FROM patientCharges where registrationNo = '$registrationNo' and title='PROFESSIONAL FEE' ");

while($row = mysql_fetch_array($result))
  {
$this->pf_actual = $row['actualPF'];
$this->pf_excess = $row['excessPF'];
$this->pf_phic = $row['phicPF'];
$this->pf_company = $row['companyPF'];
  }

mysql_close($con);


}


//*********** END OF PF ********************//





//************** REHAB **********************//

public $rehab_actual;
public $rehab_excess;
public $rehab_phic;
public $rehab_company;

public function rehab_actual() {
return $this->rehab_actual;
}
public function rehab_excess() {
return $this->rehab_excess;
}
public function rehab_phic() {
return $this->rehab_phic;
}
public function rehab_company() {
return $this->rehab_company;
}

public function rehab($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(total) as actualRehab,sum(cashUnpaid) as excessRehab,sum(company) as companyRehab,sum(phic) as phicRehab FROM patientCharges where registrationNo = '$registrationNo' and title='REHAB' and status = 'UNPAID' ");

while($row = mysql_fetch_array($result))
  {
$this->rehab_actual = $row['actualRehab'];
$this->rehab_excess = $row['excessRehab'];
$this->rehab_phic = $row['phicRehab'];
$this->rehab_company = $row['companyRehab'];
  }

mysql_close($con);


}


//*********** END OF REHAB ********************//



//************** OXYGEN **********************//

public $oxygen_actual;
public $oxygen_excess;
public $oxygen_phic;
public $oxygen_company;

public function oxygen_actual() {
return $this->oxygen_actual;
}
public function oxygen_excess() {
return $this->oxygen_excess;
}
public function oxygen_phic() {
return $this->oxygen_phic;
}
public function oxygen_company() {
return $this->oxygen_company;
}

public function oxygen($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(total) as actualOxygen,sum(cashUnpaid) as excessOxygen,sum(company) as companyOxygen,sum(phic) as phicOxygen FROM patientCharges where registrationNo = '$registrationNo' and title='OXYGEN' and status = 'UNPAID' ");

while($row = mysql_fetch_array($result))
  {
$this->oxygen_actual = $row['actualOxygen'];
$this->oxygen_excess = $row['excessOxygen'];
$this->oxygen_phic = $row['phicOxygen'];
$this->oxygen_company = $row['companyOxygen'];
  }

mysql_close($con);


}


//*********** END OF OXYGEN********************//








//************** NBS **********************//

public $nbs_actual;
public $nbs_excess;
public $nbs_phic;
public $nbs_company;

public function nbs_actual() {
return $this->nbs_actual;
}
public function nbs_excess() {
return $this->nbs_excess;
}
public function nbs_phic() {
return $this->nbs_phic;
}
public function nbs_company() {
return $this->nbs_company;
}

public function nbs($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(total) as actualNBS,sum(cashUnpaid) as excessNBS,sum(company) as companyNBS,sum(phic) as phicNBS FROM patientCharges where registrationNo = '$registrationNo' and title='NBS' and status = 'UNPAID' ");

while($row = mysql_fetch_array($result))
  {
$this->nbs_actual = $row['actualNBS'];
$this->nbs_excess = $row['excessNBS'];
$this->nbs_phic = $row['phicNBS'];
$this->nbs_company = $row['companyNBS'];
  }

mysql_close($con);


}


//*********** END OF NBS********************//




//************** CARDIAC **********************//

public $cardiac_actual;
public $cardiac_excess;
public $cardiac_phic;
public $cardiac_company;

public function cardiac_actual() {
return $this->cardiac_actual;
}
public function cardiac_excess() {
return $this->cardiac_excess;
}
public function cardiac_phic() {
return $this->cardiac_phic;
}
public function cardiac_company() {
return $this->cardiac_company;
}

public function cardiac($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(total) as actualCardiac,sum(cashUnpaid) as excessCardiac,sum(company) as companyCardiac,sum(phic) as phicCardiac FROM patientCharges where registrationNo = '$registrationNo' and title='CARDIAC' and status = 'UNPAID' ");

while($row = mysql_fetch_array($result))
  {
$this->cardiac_actual = $row['actualCardiac'];
$this->cardiac_excess = $row['excessCardiac'];
$this->cardiac_phic = $row['phicCardiac'];
$this->cardiac_company = $row['companyCardiac'];
  }

mysql_close($con);


}


//*********** END OF CARDIAC********************//




//************** BLOODBANK **********************//

public $bloodBank_actual;
public $bloodBank_excess;
public $bloodBank_phic;
public $bloodBank_company;

public function bloodBank_actual() {
return $this->bloodBank_actual;
}
public function bloodBank_excess() {
return $this->bloodBank_excess;
}
public function bloodBank_phic() {
return $this->bloodBank_phic;
}
public function bloodBank_company() {
return $this->bloodBank_company;
}

public function bloodBank($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(total) as actualBB,sum(cashUnpaid) as excessBB,sum(company) as companyBB,sum(phic) as phicBB FROM patientCharges where registrationNo = '$registrationNo' and title='BLOODBANK' and status = 'UNPAID' ");

while($row = mysql_fetch_array($result))
  {
$this->bloodBank_actual = $row['actualBB'];
$this->bloodBank_excess = $row['excessBB'];
$this->bloodBank_phic = $row['phicBB'];
$this->bloodBank_company = $row['companyBB'];
  }

mysql_close($con);


}


//*********** END OF BLOODBANK********************//





//************** VENTILATOR **********************//

public $ventilator_actual;
public $ventilator_excess;
public $ventilator_phic;
public $ventilator_company;

public function ventilator_actual() {
return $this->ventilator_actual;
}
public function ventilator_excess() {
return $this->ventilator_excess;
}
public function ventilator_phic() {
return $this->ventilator_phic;
}
public function ventilator_company() {
return $this->ventilator_company;
}

public function ventilator($registrationNo) {

$con = mysql_connect($this->myHost,$this->username,$this->password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->database, $con);

$result = mysql_query("SELECT sum(total) as actualVen,sum(cashUnpaid) as excessVen,sum(company) as companyVen,sum(phic) as phicVen FROM patientCharges where registrationNo = '$registrationNo' and title='VENTILATOR' and status = 'UNPAID' ");

while($row = mysql_fetch_array($result))
  {
$this->ventilator_actual = $row['actualVen'];
$this->ventilator_excess = $row['excessVen'];
$this->ventilator_phic = $row['phicVen'];
$this->ventilator_company = $row['companyVen'];
  }

mysql_close($con);


}


//*********** END OF VENTILATOR********************//



}

?>
