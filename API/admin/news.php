<?php

include '../../config.php';

$data = json_decode(file_get_contents('php://input'));
$method = $_SERVER["REQUEST_METHOD"];
$date = date('Y-m-d H:i:s a');

// ADD DATA
if ($method == "POST") {

    $title = $data->title;
    $description = $data->desc;
    $image = $data->image;
    $public_id = $data->public_id;
    
    
    $stmt = $db->prepare("INSERT INTO `news` 
                        (`NEWS_TITLE`, `NEWS_DESC`, `NEWS_DATE`, `NEWS_IMAGE_1`, `IMAGE_PUBLIC_ID`) 
                        VALUES (?, ?, ?, ?, ?);");
    $stmt->bind_param('sssss', $title, $description, $date, $image, $public_id);
    
    if ($stmt->execute()){  
        $response = array('status' => 1);
    } else {
        $response = array('status' => 0);
    }  

} else if ($method == "GET") {
    // FETCH DATA
    $stmt = $db->prepare('SELECT * from `news`');
    $stmt->execute();
    $result = $stmt->get_result();
    $response = $result->fetch_all(MYSQLI_ASSOC);

} else if ($method == "PUT") {
    // UPDATE DATA

  
    
} else if ($method == "DELETE") {
    // UPDATE DATA

    
    
} else {
    // Nothing

}


$db->close();
echo json_encode($response);


?>