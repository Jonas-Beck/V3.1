<?php // NOT WORKING
class database
{
    protected $connection = null;
    protected $host = "localhost";
    protected $user = "jona63m2_jona63m2";
    protected $password = "cvcv090701";
    protected $db = "jona63m2_EDEA_db";
    public $check_connection = null;

    // Create connection and set char set "utf8mb4" when constructed
    function __construct()
    {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->db);
        if($this->connection->connect_error){
            // Connection Failed
            $this->check_connection = false;
        } else{
            $this->check_connection = true;
            $this->connection->set_charset("utf8mb4");
        }
    }
    // Function to execute sqlquery and return mysqli_result object
    public function query_execute($sql)
    {
        return $this->connection->query($sql);
    }

    // Function to return all data from mysqli_result object as an array
    protected function fetch_data($result)
    {
        // Array to store all items
        $array = [];
        // Loop through all rows (fetch_assoc returns NULL when next row is empty)
        while ($row = $result->fetch_assoc()) {
            // Save product in array
            $array[] = $row; 
        }
        // Return array with all items
        return $array;
    }

    // Function to get all rows from sql statement using query_execute and fetch_data functions
    public function get_rows($sql)
    {
        $result = $this->query_execute($sql);
        return $this->fetch_data($result);
    }

    public function select($table, $where = "", $order = "", $orderDirection = "", $limit = ""){
        if (!empty($where)) {
            $where = "WHERE ".$where;
        }
        if (!empty($order)) {
            $order = "ORDER BY ".$order." ".$orderDirection;
        }
        if (!empty($limit)){
            $limit = "LIMIT ".$limit;
        }
        $result = $this->query_execute("SELECT * FROM $table $where $order $limit");
        return $this->fetch_data($result);
    }

    // Insert into database table 
    // Table = Table name to insert into
    // Array = Associate array with columnname as key and value as value
    public function insert($table, $array){
        $values = $columns = "";
        foreach ($array as $columns => $value) {
            // Check if value is that last in array
            // If true dont add ","
            if($value === end($array)){ 
                $columns .= "'$columns'";
                $values .= "'$value'";
            } else{
                $columns .= "'$columns',";
                $values .= "'$value',";
            }
        }
        echo "INSERT INTO $table ($columns) VALUES ($values)"; // <- This dosent work
        $this->query_execute("INSERT INTO $table ($columns) VALUES ($values)");
    }
}

?>