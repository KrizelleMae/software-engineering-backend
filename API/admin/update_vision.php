<?php

include '../../config.php';

$data = json_decode(file_get_contents('php://input'));
$description = $data->description;
$date = date('Y-m-d H:i:s a');


$stmt = $db->prepare("UPDATE `vision` SET `DESCRIPTION` = ?, `DATE` = ?");
$stmt->bind_param('ss', $description, $date);

if ($stmt->execute()){
    echo json_encode(array('status' => 1));
} else {
    echo json_encode(array('status' => 2));
}

?>