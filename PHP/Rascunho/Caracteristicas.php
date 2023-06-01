<?php

    //Classe Caracteristicas
    class Caracteristicas {
        public function __construct($nome, $valor){
            $this->setNomeCaracteristica($nome);
            $this->setValorCustoProduto($custo);
        }

        public function setNomeCaracteristica($nome){
            $this->nomeCaracteristica = $nome;
        }

        public function getNomeCaracteristica(){
            return $this->nomeCaracteristica;
        }

        public function setValorCaracteristica($valor){
            $this->valorCaracteristica = $valor;
        }

        public function getValorCaracteristica(){
            return $this->valorCaracteristica;
        }

    }//Fim da Classe
?>