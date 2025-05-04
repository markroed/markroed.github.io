<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  //include connection file
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

                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                    <h6 class="m-0 font-weight-bold text-primary">Transaction</h6>
                                    <?php if (isset($_GET['patient_id'])) { ?>
                                        <a href="add-transaction.php?patient_id=<?php echo $_GET['patient_id']; ?>" class="btn btn-success btn-sm">
                                            <i class="fas fa-plus"></i> Create Transaction
                                        </a>
                                    <?php } ?>
                                </div>
                                

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Patient Name</th>
                                                    <th>Consultation Date</th>
                                                    <th>Open</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Fetch patient name from patients table and consultation date from finalprescriptions
                                                $query = "
            SELECT p.name, fp.date, fp.patientId 
            FROM finalprescriptions fp
            INNER JOIN patients p ON fp.patientId = p.patientId
            ORDER BY fp.date DESC
        ";
                                                $result = mysqli_query($db, $query);

                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<tr>";
                                                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                                        echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                                                        echo "<td><a href='view-transaction.php?patient_id=" . $row['patientId'] . "' class='btn btn-primary btn-sm'>OPEN</a></td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='3' class='text-center'>No records found</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>

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
        <!-- jQuery (must be loaded before Bootstrap and other plugins) -->
        <script src="vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Bundle (includes Popper.js) -->
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- jQuery Easing Plugin -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- DataTables Plugin -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Admin Template Core Script -->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Custom Scripts for DataTables -->
        <script src="js/demo/datatables-demo.js"></script>

        <!-- DataTables Print -->
        <script src="vendor/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
        <script src="vendor/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
        <script src="vendor/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
        <script src="vendor/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
        <!--  -->
        <!-- <script src="vendor/datatables/dataTables.bootstrap4.min.css"></script> change to online-->

        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"> -->

        <!-- Buttons extension CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">



    </body>

</html>

<?php } ?>