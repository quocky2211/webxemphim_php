<?php
    class SingletonDBConnect
    {
        private static $instances = null;

        private $con;
  
        private $server = 'localhost';
        private $username = "root";
        private $password = "";
        private $dbname = "ttkmovie";

        // The constructor is private
        // to prevent initiation with outer code.
        private function __construct() 
        { 
            $this-> con = mysqli_connect($this->server,$this->username,$this->password);
        }

        public static function getInstance()
        {
            if(!self::$instances)
            {
                self::$instances = new SingletonDBConnect();
            }        
            return self::$instances;
        }

        public function getConnection()
        {
            mysqli_select_db($this->con, $this->dbname);
            return $this->con;
        }
    }

    /*function clientCode()
    {
        $instance = SingletonDBConnect::getInstance();
        $conn = $instance->getConnection();
        var_dump($conn);
        echo "</br>";
        echo "</br>";

        $instance = SingletonDBConnect::getInstance();
        $conn = $instance->getConnection();
        var_dump($conn);
        echo "</br>";
        echo "</br>";
        
        $instance = SingletonDBConnect::getInstance();
        $conn = $instance->getConnection();
        var_dump($conn);
        echo "</br>";
        echo "</br>";
    }

    clientCode();*/
?>