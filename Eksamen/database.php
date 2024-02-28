<?php
class database
{
    protected $connection = null;
    protected $host = "localhost";
    protected $user = getenv(DB_USERNAME);
    protected $password = getenv(DB_PASSWORD);
    protected $db = "jona63m2_V31Eksame_db";
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

    /**
     * Function to execute sqlquery and return mysqli_result object
     * 
     * @param string $sql MySQL query string to run
     * 
     * @return mysqli_result|bool Returns false on failure. For successful queries which produce a result set, such as SELECT, SHOW, DESCRIBE or EXPLAIN,   mysqli_query will return a mysqli_result object. For other successful queries mysqli_query will return true.
     */
    protected function query_execute($sql)
    {
        return $this->connection->query($sql);
    }


    /**
     * Function to convert mysqli_result object into array with values
     * 
     * @param mysqli_result $result Return value from mysqli->query function
     * 
     * @return array Nested array with all rows 
     */
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

    /**
     * Function to select data from MySQL database
     * 
     * @param string $table MySQL FROM Value
     * @param string $where MySQL WHERE Value
     * @param string $order MySQL ORDER BY value
     * @param string $orderDirection MySQL ORDER BY Direction
     * @param string $limit MySQL Limit value
     * 
     * @return array Returns all rows from query in array 
     */
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


    /**
     * Function to insert data into MySQL Database
     * 
     * @param string $table Table to insert data into
     * @param array $array Multidimensonal array with KEY = database column and VALUE = database insert value
     * 
     * @return bool true if succesful and false if insert failed
     */
    public function insert($table, $array){
        $values = "";
        $columns = "";
        foreach ($array as $column => $value) {
            // Check if value is that last in array
            // If true dont add ","
            if($column === array_key_last($array)){ 

                // Check if value is empty if true add NULL without ''
                empty($value) ? $values .= "NULL" : $values .= "'$value'";
                $columns .= "$column";
            } else{

                // Check if value is empty if true add NULL without ''
                empty($value) ? $values .= "NULL, " : $values .= "'$value', ";
                $columns .= "$column, ";
            }
        }
        // echo "INSERT INTO $table ($columns) VALUES ($values)"; 
        return $this->query_execute("INSERT INTO $table ($columns) VALUES ($values)");
    }

    /**
     * Function to delete data in MySQL Database
     * 
     * @param string $table Table to delete data from
     * @param string $where MySQL WHERE Value (E.g. ID = '1')
     * 
     * @return bool true if successful and false if delete failed
     */
    public function delete($table, $where){

        return $this->query_execute("DELETE FROM $table WHERE $where");
    }

    /**
     * Function to update row in MySQL Database
     * 
     * @param string $table Table to update data in
     * @param array $array Multidimensional array with KEY = column and VALUE = update value
     * @param string $where MySQL WHERE Value (E.g. ID = '1')
     * 
     * @return true if successful and false if delete failed
     */
    public function update($table, $array, $where){
        
        $set_values = "";

        foreach ($array as $column => $value) {
          
            // Check if value is the last in array
            // If true don't add ","
            if($column === array_key_last($array)){ 
                $set_values .= empty($value) ? "$column = NULL " : "$column = '$value' ";
            } else{
                $set_values .= empty($value) ? "$column = NULL, " : "$column = '$value', ";
            }
        }

        return $this->query_execute("UPDATE $table SET $set_values WHERE $where");
    }
}

?>