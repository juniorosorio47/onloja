<?php
include_once('views/partials/header-admin.php');
include_once('config.php');

$categoria = 0;
$ativo = $nome = $marca = $descricao = $preco = '';
if(isset($_FILES['foto'])){
    $extensao = strtolower(substr($_FILES['foto']['name'], -4));
    $novoNome = md5(time()).$extensao;
    $pastaUp = "imagens/produtos/";

    move_uploaded_file($_FILES['foto']['tmp_name'], $pastaUp.$novoNome);
}else{$_FILES['foto'] = '';}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $ativo = trim(filter_input(INPUT_POST, 'ativo', FILTER_SANITIZE_STRING));
    $nome = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    $marca = trim(filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_STRING));
    $descricao = trim(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING));
    $categoria = trim(filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING));
    $preco = trim(filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING));

    
    if(empty($nome) || empty($marca) || empty($descricao) || empty($preco) || empty($categoria) || !isset($_FILES['foto'])){
        echo "<script> $(document).ready(function(){ $('#add-produto').toggle();});</script>";
        echo "<div class='alert alert-danger alert-dismissible fade show'><a class='close' data-dismiss='alert'>&times</a>Por favor preencha os campos: Nome, Marca, Descrição, Categoria e Preço.</div>";
    }else{
        if($produto = new Produto){ 
            $produto->setProduto($ativo, $nome, $marca, $descricao, $categoria, $preco, $novoNome);
            echo "<div class='alert alert-success'><a class='close' data-dismiss='alert'>&times</a>Produto adicionado com sucesso!</div>";
            $ativo = $nome = $marca = $descricao = $preco = '';
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
<form id="add-produto" action="produtos.php" class="form-group" method="POST" enctype="multipart/form-data">
    <table class="table table-light table-bordered">
        <h4 id="prod">Adicionar Produto:</h4>
        <tbody>
            <tr>
                <td><label for="ativo">Finalidade do produto:</label></td>
                <td>
                    <select name="ativo" id="ativo" class="form-control">
                        <option value="1" selected>Venda</option>
                        <option value="0">Estoque</option>
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
                    <select name="categoria" id="categoria" class="form-control">
                        <option value="0" selected>Selecione a categoria</option>
                        <?php 
                        $cat = new Categoria();
                        $optionCat = $cat->getCategorias();
                        while($dado = $optionCat->fetch_array()){
                        ?>
                        <option value="<?php echo $dado['idcat']?>"><?php echo $dado['namecat'];}?></option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="preco">Preço:</label></td>
                <td><input name="preco" type="number" class="form-control" placeholder="Ex: R$2800,00" value = "<?php echo htmlspecialchars($preco);?>"></td>
            </tr>
   
            <tr>
                <td><label for="foto">Imagem do produto</label></td>
                <td><input name="foto" type="file" class="form-control" placeholder="Ex: R$2800,00"></td>   
            </tr>
            <tr>
                <td></td>
                <td><button class="btn btn-primary" type="submit" value="cadastrar">Cadastrar</button>
                <button class="btn btn-danger" id="fechar-cadastro" value="cancelar">Cancelar</button></td>
            </tr>
        </tbody>
    </table>
</form>

<div class="topo-lista">
    <button id="abrir-cadastro" class="btn btn-info"><i class="fa fa-plus"></i> Adicionar Produto</button>
    <div id="div-categorias">
        <select name="categorias-filtro" id="categorias-filtro" class="form-control">
            <option value="0">Todas as categorias</option>
            <?php 
            $optionCat = $cat->getCategorias();
            while($dado = $optionCat->fetch_array()){
            ?>
            <option value="<?php echo $dado['idcat']?>"><?php echo $dado['namecat'];}?></option>
        </select>
        <input type="text" class="form-control" id="categorias-filtro" placeholder="Pesquisar em produtos:">
    </div>
</div>

<h4 id="add-prod">Todos os Produtos:</h4>
<table class="table table-light table-bordered table-hover">
    <thead >
        <th>Situação</th>
        <th>Nome / Modelo</th>
        <th>Marca</th>
        <th>Descrição</th>
        <th>Categoria</th>
        <th>Preço</th>
        <th>Data e hora de registro</th>
        <th>Imagem</th>
        <th>Ações</th>
    </thead>
    <tbody>
            <tr>
            <?php 
            $produto = new Produto();
            $resultado = $produto->getProdutos();
        
            while($dado = $resultado->fetch_array()){
                if(empty($dado)==true){
            ?>
                <td><?php echo "Nenhum produto cadastrado.";}?></td>
                <td><?php if($dado['activeproduct']){ echo "Venda";}else{ echo "Estoque";}?></td>
                <td><?php echo $dado['nameproduct']?></td>
                <td><?php echo $dado['brandproduct']?></td>
                <td><?php echo $dado['descproduct']?></td>
                <td><?php echo $dado['namecat']?></td>
                <td><?php echo "R$ ".$dado['priceproduct'].",00"?></td>
                <td><?php echo date("d/m/Y H:i:s", strtotime($dado['registerdateproduct']))?></td>
                <td><img style="max-width:100px;" src="imagens/produtos/<?php echo $dado['photoproduct']?>" alt="Imagem não cadastrada  "></td>
                <td><a href="#" class="icon" id="edit"><i class="fa fa-edit text-info"></i></a> <a href="#" class="icon" id="delete"><i class="fa fa-trash text-danger"></i></a></td>
            </tr>
                <?php }?>
    </tbody>
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
        })

    });
</script>




<?php
include_once('views/partials/footer-admin.php');
?>