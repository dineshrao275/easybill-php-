<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/logo3.png" type="image/x-icon">

    <title>Register</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="./js/bootstrap.js"></script>
</head>

<body>

    <?php include('./header.php')?>

    <div class='container-fluid'>
        <div class=' row register-page'>
            <div class='col-md-8 offset-md-2 col-12 my-register-form'>
                <form method="post" action='register1.php'>
                    <h1>Sign Up </h1>
                    <div>
                        <input type='text' placeholder='Full Name' required name='fullname' />
                        <input type='email' placeholder='Email ' required name='email' />

                    </div>

                    <div>
                        <input type='number' placeholder='Age' name='age' required />
                        <input type='text' placeholder='address' required name='address' />
                    </div>

                    <div>
                        <input type='text' placeholder='User Name' required name='username' />
                        <input type='password' placeholder='Password' required name='password' />
                    </div>
                    <div>
                        <input type='text' placeholder='Firm Name' required name='firmname' />
                    </div>
                    <div> <input id='submit-register-btn' type='submit' value='Register' /></div>
                </form>

                <p class='register-link'>already Have an Account. Please <a href='./login.php'><b>LogIn</b></a> </p>
            </div>
        </div>
    </div>



    <?php include('./footer.php'); ?>





</body>

</html>


