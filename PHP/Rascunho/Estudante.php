<?php
    //Classe Aluno
    class Aluno{
        private $nomeAluno;
        private $idAluno;
        private $Caracteristicas;

        //Métodos

        //Método __construct()
        public function __construct($nomeAluno) {
            //$this->setIdAluno($id);
            $this->setNomeAluno($nomeAluno);
        }//Fim do método __construct()

        
        //Método setIdAluno()
        public function setIdAluno($id) {
            $this->idAluno = $id;
        }//Fim do método setIdAluno()

        //Método getIdAluno()
        public function getIdAluno() {
            return $this->idAluno;
        }//Fim do método getIdAluno()
        

        //Método setNomeAluno()
        public function setNomeAluno($nome) {
            $this->nomeAluno = $nome;
        }//Fim do método setNomeAluno()

        //Método getNomeAluno()
        public function getNomeAluno() {
            return $this->nomeAluno;
        }//Fim do método getNomeAluno()
    
        //Caracteristicas()

    }
 


    
?>