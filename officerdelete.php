<?php
// delete_customer.php

require_once "dbconn.php"; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $customer_id = $_GET["id"];

    // Prepare and execute the SQL query to delete the customer record
    $sql = "DELETE FROM customer_registration WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customer_id);

    if ($stmt->execute()) {
        // Deletion successful. You can redirect the user to the dashboard or display a success message here.
        header("Location: customers_table.php");
        exit();
    } else {
        // Handle the error, e.g., display an error message to the user
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the statement
    $stmt->close();
}