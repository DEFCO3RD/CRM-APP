<?php
require_once "dbconn.php"; // Include the database connection

// Function to generate a 10-digit account number
function generateAccountNumber() {
    return sprintf("%010d", mt_rand(1, 9999999999));
}

// Check if the form was submitted to approve a customer account
if (isset($_POST["approve_account"]) && isset($_POST["customer_id"])) {
    $customer_id = $_POST["customer_id"];
    $account_number = generateAccountNumber();

    // Update the customer account with the generated account number and set approval_status to 1 (approved)
    $sql = "UPDATE customer_registration SET account_number = ?, approval_status = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $account_number, $customer_id);
    
    if ($stmt->execute()) {
        // Update successful, redirect to home.php
        header("Location: customerapprovaltable.php");
        exit();
    } else {
        // Handle the error, e.g., display an error message to the user
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Query to fetch all customer accounts
$sql = "SELECT * FROM customer_registration";
$result = $conn->query($sql);
?>
