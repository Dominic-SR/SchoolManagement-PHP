<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../config/Database.php';
include_once '../class/documents.php';
 
$database = new Database();
$db = $database->getConnection();
 
$items = new Items($db);
 
$data = json_decode(file_get_contents("php://input"));
$file = $_FILES['document']['name'];
if(!empty($file)){    
    $target="../assets/documents/";
    $image=$_FILES["document"]["name"];
    $lcoation=$target.$image;
    move_uploaded_file($_FILES['document']['tmp_name'],$lcoation);
    
    $items->document = $file;
    if($items->create()){  

        $myObj = new stdClass();
        $myObj->insert_id = $db->insert_id;
        $myObj->message = "Document added successfully.";
       
        http_response_code(200);
        $myJSON = json_encode($myObj);
        echo $myJSON;
    } else{         
        http_response_code(503);        
        echo json_encode(array("message" => "Unable to create document."));
    }
}else{    
    http_response_code(400);    
    echo json_encode(array("message" => "Unable to create document. Data is incomplete."));
}
?>