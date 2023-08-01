<?php
class Items{   
    
    private $itemsTable = "master_question";      
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
	}
?>