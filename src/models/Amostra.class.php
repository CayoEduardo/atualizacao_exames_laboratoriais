<?php 
class Amostra {
    private $idAmostra;
    private $tipo;
    private $dataDeColeta;
    private $responsavel;
    
    public function getIdAmostra(){
        return $this->idAmostra;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getDataDeColeta(){
        return $this->dataDeColeta;
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
    public function setDataDeColeta($dataDeColeta) {
        $this->dataDeColeta = $dataDeColeta;
    }

    public function setResponsavel($responsavel) {
        $this->responsavel = $responsavel;
    }

}
?>