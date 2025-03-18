<?php
// Include database connection
include("connection/connect.php");

// Check if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve form data
    $patient_name = mysqli_real_escape_string($db, $_POST['patient_name']);
    $age = intval($_POST['age']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $contact_no = mysqli_real_escape_string($db, $_POST['contact_no']);

    // Insert into patients table (Fixed column names)
    $insert_patient = $db->prepare("
        INSERT INTO patients (name, address, age, gender, contactNo, dateOfBirth) 
        VALUES (?, ?, ?, ?, ?, ?)
    ");

    // Debugging if prepare() fails
    if (!$insert_patient) {
        die("❌ SQL Error: " . $db->error);
    }

    $insert_patient->bind_param("ssisss", $patient_name, $address, $age, $gender, $contact_no, $dob);

    if ($insert_patient->execute()) {
        // Get the newly inserted Patient ID
        $patient_id = $insert_patient->insert_id;

        // Redirect to view-client.php with the patient_id
        header("Location: view-client.php?patient_id=" . $patient_id);
        exit();
    } else {
        die("❌ Execution Error: " . $insert_patient->error);
    }

    // Close statement
    $insert_patient->close();
}

// Close database connection
$db->close();
?>
