<?php
//Enviar varias requisições ao mesmo tempo
ob_start();

//Iniciar a seção para trabalhar com $_SESSION;
session_start();

//Definir o separador de pastas como DS;
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

$pastaInterna = "";
define("DIRPAGE", "http:".DS.DS."localhost".DS."loja".DS);

define("DIRCSS", DIRPAGE."\views\css");

spl_autoload_register(function($class_name){

    $filename = "class".DS.$class_name.".php";

    if(file_exists($filename)) {
        require_once($filename);
    }

});

$mysqli = new mysqli("localhost", "root", "", "onloja");

?>