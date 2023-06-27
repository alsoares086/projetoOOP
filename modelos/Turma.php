<?php

    class Turma{
        private $id;
        private $codigo;
        private $periodo;
        private $curso;
        private $alunos;

        //Método setId()
        public function setId ($id)
        {
            $this->id = $id;
        }   //Fim do método setId()

        //Método getId()
        public function getId()
        {
            return $this->id;
        }   //Fim do método getId()


        //Método setCodigo()
        public function setCodigo($codigo)
        {
            $this->codigo = $codigo;
        }   //Fim do método setCodigo()

        //Método getCodigo()
        public function getCodigo()
        {
            return $this->codigo;
        }   //Fim do método getCodigo()

       
        //Método setPeriodo()
        public function setPeriodo ($periodo)
        {
            $this->periodo = $periodo;
        }   //Fim do método setPeriodo()

        //Método getPeriodo()
        public function getPeriodo()
        {
            return $this->periodo;
        }   //Fim do método getPeriodo()

        public function setCurso(Curso $curso)
        {
            $this->curso = $curso;
        }
        
        public function getCurso()
        {
            return $this->curso;
        }

        public function setAluno(array $alunos){
            $this->alunos = $alunos;
        }      
        
        /*
        public function setAluno(Aluno $aluno){
            $this->alunos[] = array($aluno);
        }*/
        
        public function getAluno()
        {
            return $this->alunos;
        }        
         
    }

?>