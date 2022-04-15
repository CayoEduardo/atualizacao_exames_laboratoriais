<?php 
class Amostra {
    private $idAmostra;
    private $tipoAmostra;
    private $dataColeta;
    private $cpfResponsavel;

    function __construct($tipo=null, $dataDeColeta=null,$responsavel=null) {
        $this->tipoAmostra = $tipo;
        $this->dataColeta = $dataDeColeta;
        $this->cpfResponsavel = $responsavel;
    }
    
    public function getIdAmostra(){
        return $this->idAmostra;
    }
    public function getTipo(){
        return $this->tipoAmostra;
    }
    public function getDataColeta(){
        return $this->dataColeta;
    }
    public function getResponsavel(){
        return $this->cpfResponsavel;
    }

    public function setIdAmostra($idAmostra) {
        $this->idAmostra = $idAmostra;
    }
    public function setTipo($tipo) {
        $this->tipoAmostra = $tipo;
    }
    public function setDataColeta($dataDeColeta) {
        $this->dataColeta = $dataDeColeta;
    }

    public function setResponsavel($responsavel) {
        $this->cpfResponsavel = $responsavel;
    }

}
?>