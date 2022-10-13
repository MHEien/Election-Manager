<?php
	include 'includes/session.php';

	//The form is in /includes/election_modal.php. The form action is election_add.php
	//The input in the form has has the name and id of add_election
	//Save the value of the input in the variable $election and then insert it into the database

	if(isset($_POST['add'])){
		$election = $_POST['add_election'];
		$sql = "INSERT INTO election (election) VALUES ('$election')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Election added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: election.php');

?>