<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  //include connection file
include("process-client.php");
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed
date_default_timezone_set('Asia/Manila');
$adminUsername = $_SESSION["adminUsername"];
if (!isset($_SESSION['adminUsername']) || $_SESSION['adminUsername'] == '' || empty($_SESSION['adminUsername']) || $_SESSION['adminUsername'] == null) {
    echo "<script> window.location.replace('login.php') </script>";
} else {
?>
    <?php include 'pages/header.php'; ?>


    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <?php include 'pages/sidebar.php'; ?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">



                    <!-- Begin TopBar Content -->
                    <?php include 'pages/topbar.php'; ?>
                    <!-- End TopBar Content -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">

                            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                        </div>

                        <div class="container mt-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Add New Client</h6>
                                </div>
                                <div class="card-body">
                                    <form action="process-client.php" method="POST">

                                        <!-- Patient Information Section -->
                                        <h4 class="mb-3">Patient Information</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">Patient Name:</label>
                                                <input type="text" name="patient_name" class="form-control" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Age:</label>
                                                <input type="number" name="age" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label class="form-label">Address:</label>
                                                <textarea name="address" class="form-control" rows="2"></textarea>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Gender:</label>
                                                <select name="gender" class="form-control">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-4">
                                                <label class="form-label">Date of Birth:</label>
                                                <input type="date" name="dob" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Contact No:</label>
                                                <input type="text" name="contact_no" class="form-control">
                                            </div>

                                        </div>


                                        <!-- Submit Button -->
                                        <button type="submit" class="btn btn-primary mt-4">Add Client</button>

                                    </form>
                                </div>

                                <!-- Content Row -->
                                <div class="row">

                                    <!-- Content Column -->
                                    <div class="col-lg-6 mb-4">



                                    </div>
                                </div>

                            </div>
                            <!-- /.container-fluid -->
                        </div>
                    </div>
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <?php include 'pages/footer.php'; ?>

                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>


        <!-- Logout Modal-->
        <?php include 'pages/logoutmodal.php'; ?>
        <!-- Logout Modal-->

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

    </body>

</html>

<?php } ?>