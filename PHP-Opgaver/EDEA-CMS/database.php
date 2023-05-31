<?php // NOT WORKING
class database{
    protected $connection = null;
    private $host;
    private $user;
    private $password;
    private $db;


    public function __construct($host, $user, $password, $db)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
    }

    function connect(){
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->db);
    }
    
    
}

    


?>