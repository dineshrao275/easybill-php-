<?php 

session_start();
if(!isset($_SESSION['userid']))
header("location:../login.php");

unset($_SESSION['userid']);
header("location:../login.php");


?>