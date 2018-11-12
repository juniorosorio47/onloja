<?php
require_once '../../../../app/views/partials-admin/header-admin.php';

$total = 0;
$categoria = 0;
$nome = $descricao = '';
$cat = new Categoria();

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $cat->deleteCategorias($id);
    unset($_GET['delete']);
    echo "<div class='alert alert-danger alert-dismissible fade show'><a class='close close-get' data-dismiss='alert'>&times</a>Categoria excluida com sucesso!</div>";
}

if(isset($_POST['cadastrar'])){
    $nome = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    $descricao = trim(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING));

    
    if(empty($nome) || empty($descricao)){
        echo "<script> $(document).ready(function(){ $('#add-produto').toggle();});</script>";
        echo "<div class='alert alert-danger alert-dismissible fade show'><a class='close' data-dismiss='alert'>&times</a>Por favor preencha os campos: Nome e Descrição.</div>";
    }else{
        if($cat = new Categoria){ 
            $cat->setCategoria($nome, $descricao);
            echo "<div class='alert alert-success'><a class='close' data-dismiss='alert'>&times</a>Categoria adicionada com sucesso!</div>";
            $nome = $descricao = '';
        }else{
            echo "<div class='alert alert-danger'>Não foi possível adicionar a categoria.</div>";
        }
    }
}

if(isset($_POST['salvar'])){
    $id = trim(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING));
    $nome = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    $descricao = trim(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING));

    
    if(empty($nome) || empty($descricao)){
        echo "<script> $(document).ready(function(){ $('#add-produto').toggle();});</script>";
        echo "<div class='alert alert-danger alert-dismissible fade show'><a class='close' data-dismiss='alert'>&times</a>Por favor preencha os campos: Nome e Descrição.</div>";
    }else{
        if($cat = new Categoria){ 
            $cat->editCategorias($id, $nome, $descricao);
            echo "<div class='alert alert-success'><a class='close' data-dismiss='alert'>&times</a>Categoria modificada com sucesso!</div>";
            $nome = $descricao = '';
        }else{
            echo "<div class='alert alert-danger'>Não foi possível adicionar a categoria.</div>";
        }
    }
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
        <h4 id="prod">Adicionar Categoria:</h4>
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
                <td><button class="btn btn-primary" type="submit" id="cadastrar" name="cadastrar">Cadastrar</button>
                <button class="btn btn-danger" id="fechar-cadastro" value="cancelar">Cancelar</button></td>
            </tr>
        </tbody>
    </table>
</form>

<div class="topo-lista">
    <button id="abrir-cadastro" class="btn btn-info"><i class="fa fa-plus"></i> Adicionar Categoria</button>
</div>

<div class="info-cat">
    <h4 id="add-prod">Todas as Categorias:</h4>
    <p>Caso a categoria estiver sendo usada em algum produto, não será possível excluir.</p>
    
</div>
<table class="table table-light table-bordered table-hover">
    <thead >
        <th>Nome Categoria</th>
        <th>Descrição</th>
        <th>Ações</th>
    </thead>
    <tbody>
            <tr>
            <?php 
            $categoria = new Categoria();
            $resultado = $categoria->getCategorias();

            while($dado = $resultado->fetch_array()){
                $total++;
            ?>  
                <td><?php echo $dado['namecat']?></td>
                <td><?php echo $dado['desccat']?></td>
                <td><a href="editarCategorias.php?edit=<?php echo $dado['idcat']?>" class="icon" id="edit"><i class="fa fa-edit text-info"></i></a> <a href="categorias.php?delete=<?php echo $dado['idcat']?>" class="icon" id="delete" name="delete" method="get" action="categorias.php"><i class="fa fa-trash text-danger"></i></a></td>
            </tr>
                <?php }?>
    </tbody>
    <caption><?php echo "Encontradas ".$total. " categorias.";?></caption>
</table>

<!--Scripts  de manipulação do DOM-->
<script>
    $(document).ready(function(){

        $('#add-produto').hide();

        $('#abrir-cadastro').click(function(event){
            event.preventDefault();
            $('#add-produto').show("slow");
        });

        $('#fechar-cadastro').click(function(event){
            event.preventDefault();
            $('#add-produto').hide("slow");
            $('.alert-danger').hide("slow");
        });

        $('.close').click(function(event){
            $('.alert-success').fadeOut("fast");
            $('.alert-danger').fadeOut("fast");

            var novaURL = "categorias.php";
            $(window.document.location).attr('href',novaURL);
        });
        

    });
</script>




<?php
require_once '../../../../app/views/partials-admin/footer-admin.php';
?>