<?php

$mysqli = new mysqli("localhost", "root", "", "onloja");

class Destaque{
    private $idProduto;
    private $imagem;

    public function setProdutosDestaque($idProduto, $imagem){
        global $mysqli;

        $insert = "INSERT INTO tbspotlight (idproduct, imagespotlight) VALUES('$idProduto', '$imagem');";
        $mysqli->query($insert);
    }

    public function getDestaquesAdm(){
        global $mysqli;

        $busca = "SELECT * FROM tbspotlight JOIN tbproducts ON tbproducts.idproduct = tbspotlight.idproduct JOIN tbcat ON tbproducts.catproduct = tbcat.idcat";

        $resultado = $mysqli->query($busca);

        return $resultado;
    }

    public function getDestaquesById($id){
        global $mysqli;

        $busca = "SELECT * FROM tbspotlight";

        $resultado = $mysqli->query($busca);

        return $resultado;
    }

    public function deleteDestaques($id){
        global $mysqli;

        $delete = "DELETE FROM tbspotlight WHERE idproduct = '$id'";

        $mysqli->query($delete);
    }

    public function getDestaques(){
        global $mysqli;
        $select = "SELECT * FROM tbspotlight;";
        $result = $mysqli->query($select);
        while($row = $result->fetch_array()){
        $slides = <<<DELIMETER
        <div class="carousel-item">
            <img src="/loja/public/imagens/produtos/{$row['imagespotlight']}" class="img-fluid">
        </div>
DELIMETER;
        }

        echo $slides;
    }


}


?>