<?php
require_once "dbconn.php"; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["customer_id"])) {
    // Get the customer ID from the form submission
    $customer_id = $_POST["customer_id"];

    // Get the updated form data
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
        echo "All fields are required.";
    } else {
        // Update the customer record in the database
        $sql = "UPDATE customer_registration SET first_name = ?, last_name = ?, phone_number = ?, email = ?, country = ?, state_province = ?, number = ?, date_of_birth = ?, gender = ?, deposit = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);

        // Make sure to bind the customer_id as an integer
        $stmt->bind_param("ssssssisssi", $firstName, $lastName, $phoneNumber, $email, $country, $stateProvince, $number, $dateOfBirth, $gender, $deposit, $customer_id);

        if ($stmt->execute()) {
            // Update successful. Show a JavaScript alert with the success message.
            echo '<script>alert("Customer updated successfully!"); window.location.href = "customerapprovaltable.php";</script>';
          } else {
            // Handle the error, e.g., show a JavaScript alert with the error message.
            echo '<script>alert("Error: ' . $sql . '\n' . $conn->error . '"); window.location.href = "edit_customer.php?id=' . $customer_id . '";</script>';
          }
      
        // Close the statement
        $stmt->close();
    }
} else {
    // Invalid request, you can redirect the user to the dashboard or display an error message.
    echo "Invalid request.";
}
?>