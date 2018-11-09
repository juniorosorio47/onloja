<?php
include_once('views/partials/header-admin.php');
include_once('config.php');

$produto = new Produto();
$categoria = 0;
$update = false;
$ativo = $nome = $marca = $descricao = $preco = '';


if(isset($_GET['edit'])){
    $idEdit = $_GET['edit'];

    $obj = $produto->getProdutosById($idEdit);

    $resultado = $obj->fetch_array();

    $ativo = $resultado['activeproduct'];
    $nome = $resultado['nameproduct'];
    $marca = $resultado['brandproduct'];
    $descricao = $resultado['descproduct'];
    $preco = $resultado['priceproduct'];
    $categoria = $resultado['catproduct'];
    $quantidade = $resultado['qtdproduct'];

}

if(isset($_POST['salvar'])){
    $ativo = trim(filter_input(INPUT_POST, 'ativo', FILTER_SANITIZE_STRING));
    $nome = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    $marca = trim(filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_STRING));
    $descricao = trim(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING));
    $categoria = trim(filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING));
    $preco = trim(filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING));
    $quantidade = trim(filter_input(INPUT_POST, 'qtd', FILTER_SANITIZE_STRING));
    
    if(empty($nome) || empty($marca) || empty($descricao) || empty($preco) || empty($categoria) || empty($quantidade) || !isset($_FILES['foto'])){
       
        echo "<div class='alert alert-danger alert-dismissible fade show'><a class='close' data-dismiss='alert'>&times</a>Por favor preencha os campos: Nome, Marca, Descrição, Categoria e Preço.</div>";
    }else{
        if($produto = new Produto){ 
            $produto->editProdutos($ativo, $nome, $marca, $descricao, $categoria, $preco, $novoNome, $quantidade);
            echo "<div class='alert alert-success'><a class='close' data-dismiss='alert'>&times</a>Produto adicionado com sucesso!</div>";
            $ativo = $nome = $marca = $descricao = $preco = $quantidade = '';
            header('location: produtos.php');
        }else{
            echo "<div class='alert alert-danger'>Não foi possível adicionar o produto.</div>";
        }
    }
}


?>
<style>
    #produtos-admin{
        background:#97020b;
    }
    .botao-add{
        margin-bottom:20px;
    }
    .icon{
        margin-left: 10px;
    }
    #prod{
        margin-left:10px;
    }
    .topo-lista{
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    #categorias-filtro{
        max-width:200px;

    }
    #div-categorias{
        width:450px;
        display: flex;
        justify-content:space-evenly;
        align-content: center;
        align-items: center;
    }

</style>
<form id="add-produto" action="editarProdutos.php" class="form-group" method="POST" enctype="multipart/form-data">
    <table class="table table-light table-bordered">
        
        <h4 id='prod'>Editar Produto:</h4>
        
        <tbody>
            <tr>
                <td><label for="ativo">Finalidade do produto:</label></td>
                <td>
                    <select name="ativo" id="ativo" class="form-control">
                        <option value="1" <?=($ativo == 1)?'selected':''?>>Venda</option>
                        <option value="0" <?=($ativo == 0)?'selected':''?>>Estoque</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="nome">Nome / Modelo:</label></td>
                <td><input name="nome" type="text" class="form-control" placeholder="Nome de exibição do produto" value = "<?php echo htmlspecialchars($nome);?>"></td>
            </tr>
            <tr>
                <td><label for="marca">Marca:</label></td>
                <td><input name="marca" type="text" class="form-control" placeholder="Ex: Samsung" value = "<?php echo htmlspecialchars($marca);?>"></td>
            </tr>
            <tr>
                <td><label for="descricao">Descrição do produto:</label></td>
                <td><textarea name="descricao" type="text" class="form-control" placeholder="Ex: Smartphone Samsung Galaxy S9 Azul com 128GB"><?php echo htmlspecialchars($descricao);?></textarea></td>
            </tr>
            <tr>
                <td><label for="categoria">Categoria:</label></td>
                <td>
                    <?php
                    $cat = new Categoria();
                    $optionCat = $cat->getCategorias();
                    ?>
                    <select name="categoria" id="categoria" class="form-control">
                    <option value="<?php echo $categoria?>"></option>
                        <?php 
                        
                        while($dado = $optionCat->fetch_array()){
                        ?>
                        
                        
                        <option value="<?php echo $dado['idcat']?>"><?php echo $dado['namecat'];}?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="preco">Preço:</label></td>
                <td><input name="preco" type="number" step="0.01" class="form-control" placeholder="Ex: R$2800,00" value = "<?php echo htmlspecialchars($preco);?>"></td>
            </tr>
            <tr>
                <td><label for="qtd">Quantidade:</label></td>
                <td><input name="qtd" type="number" class="form-control" placeholder="Ex: 2" value = "<?php echo htmlspecialchars($quantidade);?>"></td>
            </tr>
            <tr>
                <td><label for="foto">Imagem do produto</label></td> 
                <td><input name="foto" type="file" class="form-control" placeholder="Ex: R$2800,00"></td>   
            </tr>
            <tr>
                <td></td>
                <td><button class="btn btn-primary" type="submit" id="salvar" name="salvar">Salvar modificações</button>
                <a href="produtos.php"><button class="btn btn-danger" id="fechar-cadastro" type="button">Cancelar</button></a></td>
            </tr>
        </tbody>
    </table>
</form>

<?php
include_once('views/partials/footer-admin.php');
?>