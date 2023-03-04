<?php

include '../../config.php';

$data = json_decode(file_get_contents('php://input'));
$method = $_SERVER["REQUEST_METHOD"];
$date = date('Y-m-d H:i:s a');

// ADD DATA
if ($method == "POST") {

    $faculty_name = $data->faculty_name;
    $rank = $data->rank;
    $designation = $data->designation;
    $image = $data->image;
    $qualifications = $data->qualifications;
    $date_joined = $data->date_joined;
  
    $stmt = $db->prepare("INSERT INTO `faculty` (`FACULTY_NAME`, `RANK`, `DESIGNATION`,     
     `FACULTY_IMAGE`, `QUALIFICATIONS`, `DATE_JOINED`) VALUES (?, ?, ?, ?, ?, ?);");
    $stmt->bind_param('ssssss', $faculty_name, $rank, $designation, $image, $qualifications, 
     $date_joined);

    if ($stmt->execute()){
        $output = json_encode(array('status' => 1));
    } else {
        $output = json_encode(array('status' => 2));
    }

} else if ($method == "GET") {
    // FETCH DATA

    $id = $_GET['faculty_id'];

    $stmt = $db->prepare('SELECT * from `faculty` WHERE PK_FACULTY_ID = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $response = $result->fetch_all(MYSQLI_ASSOC);

    $output = json_encode($response);

} else if ($method == "PUT") {
    // UPDATE DATA

    $user_id = $_GET['user_id'];

    $faculty_name = $data->faculty_name;
    $rank = $data->rank;
    $designation = $data->designation;
    $image = $data->image;
    $qualifications = $data->qualifications;
    $date_joined = $data->date_joined;

     $stmt = $db->prepare("UPDATE `faculty` SET `FACULTY_NAME` = ?, SET `RANK` = ?, SET 
      `DESIGNATION` = ?, SET `FACULTY_IMAGE` = ?, SET `QUALIFICATIONS`= ?, `DATE_JOINED` = ?, ` 
       DATE_EDITED = ?, LAST_EDIT = ?) VALUES (?, ?, ?, ?, ?, ?);");
    $stmt->bind_param('ssssssss', $faculty_name, $rank, $designation, $image, $qualifications, 
     $date_joined, $date, $user_id);

} else if ($method == "DELETE") {
    // UPDATE DATA

    $stmt = $db->prepare('SELECT * from `faculty` WHERE PK_FACULTY_ID = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $response = $result->fetch_all(MYSQLI_ASSOC);

    $output = json_encode($response);
    
} else {
    // Nothing

}


$db->close();
echo(json_encode($output))
?>


   

?>