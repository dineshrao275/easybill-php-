<?php

session_start();
	if(!isset($_SESSION['userid']))
		header("location:../login.php");
        $vendor_id=$_SESSION['userid'];

        include('../database/db.php');

function fill_unit_select_box($con,$vendor_id)
{
	$output = '';

	$q = "SELECT productname FROM products WHERE vendorid=$vendor_id";

	$res = $con->query($q);

	foreach($res as $row)
	{
		$output .= '<option value="'.$row["productname"].'">'.$row["productname"] . '</option>';
	}

	return $output;
}
		
?>
<!DOCTYPE html>
<html>
	<head>
		<title>New Bill</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">

		<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>

		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        <link rel="stylesheet" href="../css/style.css">
	</head>
	<body>
    <?php include("./sidebar.php"); ?>
		<!-- <br />
		<div class="container">
			<h3 align="center"></h3>
			<br />
            <form method="post" id="insert_form"> -->
            <div class="container newbill">
    <form action="newbill1.php" method="post" class='newbill-form' id="insert-form">

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
        <br>
        <br>
			<div class="card">
				<div class="card-header">Enter Product Details</div>
				<div class="card-body">

					
						<div class="table-repsonsive">
							<span id="error"></span>
							<table class="table table-bordered" id="product_table">
								<tr class="bg-success">
									<th class=" text-center text-white">Product Name</th>
									<th class=" text-center text-white"> Quantity</th>
									<th class=" text-center text-white">Price</th>
                                    <th class=" text-center text-white">Total</th>
									<th class=" text-center bg-white"><button type="button" name="add" class="btn btn-primary btn-sm add"><i class="fas fa-plus"></i></button></th>
								</tr>
							</table>
							<div align="center">
								<input type="submit" name="submit" id="submit_button" class="btn btn-outline-success " value="Print" />
							</div>
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</body>
</html>
<script>

$(document).ready(function(){

	var count = 0;
	
	function add_input_field(count)
	{

		var html = '';

		html += '<tr>';

        html += '<td><select name="productname[]" class="form-control selectpicker" data-live-search="true" ><option value="">Select Unit</option><?php echo fill_unit_select_box($con,$vendor_id); ?></select></td>';

        html += '<td><input type="text" name="product_quantity[]" class="form-control product_quantity" value="1"  /></td>';

		html += '<td><input type="text" name="productprice[]" class="form-control productprice" disabled /></td>';

		html += '<td><input type="text" name="total[]" class="form-control product_quantity" disabled /></td>';

		

		var remove_button = '';

		if(count > 0)
		{
			remove_button = '<button type="button" name="remove" class="btn btn-danger btn-sm remove"><i class="fas fa-minus"></i></button>';
		}

		html += '<td>'+remove_button+'</td></tr>';

		return html;

	}

	$('#product_table').append(add_input_field(0));

	$('.selectpicker').selectpicker('refresh');

	$(document).on('click', '.add', function(){

		count++;

		$('#product_table').append(add_input_field(count));

		$('.selectpicker').selectpicker('refresh');

	});

	$(document).on('click', '.remove', function(){

		$(this).closest('tr').remove();

	});

	$('#insert_form').on('submit', function(event){

		event.preventDefault();

		var error = '';

		count = 1;

		$('.productprice').each(function(){

			if($(this).val() == '')
			{

				error += "<li>Enter Item Name at "+count+" Row</li>";

			}

			count = count + 1;

		});

		count = 1;

		$('.product_quantity').each(function(){

			if($(this).val() == '')
			{

				error += "<li>Enter Item Quantity at "+count+" Row</li>";

			}

			count = count + 1;

		});

		count = 1;

		$("select[name='productname[]']").each(function(){

			if($(this).val() == '')
			{

				error += "<li>Select Unit at "+count+" Row</li>";

			}

			count = count + 1;

		});

        function product_name_provider(){
            prompt ("Hello");
        }

		var form_data = $(this).serialize();

		if(error == '')
		{

			$.ajax({

				url:"insert.php",

				method:"POST",

				data:form_data,

				beforeSend:function()
	    		{

	    			$('#submit_button').attr('disabled', 'disabled');

	    		},

				success:function(data)
				{

					if(data == 'ok')
					{

						$('#product_table').find('tr:gt(0)').remove();

						$('#error').html('<div class="alert alert-success">Item Details Saved</div>');

						$('#product_table').append(add_input_field(0));

						$('.selectpicker').selectpicker('refresh');

						$('#submit_button').attr('disabled', false);
					}

				}
			})

		}
		else
		{
			$('#error').html('<div class="alert alert-danger"><ul>'+error+'</ul></div>');
		}

	});
	 
});
</script>