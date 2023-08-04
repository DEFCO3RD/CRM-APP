<?php include("officerhead.php")?>
<?php include("officerside.php")?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Customers list</h1>

    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body" style="overflow-x:auto;">


              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>Number</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Deposit</th>
                    <th>Status</th>
                    <th>A/C number</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // ... Your existing PHP code to handle form submission and insert data ...
                  include_once('dbconn.php');
                  // Fetch customer registration data from the database
                  $sql = "SELECT * FROM customer_registration";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    // Generate table rows for each customer registration data
                  
                    while ($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                        <td>
                          <?php echo $row["first_name"]; ?>
                        </td>
                        <td>
                          <?php echo $row["last_name"]; ?>
                        </td>
                        <td>
                          <?php echo $row["phone_number"]; ?>
                        </td>
                        <td>
                          <?php echo $row["email"]; ?>
                        </td>
                        <td>
                          <?php echo $row["country"]; ?>
                        </td>
                        <td>
                          <?php echo $row["state_province"]; ?>
                        </td>
                        <td>
                          <?php echo $row["number"]; ?>
                        </td>
                        <td>
                          <?php echo $row["date_of_birth"]; ?>
                        </td>
                        <td>
                          <?php echo $row["gender"]; ?>
                        </td>
                        <td>
                          <?php echo $row["deposit"]; ?>
                        </td>
                        <td>
                          <?php echo ($row["approval_status"] == 0 ? "Pending" : "Approved"); ?>
                        </td>
                        <td>
                          <?php echo ($row["account_number"] ? $row["account_number"] : "N/A"); ?>
                        </td>
                        <td>
                          <!-- Edit button (link) with correct data-bs-target -->
                          <a class="btn btn-primary" href="#" data-bs-toggle="modal"
                            data-bs-target="#editModal<?php echo $row['id']; ?>">Edit</a>

                        </td>
                        <td> <a href='officerdelete.php?id=<?php echo $row["id"]; ?>' class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                      <!-- Edit Customer Details Modal -->
                      <div class="modal fade" id="editModal<?php echo $row["id"]; ?>" tabindex="-1"
                        aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editModalLabel">Edit Customer Details</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                              <div id="alert" class="alert" style="display: none;"></div>
                              <form action="officer_edit_customer.php" method="post">
                                <input type="hidden" name="customer_id" value="<?php echo $row["id"]; ?>">
                                <div class="mb-3">
                                  <label for="firstName" class="form-label">First Name</label>
                                  <input type="text" class="form-control" name="firstName"
                                    value="<?php echo htmlspecialchars($row["first_name"]); ?>" required>
                                </div>
                                <div class="mb-3">
                                  <label for="lastName" class="form-label">Last Name</label>
                                  <input type="text" class="form-control" name="lastName"
                                    value="<?php echo htmlspecialchars($row["last_name"]); ?>" required>
                                </div>
                                <div class="mb-3">
                                  <label for="phoneNumber" class="form-label">Phone Number</label>
                                  <input type="tel" class="form-control" name="phoneNumber"
                                    value="<?php echo isset($row["phone_number"]) ? htmlspecialchars($row["phone_number"]) : ''; ?>"
                                    required>
                                </div>
                                <div class="mb-3">
                                  <label for="email" class="form-label">Email</label>
                                  <input type="email" class="form-control" name="email"
                                    value="<?php echo isset($row["email"]) ? htmlspecialchars($row["email"]) : ''; ?>"
                                    required>
                                </div>
                                <div class="mb-3">
                                  <label for="country" class="form-label">Country</label>
                                  <input type="text" class="form-control" name="country"
                                    value="<?php echo isset($row["country"]) ? htmlspecialchars($row["country"]) : ''; ?>"
                                    required>
                                </div>
                                <div class="mb-3">
                                  <label for="stateProvince" class="form-label">State/Province</label>
                                  <input type="text" class="form-control" name="stateProvince"
                                    value="<?php echo isset($row["state_province"]) ? htmlspecialchars($row["state_province"]) : ''; ?>"
                                    required>
                                </div>
                                <div class="mb-3">
                                  <label for="number" class="form-label">Number</label>
                                  <input type="number" class="form-control" name="number"
                                    value="<?php echo isset($row["number"]) ? htmlspecialchars($row["number"]) : ''; ?>"
                                    required>
                                </div>
                                <div class="mb-3">
                                  <label for="dateOfBirth" class="form-label">Date of birth</label>
                                  <input type="date" class="form-control" name="dateOfBirth"
                                    value="<?php echo isset($row["date_of_birth"]) ? htmlspecialchars($row["date_of_birth"]) : ''; ?>"
                                    required>
                                </div>
                                <div class="mb-3">
                                  <label for="gender" class="form-label">Gender</label>
                                  <select name="gender" class="form-select" required>
                                    <option value="">Select one</option>
                                    <option value="male" <?php if (isset($row["gender"]) && $row["gender"] === 'male')
                                      echo 'selected'; ?>>Male</option>
                                    <option value="female" <?php if (isset($row["gender"]) && $row["gender"] === 'female')
                                      echo 'selected'; ?>>Female</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="deposit" class="form-label">Deposit</label>
                                  <input type="text" class="form-control" name="deposit"
                                    value="<?php echo isset($row["deposit"]) ? htmlspecialchars($row["deposit"]) : ''; ?>"
                                    required>
                                </div>


                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                    }
                  }
                  ?>
                </tbody>
              </table>


              <!-- End Default Table Example -->
            </div>
          </div>



        </div>
      </div>

      </div>
      </div>
    </section>

  </main><!-- End #main -->



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