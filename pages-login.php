<?php include_once("header.php") ?>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">

                  <span class="d-none d-lg-block">CRM</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>

                  </div>
                  <?php
                  // Check if there's an error message in the session
                  if (isset($_SESSION["login_error"])) {
                    echo '<div class="alert alert-danger" id="errorAlert">' . $_SESSION["login_error"] . '</div>';
                    unset($_SESSION["login_error"]); // Clear the error message
                  }
                  ?>
                  <form class="row g-3 needs-validation" action="login_process.php" method="post" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" id="email" class="form-control" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" id="password" class="form-control" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>


                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="pages-register.php">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>



            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <style>
    /* Your CSS styles for the alert messages */
    .alert {
      padding: 12px;
      border-radius: 4px;
      margin-bottom: 10px;
      font-size: 16px;
    }

    .alert-danger {
      background-color: red;
      color: #fff;
      text-align: center;
    }
  </style>
   <script>
        // Function to handle form submission
        function handleSubmit(event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Check if there's an error message in the response
                if (data) {
                    const errorAlert = document.getElementById('errorAlert');
                    errorAlert.innerText = data;
                    errorAlert.style.display = 'block';
                    setTimeout(function() {
                        errorAlert.style.display = 'none';
                    }, 5000); // Hide the error alert after 5 seconds
                } else {
                    // Login successful, redirect to the specific dashboard based on account type
                    window.location.href = 'dashboard.php'; // Replace with your dashboard page URL
                }
            })
            .catch(error => {
                console.error('Error:', error);
                const errorAlert = document.getElementById('errorAlert');
                errorAlert.innerText = 'An error occurred. Please try again later.';
                errorAlert.style.display = 'block';
                setTimeout(function() {
                    errorAlert.style.display = 'none';
                }, 5000); // Hide the error alert after 5 seconds
            });
        }

        // Add a listener to the form submission
        const loginForm = document.getElementById('loginForm');
        loginForm.addEventListener('submit', handleSubmit);
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