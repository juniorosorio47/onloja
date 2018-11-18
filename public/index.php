<?php
require_once '../app/views/partials-cliente/header-cliente.php';

$destaque = new Destaque();


?>

<style>
    #carousel{
        grid-column: 1/5;
        grid-row: 1/2;
        height:350px;
        padding:0;
    }
    #carousel img{
        width:100%;
        height:100%;
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
        height: 320px;
        display
        
    }
    .footer-card{

        width:100%;
        margin-top:50px;
    }

    a{
        text-decoration:none;
        color:black;
    }
    a:hover{
        text-decoration:none;
        color:gray;
    }
</style>


    <div class="container-fluid shadow" id="carousel">
        <div id="car" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#car" data-slide-to="0" class="active"></li>
                <li data-target="#car" data-slide-to="1"></li>
                <li data-target="#car" data-slide-to="2"></li>
                <li data-target="#car" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active"><img src="http://placehold.it/1600x350?text=Slide+1" alt="Slide01" class="img-fluid"></div>
                
            </div>
        </div>
    </div>

    <!--Mosta 4 exemplos de celulares-->
    <?php 
        $produto = new Produto();
        $resultado = $produto->getProdutosCategoriaLimit4(41);

        while($dado = $resultado->fetch_array()){
            
        ?>
        <input type="text" name="id" id="id" hidden value="<?php echo $dado['idproduct']?>">

        <div class="card border  card-prod shadow">
            <div class="card-header bg-white" style="display: flex; justify-content: center; align-content: center; align-items: center; max-height: 300px;">
                <a href="detalhesProduto.php?produto=<?php echo $dado['idproduct']?>"><img style="width:250px;" class="card-img-top" src="imagens/produtos/<?php echo $dado['photoproduct']?>" alt="<?php echo $dado['nameproduct']?>"></a>
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
    <?php }?>

    <!--Mosta 4 exemplos de Notebooks-->
    
    <?php 
        $resultado = $produto->getProdutosCategoriaLimit4(23);

        while($dado = $resultado->fetch_array()){
            
        ?>
        <input type="text" name="id" id="id" hidden value="<?php echo $dado['idproduct']?>">
        
        <div class="card border card-prod shadow">
            <div class="card-header bg-white" style="display: flex; justify-content: center; align-content: center; align-items: center; max-height: 300px;">
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
        <?php }?>

<?php
require_once '../app/views/partials-cliente/footer-cliente.php';
?>