<?php
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
