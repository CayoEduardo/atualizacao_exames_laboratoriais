<?php
    abstract class DAO {
        protected $conn;

        function __construct() {
            $db = Database::getInstance();
            $this->conn = $db->getConnection();
        }

        public abstract function getById($id);
        public abstract function getAll();
        public abstract function store($model);
        public abstract function update($model);
    }
?>