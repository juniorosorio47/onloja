<?php

class Usuario{

    private $id;
    private $ativo = 1;//Usado para verificar se o usuário está ativo, não serão apagados os dados dos usuários. Somente desativados e retirados da vizualização
    private $nome;
    private $cpf;
    private $dataNascimento;
    public $contato;//Usar a função setContato($email, $telefone, $contato);
    private $login;//Login ou email
    private $senha;//No mínimo 8 caracteres com letra e número
    private $endereco;//Classe endereço com todos os dados
    private $dataCadastro;
    private $isAdm;

    public function setAtivo($ativo){
        $this->ativo = $ativo;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getNome(){
        return $this->nome;
    }

    public function setCpf($numero){
        //Implementar a validação do CPF
        $this->cpf = $numero;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setDtNasc($data){
        $this->dataNascimento = $data;
    }

    public function getDtNasc(){
        return $this->dataNascimento;
    }


    public function setLogin($login){
        //Implementar a regra do Login não pode existir no banco de dados um igual
        $this->login = $login;
    }

    public function getLogin(){
        return $this->login;
    }

    public function setSenha($senha){
        if(strlen($senha)>=8){
            $this->senha = $senha;
        }
        else{
            echo "A senha deve ter pelo menos 8 caracteres";
        }
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function setVenda($compra){
        //Colocar os ids das compras realizadas pelo cliente
    }

    public function getVenda(){
        //Retornar os ids das compras realizadas pelo cliente e depois buscar no banco e mostrar as vendas
    }

}

$p1 = new Usuario();


var_dump($p1);

?>