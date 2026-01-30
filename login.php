

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Form</title>
</head>
<body>
    <h2>User Registration</h2>
    <form method="POST" action="login.php">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
    include 'conn.php';
     if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];    
        echo "$username";
        echo "$password";
$sql = "SELECT name FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);
        echo $result->num_rows;
    if ($result->num_rows > 0) {
  // output data of each row
        echo "Login successful. Welcome!";}
}  else {
        echo "invalid credintials ";
}
$conn->close();
?>




