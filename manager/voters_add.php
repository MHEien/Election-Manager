<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$campus = $_POST['campus'];
		$vote_count = $_POST['vote_count'];
		$voters_key = $_POST['voters_key'];

		//generate voters id
		$set = '123456789abcdefghijklmnopqrstuvwxyz';
		$voter = substr(str_shuffle($set), 0, 6);

		//generate password
		$password = substr(str_shuffle('123456789abcdefghijklmnopqrstuvwxyz'), 0, 8);

		//Get the election id from the manager
		$sql = "SELECT election_id FROM manager WHERE id = '".$_SESSION['manager']."'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		$election_id = $row['election_id'];;

		$sql = "INSERT INTO voters (voters_id, password, firstname, lastname, email, election_id, voters_key, max_vote, campus) VALUES ('$voter', '$password', '$firstname', '$lastname', '$email', '$election_id', '$voters_key', '$vote_count', '$campus')";
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