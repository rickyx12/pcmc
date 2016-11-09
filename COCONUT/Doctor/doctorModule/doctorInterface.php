<?php
include("../../../myDatabase.php");
session_start();
$module = $_SESSION['module'];
$username = $_SESSION['username'];
$ro = new database();


if ( (!isset($username) && !isset($module)) ) {
header("Location:/LOGINPAGE/module.php ");
die();
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
</script>
";

?>
</head>
<body>

<ol id="breadcrumbs">
        <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Doctor/initializeDoctor.php"><font color=white>Home</font><span class="arrow"></span></a></li>
        <li><a href="#" class='odd'><font color=yellow><?php echo $_SESSION['module'];  ?></font><span class="arrow"></span></a></li>

    <li>&nbsp;&nbsp;</li>
</ol>

 <div class="menu">
        <ul>
            <li>
                <a href="#">Transaction<span class="arrow"></span></a>
                
                <ul>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Doctor/doctorModule/selectShift.php?module=<?php echo $module; ?>&username=<?php echo $username; ?>&doctor=<?php echo $ro->getDoctorName($username,$module); ?>" target="departmentX" >Clinic (OPD)</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Doctor/doctorModule/ipdPatient.php?module=<?php echo $module; ?>&username=<?php echo $username; ?>&doctor=<?php echo $ro->getDoctorName($username,$module); ?>" target="departmentX">Admitted Patient (IPD)</a></li>

<?php

$ro->coconutUpperMenu_headingMenu_target("http://".$ro->getMyUrl()."/Department/redirectSearch.php?username=$username&completeName=&module=$module","Search Patient","_blank");


?>

                </ul>
            </li>
            <li>
                <a href="#">Reports<span class="arrow"></span></a>
                <ul>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Reports/doctorReport/selectShift.php?doctor=<?php echo $ro->getDoctorName($username,$module); ?>&username=<?php echo $username; ?>" target="departmentX">My Patient</a></li>
                    <li><a href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/Doctor/doctorModule/selectShift_ipd.php?module=<?php echo $module; ?>&username=<?php echo $username; ?>&doctor=<?php echo $ro->getDoctorName($username,$module); ?>" target="departmentX">Discharged Patient</a></li>


                </ul>
            </li>   

</ul>
</div>

<iframe src="http://<?php echo $ro->getMyUrl(); ?>/Department/departmentPage.php?" width="991" height="540" style="overflow-x:hidden; " name="departmentX" border=1 frameborder=no></iframe>

</body>
</html>
