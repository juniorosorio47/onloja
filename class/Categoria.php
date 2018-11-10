<?php
 $mysqli = new mysqli('localhost','root','','onloja');
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
        global $mysqli;
        $insertBanco = "INSERT INTO tbcat (namecat, desccat) VALUES('$nome', '$descricao');";
        
        $mysqli->query($insertBanco);

    }

    public function getCategorias(){
        global $mysqli;
        $busca = "SELECT * FROM tbcat;";
        $resultado = $mysqli->query($busca);
        return $resultado;
    }

    public function getCategoriasById($id){
        global $mysqli;
        $busca = "SELECT * FROM tbcat WHERE idcat = '$id';";
        $resultado = $mysqli->query($busca);
        return $resultado;
    }

    public function deleteCategorias($id){
        global $mysqli;
        $delete = "DELETE FROM tbcat WHERE idcat = '$id';";
        $mysqli->query($delete);
    }

    public function editCategorias($id, $nome, $descricao){
        global $mysqli;
        $update = "UPDATE tbcat SET namecat = '$nome', desccat = '$descricao' WHERE idcat = '$id';";
        $mysqli->query($update);
    }

}






