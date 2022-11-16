
<?php 

session_start();

$username=$_POST["username"];
 $password=$_POST["password"];
include('./database/db.php');
$query=mysqli_query($con,"select id,username,password from registration where username='$username' and password='$password' ");
if($result=mysqli_fetch_array($query))
if($username==$result[1] && $password==$result[2] ){
    $_SESSION['userid']=$result[0];
    
   header("location:/easybill/users/dashboard.php");
   echo $_SESSION['userid'];
}
  else
  {
      header("Location: login.php");
      $_SESSION['login_err']="invalid username or password";
  }

else{
  header("Location: login.php");
  $_SESSION['login_err']="invalid username or password";
     }

?>