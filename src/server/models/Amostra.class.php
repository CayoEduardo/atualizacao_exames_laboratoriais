<?php 
class Amostra {
    private $idAmostra;
    private $tipo;
    private $dataColeta;
    private $responsavel;

    function __construct($tipo, $dataDeColeta,$responsavel) {
        $this->tipo = $tipo;
        $this->dataColeta = $dataDeColeta;
        $this->responsavel = $responsavel;
    }
    
    public function getIdAmostra(){
        return $this->idAmostra;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getDataColeta(){
        return $this->dataColeta;
    }
    public function getResponsavel(){
        return $this->responsavel;
    }

    public function setIdAmostra($idAmostra) {
        $this->idAmostra = $idAmostra;
    }
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    public function setDataColeta($dataDeColeta) {
        $this->dataColeta = $dataDeColeta;
    }

    public function setResponsavel($responsavel) {
        $this->responsavel = $responsavel;
    }

}
?>