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
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Add Client</h6>
                                </div>
                                <div class="card-body">
                                    <form action="process_client.php" method="POST">

                                        <!-- Patient Information Section -->
                                        <h4 class="mb-3">Patient Information</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">Patient Name:</label>
                                                <input type="text" name="patient_name" class="form-control" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Date:</label>
                                                <input type="date" name="date" class="form-control">
                                            </div>

                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label class="form-label">Address:</label>
                                                <textarea name="address" class="form-control" rows="2"></textarea>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Age:</label>
                                                <input type="number" name="age" class="form-control">
                                            </div>
                                            <div class="col-md-3">
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
                                                <input type="text" name="contact_no" class="form-control" required>
                                            </div>

                                        </div>

                                        <!-- Final Prescription -->
                                        <h4 class="mt-4">Final Prescription</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">OD:</label>
                                                <input type="text" name="od" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">VAsc:</label>
                                                <input type="number" name="odVAsc" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">PH:</label>
                                                <input type="number" name="odph" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">VAcc:</label>
                                                <input type="number" name="odVAcc" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label class="form-label">OS:</label>
                                                <input type="text" name="os" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">VAsc:</label>
                                                <input type="number" name="osVAsc" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">PH:</label>
                                                <input type="number" name="osph" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">VAcc:</label>
                                                <input type="number" name="osVAcc" class="form-control">
                                            </div>

                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label class="form-label">ADD:</label>
                                                <input type="text" name="addFirst" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">N.VA</label>
                                                <input type="number" name="addFirstNVA" class="form-control">
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label"></label>
                                                <input type="text" name="addSecond" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label"></label>
                                                <input type="number" name="addSecondNVA" class="form-control">
                                            </div>
                                        </div>


                                        <h4 class="mt-4">Retinoscopy</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">OD:</label>
                                                <input type="text" name="retinoscopy_od" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">OS:</label>
                                                <input type="number" name="retinoscopy_os" class="form-control">
                                            </div>
                                        </div>
                                        <h4 class="mt-4">Diagnosis</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">OD:</label>
                                                <input type="text" name="diagnosis_od" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">OS:</label>
                                                <input type="number" name="diagnosis_os" class="form-control">
                                            </div>
                                        </div>



                                        <!-- Lens Type (Checklist) -->
                                        <h4 class="mt-4">Lens Type</h4>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="hidden" name="sv" value="0">
                                                    <input type="checkbox" name="sv" value="1" class="form-check-input"> SV
                                                </div>
                                                <div class="form-check">
                                                    <input type="hidden" name="anti_rad" value="0">
                                                    <input type="checkbox" name="anti_rad" value="1" class="form-check-input"> Anti Rad
                                                </div>
                                                <div class="form-check">
                                                    <input type="hidden" name="mc" value="0">
                                                    <input type="checkbox" name="mc" value="1" class="form-check-input"> MC
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="hidden" name="kk" value="0">
                                                    <input type="checkbox" name="kk" value="1" class="form-check-input"> KK
                                                </div>
                                                <div class="form-check">
                                                    <input type="hidden" name="ft" value="0">
                                                    <input type="checkbox" name="ft" value="1" class="form-check-input"> FT
                                                </div>
                                                <div class="form-check">
                                                    <input type="hidden" name="pal" value="0">
                                                    <input type="checkbox" name="pal" value="1" class="form-check-input"> PAL
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="hidden" name="digital" value="0">
                                                    <input type="checkbox" name="digital" value="1" class="form-check-input"> Digital
                                                </div>
                                                <div class="form-check">
                                                    <input type="hidden" name="eyezen" value="0">
                                                    <input type="checkbox" name="eyezen" value="1" class="form-check-input"> Eyezen
                                                </div>
                                                <div class="form-check">
                                                    <input type="hidden" name="photo" value="0">
                                                    <input type="checkbox" name="photo" value="1" class="form-check-input"> Photo
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="hidden" name="trans" value="0">
                                                    <input type="checkbox" name="trans" value="1" class="form-check-input"> Trans
                                                </div>
                                                <div class="form-check">
                                                    <input type="hidden" name="blue_lens" value="0">
                                                    <input type="checkbox" name="blue_lens" value="1" class="form-check-input"> Blue Lens
                                                </div>
                                                <div class="form-check">
                                                    <input type="hidden" name="tint_colored" value="0">
                                                    <input type="checkbox" name="tint_colored" value="1" class="form-check-input"> Tint/Colored
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Frame Type (Options) -->
                                        <h4 class="mt-4">Frame Type</h4>
                                        <div class="mb-3">
                                            <select name="frame_type" class="form-control">
                                                <option value="Metal">Metal</option>
                                                <option value="Plastic">Plastic</option>
                                                <option value="Full Rim">Full Rim</option>
                                                <option value="Semi Rimless">Semi Rimless</option>
                                                <option value="Semi Rimless">Rimless</option>
                                            </select>
                                        </div>

                                        <!-- Contact Lens Type (Options) -->
                                        <h4 class="mt-4">Contact Lens Type</h4>
                                        <div class="mb-3">
                                            <select name="contact_lens_type" class="form-control">
                                                <option value="Dailies">Dailies</option>
                                                <option value="Conventional">Conventional</option>
                                                <option value="RGP">RGP</option>
                                                <option value="Ortho K">Ortho K</option>
                                                <option value="Multifocal">Multifocal</option>
                                                <option value="Colored">Colored</option>
                                            </select>
                                        </div>


                                        <!-- Frame Parameters -->
                                        <h4 class="mt-4">Frame Parameters</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label">HOR:</label>
                                                <input type="text" name="frame_hor" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">VER:</label>
                                                <input type="text" name="frame_ver" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">NBL:</label>
                                                <input type="text" name="frame_nbl" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <label class="form-label">FITTING H:</label>
                                                <input type="text" name="frame_fitting_h" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">SEGMENT H:</label>
                                                <input type="text" name="frame_segment_h" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">EFFECTIVE DIA:</label>
                                                <input type="text" name="frame_effective_dia" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <label class="form-label"><b>MONO/BINO PD:</b></label>
                                                <input type="text" name="frame_mono_bino_pd" class="form-control">
                                            </div>
                                        </div>


                                        <!-- Lens Brand -->


                                        

                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">LENS BRAND:</label>
                                                <input type="text" name="lens_brand" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">LENS PRICE:</label>
                                                <input type="text" name="lens_price" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">CONTACT LENS PRICE:</label>
                                                <input type="text" name="contact_lens_price" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">TOTAL AMOUNT:</label>
                                                <input type="text" name="total_amount" class="form-control">
                                            </div>
                                        </div>



                                        <!-- Chief Complaint (Checklist) -->
                                        <h4 class="mt-4">Chief Complaint</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input type="checkbox" name="chief_complaint[]" value="BOV" class="form-check-input"> BOV (Far/Near)
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="chief_complaint[]" value="Headache" class="form-check-input"> Headache
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Medical History (Checklist) -->
                                        <h4 class="mt-4">Medical History</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input type="checkbox" name="medical_hx[]" value="Hypertension" class="form-check-input"> Hypertension
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="medical_hx[]" value="Diabetes" class="form-check-input"> Diabetes
                                                </div>
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