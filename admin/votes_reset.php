<?php
	include 'includes/session.php';

	$sql = "INSERT INTO archive (voters_id, candidate_id, position_id, voters_key, vote_weight, election_id) SELECT voters_id, candidate_id, position_id, voters_key, vote_weight, election_id FROM votes";
	if($conn->query($sql)){
		$_SESSION['success'] = "Votes reset successfully";
		//Reset votes
		$sql = "DELETE FROM votes";
		if($conn->query($sql)){
			$_SESSION['success'] .= " and votes reset successfully";
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = "Something went wrong in reseting";
	}

	header('location: votes.php');

?>