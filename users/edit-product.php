<?php    
    session_start();
        if(!isset($_SESSION['userid']))
            header("location:../login.php");

            $vendor_id=$_SESSION['userid'];
            $product_id=$_REQUEST['product_id'];

        include('../database/db.php');

        $query=mysqli_query($con, "select * from products where id=$product_id");
        $result=mysqli_fetch_array($query);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>

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
        <?php include('./sidebar.php'); 
            include("../database/db.php");
        ?>
            <div class='container-fluid add-product'>
                <div class='row'>
                    <div class='product-heading'>
                        <h2>Update Product</h2>
                    </div>

                    <form action="edit-product1.php" method="post" class='add-product-form'>
                        
                        <div class='fields ' >
                            <span>Product Name : </span>
                            <span> 
                            <input type='number' name='product_id' value="<?php echo $product_id ?>" style="display:none;" />    
                            <input type='text' name='productname' value="<?php echo $result[1]; ?>" required /> </span>
                        </div>
                        <div class='fields ' >
                            <span>Product Price : </span>
                            <span> <input type='text' name='productprice'  value="<?php echo $result[2]; ?>" required /> </span>
                        </div>

                        <div class='fields ' >
                            <span>Select Catagory : </span>
                            
                            <span> <select name="catagoryname" id="catagoryname" required>
                            <?php  
                                $query1=mysqli_query($con,"select catagoryname from catagory where vendorid=$vendor_id");
                                while($result1=mysqli_fetch_array($query1)) { ?>
                            
                            <option value="<?php echo $result1[0]; ?>">
                            <?php echo $result1[0]; ?>
                            </option>
                            <?php  } ?>
                            </select> </span>
                        </div>

                        <div class='fields ' >
                            <span>Units : </span>
                            <span> <select name='productunit'required >
                                <option >gm/kg</option>
                                <option >ml/lit</option>
                                <option >pcs</option>
                            </select>
                            </span>
                        </div>

                        <button type='submit' class='btn btn-outline-primary' >Update</button>
                    </form>
                </div>



               </div>

        
</body>
</html>