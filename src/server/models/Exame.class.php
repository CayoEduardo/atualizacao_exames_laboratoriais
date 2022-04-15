<?php
  class Exame {
    private $numeroExame;
    private $status;
    private $resultado;
    private $amostra;
    private $cpfAnalista;
    private $cpfSupervisor;
    private $justificativaNovaColeta;

    function __construct($numeroExame = null,$status = null , $resultado = null, $amostra = null, $analistaResponsavel = null, $supervisorResponsavel = null,  $justificativaNovaColeta = null) {
      $this->numeroExame = $numeroExame;
      $this->status = $status;
      $this->resultado = $resultado;
      $this->amostra = $amostra;
      $this->cpfAnalista = $analistaResponsavel;
      $this->cpfSupervisor = $supervisorResponsavel;
      $this-> justificativaNovaColeta =  $justificativaNovaColeta;
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
      return $this->cpfAnalista;
    }
    public function getSupervisor(){
      return $this->cpfSupervisor;
    }
    public function getJustificativa(){
      return $this->justificativaNovaColeta;
    }

    public function setAmostra($amostra) {
      $this->amostra = $amostra;
    }

    private function atualizarStatus($novoStatus) {
      $this->status = $novoStatus;
    }

    public function atualizarAnalista($analista) {
      $this->cpfAnalista = $analista;
    }

    public function atualizarSupervisor($supervisor) {
      $this->cpfSupervisor = $supervisor;
    }

    public function adicionarJustificativa($justificativa) {
      $this->justificativaNovaColeta = $justificativa;
    }

    public function adicionarAmostra($amostraColetada) {
      if($this->status === 'AGUARDANDO COLETA') {
        $this->setAmostra($amostraColetada);
        $this->atualizarStatus('EM ANALISE');
      }
      else return new Error("Amostra não pode ser adicionada");      
    }

    public function inserirResultado($resultado, $analista) {
      if($this->status === 'EM ANALISE') {
        $this->resultado = $resultado;
        $this->atualizarAnalista($analista);
        $this->atualizarStatus('AGUARDANDO LAUDO');
      }  
      else return new Error("Exame não pode ser adicionado");
    }  

    public function validarExame($supervisor) {
      if($this->status === 'AGUARDANDO LAUDO') {
        $this->atualizarSupervisor($supervisor);
        $this->atualizarStatus('LIBERADO');
      }
      else return new Error("Exame não pode ser liberado");
    }

    public function solicitarNovaColeta($justificativa, $supervisor) {
      if($this->status === 'AGUARDANDO LAUDO') {
        $this->adicionarJustificativa($justificativa);
        $this->atualizarSupervisor($supervisor);
        $this->atualizarStatus('NOVA COLETA SOLICITADA');       
      }
      else return new Error("Exame não pode ser liberado");
    }
  }
?>