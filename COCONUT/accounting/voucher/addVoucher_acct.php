<?php
include("../../../myDatabase1.php");
$userz = $_GET['username'];

$ro = new database();
$ro->coconutDesign();

$ro->coconutFormStart("get","addVoucher1_acct.php");
$ro->coconutHidden("username",$userz);
$ro->coconutHidden("timeIssued",$ro->getSynapseTime());
$ro->coconutHidden("voucherNo","");
echo "<Br><br>";
$ro->coconutBoxStart("500","320");
echo "<br>";
echo "<table>";
echo "<tr>";
echo "<TD>Check#</tD>";
echo "<TD>";
$ro->coconutTextBox("checkedNo","");
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<TD>Payment Mode</tD>";
echo "<TD>";
$ro->coconutComboBoxStart_long("paymentMode");
echo "<option value='cash'>Cash</option>";
echo "<option value='check'>Check</option>";
$ro->coconutComboBoxStop();
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<TD>Description</tD>";
echo "<TD>";
$ro->coconutTextBox("description","");
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<TD>Amount</tD>";
echo "<TD>";
$ro->coconutTextBox_short("amount","");
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<TD>Payee</tD>";
echo "<TD>";
$ro->coconutComboBoxStart_long("payee1");
echo "<option value=''></option>";
$ro->showOption("supplier","supplierName");
$ro->coconutComboBoxStop();
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<TD>Payee (Others)</tD>";
echo "<TD>";
$ro->coconutTextBox("payee","");
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<TD>Date</tD>";
echo "<TD>";
$ro->coconutComboBoxStart_short("month");
echo "<option value='".date("m")."' selected='selected'>".date("M")."</option>";
echo "<option value='01'>Jan</option>";
echo "<option value='02'>Feb</option>";
echo "<option value='03'>Mar</option>";
echo "<option value='04'>Apr</option>";
echo "<option value='05'>May</option>";
echo "<option value='06'>Jun</option>";
echo "<option value='07'>Jul</option>";
echo "<option value='08'>Aug</option>";
echo "<option value='09'>Sep</option>";
echo "<option value='10'>Oct</option>";
echo "<option value='11'>Nov</option>";
echo "<option value='12'>Dec</option>";
$ro->coconutComboBoxStop();
$ro->coconutComboBoxStart_short("day");
echo "<option selected='selected'>".date("d")."</option>";
echo "<option>01</option>";
echo "<option>02</option>";
echo "<option>03</option>";
echo "<option>04</option>";
echo "<option>05</option>";
echo "<option>06</option>";
echo "<option>07</option>";
echo "<option>08</option>";
echo "<option>09</option>";
echo "<option>10</option>";
echo "<option>11</option>";
echo "<option>12</option>";
echo "<option>13</option>";
echo "<option>14</option>";
echo "<option>15</option>";
echo "<option>16</option>";
echo "<option>17</option>";
echo "<option>18</option>";
echo "<option>19</option>";
echo "<option>20</option>";
echo "<option>21</option>";
echo "<option>22</option>";
echo "<option>23</option>";
echo "<option>24</option>";
echo "<option>25</option>";
echo "<option>26</option>";
echo "<option>27</option>";
echo "<option>28</option>";
echo "<option>29</option>";
echo "<option>30</option>";
echo "<option>31</option>";
$ro->coconutComboBoxStop();
$ro->coconutTextBox_short("year",date("Y"));
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<TD>Account Title</tD>";
echo "<TD>";
$ro->coconutComboBoxStart_long("accountTitle");
echo "<option value=''>&nbsp;</option>";
$ro->showOption("Category","Category");
$ro->coconutComboBoxStop();
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<br>";
$ro->coconutButton("Proceed");
$ro->coconutBoxStop();

$ro->coconutFormStop();
?>