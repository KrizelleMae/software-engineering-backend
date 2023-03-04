<?php

include '../../config.php';

$data = json_decode(file_get_contents('php://input'));
$faculty_name = $data->faculty_name;
$rank = $data->rank;
$designation = $data->designation;
$image = $data->image;
$qualifications = $data->qualifications;
$date_joined = $data->date_joined;

$date = date('Y-m-d H:i:s a');


$stmt = $db->prepare("INSERT INTO `faculty` (`FACULTY_NAME`, `RANK`, `DESIGNATION`, `FACULTY_IMAGE`, `QUALIFICATIONS`, `DATE_JOINED`) VALUES (?, ?, ?, ?, ?, ?);");
$stmt->bind_param('ssssss', $faculty_name, $rank, $designation, $image, $qualifications, $date_joined);

if ($stmt->execute()){
    echo json_encode(array('status' => 1));
} else {
    echo json_encode(array('status' => 2));
}   

?>