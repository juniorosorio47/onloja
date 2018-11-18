<?php 
require_once '../../../../app/views/partials-admin/header-admin.php';

$consulta = "SELECT * FROM tb_users";
$user = new Usuario();


$conn = $mysqli->query($consulta) or die($mysqli->error);
$info = '';
$compras = '';
$pesquisa = '';
$msg = '';

if(isset($_GET['info'])){
    $id = $_GET['info'];
    $vendas = new Venda();
    $compras = $vendas->getVendasByUser($id);
    $info = $user->getUserById($id);
    unset( $_GET['info']);
}

if(isset($_POST['salvar'])){
    $id = trim(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING));
    $nome = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    $cpf = trim(filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING));
    $dataNasc = trim(filter_input(INPUT_POST, 'dataNasc', FILTER_SANITIZE_STRING));
    $sexo = trim(filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
    $adm = trim(filter_input(INPUT_POST, 'inadm', FILTER_SANITIZE_STRING));
    $ativo = trim(filter_input(INPUT_POST, 'ativo', FILTER_SANITIZE_STRING));

    if(empty($nome) || empty($cpf) || empty($dataNasc) || empty($sexo) || empty($email)){
        echo "<div class='alert alert-danger alert-dismissible fade show'><a class='close' data-dismiss='alert'>&times</a>Por favor preencha todos os campos.</div>";
    }else{
        $user->editUsuario($id, $nome, $cpf, $dataNasc, $sexo, $email, $adm, $ativo);
        echo "<div class='alert alert-success'><a class='close' data-dismiss='alert'>&times</a>Produto modificado com sucesso!</div>";
        $nome = $cpf = $dataNasc = $sexo = $email = $adm = $ativo = '';
        unset($_POST['salvar']);
    }
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $user->desativeUserById($id);
    unset( $_GET['delete']);
    echo "<div class='alert alert-danger alert-dismissible fade show'><a class='close close-get' data-dismiss='alert'>&times</a>Usuario desativado com sucesso!</div>";
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
        background:whitesmoke;
    }
    .card-header{
        display:grid;
        justify-content:space-around;
        grid-template-columns:1fr 1fr;
        grid-template-rows:1fr;
    }
    a.close{
        text-align: right;
    }
    h5{
       
    }
    .compras-usuario{
        margin-top:20px;
    }
    .info-user{
        margin-bottom:20px;
    }
</style>

<div class="info-user">
    <div class="card card-info ">
        <div class="card card-header bg-dark text-light shadow">
            <h5><i class="fa fa-info-circle"></i> Detalhes do Usuário:</h5>
            <a class='close text-light close-info' data-dismiss='info-user'>&times</a>
        </div>
        <div class="card card-body info-body bg-white">
            <div class="infos">
            <h5>Informações:</h5>
            <?php if(!empty($info)){ while($dado = $info->fetch_array()){?>
                <table class="table table-hover table-light table-bordered shadow-sm">
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
                    <?php }}else{echo "Selecione um usuario.";}?>
                    </tbody>
                </table>
            </div>
            <div class="compras-usuario" >
            <?php if(!empty($compras)){ while($dado = $compras->fetch_array()){?>
                <h5>Compras de <strong><?php echo $dado['nameuser']?>:</strong></h5>
                <table class="table table-hover table-light table-bordered shadow-sm">
                        <thead>
                            <th>ID</th>
                            <th>Produto</th>
                            <th>Data</th>
                            <th>Valor</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $dado['idsale']?></td>
                                <td><?php echo $dado['nameproduct']?></td>
                                <td><?php echo $dado['datesale']?></td>
                                <td><?php echo $dado['pricesale']?></td>
                            </tr>
                        </tbody>
                        <?php }} else{ echo "- Sem compras para mostrar.";}?>
                </table>
            </div>
        </div>
    </div>
</div>

<form action="usuarios.php" method="post" class="input-group mb-3 pesquisar-users">
    <input type="text" class="form-control" placeholder="Pesquisar usuários" aria-describedby="button-addon2" name="pesquisar-usuarios">
    <div class="input-group-append">
        <button class="btn btn-outline-secondary search" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
    </div>
</form>

<?php 
if(isset($_POST['pesquisar-usuarios'])){
    $pesquisa = $_POST['pesquisar-usuarios'];
    $conn = $user->searchUsers($pesquisa);
    if(mysqli_num_rows($conn)==0){
        $msg = "Não foram encontrados resultados.";
        
    }
    unset($_POST['pesquisar-usuarios']);
}
?>

    
<div class="lista-usuarios">
    <h4 id="add-prod">Todos os Usuários:</h4>
    <table name="tabela" class="table table-light table-bordered table-hover shadow-sm" style="text-align:center;">
        <thead >
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ativo?</th>
            <th>Admin?</th>
            <th>Ações</th>
        </thead>
        
        <tbody>

        <?php if($conn != ''){while($dado = $conn->fetch_array()){?>
            <tr>
                <td><?php echo $dado['nameuser']?></td>
                
                <td><?php echo $dado['emailuser']?></td>
                <td><?php if($dado['activeuser']==1){echo "Ativo";} else{echo"Inativo";}?></td>
                <td><?php if($dado['inadm']==1){echo "Administrador";} else{echo"Usuário";}?></td>
                <td id="acoes">
                    <a href="usuarios.php?info=<?php echo $dado['iduser'];?>" name="info" id="botao-info" method="get"><i class="fa fa-info-circle text-info"></i></a>
                    <a href="editarUsuarios.php?edit=<?php echo $dado['iduser'];?>" name="edit" id="edit-user"><i class="fa fa-edit text-primary"></i></a>
                    <a href="usuarios.php?delete=<?php echo $dado['iduser'];?>" id="delete"><i class="fa fa-trash-alt text-danger"></i></a>
                </td>
            </tr>
        <?php }};?>
        </tbody>
        <?php if($msg != ''){ echo "<tr><td>$msg</td></tr>";}?>
    </table>
</div>

<script>
    $(document).ready(function(){
        $('.close').click(function(event){
            event.preventDefault();
            window.location.href='usuarios.php';
        });
    });
</script>
<?php
require_once '../../../../app/views/partials-admin/footer-admin.php';
?>