
<?php
    session_start();
    if(!isset($_SESSION['userid']))
        header("location:../login.php");

        $productname=$_POST["productname"];
        $product_id=$_POST["product_id"];
        $productprice=$_POST['productprice'];
        $catagoryname=$_POST['catagoryname'];
        $unit=$_POST['productunit'];

            $vendor_id=$_SESSION['userid'];


                
                    include("../database/db.php");
                    $query1=mysqli_query($con,"select * from products where vendorid=$vendor_id and productname='$productname' and price=$productprice and catagoryname='$catagoryname' and unit=' $unit' ");


                    $row=mysqli_fetch_array($query1);

                    if(!$row)
                    {  
                        $query=mysqli_query($con,"update  products set productname='$productname' ,  price=$productprice , catagoryname='$catagoryname', unit='$unit' where id=$product_id");

                    if($query){
                        echo "updated";
                        $_SESSION['catagory_inserted']="Catagory Added Successfully";
                    }
                    else{
                        echo "NOT updated";
                        $_SESSION['catagory_error']="Catagory Error";
                    }
                    header("location:addproduct.php");
                    }
                    else
                    {
                        $_SESSION['catagory_error']="Catagory Error";
                        echo "row existed";
                        header("location:addproduct.php");
                    }

                    ?>