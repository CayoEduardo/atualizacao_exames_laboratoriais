  <?php
  class Funcionario {
      private $cpf;
      private $nome;
      private $passwordHash;
      private $token;
      private $tipoFuncionario;

      function __construct($cpf=null, $nome=null, $tipoFuncionario=null) {
        $this->cpf = $cpf;
        $this->nome =  $nome;
        $this->tipoFuncionario = $tipoFuncionario;
    }

      public function getCpf() {
          return $this->cpf;
      }     

      public function getNome() {
          return $this->nome;
      }
      public function getTipoFuncionario() {
          return $this->tipoFuncionario;
      }

      public function setCpf($cpf){
          $this->cpf = $cpf;
      }      
      
      public function setNome($nome){
          $this->nome = $nome;
      }      
      
      public function setTipoFuncionario($tipoFuncionario){
          $this->tipoFuncionario = $tipoFuncionario;
      }
  }
  
  ?>