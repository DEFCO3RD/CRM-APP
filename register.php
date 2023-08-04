<?php
require_once "dbconn.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    $accountType = $_POST["account_type"];

    // Perform data validation (you can add more validation as needed)
    if (empty($name) || empty($email) || empty($password) || empty($confirmPassword) || empty($accountType)) {
        // Handle validation errors
        $response["success"] = false;
        $response["message"] = "All fields are required.";
    } elseif ($password !== $confirmPassword) {
        // Handle password mismatch
        $response["success"] = false;
        $response["message"] = "Passwords do not match.";
    } else {
        // Hash the password for security (you may use stronger encryption methods)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the SQL query to insert the user data into the database
        $sql = "INSERT INTO users (name, email, password, account_type) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $email, $hashedPassword, $accountType);
        if ($stmt->execute()) {
            // Registration successful
            $response["success"] = true;
            $response["message"] = "Account created successfully!";
        } else {
            // Handle the error
            $response["success"] = false;
            $response["message"] = "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the database connection
$conn->close();

// Return the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
