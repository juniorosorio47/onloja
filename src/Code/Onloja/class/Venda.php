<?php
$mysqli = new mysqli('localhost', 'root', '', 'onloja');
class Venda{
    private $idVenda;
    private $idProduto;
    private $dataVenda;
    private $idUsuario;
    private $valorVenda;

    public function novaVenda($idProduto, $idUsuario, $valorVenda){
        global $mysqli;
        $insert = "INSERT INTO tbsales (idproduct, iduser, pricesale) VALUES('$idProduto', '$idUsuario', '$valorVenda';)";
        $mysqli->query($insert);
    }




}