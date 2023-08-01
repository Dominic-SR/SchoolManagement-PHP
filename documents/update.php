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
$items->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';
$file = $_FILES['document']['name'];

if(!empty($file)){ 
	
    $target="../assets/documents/";
    $image=$_FILES["document"]["name"];
    $lcoation=$target.$image;
    move_uploaded_file($_FILES['document']['tmp_name'],$lcoation);

	$items->document = $file;

	if($items->update()){     
		http_response_code(200);   
		echo json_encode(array("message" => "document was updated."));
	}else{    
		http_response_code(503);     
		echo json_encode(array("message" => "Unable to update documenst."));
	}
	
} else {
	http_response_code(400);    
    echo json_encode(array("message" => "Unable to update documents. Data is incomplete."));
}
?>