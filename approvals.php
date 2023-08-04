<?php
require_once "dbconn.php"; // Include the database connection

// Query to fetch the count of customer accounts with approval_status = 0 (not yet approved)
$sqlNotApproved = "SELECT COUNT(*) AS total_not_approved FROM customer_registration WHERE approval_status = 0";
$resultNotApproved = $conn->query($sqlNotApproved);

// Query to fetch the count of customer accounts with approval_status = 1 (approved)
$sqlApproved = "SELECT COUNT(*) AS total_approved FROM customer_registration WHERE approval_status = 1";
$resultApproved = $conn->query($sqlApproved);

// Check if the queries were successful
if ($resultNotApproved && $resultApproved) {
    $rowNotApproved = $resultNotApproved->fetch_assoc();
    $rowApproved = $resultApproved->fetch_assoc();

    $totalNotApproved = $rowNotApproved['total_not_approved'];
    $totalApproved = $rowApproved['total_approved'];
} else {
    $totalNotApproved = 0; // Set to 0 if there's an error in the query
    $totalApproved = 0; // Set to 0 if there's an error in the query
}
?>