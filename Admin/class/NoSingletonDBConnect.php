<?php
    namespace TTKMovie;

    class NoSingletonDBConnect
    {
        private static $instances = null;

        private $con;
  
        private $server = 'localhost';
        private $username = "root";
        private $password = "";
        private $dbname = "ttkmovie";

        // The constructor is private
        // to prevent initiation with outer code.
        public function __construct() 
        { 
            $this-> con = mysqli_connect($this->server,$this->username,$this->password);
        }

        public function getConnection()
        {
            mysqli_select_db($this->con, $this->dbname);
            return $this->con;
        }
    }

    /*function clientCode()
    {
        $instance = new NoSingletonDBConnect();
        $conn = $instance->getConnection();
        var_dump($conn);
        echo "</br>";
        echo "</br>";
        
        $instance = new NoSingletonDBConnect();
        $conn = $instance->getConnection();
        var_dump($conn);
        echo "</br>";
        echo "</br>";
        
        $instance = new NoSingletonDBConnect();
        $conn = $instance->getConnection();
        var_dump($conn);
        echo "</br>";
    }

    clientCode();*/
?>