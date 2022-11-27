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
    <link rel="shortcut icon" href="../images/logo3.png" type="image/x-icon">

    <title>Billing</title>

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/bootstrap.js"></script>

</head>

<body>
    <?php  include('./sidebar.php'); ?>
    <div class='container-fluid billing'>
        <div class='row choose-bill-type'>
            <div class='billing-heading'>
                <h2>Billing</h2>
            </div>

            <div class='bill-buttons'>

            <a href="./existingbill.php" class='button-link'>
            <button class='btn btn-outline-danger'><b>Existing Bills</b></button>
            </a>

            <a href="./newbill.php" class='button-link new-bill-button'>
            <button class='btn btn-outline-success'><b>New Bill</b></button>
            </a>
            </div>

        </div>
    </div>

</body>

</html>