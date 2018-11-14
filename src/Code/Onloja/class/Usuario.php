<?php
require_once('Endereco.php');
class Usuario{

    private $id;
    private $ativo = 1;//Usado para verificar se o usuário está ativo, não serão apagados os dados dos usuários. Somente desativados e retirados da vizualização
    private $nome;
    private $cpf; //Verificar se já não está cadastrado
    private $dataNascimento;
    private $sexo;
    private $senha;//USAR MD5 PARA CRIPTOGRAFAR
    private $isAdm;
    private $dataCadastro;
    //Adicionar as chaves estrangeiras
    private $contato;//Usar a função setContato($email, $telefone, $contato);
    private $endereco;//Classe endereço com todos os dados
    private $carrinho;//Criar o carrinho
    
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

    public function setContato($email,  $telefone = NULL, $celular = NULL){
        $this->contato = new Contato();
        $this->contato->setContato($email,  $telefone = NULL, $celular = NULL);
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

    public function setEndereco($rua, $numero, $cep, $bairro, $cidade, $estado, $pais){
        
        $this->endereco = new Endereco();
        $this->endereco->setRua($rua);
        $this->endereco->setNumero($numero);
        $this->endereco->setCep($cep);
        $this->endereco->setBairro($bairro);
        $this->endereco->setCidade($cidade);
        $this->endereco->setEstado($estado);
        $this->endereco->setPais($pais);
    }

    public function getEndereco(){
        $endereco['rua'] = $this->endereco->getRua();
        $endereco['numero'] = $this->endereco->getNumero();
        $endereco['cep'] = $this->endereco->getCep();
        $endereco['bairro'] = $this->endereco->getBairro();
        $endereco['cidade'] = $this->endereco->getCidade();
        $endereco['estado'] = $this->endereco->getEstado();
        $endereco['pais'] = $this->endereco->getPais();
        
        return $endereco;
    }

    public function setVenda($compra){
        //Colocar os ids das compras realizadas pelo cliente
    }

    public function getVenda(){
        //Retornar os ids das compras realizadas pelo cliente e depois buscar no banco e mostrar as vendas
    }

    public function getUserById($id){
        global $mysqli;
        $resultado = $mysqli->query("SELECT * FROM tb_users WHERE iduser = '$id';");
        return $resultado;
    }

    public function getFiltroAtivo($id){
        global $mysqli;
        $resultado = $mysqli->query("SELECT * FROM tb_users WHERE iduser = '$id' AND activeuser = 1;");
        return $resultado;
    }

    public function editUsuario($id, $nome, $cpf, $dataNasc, $sexo, $email, $adm, $ativo){
        global $mysqli;
        $mysqli->query("UPDATE tb_users SET nameuser = '$nome', cpfuser = '$cpf', datenasc = '$dataNasc', sexuser = '$sexo', emailuser = '$email', inadm = '$adm', activeuser = '$ativo' WHERE iduser = '$id'");
    }

    public function desativeUserById($id){
        global $mysqli;
        $mysqli->query("UPDATE tb_users SET activeuser='0' WHERE iduser = '$id';");
    }

}


function redirect($local){
    header("Location: $local");
}

function setUsuario($nome, $cpf, $dataNascimento, $sexo, $email, $senha){
    global $mysqli;
    $insert = "INSERT INTO tb_users (nameuser, cpfuser, datenasc, sexuser, emailuser, passworduser) VALUES('$nome', '$cpf','$dataNascimento','$sexo', '$email', '$senha');";
    $mysqli->query($insert);
}

function loginUsuario(){
    global $mysqli;

    session_start();
    if(isset($_POST['entrar'])){
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
        $senha = trim(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));

        $query = "SELECT * FROM tb_users WHERE emailuser = '$email' AND passworduser = 'md5($senha)';";

        $aux = $mysqli->query($query);

        $resultado = $aux->fetch_array();

        if(mysqli_num_rows($query)==1){
            if($resultado['inadm'] == 1){
                $_SESSION['usuario'] = $resultado['iduser'];
                $_SESSION['inadm'] = $resultado['inadm'];
                redirect("http://localhost/loja/index.php");
            }else{
                $_SESSION['usuario'] = $resultado['iduser'];
                redirect("index.php");
            }
        }else{
            echo"usuário nao cadastrado";
                redirect("login.php");
            exit();
        }
    }
}

?>