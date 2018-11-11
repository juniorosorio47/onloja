<?php
require_once('../resources/config.php');
require_once(CARAIO."views/header-cliente.php");

?>

<style>
    #carousel{
        grid-column: 1/5;
        grid-row: 1/2;
        height:300px;
        background:blue;
    }
    #carousel img{
        width:100%;
        height:100%;
    }
    .card-prod{
        max-width: 600px;
    }
</style>


    <div id="carousel">

        <img src="https://images-americanas.b2w.io/spacey/2018/11/08/apple-iphone-xr-lancamento-acom-home-dest-desk-1296x324.png" alt="#">

    </div>


    <?php 
        $produto = new Produto();
        $resultado = $produto->getProdutos();

        while($dado = $resultado->fetch_array()){
            
        ?>
        <input type="text" name="id" id="id" hidden value="<?php echo $dado['idproduct']?>">
        <div class="card border border-danger card-prod">
            <div class="card-header" style="display: flex; justify-content: center; align-content: center; max-height: 300px;">
                <img style="width:300px;" class="card-img-top" src="../imagens/produtos/<?php echo $dado['photoproduct']?>" alt="<?php echo $dado['nameproduct']?>">
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $dado['nameproduct']?></h5>
                <p class="card-text"><?php echo $dado['descproduct']?></p>
                <caption><strong><?php echo $dado['namecat']?></strong></caption>
            </div>
        </div>
        <?php }?>



    

<?php
require_once('../views/partials/footer-cliente.php');
?>