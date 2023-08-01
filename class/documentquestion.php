<?php
class Items{   
    
    private $itemsTable = "questions";      
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
			INSERT INTO ".$this->itemsTable."(`title_of_question`, `question_type_id`, `document_id`, `start_time`, `x_key`, `y_key`)
			VALUES(?,?,?,?,?,?)");
			$this->title_of_question = htmlspecialchars(strip_tags($this->title_of_question));
			$this->question_type_id = htmlspecialchars(strip_tags($this->question_type_id));
			$this->document_id = htmlspecialchars(strip_tags($this->document_id));
			$this->start_time = htmlspecialchars(strip_tags($this->start_time));
			$this->x_key = htmlspecialchars(strip_tags($this->x_key));
			$this->y_key = htmlspecialchars(strip_tags($this->y_key));

			$stmt->bind_param("siisii", $this->title_of_question, $this->question_type_id, $this->document_id, $this->start_time, $this->x_key, $this->y_key);
		
		if($stmt->execute()){
			return true;
		}
	 
		return false;		 
	}
    
	}
?>