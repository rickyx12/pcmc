<?php
include("../../../myDatabase2.php");
$controlNo = $_GET['controlNo'];

$ro = new database2();
$ro->coconutDesign();

echo "<Br><br><br>";

$ro->coconutFormStart("get","editVoucher1.php");
$ro->coconutHidden("controlNo",$controlNo);
$ro->coconutBoxStart("500","220");
echo "<br>";
echo "<table border=0>";
echo "<tr>";
echo "<Td>Checked No#&nbsp;</tD>";
echo "<td>".$ro->coconutTextBox_return("checkedNo",$ro->selectNow("vouchers","checkedNo","controlNo",$controlNo))."</tD>";
echo "</tr>";


echo "<tr>";
echo "<Td>Description&nbsp;</tD>";
echo "<td>".$ro->coconutTextBox_return("description",$ro->selectNow("vouchers","description","controlNo",$controlNo))."</tD>";
echo "</tr>";

echo "<tr>";
echo "<Td>Amount&nbsp;</tD>";
echo "<td>".$ro->coconutTextBox_return("amount",$ro->selectNow("vouchers","amount","controlNo",$controlNo))."</tD>";
echo "</tr>";


echo "<tr>";
echo "<Td>Payee&nbsp;</tD>";
echo "<td>".$ro->coconutTextBox_return("payee",$ro->selectNow("vouchers","payee","controlNo",$controlNo))."</tD>";
echo "</tr>";

echo "<tr>";
echo "<Td>Date&nbsp;</tD>";
echo "<td>";
$ro->coconutComboBoxStart_short("month");
echo "<option value='".date("m",strtotime($ro->selectNow("vouchers","date","controlNo",$controlNo)))."' selected='selected'>".date("M",strtotime($ro->selectNow("vouchers","date","controlNo",$controlNo)))."</option>";
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
echo "<option selected='selected'>".date("d",strtotime($ro->selectNow("vouchers","date","controlNo",$controlNo)))."</option>";
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
$ro->coconutTextBox_short("year",date("Y",strtotime($ro->selectNow("vouchers","date","controlNo",$controlNo))));
echo "</tD>";
echo "</tr>";

echo "</table>";
echo "<Br>";
$ro->coconutButton("Proceed");
$ro->coconutBoxStop();
$ro->coconutFormStop();

?>
