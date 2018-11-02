<?php

class Sql{

    private $servidor = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $banco = 'dbphp7';

    public function conectaBanco(){

        // Conecta-se ao banco de dados MySQL
        $mysqli = new mysqli($this->servidor, $this->usuario, $this->senha, $this->banco);

        // Caso algo tenha dado errado, exibe uma mensagem de erro
        if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
    }

    //Fazer alguns testes com essa função
    public function selectById(){

        // Conecta-se ao banco de dados MySQL
        $mysqli = new mysqli($this->servidor, $this->usuario, $this->senha, $this->banco);

        // Executa uma consulta que pega cinco notícias
        $sql = "SELECT * FROM `tb_usuarios`";
        $query = $mysqli->query($sql);
        while ($dados = $query->fetch_array()) {
            echo 'ID: ' . $dados['idusuario'] . ' ';
            echo 'Login: ' . $dados['deslogin'] . ' ';
            echo "<br>";
        }
        echo 'Registros encontrados: ' . $query->num_rows;
    }
}

$sql = new Sql();

$sql->selectById();