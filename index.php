<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include("includes/db_con.php");

$requestMethod = $_SERVER["REQUEST_METHOD"];

 if($requestMethod == 'POST'){

    $inputData = json_decode(file_get_contents("php://input"),true);

    $target="../assets/documents/";
$video=$_FILES["video"]["name"];
$lcoation=$target.$video;

move_uploaded_file($_FILES['video']['tmp_name'],$lcoation);
$sql = "insert into question_document (document) values ('$video')";

if (mysqli_query($con, $sql)) {
    $last_id = mysqli_insert_id($con);
    $data = [
        'status' => 201
        'message' => 'customer created succesfully'
    ];
    header("HTTP/1.0 201 Created")
    return Json_encode($data)
  } else {
    $data = [
        'status' => 500
        'message' => 'Internal Server Error'
    ];
    header("HTTP/1.0 500 Internal Server Error")
    return Json_encode($data)
  }

}else{
    $data = [
        'status' => 405,
        'message' => $requestMethod. 'Method Not Allowed'
    ]
    header("HTTP/1.0 405 Method Not Allowed");
    echo Json_encode($data)
}
                

?>
