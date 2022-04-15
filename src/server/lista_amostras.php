<?php
    include_once(__DIR__.'/controllers/AmostraController.class.php');

    $controller = new AmostraController();
    $amostras = $controller->listarAmostras();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="lista_amostras.css" />
    <title>Lista de amostras</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="page">
        <main>
          <div class="table_header">
            <h3>Lista de Amostras</h3>
            <a class="link_amostras" href="/src/client/cadastro_amostra.html">Adicionar amostra</a>
          </div>
          <table>
            <tr>
              <th>Id Amostra</th>
              <th>Tipo</th>
              <th>Data de coleta</th>
              <th>Responsável</th>
            </tr>
            <?php foreach($amostras as $index=>$amostra): ?>
            <tr>
              <td><?=  $amostra->getIdAmostra()?></td>
              <td><?= $amostra->getTipo()?></td>
              <td><?= $amostra->getDataColeta()?></td>
              <td><?= $amostra->getResponsavel()?></td>
            
            </tr>
            <?php endforeach; ?>
          </table>
        </main>
      </div>
    </div>
  </body>
</html>
