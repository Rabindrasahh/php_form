<!DOCTYPE html>
<html>
<head>
	<title>Hiring_data</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	 <script src="jquery-3.5.1.min.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 <style type="text/css">
	 	body{
	 		background-color: aliceblue;
	 	}
	 </style>
</head>
<body>
	<?php 
	include('connection.php');

	$sql = "SELECT * FROM seefat_hiring";
		$result = $conn->query($sql);

		$all_orders = [];

		if($result->num_rows > 0){

			while($row = $result->fetch_assoc()) {
				$all_orders[] = $row;
		    }
		}

	 ?>

<?php 
if (isset($_GET['delete'])) {
	// print_r($_GET['delete']);die();
	$delete = $_GET['delete'];

	$sql = "DELETE FROM seefat_hiring WHERE id='$delete'";
	$result = $conn->query($sql);
    // header("location:hiring_data.php");

    $massege= "ddgfd";
}

 ?>



	 <h1 style="color: darkcyan; text-align: center;">Hiring form details</h1>
	 <?php 
                         if (!empty($massege)) { ?>
                            
                              
                            <div class="bs-example">
                              <div class="alert alert-success alert-dismissible fade show">
                                  
                                  <strong>Success!</strong>Deleted successfully.
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>

                              </div>
                          </div>
	            <?php   }
	            ?>   
	<table class="table table-bordered">
	<thead>
		<tr>
			<th>Name</th>
			<th>Phone no:</th>
			<th>Age</th>
			<th>Location</th>
			<th>Experiance</th>
			<th>Gender</th>
			<th>Profile</th>
			<th>File</th>
			<th> Actions </th>
		</tr>
	</thead>
	<tbody>
		<?php  foreach ($all_orders as $order) { ?>
		 
		<tr>
			<td> <?php echo $order['name']?> </td>
			<td> <?php echo $order['ph_no']?></td>
			<td> <?php echo $order['age']  ?> </td>
			<td> <?php echo $order['location']  ?> </td>
			<td> <?php echo $order['experiance']  ?> </td>
			<td> <?php echo $order['gender']  ?> </td>
			<td> <?php echo $order['profile']  ?> </td>
			<td><a href="/Hiring_form/upload/<?php echo $order['file']  ?>" target="_blank" data-bs-toggle="tooltip" data-bs-original-title="Download"><?php echo $order['name']?></td>
			<td><button><a onClick="return confirm( 'Are you sure?' );" href="?delete=<?php echo $order['id'] ?>">Delete</a></button></td>
			</tr>


		<?php } ?>


	</tbody>
</table>

</body>
</html>