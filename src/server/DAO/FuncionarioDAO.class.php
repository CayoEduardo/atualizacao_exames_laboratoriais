<?php
    include_once(dirname(__DIR__, 1).'/Database.class.php');  
    include_once(__DIR__.'/DAO.class.php');
    Class FuncionarioDAO extends DAO {
        public function getById($searchId) {
            $sql = 'SELECT * FROM funcionario WHERE cpf=?';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$searchId]);
            if($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Funcionario");
                echo '<pre>'.var_export($result[0], true).'<pre>';
                return $result[0];
            }
            return false;
        }

        public function getAll() {
            $sql = 'SELECT * FROM funcionario';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Funcionario");
                echo '<pre>'.var_export($result, true).'<pre>';
                return $result;
            }
            return false;
        }

        public function store($funcionario) {
            throw new TypeError('Não é permitido cadastrar um funcionário nesse sistema');
        }

        public function update($funcionario) {
            throw new TypeError('Não é permitido atualizar os dados de um funcionário nesse sistema');
        }
    }
?>