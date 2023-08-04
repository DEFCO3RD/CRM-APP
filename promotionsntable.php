<?php require_once("fetchpromotion.php") ?>
<?php require_once("managerhead.php")?>
<?php require_once("managerside.php")?>
   
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Posted Promotions</h1>

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
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Check if there are promotions data in the database
                                    if ($result->num_rows > 0) {
                                        // Loop through each promotion and display its details in a row
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row["title"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["category"]; ?>
                                                </td>
                                                <td>
                                                    <?php if ($row["image_path"]): ?>
                                                        <img src="uploads/<?php echo $row["image_path"]; ?>" alt="Image">
                                                    <?php else: ?>
                                                        No Image
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["comments"]; ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        // Display a message if no promotions data found
                                        echo "<tr><td colspan='4'>No promotions found.</td></tr>";
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