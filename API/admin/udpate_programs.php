<?php

include '../../config.php';

$data = json_decode(file_get_contents('php://input'));
$title = $data->title;
$description = $data->description;
$image_1 = $data->image_1;
$image_2 = $data->image_2;

$date = date('Y-m-d H:i:s a');


$stmt = $db->prepare("UPDATE `program_outcomes` SET `TITLE` = ?, `DESCRIPTION` = ?, `IMAGE_1` = ?, `IMAGE_2` = ?,`DATE` = ?");
$stmt->bind_param('sssss', $title, $description, $image_1, $image_2, $date);

if ($stmt->execute()){
    echo json_encode(array('status' => 1));
} else {
    echo json_encode(array('status' => 2));
}   

?>