<?php

session_start();
	if(!isset($_SESSION['userid']))
		header("location:../login.php");

	$id=$_SESSION['userid'];
	include("../database/db.php");
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Bill</title>

    <!-- ONLINE LINKS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- LOCAL FILES -->

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/bootstrap.js"></script>

    <script>


$(document).ready(function () {
    var counter = 0;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input type="text" class="form-control" name="name' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="mail' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" name="phone' + counter + '"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}
	</script>
    
</head>

<body>

<?php include("./sidebar.php"); ?>

    <div class="container newbill">
        <form action="newbill1.php" method="post" class='newbill-form'>

            <div class="new-bill-heading">
                <h2 class="text-primary p-5 font-weight-bold">Make New Bill</h2>
            </div>

            <fieldset>

                <legend> Customer Details</legend>
                <div class="col-sm-4 m-auto">
                    <label  class="form-label">Customer Name</label>
                    <input type="text" class="form-control"  name='customername' placeholder="ie. Prakash sahu"
                        required>
                </div>
                <div class="col-sm-4 m-auto">
                    <label  class="form-label">Customer Mobile</label>
                    <input type="text" class="form-control"  name='customercontact' placeholder="Mobile no."
                        required>
                </div>
                <div class="col-sm-4 m-auto">
                    <label  class="form-label">Customer Email</label>
                    <input type="text" class="form-control"  name='customeremail' placeholder="abc@gmail.com"
                        required>
                </div>
            </fieldset>
            <hr>
            <fieldset>
                <legend>Product Details</legend>
         <table class="table table-bordered table-hover table-striped" id="invoice_table">
				<thead class="bg-secondary">
					<tr>
					<th>
							<h4 class="text-white text-center">Sno</h4>
					</th>
						<th>
							<h4 class="text-white text-center">Product Name</h4>
						</th>
						<th>
							<h4 class="text-white text-center">Qty</h4>
						</th>
						<th>
							<h4 class="text-white text-center">Price</h4>
						</th>
						<th >
							<h4 class="text-white text-center">Discount</h4>
						</th>
						<th>
							<h4 class="text-white text-center">Sub Total</h4>
						</th>
					</tr>
				</thead>
                <tbody>
					<tr>
						<?php $count=0; ?>
					<td class="text-center">
						<?php echo ++$count ; ?>
					</td>
					<td class="text-center">
						<select name="productname" id="productname" required>
                            <?php  
                                $query=mysqli_query($con,"select productname from products where vendorid=$id ");
                                while($result=mysqli_fetch_array($query)) { 
							?>
                            
                            <option value="<?php echo $result[0]; ?>">
                            <?php echo $result[0]; ?>
                            </option>
                            <?php  } ?>
                            </select>
					</td>
					<td class="text-center">
							
					</td>
						<td class="text-center">
							
						</td>
						<td class="text-center">
							
						</td>
						<td class="text-center">
							
						</td>
					</tr>
				</tbody>
				<tfoot>
        <tr>
            <td colspan="6" class="text-center">
                <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add More" />
            </td>
        </tr>
        <tr>
        </tr>
    </tfoot>
       
</table>
     </fieldset>
        </form>
    </div>

<script>
</script>
</body>

</html>