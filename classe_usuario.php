<?php
class Usuario {

	public $nome;
	public $nome_usuario;
	public $email;
  private $senha;

	function __construct ($nome, $nome_usuario, $email, $senha) {
       $this->nome = $nome;
       $this->nome_usuario = $nome_usuario;
       $this->email = $email;
       $this->senha = $senha; 
    }

       
    public function setNome ($nome) {
       $this->nome = $nome;
}

    public function getNome () {
     return $this->nome;
}

    public function getNome_usuario () {
     return $this->nome_usuario;
}

    public function setNome_usuario ($nome_usuario) {
       $this->nome_usuario = $nome;
}
    public function getEmail () {
     return $this->email; 
}

     public function setEmail ($email) {
       $this->email = $email;
}
    public function getSenha () {
     return $this->senha; 
}
    public function setSenha ($senha) {
      $this->senha = $senha;
    } 


}
?>