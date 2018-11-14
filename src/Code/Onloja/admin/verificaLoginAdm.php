<?php

if(!isset($_SESSION)){
    session_start();}

if($_SESSION['inadm']==1){
   
}else{
    header('Location: ../../../../public/login.php');
    $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show'><a class='close close-get' data-dismiss='alert'>&times</a>Você não tem autorização para acessar esta área.</div>";
    exit();
}