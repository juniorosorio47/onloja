<?php
require_once '../app/views/partials-cliente/header-cliente.php';
$nome = $imagem = $preco = $descricao = $categoria = $prod = $msg = '';

if(isset($_GET['cat'])){
    $idCat = $_GET['cat'];
    $produto = new Produto();

    $prod = $produto->getProdutosCategoria($idCat);

    unset($_GET['cat']);
};
if(isset($_POST['pesquisa'])){
    $pesquisa = $_POST['pesquisa'];
    $produto = new Produto();

    $prod = $produto->searchProducts($pesquisa);

    if(mysqli_num_rows($prod)==0){
        $msg = "<h3>Não foram encontrados resultados para a pesquisa.</h3>";
    }
    unset($_POST['pesquisar-usuarios']);
}
?>
<style>
    .wrapper{
        grid-template-columns:.6fr 2fr;
        grid-template-rows:auto;
    }
    .categorias{
        padding:10px;
    }
    .categorias ul{
        height:100%;
        width:100%;
        margin:0;
        padding:0;
    }
    .categorias ul li{
        width:100%;
        font-size:14pt;
        line-height:50px;
        list-style:none;
 
        border-top:solid 1px rgba(0, 0, 0, 0.315);
        font-weight:bold;
        
    }
    .categorias ul li a{
        margin-left:10px;
        color:#CF000F;
    }
    a{
        text-decoration:none;
        color:black;
    }
    a:hover{
        text-decoration:none;
        color:black;
    }
    .resultados img{
        width:240px;
        height:100%;
        object-fit:contain;

    }
    .resultados{
        width:100%;
        display:grid;
        grid-template-columns:1fr;
        grid-template-rows:auto;
        grid-gap:10px;
    }
    .prod{
        padding:20px;
        height:300px;
        display:grid;
        grid-template-columns:.5fr 2fr;
        grid-template-rows:1fr;
        grid-gap:20px;
        align-items:center;
    }
    #navbar-categorias{
        display:none;
    }
    .info .btn{
        float:right;
        background: #CF000F;
    }

</style>
<div class="categorias border shadow bg-white">
    <ul id="categorias-sidebar">
        <h4>Categorias:</h4>
        <?php 
        $cat = new Categoria();
        $catergorias = $cat->getCategorias();

        while($dado = $catergorias->fetch_array()){
        ?>
        <li><a href="buscaProduto.php?cat=<?php echo $dado['idcat']?>"><?php echo $dado['namecat']?></a></li>
        <?php }?>
    </ul>
</div>

<div class="resultados">
    
    <?php echo $msg; if(!empty($prod)){ while($dado = $prod->fetch_array()){?>
    <div class="prod shadow-sm border bg-white">
        <a href="detalhesProduto.php?produto=<?php echo $dado['idproduct'];?>"><img src="imagens/produtos/<?php echo $dado['photoproduct']?>" alt="<?php echo $dado['nameproduct'];?>"></a>
        <div class="info">
            <a href="detalhesProduto.php?produto=<?php echo $dado['idproduct'];?>"><h4><?php echo $dado['nameproduct'];?></h4></a>
            <p><?php echo $dado['descproduct'];?></p>
            <br>
            <br>
            <h2>R$ <?php echo $dado['priceproduct'];?>,00</h2>
            <a href="cart.php?adicionar=<?php echo $dado['idproduct']?>"><button class="btn btn-danger btn-lg">Adicionar ao carrinho</button></a>
        </div>
    </div>
    
    <?php }}else{ echo "<h3>Nenhuma pesquisa foi definida.</h3>";} ?>
</div>







<?php
require_once '../app/views/partials-cliente/footer-cliente.php';
?>