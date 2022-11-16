<?php
     
     session_start();
$fullname=$_POST["fullname"];
$email=$_POST["email"];
$age=$_POST["age"];
$address=$_POST["address"];
$username=$_POST["username"];
$password=$_POST["password"];


include('./database/db.php');

$r=mysqli_query($con,"select * from registration where email='$email' or username='$username' ");
if($row=mysqli_fetch_array($r))
{
    $_SESSION['exist_user']="Already have an account with this credentials please login";
   header("location:login.php");
} 
 else{
//   move_uploaded_file($_FILES['photo']['tmp_name'],"age/".$_FILES['photo']['name']);
// $photo=$_FILES['photo']['name'];

    
$r1=mysqli_query($con,"insert into registration(fullname,email,age,address,username,password)values('$fullname','$email',$age,'$address','$username','$password')");


  if($r1){
    $_SESSION['register_success'];
    header("location:/easybill/login.php");
  }
else
echo mysqli_error($con);
  }
        
        
        
       


?>