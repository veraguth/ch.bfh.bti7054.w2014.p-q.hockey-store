


<?php
if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['street']) && isset($_POST['zipCode']) && isset($_POST['city']) && isset($_POST['email']) && isset($_POST['userName']) && isset($_POST['password'])){
	session_start();
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$street = $_POST['street'];
	$zipCode = $_POST['zipCode'];
	$city = $_POST['city'];
	$email = $_POST['email'];
	$userName = $_POST['userName'];
	$password = $_POST['password'];
	
	$mysqli = new mysqli('localhost', 'root', '', 'hockey-store_ch');
	
	$query = 'INSERT user (username, firstname, name, adress, plz, city, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
	$stmt = $mysqli->prepare($query);
	
	$stmt->bind_param('ssssisss', $userName, $firstName, $lastName, $street, $zipCode, $city, $email, $password);
	$stmt->execute();
	$stmt->close();
	$mysqli->close();
	
	header('HTTP/1.1 303 See Other');
	header('Location: home');
} 
 ?>