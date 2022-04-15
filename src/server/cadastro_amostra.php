<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $idExame = $_POST['id_exame'];
  $tipo = $_POST['tipo_amostra'];
  $dataDeColeta = new DateTime('now');
  // $dataDeColeta = new DateTime($_POST['data_coleta']);
  $cpfResponsavel = $_POST['cpf_responsavel'];

  if(empty($idExame) || empty($tipo) || empty($dataDeColeta) || empty($cpfResponsavel)) return;

  include_once(__DIR__.'/controllers/AmostraController.class.php');

  $controller = new AmostraController();
  $controller->cadastraAmostra($idExame,$tipo,$dataDeColeta->format('Y-m-d h:i:s'),$cpfResponsavel);

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <title>Cadastrar Amostra</title>
  </head>
  <body>
    <div class="wrapper">
      <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <h3>Cadastrar Amostra</h3>
        <input placeholder="Id Exame" name='id_exame'/>
        <input placeholder="Tipo de amostra" name='tipo_amostra'/>
        <input placeholder="Data da coleta" name='data_coleta' />
        <input placeholder="Cpf responsável" name='cpf_responsavel'/>
        <button>Cadastrar</button>
      </form>
    </div>
  </body>
</html>