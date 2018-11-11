<?php

class Fornecedor{
    private $nomeFantasia;
    private $razaoSocial;
    private $cnpj;
    private $endereco;
    private $contato;

    public function setNomeFantasia($nome){
        $this->nomeFantasia = $nome;
    }

    public function getNomeFantasia(){
        return $this->nomeFantasia;
    }

    public function setrazaoSocial($nome){
        $this->razaoSocial = $nome;
    }

    public function getRazaoSocial(){
        return $this->razaoSocial;
    }

    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }

    public function getCnpj(){
        return $this->cnpj;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function setContato($contato){
        $this->contato = $contato;
    }

    public function getContato(){
        return $this->contato;
    }
}