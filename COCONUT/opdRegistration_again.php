<?php
include("../myDatabase.php");
$patientNo = $_GET['patientNo'];
$ro = new database();

$ro->setPatientRecord($patientNo);

?>

<link rel="stylesheet" type="text/css" href="http://<?php echo $ro->getMyUrl(); ?>/COCONUT/flow/rickyCSS1.css" />

<script type='text/javascript'>

function showResult()
{
    
if (document.recordSearch.searchRecord.value.length==0)
  {
  document.getElementById("livesearch").innerHTML="";
  document.getElementById("livesearch").style.border="0px";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
    document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
xmlhttp.open("GET","searchPatientRecord.php?name="+document.recordSearch.searchRecord.value,true);
xmlhttp.send();
}



var record = 'Search Record';
function SetMsg (txt,active) {
    if (txt == null) return;
    
 
    if (active) {
        if (txt.value == record) txt.value = '';                     
    } else {
        if (txt.value == '') txt.value = record;
    }
}

window.onload=function() { SetMsg1(document.getElementById('searchRecord', false)); }

</script>



<style type='text/css'>
.txtBox {
	border: 1px solid #CCC;
	color: #999;
	height: 50px;
	width: 350px;
}
</style>

<script type='text/javascript'>
$("#breadcrumbs a").hover(
    function () {
        $(this).addClass("hover").children().addClass("hover");
        $(this).parent().prev().find("span.arrow:first").addClass("pre_hover");
    },
    function () {
        $(this).removeClass("hover").children().removeClass("hover");
        $(this).parent().prev().find("span.arrow:first").removeClass("pre_hover");
    }
);
</script>

<ol id="breadcrumbs">
    <li><a href="#" class='odd'><font color=white>Registration</font><span class="arrow"></span></a></li>
    <li><a href="#"><font color=yellow>Verify Patient Record</font><span class="arrow"></span></a></li>
    <li><a href="#" class='odd'>Registration Form<span class="arrow"></span></a></li>
    <li><a href="#"><font color=white><b>Verify Registration</b></font><span class="arrow"></span></a></li>
    <li><a href="#" class="odd">Patient<span class="arrow"></span></a></li>
    <li>&nbsp;&nbsp;</li>
</ol>
<br>
<form action="http://<?php echo $ro->getMyUrl(); ?>/Registration/newRecord.php">
<input type=submit value='New Registration' style='border:1px solid #000000; background:#3b5998 no-repeat 4px 4px; color:white;'>
</form>


<?php
echo "<form name='recordSearch'>";
echo "&nbsp;<input type=text name='record' id='searchRecord' style='   
	background:#FFFFFF no-repeat 4px 4px;
	padding:4px 4px 4px 2px;
	border:1px solid #CCCCCC;
	width:400px;
	height:25px;' class='txtBox'
	onfocus='SetMsg(this, true);'
    	onblur='SetMsg(this,false);'
	value='Search Record'
 	onkeyup='showResult();' 
>";
echo "</form>";
echo "<br>&nbsp;  <table border=1 cellpadding=0 cellspacing=0 rules=all>";
echo "<tr>";
echo  "<td bgcolor='#3b5998'>&nbsp;<font color=white>Patient's Name</font>&nbsp;</td>";
echo  "<td bgcolor='#3b5998'>&nbsp;<font color=white>BirthDate</font>&nbsp;</td>";
echo  "<td bgcolor='#3b5998'>&nbsp;<font color=white>Gender</font>&nbsp;</td>";
echo "</tr>";
echo "<tr id='livesearch'></tr>";
echo "</table>";

?>
