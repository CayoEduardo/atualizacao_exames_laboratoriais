<?php
    class DBHelper {
        protected $conn;

        function __construct() {
            $db = Database::getInstance();
            $this->conn = $db->getConnection();
        }

        public function resetDatabase() {
            $sql = "DELETE FROM exame";
            $sql2 = "DELETE FROM amostra";
            $sql3 = "ALTER TABLE amostra AUTO_INCREMENT = 1";
            $sql4 = "ALTER TABLE exame AUTO_INCREMENT = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $stmt = $this->conn->prepare($sql2);
            $stmt->execute();
            $stmt = $this->conn->prepare($sql3);
            $stmt->execute();
            $stmt = $this->conn->prepare($sql4);
            $stmt->execute();
        }

        public function insertDataForTesting($type) {
            switch($type) {
                case 'amostra':
                    $sql = "INSERT INTO exame (numeroExame,status,resultado,amostra,cpfAnalista,cpfSupervisor,justificativaNovaColeta) VALUES (1, 'AGUARDANDO COLETA', null, null, null, null, null);";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute();
                    break;
                case 'resultado':
                    $sql = "INSERT INTO exame (numeroExame,status,resultado,amostra,cpfAnalista,cpfSupervisor,justificativaNovaColeta) VALUES (1, 'EM ANALISE', null, null, null, null, null);";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute();
                    $sql = "INSERT INTO amostra (tipoAmostra, dataColeta, cpfResponsavel) VALUES ('Sangue', '2022-06-22 12:00:00', '12345678900')";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute();
                    $sql = "UPDATE exame SET status='EM ANALISE', amostra=1 WHERE numeroExame = 1";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute();
                    break;
                case 'validar':
                    $sql = "INSERT INTO exame (numeroExame,status,resultado,amostra,cpfAnalista,cpfSupervisor,justificativaNovaColeta) VALUES (1, 'EM ANALISE', null, null, null, null, null);";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute();
                    $sql = "INSERT INTO amostra (tipoAmostra, dataColeta, cpfResponsavel) VALUES ('Sangue', '2022-06-22 12:00:00', '12345678900')";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute();
                    $sql = "UPDATE exame SET status='AGUARDANDO LAUDO', amostra=1, cpfAnalista='12345678901', resultado='...' WHERE numeroExame = 1";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute();
                    break;
                default:
                    break;
            }
        }
    }
?>