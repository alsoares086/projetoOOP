<?php

class Administrador {
   private $id;
   private $nome;
   private $matricula;
   private $senha;

   public function getId() {
       return $this->id;
   }

   public function setId($id) {
       $this->id = $id;
   }

   public function getNome() {
       return $this->nome;
   }

   public function setNome($nome) {
       $this->nome = $nome;
   }

   public function getMatricula() {
       return $this->matricula;
   }

   public function setMatricula($matricula) {
       $this->matricula = $matricula;
   }

    public function getSenha() {
       return $this->senha;
   }

   public function setSenha($senha) {
       $this->senha = $senha;
   }
}
?>