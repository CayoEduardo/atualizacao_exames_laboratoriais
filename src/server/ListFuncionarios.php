<?php
    include_once(__DIR__.'/FuncionarioDAO.class.php');

    $dao = new FuncionarioDAO();
    $dao->retrieveFuncionario();
?>