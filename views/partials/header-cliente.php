<?php include_once('../config.php');
include_once('../class/Categoria.php')
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="..\views\partials\css\bootstrap\bootstrap.min.css">
    <link rel="stylesheet" href="..\views\partials\css\layout.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>OnLoja</title>
</head>
<body>

<header class="navbars">
    <nav class="navbar navbar-dark navbar-principal">
        <div id="logo-navbar">
            <a class="navbar-brand" href="#"><h2>OnLoja</h2></a>
        </div>
        <div id="pesquisar-navbar">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
        </div>
        <div id="user-navbar">
            <i class="fa fa-user-circle" id="user-icone"></i> <a href="#" style="text-decoration:none; color: white">Faça o login ou <br> cadastre-se <i class="fa fa-angle-down"></i></a>
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