<?php 

	session_start();

	$name = "";
	$address = "";
	$id = 0;  
	$edit_state = false;
	// Connect to database

	$db = mysqli_connect('localhost','root','','email');

	// For Saving
		if(isset($_POST['save'])){
			$name = $_POST['name'];
			$address = $_POST['address'];

			$query = "INSERT INTO info(name,address) VALUES('$name','$address')";
			mysqli_query($db, $query);
			$_SESSION['msg']="Record Saved";
			header('location: index.php'); //CHANGE index.php if done
		}

	//Update record
		if (isset($_POST['update'])) {
			$name = mysqli_real_escape_string($db,$_POST['name']);
			$address = mysqli_real_escape_string($db,$_POST['address']);
			$id = mysqli_real_escape_string($db,$_POST['id']);

			mysqli_query($db, "UPDATE info SET name='$name', address='$address' WHERE id=$id");
			$_SESSION['msg']="Record Updated";
			header('location: index.php'); //CHANGE index.php if done
		}

	//Delete
	/*	if (isset($_GET['del'])) {
			$id = $_GET['del'];
			mysqli_query($db, "DELETE FROM info WHERE id=$id"); 


			$_SESSION['msg'] =  "Record Deleted";
			header('location: index.php'); //CHANGE index.php if done
		}*/
	// Retrieve records
		$results = mysqli_query($db,"SELECT * FROM info");

 ?>