<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];

	
	
	// Database connection
	$conn = new mysqli('localhost','root','','tests');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstname, lastname,gender, email, password, phone) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstname, $lastname, $gender, $email, $password, $phone);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>