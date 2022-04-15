<?php
    include_once(dirname(__DIR__, 1).'/models/Amostra.class.php');
    include_once(dirname(__DIR__, 1).'/models/Exame.class.php');
    include_once(dirname(__DIR__, 1).'/models/Funcionario.class.php');
    include_once(dirname(__DIR__, 1).'/DAO/ExameDAO.class.php');
    include_once(dirname(__DIR__, 1).'/DAO/FuncionarioDAO.class.php');

    class ExameController {

        public function cadastraResultado($idExame, $resultado, $cpfAnalista){
           
           $exameDAO = new ExameDAO();
           $analistaDAO = new FuncionarioDAO();

           $exame = $exameDAO->getById($idExame);
           $analista = $analistaDAO->getById($cpfAnalista);
           $exame->inserirResultado($resultado, $analista);
           $exameDAO->update($exame);
        }

        public function validaResultado($idExame, $cpfSupervisor){
            
            $exameDAO = new ExameDAO();
            $supervisorDAO = new FuncionarioDao();

            $exame = $exameDAO->getById($idExame);
            $supervisor = $supervisorDAO->getById($cpfSupervisor);
            $exame->validarExame($supervisor);
            $exame->atualizarSupervisor($supervisor);
            $exameDAO->update($exame);
        }

        public function solicitaNovaColeta($idExame, $justificativa, $cpfSupervisor){

            $exameDAO = new ExameDAO();
            $supervisorDAO = new FuncionarioDao();

            $exame = $exameDAO->getById($idExame);
            $supervisor = $supervisorDAO->getById($cpfSupervisor);
            $exame->solicitarNovaColeta($justificativa, $supervisor);
            $exameDAO->update($exame);
        }
    }
?>  