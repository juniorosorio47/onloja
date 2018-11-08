<?php
include_once('views/partials/header-admin.php');
include_once('config.php');

$produto = new Produto();

$resultado = $produto->getProdutos();

while($dado = $resultado->fetch_array()){
?>
<style>
    .card{
        max-width: 400px;
        height: 400px;
    }
    .card-header{
        max-height:50px;
    }
    .card-body{
        overflow:hidden;
        display: flex;
        justify-content:center;
        align-content:center;
        align-items: center;
    }
    .card-footer{
        max-height:90px;
    }
    
</style>

<div class="card">
    <div class="card card-header"><h4><?php echo $dado['nameproduct']?></h4></div>
    <div class="card card-body">
        <img style="max-width:450px;"src="<?php echo 'imagens/produtos/'.$dado['photoproduct']?>" alt="#">
    </div>
    <div class="card card-footer">
        <p><?php echo $dado['descproduct']?></p>
        <h5><?php echo "R$ ".$dado['priceproduct'].",00"?></h5>
    </div>
</div>

<?php
}
include_once('views/partials/footer-admin.php');
?>