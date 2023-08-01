<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../config/Database.php';
include_once '../class/documentquestion.php';
 
$database = new Database();
$db = $database->getConnection();
 
$items = new Items($db);
 
$data = json_decode(file_get_contents("php://input"));

// if(!empty($data->title_of_question) && !empty($data->question_type_id) &&
// !empty($data->document_id) && !empty($data->start_time) &&
// !empty($data->end_time)){    

    $items->title_of_question = $data->title_of_question;
    $items->question_type_id = $data->question_type_id;
    $items->document_id = $data->document_id;
    $items->start_time = $data->start_time;
    $items->x_key = $data->x_key;	
    $items->y_key = $data->y_key;
    
    if($items->create()){         
        http_response_code(201);         
        echo json_encode(array("message" => "Item was created."));
    } else{         
        http_response_code(503);        
        echo json_encode(array("message" => "Unable to create item."));
    }
// }else{    
//     http_response_code(400);    
//     echo json_encode(array("message" => "Unable to create item. Data is incomplete."));
// }
?>