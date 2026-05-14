<?php
$db = mysqli_connect('localhost', 'root', '', 'users');
if (!$db) die("Connection failed: " . mysqli_connect_error());
$sql = "ALTER TABLE sales_transactions ADD COLUMN reference_no VARCHAR(20) AFTER id";
if (mysqli_query($db, $sql)) {
    echo "Column reference_no added successfully";
} else {
    echo "Error adding column: " . mysqli_error($db);
}
mysqli_close($db);
?>