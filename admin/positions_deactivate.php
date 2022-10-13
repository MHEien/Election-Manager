<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$active = $_POST['active'];
		$sql = "UPDATE positions SET active = 0 WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Position deactivateded successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to deactivate first';
	}

	header('location: positions.php');
	
?>