<?php
    include_once(dirname(__DIR__, 1).'/Database.class.php');       
    Class AmostraDAO {
        private $conn;

        function __construct() {
            $db = Database::getInstance();
            $this->conn = $db->getConnection();
        }

        public function getById() {
            $sql = 'SELECT * FROM funcionario';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Amostra");
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

        // public function getAll() {
        //     $sql = 'SELECT nome, cpf, tipoFuncionario, passwordHash FROM funcionario';
        //     $stmt = $this->conn->prepare($sql);
        //     $stmt->execute();
        //     if($stmt->rowCount() > 0) {
        //         $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "FuncionarioDAO");
        //         var_dump($result);
        //         // echo '<br><br><br>';
        //         // foreach ($result as $row) {
        //         //     echo 'nome: '.$row['nome'].'<br/>';
        //         //     echo 'cpf: '.$row['cpf'].'<br/>';
        //         //     echo 'tipoFuncionario: '.$row['tipoFuncionario'].'<br/>';
        //         // }
        //     }
        //     else
        //         echo 'Nenhum valor encontrado';

        //     return;
        // }

        public function store($amostra) {
            if(get_class($amostra) !== 'Amostra')
                throw new TypeError('O objeto deve ser da classe Amostra');
            
            $sql = 'INSERT INTO amostra (tipoAmostra, dataColeta, cpfResponsavel) VALUES (?, ?, ?)';
            $stmt = $this->conn->prepare($sql);
            $succeeded = $stmt->execute([$amostra->getTipo(), $amostra->getDataColeta(), $amostra->getResponsavel()]);
            if($succeeded) {
                // $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "FuncionarioDAO");
                $amostra->setIdAmostra($this->conn->lastInsertId());
                echo 'sucesso ao inserir amostra';
                // echo '<br><br><br>';
                // foreach ($result as $row) {
                //     echo 'nome: '.$row['nome'].'<br/>';
                //     echo 'cpf: '.$row['cpf'].'<br/>';
                //     echo 'tipoFuncionario: '.$row['tipoFuncionario'].'<br/>';
                // }
            }
            else
                echo $stmt->errorCode();

            return;
        }

        // public function update();
    }
?>