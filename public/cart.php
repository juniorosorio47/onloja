<?php 
require_once '../app/views/partials-cliente/header-cliente.php';


 if(isset($_GET['adicionar'])){
    $idProd = $_GET['adicionar'];

    $produto = new Produto();
    $prod = $produto->getProdutosById($idProd);

    $resultado = $prod->fetch_array();

    $qtdProd = $resultado['qtdproduct'];

    if($qtdProd != $_SESSION['product_'.$_GET['adicionar']]){

        $_SESSION['product_'.$_GET['adicionar']] += 1;
        header('Location: carrinho.php');
        $_SESSION['msg'] = '<div class="alert alert-success">Produto adicionado ao carrinho.</div>';
        unset($_GET['adicionar']);

    }else{

        $_SESSION['msg'] = '<div class="alert alert-danger">Só existe '.$qtdProd.' disponíveis</div>';
        unset($_GET['adicionar']);
        header('Location: carrinho.php');
        
    }

    //$_SESSION['product_'] . $_GET['adicionar'] =+1;

    //header('Location: carrinho.php');
 }

 if(isset($_GET['remove'])){
    $_SESSION['product_'.$_GET['remove']] --;
    unset($_GET['remove']);
    $_SESSION['msg'] = '<div class="alert alert-danger">Removido um produto.</div>';
    header('Location: carrinho.php');


    if($_SESSION['product_'.$_GET['remove']] < 1){
        unset($_GET['remove']);
        header('Location: carrinho.php');
    }else{
        unset($_GET['remove']);
        $_SESSION['msg'] = '<div class="alert alert-danger">Produto removido do carrinho.</div>';
        header('Location: carrinho.php');
    }
 }

 if(isset($_GET['delete'])){
    $_SESSION['product_'.$_GET['delete']] = '0';
    unset($_GET['delete']);
    $_SESSION['msg'] = '<div class="alert alert-danger">Produto removido do carrinho.</div>';
    header('Location: carrinho.php');
 }

 function listCart(){
    global $mysqli;
    $total = 0;
    $prods = 0;
    $item_name = 1;
    $item_number = 1; 
    $amount = 1;
    $quantity = 1;

    foreach($_SESSION as $name => $value){
        if($value > 0){

            if(substr($name, 0, 8) == "product_"){
                $length = strlen($name) - 8;

                $id = substr($name, 8, $length);

                $query = "SELECT * FROM tbproducts WHERE idproduct = '$id';";
                $result  = $mysqli->query($query);

                while($row = $result->fetch_array()){
                    $sub = $row['priceproduct']*$value;
                    $rowCart = <<<DELIMETER
                    <tr >
                        <td class="text-center align-middle"><img class="img-fluid" style="max-width:100px;" src="imagens/produtos/{$row['photoproduct']}"</td>
                        <td class="text-center align-middle">{$row['nameproduct']}</td>
                        <td class="text-center align-middle">{$value}</td>
                        <td class="text-center align-middle">R$ {$row['priceproduct']},00</td>
                        <td class="text-center align-middle">R$ {$sub},00</td>
                        <td class="text-center align-middle">
                            <a href="cart.php?adicionar={$row['idproduct']}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                            <a href="cart.php?remove={$row['idproduct']}" class="btn btn-info"> <i class="fa fa-minus"></i></a>
                            <a href="cart.php?delete={$row['idproduct']}" class="btn btn-danger"> <i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <input type="hidden" name="item_name" value="{$row['nameproduct']}">
                    <input type="hidden" name="item_number" value="{$row['idproduct']}">
                    <input type="hidden" name="amount" value="{$row['priceproduct']}">
                    <input type="hidden" name="quantity" value="{$value}">
DELIMETER;
                echo $rowCart;
                $prods = $prods + $value;
                $total = $total + $sub;
                $item_name++;
                $item_number++; 
                $amount++;
                $quantity++;
                }
               
            }
        }
    }
    $_SESSION['total'] = $total;
    $_SESSION['prods'] = $prods;
}


?>