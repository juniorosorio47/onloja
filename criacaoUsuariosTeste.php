<?php 
require_once('views/partials/header-admin.php');
require_once('config.php');

?>

<!--Dados pessoais-->
<div class="card">
    <div class="card card-header">
        <h5>Cadastro de usuários</h5>
    </div>
    <div class="card card-body">
        <form action="" method="POST">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><label for="nome">Nome:</label></td>
                        <td><input type="text" name="nome" class="form-control" placeholder="Ex: Nome do usuário"></td>
                    </tr>
                    <tr>
                        <td><label for="cpf">CPF:</label></td>
                        <td><input type="text" name="cpf" class="form-control" placeholder="Ex: 777.777.777-77"></td>
                    </tr>
                    <tr>
                        <td><label for="dataNascimento">Data de Nascimento:</label></td>
                        <td><input type="date" name="dataNascimento" class="form-control"></td>
                    </tr>
                    <tr>
                        <td><label for="email">E-mail:</label></td>
                        <td><input type="email" name="email" class="form-control" placeholder="Ex: exemplo@exemplo.com"></td>
                    </tr>
                    <tr>
                        <td><label for="telefone">Telefone (Opcional):</label></td>
                        <td><input type="text" name="telefone" class="form-control" placeholder="Ex: (45) 3535-3535"></td>
                    </tr>
                    <tr>
                        <td><label for="celular">Celular (Opcional):</label></td>
                        <td><input type="text" name="celular" class="form-control" placeholder="Ex: (45) 9 9999-9999"></td>
                    </tr>
                    <tr>
                        <td><label for="login">Login:</label></td>
                        <td><input type="login" name="login" class="form-control" placeholder="Ex: exemplo_nome"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Senha:</label></td>
                        <td><input type="password" name="password" class="form-control"placeholder="********"></td>
                    </tr>

                </tbody>
            </table>
        </form>
        <div class="buttons">
            <button class="btn btn-primary" type="submit">Salvar</button>
            <button class="btn btn-danger">Cancelar</button>
        </div>
    </div>
</div>

<!--Dados de Endereço-->
<div class="card">
    <div class="card card-header">
        <h5>Endereço</h5>
    </div>
    <div class="card card-body">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td><label for="rua">Rua:</label></td>
                    <td><input type="text" name="rua" class="form-control" placeholder="Ex: Av. Rio Branco"></td>
                </tr>
                <tr>
                    <td><label for="numero">Número:</label></td>
                    <td><input type="number" name="numero" class="form-control" placeholder="Ex: 1111"></td>
                </tr>
                <tr>
                    <td><label for="cep">CEP:</label></td>
                    <td><input type="number" name="cep" class="form-control" placeholder="Ex: 85858-585"></td>
                </tr>
                <tr>
                    <td><label for="bairro">Bairro:</label></td>
                    <td><input type="text" name="bairro" class="form-control" placeholder="Ex: Jardim Monalisa"></td>
                </tr>
                <tr>
                    <td><label for="estado">Estado (Opcional):</label></td>
                    <td>
                        <select name="estados" class="form-control" >
                            <?php 
                                $result = $mysqli->query("SELECT * FROM estado"); 
                                while($dados = $result->fetch_assoc()){?>

                            <option value="<?php echo $dados['Id']?>"><?php echo $dados['Nome']?></option>
                            
                                <?php }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="cidade">Cidade:</label></td>
                    <td>
                        <input name="cidade" type="text"id="cidade" class="form-control" placeholder="Ex: Foz do Iguaçu">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>















<?php require_once('views/partials/footer-admin.php');?>