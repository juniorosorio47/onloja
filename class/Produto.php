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
        if($mysqli){
            echo "<br>"."Conectado ao banco!"."<br>";
        }

        $insert = "INSERT INTO tbproducts (activeproduct, nameproduct, brandproduct, descproduct, priceproduct) VALUES('$ativo', '$nome', '$marca', '$descricao', '$preco');";

        $cadastra = $mysqli->query($insert);

        if($cadastra){
            echo "<br>"."Cadastro efetuado com sucesso!"."<br>";
        }else{
            echo "<br>"."Fudeu, algo de errado."."<br>";
        }
    }

}

$ativo = 1;
$nome = "Rola";
$marca = "Rolas SA";
$descricao = "Rola dura top";
$preco = 10;

$obj = new Produto($ativo, $nome, $marca, $descricao, $preco);