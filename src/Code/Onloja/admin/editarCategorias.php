<?php
require_once '../../../../app/views/partials-admin/header-admin.php';

$cat = new Categoria();
$nome = $descricao = '';



if(isset($_GET['edit'])){
    $idCat = $_GET['edit'];

    $aux = $cat->getCategoriasById($idCat);

    $resultado = $aux->fetch_array();

    $nome = $resultado['namecat'];
    $descricao = $resultado['desccat'];
    
}
?>
<style>
    #categorias-admin{
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
<form id="add-produto" action="categorias.php" class="form-group" method="POST">
    <table class="table table-light table-bordered">
        <input type="text" name="id" hidden value="<?php echo $_GET['edit']?>">
        <h4 id="prod">Editar Categoria:</h4>
        <tbody>
            <tr>
                <td><label for="nome">Nome Categoria:</label></td>
                <td><input name="nome" type="text" class="form-control" placeholder="Ex: Notebooks" value = "<?php echo htmlspecialchars($nome);?>"></td>
            </tr>
            <tr>
                <td><label for="descricao">Descricao:</label></td>
                <td><textarea name="descricao" type="text" class="form-control" placeholder="Ex: Computadores portáteis"><?php echo htmlspecialchars($descricao);?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><button class="btn btn-primary" type="submit" value="salvar" id="salvar" name="salvar">Salvar modificações</button>
                <a href="categorias.php"><button class="btn btn-danger" id="fechar-cadastro" type="button">Cancelar</button></a></td>
            </tr>
        </tbody>
    </table>
</form>

<?php
require_once '../../../../app/views/partials-admin/footer-admin.php';
?>