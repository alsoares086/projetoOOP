<?php
    //Classe Professor
    class Professor{
        private $idProfessor;
        private $nomeProfessor;
        private $escolaridadeProfessor;
        private $especialidadeProfessor;
        private $Caracteristicas;

        //Métodos

        //Método __construct()
         public function __construct ($nome, $escolaridade, $especialidade) {
            $this->setNomeProfessor($nome);
            $this->setEscolaridadeProfessor($escolaridade);
            $this->setEspecialidadeProfessor($especialidade);
        }//Fim do método __construct()


        //Método setIdProfessor()
        public function setIdProfessor($id) {
            $this->idProfessor = $id;
        }//Fim do método setIdProfessor()

        //Método getIdProfessor()
        public function getIdProfessor() {
            return $this->idProfessor;
        }//Fim do método getIdProfessor()

        //Método setNomeProfessor()
        public function setNomeProfessor($nome) {
            $this->nomeProfessor = $nome;
        }//Fim do método setNomeProfessor()

        //Método getNomeProfessor()
        public function getNomeProfessor() {
            return $this->nomeProfessor;
        }//Fim do método getNomeProfessor()

        //Método setEscolaridadeProfessor()
        public function setEscolaridadeProfessor($escolaridade) {
            $this->escolaridadeProfessor = $escolaridade;
        }//Fim do método setEscolaridadeProfessor()

        //Método getEscolaridadeProfessor()
        public function getEscolaridadeProfessor() {
            return $this->escolaridadeProfessor;
        }//Fim do método getEscolaridadeProfessor()

        //Método setEspecialidadeProfessor()
        public function setEspecialidadeProfessor($especialidade) {
            $this->especialidadeProfessor = $especialidade;
        }//Fim do método setEspecialidadeProfessor()

        //Método getEspecialidadeProfessor()
        public function getEspecialidadeProfessor() {
            return $this->especialidadeProfessor;
        }//Fim do método getEspecialidadeProfessor()

        //Caracteristicas()
    }

?>