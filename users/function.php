<?php

session_start();
	if(!isset($_SESSION['userid']))
		header("location:../login.php");

    include('../database/db.php');

function getCatagories() {
        
    $query=mysqli_query($con,"select * from catagory");
    $results=mysqli_fetch_array($query);

    echo "$result[0]";

	if($results) {

		echo '<table class="table table-striped table-hover table-bordered" id="data-table"><thead><tr>

				<th>Catagory Name</th>
				<th>Action</th>

			  </tr></thead><tbody>';

		while($results) {

		    echo '
			    <tr>
					<td>'.$results[0].'</td>
				    <td><a href="catagory-edit.php?id='.$results["id"].'" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> <a data-customer-id="'.$results['id'].'" class="btn btn-danger btn-xs delete-customer"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
			    </tr>
		    ';
		}

		echo '</tr></tbody></table>';

	} else {
        echo mysqli_error($con);
		echo "<p>There are no customers to display.</p>";

	}

	// Frees the memory associated with a result
	$results->free();

	// close connection 
	$mysqli->close();
}


?>