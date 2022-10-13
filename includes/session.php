<?php
	include 'includes/conn.php';
	session_start();

	if(isset($_SESSION['voter'])){
		$sql = "SELECT * FROM voters WHERE id = '".$_SESSION['voter']."'";
		$query = $conn->query($sql);
		$voter = $query->fetch_assoc();
		$election_id = $voter['election_id'];
		$vote_weight = $voter['max_vote'];
	}
	else{
		header('location: index.php');
		exit();
	}

?>