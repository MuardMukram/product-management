<?php
    include 'conn.php';
session_start();

// session validation
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// 🍪 set cookie (valid for 1 day)
setcookie("visited_products", "yes", time() + (86400), "/");

include 'conn.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>

<h2>Add Product</h2>
<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" required></textarea><br><br>

    <label>Price:</label><br>
    <input type="number" step="0.01" name="price" required><br><br>

    <label>Image URL:</label><br>
    <input type="text" name="image_url" required><br><br>

    <input type="submit" name="submit" value="Add Product">
</form>

<hr>
<?php
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];

    $sql = "INSERT INTO products (name, description, price, image_url)
            VALUES ('$name', '$description', '$price', '$image_url')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Product added successfully</p>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<h2>Product List</h2>

<?php
$result = $conn->query("SELECT * FROM products");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div style='border:1px solid #000; padding:10px; margin:10px;'>";
        echo "<h3>".$row['name']."</h3>";
        echo "<p>".$row['description']."</p>";
        echo "<p>Price: Rs. ".$row['price']."</p>";
        echo "<img src='".$row['image_url']."' width='150'>";
        echo "</div>";
    }
} else {
    echo "No products available";
}

$conn->close();
?>

</body>
</html>