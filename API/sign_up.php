<?php

include '../config.php';

$user = json_decode(file_get_contents('php://input'));
$email = $user->email;
$password = $user->password;


if (mysqli_num_rows($result) > 0) {
    // $data = ['status' => 1, 'message' => "Record successfully created"];
    while ($user = mysqli_fetch_assoc($result)) {

        if(password_verify($password, $user['PASSWORD'])) {
            // IF TAMA PASSWORD  
            
            if ($user['ACCESS'] === 1) {
                // ADMIN
            } else if ($user['ACCESS'] === 2){
                // IF FACULTY
            } else if ($user['ACCESS'] === 3){
                // IF ALUMNI
            } else {
                // ELSE STUDENT
            }

        }else {

            $data = ['status' => 0, 'message' => "Invalid password"];

        }
    }
} else {

    $data = ['status' => 2, 'message' => "Email does not exist"];
    
}

echo json_encode($data);
 



?>