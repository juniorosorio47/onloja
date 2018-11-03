<?php 
require_once('views/partials/header-admin.php');
require_once('class/Sql.php');

$consulta = "SELECT * FROM tb_usuarios";

$conn = $mysqli->query($consulta) or die($mysqli->error);
?>
<style>
    #acoes{
        padding-right:0;
        padding-left:0;
    }
    #acoes a{
       margin-right:5px;
    }
    #usuarios-admin{
        background:#97020b;
    }
    .input-forms{
        width:70%;
    }
    #overlay.active{
        background: rgba(0, 0, 0, 0.7);
        width:100%;
        height:100%;
        position: absolute;
        top:0;
        left:0;
        right:0;
        bottom:0;
        pointer-events:auto;
        transition: 1s;
        opacity:1;
    }
    #overlay{
        pointer-events:none;
        transition: 1s;
        opacity:0;
    }
    .mod.active{
        position: absolute;
        top: 80px;
        left: 300px;
        right:300px;
        pointer-events:auto;
        transition: 1s;
    }
    .mod{
        
        transition: 1s;
        pointer-events:none;
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
            <table name="tabela" class="table table-sm table-hover table-light table-bordered " style="text-align:center;">
                <thead  style="background: whitesmoke">
                    <th>Id Usuario</th>
                    <th>Login</th>
                    <th>Senha</th>
                    <th>Data de cadastro</th>
                    <th>Ações</th>
                </thead>
                
                <tbody>
                <?php while($dado = $conn->fetch_array()){?>
                    <tr>
                        <th><?php echo $dado['idusuario']?></th>
                        <td><?php echo $dado['deslogin']?></td>
                        <td><?php echo $dado['dessenha']?></td>
                        <td><?php echo $dado['dtcadastro']?></td>
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

<div id="overlay"></div>
<div class="mod card text-light bg-info">
    <div class="card card-header">
        <h6>Adicionar novo usuário</h6>
    </div>
    <div class="card card-body">
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
                <tr>
                    <td></td>
                    <td>
                        <button class="btn btn-primary btn-md">Salvar</button>
                        <button class="btn btn-danger">Cancelar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    
</script>

<?php require_once('views/partials/footer-admin.php');?>