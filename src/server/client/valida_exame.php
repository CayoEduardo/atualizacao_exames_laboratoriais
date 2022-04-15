<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $idExame = $_POST['id_exame'];
  $cpfResponsavel = $_POST['cpf_responsavel'];

  if(empty($idExame) || empty($cpfResponsavel)) return;

  include_once(dirname(__DIR__, 1).'/controllers/ExameController.class.php');

  $controller = new ExameController();
  $controller->validaResultado($idExame,$cpfResponsavel);

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="valida_exame.css" />
    <title>Validar exame</title>
  </head>
  <body>
    <div class="wrapper">
      <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <h3>Validar exame</h3>
        <input placeholder="Id Exame" name='id_exame'/>
        <input placeholder="Cpf responsável" name='cpf_responsavel'/>
        <button>Validar</button>
      </form>
    </div>
  </body>
</html>