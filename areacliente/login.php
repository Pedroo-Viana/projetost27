<?php
#CAPTURA VARIÁVEIS UTILIZANDO O MÉTODO POST
if($_SERVER['REQUEST_METHOD']=="POST"){
    $nome = $_POST['nome']; #captura variável que esta no name ="password" html
    $password = $_POST['password']; #captura
    include("../conectaDB.php");#Include chama a conexão com o banco no scripit conectaDB.php

    #CONSULTA SQL PARA VERIFICAR USUARIO CADASTRADO
    $sql = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_nome = '$nome' AND usu_senha ='$password'";
    $resultado = mysqli_query($link,$sql);
    
    while($tbl = mysqli_fetch_array($resultado)){
        $cont = $tbl[0];
    }
    if($cont==1){
        header("Location: homesistema.html");
    }
    else{
        echo"<script>window.alert('USUARIOS OU SENHA INCORRETOS!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN USUÁRIOS</title>
    <link rel="stylesheet" href="./stylecadastra.css">
</head>

<body>
    <div class="container">
        <!-- script para mostrar senha -->
        <script>
            function mostrarsenha() {
                var tipo = document.getElementById("senha");
                if (tipo.type == "password"){
                    tipo.type = "text";
            } 
            else{
                tipo.type = "password";
            }
        }
        </script>
        <!-- FIM DO SCRIPT PARA MOSTARAR A SENHA -->

        <form action="login.php" method="POST">
            <h1>LOGIN DE USUARIO</h1>
            <input type="text" name="nome" id="nome" placeholder="Nome">
            <br>
            <input type="password" id="senha" name="password" placeholder="Senha">
            <img id="olinho" onclick="mostrarsenha()" src="assets/eye.svg">
            <br>
            <input type="submit" name="login" value="LOGIN">
        </form>
    </div>
</body>

</html>