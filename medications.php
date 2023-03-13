<?php
header('Access-Control-Allow-Origin: *');
include ('connection.php');

$medications = [];
$query = $mysqli->prepare("SELECT * FROM medications");
$query->execute();
$query->bind_result($medication_id, $medication_name,$medication_cost);

while ($query->fetch()) {
    $medications = [
        "id" => $medication_id,
        "name" => $medication_name,
        "cost" => $medication_cost,
    
    ];
    $medications[] = $medications;
}

echo json_encode($medications);
?>