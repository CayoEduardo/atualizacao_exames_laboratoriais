<?php
    include_once(__DIR__.'/controllers/ExameController.class.php');

    $controller = new ExameController();
    $controller->validaResultado(1, '12345678900');
?>