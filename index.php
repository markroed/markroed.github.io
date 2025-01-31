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
} else {
?>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>JRMSU IPCR</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

                        </div>

                        
                        <!-- Start Page Content -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary"> Pending Documents</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="col mr-2">
                                        
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $sql_my_docs = "SELECT tracking_number.tracking_number,document.document_id,document.document_title,document.document_datecreated,type.document_type_name,for_action.for_action_name,transaction_history.office_id,transaction_history.transaction_datetime,transaction_history.latest_status_id FROM tracking_number,document,type,for_action,transaction_history WHERE document.tracking_number_id = tracking_number.tracking_number_id AND document.document_type_id = type.document_type_id AND document.for_action_id = for_action.for_action_id AND transaction_history.office_id = $useroffice and transaction_history.transaction_datetime = (select max(transaction_history.transaction_datetime) from transaction_history where document.document_id = transaction_history.document_id) AND (transaction_history.latest_status_id = 2 OR transaction_history.latest_status_id = 3 OR transaction_history.latest_status_id = 4)";
                                                $query_my_docs = mysqli_query($db, $sql_my_docs);

                                                $pending =  mysqli_num_rows($query_my_docs);
                                                ?>
                                                <h5><?php echo $pending; ?></h5>
                                            </div> <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Track Documents</h6>
                                    </div>
                                    <div class="card-body">

                                        <form action="document-history.php" method="get">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Enter Tracking Number" aria-label="Enter Tracking Number" aria-describedby="basic-addon2" name="trackingnumber">
                                                <div class="input-group-append">
                                                    <input type="submit" class="btn btn-primary" id="buttn" name="track" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Receive Documents</h6>
                                    </div>
                                    <div class="card-body">
                                       <form action="document-history.php" method="get">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Enter Tracking Number" aria-label="Enter Tracking Number" name="trackingnumber" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <input type="submit" class="btn btn-primary" id="buttn" name="receive" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Release Documents</h6>
                                    </div>
                                    <div class="card-body">
                                    <form action="release-document.php" method="get">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Enter Tracking Number" aria-label="Enter Tracking Number" name="trackingnumber" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <input type="submit" class="btn btn-primary" id="buttn" name="release" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <!-- <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Tag as Terminal</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Enter Tracking Number" aria-label="Enter Tracking Number" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <input type="submit" class="btn btn-primary" id="buttn" name="tag" value="   Tag    " />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Add Document</h6>
                                    </div>
                                    <div class="card-body">

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

                                                <input type="text" class="form-control" placeholder=<?php echo $tracking_number_main; ?> aria-label="Enter Tracking Number" aria-describedby="basic-addon2" name="trackingnumber" value=<?php echo $tracking_number_main; ?> readonly >
                                                <div class="input-group-append">
                                                    <input type="submit" class="btn btn-primary" id="buttn" name="add"  />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <!-- Close Page Content -->

                        <!-- Content Row -->


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