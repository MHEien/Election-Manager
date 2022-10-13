<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$election_type = $_POST['election_type'];
		$description = $_POST['description'];
		$active = $_POST['active'];
		$election_id = $_POST['election_id'];

		$sql = "SELECT * FROM positions ORDER BY priority DESC LIMIT 1";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		$max_vote = $_POST['max_vote'];

		$priority = $row['priority'] + 1;
		
		$sql = "INSERT INTO positions (type, description, priority, active, max_vote) VALUES ('$election_type', '$description', '$priority', '$active', max_vote)";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Position added successfully';
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