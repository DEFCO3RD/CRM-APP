<?php
session_start();
require_once "dbconn.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform data validation (you can add more validation as needed)
    if (empty($email) || empty($password)) {
        // Handle validation errors
        echo "Please fill in all fields.";
    } else {
        // Check if the user exists in the database
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // User found, verify the password
            $row = $result->fetch_assoc();
            if (password_verify($password, $row["password"])) {
                // Password is correct
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["account_type"] = $row["account_type"];

                // Redirect to the specific dashboard based on account type
                if ($row["account_type"] === 'Account Officer') {
                    header("Location: dashboard_officer.php"); // Replace with your Account Officer dashboard URL
                } else if ($row["account_type"] === 'Account Manager') {
                    header("Location: dashboard_manager.php"); // Replace with your Account Manager dashboard URL
                }
                exit;
            } else {
                // Incorrect password
                echo "Invalid password. Please try again.";
            }
        } else {
            // User not found
            echo "User not found. Please check your email.";
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>
