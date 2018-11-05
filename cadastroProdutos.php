<?php
include_once('views/partials/header-admin.php');
include_once('config.php');
?>
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

    });
</script>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $ativo = trim(filter_input(INPUT_POST, 'ativo', FILTER_SANITIZE_STRING));
    $nome = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    $marca = trim(filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_STRING));
    $descricao = trim(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING));
    $preco = trim(filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING));
    
    if(empty($nome) || empty($marca) || empty($descricao) || empty($preco)){
        echo "<script> $(document).ready(function(){ $('#add-produto').show();});</script>";
        echo "<div class='alert alert-danger'>Por favor preencha os campos: Nome, Marca, Descrição e Preço.</div>";
    }else{
        if($produto = new Produto($ativo, $nome, $marca, $descricao, $preco)){ 
            echo "<div class='alert alert-success'>Produto adicionado com sucesso!</div>";
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
</style>
<form id="add-produto" action="cadastroProdutos.php" class="form-group" method="POST">
    <table class="table table-light table-bordered">
        <thead>
            <th>Adicionar Produtos</th>
        </thead>
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
                <td><label for="nome">Nome:</label></td>
                <td><input name="nome" type="text" class="form-control" placeholder="Nome de exibição do produto"></td>
            </tr>
            <tr>
                <td><label for="marca">Marca:</label></td>
                <td><input name="marca" type="text" class="form-control" placeholder="Ex: Samsung"></td>
            </tr>
            <tr>
                <td><label for="descricao">Descrição do produto:</label></td>
                <td><textarea name="descricao" type="textarea" class="form-control" placeholder="Ex: Smartphone Samsung Galaxy S9 Azul com 128GB, Tela Infinita de 5.8, Dual Chip, Android 8.0, Câmera 12MP, 4GB RAM e Processador Octa-Core"></textarea></td>
            </tr>
            <tr>
                <td><label for="preco">Preço:</label></td>
                <td><input name="preco" type="number" class="form-control" placeholder="Ex: R$2800,00"></td>
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

<div class="botao-add">
    <button id="abrir-cadastro" class="btn btn-info"><i class="fa fa-plus"></i> Adicionar Produto</button>
</div>

<table class="table table-light table-bordered table-hover">
    <thead >
        <th>Situação</th>
        <th>Nome</th>
        <th>Marca</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Ações</th>
    </thead>
    <tbody>
        <?php 
            $mysqli = new mysqli('localhost','root','','onloja');

            $busca = "SELECT * FROM tbproducts";
    
            $resultado = $mysqli->query($busca);

            while($dado = $resultado->fetch_array()){
        ?>
        <tr>
            <td><?php if($dado['activeproduct']){ echo "Venda";}else{ echo "Estoque";}?></td>
            <td><?php echo $dado['nameproduct']?></td>
            <td><?php echo $dado['brandproduct']?></td>
            <td><?php echo $dado['descproduct']?></td>
            <td><?php echo "R$ ".$dado['priceproduct'].",00"?></td>
            <td><a href="#" class="icon"><i class="fa fa-edit text-info"></i></a> <a href="#" class="icon"><i class="fa fa-trash text-danger"></i></a></td>
        </tr>
            <?php }?>
    </tbody>
</table>












<?php
include_once('views/partials/footer-admin.php')
?>