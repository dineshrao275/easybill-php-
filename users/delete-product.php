<?php
 session_start();
 if(!isset($_SESSION['userid']))
     header("location:../login.php");

    $product_id=$_REQUEST['product_id'];
    include("../database/db.php");
    $query=mysqli_query($con,"delete  from products where id=$product_id");
    if($query)
        header("location:addproduct.php");
    else
        echo mysqli_error($con);
?>