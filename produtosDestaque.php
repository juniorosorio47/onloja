<?php
include_once('views/partials/header-admin.php');
include_once('config.php');

$destaque = new Destaque();
$id = '';

if(isset($_FILES['foto'])){
    $extensao = strtolower(substr($_FILES['foto']['name'], -4));
    $novoNome = md5(time()).$extensao;
    $pastaUp = "imagens/produtos/";

    move_uploaded_file($_FILES['foto']['tmp_name'], $pastaUp.$novoNome);
}


if(isset($_POST['adicionar'])){
    $id = trim(filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_STRING));

    if(empty($id)){
        echo "<div class='alert alert-danger alert-dismissible fade show'><a class='close' data-dismiss='alert'>&times</a>Por favor preencha os campos: Selecione o produto e adicione a imagem.</div>";
    }else if($destaque = new Destaque()){
        $destaque->setProdutosDestaque($id, $novoNome);
        echo "<div class='alert alert-success'><a class='close' data-dismiss='alert'>&times</a>Produto adicionado ao destaque com sucesso!</div>";
        $id = '';
    }
}

if(isset($_GET['delete'])){
    $idProduto = $_GET['delete'];

    $destaque->deleteDestaques($idProduto);
}


?>
<style>
    #destaque-admin{
        background:#97020b;
    }
    .destaques{
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: auto;
        grid-gap:20px;
    }
    .btn{
        width:100%
    }
    
</style>



<form id="add-produto" action="produtosDestaque.php" class="form-group" method="POST" enctype="multipart/form-data">
    <table class="table table-light table-bordered">
        <h4 id="prod">Adicionar produtos destaque:</h4>
        <p>Estes produtos apareceram na tela inicial da loja.</p>
        <tbody>
            <tr>
                <td><label for="produto">Produto:</label></td>
                <td>
                    <select name="produto" id="produto" class="form-control">
                        <option value="0" selected>Selecione o produto</option>
                        <?php 
                        $produto = new Produto();
                        $optionProduto = $produto->getProdutos();
                        while($dado = $optionProduto->fetch_array()){
                        ?>
                        <option value="<?php echo $dado['idproduct']?>"><?php echo $dado['nameproduct'];}?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="descricao">Imagem (600x2400 pixels):</label></td>
                <td><input name="foto" type="file" class="form-control"></td>
            </tr>
            <tr>
                <td></td>
                <td><button class="btn btn-primary" type="submit" value="adicionar" id="adicionar" name="adicionar">Adicionar</button>
            </tr>
        </tbody>
    </table>
</form>

<div class="destaques">
    <?php 
    $resultado = $destaque->getDestaquesAdm();

    while($dado = $resultado->fetch_array()){
        
    ?>
    <input type="text" name="id" id="id" hidden value="<?php echo $dado['idproduct']?>">
    <div class="card border border-danger" style="max-width:600px;">
        <div class="card-header" style="display: flex; justify-content: center; align-content: center; max-height: 310px;">
            <img style="width:300px;" class="card-img-top" src="imagens/produtos/<?php echo $dado['imagespotlight']?>" alt="<?php echo $dado['nameproduct']?>">
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $dado['nameproduct']?></h5>
            <p class="card-text"><?php echo $dado['descproduct']?></p>
            <caption><?php echo $dado['namecat']?></caption>
        </div>
        <a href="produtosDestaque.php?delete=<?php echo $dado['idproduct']?>"><button class="btn btn-danger" id="delete" method="get" name="delete">Remover</button></a>
    </div>
    <?php }?>
</div>








<?php
include_once('views/partials/footer-admin.php');
?>