

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Form</title>
</head>
<body>

    <h2>User Registration</h2>

    <form method="POST" action="register.php">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <input type="submit" value="Submit">
    </form>

</body>
</html>

<?php
include 'conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];    
$email = $_POST['email'];

echo $name; 
echo $username;
echo $password; 


$sql = "INSERT INTO users (name, username, password, email) values('$name', '$username', '$password', '$email')";
if ($conn->query($sql) === TRUE) {
    header("Location: register.php?success=1");
    exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;

}
}
$conn->close();

?>




