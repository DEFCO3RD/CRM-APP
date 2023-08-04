<?php
// fetchpromotion.php

// Include the database connection
require_once "dbconn.php";

// Fetch promotions data from the database
$sql = "SELECT * FROM promotions";
$result = $conn->query($sql);

?>