<?php
session_start();

// username and password sent from form
$username=$_POST['username'];
$password=$_POST['password'];



// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($username = 'test' && $password == 'test'){

// Register $myusername, $mypassword and redirect to file "login_success.php"
    $_SESSION["user"] = $username;
    echo "Logged in";
    //header("location:login_success.php");
}
else {
    echo "Wrong Username or Password";
}

?>