<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['vote'])){
		if(count($_POST) == 1){
			$_SESSION['error'][] = 'Please vote atleast one candidate';
		}
		else{
			$_SESSION['post'] = $_POST;
			$sql = "SELECT * FROM positions INNER JOIN election ON positions.election_id = election.id WHERE positions.active = 'active'";
			$query = $conn->query($sql);
			$error = false;
			$sql_array = array();
			while($row = $query->fetch_assoc()){
				$position = slugify($row['description']);
				$pos_id = $row['id'];
				if(isset($_POST[$position])){
					if($row['max_vote'] > 1){
						if(count($_POST[$position]) > $row['max_vote']){
							$error = true;
							$_SESSION['error'][] = 'You can only choose '.$row['max_vote'].' candidates for '.$row['description'];
						}
						else{
							foreach($_POST[$position] as $key => $values){
								$sql_array[] = "INSERT INTO votes (voters_id, candidate_id, position_id, voters_key, vote_weight, election_id) VALUES ('".$voter['voters_id']."', '$values', '$pos_id', '".$voter['voters_key']."', '$vote_weight', '$election_id')";
							}

						}
						
					}
					else{
						$candidate = $_POST[$position];
						$sql_array[] = "INSERT INTO votes (voters_id, candidate_id, position_id, voters_key, vote_weight, election_id) VALUES ('".$voter['voters_id']."', '$candidate', '$pos_id', '".$voter['voters_key']."', '$vote_weight', '$election_id')";
					}

				}
				
			}

			if(!$error){
				foreach($sql_array as $sql_row){
					$conn->query($sql_row);
				}

				unset($_SESSION['post']);
				$_SESSION['success'] = 'Ballot Submitted';

			}
					//generate voters id
					$set = '123456789abcdefghijklmnopqrstuvwxyz';
					$voterid = substr(str_shuffle($set), 0, 6);
						
					$sql = "UPDATE voters JOIN votes ON votes.voters_id = voters.voters_id SET voters.voters_id = '$voterid' WHERE votes.voters_id = voters.voters_id";
					if($conn->query($sql)){
						$_SESSION['success'] = 'Voter ID updated successfully.';
					}
					else{
						$_SESSION['error'] = $conn->error;
					}
		}

	}
	else{
		$_SESSION['error'][] = 'Select candidates to vote first';
	}
	

	header('location: home.php');

?>