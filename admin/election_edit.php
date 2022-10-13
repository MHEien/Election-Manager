<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$election = $_POST['election'];

		$sql = "UPDATE election SET election = '$election' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Election updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: election.php');

?>