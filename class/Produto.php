<?php

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

    public function __construct($ativo, $nome, $marca, $descricao, $preco){
        $mysqli = new mysqli('localhost','root','','onloja');

        $insert = "INSERT INTO tbproducts (activeproduct, nameproduct, brandproduct, descproduct, priceproduct) VALUES('$ativo', '$nome', '$marca', '$descricao', '$preco');";

        $cadastra = $mysqli->query($insert);
    }

    public function getProdutos(){
        $mysqli = new mysqli('localhost','root','','onloja');

        $busca = "SELECT * FROM tbproducts";

        $resultado = $mysqli->query($busca);

        return $resultado->fetch_assoc();
    }

}