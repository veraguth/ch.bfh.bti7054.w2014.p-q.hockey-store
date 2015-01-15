<?php
session_start();
if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	
	$query = "SELECT username FROM user WHERE username = ? AND password = ?";
	$mysqli = new mysqli('localhost', 'root', '', 'hockey-store_ch');
	$stmt = $mysqli->prepare($query);
	
	$stmt->bind_param('ss', $username, $password);
	$stmt->execute();
	$stmt->bind_result($username);
	$stmt->store_result();
	
	if($stmt->num_rows == 1){
		$_SESSION['username'] = $username;
		
		header('HTTP/1.1 303 See Other');
		header('Location: home');
	} else {
	//TODO kuttu1: redirect to proper error page
		echo 'wrong username or password';
	}
	
	$stmt->close();
	$mysqli->close();
}
?>