<?php
    include_once(dirname(__DIR__, 1).'/Database.class.php');  
    Class FuncionarioDAO {
        private $conn;

        function __construct() {
            $db = Database::getInstance();
            $this->conn = $db->getConnection();
        }

        public function getById($searchId) {
            $sql = 'SELECT * FROM funcionario WHERE cpf=?';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$searchId]);
            if($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Funcionario");
                return $result[0];
                // echo '<br><br><br>';
                // foreach ($result as $row) {
                //     echo 'nome: '.$row['nome'].'<br/>';
                //     echo 'cpf: '.$row['cpf'].'<br/>';
                //     echo 'tipoFuncionario: '.$row['tipoFuncionario'].'<br/>';
                // }
            }
            else
                echo 'Nenhum valor encontrado';

            return;
        }
    }
?>