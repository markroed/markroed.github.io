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
              VALUES ('$patientId','$date', '" . (isset($_POST["sv"]) ? 1 : 0) . "', '" . (isset($_POST["anti_rad"]) ? 1 : 0) . "', 
                      '" . (isset($_POST["mc"]) ? 1 : 0) . "', '" . (isset($_POST["kk"]) ? 1 : 0) . "', 
                      '" . (isset($_POST["ft"]) ? 1 : 0) . "', '" . (isset($_POST["pal"]) ? 1 : 0) . "', 
                      '" . (isset($_POST["digital"]) ? 1 : 0) . "', '" . (isset($_POST["eyezen"]) ? 1 : 0) . "', 
                      '" . (isset($_POST["photo"]) ? 1 : 0) . "', '" . (isset($_POST["trans"]) ? 1 : 0) . "', 
                      '" . (isset($_POST["blue_lens"]) ? 1 : 0) . "', '" . (isset($_POST["tint_colored"]) ? 1 : 0) . "')";
        mysqli_query($db, $query) or die("Lens Type Query Failed: " . mysqli_error($db));

        // Insert into patientframetype table
        $query = "INSERT INTO patientframetype (patientId, date, value) 
VALUES ('$patientId', '$date', '{$_POST["frame_type"]}')";
        mysqli_query($db, $query) or die("patientframetype Query Failed: " . mysqli_error($db));

        // Insert into patientcontactlenstypes table
        $query = "INSERT INTO patientcontactlenstypes (patientId, date, value) 
               VALUES ('$patientId', '$date', '{$_POST["contact_lens_type"]}')";
        mysqli_query($db, $query) or die("patientcontactlenstypes Query Failed: " . mysqli_error($db));

        // Insert into Frame Parameters table frameParameterId	patientId	date	hor	ver	nbl	fittingH	segmentH	effectiveDIA	monoBinoPD	
        $query = "INSERT INTO frameparameters (patientId, date,hor,ver,nbl,fittingH,segmentH,effectiveDIA,monoBinoPD) 
              VALUES ('$patientId', '$date', '{$_POST["frame_hor"]}', '{$_POST["frame_ver"]}', '{$_POST["frame_nbl"]}', '{$_POST["frame_fitting_h"]}', 
                      '{$_POST["frame_segment_h"]}', '{$_POST["frame_effective_dia"]}', '{$_POST["frame_mono_bino_pd"]}')";
        mysqli_query($db, $query) or die("frameparameters Query Failed: " . mysqli_error($db));


        // Insert into Lens Brand lensPriceId	patientId	date	lensBrand	lensPrice	contactLensPrice	totalAmount	

        $query = "INSERT INTO lensprice (patientId, date, lensBrand, lensPrice, contactLensPrice, totalAmount) 
              VALUES ('$patientId', '$date', '{$_POST["lens_brand"]}', '{$_POST["lens_price"]}', '{$_POST["contact_lens_price"]}', 
                      '{$_POST["total_amount"]}')";
        mysqli_query($db, $query) or die("lensprice Query Failed: " . mysqli_error($db));

        // Insert into oldRX table oldRXId	date	oldRXDate	patientId	oldOD	oldODVA	oldOS	oldOSVA	oldADD	oldADDVA	
        $query = "INSERT INTO oldrx (date, oldRXdate, patientId, oldOD, oldODVA, oldOS, oldOSVA, oldADD, oldADDVA) 
              VALUES ('$date', '{$_POST["oldRXdate"]}','$patientId', '{$_POST["old_od"]}', '{$_POST["old_odVA"]}', 
                      '{$_POST["old_os"]}', '{$_POST["old_osVA"]}', '{$_POST["old_add"]}', '{$_POST["old_addVA"]}')";
        mysqli_query($db, $query) or die("Old RX Query Failed: " . mysqli_error($db));

        // Insert into old lenstype table oldlensTypeId	patientId	date	SV	ANTI_RAD	MC	KK	FT	PAL	DIGITAL	EYEZEN	PHOTO	TRANS	BLUE_LENS	TINT_COLORED	
        $query = "INSERT INTO oldlenstype (patientId, date, SV, ANTI_RAD, MC, KK, FT, PAL, DIGITAL, EYEZEN, PHOTO, TRANS, BLUE_LENS, TINT_COLORED) 
          VALUES ('$patientId','$date', '" . (isset($_POST["old_sv"]) ? 1 : 0) . "', '" . (isset($_POST["old_anti_rad"]) ? 1 : 0) . "', 
                  '" . (isset($_POST["old_mc"]) ? 1 : 0) . "', '" . (isset($_POST["old_kk"]) ? 1 : 0) . "', 
                  '" . (isset($_POST["old_ft"]) ? 1 : 0) . "', '" . (isset($_POST["old_pal"]) ? 1 : 0) . "', 
                  '" . (isset($_POST["old_digital"]) ? 1 : 0) . "', '" . (isset($_POST["old_eyezen"]) ? 1 : 0) . "', 
                  '" . (isset($_POST["old_photo"]) ? 1 : 0) . "', '" . (isset($_POST["old_trans"]) ? 1 : 0) . "', 
                  '" . (isset($_POST["old_blue_lens"]) ? 1 : 0) . "', '" . (isset($_POST["old_tint_colored"]) ? 1 : 0) . "')";
        mysqli_query($db, $query) or die("Old Lens Type Query Failed: " . mysqli_error($db));

        // Insert into oldframetypes table
        $query = "INSERT INTO oldframetypes (patientId, date, value) 
            VALUES ('$patientId', '$date', '{$_POST["frame_type"]}')";
        mysqli_query($db, $query) or die("oldframetypes Query Failed: " . mysqli_error($db));

        // Insert into chiefcomplaint table
        //patientId	date	BOV_FAR	BOV_NEAR	HEADACHE	DOUBLE_VISION	GLARING	ITCHY_EYES	REDNESS	LACRIMATION	DRY_EYE	
        $query = "INSERT INTO chiefcomplaint (patientId,date, BOV_FAR, BOV_NEAR, HEADACHE, DOUBLE_VISION, GLARING, ITCHY_EYES, REDNESS, LACRIMATION, DRY_EYE) 
        VALUES ('$patientId','$date', '" . (isset($_POST["BOV_FAR"]) ? 1 : 0) . "', '" . (isset($_POST["BOV_NEAR"]) ? 1 : 0) . "', 
                '" . (isset($_POST["HEADACHE"]) ? 1 : 0) . "', '" . (isset($_POST["DOUBLE_VISION"]) ? 1 : 0) . "', 
                '" . (isset($_POST["GLARING"]) ? 1 : 0) . "', '" . (isset($_POST["ITCHY_EYES"]) ? 1 : 0) . "', 
                '" . (isset($_POST["REDNESS"]) ? 1 : 0) . "', '" . (isset($_POST["LACRIMATION"]) ? 1 : 0) . "', 
                '" . (isset($_POST["DRY_EYE"]) ? 1 : 0) . "')";
        mysqli_query($db, $query) or die("Chief Complaint Query Failed: " . mysqli_error($db));

        //GLAUCOMA	CATARACT	RETINA	MACULA	INJURIES	OTHERS	
        $query = "INSERT INTO ocularhistory (patientId,date, GLAUCOMA, CATARACT, RETINA, MACULA, INJURIES, OTHERS) 
  VALUES ('$patientId','$date', '" . (isset($_POST["GLAUCOMA"]) ? 1 : 0) . "', '" . (isset($_POST["CATARACT"]) ? 1 : 0) . "', 
          '" . (isset($_POST["RETINA"]) ? 1 : 0) . "', '" . (isset($_POST["MACULA"]) ? 1 : 0) . "', 
          '" . (isset($_POST["INJURIES"]) ? 1 : 0) . "', '" . (isset($_POST["OTHERS"]) ? 1 : 0) . "')";
        mysqli_query($db, $query) or die("ocularhistory Query Failed: " . mysqli_error($db));


        //	occupationalHistoryId	patientId	date	NON_WORKING	WORKING	FIELD	OFFICE	WFH	BUSINESS	STUDYING	
        $query = "INSERT INTO occupationalhistory (patientId,date, NON_WORKING, WORKING, FIELD, OFFICE, WFH, BUSINESS,STUDYING) 
  VALUES ('$patientId','$date', '" . (isset($_POST["NON_WORKING"]) ? 1 : 0) . "', '" . (isset($_POST["WORKING"]) ? 1 : 0) . "', 
          '" . (isset($_POST["FIELD"]) ? 1 : 0) . "', '" . (isset($_POST["OFFICE"]) ? 1 : 0) . "', 
          '" . (isset($_POST["WFH"]) ? 1 : 0) . "', '" . (isset($_POST["BUSINESS"]) ? 1 : 0) . "', '" . (isset($_POST["STUDYING"]) ? 1 : 0) . "')";
        mysqli_query($db, $query) or die("occupationalhistory Query Failed: " . mysqli_error($db));

        //medicalHistoryId	patientId	date	HYPERTENSION	DIABETES	CVD	ASTHMA	ALLERGIES	OTHERS	
        $query = "INSERT INTO medicalhistory (patientId,date, HYPERTENSION, DIABETES, CVD, ASTHMA, ALLERGIES, OTHERS) 
  VALUES ('$patientId','$date', '" . (isset($_POST["HYPERTENSION"]) ? 1 : 0) . "', '" . (isset($_POST["DIABETES"]) ? 1 : 0) . "', 
          '" . (isset($_POST["CVD"]) ? 1 : 0) . "', '" . (isset($_POST["ASTHMA"]) ? 1 : 0) . "', 
          '" . (isset($_POST["ALLERGIES"]) ? 1 : 0) . "', '" . (isset($_POST["OTHERS"]) ? 1 : 0) . "')";
        mysqli_query($db, $query) or die("medicalhistory Query Failed: " . mysqli_error($db));

        // digitalHistoryId	patientId	date	noOfHours	LAPTOP	MOBILE	DESKTOP	TELEVISION	sleepHours	
        $query = "INSERT INTO digitalhistory (patientId,date, noOfHours, LAPTOP, MOBILE, DESKTOP, TELEVISION, sleepHours) 
              VALUES ('$patientId','$date', '{$_POST["NO_OF_HOURS"]}','" . (isset($_POST["LAPTOP"]) ? 1 : 0) . "', 
                      '" . (isset($_POST["MOBILE"]) ? 1 : 0) . "', '" . (isset($_POST["DESKTOP"]) ? 1 : 0) . "', 
                      '" . (isset($_POST["TELEVISION"]) ? 1 : 0) . "', '{$_POST["SLEEP_HOURS"]}')";
        mysqli_query($db, $query) or die("Digital History Query Failed: " . mysqli_error($db));

        // npaId	patientId	date	OD	OS	OU	
        $query = "INSERT INTO npa (patientId, date,OD,OS,OU) 
VALUES ('$patientId', '$date', '{$_POST["npa_od"]}', '{$_POST["npa_os"]}', '{$_POST["npa_ou"]}')";
        mysqli_query($db, $query) or die("npa Query Failed: " . mysqli_error($db));

        // 	dominantEyeId	patientId	date	OD	OS		
        $query = "INSERT INTO dominanteye (patientId, date,OD,OS) 
                VALUES ('$patientId', '$date', '{$_POST["dominant_eye_od"]}', '{$_POST["dominant_eye_os"]}')";
        mysqli_query($db, $query) or die("dominanteye Query Failed: " . mysqli_error($db));

        // npaAgeId	patientId	date	MIN	AVE	MAX		
        $query = "INSERT INTO npa_age (patientId, date,MIN,AVE,MAX) 
VALUES ('$patientId', '$date', '{$_POST["npa_min"]}', '{$_POST["npa_ave"]}', '{$_POST["npa_max"]}')";
        mysqli_query($db, $query) or die("npa_age Query Failed: " . mysqli_error($db));

        // 	pupilSizeId	patientId	date	OD	OS			
        $query = "INSERT INTO pupilsize (patientId, date,OD,OS) 
                VALUES ('$patientId', '$date', '{$_POST["pupil_size_od"]}', '{$_POST["pupil_size_os"]}')";
        mysqli_query($db, $query) or die("pupilsize Query Failed: " . mysqli_error($db));

        // 	monoBinoPDid	patientId	date	MONOBINO			
        $query = "INSERT INTO monobinopd (patientId, date,MONOBINO) 
                VALUES ('$patientId', '$date', '{$_POST["mono_bino_pd"]}')";
        mysqli_query($db, $query) or die("monobinopd Query Failed: " . mysqli_error($db));

        // 	npcId	patientId	date	BREAK	RECOVERY				
        $query = "INSERT INTO npc (patientId, date,BREAK,RECOVERY) 
         VALUES ('$patientId', '$date', '{$_POST["npc_break"]}', '{$_POST["npc_recovery"]}')";
        mysqli_query($db, $query) or die("npc Query Failed: " . mysqli_error($db));

        // 	iopId	patientId	date	OD	OS					
        $query = "INSERT INTO iop (patientId, date,OD,OS) 
         VALUES ('$patientId', '$date', '{$_POST["iop_od"]}', '{$_POST["iop_os"]}')";
        mysqli_query($db, $query) or die("iop Query Failed: " . mysqli_error($db));

        // Assuming you already have $patientId and $date defined earlier
        $query = "INSERT INTO slitlampexamination (
        patientId, date, 
        LIDS_LEFT, LIDS_RIGHT, 
        LASHES_LEFT, LASHES_RIGHT, 
        CONJUNCTIVA_LEFT, CONJUNCTIVA_RIGHT, 
        CORNEA_LEFT, CORNEA_RIGHT, 
        IRIS_LEFT, IRIS_RIGHT, 
        AC_LEFT, AC_RIGHT, 
        LENS_LEFT, LENS_RIGHT, 
        IOP_LEFT, IOP_RIGHT, 
        CLINICAL_NOTES
    ) VALUES (
        '$patientId', '$date',
        '{$_POST["LIDS_LEFT"]}', '{$_POST["LIDS_RIGHT"]}', 
        '{$_POST["LASHES_LEFT"]}', '{$_POST["LASHES_RIGHT"]}', 
        '{$_POST["CONJUNCTIVA_LEFT"]}', '{$_POST["CONJUNCTIVA_RIGHT"]}', 
        '{$_POST["CORNEA_LEFT"]}', '{$_POST["CORNEA_RIGHT"]}', 
        '{$_POST["IRIS_LEFT"]}', '{$_POST["IRIS_RIGHT"]}', 
        '{$_POST["AC_LEFT"]}', '{$_POST["AC_RIGHT"]}', 
        '{$_POST["LENS_LEFT"]}', '{$_POST["LENS_RIGHT"]}', 
        '{$_POST["IOP_LEFT"]}', '{$_POST["IOP_RIGHT"]}', 
        '{$_POST["CLINICAL_NOTES"]}'
    )";

        mysqli_query($db, $query) or die("Slit Lamp Examination Query Failed: " . mysqli_error($db));


        echo "<script>
         alert('Transaction successfully added!');
         window.location.href = 'view-client.php?patient_id={$patientId}';
        </script>";
        exit();
}
