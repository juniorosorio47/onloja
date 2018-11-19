<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'onloja');

if (empty($_POST['email']) || empty($_POST['senha'])){
    header('Location: ../../../../public/login.php');
    exit();
}

$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
$senha = trim(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));

$query = "SELECT * FROM tb_users WHERE emailuser = '{$email}' AND passworduser = md5('{$senha}')";

$resultado = $mysqli->query($query);

$row =  mysqli_num_rows($resultado);

if($row==1){
    $_SESSION['email'] = $email;
    while($dados = $resultado->fetch_array()){
        
        if($dados["inadm"]==1){
            $_SESSION['inadm'] = $dados['inadm'];
            header('Location: admin/home.php');
            exit();
        }else{
            $_SESSION['inadm'] = 0;
            echo "usuario normal";
            header('Location: ../../../public/index.php');
            exit();
        }
    }
}else{
    $_SESSION['msg'] = "E-mail ou senha incorretos.";
    header('Location: ../../../public/login.php');
    exit();
}
?>