  <?php
  class Funcionario {
      private $cpf;
      private $token;
      private $tipoFuncionario;

      function __construct($cpf, $token, $tipoFuncionario) {
        $this->cpf = $cpf;
        $this->nome =  $token;
        $this->tipoFuncionario = $tipoFuncionario;
    }

      public function getCpf() {
          return $this->cpf;
      }     

      public function getToken() {
          return $this->token;
      }
      public function getTipoFuncionario() {
          return $this->tipoFuncionario;
      }

      public function setCpf($cpf){
          $this->cpf = $cpf;
      }      
      
      public function setToken($token){
          $this->token = $token;
      }      
      
      public function setTipoFuncionario($tipoFuncionario){
          $this->tipoFuncionario = $tipoFuncionario;
      }
  }
  
  ?>