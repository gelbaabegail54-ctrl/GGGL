<?php
$mysqli = new mysqli("localhost", "root", "", "users");
if ($mysqli->connect_error) die("Connection failed: " . $mysqli->connect_error);

$sql1 = "ALTER TABLE sales_transactions ADD COLUMN cash_received DECIMAL(10,2) DEFAULT 0.00 AFTER total_price";
$sql2 = "ALTER TABLE sales_transactions ADD COLUMN change_amount DECIMAL(10,2) DEFAULT 0.00 AFTER cash_received";

if ($mysqli->query($sql1) && $mysqli->query($sql2)) {
    echo "Columns cash_received and change_amount added successfully";
} else {
    echo "Error: " . $mysqli->error;
}
$mysqli->close();
