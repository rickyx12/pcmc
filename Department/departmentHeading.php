<?php
include("../myDatabase.php");
session_start();
$username = $_SESSION['username'];
$module = $_SESSION['module'];
$ro = new database();

$branch = $ro->getUserBranch_username($username,$module);



?>

<html>
<head>

<title><?php echo $module; ?></title>

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
);";

echo "$(document).ready(function(){ ";
echo "getApproved();";
echo "});";
echo "function getApproved(){";
echo  "$('#totalApproved').load('http://".$ro->getMyUrl()."/COCONUT/ADMIN/request/totalApproved.php',{ 'date':'".date("Y-m-d")."','username':'".$username."' }, function(){";
echo  "   setTimeout(getApproved, 6000);";
echo   "  });";
echo   " }";

echo "</script>";

echo "<style type='text/css'>
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
        <li><a href="http://<?php echo $ro->getMyUrl(); ?>/Department/initializeDepartment.php?module=<?php echo $_SESSION['module']; ?>"><font color=white>Home</font><span class="arrow"></span></a></li>
        <li><a href="#" class='odd'><font color=yellow><?php echo $_SESSION['module']." (".$branch.")"; ?></font><span class="arrow"></span></a></li>

    <li>&nbsp;&nbsp;</li>
</ol>


    <div class="menu">
        <ul>
            <li>
                <a href="#">Transaction<span class="arrow"></span></a>
                

                <ul>

<?php 
/*
if( $module == "CSR" ) { 

echo ' <li><a href="http://'.$ro->getMyUrl().'/COCONUT/CSR/borrowedDate.php?module='.$module.'&username='.$username.'>" target="departmentX" >Borrow Book</a></li>';
}else { }
*/
?>

<?php

if($module != "BILLING") {

                 echo ' <li><a href="http://'.$ro->getMyUrl().'/Department/selectShift.php?module='.$module.'&username='.$username.'&branch='.$branch.'>" target="departmentX" >Diagnostics</a></li>';

//echo ' <li><a href="http://'.$ro->getMyUrl().'/Department/selectShift1.php?module='.$module.'&username='.$username.'&branch='.$branch.'>" target="departmentX" >TESTING</a></li>';
                

 echo  ' <li><a href="http://'.$ro->getMyUrl().'/COCONUT/currentPatient/patientInterface.php?username='.$username.'&completeName=NA_NA" target="_blank">Search Patient</a></li>';

echo  ' <li><a href="http://'.$ro->getMyUrl().'/COCONUT/currentPatient/patientInterface_walkIn.php?username='.$username.'&completeName=" target="_blank">Search Walk In</a></li>';

echo '<li><a href="http://'.$ro->getMyUrl().'/COCONUT/systemBiller/generatorCharge/generatorShift.php?username='.$username.'" target="departmentX">Generator</a></li>';

if( $module == "RADIOLOGY" ) {
                 echo  ' <li><a href="http://'.$ro->getMyUrl().'/COCONUT/Results/Radiology/addHospital.php?username='.$username.'" target="departmentX">Add Hospital Heading</a></li>';

echo  ' <li><a href="http://'.$ro->getMyUrl().'/COCONUT/Results/Radiology/addRadioTemplate.php?username='.$username.'" target="departmentX">Add Report Template</a></li>';

echo  ' <li><a href="http://'.$ro->getMyUrl().'/COCONUT/Results/Radiology/radioHeadingMasterfile.php?username='.$username.'" target="departmentX">View Hospital Heading</a></li>';

echo  ' <li><a href="http://'.$ro->getMyUrl().'/COCONUT/Results/Radiology/radioReportTemplateMasterfile.php?username='.$username.'" target="departmentX">View Report Template</a></li>';

}else { }

echo  ' <li><a href="http://'.$ro->getMyUrl().'/Registration/newRecord_alt.php?username='.$username.'" target="_blank">Unknown Patient</a></li>';

echo  ' <li><a href="http://'.$ro->getMyUrl().'/COCONUT/accounting/voucher/addVoucher.php?username='.$username.'" target="departmentX">Expenses</a></li>';

}else {

echo ' <li><a href="http://'.$ro->getMyUrl().'/COCONUT/admittedPatient/admitted_update.php?module='.$module.'&username='.$username.'&branch='.$branch.'" target="departmentX" >Admitted</a></li>';

$ro->showFloorAsUpperMenu_billing($ro->getUserBranch_username($username,$module),$username);

$ro->coconutUpperMenu_headingMenu_target("http://".$ro->getMyUrl()."/Department/redirectSearch.php?username=$username&completeName=&module=$module","Search Patient","_blank");

$ro->coconutUpperMenu_headingMenu_target("http://".$ro->getMyUrl()."/Department/redirectSearch_walkIn.php?username=$username&completeName=&module=$module","Search Walk-In","_blank");

echo '<li><a href="http://'.$ro->getMyUrl().'/COCONUT/systemBiller/generatorCharge/generatorShift.php?username='.$username.'" target="departmentX">Generator</a></li>';


}

?>


                </ul>
            </li>
            <li>
                <a href="#">Reports<span class="arrow"></span></a>
                <ul>


<?php if( $module == "PHARMACY" ) { ?>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Cashier/cashierReport/reportShift.php?module=PHARMACY&username=<?php echo $username; ?>&reportName=Collection&status=PAID" target="departmentX">Collection</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/inventory/addInventory.php?username=<?php echo $username; ?>" target="departmentX">Add Medicine</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/inventory/addInventory_supplies.php?username=<?php echo $username; ?>" target="departmentX">Add Supplies</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/graphicalReport/bestSelling/selectShift_fastMoving.php?username=<?php echo $username; ?>&title=MEDICINE" target="departmentX">Inventories</a></li>


<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Cashier/cashCollection/selectOption.php?username=<?php echo $username; ?>&reportName=Collection&status=PAID" target="departmentX">Cash Collection</a></li>


<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Pharmacy/phicReport_date.php" target="departmentX">PHIC Receivables</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/patientProfile/MGH/date_MGH.php?username=<?php echo $username; ?>" target="departmentX">Unlock</a></li>

<li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/maintenance/searchInventory.php?username=<?php echo $username; ?>&inventoryType=PHARMACY&branch=All&show=search" target="_blank">Search Item</a></li>

<?php } ?>



<?php if($module != "BILLING" ) { ?>

                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Reports/departmentSelectShift_sales.php?module=<?php echo $module; ?>&username=<?php echo $username; ?>&reportName=Sales" target="departmentX">Sales</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Reports/departmentSelectShift_remittance.php?module=<?php echo $module; ?>&username=<?php echo $username; ?>&reportName=Remittance" target="departmentX">Remittance</a></li>


<?php } else {  ?>

                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Reports/billing/selectShift.php?username=<?php echo $username; ?>&branch=<?php echo $ro->getUserBranch_username($username,$module) ?>" target="departmentX">Discharged</a></li>


<?php  echo  ' <li><a href="http://'.$ro->getMyUrl().'/COCONUT/patientProfile/MGH/date_MGH.php?username='.$username.'" target="departmentX">Unlock</a></li>';  ?>


<?php } ?>

                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Reports/inventoryReport/currentInventory.php?module=<?php echo $module; ?>&username=<?php echo $username; ?>&reportName=Current Inventory&branch=<?php echo $ro->getUserBranch_username($username,$module);  ?>" target="departmentX">Inventory</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Reports/inventoryReport/selectShift.php?module=<?php echo $module; ?>&username=<?php echo $username; ?>&reportName=Current Usages&branch=<?php echo $ro->getUserBranch_username($username,$module);  ?>" target="departmentX" >Usages</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/ADMIN/census/dateRange.php" target="departmentX">Examination Census</a></li>

                </ul>
            </li>    


  <li>
 <a href="#">Requestition of Medicine<span class="arrow"></span></a>
 <ul>
<?php $ro->getDepartmentBranch("departmentX","medicine",$username,$module); ?>
</li>
</ul>


  <li>
 <a href="#">Requestition of Supplies<span class="arrow"></span></a>
 <ul>
<?php $ro->getDepartmentBranch("departmentX","supplies",$username,$module); ?>
</li>
</ul>


<?php

if($module == "PHARMACY") {
echo "<li>";
$ro->getTotalRequest("departmentX",$username,"PHARMACY",$ro->getUserBranch_username($username,$module));
if($ro->allRequest() >0) {
echo "<a href='#'>Request (<font color=red>".$ro->allRequest()."</font>)<span class='arrow'></span></a>";
}else {
echo "<a href='#'>Request<span class='arrow'></span></a>";
}
echo "<ul>";
echo $ro->getCSRBranch("departmentX",$username,"PHARMACY",$ro->getUserBranch_username($username,$module));
echo "</li>";
echo "</ul>";
}else {
echo "";
}

?>


  <li>
 <a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/availableMedicine/receivingRequest.php?module=<?php echo $module; ?>&branch=<?php echo $ro->getUserBranch_username($username,$module); ?>&username=<?php echo $username; ?>" target='departmentX'>Receiving of Request<?php if($ro->getReceivingRequest($module,$ro->getUserBranch_username($username,$module)) > 0) { echo "(<font color=red>".$ro->getReceivingRequest($module,$ro->getUserBranch_username($username,$module))."</font>)";  }else { echo ""; }   ?><span class="arrow"></span></a>
 <ul>

</li>
</ul>


<?php if($module == "PHARMACY") { ?>
     
            <li>
                <a href="#">Approved <span id='totalApproved'></span></a>
                
                <ul>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/ADMIN/request/viewApprovedRequest.php?date=<?php echo date('Y-m-d'); ?>&username=<?php echo $username; ?>" target="departmentX" >View Approved Request</a></li>

                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/ADMIN/request/requestStatus_date.php?date=<?php echo date('Y-m-d'); ?>&username=<?php echo $username; ?>" target="departmentX" >View All Request</a></li>

 </ul>
</li>
<?php } else { } ?>  


       
</ul>
</div>



<iframe src="http://<?php echo $ro->getMyUrl(); ?>/Department/departmentPage.php?" width="991" height="540" name="departmentX" border=1 frameborder=no></iframe>

</body>
</html>
