<?php    
    session_start();
        if(!isset($_SESSION['userid']))
            header("location:../login.php");

            $id=$_SESSION['userid'];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Catagory</title>
</head>
<body>
        <div class="container-fluid">
            <form action="edit-catagory1.php" method="post">
                <div class='fields'>
                    <span>Catagory Name: </span>
                    <span> <input type='text' name='catagoryname' value="<?php echo $result[0] ;?>" required></span>
                </div>

                <button type='submit' class='btn btn-outline-primary'>Update</button>
            </form>
        </div>
</body>
</html>