<?php
require_once '../../../../app/views/partials-admin/header-admin.php';

$user = new Usuario();

$nome = $cpf = $dataNasc = $sexo = $email = $adm = $ativo = '';

if(isset($_GET['edit'])){
    $idEdit = $_GET['edit'];
    
    $obj = $user->getUserById($idEdit);

    $resultado = $obj->fetch_array();

    $nome = $resultado['nameuser'];
    $cpf = $resultado['cpfuser'];
    $dataNasc = $resultado['datenasc'];
    $sexo = $resultado['sexuser'];
    $email = $resultado['emailuser'];
    $adm = $resultado['inadm'];
    $ativo = $resultado['activeuser'];
}
?>
<form id="editUser" action="usuarios.php" class="form-group" method="POST" enctype="multipart/form-data">
    <input type="text" name="id" hidden value="<?php echo $_GET['edit']?>">
    <table class="table table-light table-bordered">
        <input type="text" name="id" hidden value="<?php echo $_GET['edit']?>">
        <h4 id='prod'>Editar Usuário:</h4>
        
        <tbody>
            <tr>
                <td><label for="ativo">Usuário ativo?</label></td>
                <td>
                    <select name="ativo" id="ativo" class="form-control">
                        <option value="1" <?=($ativo == 1)?'selected':''?>>Ativo</option>
                        <option value="0" <?=($ativo == 0)?'selected':''?>>Inativo</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="nome">Nome:</label></td>
                <td><input name="nome" type="text" class="form-control" value = "<?php echo htmlspecialchars($nome);?>"></td>
            </tr>
            <tr>
                <td><label for="cpf">CPF:</label></td>
                <td><input name="cpf" type="text" class="form-control" value= "<?php echo htmlspecialchars($cpf);?>"></td>
            </tr>
            <tr>
                <td><label for="dataNasc">Data de Nascimento:</label></td>
                <td><input name="dataNasc" type="date" class="form-control" value= "<?php echo htmlspecialchars($dataNasc);?>"></td>
            </tr>
            <tr>
                <td><label for="sexo">Sexo</label></td>
                <td>
                    <select name="sexo" id="sexo" class="form-control">
                        <option value="1" <?=($sexo == 1)?'selected':''?>>Não informado</option>
                        <option value="2" <?=($sexo == 2)?'selected':''?>>Masculino</option>
                        <option value="3" <?=($sexo == 3)?'selected':''?>>Feminino</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="email">E-mail:</label></td>
                <td><input name="email" type="email" class="form-control" value= "<?php echo htmlspecialchars($email);?>"></td>
            </tr>
            <tr>
                <td><label for="inadm">Usuário Administrador?</label></td>
                <td>
                    <select name="inadm" id="inadm" class="form-control">
                        <option value="1" <?=($adm == 1)?'selected':''?>>Administrador</option>
                        <option value="0" <?=($adm == 0)?'selected':''?>>Comum</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><button class="btn btn-primary" type="submit" value="salvar" id="salvar" name="salvar">Salvar modificações</button>
                <a href="usuarios.php"><button class="btn btn-danger" id="fechar-cadastro" type="button">Cancelar</button></a></td>
            </tr>
        </tbody>
    </table>

</form>

<?php require_once '../../../../app/views/partials-admin/footer-admin.php';?>