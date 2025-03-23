<?php
include("connection/connect.php"); // Database connection
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if patient ID exists
    if (!isset($_POST['patientId']) || !is_numeric($_POST['patientId'])) {
        die("Error: Invalid or missing Patient ID.");
    }
    $patientId = $_POST['patientId']; // Get patient ID from the form

    // Get values from form
    $date = $_POST["date"] ?? date("Y-m-d"); // Default to today's date if not provided
    
    // Insert into finalprescriptions table
    $query = "INSERT INTO finalprescriptions (patientId, date, od, odVasc, odPh, odVacc, os, osVAsc, osPh, osVacc, addFirst, addFirstNVA, addSecond, addSecondNVA) 
              VALUES ('$patientId', '$date', '{$_POST["od"]}', '{$_POST["odVAsc"]}', '{$_POST["odph"]}', '{$_POST["odVAcc"]}', 
                      '{$_POST["os"]}', '{$_POST["osVAsc"]}', '{$_POST["osph"]}', '{$_POST["osVAcc"]}', 
                      '{$_POST["addFirst"]}', '{$_POST["addFirstNVA"]}', '{$_POST["addSecond"]}', '{$_POST["addSecondNVA"]}')";
    if (!mysqli_query($db, $query)) {
        die("Final Prescription Query Failed: " . mysqli_error($db));
    }

    // Insert into retinoscopy table
    $query = "INSERT INTO retinoscopy (patientID, date, od, os) 
              VALUES ('$patientId', '$date', '{$_POST["retinoscopy_od"]}', '{$_POST["retinoscopy_os"]}')";
    if (!mysqli_query($db, $query)) {
        die("Retinoscopy Query Failed: " . mysqli_error($db));
    }

    // Insert into oldRX table
    $query = "INSERT INTO oldrx (patientID, date, oldRXdate, od, odVA, os, osVA, addFirst, addFirstNVA) 
              VALUES ('$patientId', '$date', '{$_POST["oldRXdate"]}', '{$_POST["old_od"]}', '{$_POST["old_odVA"]}', 
                      '{$_POST["old_os"]}', '{$_POST["old_osVA"]}', '{$_POST["old_addFirst"]}', '{$_POST["old_addFirstNVA"]}')";
    if (!mysqli_query($db, $query)) {
        die("Old RX Query Failed: " . mysqli_error($db));
    }

    // Redirect back to view-client.php
    header("Location: view-client.php?patient_id=" . $patientId);
    exit();
}
