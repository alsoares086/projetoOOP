<?php

   class Professor {
      private $idProfessor;
      private $nomeProfessor;
      private $especializacao;
      private $escolaridade;
      private $matriculaProfessor;
      private $senhaProfessor;
      public function getIdProfessor() {
         return $this->idProfessor;
      }

      public function setIdProfessor($id) {
         $this->idProfessor = $id;
      }

      public function getNomeProfessor() {
         return $this->nomeProfessor;
      }

      public function setNomeProfessor($nome) {
         $this->nomeProfessor = $nome;
      }

      public function getEspecializacao() {
         return $this->especializacao;
      }

      public function setEspecializacao($especializacao) {
         $this->especializacao = $especializacao;
      }

      public function getEscolaridade() {
         return $this->escolaridade;
      }

      public function setEscolaridade($escolaridade) {
         $this->escolaridade = $escolaridade;
      }

         public function getMatriculaProfessor() {
         return $this->matriculaProfessor;
      }

      public function setMatriculaProfessor($matricula) {
         $this->matriculaProfessor = $matricula;
      }

      public function getSenhaProfessor() {
         return $this->senhaProfessor;
      }

      public function setSenhaProfessor($senha) {
         $this->senhaProfessor = $senha;
      }
   }

?>