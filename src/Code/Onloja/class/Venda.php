<?php
$mysqli = new mysqli('localhost', 'root', '', 'onloja');
class Venda{
    private $idVenda;
    private $idProduto;
    private $dataVenda;
    private $idUsuario;
    private $valorVenda;

    public function novaVenda($email, $valorTotal, $moeda, $transaction, $status){
        global $mysqli;
        $insert = "INSERT INTO tborders (emailuser, amountorder, currencyorder, transactionorder, statusorder) VALUES('$email', '$valorTotal', '$moeda', '$transaction', '$status');";
        $mysqli->query($insert);
    }

}