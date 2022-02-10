<!DOCTYPE html>
<html>
<head>
	<title>Seefat Hiring</title>
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	 <script src="jquery-3.5.1.min.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 <style type="text/css">
	 	body{
	 		background-color: aliceblue;
	 	}
	 	.form-check{
	 		margin-left: 5px;
	 	}
	 </style>
</head>
<body>

	<?php  

	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$ph_no = $_POST['ph_no'];
		$location = $_POST['location'];
		$age = $_POST['age'];
		$experiance = $_POST['experiance'];
		$gender = $_POST['gender'];
		$profile = $_POST['profile'];

		$errors = [];

		if (strlen($ph_no) < 10) {
			$errors['ph_no']="please enter correct phone number";
		}
		if (strlen($ph_no) > 12) {
			$errors['ph_no']="please enter correct phone number";
		}
		

		$img = $_FILES['cv']['name'];

				$for_rand = explode('.', $img);
				$end = end($for_rand);
				$rand = rand();
				$f_name = rand().".".$end;

				include('connection.php');

				if ($end =="pdf" || $end =="doc") {

					$file_s =  move_uploaded_file($_FILES['cv']['tmp_name'], "upload/".$f_name);

					$sql = "INSERT INTO seefat_hiring (name, ph_no, location, age, experiance , gender, profile,file)
					VALUES ('".$name."','".$ph_no."','".$location."','".$age."','".$experiance."','".$gender."','".$profile."','".$f_name."')";

					if ($conn->query($sql) === TRUE) {
					  $massege="Information successfully sended";
					} else {
					  echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}else{
					$errors['file']="Only pdf and doc files are required";
				}



			
	}

	 
?>



	<div class="container">
		<h1 style="text-align: center;">Seefat Hiring</h1>

				<?php 
                         if (!empty($massege)) { ?>
                            
                              
                            <div class="bs-example">
                              <div class="alert alert-success alert-dismissible fade show">
                                  
                                  <strong>Success!</strong> You have successfully submitted.
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>

                              </div>
                          </div>
	            <?php   }
	            ?>    

		<form action="" method="post" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="formGroupExampleInput">Name</label>
		    <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Name" required>
		  </div>
		  <div class="form-group">
		    <label for="formGroupExampleInput">Phone no:</label>
		    <input type="number" class="form-control" name="ph_no" id="formGroupExampleInput" placeholder="Phone no" required>
		    <span class="text-danger"><?php echo @$errors['ph_no']; ?></span>
		  </div>
		  <div class="form-group">
		    <label for="formGroupExampleInput">Age</label>
		    <input type="number" class="form-control" name="age" id="formGroupExampleInput" placeholder="Age" required>
		  </div>
		  <div class="form-group">
		    <label for="formGroupExampleInput">Location</label>
		    <input type="text" class="form-control" name="location" id="formGroupExampleInput" placeholder="Location" required>
		  </div>
		  <div class="form-group">
		  	<label for="formGroupExampleInput">Experiance</label>
		    <select class="form-control" name="experiance" aria-label="Default select example">
			  <option selected>Open this select menu</option>
			  <option value="0">0</option>
			  <option value="0.6">0.6</option>
			  <option value="1">1</option>
			</select>
		  </div>
		  <div class="form-group">
		    <label for="formGroupExampleInput">Gender</label>
		    <div class="form-check">
			  <input class="form-check-input" type="radio" name="gender"  value="male" checked>
			  <label class="form-check-label" for="exampleRadios1">
			    Male
			  </label>
			</div>  
			<div class="form-check">  
			  <input class="form-check-input" type="radio" name="gender" value="female">
			  <label class="form-check-label" for="exampleRadios1">
			    Female
			  </label>
			</div>  
			<div class="form-check">  
			  <input class="form-check-input" type="radio" name="gender" value="other">
			  <label class="form-check-label" for="exampleRadios1">
			    Other
			  </label>
			</div>
		  </div>
		  <div class="form-group">
		  	<label for="formGroupExampleInput">Profile you are applying for</label>
		    <select class="form-control" name="profile" aria-label="Default select example">
			  <option value="php">PHP</option>
			  <option value=".net">.NET</option>
			  <option value="bde">BDE</option>
			</select>
		  </div>
		  <div class="form-group">
		    <label for="formGroupExampleInput">Attach your cv</label>
		    <input type="file" name="cv" class="form-control" id="formGroupExampleInput" placeholder="Name" required>
		    <span class="text-danger"><?php echo @$errors['file']; ?></span>
		  </div>
		  <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

</body>





</html>