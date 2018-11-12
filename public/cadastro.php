<?php
require_once '../app/views/partials-cliente/header-cliente.php';

?>
<style>
    .wrapper{
        display:flex;
        justify-content:center;
        align-items: flex-start;
        align-content: center;
    }
    .cadastro-user{
        width: 50%;
        height: auto;
        border-radius: 10px;
    }
    #pesquisar-navbar{
        display:none;
    }
    #user-navbar{
        display:none;
    }
    .table{
        width:100%;
        height:100%;
    }
    .navbar-principal{
        justify-content:center;
        align-items: center;
        align-content: center;
    }
    #navbar-categorias{
        display:none;
    }
    td{
        display: flex;
        justify-content:space-around;
        align-items: center;
        align-content: center;
    }
    .btn{
        width: 100%;
    }
    #acancel{
        width:100%;
        height:100%;
    }
    .navbar-principal{
        height:50px;

    }
   
</style>
<div class="cadastro-user bg-light border border-danger">
    <form action="login.php" method="post" >
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td><label for="nome"><h5>Nome:</h5></label></td>
                    <td><input name="nome" type="text" class="form-control" placeholder="Ex: Maria Catarina"></td>
                </tr>
                <tr>
                    <td><label for="cpf"><h5>CPF:</h5></label></td>
                    <td><input name="cpf" type="number" class="form-control" placeholder="Ex: 000.000.000-41"></td>
                </tr>
                <tr>
                    <td><label for="dataNasc"><h5>Data de Nascimento:</h5></label></td>
                    <td><input name="dataNasc" type="date" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="sex"><h5>Sexo:</h5></label></td>
                    <td>
                        <select name="sex" id="sex" class="form-control">
                            <option value="1">Selecione</option>
                            <option value="2">Masculino</option>
                            <option value="3">Feminino</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="email"><h5>E-mail:</h5></label></td>
                    <td><input name="email" type="email" class="form-control" placeholder="Ex: maria@email.com"></td>
                </tr>
                <tr>
                    <td><label for="senha"><h5>Senha:</h5></label></td>
                    <td><input name="senha" type="password" class="form-control" placeholder="********"></td>
                </tr>

                <tr>
                    <td><button class="btn btn-primary btn-lg" name="cadastro">Cadastrar</button></td>
                    <td><a id="acancel" href="index.php"><button class="btn btn-danger">Cancelar</button></a></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>




<?php
require_once '../app/views/partials-cliente/footer-cliente.php';
?>