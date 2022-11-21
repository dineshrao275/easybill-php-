
<?php
    session_start();
    if(!isset($_SESSION['userid']))
        header("location:../login.php");

        $catagoryname=$_POST["catagoryname"];
        

        $catagory_id=$_POST["catagory_id"];

            $vendor_id=$_SESSION['userid'];


                
                    include("../database/db.php");
                    $query1=mysqli_query($con,"select * from catagory where vendorid=$vendor_id and catagoryname='$catagoryname' ");


                    $row=mysqli_fetch_array($query1);

                    if(!$row)
                    {  
                        $query=mysqli_query($con,"update  catagory set catagoryname='$catagoryname' where id=$catagory_id");

                    if($query){
                        $_SESSION['catagory_inserted']="Catagory Added Successfully";
                    }
                    else{
                        $_SESSION['catagory_error']="Catagory Error";
                    }

                    header("Location:addcatagory.php");

                    }
                    else
                    {
                        $_SESSION['catagory_error']="Catagory Error";
                        header("Location:addcatagory.php");
                    }

                    ?>