<?php

include("encrypt.php");
$username = $_POST['username'];
$password = $_POST['password'];
$module = $_POST['module'];
$key = $_POST['key'];
$name = $_POST['name'];


$ro = new database();

if($username == "" || $password == "") {
echo "
<script>
alert('Pls compplete the registration');
history.go(-1);
</script>
";
}else {

if( $key == "202" ) {
$username1 = mysql_real_escape_string(strip_tags($username));
$password1 = mysql_real_escape_string(strip_tags($password));

$encrypt_password = Encryption::encrypt($password1);
$encrypt_password1 = Encryption::ENCRYPT_DECRYPT($encrypt_password);

$ro->addUser($username,$encrypt_password1,$module,"Pagadian",$name);
}else {
header("Location: addUser.php");
}

}

?>
