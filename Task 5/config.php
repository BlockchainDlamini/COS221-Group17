<?php 
    class Connect {
       private $conn;
       public function __construct() {
            $servername = "wheatley.cs.up.ac.za";
            $username = "u22557858";
            $serverpassword = "4DUVHCM4CCIBCCIRWY5JFTC73KGLY4XE";
            $dbname = "u22557858_COS221";
        
            // Create connection
            $this->conn = new mysqli($servername, $username, $serverpassword, $dbname);
        
            // Check connection
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }

        public function getConnection() {
            return $this->conn;
        }
    }
?>