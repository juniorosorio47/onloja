<?php

class Produto{

    private $id; //Gerado no banco de dados
    private $nome;
    private $descricao;
    private $marca;
    private $foto;//Link para a foto na pasta imagens
    private $preco;
    private $categoria;
    private $qtdProduto;//Quantidade do produto em estoque
    private static $qtdProdutos=0;//Quantidade de produtos geral

    public function __construct(){
        //Aumenta a quantidade de produtos quando cria um novo
       $this->qtdProdutos++;
    }

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

    public function setFoto($foto){
        $this->foto = $foto;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function setPreco($preco){
        $this->preco = $preco;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function setQtdPProduto($quantidade){
        $this->qtdProduto = $quantidade;
    }

    public function getQtdProduto(){
        return $this->qtdProduto;
    }

}