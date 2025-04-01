<?php
include("connection/connect.php"); // Database connection
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if patient ID exists
        if (!isset($_POST['patientId']) || !is_numeric($_POST['patientId'])) {
                die("Error: Invalid or missing Patient ID.");
        }
        $patientId = $_POST['patientId']; // Get patient ID from the form
        $date = $_POST["date"] ?? date("Y-m-d"); // Default to today's date if not provided

        // Insert into finalprescriptions table
        $query = "INSERT INTO finalprescriptions (patientId, date, od, odVasc, odPh, odVacc, os, osVasc, osPh, osVacc, addFirst, addFirstNVA, addSecond, addSecondNVA) 
              VALUES ('$patientId', '$date', '{$_POST["od"]}', '{$_POST["odVAsc"]}', '{$_POST["odph"]}', '{$_POST["odVAcc"]}', 
                      '{$_POST["os"]}', '{$_POST["osVAsc"]}', '{$_POST["osph"]}', '{$_POST["osVAcc"]}', 
                      '{$_POST["addFirst"]}', '{$_POST["addFirstNVA"]}', '{$_POST["addSecond"]}', '{$_POST["addSecondNVA"]}')";
        mysqli_query($db, $query) or die("Final Prescription Query Failed: " . mysqli_error($db));

        // Insert into retinoscopy table
        $query = "INSERT INTO retinoscopy (patientId, date, retinoscopyOD, retinoscopyOS) 
              VALUES ('$patientId', '$date', '{$_POST["retinoscopy_od"]}', '{$_POST["retinoscopy_os"]}')";
        mysqli_query($db, $query) or die("Retinoscopy Query Failed: " . mysqli_error($db));

        // Insert into diagnosis table
        $query = "INSERT INTO diagnosis (patientId, date, diagnosisOD, diagnosisOS) 
         VALUES ('$patientId', '$date', '{$_POST["diagnosis_od"]}', '{$_POST["diagnosis_os"]}')";
        mysqli_query($db, $query) or die("diagnosis Query Failed: " . mysqli_error($db));

        // Insert into lenstype table
        $query = "INSERT INTO lenstype (patientId, date, SV, ANTI_RAD, MC, KK, FT, PAL, DIGITAL, EYEZEN, PHOTO, TRANS, BLUE_LENS, TINT_COLORED) 
              VALUES ('$patientId', '" . (isset($_POST["sv"]) ? 1 : 0) . "', '" . (isset($_POST["anti_rad"]) ? 1 : 0) . "', 
                      '" . (isset($_POST["mc"]) ? 1 : 0) . "', '" . (isset($_POST["kk"]) ? 1 : 0) . "', 
                      '" . (isset($_POST["ft"]) ? 1 : 0) . "', '" . (isset($_POST["pal"]) ? 1 : 0) . "', 
                      '" . (isset($_POST["digital"]) ? 1 : 0) . "', '" . (isset($_POST["eyezen"]) ? 1 : 0) . "', 
                      '" . (isset($_POST["photo"]) ? 1 : 0) . "', '" . (isset($_POST["trans"]) ? 1 : 0) . "', 
                      '" . (isset($_POST["blue_lens"]) ? 1 : 0) . "', '" . (isset($_POST["tint_colored"]) ? 1 : 0) . "')";
        mysqli_query($db, $query) or die("Lens Type Query Failed: " . mysqli_error($db));

        // Insert into patientframetype table
        $query = "INSERT INTO patientframetype (patientId, date, value) 
VALUES ('$patientId', '$date', '{$_POST["frame_type"]}'";
        mysqli_query($db, $query) or die("patientframetype Query Failed: " . mysqli_error($db));

        // Insert into patientcontactlenstypes table
        $query = "INSERT INTO patientcontactlenstypes (patientId, date, value) 
               VALUES ('$patientId', '$date', '{$_POST["contact_lens_type"]}'";
        mysqli_query($db, $query) or die("patientcontactlenstypes Query Failed: " . mysqli_error($db));

        Tiwasa sa ubos


        // Insert into oldRX table
        $query = "INSERT INTO oldrx (patientId, date, oldRXdate, od, odVA, os, osVA, addFirst, addFirstNVA) 
              VALUES ('$patientId', '$date', '{$_POST["oldRXdate"]}', '{$_POST["old_od"]}', '{$_POST["old_odVA"]}', 
                      '{$_POST["old_os"]}', '{$_POST["old_osVA"]}', '{$_POST["old_addFirst"]}', '{$_POST["old_addFirstNVA"]}')";
        mysqli_query($db, $query) or die("Old RX Query Failed: " . mysqli_error($db));

        // Insert into digitalhistory table
        $query = "INSERT INTO digitalhistory (patientId, NO_OF_HOURS, SLEEP_HOURS, LAPTOP, MOBILE, DESKTOP, TELEVISION) 
              VALUES ('$patientId', '{$_POST["NO_OF_HOURS"]}', '{$_POST["SLEEP_HOURS"]}', 
                      '" . (isset($_POST["LAPTOP"]) ? 1 : 0) . "', '" . (isset($_POST["MOBILE"]) ? 1 : 0) . "', 
                      '" . (isset($_POST["DESKTOP"]) ? 1 : 0) . "', '" . (isset($_POST["TELEVISION"]) ? 1 : 0) . "')";
        mysqli_query($db, $query) or die("Digital History Query Failed: " . mysqli_error($db));

        // Insert into chiefcomplaint table
        $query = "INSERT INTO chiefcomplaint (patientId, BOV_FAR, BOV_NEAR, HEADACHE, DOUBLE_VISION, GLARING, ITCHY_EYES, REDNESS, LACRIMATION, DRY_EYE) 
              VALUES ('$patientId', '" . (isset($_POST["BOV_FAR"]) ? 1 : 0) . "', '" . (isset($_POST["BOV_NEAR"]) ? 1 : 0) . "', 
                      '" . (isset($_POST["HEADACHE"]) ? 1 : 0) . "', '" . (isset($_POST["DOUBLE_VISION"]) ? 1 : 0) . "', 
                      '" . (isset($_POST["GLARING"]) ? 1 : 0) . "', '" . (isset($_POST["ITCHY_EYES"]) ? 1 : 0) . "', 
                      '" . (isset($_POST["REDNESS"]) ? 1 : 0) . "', '" . (isset($_POST["LACRIMATION"]) ? 1 : 0) . "', 
                      '" . (isset($_POST["DRY_EYE"]) ? 1 : 0) . "')";
        mysqli_query($db, $query) or die("Chief Complaint Query Failed: " . mysqli_error($db));

        // Redirect back to view-client.php
        header("Location: view-client.php?patient_id=" . $patientId);
        exit();
}
