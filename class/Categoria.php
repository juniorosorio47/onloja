<?php

//Criar as categorias antes dos produtos
class Categoria{
    private $nome;
    private $descricao;

    public function setNome($nome){

        $this->nome = $nome;

    }

    public function getNome(){

        return $this->nome;

    }

    public function setDescricao($descricao){

        $this->descricao = $descricao;

    }

    public function getDescricao(){

        return $this->descricao;

    }

    public function setCategoria($nome, $descricao){
        $mysqli = new mysqli('localhost','root','','onloja');
        $insertBanco = "INSERT INTO tbcat (namecat, desccat) VALUES('$nome', '$descricao');";
        
        $mysqli->query($insertBanco);

    }

    public function getCategorias(){
        $mysqli = new mysqli('localhost','root','','onloja');
        $busca = "SELECT * FROM tbcat;";
        $resultado = $mysqli->query($busca);
        return $resultado;
    }

}






