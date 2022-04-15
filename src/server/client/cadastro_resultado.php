<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $idExame = $_POST['id_exame'];
  $resultado = $_POST['resultado'];
  $cpfResponsavel = $_POST['cpf_responsavel'];

  if(empty($idExame) || empty($resultado) || empty($cpfResponsavel) ) return;

  include_once(dirname(__DIR__, 1).'/controllers/ExameController.class.php');

  $controller = new ExameController();
  $controller->cadastraResultado($idExame,$resultado,$cpfResponsavel);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="cadastro_resultado.css" />
    <title>Cadastrar Amostra</title>
  </head>
  <body>
    <div class="wrapper">
      <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <h3>Cadastrar Resultado</h3>
        <input placeholder="Id Exame" name='id_exame'/>
        <textarea placeholder="Resultado" name='resultado' rows="4" ></textarea>
        <input placeholder="Cpf responsável" name='cpf_responsavel'/>
        <button>Cadastrar</button>
      </form>
    </div>
  </body>
</html>