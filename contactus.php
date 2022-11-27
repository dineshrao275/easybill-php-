<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/logo3.png" type="image/x-icon">

    <title>Contact Us</title>

    
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="./js/bootstrap.js"></script>
</head>
<body>
    <?php include("./header.php");  ?>
<div class='container-fluid'>

            <div class='row contact-page'>

                <div class=' col-md-10 offset-md-1 col-12 myform'>
                    <div class='row '>
                        <div class='col-md-6   col-0 contact-image'>
                            <img src='images/customer1.png' alt='' class='image-fluid' />
                        </div>
                        <div class='col-md-4 offset-md-1 col-12'>
                            <form action="" method="" >
                                <h1>Contact us </h1>
                                <div > <input type='text' placeholder='Full Name' required></div>
                                <div > <input type='email' placeholder='Email here' required /></div>
                                <div > <input type='contactno' placeholder='mobile no '  required /></div>
                                <div > <input type='text' placeholder='comment or Query'  required /></div>
                                <div > <button class='btn btn-outline-secondary' type='submit'><b>Send</b></button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include("./footer.php");  ?>
</body>
</html>