<?php    
    session_start();
        if(!isset($_SESSION['userid']))
            header("location:../login.php");

            $vendor_id=$_SESSION['userid'];
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo3.png" type="image/x-icon">
   
    <title>Add Product</title>

    <!-- ONLINE LINKS -->
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- LOCAL FILES -->

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/bootstrap.js"></script>

    <script>
    $(document).ready(function() {
        $('#product-table').DataTable();
    });

</head>
<body>
        <?php include('./sidebar.php'); 
            include("../database/db.php");
        ?>
            <div class='container-fluid add-product'>
                <div class='row'>
                    <div class='product-heading'>
                        <h2>Add Product</h2>
                    </div>

                    <form action="addproduct1.php" method="post" class='add-product-form'>
                        
                        <div class='fields ' >
                            <span>Product Name : </span>
                            <span> <input type='text' name='productname' placeholder='Product' required /> </span>
                        </div>
                        <div class='fields ' >
                            <span>Product Price : </span>
                            <span> <input type='text' name='productprice' placeholder='Product' required /> </span>
                        </div>

                        <div class='fields ' >
                            <span>Select Catagory : </span>
                            
                            <span> <select name="catagoryname" id="catagoryname" required>
                            <?php  
                                $query=mysqli_query($con,"select catagoryname from catagory where vendorid=$vendor_id");
                                while($result=mysqli_fetch_array($query)) { ?>
                            
                            <option value="<?php echo $result[0]; ?>">
                            <?php echo $result[0]; ?>
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

                        <button type='submit' class='btn btn-outline-primary' >Add</button>
                    </form>
                </div>



                <div class='container-fluid product-list'>
            <hr>
            
            <table id='product-table' class="table table-striped table-hover">
                <header style="background-color:lightgray; border-radius:10px" ><h2 style="padding:20px; ">Products</h2></header>
                <thead>
                    <tr>
                        <th>Sno.</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Unit</th>
                        <th>Product Catagory</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
               <?php 
                  include("../database/db.php");
                   $query=mysqli_query($con,"select * from products where vendorid=$vendor_id");
                   
                   
                   if($query) {
                        $count=0;
                        while($result=mysqli_fetch_array($query)) {
                           ?>
                           <tr>
                                <td><?php echo ++$count; ?> </td>
                                <td><?php echo $result[1]; ?> </td>
                                <td><?php echo $result[2]; ?> </td>
                                <td><?php echo $result[3]; ?> </td>
                                <td><?php echo $result[5]; ?> </td>
                                <td><a href="edit-product.php?product_id=<?php echo $result[0] ?>"><i class="fa-solid fa-pen-to-square"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="delete-product.php?product_id=<?php echo $result[0] ?>"><i class="fa-solid fa-trash-can"></i></a></td>
                           </tr>

                        <?php



                        }
                    }
                    else {
                            echo "<tr><td colspan='3'>There is no data to display</td></tr>";
                    }
               
               ?>
               </tbody>
            </table>

        </div>
            </div>

        
</body>
</html>