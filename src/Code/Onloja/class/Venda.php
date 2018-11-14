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

    public function getVendasByUser($idUser){
        global $mysqli;
        $select = "SELECT * FROM tbsales JOIN tb_users ON tbsales.iduser = tb_users.iduser JOIN tbproducts ON tbsales.idproduct = tbproducts.idproduct WHERE tbsales.iduser = '$idUser';";
        return $mysqli->query($select);
    }

    public function getVendasByProduto($idProduto){
        global $mysqli;
        $select = "SELECT * FROM tbsales JOIN tb_users ON tbsales.iduser = tb_users.iduser JOIN tbproducts ON tbsales.idproduct = tbproducts.idproduct WHERE tbsales.idproduct = '$idProduto' ;";
        return $mysqli->query($select);
    }



}