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

                                        <form>

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
                                                <select name="frame_type" class="form-control" disabled>
                                                    <option value="None" <?php if ($result_patientframetype['value'] == 'None') echo 'selected'; ?>>None</option>
                                                    <option value="Metal" <?php if ($result_patientframetype['value'] == 'Metal') echo 'selected'; ?>>Metal</option>
                                                    <option value="Plastic" <?php if ($result_patientframetype['value'] == 'Plastic') echo 'selected'; ?>>Plastic</option>
                                                    <option value="Full Rim" <?php if ($result_patientframetype['value'] == 'Full Rim') echo 'selected'; ?>>Full Rim</option>
                                                    <option value="Semi Rimless" <?php if ($result_patientframetype['value'] == 'Semi Rimless') echo 'selected'; ?>>Semi Rimless</option>
                                                    <option value="Rimless" <?php if ($result_patientframetype['value'] == 'Rimless') echo 'selected'; ?>>Rimless</option>
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




                                            <h4 class="mt-4">Frame Parameters</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label">HOR:</label>
                                                    <input type="text" class="form-control" value="<?php echo $result_frameparameters['hor']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">VER:</label>
                                                    <input type="text" class="form-control" value="<?php echo $result_frameparameters['ver']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">NBL:</label>
                                                    <input type="text" class="form-control" value="<?php echo $result_frameparameters['nbl']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-4">
                                                    <label class="form-label">FITTING H:</label>
                                                    <input type="text" class="form-control" value="<?php echo $result_frameparameters['fittingH']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">SEGMENT H:</label>
                                                    <input type="text" class="form-control" value="<?php echo $result_frameparameters['segmentH']; ?>" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">EFFECTIVE DIA:</label>
                                                    <input type="text" class="form-control" value="<?php echo $result_frameparameters['effectiveDIA']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-4">
                                                    <label class="form-label"><b>MONO/BINO PD:</b></label>
                                                    <input type="text" class="form-control" value="<?php echo $result_frameparameters['monoBinoPD']; ?>" readonly>
                                                </div>
                                            </div>


                                            <!-- Lens Brand -->

                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">LENS BRAND:</label>
                                                    <input type="text" class="form-control" value="<?php echo $result_lensprice['lensBrand']; ?>" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">LENS PRICE:</label>
                                                    <input type="text" class="form-control" value="<?php echo $result_lensprice['lensPrice']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">CONTACT LENS PRICE:</label>
                                                    <input type="text" class="form-control" value="<?php echo $result_lensprice['contactLensPrice']; ?>" readonly>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">TOTAL AMOUNT:</label>
                                                    <input type="text" class="form-control" value="<?php echo $result_lensprice['totalAmount']; ?>" readonly>
                                                </div>
                                            </div>


                                            <hr>
                                            <!-- OLD RX Section -->
                                            <h4 class="mt-4">OLD RX</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label">Date:</label>
                                                    <input type="date" class="form-control" value="<?php echo date('Y-m-d', strtotime($result_oldrx['oldRXDate'])); ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <label class="form-label">OD:</label>
                                                    <input type="text" class="form-control" value="<?php echo $result_oldrx['oldOD']; ?>" readonly>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">VA:</label>
                                                    <input type="text" class="form-control" value="<?php echo $result_oldrx['oldODVA']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <label class="form-label">OS:</label>
                                                    <input type="text" class="form-control" value="<?php echo $result_oldrx['oldOS']; ?>" readonly>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">VA:</label>
                                                    <input type="text" class="form-control" value="<?php echo $result_oldrx['oldOSVA']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <label class="form-label">ADD:</label>
                                                    <input type="text" class="form-control" value="<?php echo $result_oldrx['oldADD']; ?>" readonly>
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">VA:</label>
                                                    <input type="text" class="form-control" value="<?php echo $result_oldrx['oldADDVA']; ?>" readonly>
                                                </div>
                                            </div><!-- OLD Lens Type Checklist (Disabled) -->
                                            <h4 class="mt-4">Lens Type (Old)</h4>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_oldlenstype['SV']) echo 'checked'; ?>> SV
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_oldlenstype['ANTI_RAD']) echo 'checked'; ?>> Anti Rad
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_oldlenstype['MC']) echo 'checked'; ?>> MC
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_oldlenstype['KK']) echo 'checked'; ?>> KK
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_oldlenstype['FT']) echo 'checked'; ?>> FT
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_oldlenstype['PAL']) echo 'checked'; ?>> PAL
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_oldlenstype['DIGITAL']) echo 'checked'; ?>> Digital
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_oldlenstype['EYEZEN']) echo 'checked'; ?>> Eyezen
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_oldlenstype['PHOTO']) echo 'checked'; ?>> Photo
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_oldlenstype['TRANS']) echo 'checked'; ?>> Trans
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_oldlenstype['BLUE_LENS']) echo 'checked'; ?>> Blue Lens
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_oldlenstype['TINT_COLORED']) echo 'checked'; ?>> Tint/Colored
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- OLD Frame Type Dropdown -->
                                            <h4 class="mt-4">Frame Type (Old)</h4>
                                            <div class="mb-3">
                                                <select class="form-control" disabled>
                                                    <option value="Metal" <?php if ($result_oldframetypes['value'] == 'Metal') echo 'selected'; ?>>Metal</option>
                                                    <option value="Plastic" <?php if ($result_oldframetypes['value'] == 'Plastic') echo 'selected'; ?>>Plastic</option>
                                                    <option value="Full Rim" <?php if ($result_oldframetypes['value'] == 'Full Rim') echo 'selected'; ?>>Full Rim</option>
                                                    <option value="Semi Rimless" <?php if ($result_oldframetypes['value'] == 'Semi Rimless') echo 'selected'; ?>>Semi Rimless</option>
                                                    <option value="Rimless" <?php if ($result_oldframetypes['value'] == 'Rimless') echo 'selected'; ?>>Rimless</option>
                                                </select>
                                            </div>




                                            <h4 class="mt-4">Chief Complaint</h4>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" name="BOV_FAR" class="form-check-input" disabled <?php if ($result_chiefcomplaint['BOV_FAR']) echo 'checked'; ?>> BOV (Far)
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="BOV_NEAR" class="form-check-input" disabled <?php if ($result_chiefcomplaint['BOV_NEAR']) echo 'checked'; ?>> BOV (Near)
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="HEADACHE" class="form-check-input" disabled <?php if ($result_chiefcomplaint['HEADACHE']) echo 'checked'; ?>> Headache
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" name="DOUBLE_VISION" class="form-check-input" disabled <?php if ($result_chiefcomplaint['DOUBLE_VISION']) echo 'checked'; ?>> Double Vision
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="GLARING" class="form-check-input" disabled <?php if ($result_chiefcomplaint['GLARING']) echo 'checked'; ?>> Glaring
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="ITCHY_EYES" class="form-check-input" disabled <?php if ($result_chiefcomplaint['ITCHY_EYES']) echo 'checked'; ?>> Itchy Eyes
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" name="REDNESS" class="form-check-input" disabled <?php if ($result_chiefcomplaint['REDNESS']) echo 'checked'; ?>> Redness
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="LACRIMATION" class="form-check-input" disabled <?php if ($result_chiefcomplaint['LACRIMATION']) echo 'checked'; ?>> Lacrimation
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="DRY_EYE" class="form-check-input" disabled <?php if ($result_chiefcomplaint['DRY_EYE']) echo 'checked'; ?>> Dry Eye
                                                    </div>
                                                </div>
                                            </div>


                                            <h4 class="mt-4">Ocular History</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input type="checkbox" name="GLAUCOMA" class="form-check-input" disabled <?php if ($result_ocularhistory['GLAUCOMA']) echo 'checked'; ?>> Glaucoma
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="CATARACT" class="form-check-input" disabled <?php if ($result_ocularhistory['CATARACT']) echo 'checked'; ?>> Cataract
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input type="checkbox" name="RETINA" class="form-check-input" disabled <?php if ($result_ocularhistory['RETINA']) echo 'checked'; ?>> Retina
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="MACULA" class="form-check-input" disabled <?php if ($result_ocularhistory['MACULA']) echo 'checked'; ?>> Macula
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input type="checkbox" name="INJURIES" class="form-check-input" disabled <?php if ($result_ocularhistory['INJURIES']) echo 'checked'; ?>> Injuries
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="OTHERS" class="form-check-input" disabled <?php if ($result_ocularhistory['OTHERS']) echo 'checked'; ?>> Others
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


                                            <!-- Medical History -->
                                            <h4 class="mt-4">Medical History</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_medicalhistory['HYPERTENSION']) echo 'checked'; ?>> Hypertension
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_medicalhistory['DIABETES']) echo 'checked'; ?>> Diabetes
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_medicalhistory['CVD']) echo 'checked'; ?>> Cardiovascular Disease (CVD)
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_medicalhistory['ASTHMA']) echo 'checked'; ?>> Asthma
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_medicalhistory['ALLERGIES']) echo 'checked'; ?>> Allergies
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_medicalhistory['OTHERS']) echo 'checked'; ?>> Others
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Digital History -->
                                            <h4 class="mt-4">Digital History</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">No of Hours:</label>
                                                    <input type="number" class="form-control" readonly value="<?php echo $result_digitalhistory['noOfHours']; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Sleep Hours:</label>
                                                    <input type="number" class="form-control" readonly value="<?php echo $result_digitalhistory['sleepHours']; ?>">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_digitalhistory['LAPTOP']) echo 'checked'; ?>> Laptop
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_digitalhistory['MOBILE']) echo 'checked'; ?>> Mobile
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_digitalhistory['DESKTOP']) echo 'checked'; ?>> Desktop
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" disabled class="form-check-input" <?php if ($result_digitalhistory['TELEVISION']) echo 'checked'; ?>> Television
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- NPA -->
                                            <h4 class="mt-4">NPA</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label">OD:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_npa['OD']; ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">OS:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_npa['OS']; ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">OU:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_npa['OU']; ?>">
                                                </div>
                                            </div>

                                            <!-- Dominant Eye -->
                                            <h4 class="mt-4">Dominant Eye</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">OD:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_dominanteye['OD']; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">OS:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_dominanteye['OS']; ?>">
                                                </div>
                                            </div>

                                            <!-- NPA Age -->
                                            <h4 class="mt-4">NPA Age</h4>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label">MIN:</label>
                                                    <input type="number" class="form-control" readonly value="<?php echo $result_npa_age['MIN']; ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">AVE:</label>
                                                    <input type="number" class="form-control" readonly value="<?php echo $result_npa_age['AVE']; ?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">MAX:</label>
                                                    <input type="number" class="form-control" readonly value="<?php echo $result_npa_age['MAX']; ?>">
                                                </div>
                                            </div>

                                            <!-- Pupil Size -->
                                            <h4 class="mt-4">Pupil Size</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">OD:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_pupilsize['OD']; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">OS:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_pupilsize['OS']; ?>">
                                                </div>
                                            </div>

                                            <!-- MONO/BINO PD -->
                                            <h4 class="mt-4">MONO/BINO PD</h4>
                                            <div class="mb-3">
                                                <input type="text" class="form-control" readonly value="<?php echo $result_monobinopd['MONOBINO']; ?>">
                                            </div>

                                            <!-- NPC -->
                                            <h4 class="mt-4">NPC</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">BREAK:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_npc['BREAK']; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">RECOVERY:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_npc['RECOVERY']; ?>">
                                                </div>
                                            </div>

                                            <!-- IOP -->
                                            <h4 class="mt-4">IOP</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">OD:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_iop['OD']; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">OS:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_iop['OS']; ?>">
                                                </div>
                                            </div>

                                            <!-- Slit Lamp Examination -->
                                            <h4 class="mt-4">Slit Lamp Examination</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">Lids Left:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_slitlampexamination['LIDS_LEFT']; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Lids Right:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_slitlampexamination['LIDS_RIGHT']; ?>">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Lashes Left:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_slitlampexamination['LASHES_LEFT']; ?>">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Lashes Right:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_slitlampexamination['LASHES_RIGHT']; ?>">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Conjunctiva Left:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_slitlampexamination['CONJUNCTIVA_LEFT']; ?>">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Conjunctiva Right:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_slitlampexamination['CONJUNCTIVA_RIGHT']; ?>">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Cornea Left:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_slitlampexamination['CORNEA_LEFT']; ?>">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Cornea Right:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_slitlampexamination['CORNEA_RIGHT']; ?>">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Iris Left:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_slitlampexamination['IRIS_LEFT']; ?>">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Iris Right:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_slitlampexamination['IRIS_RIGHT']; ?>">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">AC Left:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_slitlampexamination['AC_LEFT']; ?>">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">AC Right:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_slitlampexamination['AC_RIGHT']; ?>">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Lens Left:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_slitlampexamination['LENS_LEFT']; ?>">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">Lens Right:</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_slitlampexamination['LENS_RIGHT']; ?>">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">IOP Left (OS):</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_slitlampexamination['IOP_LEFT']; ?>">
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label class="form-label">IOP Right (OD):</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $result_slitlampexamination['IOP_RIGHT']; ?>">
                                                </div>

                                                <div class="col-12 mt-4">
                                                    <label class="form-label">Clinical Notes:</label>
                                                    <textarea class="form-control" rows="4" readonly><?php echo $result_slitlampexamination['CLINICAL_NOTES']; ?></textarea>
                                                </div>
                                            </div>




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

                        </div><!-- /PRINT -->
                        <button class="btn btn-primary mt-4" onclick="downloadPDF()">Download PDF</button>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
                        <script>
                            function downloadPDF() {
                                const element = document.getElementById('print-area');

                                const opt = {
                                    margin: 0,
                                    filename: 'Transaction_<?php echo $patientId . "_" . date("Ymd_His", strtotime($date)); ?>.pdf',
                                    image: {
                                        type: 'jpeg',
                                        quality: 0.98
                                    },
                                    html2canvas: {
                                        scale: 2,
                                        useCORS: true
                                    },
                                    jsPDF: {
                                        unit: 'mm',
                                        format: 'a4',
                                        orientation: 'portrait'
                                    },
                                    pagebreak: {
                                        mode: ['avoid-all', 'css', 'legacy']
                                    }
                                };

                                html2pdf().set(opt).from(element).save();
                            }
                        </script>
                        <style>
                            @media print {
                                body * {
                                    visibility: hidden;
                                }

                                #print-area,
                                #print-area * {
                                    visibility: visible;
                                }

                                #print-area {
                                    position: absolute;
                                    left: 0;
                                    top: 0;
                                }
                            }

                            #print-area {
                                background: white;
                                padding: 20px;
                                font-size: 14px;
                                line-height: 1.4;
                            }
                        </style>





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