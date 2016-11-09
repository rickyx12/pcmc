<?php

// Inialize session
session_start();

// Include database connection settings
include('config.inc');

// Retrieve username and password from database according to user's input
$login = mysql_query("SELECT * FROM session WHERE (username = '$_POST[username]') and (password = '$_POST[password]')");

// Check username and password match
if (mysql_num_rows($login) == 1) {
// Set username session variable
$_SESSION['username'] = $_POST['username'];
// Jump to secured page
header('Location: securedpage.php');
}
else {
// Jump to login page
header('Location: index.php');
}

?>
