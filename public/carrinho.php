<?php 
require_once '../app/views/partials-cliente/header-cliente.php';
require_once 'cart.php';
$msg = '';
if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
}
?>

<style>
    #categorias-navbar{
        display: none;
    }
    #link-carrinho{
        background: #97020b;
    }
    #titulo{
        font-weight:bold;
    }
    .wrapper{
        display: grid;
        grid-template-columns:1fr;
        grid-template-rows:80px 1fr;
        padding:20px;
    }
    .carrinho-corpo{
        display: grid;
        grid-template-columns:2fr 1fr;
        grid-template-rows:600px;
        grid-gap:20px;
    }
    tr{
        height:80px;
    }
    .resumo{
        padding:20px;
        height:400px;
        width:100%;
        display: grid;
        grid-template-rows: 1fr 1fr 1fr 1fr;
        background: #F8F8F8;
    }
    .subtotal{
        display: flex;
        justify-content:space-between
    }
    .finalizar{
        width:100%;
        display: flex;
        align-items:center
    }
    .wrapper{
        background: white;
    }

</style>

<header>
    <h2 id="titulo">Carrinho de compras:</h2>
</header>

<div class="carrinho-corpo">
    <table class="table table-lg table-hover table-responsive-xl shadow">
        <thead>
            <th class="text-center align-middle">Imagem</th>
            <th class="text-center align-middle">Produto</th>
            <th class="text-center align-middle">Quantidade</th>
            <th class="text-center align-middle">Preço</th>
            <th class="text-center align-middle">Subtotal</th>
            <th class="text-center align-middle">Ações</th>

        </thead>
        <tbody>
           <?php listCart();?>
        </tbody>
    </table>

    <div class="resumo shadow border border-danger">
        <h4>Resumo do pedido</h4>
        <div class="subtotal">
            <h5>Total: (<?php if(isset($_SESSION['prods'])){echo $_SESSION['prods'];}?>) Produtos</h5> <h5>R$ <?php if(isset($_SESSION['total'])){ echo $_SESSION['total'];}else{ echo 0;}?>,00</h5>
        </div>
        <div class="subtotal">
            <h5>Frete:</h5> <h5>Frete Grátis</h5>
        </div>
        <div class="finalizar">
            <button class="btn btn-danger btn-block"><h4>Finalizar compra</h4></button>
        </div>
    </div>
</div>













<?php
require_once '../app/views/partials-cliente/footer-cliente.php';
?>