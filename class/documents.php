<?php
class Items{   
    
    private $itemsTable = "question_document";      
    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;   
    public $created; 
	public $modified; 
	public $document;
    private $conn;
	
    public function __construct($db){
        $this->conn = $db;
    }	
	
	function read(){	
		if($this->id) {
		$stmt = $this->conn->prepare("SELECT * FROM ".$this->itemsTable." WHERE document_id = ?");
		$stmt->bind_param("i", $this->id);	

		} else {
			$stmt = $this->conn->prepare("SELECT * FROM ".$this->itemsTable);	
		}		
		$stmt->execute();			
		$result = $stmt->get_result();		
		return $result;	
	}
	
	function create(){
		
		$stmt = $this->conn->prepare("
			INSERT INTO ".$this->itemsTable."(`document`)
			VALUES(?)");
		$this->document = htmlspecialchars(strip_tags($this->document));
		$stmt->bind_param("s", $this->document);
		
		if($stmt->execute()){
			// echo($stmt->insert_id);
			$id = $stmt->insert_id;
			return $id;
		}
	 
		return false;		 
	}
		
	function update(){
		$stmt = $this->conn->prepare("
			UPDATE ".$this->itemsTable." 
			SET document= ?
			WHERE document_id = ?");
	 
		$this->document = htmlspecialchars(strip_tags($this->document));
		$this->id = htmlspecialchars(strip_tags($this->id));
		$updateId = intval($this->id);
		$stmt->bind_param("si", $this->document, $updateId);
		
		if($stmt->execute()){
			return true;
		}
	 
		return false;
	}
	
	function delete(){
		
		$stmt = $this->conn->prepare("
			DELETE FROM ".$this->itemsTable." 
			WHERE document_id = ?");
			
		$this->id = htmlspecialchars(strip_tags($this->id));
	 
		$stmt->bind_param("i", $this->id);
	 
		if($stmt->execute()){
			return true;
		}
	 
		return false;		 
	}
}
?>