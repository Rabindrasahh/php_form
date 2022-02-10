<?php 
		$conn = new mysqli("localhost", "root","", "hiring");				

			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
?>
