<?php
include('mysql_credentials.php');

if (!isset($_GET['email'])) {
  echo "<form action=''>";
  echo "<label for='email'>Search by email</label><input name='email'>";
  echo "</form>";
} else {
  $email = $_GET['email'];
  
  $con = new mysqli( $mysql_server, $mysql_user, $mysql_pass, $mysql_db );
  $query = "SELECT * FROM accounts WHERE email='$email'";

  $result = $con->query($query);

  echo "<table>";
  echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th></tr>";

  while( $row = $result->fetch_assoc() ) {
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];

    echo "<tr><td>$first_name</td><td>$last_name</td><td>$email</td></tr>";
  }

  echo "</table>";

}