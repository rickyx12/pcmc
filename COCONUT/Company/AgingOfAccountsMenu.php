<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Aging of Accounts</title>
<style type="text/css">
<!--
.style1 {font-family: Arial;font-size: 16px;font-weight: bold;color: #000000;}
.style2 {font-family: Arial;font-size: 16px;font-weight: bold;color: #FF6600;}
.style3 {font-family: Arial;font-size: 12px;font-weight: bold;color: #FFFFFF;}
.style4 {font-family: Arial;font-size: 12px;font-weight: bold;color: #0033FF;}
.style5 {font-family: Arial;font-size: 14px;font-weight: bold;color: #FF6600;}
.textfield01 {font-family: Arial;font-size: 12px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 1px solid #000000;}
.button01 {font-family: Arial;font-size: 12px;font-weight: bold;color: #000000;background-color: #FFFFFF;border: 1px solid #000000;}
.button02 {font-family: Arial;font-size: 12px;font-weight: bold;color: #FF0000;background-color: #FFFFFF;border: 1px solid #000000;}
.astyle {text-decoration: none;}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_changeProp(objName,x,theProp,theValue) { //v6.0
  var obj = MM_findObj(objName);
  if (obj && (theProp.indexOf("style.")==-1 || obj.style)){
    if (theValue == true || theValue == false)
      eval("obj."+theProp+"="+theValue);
    else eval("obj."+theProp+"='"+theValue+"'");
  }
}
//-->
</script>
</head>

<body>
<?php
$username=$_GET['username'];

echo "
<div align='left'>
  <table width='600' border='0' cellspacing='0' cellpadding='0'>
    <tr>
      <td width='24' height='35'><div align='center'><img src='bullet01.png' width='15' height='15' /></div></td>
      <td width='476'><a href='HMOComAAByHMOComSelectHMOCom.php?username=$username' target='_blank' class='astyle'><div class='style1' align='left' id='one' onclick=MM_changeProp('one','','style.color','#FF6600','DIV') onmouseover=MM_changeProp('one','','style.color','#FF6600','DIV') onmouseout=MM_changeProp('one','','style.color','#000000','DIV')>HMO/Company Aging of Accounts by HMO/Company</div></a></td>
    </tr>
    <tr>
      <td height='35'><div align='center'><img src='bullet01.png' width='15' height='15' /></div></td>
      <td><a href='HMOComAAByHMOComSelectHMOComWDR.php?username=$username' target='_blank' class='astyle'><div class='style1' align='left' id='one1' onclick=MM_changeProp('one1','','style.color','#FF6600','DIV') onmouseover=MM_changeProp('one1','','style.color','#FF6600','DIV') onmouseout=MM_changeProp('one1','','style.color','#000000','DIV')>HMO/Company Aging of Accounts by HMO/Company w/ Date Range</div></a></td>
    </tr>
    <tr>
      <td height='35'><div align='center'><img src='bullet01.png' width='15' height='15' /></div></td>
      <td><a href='HMOComAASummarySD.php?username=$username' target='_blank' class='astyle'><div class='style1' align='left' id='two' onclick=MM_changeProp('two','','style.color','#FF6600','DIV') onmouseover=MM_changeProp('two','','style.color','#FF6600','DIV') onmouseout=MM_changeProp('two','','style.color','#000000','DIV')>HMO/Company Aging of Accounts Summary</div></a></td>
    </tr>
    <tr>
      <td height='35'><div align='center'><img src='bullet01.png' width='15' height='15' /></div></td>
      <td><a href='HMOComCreditBalanceSD.php?username=$username' target='_blank' class='astyle'><div class='style1' align='left' id='credbal' onclick=MM_changeProp('credbal','','style.color','#FF6600','DIV') onmouseover=MM_changeProp('credbal','','style.color','#FF6600','DIV') onmouseout=MM_changeProp('credbal','','style.color','#000000','DIV')>HMO/Company Credit Balance</div></a></td>
    </tr>
    <tr>
      <td height='35'><div align='center'><img src='bullet01.png' width='15' height='15' /></div></td>
      <td><a href='PHICCreditBalanceSD.php?username=$username' target='_blank' class='astyle'><div class='style1' align='left' id='phiccredbal' onclick=MM_changeProp('phiccredbal','','style.color','#FF6600','DIV') onmouseover=MM_changeProp('phicredbal','','style.color','#FF6600','DIV') onmouseout=MM_changeProp('phiccredbal','','style.color','#000000','DIV')>PHIC Credit Balance</div></a></td>
    </tr>
    <tr>
      <td height='35'><div align='center'><img src='bullet01.png' width='15' height='15' /></div></td>
      <td><a href='PHICAAWDRSD.php?username=$username' target='_blank' class='astyle'><div class='style1' align='left' id='three' onclick=MM_changeProp('three','','style.color','#FF6600','DIV') onmouseover=MM_changeProp('three','','style.color','#FF6600','DIV') onmouseout=MM_changeProp('three','','style.color','#000000','DIV')>PHIC Aging of Accounts Summary</div></a></td>
    </tr>
  </table>
</div>
";
?>
</body>
</html>
