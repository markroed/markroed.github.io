<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed
date_default_timezone_set('Asia/Manila');
$useremail = $_SESSION["email"];
$useroffice = $_SESSION["office_id"];
$userid = $_SESSION["user_id"];
if (!isset($_SESSION['email']) || $_SESSION['email'] == '' || empty($_SESSION['email']) || $_SESSION['email'] == null) {
    echo "<script> window.location.replace('login.php') </script>";
} else { ?>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="img/logo.png" type="image/x-icon">

        <title>JRMSU DTS</title>

        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php include 'pages/sidebar.php'; ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php include 'pages/header.php'; ?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">My Documents</h1>
                        <p class="mb-4">Table of created documents.</p>


                        <div class="row">
                            <div class="col-sm-6">
                                <form action="document-history.php" method="get">
                                    <div class="input-group mb-3">

                                        <input type="text" class="form-control" placeholder="Enter Tracking Number" aria-label="Enter Tracking Number" aria-describedby="basic-addon2" name="trackingnumber">
                                        <div class="input-group-append">
                                            <input type="submit" class="btn btn-primary" id="buttn" name="track" />
                                        </div>
                                    </div>
                                </form>


                            </div>
                            <br>
                            <div class="col-sm-6">


                                <form action="add-document.php" method="get">
                                    <div class="input-group mb-3">

                                        <?php
                                        // SELECT Tracking number. Latest unused
                                        // $sql_tracking_number_main = "select * FROM `tracking_number` WHERE user_id = $userid AND status_id = 0 ORDER BY `tracking_number_id` ASC LIMIT 1";
                                        // $tracking_main = mysqli_query($db, $sql_tracking_number_main);
                                        // $row_track_main = mysqli_fetch_array($tracking_main);
                                        $datetimetracking = date('Ymd-His');
                                        $tracking_number_main = $useroffice . '-' . $datetimetracking;

                                        ?>

                                        <input type="text" class="form-control" placeholder=<?php echo $tracking_number_main; ?> aria-label="Enter Tracking Number" aria-describedby="basic-addon2" name="trackingnumber" value=<?php echo $tracking_number_main; ?> readonly>
                                        <div class="input-group-append">
                                            <input type="submit" class="btn btn-primary" id="buttn" name="add" value="Add" />
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>

                        <!-- DataTales  -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">My Documents</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tracking No.</th>
                                                <th>Title</th>
                                                <th>Created</th>
                                                <th>Type</th>
                                                <th>For</th>
                                                <th>Current Office</th>
                                                <th>Status</th>
                                                <th>Transaction Date</th>
                                                <th>Open</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                           // $sql_my_docs = "SELECT tracking_number.tracking_number,document.document_id,document.document_title,document.document_datecreated,type.document_type_name,for_action.for_action_name FROM tracking_number,document,type,for_action WHERE document.tracking_number_id = tracking_number.tracking_number_id AND document.document_type_id = type.document_type_id AND document.for_action_id = for_action.for_action_id AND document.office_origin_id = $useroffice ORDER BY document_datecreated; ";
                                            $sql_my_docs = "SELECT tracking_number.tracking_number,document.document_id,document.document_title,document.document_datecreated,type.document_type_name,for_action.for_action_name,transaction_history.office_id,transaction_history.transaction_datetime,transaction_history.latest_status_id,status.status_name,office.office_name FROM tracking_number,document,type,for_action,transaction_history,status,office WHERE document.tracking_number_id = tracking_number.tracking_number_id AND document.document_type_id = type.document_type_id AND document.for_action_id = for_action.for_action_id AND document.office_origin_id = $useroffice and transaction_history.transaction_datetime = (select max(transaction_history.transaction_datetime) from transaction_history where document.document_id = transaction_history.document_id)  AND status.status_id = transaction_history.latest_status_id AND office.office_id = transaction_history.office_id ORDER BY document_datecreated";
                                            
                                            $query_my_docs = mysqli_query($db, $sql_my_docs);

                                            if (!mysqli_num_rows($query_my_docs) > 0) {
                                                echo '<td colspan="11"><center>No-Data!</center></td>';
                                            } else {
                                                while ($rows_my_docs = mysqli_fetch_array($query_my_docs)) {
                                                    echo ' <tr>
																								<td>' . $rows_my_docs['tracking_number'] . '</td>
																								<td>' . $rows_my_docs['document_title'] . '</td>
                                                                                                <td>' . date('m/d/Y h:i:s A', strtotime($rows_my_docs['document_datecreated'])) . '</td>
                                                                                                <td>' . $rows_my_docs['document_type_name'] . '</td>
                                                                                                <td>' . $rows_my_docs['for_action_name'] . '</td>
                                                                                                <td>' . $rows_my_docs['office_name'] . '</td>
                                                                                                
                                                                                                <td'; if ($rows_my_docs['status_name'] == 'Pending') {
                                                                                                  echo ' style="color: red;"';
                                                                                                } echo '>' . $rows_my_docs['status_name'] . '</td>

                                                                                                <td>' . date('m/d/Y h:i:s A', strtotime($rows_my_docs['transaction_datetime'])) . '</td>
                                                                                                <td>  <a class="btn btn-info" href="document-history.php?trackingnumber=' . $rows_my_docs['tracking_number'] . '"> Open</a> </td>
                                                                                             
                                                           </tr>';
                                                }
                                            }


                                            ?>

                                        </tbody>
                                    </table>
                                </div>
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
        <?php include 'pages/changePasswordModal.php'; ?>
        <!-- Logout Modal-->
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

        
        <!-- DataTables Print -->
        <script src="vendor/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
        <script src="vendor/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
        <script src="vendor/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
        <script src="vendor/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>

        <script src="vendor/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
        <script src="vendor/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
        <!--  -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <!-- Buttons extension CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

    </body>

</html <?php } ?>