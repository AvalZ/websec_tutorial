<?php
include('../db/mysql_credentials.php');

$con = new mysqli( $mysql_server, $mysql_user, $mysql_pass, $mysql_db );

if ($con->connect_error) die ("Connection failed: " .$con->connect_error);

$email = $_POST['email'];
$pass = $_POST['pass'];

$stmt = $con->prepare("SELECT * FROM accounts WHERE email=? AND password=SHA(?)");
$stmt->bind_param("ss", $email, $pass);

$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $first_name = $row["first_name"];
  $last_name = $row["last_name"];
  echo "Login successful. Welcome $first_name $last_name!";
} else {
  echo "Wrong username or password";
}

$con->close();
