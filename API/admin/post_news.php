<?php

include '../../config.php';

$data = json_decode(file_get_contents('php://input'));
$title = $data->title;
$description = $data->desc;
$image = $data->image;
$public_id = $data->public_id;

$date = date('Y-m-d H:i:s a');


$stmt = $db->prepare("INSERT INTO `news` 
                    (`NEWS_TITLE`, `NEWS_DESC`, `NEWS_DATE`, `NEWS_IMAGE_1`, `IMAGE_PUBLIC_ID`) 
                    VALUES (?, ?, ?, ?, ?);");
$stmt->bind_param('sssss', $title, $description, $date, $image, $public_id);

if ($stmt->execute()){  
    echo json_encode(array('status' => 1));
} else {
    echo $stmt;
}   

?>