<?php 
require_once '../app/views/partials-cliente/header-cliente.php';
require_once 'cart.php';
require_once '../src/Code/Onloja/class/Venda.php';

if(isset($_GET['tx'])){
    $email = $_SESSION['email'];
    $amount = $_GET['amt'];
    $currency = $_GET['cc'];
    $transaction = $_GET['tx'];
    $status = $_GET['st'];

    $venda = new Venda();

    $venda->novaVenda($email, $amount, $currency, $transaction, $status);

        //session_destroy();

    $_SESSION['email'] = $email;

    print_r($_SESSION);


} else{
    header('Location: index.php');
}
?>





<?php
require_once '../app/views/partials-cliente/footer-cliente.php';
?>