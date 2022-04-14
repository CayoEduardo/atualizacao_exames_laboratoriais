<?php
    include_once(__DIR__.'/Database.class.php');
        // private $numeroExame;
        // private $status;
        // private $resultado;
        // private $amostra;
        // private $analistaResponsavel;
        // private $supervisorResponsavel;
        // private $justificativaNovaSolicitacao;

        // public function getNumeroExame();
        // public function getStatus();
        // public function getResultado();
        // public function setResultado($resultadoExame);
        // public function getAmostra();
        // public function setAmostra($amostraColetada);
        // public function getAnalistaResponsavel();
        // public function setAnalistaResponsavel();
        // public function getSupervisorResponsavel();
        // public function setSupervisorResponsavel();
        // public function getJustificativaNovaSolicitacao();        
        // public function setJustificativaNovaSolicitacao();        
    Class FuncionarioDAO {
        public $cpf;
        public $nome;
        public $tipoFuncionario;

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