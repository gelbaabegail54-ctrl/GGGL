<?php
$mysqli = new mysqli("localhost", "root", "", "users");
$result = $mysqli->query("DESCRIBE rice_inventory");
while($row = $result->fetch_assoc()) {
    print_r($row);
}
