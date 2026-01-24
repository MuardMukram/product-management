<?php

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "practical1";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];    
$email = $_POST['email'];

echo $name; 
echo $username;
echo $password; 


$sql = "INSERT INTO users (name, username, password, email) values('$name', '$username', '$password', '$email')";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

