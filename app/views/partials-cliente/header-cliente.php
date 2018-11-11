<?php 
require_once '../vendor/autoload.php';
require_once '..\src\Code\Onloja\class\Categoria.php';
require_once '..\src\Code\Onloja\class\Produto.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/loja/app/views/css/layout.css">
    <link rel="stylesheet" href="/loja/app/views/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="/loja/app/views/partials/js/bootstrap/bootstrap.min.js"></script>
    <title>OnLoja</title>
</head>
<body>

<header class="navbars">
    <nav class="navbar navbar-dark navbar-principal">
        <div id="logo-navbar">
            <a class="navbar-brand" href="index.php"><h2>OnLoja</h2></a>
        </div>
        <div id="pesquisar-navbar">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
        </div>
        <div id="user-navbar">
            <?php if(isset($_SESSION['usuario'])){
                echo "><a href='perfil.php'><i class='fa fa-user-circle'></i><p>Meu Perfil</p></a> <a href='carrinho.php'><i class='fa fa-shopping-cart'></i><p>Carrinho</p></a>";
            }else{
                echo "<a href='cadastro.php'><i class='fa fa-pen'></i><p>Cadastrar</p></a><a href='login.php'><i class='fa fa-sign-in-alt'></i><p>Login</p></a>";
            }
            ?>
        </div> 
    </nav>

    <nav class="navbar navbar-dark" id="navbar-categorias">
        <ul id="categorias-navbar">
            <div>Categorias:</div>
            <?php 
            $cat = new Categoria();
            $resultado = $cat->getCategorias();

            while($dado = $resultado->fetch_array()){
            ?>
            <li><a href="#"><?php echo $dado['namecat']?></a></li>
            <?php }?>
        </ul>
    </nav>
</header>

<div class="wrapper">