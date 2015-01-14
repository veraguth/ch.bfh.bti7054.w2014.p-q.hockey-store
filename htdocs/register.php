<html>
<head>
</head>
<body>


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
	
	$query = 'INSERT user (username, firstName, lastName, street, zipCode, city, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
	$stmt = $mysqli->prepare($query);
	
	$stmt->bind_param('ssssisss', $userName, $firstName, $lastName, $street, $zipCode, $city, $email, $password);
	$stmt->execute();
	$stmt->close();
	$mysqli->close();
	
	header('HTTP/1.1 303 See Other');
	header('Location: home');
} else {
?>

		<form id='register' action='register.php' method='post'
			  accept-charset='UTF-8'>
			<fieldset>
				<legend>Register</legend>
				<label for='firstName'> Vorname: </label>
				<input type='text' name='firstName' id='firstName' maxlength="50" required="true"/>
				<br/><br/>
				<label for='lastName'> Nachname: </label>
				<input type='text' name='lastName' id='lastName' maxlength="50" required="true"/>
				<br><br>
				<label for='street'> Strasse: </label>
				<input type='text' name='street' id='street' maxlength="50" required="true"/>
				<br><br>
				<label for='zipCode'> Postleitzahl: </label>
				<input type='number' name='zipCode' id='zipCode' min="1000" max="9999" required="true"/>
				<br><br>
				<label for='city'> Stadt: </label>
				<input type='text' name='city' id='city' maxlength="50" required="true"/>
				<br><br>
				<label for='email'>Email Address:</label>
				<input type='email' name='email' id='email' maxlength="50" required="true"/>
				<br><br>
				<label for='username'>UserName*:</label>
				<input type='text' name='userName' id='userName' maxlength="50" required="true"/>
				<br><br>
				<label for='password'>Password*:</label>
				<input type='password' name='password' id='password' maxlength="50" required="true"/>
				<br><br>
				<input type='submit' name='register' value='Submit'/>	
			</fieldset>
		</form>
	</body>
</html>
<?php } ?>