<?php
include_once(__DIR__.'/../src/server/controllers/AmostraController.class.php');
include_once(__DIR__.'/../src/server/database/DBHelper.class.php');
include_once(__DIR__.'/../src/server/Utils.php');
use PHPUnit\Framework\TestCase;

class AmostraControllerTest extends TestCase {

    //TC01 - Cadastrar amostra de exame
    public function testCadastroBemSucedido(){
        prepareTest('amostra');
        $controller = new AmostraController();
        $dataColeta = new DateTime('2022-06-20');
        $this->assertSame(false, $controller->listarAmostras());
        $controller->cadastraAmostra(1, 'SANGUE', $dataColeta->format('Y-m-d h:i:s'), '12345678900');
        $this->assertSame(1, count($controller->listarAmostras()));
        $this->assertSame(1, $controller->listarAmostras()[0]->getIdAmostra());
    }

    //TC02 - Cadastrar uma amostra de exame duas vezes
    public function testCadastroDuplicado(){
        prepareTest('amostra');
        $controller = new AmostraController();
        $dataColeta = new DateTime('2022-06-21');
        $this->assertSame(false, $controller->listarAmostras());
        $controller->cadastraAmostra(1, 'SALIVA', $dataColeta->format('Y-m-d h:i:s'), '12345678900');
        $this->assertSame(1, count($controller->listarAmostras()));
        $amostraInserida = $controller->listarAmostras()[0];
        $this->assertSame(1, $amostraInserida->getIdAmostra());
        $this->assertSame("SALIVA", $amostraInserida->getTipo());
        $this->assertSame("2022-06-21 12:00:00", $amostraInserida->getDataColeta());
    }

    //TC03 - Cadastrar amostra de emxae sem pedido de exame atrelado
    public function testCadastroSemExame(){
        prepareTest('amostra');
        $controller = new AmostraController();
        $dataColeta = new DateTime('2022-06-21');
        $this->assertSame(false, $controller->listarAmostras());
        $controller->cadastraAmostra(null, 'SANGUE', $dataColeta->format('Y-m-d h:i:s'), '12345678900');
        $this->assertSame(false, $controller->listarAmostras());
    }

    //TC04 - Cadastrar amostra de exame com data de coleta posterior a data atual
    public function testCadastroComColetaFutura(){
        prepareTest('amostra');
        $controller = new AmostraController();
        $dataColeta = new DateTime('2022-06-30');
        $this->assertSame(false, $controller->listarAmostras());
        $controller->cadastraAmostra(1, 'SANGUE', $dataColeta->format('Y-m-d h:i:s'), '12345678900');
        $this->assertSame(false, $controller->listarAmostras());
    }
}
?>