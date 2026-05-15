<?php
$mysqli = new mysqli("localhost", "root", "", "users");
$result = $mysqli->query("DESCRIBE sales_transactions");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
