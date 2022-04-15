<?php
    include_once(__DIR__.'/controllers/ExameController.class.php');

    $controller = new ExameController();
    $controller->cadastraResultado(5, '{"resultado": [{"componente": "hemacias", "valor referencial": {"masc": "5 - 0.5", "fem": "4.3 - 0.5"}, "resultadoPaciente": "4"}, {"componente": "hemoglobina", "valor referencial": {"masc": "15 - 2", "fem": "13.5 - 1.5"}, "resultadoPaciente": "6"}, {"componente": "plaquetas", "valor referencial": {"masc": "150 - 400", "fem": "150 - 400"}, "resultadoPaciente": "144"}]}', '01234567890');
?>