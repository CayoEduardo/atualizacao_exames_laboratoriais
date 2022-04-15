<?php
    include_once(dirname(__DIR__, 1).'/controllers/ExameController.class.php');

    $controller = new ExameController();
    $exames = $controller->listaExames();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="lista_exames.css" />
    <title>Lista de amostras</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="page">
        <main>
          <div class="table_header">
            <h3>Lista de Exames</h3>
            <!-- <button>Adicionar amostra</button> -->
          </div>
          <table>
            <tr>
              <th>Número</th>
              <th>Status</th>
              <th>Data</th>
              <th>Resultado</th>
              <th>Id Amostra</th>
              <th>Analista Clínico</th>
              <th>Supervisor</th>
            </tr>
            <?php foreach($exames as $index=>$exame): ?>
              <tr>
                <td><?php echo $exame->getNumeroExame(); ?></td>
                <td><?php echo $exame->getStatus(); ?></td>
                <td><?php echo $exame->getAmostra() !== NULL ? $exame->getAmostra()->getDataColeta() : ''; ?></td>
                <td><?php echo $exame->getResultado(); ?></td>
                <td><?php echo $exame->getAmostra() !== NULL ? $exame->getAmostra()->getIdAmostra() : ''; ?></td>
                <td><?php echo $exame->getAnalista() !== NULL ? $exame->getAnalista()->getNome() : ''; ?></td>
                <td><?php echo $exame->getSupervisor() !== NULL ? $exame->getSupervisor()->getNome() : ''; ?></td>
            </tr>
            <?php endforeach; ?>
          </table>
        </main>
      </div>
    </div>
  </body>
</html>