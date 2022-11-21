<?php
 session_start();
 if(!isset($_SESSION['userid']))
     header("location:../login.php");

    $catagory_id=$_REQUEST['catagory_id'];
    include("../database/db.php");
    $query=mysqli_query($con,"delete  from catagory where id=$catagory_id");
    if($query)
        header("location:addcatagory.php");
    else
        echo mysqli_error($con);
?>