<?php
    include_once(dirname(__DIR__, 1).'/Database.class.php');       
    include_once(__DIR__.'/DAO.class.php');
    Class AmostraDAO extends DAO {
        public function getById($id) {
            $sql = 'SELECT * FROM amostra WHERE idAmostra=?';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            if($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Amostra");
                return $result[0];
            }
            return false;
        }

        public function getAll() {
            $sql = 'SELECT * FROM amostra';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Amostra");
                return $result;
            }
            return false;
        }

        public function store($amostra) {
            if(get_class($amostra) !== 'Amostra')
                throw new TypeError('O objeto deve ser da classe Amostra');
            
            $sql = 'INSERT INTO amostra (tipoAmostra, dataColeta, cpfResponsavel) VALUES (?, ?, ?)';
            $stmt = $this->conn->prepare($sql);
            $succeeded = $stmt->execute([$amostra->getTipo(), $amostra->getDataColeta(), $amostra->getResponsavel()]);
            if($succeeded) {
                $amostra->setIdAmostra($this->conn->lastInsertId());
                return true;
            }
            echo $stmt->errorCode();
            return false;
        }

        public function update($model) {
            throw new TypeError('Não é permitido atualizar uma amostra');
        }
    }
?>