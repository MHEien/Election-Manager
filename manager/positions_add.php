<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$description = $_POST['description'];

		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		$max_vote = $_POST['max_vote'];
		$status = $_POST['status'];
		$election_type = $_POST['election_type'];

		//Create array of statute options
		$statute_options = array("Yes", "No", "Abstain");
		$statute_options_wo_abstain = array("Yes", "No");

		$person_options_with_abstain = "Abstain";

		$sql = "INSERT INTO positions (description, election_id, max_vote, active) VALUES ('$description', '$election_id', '$max_vote', '$status')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Position added successfully';
			//If election type is statute, Insert statute options to the candidate table
			if($election_type == "Statute1"){
				$position_id = $conn->insert_id;
				foreach($statute_options as $statute_option){
					$sql = "INSERT INTO candidates (position_id, lastname, firstname, election_id) VALUES ('$position_id', '$statute_option', ' ', '$election_id')";
					$conn->query($sql);
				}
			}
			else if($election_type == "Person1"){
				$position_id = $conn->insert_id;
				$sql = "INSERT INTO candidates (position_id, lastname, firstname, election_id) VALUES ('$position_id', '$person_options_with_abstain', ' ', '$election_id')";
				$conn->query($sql);
			}
			else if($election_type == "Statute2"){
				$position_id = $conn->insert_id;
				foreach($statute_options_wo_abstain as $statute_option){
					$sql = "INSERT INTO candidates (position_id, lastname, firstname, election_id) VALUES ('$position_id', '$statute_option', ' ', '$election_id')";
					$conn->query($sql);
				}
			}
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: positions.php');
?>