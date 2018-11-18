<?php
require_once '../app/views/partials-cliente/header-cliente.php';

$nome = $imagem = $preco = $descricao = $categoria = '';

if(isset($_GET['produto'])){
    $id = $_GET['produto'];
    $produto = new Produto();

    $prod = $produto->getProdutosById($id);
    $resultado = $prod->fetch_array();

    $nome = $resultado['nameproduct'];
    $imagem = $resultado['photoproduct'];
    $preco = $resultado['priceproduct'];
    $descricao = $resultado['descproduct'];
    $categoria = $resultado['catproduct'];
};
?>
<style>
    .wrapper{
        grid-template-rows:1fr .3fr;
        grid-template-columns:1fr;
    }
    .produto{
        display: grid;
        grid-template-rows:1fr;
        grid-template-columns:.5fr 1fr;
        grid-gap:20px;
    }
    .foto{
        border-radius:20px;
        width:100%;
        height:100%;
        display:flex;
        justify-content: center;
        align-content: center;
        align-items:center;
        background: white;
        padding:30px;
    }
    .info{
        width:100%;
        height:100%;
        border-radius:20px;
        background: white;
        display: grid;
        grid-template-rows:.3fr 1fr ;
        grid-template-columns:1fr;
        padding:20px;
    }
    .titulo{
        padding:20px;
        width:100%;
        height:80%;
        display:flex;
        justify-content: right;
        align-content: center;
        align-items:center;
    }
    .info-produto{
        width:100%;
        height:100%;
        padding:20px;
        border-radius:20px;
        display:grid;
        grid-template-rows:1fr 1fr;
        grid-template-columns:1fr 500px;
    }
    .botoes{
        width:100%;
        height:100%;
        grid-column:1/3;
        margin-top:60px;
    }
    .descricao{
        max-width:100%;
        max-height:100%;

    }
    .descricao p{
        max-width:100%;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    h1{
        font-size:42pt;
    }
    .mais-produtos{
        display:grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-template-rows:1fr;
        grid-gap:20px;
        padding:0;
    }
    .card-extras{
        margin:0;
        max-height:100%;
        padding:10px;
    }
    a{
        text-decoration:none;
        color:black;
    }
    a:hover{
        text-decoration:none;
        color:gray;
    }
    #img-prod{
        max-width:570px;
    }
    .card-prod{
        max-width: 600px;
    }
    .card-body{
        display:grid;
        grid-template-columns:1fr;
        grid-template-rows:60px 110px 30px;
        padding-bottom:10px;
        background:#f8f8f8;
    }
    .card-header{
        display: flex;
        justify-content:center;
        align-items:center;
        align-content:center;
        height: 320px;
        background:white;
    }
    .footer-card{
        margin-top:20px;
        width:100%;
    }
</style>

<div class="produto">
    <div class="foto shadow border">
        <img src="imagens\produtos\<?php echo $imagem;?>" id="img-prod" alt="<?php echo $nome?>">
    </div>
    <div class="info shadow border">
        <div class="titulo">
            <h3><?php echo $nome?></h3>
        </div>
        <div class="info-produto shadow-sm border">
            <div class="preco">
                <h4>Por apenas:</h4>
                <h1>R$<?php echo $preco?></h1>
            </div>
            <div class="descricao">
                <p><?php echo $descricao;?></p>
                
            </div>
            <div class="botoes">
                <a href="cart.php?adicionar=<?php echo $id?>"><button class="btn btn-primary btn-block btn-lg"><h5>Adicionar ao carrinho</h5></button></a>
                <button class="btn btn-danger btn-block btn-lg"><h4>Comprar agora</h4></button>
            </div>
        </div>
    </div>
</div>
<div class="mais-produtos">
    <?php 
    $extras = $produto->getProdutosCategoriaLimit4($categoria);
    while($dado = $extras->fetch_array()){
    ?>
        <div class="card border card-prod shadow">
            <div class="card-header" style="display: flex; justify-content: center; align-content: center; max-height: 400px;">
                <a href="detalhesProduto.php?produto=<?php echo $dado['idproduct']?>"><img style="width:300px;" class="card-img-top" src="imagens/produtos/<?php echo $dado['photoproduct']?>" alt="<?php echo $dado['nameproduct']?>"></a>
            </div>
            <div class="card-body" style="padding-bottom: 0;">
                <h5 class="card-title"><?php echo $dado['nameproduct']?></h5>
                <p class="card-text"><?php echo $dado['descproduct']?></p>
                <h2 class="card-text">R$ <?php echo $dado['priceproduct']?>,00</h2>
                <div class="footer-card" style="">
                    <a href="buscaProduto.php?cat=<?php echo $dado['idcat']?>"><caption><strong><?php echo $dado['namecat']?></strong></caption></a>
                </div>
            </div>
        </div>



<?php
}
require_once '../app/views/partials-cliente/footer-cliente.php';
?>