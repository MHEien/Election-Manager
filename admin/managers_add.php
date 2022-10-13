<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$username = $_POST['username'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$election_id = $_POST['election'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//generate voters id

		$sql = "INSERT INTO manager (username, password, firstname, lastname, photo, election_id) VALUES ('$username', '$password', '$firstname', '$lastname', '$filename', '$election_id')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'User added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: managers.php');
?>