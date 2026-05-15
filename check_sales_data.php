<?php
$mysqli = new mysqli("localhost", "root", "", "users");
$result = $mysqli->query("SELECT * FROM sales_transactions");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
