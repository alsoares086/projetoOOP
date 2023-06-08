<?php
    class Aluno{
        private $idAluno;
        private $nomeAluno;
        private $matriculaAluno;
        private $senhaAluno;

        public function getIdAluno() {
            return $this->idAluno;
        }

        public function setIdAluno($id) {
            $this->idAluno = $id;
        }

        public function getNomeAluno() {
            return $this->nomeAluno;
        }

        public function setNomeAluno($nome) {
            $this->nomeAluno = $nome;
        }

        public function getMatriculaAluno() {
            return $this->matriculaAluno;
        }

        public function setMatriculaAluno($matricula) {
            $this->matriculaAluno = $matricula;
        }

        public function getSenhaAluno() {
            return $this->senhaAluno;
        }

        public function setSenhaAluno($senha) {
            $this->senhaAluno = $senha;
        }
    }
?>