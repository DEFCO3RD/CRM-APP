<?php
// Assuming you have already connected to the database using $conn
require ("dbconn.php");
// Query to get the total count of promotions
$sqlCount = "SELECT COUNT(*) AS total_count FROM promotions";
$resultCount = $conn->query($sqlCount);

if ($resultCount->num_rows > 0) {
    $row = $resultCount->fetch_assoc();
    $totalPromotions = $row["total_count"];
} else {
    $totalPromotions = 0;
}
?>
