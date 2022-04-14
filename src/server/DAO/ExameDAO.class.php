<?php
    include_once(dirname(__DIR__, 1).'/Database.class.php');       
    include_once(dirname(__DIR__, 1).'/models/Exame.class.php');

    Class ExameDAO {
        private $conn;

        function __construct() {
            $db = Database::getInstance();
            $this->conn = $db->getConnection();
        }
        
        public function getById() {
            $sql = 'SELECT * FROM exame LIMIT 1';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Exame");
                var_dump($result);
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

        public function update($exame) {
            if(get_class($exame) !== 'Exame')
                throw new TypeError('O objeto deve ser da classe Exame');
            
            $sql = 'UPDATE exame SET status=?, resultado=?, amostra=?, cpfAnalista=?, cpfSupervisor=?, justificativaNovaColeta=? WHERE numeroExame=?';
            $stmt = $this->conn->prepare($sql);
            $succeeded = $stmt->execute([$exame->getStatus(), $exame->getResultado(), $exame->getAmostra()->getIdAmostra(), $exame->getAnalista(), $exame->getSupervisor(), $exame->getJustificativa(), $exame->getNumeroExame()]);
            if($succeeded) {
                echo 'update com sucesso<br>';
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


        // public function getAll();
        // public function update();
    }
?>