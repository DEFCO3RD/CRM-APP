<?php
session_start();
require_once "dbconn.php";


// Function to get the name of the Account Officer based on the user_id
function getAccountManagerName($conn, $user_id) {
    $name = "Account Manager"; // Default name if not found in the database

    // Retrieve the user's name from the database based on the user_id
    $sql = "SELECT name FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
    }

    // Close the statement
    $stmt->close();

    return $name;
}
?>
