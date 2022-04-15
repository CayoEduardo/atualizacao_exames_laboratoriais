<?php
    include_once(dirname(__DIR__, 1).'/Database.class.php');       
    include_once(dirname(__DIR__, 1).'/models/Exame.class.php');
    include_once(dirname(__DIR__, 1).'/models/Amostra.class.php');
    include_once(dirname(__DIR__, 1).'/models/Funcionario.class.php');
    include_once(__DIR__.'/AmostraDAO.class.php');
    include_once(__DIR__.'/FuncionarioDAO.class.php');
    include_once(__DIR__.'/DAO.class.php');

    Class ExameDAO extends DAO {       
        public function getById($id) {
            $sql = 'SELECT * FROM exame WHERE numeroExame=?';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            if($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Exame");
                
                $idAmostra = $result[0]->getAmostra();
                if($idAmostra !== NULL) {
                    $amostraDAO = new AmostraDAO();
                    $modelAmostra = $amostraDAO->getById($idAmostra);
                    $result[0]->setAmostra($modelAmostra);
                }
                return $result[0];
            }
            return false;
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
                return true;
            }
            echo $stmt->errorCode();
            return false;
        }

        public function getAll() {
            $sql = 'SELECT * FROM exame';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Exame");
                return $result;
            }
            return false;
        }

        public function store($amostra) {
            throw new TypeError('Não é permitido criar um exame nesse sistema');
        }
    }
?>