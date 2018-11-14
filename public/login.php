<?php
require_once '../app/views/partials-cliente/header-cliente.php';
$msg = "";
if(isset($_POST['cadastro'])){
    $nome = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    $cpf = trim(filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING));
    $dataNasc = trim(filter_input(INPUT_POST, 'dataNasc', FILTER_SANITIZE_STRING));
    $sex = trim(filter_input(INPUT_POST, 'sex', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
    $senha = md5(trim(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING)));

    
    if(empty($nome) || empty($cpf) || empty($dataNasc) || empty($sex) || empty($email || empty($senha))){
        $msg = "<div class='alert alert-danger alert-dismissible fade show'><a class='close' data-dismiss='alert'>&times</a>Por favor preencha os campos: Nome, CPF, Data de Nascimento, Sexo, E-mail e Senha.</div>";
    }else{
            setUsuario($nome, $cpf, $dataNasc, $sex, $email, $senha);
            $msg = "<div class='alert alert-success'><a class='close' data-dismiss='alert'>&times</a>Usuario cadastrado com sucesso!</div>";
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
        align-items: center;
        align-content: center;
        height:85%;
    }
    .login-user{
        width: 400px;
        height: auto;
        border-radius: 10px;
        padding:2px;
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
    
    .btn{
        width: 100%;
    }
    .card{}
    .card-body{
        padding:10px;
        padding-top:0;
    }
    .btn-primary{
        margin-bottom:10px;
    }

    input{
        max-height: 60px;
        height:40px;

    }
    .top{
        display: flex;
        justify-content:center;
        align-items: center;
        align-content: center;
        height:80px;
        margin-top:10px;
    }
    .forms{
        width: 100%;
        height:100%;
        margin-top:10px;
        margin-bottom:10px;
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: 1fr 1fr;
        grid-gap:10px;

    }
    

   
</style>

    <div class="login-user">
    <form action="../src/Code/Onloja/loginProcess.php" method="post">
        <div class="card border shadow ">
            <div class="card card-body">
                <div class="top">
                    <h4>Login</h4>
                </div>
                <?php if(isset($_SESSION['msg'])){print_r($_SESSION['msg']); unset($_SESSION['msg']);}?>
                <div class="forms">
                    <input name="email" type="email" class="form-control " placeholder="E-mail:">
                    <input name="senha" type="password" class="form-control" placeholder="Senha:">
                </div>
                <button class="btn btn-primary btn-lg " type="submit">Entrar</button>
                <a href="index.php"><button class="btn btn-danger btn-sm" type="button">Voltar</button></a>
            </div>   
        </div>
    </form>
</div>

<?php
require_once '../app/views/partials-cliente/footer-cliente.php';
?>