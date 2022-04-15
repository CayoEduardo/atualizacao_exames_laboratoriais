<?php
    include_once(dirname(__DIR__, 1).'/models/Amostra.class.php');
    include_once(dirname(__DIR__, 1).'/models/Exame.class.php');
    include_once(dirname(__DIR__, 1).'/DAO/ExameDAO.class.php');

    class ExameController {

        public function cadastraResultado($idExame, $resultado, $funcionario){
           
           $exameDAO = new ExameDAO();

           $exame = $exameDAO->getById($idExame);
           $exame->inserirResultado($resultado,  $funcionario);
           $exame->atualizarStatus('AGUARDANDO LAUDO');
           $exameDAO->update($exame);
        }

        public function validaResultado($idExame, $funcionario){
            
            $exameDAO = new ExameDAO();

            $exame = $exameDAO->getById($idExame);
            $exame->validarExame($funcionario);
            $exame->atualizarStatus('LIBERADO');
            $exameDAO->update($exame);
        }

        public function solicitaNovaColeta($idExame, $justificativa, $funcionario){

            $exameDAO = new ExameDAO();

            $exame = $exameDAO->getById($idExame);
            $exame->solicitarNovaColeta($justificativa, $funcionario);
            $exame->atualizarStatus('NOVA COLETA SOLICITADA');
            $exameDAO->update($exame);
        }
    }
?>  