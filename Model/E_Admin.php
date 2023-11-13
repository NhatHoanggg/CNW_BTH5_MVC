
<?php
class Entity_Admin{
    public $id; 
    public $username;
    public $password;
    
    public function __construct($_id, $_username, $_password) { 
        $this->idnv = $_id;
        $this->username = $_username;
        $this->password = $_password;
    }
} 
?>
