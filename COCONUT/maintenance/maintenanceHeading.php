<?php
include("../../myDatabase.php");
session_start();
$username = $_SESSION['username'];
$module = $_SESSION['module'];



$ro = new database();

if ( (!isset($username) && !isset($module)) ) {
header("Location:http://".$ro->getMyUrl()."/LOGINPAGE/module.php ");
}

?>

<html>
<head>

<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/flow/rickyCSS1.css" />
        <script type="text/javascript" src="http://<?php echo $ro->getMyUrl() ?>/Registration/menu/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="http://<?php echo $ro->getMyUrl() ?>/Registration/menu/jquery.fixedMenu.js"></script>
        <link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl();?>/Registration/menu/fixedMenu_style1.css" />

<?php

echo "
<script type='text/javascript'>

        $('document').ready(function(){
            $('.menu').fixedMenu();

        });


$('#breadcrumbs a').hover(
    function () {
        $(this).addClass('hover').children().addClass('hover');
        $(this).parent().prev().find('span.arrow:first').addClass('pre_hover');
    },
    function () {
        $(this).removeClass('hover').children().removeClass('hover');
        $(this).parent().prev().find('span.arrow:first').removeClass('pre_hover');
    }
);



body.onload=function() { history.go();  }
</script>

<style type='text/css'>
.txtBox {
	border: 1px solid #CCC;
	color: #999;
	height: 50px;
	width: 350px;
}
</style>

";

?>
</head>
<body>
<ol id="breadcrumbs">
        <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/initializeMaintenance.php"><font color=white>Home</font><span class="arrow"></span></a></li>
        <li><a href="#" class='odd'><font color=yellow><?php echo $module; ?></font><span class="arrow"></span></a></li>

    <li>&nbsp;&nbsp;</li>
</ol>


    <div class="menu">
        <ul>
            <li>
                <a href="#">Add New<span class="arrow"></span></a>
                
                <ul>
	                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/Maintenance/addCharges.php?username=<?php echo $username; ?>&module=LABORATORY" target="departmentX">Laboratory Charges</a></li>

		                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/Maintenance/addCharges.php?module=RADIOLOGY&username=<?php echo $username; ?>" target="departmentX">Radiology Charges</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/Maintenance/addCharges.php?module=NURSING-CHARGES&username=<?php echo $username; ?>" target="departmentX">Nursing Charges</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/Maintenance/addCharges.php?module=MISCELLANEOUS&username=<?php echo $username; ?>" target="departmentX">Miscellaneous</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/Maintenance/addCharges.php?module=OR/DR/ER Fee&username=<?php echo $username; ?>" target="departmentX">OR/DR/ER Fee</a></li>


<?php
//check kung nka activate ung rehab module [Activate execute rehab module] [Deactivate don't execute rehab] 
 if( $ro->selectNow("reportHeading","information","reportName","rehab") == "Activate" ) { ?>
<li><a href="http://<?php echo $ro->getMyUrl(); ?>/Maintenance/addCharges.php?module=REHAB&username=<?php echo $username; ?>" target="departmentX">Rehab Charges</a></li>
<?php } else { }?>

<?php
//check kung nka activate ung dialysis module [Activate execute dialysis module] [Deactivate don't execute dialysis] 
 if( $ro->selectNow("reportHeading","information","reportName","dialysis") == "Activate" ) { ?>
<li><a href="http://<?php echo $ro->getMyUrl(); ?>/Maintenance/addCharges.php?module=DIALYSIS&username=<?php echo $username; ?>" target="departmentX">Dialysis Charges</a></li>
<?php } else { }?>


<?php
//check kung nka activate ung NBS module [Activate execute NBS module] [Deactivate don't execute NBS] 
 if( $ro->selectNow("reportHeading","information","reportName","nbs") == "Activate" ) { ?>
<li><a href="http://<?php echo $ro->getMyUrl(); ?>/Maintenance/addCharges.php?module=NBS&username=<?php echo $username; ?>" target="departmentX">NBS Charges</a></li>
<?php } else { }?>

	
	                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/Maintenance/addCharges.php?module=OTHERS&username=<?php echo $username; ?>" target="departmentX">Other's</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/Maintenance/addPackage.php?module=PACKAGE&username=<?php echo $username; ?>" target="departmentX">Package</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/inventory/addInventory.php?username=<?php echo $username; ?>" target="departmentX">Medicine</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/inventory/addInventory_supplies.php?username=<?php echo $username; ?>" target="departmentX">Supplies</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Doctor/addNewDoctor.php?username=<?php echo $username; ?>" target="departmentX">Doctor</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Doctor/addNewDoctorService.php?username=<?php echo $username; ?>" target="departmentX">Doctor Service</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/Maintenance/addService.php?username=<?php echo $username; ?>" target="departmentX">Charges Service</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Company/addCompany.php?username=<?php echo $username; ?>" target="departmentX">Company</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/Maintenance/addUser.php?usernamez=<?php echo $username; ?>" target="departmentX">User</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/Maintenance/addBranch.php?usernamez=<?php echo $username; ?>" target="departmentX">Branch</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/philhealth/icdCode/addICD.php?username=<?php echo $username; ?>" target="departmentX">ICD Code</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/room/addRoom.php?username=<?php echo $username; ?>" target="departmentX">Room</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/floor/addFloor.php?username=<?php echo $username; ?>" target="departmentX">Floor</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/Maintenance/addSupplier.php?username=<?php echo $username; ?>" target="departmentX">Supplier</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/casetype/addCasetype.php" target="departmentX">Case Type</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/hospitalPackage/addPackage.php" target="departmentX">Package</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Laboratory/resultList/addResultForm.php" target="departmentX">Laboratory Template</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/availableMedicine/reOrder/reOrder_handler.php?username=<?php echo $username; ?>&inventoryFrom=PHARMACY" target="_blank">Order Form</a></li>

                </ul>
            </li>
            <li>
                <a href="#">Master File<span class="arrow"></span></a>
                <ul>
<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/charges.php?username=<?php echo $username; ?>&title=LABORATORY&show=All" target="departmentX">Laboratory Charges</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/charges.php?username=<?php echo $username; ?>&title=RADIOLOGY&show=All" target="departmentX">Radiology Charges</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/charges.php?username=<?php echo $username; ?>&title=NURSING-CHARGES&show=All" target="departmentX">Nursing Charges</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/charges.php?username=<?php echo $username; ?>&title=MISCELLANEOUS&show=All" target="departmentX">Miscellaneous Charges</a></li>


<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/charges.php?username=<?php echo $username; ?>&title=OR/DR/ER Fee&show=All" target="departmentX">OR/DR/ER Fee</a></li>

<?php
//execute rehab or not?
if( $ro->selectNow("reportHeading","information","reportName","rehab") == "Activate" ) {
?>
<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/charges.php?username=<?php echo $username; ?>&title=REHAB&show=All" target="departmentX">Rehab Charges</a></li>
<?php }else { } ?>

<?php
//execute dialysis or not?
if( $ro->selectNow("reportHeading","information","reportName","dialysis") == "Activate" ) {
?>
<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/charges.php?username=<?php echo $username; ?>&title=DIALYSIS&show=All" target="departmentX">Dialysis Charges</a></li>
<?php }else { } ?>


<?php
//execute nbs or not?
if( $ro->selectNow("reportHeading","information","reportName","nbs") == "Activate" ) {
?>
<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/charges.php?username=<?php echo $username; ?>&title=NBS&show=All" target="departmentX">NBS Charges</a></li>
<?php }else { } ?>



<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/charges.php?username=<?php echo $username; ?>&title=OTHERS&show=All" target="departmentX">Other's</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/package.php?username=<?php echo $username; ?>" target="departmentX">Package</a></li>


                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/inventory.php?username=<?php echo $username; ?>&inventoryType=medicine&branch=All&show=All" target='departmentX'>Medicine</a></li>
<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/inventory.php?username=<?php echo $username; ?>&inventoryType=supplies&branch=All&show=All" target='departmentX'>Supplies</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/inventory.php?username=<?php echo $username; ?>&inventoryType=PHARMACY&branch=All&show=All" target='departmentX'>Pharmacy</a></li>

 <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/inventory.php?username=<?php echo $username; ?>&inventoryType=Dialysis&branch=All&show=All" target='departmentX'>Dialysis</a></li>

 <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/inventory.php?username=<?php echo $username; ?>&inventoryType=Laboratory&branch=All&show=All" target='departmentX'>Laboratory</a></li>

 <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/inventory.php?username=<?php echo $username; ?>&inventoryType=2D ECHO&branch=All&show=All" target='departmentX'>2D ECHO</a></li>

 <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/inventory.php?username=<?php echo $username; ?>&inventoryType=PT&branch=All&show=All" target='departmentX'>Physical Therapy</a></li>

 <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/inventory.php?username=<?php echo $username; ?>&inventoryType=ICU&branch=All&show=All" target='departmentX'>ICU</a></li>

                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/inventory.php?username=<?php echo $username; ?>&inventoryType=CSR&branch=All&show=All" target='departmentX'>CSR</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/doctor.php?username=<?php echo $username; ?>&show=All" target='departmentX'>Doctor</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/doctorService.php?username=<?php echo $username; ?>&show=All" target='departmentX'>Doctor Service</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/chargesService.php?username=<?php echo $username; ?>&show=All&desc=" target='departmentX'>Charges Service</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/company.php?username=<?php echo $username; ?>&show=All" target='departmentX'>Company</a></li>
                    
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/branch.php?username=<?php echo $username; ?>&show=All" target='departmentX'>Branch</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/icdCode.php?username=<?php echo $username; ?>&desc=&show=All&protoType=maintenance&registrationNo=" target='departmentX'>ICD Code</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/diagnosticTimer/diagnosticTimer.php?usernamez=<?php echo $username; ?>" target="departmentX">Diagnostic Timer</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/percentage.php?username=<?php echo $username; ?>" target='departmentX'>Percentage</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/viewRoom.php?username=<?php echo $username; ?>&desc=&show=All" target='departmentX'>Room</a></li>
                  
 <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/floor.php?username=<?php echo $username; ?>&desc=&show=All" target='departmentX'>Floor</a></li>
 
 <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/availableMedicine/expiredMed.php?username=<?php echo $username; ?>" target='departmentX'>Expiration</a></li>

 <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Misc/misc.php?username=<?php echo $username; ?>" target='departmentX'>System Settings</a></li>

 <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/supplier.php?username=<?php echo $username; ?>" target='departmentX'>Supplier</a></li>

 <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/casetype/showCasetype.php?username=<?php echo $username; ?>" target='departmentX'>Case Type</a></li>

 <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/hospitalPackage/masterfile/packageMasterfile.php?username=<?php echo $username; ?>" target='departmentX'>Package</a></li>

 <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/criticalLevel.php?username=<?php echo $username; ?>" target='departmentX'>Re-Order List</a></li>


<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Laboratory/resultList/resultFormMasterfile.php" target='departmentX'>Laboratory Template</a></li>

                   <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/masterfile/patientRecord.php?username=<?php echo $username; ?>&desc=&show=All" target='departmentX'>Patient Record</a></li>

</ul>
</li>           
     

 <li>
                <a href="#">Search<span class="arrow"></span></a>
                <ul>
<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchCharges.php?username=<?php echo $username; ?>&title=LABORATORY&show=search" target="departmentX">Laboratory Charges</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchCharges.php?username=<?php echo $username; ?>&title=RADIOLOGY&show=search" target="departmentX">Radiology Charges</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchCharges.php?username=<?php echo $username; ?>&title=NURSING-CHARGES&show=search" target="departmentX">Nursing Charges</a></li>


<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchCharges.php?username=<?php echo $username; ?>&title=MISCELLANEOUS&show=search" target="departmentX">Miscellaneous</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchCharges.php?username=<?php echo $username; ?>&title=OR/DR/ER Fee&show=search" target="departmentX">OR/DR/ER Fee</a></li>

<?php
//execute rehab or not??
if( $ro->selectNow("reportHeading","information","reportName","rehab") == "Activate" ) {
?>
<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchCharges.php?username=<?php echo $username; ?>&title=REHAB&show=search" target="departmentX">Rehab Charges</a></li>
<?php }else { } ?>


<?php
//execute dialysis or not??
if( $ro->selectNow("reportHeading","information","reportName","dialysis") == "Activate" ) {
?>
<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchCharges.php?username=<?php echo $username; ?>&title=DIALYSIS&show=search" target="departmentX">Dialysis Charges</a></li>
<?php }else { } ?>


<?php
//execute nbs or not??
if( $ro->selectNow("reportHeading","information","reportName","nbs") == "Activate" ) {
?>
<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchCharges.php?username=<?php echo $username; ?>&title=NBS&show=search" target="departmentX">NBS Charges</a></li>
<?php }else { } ?>




<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchCharges.php?username=<?php echo $username; ?>&title=OTHERS&show=search" target="departmentX">Other's</a></li>

                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchInventory.php?username=<?php echo $username; ?>&inventoryType=medicine&branch=All&show=search" target='departmentX'>Medicine</a></li>
<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchInventory.php?username=<?php echo $username; ?>&inventoryType=supplies&branch=All&show=search" target='departmentX'>Supplies</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchInventory.php?username=<?php echo $username; ?>&inventoryType=PHARMACY&branch=All&show=search" target='departmentX'>Pharmacy</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchInventory.php?username=<?php echo $username; ?>&inventoryType=CSR&branch=All&show=search" target='departmentX'>CSR</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchDoctor.php?username=<?php echo $username; ?>&show=search" target='departmentX'>Doctor</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchDoctorService.php?username=<?php echo $username; ?>&show=search" target='departmentX'>Doctor Service</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchService.php?username=<?php echo $username; ?>&show=search" target='departmentX'>Charges Service</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchCompany.php?username=<?php echo $username; ?>&show=search" target='departmentX'>Company</a></li>
                    
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchBranch.php?username=<?php echo $username; ?>&show=search" target='departmentX'>Branch</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchICDcode.php?username=<?php echo $username; ?>&show=search&protoType=maintenance&registrationNo=" target='departmentX'>ICD Code</a></li>

                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchRoom.php?username=<?php echo $username; ?>&show=search" target='departmentX'>Room</a></li>

                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchFloor.php?username=<?php echo $username; ?>&show=search" target='departmentX'>Floor</a></li>

                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/currentPatient/manualSearch.php?username=<?php echo $username; ?>&show=search" target='departmentX'>Patient Manual Search</a></li>


                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchPatientRecord.php?username=<?php echo $username; ?>&show=search" target='departmentX'>Patient Record</a></li>


</ul>
</li>      

   
  <li>
 <a href="#">Medicine Per Branch<span class="arrow"></span></a>
 <ul>
<?php $ro->getMaintenanceBranch($username,"departmentX","medicine"); ?>
</li>
</ul>

  <li>
 <a href="#">Supplies Per Branch<span class="arrow"></span></a>
 <ul>
<?php $ro->getMaintenanceBranch($username,"departmentX","supplies"); ?>
</li>
</ul>


  <li>
 <a href="#">CSR Per Branch<span class="arrow"></span></a>
 <ul>
<?php $ro->getMaintenanceBranch($username,"departmentX","CSR"); ?>
</li>
</ul>


  <li>
 <a href="#">Pharmacy Per Branch<span class="arrow"></span></a>
 <ul>
<?php $ro->getMaintenanceBranch($username,"departmentX","PHARMACY"); ?>
</li>

</ul>



  <li>
 <a href="http://<?php echo $ro->getMyUrl() ?>/COCONUT/requestition/requesting.php" target="departmentX">Requestition<span class="arrow"></span></a>
 <ul>

</li>

</ul>


  <li>
 <a href="http://<?php echo $ro->getMyUrl() ?>/COCONUT/requestition/receiveRequest.php" target="departmentX">Receiving<span class="arrow"></span></a>
 <ul>

</li>

</ul>


    </div>



<iframe src="http://<?php echo $ro->getMyUrl(); ?>/Department/departmentPage.php?" width="991" height="540"  name="departmentX" border=1 frameborder=no></iframe>

</body>
</html>
