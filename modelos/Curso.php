<?php

    class Curso{
        private $nomeCurso;
        private $turno;
        private $tipoCurso;
        private $cargaHoraria;
        private $id;

        public function getNomeCurso() {
            return $this->nomeCurso;
        }
    
        public function setNomeCurso($nomeCurso) {
            $this->nomeCurso = $nomeCurso;
        }
    
        public function getTurno() {
            return $this->turno;
        }
    
        public function setTurno($turnoCurso) {
            $this->turno = $turnoCurso;
        }
    
        public function getTipoCurso() {
            return $this->tipoCurso;
        }
    
        public function setTipoCurso($tipoCurso) {
            $this->tipoCurso = $tipoCurso;
        }
    
        public function getCargaHoraria() {
            return $this->cargaHoraria;
        }
    
        public function setCargaHoraria($cargaHoraria) {
            $this->cargaHoraria = $cargaHoraria;
        }
    
        public function getId() {
            return $this->id;
        }
    
        public function setId($id) {
            $this->id = $id;
        }
    }

?>