<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="partials\css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="partials\css\layout.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>OnLoja - Administrador</title>
</head>
<body>

<header class="navbars">
    <nav class="navbar navbar-dark navbar-principal" style="height:60px;">
        <div class="botao-menu"><button class="btn"><i class="fa fa-bars"></i></button></div>
        <div id="logo-navbar">
            <a class="navbar-brand" href="#">OnLoja</a>
        </div>
        <div class="pesquisar-admin" style=" display:flex;">
            <input class="form-control" type="search" placeholder="Pesquisar" aria-label="Pesquisar" style="width:200px; margin-right:5px;">
            <!--Vai para a loja-->
            <div class="ir-loja">
                <a href="#"><i class="fa fa-share-square"></i>Ir para OnLoja</a> 
            </div>
            <button class="btn"><i class="fa fa-sign-out-alt"></i>  Sair</button>
        </div>
    </nav>
</header>
<!--Corpo da página-->
<div class="wrapper-admin">
    <!--Menu lateral-->
    <div class="side-menu">
        <ul> 
            <!--Leva à pagina das informações do adm-->
            <li style="font-weight: bold; background: #2e3131"><a href="#"><img id="user-image" src="../imagens/Sem título-1.jpg" alt="#"> Fulaninho da Silva</a></li>
            <!--Dashboard-->
            <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
            <!--Listagem de produtos e editar produtos-->
            <li><a href="#"><i class="fa fa-box"></i> Produtos</a></li>
            <!--Categorias dos produtos-->
            <li><a href="#"><i class="fa fa-list"></i> Categorias</a></li>
            <!--Relatórios das vendas-->
            <li><a href="#"><i class="fa fa-shopping-cart"></i> Vendas</a></li>
            <!--Listagem dos usuários-->
            <li><a href="#"><i class="fa fa-user"></i> Usuários</a></li>
        </ul>
    </div>
    <!--Conteúdo do site-->
    <div class="corpo-admin">
    