<?php
// Include database connection
include("connection/connect.php");

// Check if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Patient Information (patients table)
    $patient_name = mysqli_real_escape_string($db, $_POST['patient_name']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $age = intval($_POST['age']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $contact_no = mysqli_real_escape_string($db, $_POST['contact_no']);

    // Final Prescription (finalprescriptions table)
    $prescription_date = mysqli_real_escape_string($db, $_POST['date']);
    $od = mysqli_real_escape_string($db, $_POST['od']);
    $odVAsc = intval($_POST['odVAsc']);
    $odph = intval($_POST['odph']);
    $odVAcc = intval($_POST['odVAcc']);

    $os = mysqli_real_escape_string($db, $_POST['os']);
    $osVAsc = intval($_POST['osVAsc']);
    $osph = intval($_POST['osph']);
    $osVAcc = intval($_POST['osVAcc']);

    $addFirst = mysqli_real_escape_string($db, $_POST['addFirst']);
    $addFirstNVA = intval($_POST['addFirstNVA']);
    $addSecond = mysqli_real_escape_string($db, $_POST['addSecond']);
    $addSecondNVA = intval($_POST['addSecondNVA']);

    $retinoscopy_od = mysqli_real_escape_string($db, $_POST['retinoscopy_od']);
    $retinoscopy_os = intval($_POST['retinoscopy_os']);

    $diagnosis_od = mysqli_real_escape_string($db, $_POST['diagnosis_od']);
    $diagnosis_os = intval($_POST['diagnosis_os']);

    // Insert into patients table
    $insert_patient = $db->prepare("
        INSERT INTO patients (name, address, age, gender, dob, contact_no) 
        VALUES (?, ?, ?, ?, ?, ?)
    ");
    $insert_patient->bind_param("ssisss", $patient_name, $address, $age, $gender, $dob, $contact_no);

    if ($insert_patient->execute()) {
        // Get the newly inserted Patient ID
        $patient_id = $insert_patient->insert_id;

        // Insert into finalprescriptions table
        $insert_prescription = $db->prepare("
            INSERT INTO finalprescriptions (
                patient_id, date, 
                od, odVAsc, odph, odVAcc, 
                os, osVAsc, osph, osVAcc, 
                addFirst, addFirstNVA, addSecond, addSecondNVA,
                retinoscopy_od, retinoscopy_os, 
                diagnosis_od, diagnosis_os
            ) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $insert_prescription->bind_param(
            "issiiiiisiiiiissii", 
            $patient_id, $prescription_date,
            $od, $odVAsc, $odph, $odVAcc,
            $os, $osVAsc, $osph, $osVAcc,
            $addFirst, $addFirstNVA, $addSecond, $addSecondNVA,
            $retinoscopy_od, $retinoscopy_os,
            $diagnosis_od, $diagnosis_os
        );

        if ($insert_prescription->execute()) {
            echo "✅ Patient information and prescription details added successfully.";
        } else {
            echo "❌ Error adding prescription details: " . $insert_prescription->error;
        }
    } else {
        echo "❌ Error adding patient information: " . $insert_patient->error;
    }

    // Close statements
    $insert_patient->close();
    $insert_prescription->close();
}

// Close database connection
$db->close();
?>
