<?php    
    session_start();
        if(!isset($_SESSION['userid']))
            header("location:../login.php");

            $vendor_id=$_SESSION['userid'];
            $catagory_id=$_REQUEST['catagory_id'];

        include("./sidebar.php");

        include('../database/db.php');

        $query=mysqli_query($con, "select catagoryname from catagory where id=$catagory_id");
        $result=mysqli_fetch_array($query);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo3.png" type="image/x-icon">

    <title>Edit Catagory</title>

    <!-- ONLINE LINKS -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- LOCAL FILES -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/bootstrap.js"></script>


</head>
<body>
<div class='container-fluid add-catagory'>
        <div class='row'>
            <div class='catagory-heading'>
                <h2>Update Catagory</h2>
            </div>

            <form class='add-catagory-form' action="edit-catagory1.php" method='post'>
                <div class='fields'>
                    <span>Catagory Name: </span>
                    <span>
                    <input style="display:none;" type='number' name='catagory_id' value="<?php echo $catagory_id; ?>">
                         <input type='text' name='catagoryname' value="<?php echo $result[0] ; ?>" required></span>
                </div>

                <button type='submit' class='btn btn-outline-primary'>Update</button>
            </form>
        </div>

</body>
</html>