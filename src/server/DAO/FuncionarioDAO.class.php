<?php
    include_once(dirname(__DIR__, 1).'/Database.class.php');  
    Class FuncionarioDAO {
        private $cpf;
        private $nome;
        private $tipoFuncionario;

        function __construct() {
            $this->cpf = null;
            $this->nome = null;
            $this->tipoFuncionario = null;
        }

        public function getCpf() {
            return $this->cpf;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getTipoFuncionario() {
            return $this->tipoFuncionario;
        }

        private function setFuncionario($cpf, $nome, $tipoFuncionario) {
            $this->cpf = $cpf;
            $this->nome = $nome;
            $this->tipoFuncionario = $tipoFuncionario;
        }

        public function retrieveFuncionario() {
            $db = Database::getInstance();
            $conn = $db->getConnection();

            $sql = 'SELECT nome, cpf, tipoFuncionario, passwordHash FROM funcionario';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "FuncionarioDAO");
                var_dump($result);
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