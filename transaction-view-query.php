<?php

$result_finalprescriptions = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM finalprescriptions WHERE patientId = '$patientId' AND date = '$date'"));
$result_retinoscopy = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM retinoscopy WHERE patientId = '$patientId' AND date = '$date'"));
$result_diagnosis = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM diagnosis WHERE patientId = '$patientId' AND date = '$date'"));
$result_lenstype = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM lenstype WHERE patientId = '$patientId' AND date = '$date'"));
$result_patientframetype = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM patientframetype WHERE patientId = '$patientId' AND date = '$date'"));
$result_patientcontactlenstypes = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM patientcontactlenstypes WHERE patientId = '$patientId' AND date = '$date'"));
$result_frameparameters = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM frameparameters WHERE patientId = '$patientId' AND date = '$date'"));
$result_lensprice = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM lensprice WHERE patientId = '$patientId' AND date = '$date'"));
$result_oldrx = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM oldrx WHERE patientId = '$patientId' AND date = '$date'"));
$result_oldlenstype = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM oldlenstype WHERE patientId = '$patientId' AND date = '$date'"));
$result_oldframetypes = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM oldframetypes WHERE patientId = '$patientId' AND date = '$date'"));
$result_chiefcomplaint = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM chiefcomplaint WHERE patientId = '$patientId' AND date = '$date'"));
$result_ocularhistory = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM ocularhistory WHERE patientId = '$patientId' AND date = '$date'"));
$result_occupationalhistory = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM occupationalhistory WHERE patientId = '$patientId' AND date = '$date'"));
$result_medicalhistory = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM medicalhistory WHERE patientId = '$patientId' AND date = '$date'"));
$result_digitalhistory = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM digitalhistory WHERE patientId = '$patientId' AND date = '$date'"));
$result_npa = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM npa WHERE patientId = '$patientId' AND date = '$date'"));
$result_dominanteye = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM dominanteye WHERE patientId = '$patientId' AND date = '$date'"));
$result_npa_age = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM npa_age WHERE patientId = '$patientId' AND date = '$date'"));
$result_pupilsize = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM pupilsize WHERE patientId = '$patientId' AND date = '$date'"));
$result_monobinopd = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM monobinopd WHERE patientId = '$patientId' AND date = '$date'"));
$result_npc = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM npc WHERE patientId = '$patientId' AND date = '$date'"));
$result_iop = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM iop WHERE patientId = '$patientId' AND date = '$date'"));
$result_slitlampexamination = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM slitlampexamination WHERE patientId = '$patientId' AND date = '$date'"));

?>