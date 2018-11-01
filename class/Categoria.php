<?php
//Criar as categorias antes dos produtos
class Categoria{
    private $nome;
    private $descricao;

    function setNome($nome){
        $this->nome = $nome;
    }

    function getNome(){
        return $this->nome;
    }

    function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    function getDescricao(){
        return $this->descricao;
    }

}