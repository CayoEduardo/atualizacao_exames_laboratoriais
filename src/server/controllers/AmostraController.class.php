<?php
    include_once(dirname(__DIR__, 1).'/models/Amostra.class.php');
    include_once(dirname(__DIR__, 1).'/models/Exame.class.php');
    include_once(dirname(__DIR__, 1).'/DAO/AmostraDAO.class.php');
    include_once(dirname(__DIR__, 1).'/DAO/ExameDAO.class.php');
    class AmostraController {

        public function cadastraAmostra($idExame, $tipo, $dataDeColeta,$responsavel){
            
            $amostraDAO = new AmostraDAO();
            $exameDAO = new ExameDAO();
            
            $amostra = new Amostra($tipo, $dataDeColeta,$responsavel);
            $amostraDAO->store($amostra);
            $exame = $exameDAO->getById($idExame);
            $exame->adicionarAmostra($amostra);
            $exameDAO->update($exame);
        }

        public function listarAmostras() {
            $amostraDAO = new AmostraDAO();
            $amostras = $amostraDAO->getAll();

            return $amostras;
        }
    }
?>