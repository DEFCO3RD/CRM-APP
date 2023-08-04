<?php include("officerhead.php")?>
<?php include("officerside.php")?>

  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Register Customers</h1>

    </div><!-- End Page Title -->
    <?php
    require_once "dbconn.php"; // Include the database connection
    
    // Initialize variables for alerts
    $alertMessage = "";
    $alertType = ""; // Values: "success", "danger"
    
    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
        $alertMessage = "All fields are required.";
        $alertType = "danger";
      } else {
        // Save the customer registration data to the database
        $sql = "INSERT INTO customer_registration (first_name, last_name, phone_number, email, country, state_province, number, date_of_birth, gender, deposit, approval_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $approval_status = 0; // Set approval_status to 0 (pending) initially
        $stmt->bind_param("ssssssisssi", $firstName, $lastName, $phoneNumber, $email, $country, $stateProvince, $number, $dateOfBirth, $gender, $deposit, $approval_status);
        if ($stmt->execute()) {
          // Registration successful
          $alertMessage = "Customer registration successful!";
          $alertType = "success";
        } else {
          // Handle the error
          $alertMessage = "An error occurred. Please try again later.";
          $alertType = "danger";
        }

        // Close the statement
        $stmt->close();
      }
    }
    ?>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <!-- General Form Elements -->
              <?php if (!empty($alertMessage)) { ?>
                <div class="alert alert-<?php echo $alertType; ?> mt-5" id="alertMessage" role="alert">
                  <?php echo $alertMessage; ?>
                </div>
              <?php } ?>
              <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                method="post">
                <div class="row mb-3 mt-5">
                  <label for="firstName" class="col-sm-2 col-form-label">First name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="firstName" id="firstName" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="lastName" class="col-sm-2 col-form-label">Last name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="lastName" id="lastName" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="phoneNumber" class="col-sm-2 col-form-label">Phone Number</label>
                  <div class="col-sm-10">
                    <input type="tel" class="form-control" name="phoneNumber" id="phoneNumber" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="email" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="country" class="col-sm-2 col-form-label">Country</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="country" id="country" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="stateProvince" class="col-sm-2 col-form-label">State/Province</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="stateProvince" id="stateProvince" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="number" class="col-sm-2 col-form-label">Number</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="number" id="number" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="dateOfBirth" class="col-sm-2 col-form-label">Date of birth</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="dateOfBirth" id="dateOfBirth" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                  <div class="col-sm-10">
                    <select name="gender" id="gender" class="form-select" required>
                      <option value="">Select one</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="deposit" class="col-sm-2 col-form-label">Deposit</label>
                  <div class="col-sm-10">
                    <input type="tel" class="form-control" name="deposit" id="deposit"
                      placeholder="First deposit amount" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->


  <!-- Add this HTML code at the top of your HTML file (within the <head> section) -->
  <style>
    /* Your CSS styles for the alert messages */
    .alert {
      padding: 8px 16px;
      border-radius: 4px;
      margin-bottom: 16px;
    }

    .alert-success {
      background-color: #d4edda;
      border-color: #c3e6cb;
      color: #155724;
    }

    .alert-danger {
      background-color: #f8d7da;
      border-color: #f5c6cb;
      color: #721c24;
    }
  </style>
 <script>
        // Function to hide the alert after 5 seconds
        function hideAlert() {
            const alertMessage = document.getElementById('alertMessage');
            setTimeout(function() {
                alertMessage.style.display = 'none';
            }, 5000); // 5000 milliseconds (5 seconds)
        }

        // Call the hideAlert function when the page loads
        window.onload = hideAlert;
    </script>






  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>