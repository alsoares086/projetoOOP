<?php
    //Classe Disciplina
    class Disciplina{
        private $idDisciplina;
        private $nomeDisciplina;
        private $cargaHorariaDisciplina;
        //private $Professor;
        //private $Alunos;

        //Métodos

        //Método __construct()
        public function __construct($id, $nome, $cargaHoraria) {
            $this->setIdDisciplina($id);
            $this->setNomeDisciplina($nome);
            $this->setCargaHorariaDisciplina($cargaHoraria);
        }//Fim do método __construct()


        //Método setIdDisciplina()
        public function setIdDisciplina($id) {
            $this->idDisciplina = $id;
        }//Fim do método setIdDisciplina()

        //Método getIdDisciplina()
        public function getIdDisciplina() {
            return $this->idDisciplina;
        }//Fim do método getIdDisciplina()

        //Método setNomeDisciplina()
        public function setNomeDisciplina($nome) {
            $this->nomeDisciplina = $nome;
        }//Fim do método setNomeDisciplina()

        //Método getNomeDisciplina()
        public function getNomeDisciplina() {
            return $this->nomeDisciplina;
        }//Fim do método getNomeDisciplina()

        //Método setCargaHorariaDisciplina()
        public function setCargaHorariaDisciplina($cargaHoraria) {
            $this->cargaHorariaDisciplina = $cargaHoraria;
        }//Fim do método setCargaHorariaDisciplina()

        //Método getCargaHorariaDisciplina()
        public function getCargaHorariaDisciplina() {
            return $this->cargaHorariaDisciplina;
        }//Fim do método getCargaHorariaDisciplina()

    }

?>