<?php
$db = mysqli_connect('localhost', 'root', '', 'users');
if (!$db) die("Connection failed: " . mysqli_connect_error());
$sql = "UPDATE sales_transactions SET reference_no = CONCAT('OLD-', id) WHERE reference_no IS NULL OR reference_no = ''";
if (mysqli_query($db, $sql)) {
    echo "Existing rows updated with reference numbers";
} else {
    echo "Error updating rows: " . mysqli_error($db);
}
mysqli_close($db);
?>