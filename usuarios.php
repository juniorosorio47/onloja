<?php 
require_once('views/partials/header-admin.php');
require_once('class/Sql.php');

$consulta = "SELECT * FROM tb_usuarios";

$conn = $mysqli->query($consulta) or die($mysqli->error);
?>
<div class="h-usuarios" style="margin-bottom:20px;">
    <button id="adicionar-usuario" class="btn btn-info"><i class="fa fa-plus"></i> Adicionar novo usuário</button>
</div>
    
<div class="lista-usuarios">
    <div class="card" style=" background: whitesmoke; border: solid 1px #00000046">
        <div class="card card-header text-white bg-dark" style="border: solid 1px #00000046;">
            <h5>Usuarios cadastrados:</h5>
        </div>
        <div class="card card-body" style="padding:0; ">
            <table name="tabela" class="table table-hover table-light table-bordered " style="text-align:center;">
                <thead  style="background: whitesmoke">
                    <th>Id Usuario</th>
                    <th>Login</th>
                    <th>Senha</th>
                    <th>Data de cadastro</th>
                </thead>
                
                <tbody>
                <?php while($dado = $conn->fetch_array()){?>
                    <tr>
                        <th><?php echo $dado['idusuario']?></th>
                        <td><?php echo $dado['deslogin']?></td>
                        <td><?php echo $dado['dessenha']?></td>
                        <td><?php echo $dado['dtcadastro']?></td>
                    </tr>
                <?php };?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once('views/partials/footer-admin.php');?>