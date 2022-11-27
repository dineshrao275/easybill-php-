<?php    
    
        if(!isset($_SESSION['userid']))
            header("location:../login.php");

            include("../database/db.php");
            $vendor_id=$_SESSION['userid'];
            $query=mysqli_query($con,"select firmname from registration where id=$vendor_id");
            $result=mysqli_fetch_array($query);

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo3.png" type="image/x-icon">

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/bootstrap.js"></script>
</head>
<body>
<div>
             <div class='profile-page-header position-sticky fixed-top' style="position:fixed;top:0;"><h1><?php echo $result[0] ; ?></h1></div>
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