<?php
require_once "dbconn.php"; // Include the database connection

// Function to generate a unique filename for the uploaded image
function generateFilename($fileExt) {
    return md5(uniqid()) . '.' . $fileExt;
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $title = $_POST["title"];
    $category = $_POST["category"];
    $comments = $_POST["comments"];

    // Check if an image file was uploaded
    if (isset($_FILES["image"])) {
        $file = $_FILES["image"];
        $fileName = $file["name"];
        $fileTmpName = $file["tmp_name"];
        $fileSize = $file["size"];
        $fileError = $file["error"];
        $fileType = $file["type"];

        // Check for image upload errors
        if ($fileError === UPLOAD_ERR_OK) {
            // Get the file extension
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            
            // Allowed file types
            $allowedExtensions = array("jpg", "jpeg", "png", "gif");

            if (in_array($fileExt, $allowedExtensions)) {
                // Generate a unique filename for the uploaded image
                $newFileName = generateFilename($fileExt);
                
                // Move the uploaded file to the destination folder
                $destination = "uploads/" . $newFileName;
                move_uploaded_file($fileTmpName, $destination);

                // Insert promotion details into the database
                $sql = "INSERT INTO promotions (title, category, image_path, comments) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $title, $category, $destination, $comments);
                if ($stmt->execute()) {
                    echo '<script>alert("Promotion posted successfully!"); window.location.href = "dashboard_manager.php";</script>';
                    exit();
                } else {
                    // Handle the error, e.g., display an error message to the user
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                // Close the statement
                $stmt->close();
            } else {
                echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
            }
        } else {
            echo "Error uploading the image.";
        }
    }
}
?>
