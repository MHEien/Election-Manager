<?php
	include 'includes/session.php';

	//Move votes to archive table
	$sql = "INSERT INTO archive (voters_id, candidate_id, position_id, voters_key, election_id, vote_weight) SELECT voters_id, candidate_id, position_id, voters_key, election_id, vote_weight FROM votes WHERE election_id = '$election_id'";
	if($conn->query($sql)){
		$_SESSION['success'] = "Votes archived successfully";

		$sql = "DELETE FROM votes WHERE election_id = '$election_id'";
		if($conn->query($sql)){
			$_SESSION['success'] .= " and votes reset successfully";
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = "Something went wrong in archiving votes";
	}

	header('location: votes.php');

?>