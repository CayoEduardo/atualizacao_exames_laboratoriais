<?php
    include_once(dirname(__DIR__, 1).'/Database.class.php');       
    include_once(dirname(__DIR__, 1).'/models/Exame.class.php');
    include_once(dirname(__DIR__, 1).'/models/Amostra.class.php');
    include_once(dirname(__DIR__, 1).'/models/Funcionario.class.php');
    include_once(__DIR__.'/AmostraDAO.class.php');
    include_once(__DIR__.'/FuncionarioDAO.class.php');

    Class ExameDAO {
        private $conn;

        function __construct() {
            $db = Database::getInstance();
            $this->conn = $db->getConnection();
        }
        
        public function getById($searchId) {
            $sql = 'SELECT * FROM exame WHERE numeroExame=?';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$searchId]);
            if($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Exame");
                
                $idAmostra = $result[0]->getAmostra();
                if($idAmostra !== NULL) {
                    $amostraDAO = new AmostraDAO();
                    $modelAmostra = $amostraDAO->getById($idAmostra);
                    $result[0]->setAmostra($modelAmostra);
                }
                // var_dump($result[0]);
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
            // echo 'Update exame com amostra null<br><br>';
            $modelAmostra = $exame->getAmostra();
            $idAmostraExame = $modelAmostra !== NULL ? (is_string($modelAmostra) ? $modelAmostra : $modelAmostra->getIdAmostra()) : NULL;
            $modelAnalista = $exame->getAnalista();
            $idAnalistaExame = $modelAnalista !== NULL ? (is_string($modelAnalista) ? $modelAnalista : $modelAnalista->getCpf()) : NULL;
            $modelSupervisor = $exame->getSupervisor();
            $idSupervisorExame = $modelSupervisor !== NULL ? (is_string($modelSupervisor) ? $modelSupervisor : $modelSupervisor->getCpf()) : NULL;
            $succeeded = $stmt->execute([$exame->getStatus(), $exame->getResultado(), $idAmostraExame, $idAnalistaExame, $idSupervisorExame, $exame->getJustificativa(), $exame->getNumeroExame()]);
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