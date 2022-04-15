<?php
    include_once(dirname(__DIR__, 1).'/DAO/FuncionarioDAO.class.php');

    class FuncionarioController {
        public function listaFuncionarios() {
            $funcionarioDAO = new FuncionarioDAO();
            return $funcionarioDAO->getAll();
        }
    }
?>