<?php 

include('connection.php');
$response = array();
if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $query = $mysqli -> prepare("SELECT * FROM users WHERE email=? AND password=?");
    $query -> bind_param("ss", $email, $hashed_password);
    $query -> execute();
    $result = $query -> get_result();

    while($object = $result -> fetch_assoc()){
        $data = $object;
    }

    if(isset($data)){
            $response = [
                "id" => $data["id"],
                "name" => $data["name"],
                "email" => $data["email"],
                "dob" => $data["dob"],
                "gender" => $data["gender"],
                "usertype_id" => $data["usertype_id"],
            ];
    }else{
        $response["message"] = "Incorrect email or password";
    };
  }
echo json_encode($response);

?>