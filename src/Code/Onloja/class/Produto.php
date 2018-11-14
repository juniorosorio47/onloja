<?php
$mysqli = new mysqli("localhost", "root", "", "onloja");
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

    public function setProduto($ativo, $nome, $marca, $descricao, $categoria, $preco, $nomeFoto, $quantidade){
        global $mysqli;
        $insert = "INSERT INTO tbproducts (activeproduct, nameproduct, brandproduct, descproduct, catproduct, priceproduct, photoproduct, qtdproduct) VALUES('$ativo', '$nome', '$marca', '$descricao', '$categoria', '$preco', '$nomeFoto', '$quantidade');";
        
        $mysqli->query($insert);
        
    }

    public function getProdutos(){
        global $mysqli;
        $busca = "SELECT * FROM tbproducts JOIN tbcat ON tbproducts.catproduct = tbcat.idcat";

        return $results = $mysqli->query($busca);
    }

    public function getProdutosById($id){
        global $mysqli;
        $busca = "SELECT * FROM tbproducts JOIN tbcat ON tbproducts.catproduct = tbcat.idcat WHERE tbproducts.idproduct = '$id'";

        return $mysqli->query($busca);
    }

    public function getProdutosCategoria($filtro){
        global $mysqli;
        $busca = "SELECT * FROM tbproducts JOIN tbcat ON tbproducts.catproduct = tbcat.idcat WHERE idcat LIKE '$filtro'";

        return $results = $mysqli->query($busca);
    }

    public function deleteProductsById($idProduto){ 
        global $mysqli;
        $delete = "DELETE FROM tbproducts WHERE idproduct ='$idProduto'";
        $mysqli->query($delete);
    }

    public function editProdutos($id, $ativo, $nome, $marca, $descricao, $categoria, $preco, $nomeFoto, $quantidade){
        global $mysqli;
        $update = "UPDATE tbproducts SET activeproduct = '$ativo', nameproduct = '$nome', brandproduct = '$marca', descproduct = '$descricao', catproduct = '$categoria', priceproduct = '$preco', photoproduct = '$nomeFoto', qtdproduct = '$quantidade' WHERE idproduct = '$id'";
        $mysqli->query($update);
    }

}