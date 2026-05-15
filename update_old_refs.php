<?php
$mysqli = new mysqli("localhost", "root", "", "users");
$result = $mysqli->query("SELECT id FROM sales_transactions WHERE reference_no IS NULL OR reference_no = ''");
while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $ref = 'OLD-' . str_pad($id, 6, '0', STR_PAD_LEFT);
    $mysqli->query("UPDATE sales_transactions SET reference_no = '$ref' WHERE id = $id");
}
echo "Updated old records with reference numbers.";
