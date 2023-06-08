<?php

    class Disciplina{
        private $idDisciplina;
        private $nomeDisciplina;
        private $cargaHoraria;

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
    }

?>