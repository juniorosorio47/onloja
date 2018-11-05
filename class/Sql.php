<?php
class Sql{

    private $servidor = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $banco = 'onloja';
    private $mysqli;

    public function getUserResumedInfo(){
        $this->mysqli = new mysqli($this->servidor, $this->usuario, $this->senha, $this->banco);

        //Busca as informações básicas do usuário
        $busca = "SELECT tbusers.iduser, tbusers.activeuser, tbusers.nameuser, tbusers.loginuser, tbusers.isadm, tbusers.dtcadastro, tbcontact.email, tbcontact.cell FROM tbusers JOIN tbcontact ON tbusers.contactuser = tbcontact.id";
        $results = $this->mysqli->query($busca);
        return $results->fetch_assoc();
    }

    //Busca todas as informações do usuario
    public function getUserCompleteInfo(){
        $this->mysqli = new mysqli($this->servidor, $this->usuario, $this->senha, $this->banco);
        $busca = "SELECT * FROM tbusers JOIN tbcontact ON tbusers.contactuser = tbcontact.id JOIN tbaddress ON tbusers.addressuser = idaddress";
        $results = $this->mysqli->query($busca);
        return $results->fetch_assoc();
    }
    


}
