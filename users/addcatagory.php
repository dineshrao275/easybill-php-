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

    <title>Add Catagory</title>

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
        $('#catagory-table').DataTable();
    });
    </script>

</head>

<body>
    <?php include('./sidebar.php'); 
    ?>
    <div class='container-fluid add-catagory'>
        <div class='row'>
            <div class='catagory-heading'>
                <h2>Add Catagory</h2>
            </div>

            <form class='add-catagory-form' action="addcatagory1.php" method='post'>
                <div class='fields'>
                    <span>Catagory Name: </span>
                    <span> <input type='text' name='catagoryname' placeholder='Enter Catagory' required></span>
                </div>

                <button type='submit' class='btn btn-outline-primary'>Add</button>
            </form>
        </div>

        <div class='container-fluid catagory-list'>
            <hr>
            
            <table id='catagory-table' class="table table-striped table-hover">
                <header style="background-color:lightgray; border-radius:10px" ><h2 style="padding:20px; ">Catagories</h2></header>
                <thead>
                    <tr>
                        <th>Sno.</th>
                        <th>Catagory Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
               <?php 
                    include("../database/db.php");
                   $query=mysqli_query($con,"select * from catagory where vendorid=$vendor_id");
                   
                   
                   if($query) {
                        $count=0;
                        while($result=mysqli_fetch_array($query)) {
                           ?>
                           <tr>
                                <td>
                                    <?php echo ++$count; ?> 
                                </td>
                                <td>
                                    <?php echo $result[1]; ?> 
                                </td>
                                <td>
                                    <a href="./edit-catagory.php?catagory_id=<?php echo $result[0] ; ?>">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="./delete-catagory.php?catagory_id=<?php echo $result[0] ; ?>">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
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