<?php

include '../../config.php';

$data = json_decode(file_get_contents('php://input'));
$title = $data->title;
$description = $data->description;
$image_1 = $data->image_1;
$image_2 = $data->image_2;

$date = date('Y-m-d H:i:s a');


$stmt = $db->prepare("INSERT INTO `announcements` 
                    (`ANN_TITLE`, `ANN_DESC`, `ANN_DATE`, `ANN_IMAGE_1`, `ANN_IMAGE_2`, `DATE`) 
                    VALUES (?, ?, ?, ?, ?, ?);");
$stmt->bind_param('ssssss', $title, $description, $date, $image_1, $image_2, $date);

if ($stmt->execute()){
    echo json_encode(array('status' => 1));
} else {
    echo json_encode(array('status' => 2));
}   

?>