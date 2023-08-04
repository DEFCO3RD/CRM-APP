<?php include_once("header.php") ?>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">

                  <span class="d-none d-lg-block">CRM</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create an account</p>
                  </div>
                  <!-- HTML structure for the alert messages -->
                  <div class="alert alert-success" id="successAlert"></div>
                  <div class="alert alert-error" id="errorAlert"></div>
                  <form class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email address!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <label for="confirmPassword" class="form-label">Confirm Password</label>
                      <input type="password" name="confirm_password" class="form-control" id="confirmPassword" required>
                      <div class="invalid-feedback">Please confirm your password!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Account type</label>
                      <select class="form-select" name="account_type">
                        <option value="Account Officer">Account Officer</option>
                        <option value="Account Manager">Account Manager</option>
                      </select>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
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
    .alert {
      position: fixed;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      padding: 10px 20px;
      border-radius: 5px;
      font-size: 16px;
      font-weight: bold;
      color: #fff;
      display: none;
      z-index: 9999;
    }

    .alert-success {
      background-color: #28a745;
    }

    .alert-error {
      background-color: #dc3545;
    }
  </style>



  <script>

     // Function to show an HTML alert
     function showAlert(message, isSuccess) {
            const alertDiv = isSuccess ? document.getElementById('successAlert') : document.getElementById('errorAlert');
            alertDiv.innerText = message;
            alertDiv.style.display = 'block';

            // Automatically hide the alert after a few seconds
            setTimeout(function() {
                alertDiv.style.display = 'none';
            }, 5000); // Adjust the duration (in milliseconds) as needed
        }

        // Function to handle form submission
        function handleSubmit(event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);

            fetch('register.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showAlert(data.message, true);

                    // Redirect to the login page after successful registration
                    setTimeout(function() {
                        window.location.href = 'pages-login.php';
                    }, 2000); // Delay the redirection (in milliseconds) to show the success message
                } else {
                    showAlert(data.message, false);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        // Add a listener to the form submission
        const form = document.querySelector('.needs-validation');
        form.addEventListener('submit', handleSubmit);
  </script>
</body>

</html>

</script>
</body>

</html>


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