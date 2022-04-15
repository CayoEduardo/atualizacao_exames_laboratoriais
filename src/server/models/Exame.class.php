<?php
  class Exame {
    private $numeroExame;
    private $status;
    private $resultado;
    private $amostra;
    private $analistaResponsavel;
    private $supervisorResponsavel;
    private $justificativaNovaSolicitacao;

    function __construct($numeroExame = null,$status = null , $resultado = null, $amostra = null, $analistaResponsavel = null, $supervisorResponsavel = null,  $justificativaNovaSolicitacao = null) {
      $this->numeroExame = $numeroExame;
      $this->status = $status;
      $this->resultado = $resultado;
      $this->amostra = $amostra;
      $this->analistaResponsavel = $analistaResponsavel;
      $this->supervisorResponsavel = $supervisorResponsavel;
      $this-> justificativaNovaSolicitacao =  $justificativaNovaSolicitacao;
  }

    public function getNumeroExame(){
      return $this->numeroExame;
    }
    public function getStatus(){
      return $this->status;
    }
    public function getResultado(){
      return $this->resultado;
    }
    public function getAmostra(){
      return $this->amostra;
    }
    public function getAnalista(){
      return $this->analistaResponsavel;
    }
    public function getSupervisor(){
      return $this->supervisorResponsavel;
    }
    public function getJustificativa(){
      return $this->justificativaNovaSolicitacao;
    }

    private function atualizarStatus($novoStatus) {

    }

    private function atualizarAnalista($analista) {

    }

    private function atualizarSupervisor($supervisor) {

    }

    private function adicionarJustificativa($justificativa) {

    }

    public function inserirResultado($resultado) {

    }

    public function adicionarAmostra($amostraColetada) {
      $this->amostra = $amostraColetada;
    }

    public function validarExame() {

    }

    public function solicitarNovaColeta($justificativa) {
       
    }
  }
?>