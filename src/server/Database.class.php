<?php
    class Database {
        private $_connection;
        private static $_instance; //The single instance
        private $_host = "127.0.0.1";
        private $_username = "root";
        private $_password = "";
        private $_database = "exames_laboratoriais";

        /*
        Get an instance of the Database
        @return Instance
        */
        public static function getInstance() {
            if(!self::$_instance) { // If no instance then make one
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        // Constructor
        private function __construct() {
            try {
                $this->_connection = new PDO("mysql:" . "host=127.0.0.1;" . "dbname=exames_laboratoriais", 'root', '');
                $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              } catch(PDOException $e) {
                  echo 'ERROR: ' . $e->getMessage();
              }
        }

        // Magic method clone is empty to prevent duplication of connection
        private function __clone() { }

        // Get mysqli connection
        public function getConnection() {
            return $this->_connection;
        }
    }
?>