<?php
    include_once(__DIR__.'/controllers/ExameController.class.php');

    $controller = new ExameController();
    $controller->solicitaNovaColeta(1, "Amostra danificada.", "12345678900");
    // var_dump($result);
?>