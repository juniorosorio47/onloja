<?php 
require_once('views/partials/header-admin.php');

$consulta = "SELECT * FROM tb_users";

$conn = $mysqli->query($consulta) or die($mysqli->error);
?>
<style>
    #usuarios-admin{
       background:#97020b;
}
</style>
<div class="h-usuarios" style="margin-bottom:20px;">
    <button id="adicionar-usuario" class="btn btn-info"><i class="fa fa-plus"></i> Adicionar novo usuário</button>
</div>
    
<div class="lista-usuarios">
    <div class="card" style=" background: whitesmoke; border: solid 1px #00000046">
        <div class="card card-header text-white bg-dark" style="border: solid 1px #00000046; height:50px">
            <h6>Usuarios cadastrados</h6>
        </div>
        <div class="card card-body" style="padding:0; ">
            <table name="tabela" class="table table-sm table-hover table-light table-bordered" style="text-align:center;">
                <thead  style="background: whitesmoke">
                    <th>Id Usuario</th>
                    <th>Id Pessoa</th>
                    <th>Login</th>
                    <th>Admin?</th>
                    <th>Data de cadastro</th>
                    <th>Ações</th>
                </thead>
                
                <tbody>
                <?php while($dado = $conn->fetch_array()){?>
                    <tr>
                        <th><?php echo $dado['iduser']?></th>
                        <td><?php echo $dado['idperson']?></td>
                        <td><?php echo $dado['deslogin']?></td>
                        <td><?php echo $dado['inadmin']?></td>
                        <td><?php echo $dado['dtregister']?></td>
                        <td id="acoes">
                            <a href="#" id="info-user"><i class="fa fa-info-circle text-info"></i></a>
                            <a href="#" id="edit-user"><i class="fa fa-edit text-primary"></i></a>
                            <a href="#" id="delete-user"><i class="fa fa-trash-alt text-danger"></i></a>
                        </td>
                    </tr>
                <?php };?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="overlay"></div>
<div class="mod card text-light bg-dark">
    <div class="card card-header">
        <h6>Adicionar novo usuário</h6>
    </div>
    <div class="card card-body cartao-corpo">
        <table class="table table-bordered">
            <tbody class="text-dark">
                <tr>
                    <td><label for="nome">Nome:</label></td>
                    <td class="input-forms"><input type="text" name="nome" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="email">E-mail:</label></td>
                    <td class="input-forms"><input type="email" name="email" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="password">Senha:</label></td>
                    <td class="input-forms"><input type="password" name="password" class="form-control"></td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="card card-footer modal-footer bg-light">
        <button class="btn btn-primary">Salvar</button>
        <button class="btn btn-danger" id="cancelar">Cancelar</button>
    </div>
</div>




<?php require_once('views/partials/footer-admin.php');?>