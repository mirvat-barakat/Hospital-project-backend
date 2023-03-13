<?php
include('connection.php')

$patient_id = $_POST['user_id'];
$hospital_id = $_POST['hospital_id'];

$sql = $mysqli->prepare("INSERT INTO user_departments (user_id, hospital_id) VALUES (?, ?)");
$sql ->bind_param("ii", $patient_id, $hospital_id);
$sql ->execute();

echo "Patient assigned to hospital successfully.";
?>
