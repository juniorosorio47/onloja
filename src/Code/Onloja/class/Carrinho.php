<?php
$mysqli = new mysqli('localhost','root','','onloja');
class Carrinho{
    public function listCart(){
        global $mysqli;


        $query = "SELECT * FROM tbproducts";
        $result  = $mysqli->query($query);
    }
}