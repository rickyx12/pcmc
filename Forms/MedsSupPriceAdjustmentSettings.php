<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Medicine/Supplies Price Adjustment Exception</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--
function placeFocus() {
if (document.forms.length > 0) {
var field = document.forms[0];
for (i = 0; i < field.length; i++) {
if ((field.elements[i].type == "text") || (field.elements[i].type == "textarea") || (field.elements[i].type.toString().charAt(0) == "s")) {
document.forms[2].elements[i].focus();
break;
         }
      }
   }
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

$username=mysql_real_escape_string($_GET['username']);

$pasql=mysql_query("SELECT mstatus, mopd, mopdhmo, mipd, mbaseprice, sstatus, sopd, sopdhmo, sipd, sbaseprice FROM priceadjustments");
while($pafetch=mysql_fetch_array($pasql)){
$mstatus=$pafetch['mstatus'];
$mopd=$pafetch['mopd'];
$mopdhmo=$pafetch['mopdhmo'];
$mipd=$pafetch['mipd'];
$mbaseprice=$pafetch['mbaseprice'];
$sstatus=$pafetch['sstatus'];
$sopd=$pafetch['sopd'];
$sopdhmo=$pafetch['sopdhmo'];
$sipd=$pafetch['sipd'];
$sbaseprice=$pafetch['sbaseprice'];
}

if($mstatus=="on"){$medsc1="button24";$medsc2="button15";}else if($mstatus=="off"){$medsc1="button15";$medsc2="button24";}
if($sstatus=="on"){$supc1="button24";$supc2="button15";}else if($sstatus=="off"){$supc1="button15";$supc2="button24";}

if($mbaseprice=="sellingprice"){$smbp1="";$smbp2="selected='selected'";}else if($mbaseprice=="unitprice"){$smbp1="selected='selected'";$smbp2="";}
if($sbaseprice=="sellingprice"){$ssbp1="";$ssbp2="selected='selected'";}else if($sbaseprice=="unitprice"){$ssbp1="selected='selected'";$ssbp2="";}

echo "
<table border='0' width='100%' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='49%' valign='top'><table border='0' width='100%' cellpadding='0' cellspacing='0'>
      <tr>
        <td width='10'></td>
        <td height='25'><div align='left' class='arial14bluebold'>Medicine Price Adjustment Settings</div></td>
      </tr>
      <tr>
        <td width='10'></td>
        <td valign='top'><div align='left'><table border='0' cellpadding='0' cellspacing='0'>
          <tr>
            <td><div align='left' class='arial12blackbold'>Main Switch</div></td>
            <td width='10'><div align='center' class='arial12blackbold'>:</div></td>
            <td><div align='left'><table border='0' cellpadding='0' cellspacing='0'>
              <tr>
                <form name='Off' method='get' action='MedsPASwitch.php'>
                <input name='username' type='hidden' value='$username' />
                <input name='switch' type='hidden' value='off' />
                <td><input name='switchme' type='submit' class='$medsc1' value='   Off   ' /></td>
                </form>
                <form name='On' method='get' action='MedsPASwitch.php'>
                <input name='username' type='hidden' value='$username' />
                <input name='switch' type='hidden' value='on' />
                <td><input name='switchme' type='submit' class='$medsc2' value='   On    ' /></td>
                </form>
              </tr>
            </table></div></td>
          </tr>
          <tr>
            <td height='15' colspan='3'></td>
          </tr>
        </table></div></td>
      </tr>
";

if($mstatus=="on"){
echo "
      <tr>
        <td width='10'></td>
        <form name='MPA' method='get' action='MedsPriceAdjustmentSave.php'>
        <td><div align='left'><table border='0' cellpadding='0' cellspacing='0'>
          <tr>
            <td height='25' colspan='3'><div align='left' class='arial15blue'>Set Price Adjustments</div></td>
          </tr>
          <tr>
            <td height='20'><div align='left' class='arial12blackbold'>Out Patient w/o HMO/Company</div></td>
            <td height='20' width='10'><div align='center' class='arial12blackbold'>:</div></td>
            <td height='20'><div align='left' class='arial12blackbold'>+<input name='mopd' type='text' size='4' class='textfield01' value='".($mopd*100)."' />%</div></td>
          </tr>
          <tr>
            <td height='20'><div align='left' class='arial12blackbold'>Out Patient w/ HMO/Company</div></td>
            <td height='20' width='10'><div align='center' class='arial12blackbold'>:</div></td>
            <td height='20'><div align='left' class='arial12blackbold'>+<input name='mopdhmo' type='text' size='4' class='textfield01' value='".($mopdhmo*100)."' />%</div></td>
          </tr>
          <tr>
            <td height='20'><div align='left' class='arial12blackbold'>In Patient</div></td>
            <td height='20' width='10'><div align='center' class='arial12blackbold'>:</div></td>
            <td height='20'><div align='left' class='arial12blackbold'>+<input name='mipd' type='text' size='4' class='textfield01' value='".($mipd*100)."' />%</div></td>
          </tr>
          <tr>
            <td height='20'><div align='left' class='arial12blackbold'>Base Price From?</div></td>
            <td height='20' width='10'><div align='center' class='arial12blackbold'>:</div></td>
            <td height='20'><div align='left' class='arial12blackbold'>
              <select name='mbaseprice' class='textfield01'>
                <option value='unitprice' $smbp1>Unit Price</option>
                <option value='sellingprice' $smbp2>Selling Price</option>
              </select>
            </td>
          </tr>
          <tr>
            <td height='30' colspan='3'><div align='left'><input name='save' type='submit' class='button08' value='Save Changes' /></div></td>
          </tr>
        </table></div></td>
        <input name='username' type='hidden' value='$username' />
        </form>
      </tr>

";
}

echo "

    </table></td>
    <td width='2%'></td>
    <td width='49%' valign='top'><table border='0' width='100%' cellpadding='0' cellspacing='0'>
      <tr>
        <td width='10'></td>
        <td height='25'><div align='left' class='arial14bluebold'>Supplies Price Adjustment Settings</div></td>
      </tr>
      <tr>
        <td width='10'></td>
        <td valign='top'><div align='left'><table border='0' cellpadding='0' cellspacing='0'>
          <tr>
            <td><div align='left' class='arial12blackbold'>Main Switch</div></td>
            <td width='10'><div align='center' class='arial12blackbold'>:</div></td>
            <td><div align='left'><table border='0' cellpadding='0' cellspacing='0'>
              <tr>
                <form name='Off' method='get' action='SupPASwitch.php'>
                <input name='username' type='hidden' value='$username' />
                <input name='switch' type='hidden' value='off' />
                <td><input name='switchme' type='submit' class='$supc1' value='   Off   ' /></td>
                </form>
                <form name='On' method='get' action='SupPASwitch.php'>
                <input name='username' type='hidden' value='$username' />
                <input name='switch' type='hidden' value='on' />
                <td><input name='switchme' type='submit' class='$supc2' value='   On    ' /></td>
                </form>
              </tr>
            </table></div></td>
          </tr>
          <tr>
            <td height='15' colspan='3'></td>
          </tr>
        </table></div></td>
      </tr>
";

if($sstatus=="on"){
echo "
      <tr>
        <td width='10'></td>
        <form name='MPA' method='get' action='SupPriceAdjustmentSave.php'>
        <td><div align='left'><table border='0' cellpadding='0' cellspacing='0'>
          <tr>
            <td height='25' colspan='3'><div align='left' class='arial15blue'>Set Price Adjustments</div></td>
          </tr>
          <tr>
            <td height='20'><div align='left' class='arial12blackbold'>Out Patient w/o HMO/Company</div></td>
            <td height='20' width='10'><div align='center' class='arial12blackbold'>:</div></td>
            <td height='20'><div align='left' class='arial12blackbold'>+<input name='sopd' type='text' size='4' class='textfield01' value='".($sopd*100)."' />%</div></td>
          </tr>
          <tr>
            <td height='20'><div align='left' class='arial12blackbold'>Out Patient w/ HMO/Company</div></td>
            <td height='20' width='10'><div align='center' class='arial12blackbold'>:</div></td>
            <td height='20'><div align='left' class='arial12blackbold'>+<input name='sopdhmo' type='text' size='4' class='textfield01' value='".($sopdhmo*100)."' />%</div></td>
          </tr>
          <tr>
            <td height='20'><div align='left' class='arial12blackbold'>In Patient</div></td>
            <td height='20' width='10'><div align='center' class='arial12blackbold'>:</div></td>
            <td height='20'><div align='left' class='arial12blackbold'>+<input name='sipd' type='text' size='4' class='textfield01' value='".($sipd*100)."' />%</div></td>
          </tr>
          <tr>
            <td height='20'><div align='left' class='arial12blackbold'>Base Price From?</div></td>
            <td height='20' width='10'><div align='center' class='arial12blackbold'>:</div></td>
            <td height='20'><div align='left' class='arial12blackbold'>
              <select name='sbaseprice' class='textfield01'>
                <option value='unitprice' $ssbp1>Unit Price</option>
                <option value='sellingprice' $ssbp2>Selling Price</option>
              </select>
            </td>
          </tr>
          <tr>
            <td height='30' colspan='3'><div align='left'><input name='save' type='submit' class='button08' value='Save Changes' /></div></td>
          </tr>
        </table></div></td>
        <input name='username' type='hidden' value='$username' />
        </form>
      </tr>
";
}

echo "
    </table></td>
  </tr>
</table>
";
?>
</body>
</html>
