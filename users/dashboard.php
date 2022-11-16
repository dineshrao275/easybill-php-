<?php
    session_start();
    if(!isset($_SESSION['userid']))
       header("location:../login.php");


include('./sidebar.php');
include('home.php');

?>