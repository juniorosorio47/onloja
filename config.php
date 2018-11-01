<?php

spl_autoload_register(function($class_name){

    $filename = "class".DIRECTORY_SEPARATOR.$class_name.".php";

    if(file_exists($filename)) {
        require_once($filename);
    }

});

$host = 'localhost';
$user = 'root';
$password = '';

$conn = new mysqli($host, $user, $password);

$conn->query("CREATE TABLE produtos");

echo "Tabela criada com sucesso!!!"

?>