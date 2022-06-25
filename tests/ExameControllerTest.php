<?php
include_once(__DIR__.'/../src/server/controllers/ExameController.class.php');
include_once(__DIR__.'/../src/server/database/DBHelper.class.php');
include_once(__DIR__.'/../src/server/Utils.php');
use PHPUnit\Framework\TestCase;

class ExameControllerTest extends TestCase {

    //TC05 - Cadastrar resultado da análise
    public function testCadastroResultadoBemSucedido(){
        prepareTest('resultado');
        $controller = new ExameController();
        $this->assertSame(1, $controller->listaExames()[0]->getNumeroExame());
        $this->assertSame("EM ANALISE", $controller->listaExames()[0]->getStatus());
        $controller->cadastraResultado(1, '...', '12345678901');
        $this->assertSame(1, $controller->listaExames()[0]->getNumeroExame());
        $this->assertSame("AGUARDANDO LAUDO", $controller->listaExames()[0]->getStatus());
    }

    //TC06 - Cadastrar resultado da análise sem amostra atrelada
    public function testCadastroResultadoSemAmostra(){
        prepareTest('resultado');
        $controller = new ExameController();
        $this->assertSame(1, $controller->listaExames()[0]->getNumeroExame());
        $this->assertSame("EM ANALISE", $controller->listaExames()[0]->getStatus());
        $controller->cadastraResultado(null, '...', '12345678901');
        $this->assertSame(1, $controller->listaExames()[0]->getNumeroExame());
        $this->assertSame("EM ANALISE", $controller->listaExames()[0]->getStatus());
    }

    //TC07 - Cadastrar resultado da análise de exames com status diferente de "EM ANALISE CLINICA"
    public function testCadastroResultadoComStatusInvalido(){
        prepareTest('amostra');
        $controller = new ExameController();
        $this->assertSame(1, $controller->listaExames()[0]->getNumeroExame());
        $this->assertSame("AGUARDANDO COLETA", $controller->listaExames()[0]->getStatus());
        $controller->cadastraResultado(1, '...', '12345678901');
        $this->assertSame(1, $controller->listaExames()[0]->getNumeroExame());
        $this->assertSame("AGUARDANDO COLETA", $controller->listaExames()[0]->getStatus());
    }

    //TC08 - Validar resultado de exame
    public function testValidarResultadoBemSucedido(){
        prepareTest('validar');
        $controller = new ExameController();
        $this->assertSame(1, $controller->listaExames()[0]->getNumeroExame());
        $this->assertSame("AGUARDANDO LAUDO", $controller->listaExames()[0]->getStatus());
        $controller->validaResultado(1, '12345678900');
        $this->assertSame(1, $controller->listaExames()[0]->getNumeroExame());
        $this->assertSame("LIBERADO", $controller->listaExames()[0]->getStatus());
    }

    //TC09 - Validar resultado de exame com status diferente de  “Aguardando liberação do laudo"
    public function testValidarResultadoComStatusInvalido(){
        prepareTest('resultado');
        $controller = new ExameController();
        $this->assertSame(1, $controller->listaExames()[0]->getNumeroExame());
        $this->assertSame("EM ANALISE", $controller->listaExames()[0]->getStatus());
        $controller->validaResultado(1, '12345678900');
        $this->assertSame(1, $controller->listaExames()[0]->getNumeroExame());
        $this->assertSame("EM ANALISE", $controller->listaExames()[0]->getStatus());
    }

    //TC10 - Solicitar nova coleta de amostra
    public function testSolicitarNovaColetaBemSucedido(){
        prepareTest('validar');
        $controller = new ExameController();
        $this->assertSame(1, $controller->listaExames()[0]->getNumeroExame());
        $this->assertSame("AGUARDANDO LAUDO", $controller->listaExames()[0]->getStatus());
        $controller->solicitaNovaColeta(1, "Amostra danificada.", "12345678900");
        $this->assertSame(1, $controller->listaExames()[0]->getNumeroExame());
        $this->assertSame("NOVA COLETA SOLICITADA", $controller->listaExames()[0]->getStatus());
    }

    //TC11 - Solicitar nova coleta de amostra de exame com status diferente de “Aguardando liberação do laudo”
    public function testSolicitarNovaColetaComStatusInvalido(){
        prepareTest('resultado');
        $controller = new ExameController();
        $this->assertSame(1, $controller->listaExames()[0]->getNumeroExame());
        $this->assertSame("EM ANALISE", $controller->listaExames()[0]->getStatus());
        $controller->solicitaNovaColeta(1, "Amostra danificada.", "12345678900");
        $this->assertSame(1, $controller->listaExames()[0]->getNumeroExame());
        $this->assertSame("EM ANALISE", $controller->listaExames()[0]->getStatus());
    }

    //TC12 - Solicitar nova coleta de amostra sem justificativa
    public function testSolicitarNovaColetaSemJustificativa(){
        prepareTest('validar');
        $controller = new ExameController();
        $this->assertSame(1, $controller->listaExames()[0]->getNumeroExame());
        $this->assertSame("AGUARDANDO LAUDO", $controller->listaExames()[0]->getStatus());
        $controller->solicitaNovaColeta(1, null, "12345678900");
        $this->assertSame(1, $controller->listaExames()[0]->getNumeroExame());
        $this->assertSame("AGUARDANDO LAUDO", $controller->listaExames()[0]->getStatus());
    }
}
?>