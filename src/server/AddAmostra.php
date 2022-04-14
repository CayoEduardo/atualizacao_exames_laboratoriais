<?php
    include_once(__DIR__.'/controllers/AmostraController.class.php');

    $controller = new AmostraController();
    $dataColeta = new DateTime();
    $result = $controller->cadastraAmostra(1, 'SANGUE', $dataColeta->format('YY-MM-DD h:I:S'), '');
    var_dump($result);
?>