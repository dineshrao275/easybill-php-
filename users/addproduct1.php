
<?php
    session_start();
    if(!isset($_SESSION['userid']))
        header("location:../login.php");

            $productname=$_POST['productname'];
            $productprice=$_POST['productprice'];
            $catagoryname=$_POST['catagoryname'];
            $unit=$_POST['productunit'];
            $vendor_id=$_SESSION['userid'];
                
                    include("../database/db.php");
                        $query1=mysqli_query($con,"select * from products where vendorid=$vendor_id and catagoryname='$catagoryname' and productname='$productname' ");
                    
                    

                    if(!$row=mysqli_fetch_array($query1))
                    {
                        $query=mysqli_query($con,"insert into products(productname,price,unit,vendorid,catagoryname) values ('$productname','$productprice','$unit',$vendor_id,'$catagoryname')");
                        echo "Hello";   
                    if($query){
                        $_SESSION['product_inserted']="Product Added Successfully";
                    }
                    else{
                        $_SESSION['product_error']="Product Error "; 
                    }

                    header("location:addproduct.php");
                    
                    }
                    else
                    {
                        $_SESSION['product_exist']="Product exist"; 
                        header("location:addproduct.php");
                    }

                    ?>