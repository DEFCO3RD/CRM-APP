<?php
// Database connection credentials
$servername = "localhost";     
$username = "root";   
$password = "";   
$dbname = "crm";         

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
