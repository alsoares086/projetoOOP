<?php
    //Classe Curso
    class Curso{
        private $idCurso;
        private $nomeCurso;
        private $cargaHorariaCurso;
        //private $Professores;
        //private $Aluno;
        //private $Disciplinas;
        
        //private $Endereco;
        //private $Data;

        //Métodos

        //Método __construct()
        public function __construct($id, $nome, $cargaHoraria) {
            $this->setIdCurso($id);
            $this->setNomeCurso($nome);
            $this->setCargaHorariaCurso($cargaHoraria);
        }//Fim do método __construct()


        //Método setIdCurso()
        public function setIdCurso($id) {
            $this->idCurso = $id;
        }//Fim do método setIdCurso()

        //Método getIdCurso()
        public function getIdCurso() {
            return $this->idCurso;
        }//Fim do método getIdCurso()

        //Método setNomeCurso()
        public function setNomeCurso($nome) {
            $this->nomeCurso = $nome;
        }//Fim do método setNomeCurso()

        //Método getNomeCurso()
        public function getNomeCurso() {
            return $this->nomeCurso;
        }//Fim do método getNomeCurso()

        //Método setCargaHorariaCurso()
        public function setCargaHorariaCurso($cargaHoraria) {
            $this->cargaHorariaCurso = $cargaHoraria;
        }//Fim do método setCargaHorariaCurso()

        //Método getCargaHorariaCurso()
        public function getCargaHorariaCurso() {
            return $this->cargaHorariaCurso;
        }//Fim do método getCargaHorariaCurso()






        
    }

?>