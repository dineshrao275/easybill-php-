
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/logo3.png" type="image/x-icon">
    
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="./js/bootstrap.js"></script>
    <title>Login</title>
</head>
<body>
<?php include("./header.php"); ?>
<div class='container-fluid'>
            <div class='result login-page' >
                <div class='my-login-form col-md-4 offset-md-4 col-12'>

                    <form action='login1.php' method="post" >
                        <h1>Sign In </h1>
                        <div > <input type='text' placeholder='User Name' name='username' required /></div>
                        <div > <input type='password' placeholder='Password' name='password' required /></div>
                        <div > <input class='submit-login-btn' type='submit' value='LogIn' /></div>
                    </form>
                    <p class='register-link'>don't Have any Account <a href='register.php' ><b>Register</b></a>  </p>
                </div>
            </div>
        </div>
        <?php include("./footer.php"); ?>
</body>
</html>

