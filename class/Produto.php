<?php
include_once('Sql.php');
class Produto{

    private $id; //Gerado no banco de dados
    private $ativo;//Verifica de o produto esta para venda
    private $nome;
    private $marca;
    private $descricao;
    private $preco;
    private $foto;//Link para a foto na pasta imagens
    //Chaves estrangeiras
    private $carrinho;
    private $categoria;//Classe categoria

    public function setProduto($ativo, $nome, $marca, $descricao, $categoria, $preco, $nomeFoto){
        $mysqli = new mysqli("localhost", "root", "", "onloja");
        $insert = "INSERT INTO tbproducts (activeproduct, nameproduct, brandproduct, descproduct, catproduct, priceproduct, photoproduct) VALUES('$ativo', '$nome', '$marca', '$descricao', '$categoria', '$preco', '$nomeFoto');";
        
        $mysqli->query($insert);
        
    }

    public function getProdutos(){
        $mysqli = new mysqli("localhost", "root", "", "onloja");
        $busca = "SELECT * FROM tbproducts JOIN tbcat ON tbproducts.catproduct = tbcat.idcat";

        return $results = $mysqli->query($busca);
    }

    public function getProdutosCategoria($filtro){
        $mysqli = new mysqli("localhost", "root", "", "onloja");
        $busca = "SELECT * FROM tbproducts JOIN tbcat ON tbproducts.catproduct = tbcat.idcat WHERE idcat LIKE '$filtro'";

        return $results = $mysqli->query($busca);
    }

    public function deleteProdutos($idProduto){
        $mysqli = new mysqli("localhost", "root", "", "onloja");
        $delete = "DELETE FROM tbproducts WHERE idproduct ='$idProduto'";
        $mysqli->query($delete);
    }

    public function editProdutos($idProduto){
        $mysqli = new mysqli("localhost", "root", "", "onloja");
        $edit = "SELECT * FROM tbproducts WHERE idproduct ='$idProduto'";
        $resultado = $mysqli->query($edit);
      

        return $resultado->fetch_array();
    }

}