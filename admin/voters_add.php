<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$campus = $_POST['campus'];
		$election = $_POST['election'];
		$vote_count = $_POST['vote_count'];
		$voters_key = $_POST['voters_key'];

		//generate voters id
		$set = '123456789abcdefghijklmnopqrstuvwxyz';
		$voter = substr(str_shuffle($set), 0, 6);
		
		//generate password
		$password = password_hash(substr(str_shuffle('123456789abcdefghijklmnopqrstuvwxyz'), 0, 8), PASSWORD_DEFAULT);

		$sql = "INSERT INTO voters (voters_id, password, firstname, lastname, email, campus, voters_key, max_vote, election_id) VALUES ('$voter', '$password', '$firstname', '$lastname', '$email', '$campus', '$voters_key', '$vote_count', '$election')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: voters.php');
?>