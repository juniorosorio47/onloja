<?php

class Contato{
    private $email;
    private $telefone;
    private $celular;

    public function setContato($email,  $telefone = NULL, $celular = NULL){
        $this->email = $email;
        $this->telefone = $telefone;
        $this->celular = $celular;
    }
}