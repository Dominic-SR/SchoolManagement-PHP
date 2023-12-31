<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../class/documentquestion.php';

$database = new Database();
$db = $database->getConnection();
 
$items = new Items($db);
$items->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';

$result = $items->read();

if($result->num_rows > 0){    
    $itemRecords=array();
    $itemRecords["question"]=array(); 
	while ($item = $result->fetch_assoc()) { 	
        extract($item); 
        $itemDetails=array(
            "title_of_question" => $title_of_question,
            "question_type_id" => $question_type_id,
			"document_id" => $document_id,
			"start_time" => $start_time,
			"end_time" => $end_time	
        );
       array_push($itemRecords["question"], $itemDetails);

    }    
    http_response_code(200);     
    echo json_encode($itemRecords);
}else{     
    http_response_code(404);     
    echo json_encode(
        array("message" => "No item found.")
    );
} 