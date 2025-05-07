<?php 
ob_start();
session_start();
include "../config/config.php";
// include_once 'header.php';
unset($_SESSION['admin']);
header('location:'.ADMIN_URL.'login.php');
$_SESSION["success_message"] = "You have successfuly log out";
exit;

?>