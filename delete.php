<?php 

	include_once("conn.php");
		
	if (isset($_GET['del_id'])) {
			$id = $_GET['del_id'];
			mysqli_query($db, "DELETE FROM info WHERE id=$id"); 
			header ("Location: index.php");
	}
 ?>