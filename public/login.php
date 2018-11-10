<?php
require_once('../views/partials/header-cliente.php');
require_once('../config.php');
require_once('../class/Usuario.php');

if(isset($_POST['cadastro'])){
    $nome = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    $cpf = trim(filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING));
    $dataNasc = trim(filter_input(INPUT_POST, 'dataNasc', FILTER_SANITIZE_STRING));
    $sex = trim(filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
    $senha = md5(trim(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING)));

    
    if(empty($nome) || empty($cpf) || empty($dataNasc) || empty($sex) || empty($email || empty($senha))){
        echo "<div class='alert alert-danger alert-dismissible fade show'><a class='close' data-dismiss='alert'>&times</a>Por favor preencha os campos: Nome, CPF, Data de Nascimento, Sexo, E-mail e Senha.</div>";
    }else{
            setUsuario($nome, $cpf, $dataNasc, $sex, $email, $senha);
            echo "<div class='alert alert-success'><a class='close' data-dismiss='alert'>&times</a>Usuario cadastrado com sucesso!</div>";
            $nome = $cpf = $dataNasc = $sex = $email = $senha = '';
        }
    }
?>
<style>
    .navbar-principal{
        height:50px;

    }
    .wrapper{
        display:flex;
        justify-content:center;
        align-items: flex-start;
        align-content: center;
        height:85%;
    }
    .login-user{
        width: 400px;
        height: auto;
        border-radius: 10px;
    }
    #pesquisar-navbar{
        display:none;
    }
    #user-navbar{
        display:none;
    }
    .table{
        width:100%;
        height:100%;
    }
    .navbar-principal{
        justify-content:center;
        align-items: center;
        align-content: center;
    }
    #navbar-categorias{
        display:none;
    }
    td{
        display: flex;
        justify-content:space-around;
        align-items: center;
        align-content: center;
    }
    .btn{
        width: 100%;
    }
    #acancel{
        width:100%;
        height:100%;
    }
    .card-body{
        padding:0;
    }
    .btn-primary{
        margin-bottom:10px;
    }
   
</style>
<?php 
        
        loginUsuario();
        ?>

    <div class="login-user bg-light">
    <form action="login.php" method="post" >
        
        <div class="card">
            <div class="card card-header"><h5>Login</h5></div>
                <div class="card card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><label for="email"><h6>E-mail:</h6></label></td>
                                <td><input name="email" type="email" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><label for="senha"><h6>Senha:</h6></label></td>
                                <td><input name="senha" type="password" class="form-control" ></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="card card-footer">
                    <button class="btn btn-primary" type="submit" name="entrar">Entrar</button>
                    <button class="btn btn-danger btn-sm">Voltar</button>
                </div>
        </div>
    </form>
</div>




<?php
require_once('../views/partials/footer-cliente.php');
?>