<?php 

include('connection.php');

$response = array();
if (isset($_POST['email'], $_POST['password'], $_POST['name'], $_POST['gender'], $_POST['usertype_id'])) {
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$usertype_id = $_POST["usertype_id"];

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$query = $mysql -> prepare ("SELECT * FROM users WHERE email = ? AND password = ?");
$query -> bind_param("ss", $email, $hashed_password );
$query -> execute();
$result = $query -> get_result();

while($object = $result -> fetch_assoc()){
    $data = $object;
}

if(isset($data)){
    $response['status'] = "failed";
}else{
    $query = $mysql -> prepare ("INSERT INTO users (name, email, password, dob, gender, usertype_id) VALUES (?, ?, ?, ?, ?, ?)");
    $query -> bind_param("sssssi", $name, $email, $hashed_password, $dob, $gender, $usertype_id);
    $query -> execute();
        $response["status"] = "success";
}
}

echo json_encode($response);
?>