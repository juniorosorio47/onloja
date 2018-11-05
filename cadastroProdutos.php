<?php



include_once('views\partials\header-admin.php');
include_once('class\Sql.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
    print_r($_POST);
}

?>
<form action="cadastroProdutos.php" class="form-group" method="POST">
    <table class="table table-bordered">
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
                <td><button class="btn btn-primary" type="submit" value="submit">Cadastrar</button></td>

            </tr>
        </tbody>
        
    </table>
    
</form>




    





<?php
include_once('views\partials\footer-admin.php')
?>