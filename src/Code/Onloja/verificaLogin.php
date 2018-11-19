<?php
if(!isset($_SESSION)){
    session_start();
}
if(!$_SESSION['email']){
    header('Location: ../public/login.php');
    exit();
}
