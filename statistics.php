<?php
header('Access-Control-Allow-Origin: *');
include('connection.php');

$sql_female = "SELECT COUNT(*)  FROM users WHERE user_type_id='2' and gender = 'Female'";
$result_female = $mysqli->query($sql_female);
$row_female = $result_female->fetch_assoc();
echo '$row_female';

$sql_male = "SELECT COUNT(*)  FROM users WHERE user_type_id='2' and gender = 'male'";
$result_male = $mysqli->query($sql_male);
$row_male = $result_male->fetch_assoc();
echo '$row_male';

$sql_patients = "SELECT hospitals.name AS hospital_name, COUNT(user_id) AS patient_count FROM users JOIN hospitals ON users.hospital_id = hospitals.id where usertype_id='3' GROUP BY hospitals.id";
$result_patients = $conn->query($sql_patients);
$patient_counts = array();
while ($row_patients = $result_patients->fetch_assoc()) {
  $patient_counts[] = $row_patients;
}

$output = array(
    'female_count' => $row_female['female_count'],
    'male_count' => $row_male['male_count'],
    'patient_counts' => $patient_counts
  );
  echo json_encode($output);

?>