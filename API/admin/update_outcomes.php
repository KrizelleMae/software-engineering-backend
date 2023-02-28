<?php

include '../../config.php';

$data = json_decode(file_get_contents('php://input'));
$title = $data->title;
$description = $data->description;
$date = date('Y-m-d H:i:s a');


$stmt = $db->prepare("UPDATE `program_outcomes` SET `TITLE` = ?, `DESCRIPTION` = ?, `DATE` = ?");
$stmt->bind_param('sss', $title, $description, $date);

if ($stmt->execute()){
    echo json_encode(array('status' => 1));
} else {
    echo json_encode(array('status' => 2));
}

?>