<?php
require_once "dbconn.php"; // Include the database connection
// ... Your existing PHP code to handle form submission and database connection ...

// Check if the account officer is logged in and their account type is 'Account Officer'
if (isset($_SESSION["user_id"]) && isset($_SESSION["account_type"]) && $_SESSION["account_type"] === "Account Officer") {
    // Get the account officer's user_id from the session
    $user_id = $_SESSION["user_id"];

    // Fetch the account officer's name from the users table based on their user_id
    $sql = "SELECT name FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if the query was successful and if the account officer exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $accountOfficerName = $row["name"];
    } else {
        // Account officer not found in the database, handle the error (e.g., display an error message)
        echo '<div class="alert alert-danger">Account officer not found.</div>';
        exit; // Exit the script
    }
    
    // Get the form data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $phoneNumber = $_POST["phoneNumber"];
    $email = $_POST["email"];
    $country = $_POST["country"];
    $stateProvince = $_POST["stateProvince"];
    $number = $_POST["number"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $gender = $_POST["gender"];
    $deposit = $_POST["deposit"];

    // Perform data validation (you can add more validation as needed)
    if (empty($firstName) || empty($lastName) || empty($phoneNumber) || empty($email) || empty($country) || empty($stateProvince) || empty($number) || empty($dateOfBirth) || empty($gender) || empty($deposit)) {
        // Handle validation errors
        echo '<div class="alert alert-danger">All fields are required.</div>';
    } else {
        // Save the customer registration data to the database, including the account officer name
        $sql = "INSERT INTO customer_registration (first_name, last_name, phone_number, email, country, state_province, number, date_of_birth, gender, deposit, approval_status, account_officer_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $approval_status = 0; // Set approval_status to 0 (pending) initially
        $stmt->bind_param("ssssssisssis", $firstName, $lastName, $phoneNumber, $email, $country, $stateProvince, $number, $dateOfBirth, $gender, $deposit, $approval_status, $accountOfficerName);
        if ($stmt->execute()) {
            // Registration successful. You can send a success response to the client.
            echo '<div class="alert alert-success">Customer registration successful!</div>';
        } else {
            // Handle the error, e.g., display an error message to the user
            echo '<div class="alert alert-danger">Error: ' . $sql . "<br>" . $conn->error . '</div>';
        }

        // Close the statement
        $stmt->close();
    }
} else {
    // Account officer is not logged in or is not an 'Account Officer'.
    // Redirect to the login page or display an error message.
    // Replace this with your preferred action for handling unauthenticated access.
    header("Location: pages-login.php");
    exit;
}

// Display the customer registration data in a table on the account officer's dashboard
$sql = "SELECT * FROM customer_registration WHERE account_officer_name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $accountOfficerName);
$stmt->execute();
$result = $stmt->get_result();
?>

