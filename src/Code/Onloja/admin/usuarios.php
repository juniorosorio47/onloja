<?php 
require_once '../../../../app/views/partials-admin/header-admin.php';

$consulta = "SELECT * FROM tb_users";

$conn = $mysqli->query($consulta) or die($mysqli->error);
$info = '';
if(isset($_GET['info'])){
    $id = $_GET['info'];
    $user = new Usuario();
    $compras = new Venda();
    $info = $user->getUsuarioById($id);
}
?>

<style>
    #usuarios-admin{
       background:#97020b;
    }
    .pesquisar-users{
        max-width:250px;
        display:flex;
        justify-content:flex-end;
        align-content:flex-end;
        float:right;
    }

    .search{
        width:60px;
    }
    .lista-usuarios{
        margin-top:25px;
    }
    .info-body{
        display:grid;
        grid-template-columns:1fr;
        grid-template-rows:1fr 1fr;
    }
</style>

<div class="info-user">
    <div class="card card-info">
        <div class="card card-header"><h5>Detalhes do Usuário:</h5></div>
        <div class="card card-body info-body">
            <div class="infos">
                <table class="table table-hover table-light table-bordered">
                    <thead>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Data de Nascimento</th>
                        <th>Sexo</th>
                        <th>E-mail</th>
                        <th>Ativo?</th>
                        <th>Adiministrador?</th>
                        <th>Data de Cadastro</th>
                    </thead>
                    <tbody>
                    <?php if(!empty($info)){ while($dado = $info->fetch_array()){?>
                        <tr>
                            <td><?php echo $dado['nameuser']?></td>
                            <td><?php echo $dado['cpfuser']?></td>
                            <td><?php echo $dado['datenasc']?></td>
                            <td><?php if($dado['sexuser']==1){ echo "Não definido";} else if($dado['sexuser']==2){ echo "Masculino";}else{echo "Feminino";}?></td>
                            <td><?php echo $dado['emailuser']?></td>
                            <td><?php if($dado['activeuser']==1){echo "Ativo";}else{echo "Inativo";}?></td>
                            <td><?php if($dado['inadm']==1){echo "Administrador";}else{echo "Usuário";}?></td>
                            <td><?php echo $dado['datecaduser']?></td>
                        </tr>
                    <?php }}?>
                    </tbody>
                </table>
            </div>
            <div class="compras-usuario" >
                    aaa
            </div>
        </div>
    </div>
</div>

<div class="input-group mb-3 pesquisar-users">
    <input type="text" class="form-control" placeholder="Pesquisar usuários" aria-label="Recipient's username" aria-describedby="button-addon2">
    <div class="input-group-append">
        <button class="btn btn-outline-secondary search" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
    </div>
</div>

    
<div class="lista-usuarios">
    <h4 id="add-prod">Todos os Usuários:</h4>
    <table name="tabela" class="table table-light table-bordered table-hover" style="text-align:center;">
        <thead >
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ativo?</th>
            <th>Admin?</th>
            <th>Ações</th>
        </thead>
        
        <tbody>
        <?php while($dado = $conn->fetch_array()){?>
            <tr>
                <td><?php echo $dado['nameuser']?></td>
                
                <td><?php echo $dado['emailuser']?></td>
                <td><?php if($dado['activeuser']==1){echo "Ativo";} else{echo"Inativo";}?></td>
                <td><?php if($dado['inadm']==1){echo "Administrador";} else{echo"Usuário";}?></td>
                <td id="acoes">
                    <a href="usuarios.php?info=<?php echo $dado['iduser'];?>" name="info" id="info-user" method="get"><i class="fa fa-info-circle text-info"></i></a>
                    <a href="#" name="info" id="edit-user"><i class="fa fa-edit text-primary"></i></a>
                    <a href="#" id="delete-user"><i class="fa fa-trash-alt text-danger"></i></a>
                </td>
            </tr>
        <?php };?>
        </tbody>
    </table>
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




<?php
require_once '../../../../app/views/partials-admin/footer-admin.php';
?>