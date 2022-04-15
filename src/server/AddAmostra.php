<?php
    include_once(__DIR__.'/controllers/AmostraController.class.php');

    $controller = new AmostraController();
    $dataColeta = new DateTime('now');
    $controller->cadastraAmostra(4, 'SANGUE', $dataColeta->format('Y-m-d h:i:s'), '12345678900');
?>