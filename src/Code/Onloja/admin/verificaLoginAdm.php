<?php

if(!isset($_SESSION)){
    session_start();

    if($_SESSION['inadm']==1){
        exit();
    }else{
        header('Location: ../../../../public/login.php');
        $_SESSION['msg'] = "Não foi possível acessar está área";
        exit();
    }
}