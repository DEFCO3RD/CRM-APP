<?php
require_once "dbconn.php"; // Include the database connection

// Query to fetch the count of account officers
$sql = "SELECT COUNT(*) AS total_account_managers FROM users WHERE account_type = 'Account Manager'";
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    $row = $result->fetch_assoc();
    $totalAccountManagers = $row['total_account_managers'];
} else {
    $totalAccountManagers = 0; // Set to 0 if there's an error in the query
}
?>