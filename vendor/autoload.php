<?php

// autoload.php @generated by Composer

require_once __DIR__ . '/composer/autoload_real.php';

return ComposerAutoloaderInitfbd39ac8f8c97d91c951d3edaf8f6a03::getLoader();

function carregaClasse($nomeDaClasse) {
    if(file_exists("../src/Code/Onloja/class/".$nomeDaClasse.".php")){
        require_once("../src/Code/Onloja/class/".$nomeDaClasse.".php"); 
       } else {
        echo "classe não encontrada.";  
      }
}

spl_autoload_register("carregaClasse");