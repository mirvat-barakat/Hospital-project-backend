<?php
include('connection.php');

$sql = "SELECT * FROM departments";
$result = $mysqli->query($sql);
$departments = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $departments[] = $row;
  }
}

$department_id = $_GET['department_id'];
$sql1 = "SELECT * FROM rooms WHERE department_id = '$department_id'";
$result = $mysqli->query($sql1);
$rooms = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $rooms[] = $row;
  }
}

?>