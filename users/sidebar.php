<?php    
    session_start();
        if(!isset($_SESSION['userid']))
            header("location:../login.php");
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/bootstrap.js"></script>
</head>
<body>
<div>
             <div class='profile-page-header'><h1>Firm Name</h1></div>
            <div class="sidebar">
                <a  href='./home.php'>Home</a>
                <a  href='./billing.php'>Billing</a>
                <a href='./addcatagory.php'>Add Catagory</a>
                <a href='./addproduct.php'>Add Product</a>
                <a href='./logout.php'>Logout</a>
            </div>
        </div>
</body>
</html>