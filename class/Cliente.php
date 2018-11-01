<?php
require_once("Usuario.php");

class Cliente extends Usuario{
    private $compras = array();//Array com as compras realizadas pelo cliente
    private $carrinho = array();

    function getCompras(){
        foreach($this->compras as $item){
            if(empty($item)){
               echo "vazio";
            }
            else{
                echo "$item\n";
            }
        }
    }

    function setCompras($compra){
        $this->compras[] = $compra;
    }

}
