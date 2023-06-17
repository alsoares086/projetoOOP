<?php

    class Disciplina{
        private $idDisciplina;
        private $nomeDisciplina;
        private $cargaHoraria;
        private $curso;

        public function getIdDisciplina() {
            return $this->idDisciplina;
        }
    
        public function setIdDisciplina($idDisciplina) {
            $this->idDisciplina = $idDisciplina;
        }
    
        public function getNomeDisciplina() {
            return $this->nomeDisciplina;
        }
    
        public function setNomeDisciplina($nomeDisciplina) {
            $this->nomeDisciplina = $nomeDisciplina;
        }
    
        public function getCargaHoraria() {
            return $this->cargaHoraria;
        }
    
        public function setCargaHoraria($cargaHoraria) {
            $this->cargaHoraria = $cargaHoraria;
        }

        //Coma uma disciplina pode estar em um ou mais cursos, faz mais sentido inserir esses campos abaixos nessas classes
        public function setCurso(array $curso)
        {
            $this->curso = $curso;
        }
        
        public function getCurso()
        {
            return $this->curso;
        }
    }

?>