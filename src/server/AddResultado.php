<?php
    include_once(__DIR__.'/controllers/ExameController.class.php');


    $funcionario = new Funcionario("12345678911","eyazcon314sdf", "ANALISTA_CLINICO");
    $exameDAO = new ExameDAO();
    $exame = $exameDAO->getById(1);
    $controller = new ExameController();
    $controller->cadastraResultado(1, "Um resultado +/-", $funcionario);
    // var_dump($result);
?>