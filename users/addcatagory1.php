
<?php
    session_start();
    if(!isset($_SESSION['userid']))
        header("location:../login.php");

        $catagoryname=$_POST["catagoryname"];

            $id=$_SESSION['userid'];
                
                    include("../database/db.php");

                    $query1=mysqli_query($con,"select * from catagory where vendorid=$id and catagoryname='$catagoryname'");
                    
                    $row=mysqli_fetch_array($query1);

                    if(!$row)
                    {
                        
                        $query=mysqli_query($con,"insert into catagory(catagoryname,vendorid) values ('$catagoryname',$id)");

                    if($query){
                        $_SESSION['catagory_inserted']="Catagory Added Successfully";
                    }
                    else{
                        $_SESSION['catagory_error']="Catagory Error "; 
                    }

                    header("location:addcatagory.php");

                    }
                    else
                    {
                        $_SESSION['catagory_exist']="Catagory exist"; 
                        header("location:addcatagory.php");
                    }

                    ?>