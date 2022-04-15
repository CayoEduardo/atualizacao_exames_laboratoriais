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
      $this->status = $novoStatus;
    }

    private function atualizarAnalista($analista) {
      $this->analistaResponsavel = $analista;
    }

    private function atualizarSupervisor($supervisor) {
      $this->supervisorResponsavel = $supervisor;
    }

    private function adicionarJustificativa($justificativa) {
      $this->justificativaNovaSolicitacao = $justificativa;
    }

    public function adicionarAmostra($amostraColetada) {
      if($this->status === 'AGUARDANDO COLETA') {
        $this->amostra = $amostraColetada;
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