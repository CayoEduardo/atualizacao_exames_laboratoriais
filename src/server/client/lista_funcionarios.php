<?php
    include_once(dirname(__DIR__, 1).'\controllers\FuncionarioController.class.php');

    $controller = new FuncionarioController();
    $funcionarios = $controller->listaFuncionarios();

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="lista_funcionarios.css" />
    <title>Lista de Funcionários</title>
  </head>
  <body>
    <div class="wrapper">
      <div class="page">
        <main>
          <div class="table_header">
            <h3>Lista de Funcionarios</h3>
          </div>
          <table>
            <tr>
              <th>Cpf</th>
              <th>Nome</th>
              <th>Cargo</th>
            </tr>
            <?php foreach($funcionarios as $index=>$funcionario): ?>
            <tr>
              <td><?=  $funcionario->getCpf()?></td>
              <td><?= $funcionario->getNome()?></td>
              <td><?= $funcionario->getTipoFuncionario()?></td>
            </tr>
            <?php endforeach; ?>
            </tr>
          </table>
        </main>
      </div>
    </div>
  </body>
</html>
