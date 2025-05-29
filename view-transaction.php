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
} else if (!isset($_GET['patient_id']) || !isset($_GET['date'])) {
    die("Missing patient ID or date.");
} else {

    $patientId = $_GET['patient_id'];
    $date = $_GET['date'];
    $pName = $_GET['name'];
    include("transaction-view-query.php");



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
                                    <h6 class="m-0 font-weight-bold text-primary">Patient Information </h6>
                                </div>
                                <div class="card-body">
                                    <form action="process-client-history.php" method="POST">

                                        <input type="hidden" name="patientId" value="<?php echo isset($_GET['patient_id']) ? $_GET['patient_id'] : ''; ?>">


                                        <!-- Patient Information Section -->
                                        <h4 class="mb-3" style="text-transform: uppercase;"><?php echo $pName ?></h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label">Date:</label>
                                                <input type="date" name="date" class="form-control" value="<?php echo date('Y-m-d', strtotime($date)); ?>" readonly>
                                            </div>
                                        </div>




                                        <!-- Final Prescription -->
                                        <h4 class="mt-4">Final Prescription</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">OD:</label>
                                                <input type="text" name="od" value="<?php echo $result_finalprescriptions['od']; ?>" readonly class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">VAsc:</label>
                                                <input type="text" name="odVAsc" value="<?php echo $result_finalprescriptions['odVasc']; ?>" readonly class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">PH:</label>
                                                <input type="text" name="odph" value="<?php echo $result_finalprescriptions['odPh']; ?>" readonly class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">VAcc:</label>
                                                <input type="text" name="odVAcc" value="<?php echo $result_finalprescriptions['odVacc']; ?>" readonly class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label class="form-label">OS:</label>
                                                <input type="text" name="os" value="<?php echo $result_finalprescriptions['os']; ?>" readonly class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">VAsc:</label>
                                                <input type="text" name="osVAsc" value="<?php echo $result_finalprescriptions['osVasc']; ?>" readonly class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">PH:</label>
                                                <input type="text" name="osph" value="<?php echo $result_finalprescriptions['osPh']; ?>" readonly class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">VAcc:</label>
                                                <input type="text" name="osVAcc" value="<?php echo $result_finalprescriptions['osVacc']; ?>" readonly class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label class="form-label">ADD:</label>
                                                <input type="text" name="addFirst" value="<?php echo $result_finalprescriptions['addFirst']; ?>" readonly class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">N.VA:</label>
                                                <input type="text" name="addFirstNVA" value="<?php echo $result_finalprescriptions['addFirstNVA']; ?>" readonly class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" name="addSecond" value="<?php echo $result_finalprescriptions['addSecond']; ?>" readonly class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" name="addSecondNVA" value="<?php echo $result_finalprescriptions['addSecondNVA']; ?>" readonly class="form-control">
                                            </div>
                                        </div>

                                        <h4 class="mt-4">Retinoscopy</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">OD:</label>
                                                <input type="text" name="retinoscopy_od" value="<?php echo $result_retinoscopy['retinoscopyOD']; ?>" readonly class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">OS:</label>
                                                <input type="text" name="retinoscopy_os" value="<?php echo $result_retinoscopy['retinoscopyOS']; ?>" readonly class="form-control">
                                            </div>
                                        </div>

                                        <h4 class="mt-4">Diagnosis</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">OD:</label>
                                                <input type="text" name="diagnosis_od" value="<?php echo $result_diagnosis['diagnosisOD']; ?>" readonly class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">OS:</label>
                                                <input type="text" name="diagnosis_os" value="<?php echo $result_diagnosis['diagnosisOS']; ?>" readonly class="form-control">
                                            </div>
                                        </div>


                                        <!-- Lens Type (Checklist) -->
                                        <h4 class="mt-4">Lens Type</h4>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" name="sv" value="1" class="form-check-input" <?php if ($result_lenstype['SV'] == 1) echo 'checked'; ?> disabled> SV
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="anti_rad" value="1" class="form-check-input" <?php if ($result_lenstype['ANTI_RAD'] == 1) echo 'checked'; ?> disabled> Anti Rad
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="mc" value="1" class="form-check-input" <?php if ($result_lenstype['MC'] == 1) echo 'checked'; ?> disabled> MC
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" name="kk" value="1" class="form-check-input" <?php if ($result_lenstype['KK'] == 1) echo 'checked'; ?> disabled> KK
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="ft" value="1" class="form-check-input" <?php if ($result_lenstype['FT'] == 1) echo 'checked'; ?> disabled> FT
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="pal" value="1" class="form-check-input" <?php if ($result_lenstype['PAL'] == 1) echo 'checked'; ?> disabled> PAL
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" name="digital" value="1" class="form-check-input" <?php if ($result_lenstype['DIGITAL'] == 1) echo 'checked'; ?> disabled> Digital
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="eyezen" value="1" class="form-check-input" <?php if ($result_lenstype['EYEZEN'] == 1) echo 'checked'; ?> disabled> Eyezen
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="photo" value="1" class="form-check-input" <?php if ($result_lenstype['PHOTO'] == 1) echo 'checked'; ?> disabled> Photo
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" name="trans" value="1" class="form-check-input" <?php if ($result_lenstype['TRANS'] == 1) echo 'checked'; ?> disabled> Trans
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="blue_lens" value="1" class="form-check-input" <?php if ($result_lenstype['BLUE_LENS'] == 1) echo 'checked'; ?> disabled> Blue Lens
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="tint_colored" value="1" class="form-check-input" <?php if ($result_lenstype['TINS_COLORED'] == 1) echo 'checked'; ?> disabled> Tint/Colored
                                                </div>
                                            </div>
                                        </div>



                                        <!-- Frame Type (Options) -->
                                        <h4 class="mt-4">Frame Type</h4>
                                        <div class="mb-3">
                                            <select name="frame_type" class="form-control">
                                                <option value="None" selected>None</option>
                                                <option value="Metal">Metal</option>
                                                <option value="Plastic">Plastic</option>
                                                <option value="Full Rim">Full Rim</option>
                                                <option value="Semi Rimless">Semi Rimless</option>
                                                <option value="Rimless">Rimless</option>
                                            </select>
                                        </div>


                                        <!-- Contact Lens Type (Options) -->
                                        <h4 class="mt-4">Contact Lens Type</h4>
                                        <div class="mb-3">
                                            <select name="contact_lens_type" class="form-control" disabled>
                                                <option value="None" <?php if ($result_patientcontactlenstypes['value'] == 'None') echo 'selected'; ?>>None</option>
                                                <option value="Dailies" <?php if ($result_patientcontactlenstypes['value'] == 'Dailies') echo 'selected'; ?>>Dailies</option>
                                                <option value="Conventional" <?php if ($result_patientcontactlenstypes['value'] == 'Conventional') echo 'selected'; ?>>Conventional</option>
                                                <option value="RGP" <?php if ($result_patientcontactlenstypes['value'] == 'RGP') echo 'selected'; ?>>RGP</option>
                                                <option value="Ortho K" <?php if ($result_patientcontactlenstypes['value'] == 'Ortho K') echo 'selected'; ?>>Ortho K</option>
                                                <option value="Multifocal" <?php if ($result_patientcontactlenstypes['value'] == 'Multifocal') echo 'selected'; ?>>Multifocal</option>
                                                <option value="Colored" <?php if ($result_patientcontactlenstypes['value'] == 'Colored') echo 'selected'; ?>>Colored</option>
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
                                                <input type="number" name="total_amount" class="form-control">
                                            </div>
                                        </div>

                                        <hr>
                                        <h2 class="mt-4">OLD RX:</h2>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label">Date:</label>
                                                <input type="date" name="oldRXdate" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label class="form-label">OD:</label>
                                                <input type="text" name="old_od" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">VA:</label>
                                                <input type="text" name="old_odVA" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label class="form-label">OS:</label>
                                                <input type="text" name="old_os" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">VA:</label>
                                                <input type="text" name="old_osVA" class="form-control">
                                            </div>


                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label class="form-label">ADD:</label>
                                                <input type="text" name="old_add" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">VA</label>
                                                <input type="text" name="old_addVA" class="form-control">
                                            </div>

                                        </div>



                                        <!-- Lens Type (Checklist) -->
                                        <h4 class="mt-4">Lens Type</h4>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" name="old_sv" value="1" class="form-check-input"> SV
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="old_anti_rad" value="1" class="form-check-input"> Anti Rad
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="old_mc" value="1" class="form-check-input"> MC
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" name="old_kk" value="1" class="form-check-input"> KK
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="old_ft" value="1" class="form-check-input"> FT
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="old_pal" value="1" class="form-check-input"> PAL
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" name="old_digital" value="1" class="form-check-input"> Digital
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="old_eyezen" value="1" class="form-check-input"> Eyezen
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="old_photo" value="1" class="form-check-input"> Photo
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" name="old_trans" value="1" class="form-check-input"> Trans
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="old_blue_lens" value="1" class="form-check-input"> Blue Lens
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="old_tint_colored" value="1" class="form-check-input"> Tint/Colored
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Frame Type (Options) -->
                                        <h4 class="mt-4">Frame Type</h4>
                                        <div class="mb-3">
                                            <select name="old_frame_type" class="form-control">
                                                <option value="Metal">Metal</option>
                                                <option value="Plastic">Plastic</option>
                                                <option value="Full Rim">Full Rim</option>
                                                <option value="Semi Rimless">Semi Rimless</option>
                                                <option value="Rimless">Rimless</option>
                                            </select>
                                        </div>




                                        <!-- Chief Complaint (Checklist) -->
                                        <h4 class="mt-4">Chief Complaint</h4>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" name="BOV_FAR" value="1" class="form-check-input"> BOV (Far)
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="BOV_NEAR" value="1" class="form-check-input"> BOV (Near)
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="HEADACHE" value="1" class="form-check-input"> Headache
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" name="DOUBLE_VISION" value="1" class="form-check-input"> Double Vision
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="GLARING" value="1" class="form-check-input"> Glaring
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="ITCHY_EYES" value="1" class="form-check-input"> Itchy Eyes
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" name="REDNESS" value="1" class="form-check-input"> Redness
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="LACRIMATION" value="1" class="form-check-input"> Lacrimation
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="DRY_EYE" value="1" class="form-check-input"> Dry Eye
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Medical History (Checklist) -->
                                        <h4 class="mt-4">Ocular History</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input type="checkbox" name="GLAUCOMA" value="1" class="form-check-input"> Glaucoma
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="CATARACT" value="1" class="form-check-input"> Cataract
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input type="checkbox" name="RETINA" value="1" class="form-check-input"> Retina
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="MACULA" value="1" class="form-check-input"> Macula
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input type="checkbox" name="INJURIES" value="1" class="form-check-input"> Injuries
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="OTHERS" value="1" class="form-check-input"> Others
                                                </div>
                                            </div>
                                        </div>


                                        <!--Occupational History -->
                                        <h4 class="mt-4">Occupational History</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input type="checkbox" name="NON_WORKING" value="1" class="form-check-input"
                                                        <?php if ($result_occupationalhistory['NON_WORKING'] == 1) echo 'checked'; ?> disabled>
                                                    Non-Working
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="WORKING" value="1" class="form-check-input"
                                                        <?php if ($result_occupationalhistory['WORKING'] == 1) echo 'checked'; ?> disabled>
                                                    Working
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input type="checkbox" name="FIELD" value="1" class="form-check-input"
                                                        <?php if ($result_occupationalhistory['FIELD'] == 1) echo 'checked'; ?> disabled>
                                                    Field
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="OFFICE" value="1" class="form-check-input"
                                                        <?php if ($result_occupationalhistory['OFFICE'] == 1) echo 'checked'; ?> disabled>
                                                    Office
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input type="checkbox" name="WFH" value="1" class="form-check-input"
                                                        <?php if ($result_occupationalhistory['WFH'] == 1) echo 'checked'; ?> disabled>
                                                    Work From Home (WFH)
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="BUSINESS" value="1" class="form-check-input"
                                                        <?php if ($result_occupationalhistory['BUSINESS'] == 1) echo 'checked'; ?> disabled>
                                                    Business
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="STUDYING" value="1" class="form-check-input"
                                                        <?php if ($result_occupationalhistory['STUDYING'] == 1) echo 'checked'; ?> disabled>
                                                    Studying
                                                </div>
                                            </div>
                                        </div>


                                        <h4 class="mt-4">Medical History</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input type="checkbox" name="HYPERTENSION" value="1" class="form-check-input"> Hypertension
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="DIABETES" value="1" class="form-check-input"> Diabetes
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input type="checkbox" name="CVD" value="1" class="form-check-input"> Cardiovascular Disease (CVD)
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="ASTHMA" value="1" class="form-check-input"> Asthma
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <input type="checkbox" name="ALLERGIES" value="1" class="form-check-input"> Allergies
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="OTHERS" value="1" class="form-check-input"> Others
                                                </div>
                                            </div>
                                        </div>



                                        <h4 class="mt-4">Digital History</h4>
                                        <div class="row">
                                            <!-- No of Hours Input -->
                                            <div class="col-md-6">
                                                <label for="NO_OF_HOURS" class="form-label">No of Hours:</label>
                                                <input type="number" name="NO_OF_HOURS" id="NO_OF_HOURS" class="form-control" min="0">
                                            </div>

                                            <!-- Sleep Hours Input -->
                                            <div class="col-md-6">
                                                <label for="SLEEP_HOURS" class="form-label">Sleep Hours:</label>
                                                <input type="number" name="SLEEP_HOURS" id="SLEEP_HOURS" class="form-control" min="0">
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" name="LAPTOP" value="1" class="form-check-input"> Laptop
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="MOBILE" value="1" class="form-check-input"> Mobile
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <input type="checkbox" name="DESKTOP" value="1" class="form-check-input"> Desktop
                                                </div>
                                                <div class="form-check">
                                                    <input type="checkbox" name="TELEVISION" value="1" class="form-check-input"> Television
                                                </div>
                                            </div>
                                        </div>


                                        <div class="mt-4">
                                            <h4 class="mb-3">NPA</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label">OD:</label>
                                                    <input type="text" name="npa_od" class="form-control" placeholder="Enter OD value">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">OS:</label>
                                                    <input type="text" name="npa_os" class="form-control" placeholder="Enter OS value">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">OU:</label>
                                                    <input type="text" name="npa_ou" class="form-control" placeholder="Enter OU value">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <!-- Dominant Eye Section -->
                                            <h4 class="mb-3">Dominant Eye</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">OD:</label>
                                                    <input type="text" name="dominant_eye_od" class="form-control" placeholder="Enter OD value">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">OS:</label>
                                                    <input type="text" name="dominant_eye_os" class="form-control" placeholder="Enter OS value">
                                                </div>
                                            </div>

                                            <!-- NPA AGE Section -->
                                            <h4 class="mt-4 mb-3">NPA Age</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label">MIN:</label>
                                                    <input type="number" name="npa_min" class="form-control" placeholder="Min value" step="0.01">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">AVE:</label>
                                                    <input type="number" name="npa_ave" class="form-control" placeholder="Average value" step="0.01">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">MAX:</label>
                                                    <input type="number" name="npa_max" class="form-control" placeholder="Max value" step="0.01">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <!-- Pupil Size Section -->
                                            <h4 class="mb-3">Pupil Size</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">OD:</label>
                                                    <input type="text" name="pupil_size_od" class="form-control" placeholder="Enter OD value">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">OS:</label>
                                                    <input type="text" name="pupil_size_os" class="form-control" placeholder="Enter OS value">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="mt-4">
                                            <!-- MONO/BINO PD Section -->
                                            <h4 class="mb-3">MONO/BINO PD</h4>
                                            <div class="mb-3">
                                                <input type="text" name="mono_bino_pd" class="form-control" placeholder="Enter MONO/BINO PD value">
                                            </div>

                                            <!-- NPC Section -->
                                            <h4 class="mt-4 mb-3">NPC</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">BREAK:</label>
                                                    <input type="text" name="npc_break" class="form-control" placeholder="Enter Break value">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">RECOVERY:</label>
                                                    <input type="text" name="npc_recovery" class="form-control" placeholder="Enter Recovery value">
                                                </div>
                                            </div>

                                            <!-- IOP Section -->
                                            <h4 class="mt-4 mb-3">IOP</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">OD:</label>
                                                    <input type="text" name="iop_od" class="form-control" placeholder="Enter OD value">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">OS:</label>
                                                    <input type="text" name="iop_os" class="form-control" placeholder="Enter OS value">
                                                </div>
                                            </div>

                                            <!-- Slit Lamp Examination Section -->
                                            <h4 class="mt-4 mb-3">Slit Lamp Examination</h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">Lids Left:</label>
                                                    <input type="text" name="LIDS_LEFT" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Lids Right:</label>
                                                    <input type="text" name="LIDS_RIGHT" class="form-control">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Lashes Left:</label>
                                                    <input type="text" name="LASHES_LEFT" class="form-control">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Lashes Right:</label>
                                                    <input type="text" name="LASHES_RIGHT" class="form-control">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Conjunctiva Left:</label>
                                                    <input type="text" name="CONJUNCTIVA_LEFT" class="form-control">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Conjunctiva Right:</label>
                                                    <input type="text" name="CONJUNCTIVA_RIGHT" class="form-control">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Cornea Left:</label>
                                                    <input type="text" name="CORNEA_LEFT" class="form-control">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Cornea Right:</label>
                                                    <input type="text" name="CORNEA_RIGHT" class="form-control">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Iris Left:</label>
                                                    <input type="text" name="IRIS_LEFT" class="form-control">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Iris Right:</label>
                                                    <input type="text" name="IRIS_RIGHT" class="form-control">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">AC Left:</label>
                                                    <input type="text" name="AC_LEFT" class="form-control">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">AC Right:</label>
                                                    <input type="text" name="AC_RIGHT" class="form-control">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Lens Left:</label>
                                                    <input type="text" name="LENS_LEFT" class="form-control">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Lens Right:</label>
                                                    <input type="text" name="LENS_RIGHT" class="form-control">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">IOP Left (OS):</label>
                                                    <input type="text" name="IOP_LEFT" class="form-control">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">IOP Right (OD):</label>
                                                    <input type="text" name="IOP_RIGHT" class="form-control">
                                                </div>

                                                <div class="col-12 mt-4">
                                                    <label class="form-label">Clinical Notes:</label>
                                                    <textarea name="CLINICAL_NOTES" class="form-control" rows="4" placeholder="Enter clinical notes here..."></textarea>
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