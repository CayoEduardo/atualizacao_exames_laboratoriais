<?php
    include_once(__DIR__.'/controllers/AmostraController.class.php');

    $controller = new AmostraController();
    $dataColeta = new DateTime('now');
    $controller->cadastraAmostra(1, 'SANGUE', $dataColeta->format('Y-m-d h:i:s'), '46879049800');
?>