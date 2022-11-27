<?php

session_start();
	if(!isset($_SESSION['userid']))
		header("location:../login.php");

	$id=$_SESSION['userid'];
	include("../database/db.php");
    
    function fill_pname($con) {
        $output = ' ';
        $q =mysqli_query($con,"select productname from products where vendorid=$id  ");
        while ($row=mysqli_fetch_array($q)) {
            $output .= '<option value=" ' .$row[0].' ">' .$row[0] . '</option>';
        }
        return $output;
    }

        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ONLINE LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>New Bill</title>
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
            <div class="table-responsive">
                <table class=" table table-bordered table-hover table-striped" id="invoice_table">
                    <thead class="bg-dark">
                    <tr>
						<th>
							<h4 class="text-white text-center">Product Name</h4>
						</th>
						<th>
							<h4 class="text-white text-center">Qty</h4>
						</th>
						<th>
							<h4 class="text-white text-center">Price</h4>
						</th>
						<th>
							<h4 class="text-white text-center">Sub Total</h4>
						</th>
					</tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>
            </div>
 </fieldset>
    </form>
</div>
</body>
</html>


<script>
    $(document).ready(function() {
        var count=0;
        function add_input_field(count){
            ccunt++;
            var html = ' ';
            html += '<tr>';
            html += '<td><select name="productname[]" class="form-control selectpicker" data-live-search="true"><option value="">Select Product</option><?php echo fill_pname($con); ?></select> </td>';

            html += '<td><input type="number" name="price[]" class="form-control price" /> </td>';
            html += '<td><input type="number" name="qty[]" value="1" class="form-control qty" /> </td>';
            html += '<td><input type="number" name="total[]" class="form-control tatal" /> </td>';
            var remove_button= ' ';
            if(count>0){
                remove_button = '<button type="button" name="remove" class="btn btn-danger btn-sm remove">Remove</button>';
            }

            html += '<td>' +remove_button+' </td></tr>';
            return html;
        }

        $('#invoice_table').append(add_input_field(0)); 

    });
</script>